<?php
    define("MSG_TYPE_PLAIN", 0);
    define("MSG_TYPE_FLASH", 1);
    define("MSG_TYPE_UNICODE", 2);

    /**
     *
     * @name RouteSMS International Route - API Class Wrapper
     * @author Shrikant Meena
     * @copyright 2010, OpenWings Web Labs LLP, All Rights Reserved
     *
     */
    class InternationalSMS {

        private $dbObj;
        public $isTest;
        private $isBulkOperation;
        public $successSentCount;

        function  __construct($databaseObject) {
            $this->dbObj = $databaseObject;
            $this->isBulkOperation = false;
            $this->successSentCount = 0;
            $this->isTest = false;
        }

        /**
         *
         * @param string $mobiles
         * @return string
         */
        private function encodeMobileNumbers($mobiles) {
            return urlencode(utf8_encode($mobiles));
        }

        /**
         *
         * @param string $input
         * @return string
         */
        private function formatSender($input) {
            $pattern = '/ /';
            $replacement = '';
            $input = preg_replace($pattern, $replacement, $input);
            if(strlen($input) > 11)
                $input =substr($input, 0, 11);
            return $input;
        }

        /**
         *
         * @param string $input
         * @return string
         */
        private function encodeTextForPlainGSMFlashSMS($input) {
            $patterns = array( '/%/', '/\r/', '/\n/', '/ /', '/&/', '/#/', '/=/', '/\+/', '/\"/', "/\'/" );
            $replacements = array ('%25', '%0D', '%0A', '%20', '%26', '%23', '%3D', '%2B', '"', "'");
            return preg_replace($patterns, $replacements, $input);
        }

        /**
         *
         * @param string $input
         * @return string
         */
        private function encodeTextForUnicodeSMS($input) {
            $out = mb_convert_encoding($input, 'UTF-16BE');
            $actualUTF16BE = "";
            for($i=0; $i<strlen($out); $i++) {
                $actualUTF16BE .= sprintf("%02X", ord($out[$i]));
            }
            return $actualUTF16BE;
        }

        /**
         *
         * @param int $retcode
         * @return string
         */
        private function interpretSMSReturnCode($retcode) {
            $outCome = "";
            switch ($retcode) {
                case 1701: $outCome = "Message sent Successfully.";
                    break;
                case 1702: $outCome = "Invalid URL for message";
                    break;
                case 1703: $outCome = "Invalid Username or Password";
                    break;
                case 1704: $outCome = "Invalid msgtype provided";
                    break;
                case 1705: $outCome = "Invalid Message";
                    break;
                case 1706: $outCome = "Invalid destination number";
                    break;
                case 1707: $outCome = "Invalid sender name";
                    break;
                case 1708: $outCome = "Invalid dlr provided";
                    break;
                case 1709: $outCome = "User validation failed";
                    break;
                case 1710: $outCome = "Internal Error";
                    break;
                case 1025: $outCome = "Insufficient Credit";
                    break;
            }
            return $outCome;
        }

        /**
         *
         * @param string $value
         * @return escaped string
         */
        private function escape($value) {
            if(get_magic_quotes_gpc()) {
                $value = stripslashes($value);
            } else {
                $value = mysql_real_escape_string($value);
            }
            return $value;
        }

        /**
         *
         * @param integer $customerID
         * @param integer $retCode
         * @param array $attrArray
         */
        private function logSMSDelivery($customerID, $retCode, $attrArray) {
            $logDeliverySQL = "INSERT INTO intl_sms_delivery(cus_id, type, message, return_code, sent_date) VALUES";
            $GMTPlusOne = gmdate("Y-m-d H:i:s", time()+(3600));
            $msgForDB = mysql_real_escape_string(stripcslashes($attrArray['message']));
            if($this->isBulkOperation) {
                $repExploded = explode(",", $retCode);
                $i = 0;
                foreach($repExploded as $comReply) {
                    $actualCode = explode("|", $comReply);
                    if($i==0) {
                        $newValues = "(".$customerID.", ".$attrArray['message_type'].", '".$msgForDB."', '".$actualCode[0]."', '".$GMTPlusOne."')";
                    }
                    else {
                        $newValues .= ", (".$customerID.", ".$attrArray['message_type'].", '".$msgForDB."', '".$actualCode[0]."', '".$GMTPlusOne."')";
                    }
                    $i++;
                }
                $logDeliverySQL .= $newValues;
            }
            else {
                $actualCode = $this->getReturnCode($retCode);
                $newValues = "(".$customerID.", ".$attrArray['message_type'].", '".$msgForDB."', '".$actualCode."', '".$GMTPlusOne."')";
                $logDeliverySQL .= $newValues;
            }
            $this->dbObj->query($logDeliverySQL);
        }

        /**
         *
         * @param string $rep
         * @return int
         */
        private function getReturnCode($rep) {
            $repCode = explode("|", $rep);
            return $repCode[0];
        }

        /**
         *
         * @param string $rep
         * @return array OR string
         */
        private function getBulkReport($rep) {
            $bulkReport = array();
            if($this->isBulkOperation) {
                $this->successSentCount = 0;
                $repExploded = explode(",", $rep);
                foreach($repExploded as $comReply) {
                    $crEx = explode("|", $comReply);
                    switch (intval($crEx[0])) {
                        case 1701:  $this->successSentCount++;
                            $wex = explode(":", $crEx[1]);
                            $bulkReport[$wex[0]] = $this->interpretSMSReturnCode($crEx[0]);
                            break;
                        case 1706:  $bulkReport[$crEx[1]] = $this->interpretSMSReturnCode($crEx[0]);
                            break;
                        default:    $bulkReport[$crEx[1]] = $this->interpretSMSReturnCode($crEx[0]);
                            break;
                    }
                }
            }
            return $bulkReport;
        }

        /**
         *
         * @param string $sender
         * @param array $mobile_numbers
         * @param string $message
         * @param int $delivery_request
         * @param int $message_type
         * @return int SMS Reply Code
         */
        function sendSMS($sender, $mobile_numbers, $message, $delivery_request = 0, $message_type = 0) {
            $credentials =  $this->dbObj->get_row("SELECT username, password, sms_url FROM intl_sms_api");
            $sms_send_url = $credentials->sms_url;
            $this->successSentCount = 0;

            /*
            * Storing actual values of parameters so that
            * we can use then later to dump history and other logs
            */
            $actualAttributes = array(
                    "sender" => $sender,
                    "mobile_numbers" => $mobile_numbers,
                    "message" => $message,
                    "delivery_request" => $delivery_request,
                    "message_type" => $message_type
            );

            /*
            * Finds wether there are multiple numbers or
            * a single number passed to the function
            */
            $arrayLen = 1;
            if(is_array($mobile_numbers)) {
                $this->isBulkOperation = true;
                $arrayLen = count($mobile_numbers);
                $mobilenumber = implode(",", $mobile_numbers);
            }
            else {
                $this->isBulkOperation = false;
                $mobilenumber = $mobile_numbers;
            }

            /*
            * Preparing the parameters to be sent to the sms_url
            * UTF-16BE, GSM, Plain text encoding are done here
            */
            $mobilenumber = $this->encodeMobileNumbers($mobilenumber);
            $sender = $this->formatSender($sender);
            $sender = $this->encodeTextForPlainGSMFlashSMS($sender);

            if($message_type == MSG_TYPE_PLAIN || $message_type == MSG_TYPE_FLASH)
                $message = $this->encodeTextForPlainGSMFlashSMS($message);
            else if($message_type == MSG_TYPE_UNICODE)
                $message = $this->encodeTextForUnicodeSMS($message);

            /*
            * Matching patterns from the sms_url template taken from
            * the database and then making appropriate substitutions
            * to make a valid ROUTESMS LABROC BulkSMS URL
            */
            $patterns = array
                        (
                            '/{username}/',
                            '/{password}/',
                            '/{sender}/',
                            '/{mobile_number}/',
                            '/{delivery_request}/',
                            '/{message_type}/',
                            '/{message}/'
                        );

            $replacements = array
                        (
                            $credentials->username,
                            $credentials->password,
                            $sender,
                            $mobilenumber,
                            $delivery_request,
                            $message_type,
                            $message
                        );

            $sms_send_url = preg_replace($patterns, $replacements, $sms_send_url);

            $server_reply = '';
            if($this->isTest) {
                $this->isBulkOperation ? $server_reply = "1706|+4A23642,1701|+2348082188058:a915e40b,1701|+44082188058:a915e40b,1704|+872188058,1701|+9845188058:915e40b,1703|+913452188058,1705|+65882188058,1702|+7845188058" : $server_reply = "1025|+919890382136:s7df-657sd-sd7f6s-7df6";
            }
            else {
                $fp = fopen($sms_send_url, 'r');
                if($fp) {
                    while ($line = fgets($fp, 60)) {
                        $server_reply .= $line;
                    }
                }
            }
			
            $retCode = '';
            $this->isBulkOperation ? $retCode = $this->getBulkReport($server_reply) : $retCode = $this->getReturnCode($server_reply);

            /*
            * Customer ID for CRON job script
            */
            $cron == "yes" ? $customer_id = $cs_id : $customer_id = $_SESSION['cus_id'];

            /*
            * Logging the SMS delivery
            */
            $this->logSMSDelivery($customer_id, $server_reply, $actualAttributes);

            /*
            * Return the returncode generated by the system at RouteSMS server
            */
            return $retCode;
        }
    }
?>