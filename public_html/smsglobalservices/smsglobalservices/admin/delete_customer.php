<?php
include_once "isadmin.php";
include_once "ez_sql.php";

//Delete any customer. File is called from customers.php file. 

//Get the id of customer to delete from query string

@$id=$_GET['id'];
if(is_nan($id))
	header("Location:index.php");
	
//delete customer record from customers, contacts, sms_group and histroy table

$del=$db->query("delete from customer where cus_id=".$id);
$del=$db->query("delete from contacts where cus_id=".$id);
$del=$db->query("delete from sms_group where cus_id=".$id);
$del=$db->query("delete from history where cus_id=".$id);


$_SESSION['cus_msg'].="Customer deleted";
header("Location:customers.php"); 

?>