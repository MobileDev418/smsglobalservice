<?php
include_once "iscustomer.php";
include_once "admin/ez_sql.php";
$oldpass=md5($_POST['oldpass']);
$newpass=md5($_POST['pass1']);
/* Page to change user password */
/* Query to check that old password is coorect */
$q="select cus_id from customer where cus_password='".$oldpass."' and cus_id=".$_SESSION['cus_id'];
$is_password=$db->get_var($q);

if($is_password)
{
	/* if old password is correct, change password */
	$q1="update customer set cus_password='".$newpass."' where cus_id=".$_SESSION['cus_id'];
	$db->query($q1);
	$url="password_new_msg.php";
}
else
{
	/* if old password is not correct, dont change password */
	$url="change_password.php";
	$_SESSION['password_action']='<div class="alert"><div class="typo-icon">Old Password is in-correct</div></div>';
}

header("Location:$url");
?>