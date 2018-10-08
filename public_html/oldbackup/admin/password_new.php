<?php
include_once "isadmin.php";
include_once "ez_sql.php";
$oldpass=md5($_POST['oldpass']);
$newpass=md5($_POST['pass1']);
$q="select name from admin where password='".$oldpass."'";
$is_admin=$db->get_var($q);
if($is_admin)
{
	$q1="update admin set password='".$newpass."'";
	$db->query($q1);
	$url="password_new_msg.php";
}
else
{
	$_SESSION['pass']='n';
	$url="changepassword.php";
}
header("Location:$url");
?>