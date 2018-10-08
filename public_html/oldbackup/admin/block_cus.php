<?php
include_once "isadmin.php";
include_once "ez_sql.php";
@$id=$_GET['id'];
@$val=$_GET['val'];

if(is_nan($id) || is_nan($val))
	header("Location:index.php");

$q="update customer set block=".$val." where cus_id =".$id;
$update=$db->query($q);

if ($val==1)
	$_SESSION['cus_msg'].="Customer Blocked";
else
	$_SESSION['cus_msg'].="Customer Un-Blocked";

header ("Location:customers.php");

?>
