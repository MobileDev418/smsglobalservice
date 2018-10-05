<?php
include_once "isadmin.php";
include_once "ez_sql.php";
//file to change admin password
//Get old and new password from changepassword.php form
//Get Form data

$oldpass=md5($_POST['oldpass']);
$newpass=md5($_POST['pass1']);

$q="select name from admin where password='".$oldpass."' and name='".$_SESSION['admin_name']."'";
//echo $q;
$is_admin=$db->get_var($q);
//Check for old passowrd

if($is_admin) //if old pasword is coorect then change the password to newpassword
{
	$q1="update admin set password='".$newpass."' where name='".$_SESSION['admin_name']."'";
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