<?php

include_once "iscustomer.php";
include_once "library_const.php";
include_once "admin/ez_sql.php";
$activation_code=rand(100000,900000);
$q="select fname, username , email, mobile from customer where cus_id=".$_SESSION['cus_id'];
$customer=$db->get_row($q);

$activation_code=rand(100000,900000);

$q="update customer set activation_code='".$activation_code."' , active=0 where cus_id=".$_SESSION['cus_id'];
$db->query($q);

$_SESSION['cus_id']=0;
include_once "sms.class.php";
		
		$activation_message="Hello ".$customer->fname."! your need to validate your new mobile number. Your activation code for ".$WEBSITE_NAME." is ".$activation_code." Go to web page http://www.".$WEBSITE_NAME."/activate_code.php and activate your account. Thanks";
//		echo $activation_message;
		$sms=new sendsms();
		$smscode=$sms->message($activation_message,$customer->mobile,"Eric",0);
		$bodymail="Dear ".$fname." ".$lname.", You changed your mobile number in your profile for ".$WEBSITE_NAME." services, You need to validate your new mobile number. Please activate your account at http://www.".$WEBSITE_NAME."/activate_code.php by using the activation code sent to your new mobile number you provided. After activation you will be able to use ".$WEBSITE_NAME." services";
		mail($email,$WEBSITE." New Activation Code",$bodymail);
		session_destroy();
		header("location:newactivation.php");
?>