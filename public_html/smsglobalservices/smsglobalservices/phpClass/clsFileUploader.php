<?php
    define("FILE_TYPE_EXCEL2003", "application/vnd.ms-excel");
    define("FILE_TYPE_EXCEL2007", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    define("FILE_TYPE_PLAINTEXT", "text/plain");
    define("BYTES_IN_ONE_MB", 1048576);

    class clsFileUploader {

        public $uploadedFilenameWithPath;
        public $errorText;

        private $sizeLimitInBytes;
        private $fileArray;

        /**
         *
         * @param string $filename
         * @param string $pathonserver like uploads/
         * @param int $sizelimitinMB
         */
        function  __construct($farray, $pathonserver, $sizelimitinMB = 2) {
            $this->fileArray = $farray;
            $this->sizeLimitInBytes = $this->megaBytesToBytes($sizelimitinMB);
            $this->uploadedFilenameWithPath = $pathonserver.uniqid("upload_")."_".time().".".$this->getFileExtension($this->fileArray['name']);
        }

        /**
         *
         * @param string $fileName
         * @return string
         */
        private function getFileExtension($fileName) {
            return strtolower(end(explode(".", $fileName)));
        }

        /**
         *
         * @param int $mb
         * @return decimal
         */
        private function megaBytesToBytes($mb) {
            return round($mb * BYTES_IN_ONE_MB);
        }

        private function bytesToMegaBytes($bytes) {
            return round($bytes / BYTES_IN_ONE_MB, 1);
        }

        function deleteUploadedFile() {
            if(unlink($this->uploadedFilenameWithPath))
                $this->uploadedFilenameWithPath = "";
        }

        function uploadFile() {
            if($this->fileArray['type'] == FILE_TYPE_EXCEL2003 || $this->fileArray['type'] == FILE_TYPE_EXCEL2007  || $this->fileArray['type'] == FILE_TYPE_PLAINTEXT) {
                if($this->fileArray['error'] > 0) {
                    $this->errorText = "Some error occured during the upload. Error code is ".$this->fileArray['error'];
                    return false;
                }
                else {
                    if($this->fileArray['size'] < $this->sizeLimitInBytes) {
                        move_uploaded_file($this->fileArray['tmp_name'], $this->uploadedFilenameWithPath);
                        $this->errorText = "";
                    }
                    else {
                        $this->errorText = "Filesize must not be greater than ".$this->bytesToMegaBytes($this->sizeLimitInBytes)." MB.";
                        return false;
                    }
                }
            }
            else {
                $this->errorText = "File must be either Excel 2003, Excel 2007 or a Plain text file.";
                return false;
            }
            return true;
        }
    }
?>