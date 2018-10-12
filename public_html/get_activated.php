<?php
session_start();
/* This file activates the customer account */
include_once "admin/ez_sql.php";
include_once "library_const.php";
@$uname=$_POST['username'];
@$code=$_POST['act_code'];
$_SESSION['activation_error']="";

$q="select active from customer where username='".$uname."'";
//echo $q;
$useractive=$db->get_var($q);
//echo $useractive;
//Check that customer is already activates account 
if($useractive==1)
{			
	$_SESSION['activation_error']='<div class="alert"><div class="typo-icon">You account has alreday activated.</div></div>';
	header ("location:activate_code.php"); 
}
else
{
	//Query to check for valid username and activation account 
	$q="select username from customer where username='".$uname."' and activation_code='".$code."'";
	//echo $q;			
	$username=$db->get_var($q);
	//echo $nm;
	//Check for valid username and activation account 
	if($username=="")
	{			
		$_SESSION['activation_error']='<div class="alert"><div class="typo-icon">Your activation code is not valid. </div></div>';
		header ("Location:activate_code.php"); 
	}
	else
	{
		/* Update customer account status to active, set user session variables and logins the user to application */
		$q="Update customer set active=1, activation_date='".$GM_DATEANDTIME."' where username='".$uname."'";
		//echo $q;
		$updatecustomer=$db->query($q);




		
		$q="select cus_id, fname, lname, username, mobile from customer where  username='".$uname."'";
		$customer=$db->get_row($q);
		$_SESSION['cus_id']=$customer->cus_id;
		$_SESSION['cus_login']="yes";
		$_SESSION['cus_activated']="yes";
		$_SESSION['cus_uname']=$customer->username;;
		$_SESSION['cus_name']=$customer->fname." ".$customer->lname;
		$_SESSION['cus_mobile']=$customer->mobile;
		$_SESSION['cus_senderid']=$customer->currentsid;	


		$q="Update customer_mobilenos set activated=1 where cusid=".$customer->cus_id;
		//echo $q;
		$updatecustomermobile=$db->query($q);

		
	 	header ("Location:activated.php");  
	}

}

?>
