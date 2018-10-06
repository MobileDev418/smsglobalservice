<?php
include_once "is_spadmin.php";
include_once "../admin/ez_sql.php";
//file to change admin password
//Get old and new password from changepassword.php form
//Get Form data

$oldpass=md5($_POST['oldpass']);
$newpass=md5($_POST['pass1']);

$q="select fname from customer where cus_password='".$oldpass."' and cus_id=".$_SESSION['sp_adminid'];
//echo $q;
$is_spadmin=$db->get_var($q);
//Check for old passowrd

if($is_spadmin) //if old pasword is coorect then change the password to newpassword
{
	$q1="update customer set cus_password='".$newpass."' where cus_id=".$_SESSION['sp_adminid'];
//	echo $q1;
	$db->query($q1);
	$actionq="insert into salesperson_actionlog (spid,action,action_date) values (".$_SESSION['sp_adminid'].",'Changed Password','".date('Y-m-d H:i:s')."')";
	$db->query($actionq);
	$url="password_new_msg.php";
}
else
{
	$_SESSION['pass']='n';
	$url="changepassword.php";
}
header("Location:$url");
?>