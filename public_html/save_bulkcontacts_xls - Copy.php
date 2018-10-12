<?php
session_start();
include_once "admin/ez_sql.php";
$group=$_POST['group_id'];
$path = 'bulk_export/';

$cntTable = "contacts";
/*
* New Classes
*/
require_once 'phpClass/clsPHPExcel.php';
require_once 'phpClass/clsFileUploader.php';
include_once 'common.utils.php';

$phNumbers = array();

$importedFileType = $_FILES["txtcontacts"]["type"];
//echo $importedFileType;
if (($importedFileType == FILE_TYPE_EXCEL2003) || ($importedFileType == FILE_TYPE_EXCEL2007 || $importedFileType='application/ms-excel'))
{
    $uploader = new clsFileUploader($_FILES["txtcontacts"], $path);
    if($uploader->uploadFile())
    {
        // clsPHPExcel Object
        $xlreader = new clsPHPExcelReader($uploader->uploadedFilenameWithPath);
        $phNames = $xlreader->getPhoneNumbersArrayFromColumn(1000, 'A', false, false);
		$phNumbers = $xlreader->getPhoneNumbersArrayFromColumn(1000, 'B', false, false);
		
        $xlreader->closeReader();
        $uploader->deleteUploadedFile();

        $uploader = null;
        $xlreader = null;

      	$i=0;

        foreach($phNumbers as $number) {
            $q="insert into ".$cntTable." (name, phone, group_id,cus_id) values('".$phNames[$i]."','".$number."',".$group.",".$_SESSION['cus_id'].")";
			//echo $q;
			$i++;
            $db->query($q);
        }
    }
    else
    {
		$_SESSION['msg_ad']='<div class="approved"><div class="typo-icon">'.$uploader->errorText.'</div></div>';
    }
	$_SESSION['msg_ad']='<div class="approved"><div class="typo-icon">Contacts imported successfully</div></div>';
    header("Location:contacts.php");
}
else
	$_SESSION['msg_ad']='<div class="approved"><div class="typo-icon">Upload File Error. Please try again...</div></div>';
	header("Location:contacts.php");
?>