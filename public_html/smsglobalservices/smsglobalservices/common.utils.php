<?php
    /**
     *
     * @param array $phone_array
     */
    function formatPhoneNumbersInArray(&$phone_array) {
        foreach ($phone_array as &$phnum) {
            $phnum = trim($phnum);
            if(substr($phnum, 0, 1) != "+")
                $phnum = "+" . $phnum;
        }
    }

    /**
     *
     * @global ez_sql $db
     * @param integer $customer_id
     * @return mixed
     */
    function getAllowedCountriesForCustomer($customer_id) {
        global $db;
        $urq = "SELECT allowed_countries FROM intl_restriction WHERE cus_id='$customer_id'";
        $list = $db->get_var($urq);
        if($list) {
            if($list == "*")
                return "*";
        }
        else
            return -9;
    
        return $list;
    }

    /**
     *
     * @param string $allowed_codes_string
     * @param array $phone_num_array
     * @return array
     */
    function getAllowedPhoneNumbersArray($allowed_codes_string, $phone_num_array) {
        $allowed_array = explode(",", $allowed_codes_string);
        $outArr = null;
        foreach ($allowed_array as $CC) {
            $newArr = preg_grep("/^\+($CC)/", $phone_num_array);
            if(empty($newArr)) continue;
            $newVal = implode(",", $newArr);
            if ($outArr == '')
                $outArr .= $newVal;
            else
                $outArr .= ",".$newVal;

            $outArr = trim($outArr);
        }
        if($outArr == null) return null;
        $outArr = explode(",", $outArr);
        return $outArr;
    }


    /**
     *
     * @param int $retcode
     * @return string
     */
    function interpretSMSReturnCode($retcode) {
        $outCome = "";
        switch ($retcode) {
            case 1701: $outCome = "Message sent Successfully.";
                break;
            case 1702: $outCome = "Invalid URL for message";
                break;
            case 1703: $outCome = "Invalid Username or Password @ CrownSMS";
                break;
            case 1704: $outCome = "Invalid msgtype provided";
                break;
            case 1705: $outCome = "Invalid Message";
                break;
            case 1706: $outCome = "Invalid destination number";
                break;
            case 1707: $outCome = "Invalid sender name";
                break;
            case 1708: $outCome = "Invalid delivery report parameter provided";
                break;
            case 1709: $outCome = "User validation failed @ CrownSMS";
                break;
            case 1710: $outCome = "Internal Error";
                break;
            case 1025: $outCome = "Insufficient Credit @ CrownSMS";
                break;
        }
        return $outCome;
    }

    /**
     *
     * @param object $inArray
     * @return array
     */
    function objArrayToCommaSeperatedString($array) {
        $ret_array = array();
        foreach(new RecursiveIteratorIterator(new RecursiveArrayIterator($array)) as $value) {
            $ret_array[] = $value;
        }
        return implode(",", $ret_array);
    }

    /**
     *
     * @param object $inArray
     * @return array
     */
    function objArrayToArray($array) {
        $ret_array = array();
        foreach(new RecursiveIteratorIterator(new RecursiveArrayIterator($array)) as $value) {
            $ret_array[] = $value;
        }
        return $ret_array;
    }

    /**
     *
     * @global ez_sql $db
     * @param int $customerID
     * @param int $amount_to_deduct
     * @param string $cust_table
     */
    function deductCustomerCreditBalance($customerID, $amount_to_deduct, $cust_table) {
        global $db;
        $dedSQL = "UPDATE ".$cust_table." SET balance=balance-".$amount_to_deduct." WHERE cus_id=".$customerID;
        $db->query($dedSQL);
    }

    /**
     *
     * @param <type> $customerID
     * @param <type> $phones
     * @param <type> $messages
     * @param <type> $sender
     * @param <type> $history_table
     */
    function insertSMSHistory($customerID, $phones, $messages, $sender, $history_table) {
        global $db;

        $now = gmdate("Y-m-d H:i:s",time()+(3600));
        $hSQL = "INSERT INTO ".$history_table."(cus_id, sms, phone, sms_from, sms_date) VALUES";
		
        if(is_array($phones) && !is_array($messages)) {
            $i = 0;
			$msgForDB = mysql_real_escape_string(stripcslashes($messages));
            foreach($phones as $phone) {
                if($i == 0) {
                    $hist = "(".$_SESSION['cus_id'].",'".$msgForDB."','".$phone->mob."','".mysql_prep($sender)."','".$now."')";
                }
                else {
                    $hist .=",(".$_SESSION['cus_id'].",'".$msgForDB."','".$phone->mob."','".mysql_prep($sender)."','".$now."')";
                }
                $i++;
            }
            $hSQL .= $hist;
            $db->query($hSQL);
        }

        if(is_array($phones) && is_array($messages)) {
            $i = 0;
            foreach($phones as $phone) {
            	$msgForDB = mysql_real_escape_string(stripcslashes($messages[$i]));
                if($i == 0) {
                    $hist = "(".$_SESSION['cus_id'].",'".$msgForDB."','".$phone->mob."','".mysql_prep($sender)."','".$now."')";
                }
                else {
                    $hist .= ",(".$_SESSION['cus_id'].",'".$msgForDB."','".$phone->mob."','".mysql_prep($sender)."','".$now."')";
                }
                $i++;
            }
            $hSQL .= $hist;
            $db->query($hSQL);
        }

        if(!is_array($phones) && !is_array($messages)) {
        	$msgForDB = mysql_real_escape_string(stripcslashes($messages));
            $hist = "(".$_SESSION['cus_id'].",'".$msgForDB."','".$phones."','".mysql_prep($sender)."','".$now."')";
            $hSQL .= $hist;
            $db->query($hSQL);
        }
    }

    /**
     * Deletes the temporary tables created in the system over
     * a period of time so that it does not hogs up the database
     */
    function deleteTempTable($tablename) {
        global $db;
        $q = "DROP TABLE `".$tablename."`";
        $db->query($q);
    }
    /**
     *
     * @param int $msgtype
     * @return int
     */
    function getDivFactor($msgtype) {
        $divFactor = 160;
        if(intval($msgtype)==0 || intval($msgtype)==1) {
            $divFactor = 160;
        }
        else {
            // Every unicode character will be encoded as 4 UTF-16BE bytes so the
            // effective length of 1 CHARACTER = 4 CHARACTERS
            // therefore we for unicode messages length of one message is
            // 280/4 = 70
            $divFactor = 70;
        }
        return $divFactor;
    }

    /**
     *
     * @param mixed $value
     * @return escaped mixed
     */
    function mysql_prep($value) {
        if(empty($value)) return "";
        if(get_magic_quotes_gpc()) {
            $value = stripslashes($value);
        } else {
            $value = mysql_real_escape_string($value);
        }
        return $value;
    }
?>