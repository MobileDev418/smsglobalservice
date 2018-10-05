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
@$city=$_POST['city'];
@$address=$_POST['address'];
$senderidoption=$_POST['senderidoption'];

//if new sender_id option is selected and users adds a new sender_id then we need to make the new sender_id as session['sender_id'] and needs to add a new sender_id in sender_id table

if($senderidoption=="addnewid")
{
	$cell=$_POST['cell'];
}
else
{
	$cell=$_POST['mysenderid'];
}

//query to update customer sender_id

$q="update customer set fname='".$fname."', lname='".$lname."', email='".$email."', country=".$country.", city='".$city."', address='".$address."', mobile='".$cell."' where cus_id=".$_SESSION['cus_id'];
$db->query($q);

$_SESSION['profile_action']='<div class="approved"><div class="typo-icon">Profile updated</div></div>';


//new check that sender_id already exists or not and sender id is a number format or not. 

$oldcell=$db->get_var("select sender_id from sender_ids where cus_id=".$_SESSION['cus_id']." and sender_id='".$cell."'");

//if the sender_id is new then add it in sender_ids table
if($oldcell=="")
{
	$addnewq="insert into sender_ids (cus_id, sender_id) values (".$_SESSION['cus_id'].",'".$cell."')";
	$db->query($addnewq);
	/*after adding new sender_id into sender_ids table check that sender_id is in a number format. if it is in number fomrat then create a new activation code for customer to acctivate his account again */
	
	if(is_numeric($cell))
	{
		// "New Activation Code is Required then jusmp to newcode.php file to send new activation code to customer";
		header("Location:newcode.php");
	}
	else
	{
		$_SESSION['cus_mobile']=$cell;
		header("Location:profile.php");
	}
}
else
{
	$_SESSION['cus_mobile']=$cell;
	header("Location:profile.php");
}

?>