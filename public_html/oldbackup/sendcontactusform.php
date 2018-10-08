<?php
session_start();
include_once "admin/ez_sql.php";
include_once "library_const.php";

@$name=$_POST['name'];
@$email=$_POST['email'];
@$message=$_POST['message'];

if (! ($_SESSION['security_code'] == $_POST['code'] && !empty($_SESSION['security_code'])))
{
	$_SESSION['ct_name']=$name;
	$_SESSION['ct_email']=$email;
	$_SESSION['ct_message']=$message;
	$_SESSION['contactus_err']='<div class="alert"><div class="typo-icon">Invalid security code</div></div>';
	header("location:contactus.php");
}
else
{
	$q="insert into contactus (name, email, message, contact_date) values ('".$name."','".$email."','".$message."','".date('y-m-d')."') ";
	$db->query($q);	
	$emailmessage="Following vistor of ".$WEBSITE_NAME. " send contact us form\n";
	$emailmessage.="\nName: ".$name;
	$emailmessage.="\nEmail: ".$email;
	$emailmessage.="\nMessage:".$message;
	mail($ADMIN_FROM_EMAIL,"Contact Us Form Submission",$emailmessage,"From:".$ADMIN_EMAIL);
	header("Location:contactus_send.php?name=".$name);
}

?>