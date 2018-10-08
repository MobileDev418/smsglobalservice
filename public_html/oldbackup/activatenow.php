<?php
session_start();
if ($_SESSION['usersignin']=="")
	header("Location:index.php");

include_once "library_const.php";
include_once "admin/ez_sql.php";
include_once "sms.class.php";

$q="select cus_id, fname, mobile, username, activation_code from customer where username='".$_SESSION['usersignin']."'";
//echo $q;
$cus=$db->get_row($q);
if($cus->username!="")
{
	$_SESSION['cus_id']=0;
	$activation_message="Hello ".$cus->fname."! your activation code for ".$WEBSITE_NAME." is ".$cus->activation_code." and username is ".$cus->username." go to web page http://www.".$WEBSITE_NAME."/activate_code.php and activate your account. Thanks";
//	echo $activation_message;
	$cus_cell=$cus->mobile;
//	echo "Mobile number is".$cus_cell;
	$sms=new sendsms();
	$smscode=$sms->message($activation_message,$cus_cell,"Eric",0);
}

$_SESSION['newactive']='<div class="note"><div class="typo-icon">We have resend you your username and activation code on your mobile. Enter that code to activate your account.</div></div>';
$_SESSION['usersignin']="";
$_SESSION['cus_id']="";
header ("Location:activate_code.php");  

?>