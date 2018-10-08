<?php
session_start();
include_once "admin/ez_sql.php";
$username=$_POST['username'];
$password=md5($_POST['password']);
$_SESSION['login_err']="";
//echo $name."<br/>";
//echo $password;
$q="select cus_id, fname, mobile, username, active, block from customer where username='".$username."' and cus_password='".$password."'";
//echo $q;
$cus=$db->get_row($q);

if($cus=="")
{
	$_SESSION['login_err']='<div class="alert"><div class="typo-icon" style="font-size:11.5px; padding-right:0px; padding-left:30px;">Invalid Username/Password</div></div>';
	header("location:index.php");
}
elseif($cus->active==0)
{
	
		$_SESSION['login_err']='<div class="alert"><div class="typo-icon" style="font-size:11.5px; padding-right:0px; padding-left:30px;">Your account is not activated. <a href="activatenow.php">click here to activate your account now</a></div></div>';
		$_SESSION['usersignin']=$username;
}

elseif($cus->block==1)
{
	$_SESSION['login_err']='<div class="alert"><div class="typo-icon" style="font-size:11.5px;padding-right:0px; padding-left:30px;">Your account is blocked</div></div>';
}
else
{
	$_SESSION['cus_login']='yes';
	$_SESSION['cus_uname']=$cus->username;
	$_SESSION['cus_name']=$cus->fname. "". $cus->lname;
	$_SESSION['cus_mobile']=$cus->mobile;
	$_SESSION['cus_id']=$cus->cus_id;
	
}
header("Location:index.php");

?>