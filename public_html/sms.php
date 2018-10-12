<?php
	if($_POST['submit']=="")
		header("location:send_sms.php");
	include_once "iscustomer.php";
	
	/* File to send message as a result of single_sms, contact_sms and group_sms */
	include_once "admin/ez_sql.php";
	include_once "sms.class.php";
	$heading='Send SMS';
	$menu=9;
	
	/* Get Form Data */
	@$ph_list=$_POST['phone_list'];
	@$name_list=$_POST['name_list'];
	@$title_list=$_POST['title_list'];
	@$lname_list=$_POST['lname_list'];
	@$custom_list=$_POST['custom_list'];
	
	$phones=split(",",$ph_list);
	$names=split(",",$name_list);
	$lnames=split(",",$lname_list);
	$titles=split(",",$title_list);
	$customs=split(",",$custom_list);
	
	@$message=$_POST['txtmessage'];
	@$sender=$_POST['sender'];
	@$msgtype=$_POST['ddtype'];
	@$msg_opt=$_POST['send_opt'];
?>
<?php
	include_once "header.php";
?>
<?php

	 if($msg_opt==1)
	 {
		 	include_once "send_messge.php";
	 }
	 else
	 {
		 	include_once "schedule_messge.php";
	 }
	
?>

<?php

	include_once "right.php";
	include_once "footer.php";
?>
