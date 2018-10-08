<?php
	if($_POST['submit']=="")
		header("location:send_sms.php");
	include_once "iscustomer.php";
	include('fileImporter.class.php');
	$heading='Bulk SMS -  Send SMS';
	$menu=9;
	include_once "header.php";
	include_once "admin/ez_sql.php";
	include_once "sms.class.php";
	@$message=$_POST['txtmessage'];
	@$sender=$_POST['sender'];
	@$msgtype=$_POST['ddtype'];
	@$msg_opt=$_POST['send_opt'];
	$optmsg="";
    //set the temp dir
    $path = 'bulk_export';
    //create an object of this class
	//$table=$_POST['table'];
	$table="sms_".$_SESSION['cus_id']."_".time();
	$qtable="CREATE TABLE ".$table." ( mobile bigint(20) )  ";
	$db->query($qtable);
	//$table=$_POST['table'];
	
    $importer = new fileImporter( $path , 'smsglob_smsglobal', $table);
    //create DB connection, if DB is not connected
    $importer->connectDatabase( 'localhost', 'smsglob_sms' ,'pakistan@123');
	
    //set delimiter,by defult tab  
    $importer->setDelimiter('tab'); //FOR COMMA,use $importer->setDelimiter('comma');
    //import file

    if( $importer->importFile() ) {
		$optmsg.="<span style='color:#FF0099'>File imported successfully</span>"; 
    } else {
        $optmsg.="<span style='color:#FF0000'>Error Occured!Please try again<span>";
    }    
		 
	 if($msg_opt==1)
	 {
		 	include_once "send_bulkmessge.php";
	 }
	 else
	 {
		 	include_once "schedule_bulk_messge.php";
	 }
    //$db->query("drop table ".$table)	
	include_once "right.php";
	include_once "footer.php";
?>
