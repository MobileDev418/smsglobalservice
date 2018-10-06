<?php
session_start();
//File to signin admin to admin control panel
include_once "../admin/ez_sql.php";
//Get username and password

$name=$_POST['name'];
$password=md5($_POST['password']);

//query to validate admin
$q="select cus_id, fname, lname from customer where username='".$name."' and cus_password='".$password."' and is_salesperson=1 and active=1 and block=0";
//echo $q;

$spadmin=$db->get_row($q);

if($spadmin->cus_id!="") //if admin is validated then store admin session variables
{
	$_SESSION['sp_adminname']=$spadmin->fname." " .$spadmin->lname;
	$_SESSION['sp_adminid']=$spadmin->cus_id;
	$url="index.php";
	$_SESSION['spadmin']='y';
	$actionq="insert into salesperson_actionlog (spid,action,action_date) values (".$_SESSION['sp_adminid'].",'Login to sales person admin panel','".date('Y-m-d H:i:s')."')";
	$db->query($actionq);
}
else
{
	$url="login.php";
	$_SESSION['spadmin']='n';
}
header("Location:$url");
?>