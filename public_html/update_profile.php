<?php

include_once "iscustomer.php";
include_once "admin/ez_sql.php";

//File is called from change_profile.php form
//Gt Form data
@$fname=$_POST['fname'];
@$lname=$_POST['lname'];
@$uname=$_POST['username'];
@$email=$_POST['email'];
@$country=$_POST['country'];
@$mobile=$_POST['umobile'];
@$city=$_POST['city'];
@$address=$_POST['address'];
$senderidoption=$_POST['senderidoption'];

//if new sender_id option is selected and users adds a new sender_id then we need to make the new sender_id as session['sender_id'] and needs to add a new sender_id in sender_id table


if($senderidoption=="addnewid")
{
	$user_senderid=$_POST['cell'];

	$oldsenderid=$db->get_var("select sender_id from sender_ids where cus_id=".$_SESSION['cus_id']." and sender_id='".$user_senderid."'");
	if($oldsenderid=="")
	{
		$addnewq="insert into sender_ids (cus_id, sender_id) values (".$_SESSION['cus_id'].",'".$user_senderid."')";
		$db->query($addnewq);	
	}

	$_SESSION['cus_senderid']=$user_senderid;

}
else
{
	$user_senderid=$_POST['mysenderid'];
	$_SESSION['cus_senderid']=$user_senderid;
}
//query to update customer sender_id

$q="update customer set fname='".$fname."', lname='".$lname."', mobile='".$mobile."', email='".$email."', country=".$country.", city='".$city."' , currentsid='".$user_senderid."' where cus_id=".$_SESSION['cus_id'];
$db->query($q);

$_SESSION['profile_action']='<div class="approved"><div class="typo-icon">Profile updated</div></div>';


//new check that mobile number already exists or not and sender id is a number format or not. 


$oldmobilenumber=$db->get_var("select mobileno from customer_mobilenos where cusid=".$_SESSION['cus_id']." and mobileno='".$mobile."' and activated=1");


if ($oldmobilenumber=="")
{
	$q1="insert into customer_mobilenos (cusid, mobileno, activated) values (".$_SESSION['cus_id'].", '".$mobile."',0)";
	$db->query($q1);

	
	// "New Activation Code is Required then jusmp to newcode.php file to send new activation code to customer";
	$_SESSION['cus_mobile']=$mobile;
	header("Location:newcode.php");
	
}
else
{
	$_SESSION['cus_mobile']=$mobile;
	header("Location:profile.php");
}

?>