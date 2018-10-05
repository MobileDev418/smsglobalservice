<?php
session_start();
//File to signin admin to admin control panel
include_once "ez_sql.php";
//Get username and password

$name=$_POST['name'];
$password=md5($_POST['password']);

//query to validate admin
$q="select name from admin where name='".$name."' and password='".$password."'";
//echo $q;

$is_admin=$db->get_var($q);
if($is_admin) //if admin is validated then store admin session variables
{
	$_SESSION['admin_name']=$is_admin;
	$url="index.php";
	$_SESSION['admin']='y';
}
else
{
	$url="login.php";
	$_SESSION['admin']='n';
}
header("Location:$url");
?>