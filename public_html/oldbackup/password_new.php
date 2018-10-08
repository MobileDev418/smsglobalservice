<?php
include_once "iscustomer.php";
include_once "admin/ez_sql.php";
$oldpass=md5($_POST['oldpass']);
$newpass=md5($_POST['pass1']);
$q="select cus_id from customer where cus_password='".$oldpass."' and cus_id=".$_SESSION['cus_id'];
$is_password=$db->get_var($q);

if($is_password)
{
	$q1="update customer set cus_password='".$newpass."' where cus_id=".$_SESSION['cus_id'];
	$db->query($q1);
	$url="password_new_msg.php";
}
else
{
	$url="change_password.php";
	$_SESSION['password_action']='<div class="alert"><div class="typo-icon">Old Password is in-correct</div></div>';
}

header("Location:$url");
?>