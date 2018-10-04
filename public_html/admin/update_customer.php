<?php
include_once "isadmin.php";
include_once "ez_sql.php";

//File that updates customer password. File is called from set_new_password.php file
//Get id of customer and password from submitted form and update customer password

@$id=$_POST['cid'];
$mobilno=$_POST['mobile_no'];
$freesms=$_POST['free_sms'];
$activationcode=$_POST['activation_code'];
$active=$_POST['isactive'];
$spowner=$_POST['sp_owner'];


$q="update customer set mobile='".$mobilno."', free_sms=".$freesms.", activation_code='".$activationcode."', active=".$active;

if($spowner==0)
	$q=$q." , belong_to_sp=''";
else
	$q=$q." , belong_to_sp=".$spowner;
	

$q=$q." where cus_id=".$id;


$update=$db->query($q);


$_SESSION['cus_msg']="Customer Record Updated";

header ("Location:customers.php");

?>
