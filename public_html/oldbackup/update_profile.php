<?php

include_once "iscustomer.php";
include_once "admin/ez_sql.php";

@$fname=$_POST['fname'];
@$lname=$_POST['lname'];
@$uname=$_POST['username'];
@$email=$_POST['email'];
@$country=$_POST['country'];
@$city=$_POST['city'];
@$address=$_POST['address'];
@$cell=$_POST['cell'];

$q="update customer set fname='".$fname."', lname='".$lname."', email='".$email."', country=".$country.", city='".$city."', address='".$address."', mobile='".$cell."' where cus_id=".$_SESSION['cus_id'];
$db->query($q);
$_SESSION['profile_action']='<div class="approved"><div class="typo-icon">Profile updated</div></div>';

if($_SESSION['cus_mobile']!=$cell)
	header("Location:newcode.php");
else
	header("Location:profile.php");

?>