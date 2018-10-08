<?php
session_start();
include_once "admin/ez_sql.php";
include_once "library_const.php";
$email=$_POST['email'];

$q="select cus_id, username from customer where email='".$email."'";
$customer=$db->get_row($q);

if($customer->cus_id)
{
	$url="password_send.php";
	$newpass=time();
	$q="update customer set cus_password='".md5($newpass)."' where cus_id=".$customer->cus_id;
	//echo $q;
	$db->query($q);
	$body="User Name: ".$customer->username."\nNew Password: ".$newpass."\n http://www.".$WEBSITE_NAME;
	mail($email,"Your New Passsword for ".$WEBSITE_NAME."",$body,"From:".$ADMIN_EMAIL);
	
}
else
{
	$url="recoverpassword.php";
	$_SESSION['rc_password']='<div class="alert"><div class="typo-icon">This E-mail id is not registered</div></div>';
}
header("Location:$url");
?>