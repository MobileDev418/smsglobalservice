<?php
include_once "isadmin.php";
include_once "ez_sql.php";

//File that updates customer password. File is called from set_new_password.php file
//Get id of customer and password from submitted form and update customer password

@$id=$_POST['id'];

if(is_nan($id) || is_nan($val))
	header("Location:index.php");

$q="update customer set cus_password='".md5($_POST['pass1'])."' where cus_id=".$id;
$update=$db->query($q);
$_SESSION['cus_msg']="Customer Password Changed";

header ("Location:customers.php");

?>
