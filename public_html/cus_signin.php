<?php
session_start();
include_once "admin/ez_sql.php";

/* Get username and paasword. Convert password into md5 encryption to validate it in database */
$username=$_POST['username'];
$password=md5($_POST['password']);

$_SESSION['login_err']="";
//echo $name."<br/>";
//echo $password;
$q="select cus_id, fname, mobile, username, active, block, currentsid from customer where username='".$username."' and cus_password='".$password."'";
//echo $q;
$cus=$db->get_row($q);

if($cus=="")
{
	/* if customer username and password is not valid then redirect the user to home page with invalid username and password message */
	$_SESSION['login_err']='<div class="alert"><div class="typo-icon" style="font-size:11.5px; padding-right:0px; padding-left:30px;">Invalid Username/Password</div></div>';
	header("location:index.php");
}
elseif($cus->active==0)
{
	
		/* if customer statis is not active then send message to customer to activate his account */
		$_SESSION['login_err']='<div class="alert"><div class="typo-icon" style="font-size:11.5px; padding-right:0px; padding-left:30px;">Your account is not activated. <a href="activatenow.php">click here to activate your account now</a></div></div>';
		$_SESSION['usersignin']=$username;
}

elseif($cus->block==1)
{
	/* if customer is blocked then send message to customer that your account is blocked */
	$_SESSION['login_err']='<div class="alert"><div class="typo-icon" style="font-size:11.5px;padding-right:0px; padding-left:30px;">Your account is blocked</div></div>';
}
else
{
	/* if all above checks are validated and customer account is active and customer is not blokced and customer username and passwords are valid then set session variables of user and redirects the customer to index page with registered user privilidegse */
	$_SESSION['cus_login']='yes';
	$_SESSION['cus_uname']=$cus->username;
	$_SESSION['cus_name']=$cus->fname. "". $cus->lname;
	$_SESSION['cus_mobile']=$cus->mobile;
	$_SESSION['cus_senderid']=$cus->currentsid;
	$_SESSION['cus_id']=$cus->cus_id;
	
}
header("Location:send_sms.php");

?>