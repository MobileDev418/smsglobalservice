<?php
session_start();
include_once "ez_sql.php";
$name=$_POST['name'];
$password=md5($_POST['password']);
$q="select name from admin where name='".$name."' and password='".$password."'";
//echo $q;
$is_admin=$db->get_var($q);
if($is_admin)
{
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