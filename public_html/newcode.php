<?php
/* when customer changes his profile and sender id is chnaged to some other mobile number then user account status becomes un-active and new activation code is send as an sms alert to the customer. */

include_once "iscustomer.php";
include_once "library_const.php";
include_once "admin/ez_sql.php";
$activation_code=rand(100000,900000);
$q="select fname, username , email, mobile from customer where cus_id=".$_SESSION['cus_id'];
$customer=$db->get_row($q);


/* Create a new random activation code */

$activation_code=rand(100000,900000);

/* Update customer account active status to zero and update the account with new acctivation code */
$q="update customer set activation_code='".$activation_code."' , active=0 where cus_id=".$_SESSION['cus_id'];
$db->query($q);


$_SESSION['cus_id']=0;
include_once "sms.class.php";
		
		$activation_message="Hello ".$customer->fname."! your need to validate your new mobile number. Your activation code for ".$WEBSITE_NAME." is ".$activation_code." Go to web page http://www.".$WEBSITE_NAME."/activate_code.php and activate your account. Thanks";
//		echo $activation_message;
		
		/* Create sms object */
		$sms=new sendsms();
		/* Send sms alert to customer */
		//$smscode=$sms->message($activation_message,$customer->mobile,"smsglobal",0);
		
		$qsid="select sender_id from default_sender_id  where id=1";	
		$sid=$db->get_var($qsid);


		$smscode=$sms->message($activation_message,$customer->mobile,$sid,0);

		
		$bodymail="Dear ".$fname." ".$lname.", You changed your mobile number in your profile for ".$WEBSITE_NAME." services, You need to validate your new mobile number. Please activate your account at http://www.".$WEBSITE_NAME."/activate_code.php by using the activation code sent to your new mobile number you provided. After activation you will be able to use ".$WEBSITE_NAME." services";
		/* Send mail to customer to activate his account */
		mail($email,$WEBSITE." New Activation Code",$bodymail);
		session_destroy();
		header("location:newactivation.php");
?>