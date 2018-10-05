<?php
    require_once 'Classes/PHPExcel/IOFactory.php';

    /**
     * @name clsPHPExcelReader
     * @author Shrikant Meena
     */
    class clsPHPExcelReader {
        private $objPHPExcel;
        private $objWorksheet;
        public $messageCount;
        /**
         *
         * @param string $filename
         */
        function __construct($filename) {
            $this->objPHPExcel = PHPExcel_IOFactory::load($filename);
            $this->objWorksheet = $this->objPHPExcel->getActiveSheet();
            $this->messageCount = 0;
        }

        function closeReader() {
            $this->objWorksheet = null;
            $this->objPHPExcel = null;
        }

        /**
         *
         * @param alphanumeric $alphaCoordinates
         * @return boolean
         */
        private function isDataPresent($alphaCoordinates) {
            $data = $this->objWorksheet->getCell($alphaCoordinates)->getValue();
            if(empty($data))
                return false;
            return true;
        }

        /**
         *
         * @param alphanumeric $targetCell
         * @return mixed
         */
        private function getCellDataAsString($targetCell) {
            $retVal = (string) $this->objWorksheet->getCell($targetCell)->getValue();
            return $retVal;
        }

        /**
         *
         * @param integer $arlength
         * @param character $alphabeticCol
         * @param boolean $getValidPhoneNumbersOnly
         * @return integer array
         */
        function getPhoneNumbersArrayFromColumn($arlength, $alphabeticCol, $getValidPhoneNumbersOnly = true, $returnUniqueNumbers = true) {
            $data_array = array();

            $tCell = (string) ($alphabeticCol.'1');
            $this->isDataPresent($tCell) ? $start = 1 : $start = 2;

            for($i=$start; $i<=$arlength; $i++) {
                $tCell = (string) ($alphabeticCol.$i);
                // @todo Push this check after one iteration
                if($this->isDataPresent($tCell)) {
                    $cellData = $this->getCellDataAsString($tCell);
                    if($getValidPhoneNumbersOnly) {
                        if(intval($cellData) != 0)
                            array_push($data_array, $cellData);
                    }
                    else
                        array_push($data_array, $cellData);
                }
                else
                    break;
            }
            if($returnUniqueNumbers)
                return array_unique($data_array);

            return $data_array;
        }

        /**
         *
         * @param integer $startRow
         * @return string array
         */
        function getMessagesArrayFromColumns($startRow = 2, $divisionFactorForMessageLength = 160) {
            $data_array = array();

            $columnIndexes = "B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z";
            $columnArray = explode(",", $columnIndexes);

            $currentRow = $startRow;
            $currentColumnIndex = 0;
            $originalMessage = "";

            while ($this->isDataPresent($columnArray[$currentColumnIndex].$currentRow)) {
                do {
                    $msgText = $this->getCellDataAsString($columnArray[$currentColumnIndex].$currentRow);
                    $msgText = trim($msgText);
                    if($currentColumnIndex > 0) {
                        $msgText = " ".$msgText;
                    }
                    $originalMessage .= $msgText;
                    $currentColumnIndex++;
                } while ($this->isDataPresent($columnArray[$currentColumnIndex].$currentRow));

                $this->messageCount += ceil(strlen($originalMessage) / $divisionFactorForMessageLength);
                array_push($data_array, $originalMessage);
                $currentColumnIndex = 0;
                $currentRow++;
                $originalMessage = "";
            }
            return $data_array;
        }
    }
?>