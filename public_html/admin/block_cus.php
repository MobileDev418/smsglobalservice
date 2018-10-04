<?php
include_once "isadmin.php";
include_once "ez_sql.php";
//Block or un_block any customer. File is called from customers.php file. 

//Get the id of customer and block action (block, un-block)(0,1)

@$id=$_GET['id'];
@$val=$_GET['val'];

if(is_nan($id) || is_nan($val))
	header("Location:index.php");

//update the 
$q="update customer set block=".$val." where cus_id =".$id;
$update=$db->query($q);

if ($val==1)
	$_SESSION['cus_msg'].="Customer Blocked";
else
	$_SESSION['cus_msg'].="Customer Un-Blocked";

header ("Location:customers.php");

?>
