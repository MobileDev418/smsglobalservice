<?php
include_once "isadmin.php";
include_once "ez_sql.php";

//Activate or un_activate any customer. File is called from customers.php file. 

//Get the id of customer and activation action (activate, un-activate)(1,0)


@$id=$_GET['id'];
@$val=$_GET['val'];

if(is_nan($id) || is_nan($val))
	header("Location:index.php");

$q="update customer set active=".$val." where cus_id =".$id;
$update=$db->query($q);

if ($val==1)
	$_SESSION['cus_msg'].="Customer Activated";
else
	$_SESSION['cus_msg'].="Customer Un-Activated";

header ("Location:customers.php");

?>
