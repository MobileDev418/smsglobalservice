<?php
include_once "is_spadmin.php";
include_once "../admin/ez_sql.php";
//Activate or un_activate any customer. File is called from customers.php file. 
//Get the id of customer and block action (block, un-block)(0,1)
@$id=$_GET['id'];
@$val=$_GET['val'];
if(is_nan($id) || is_nan($val))
	header("Location:index.php");
include_once "is_sp_client.php";
if($is_sp_client=="")
	header ("Location:customers.php");


$q="update customer set active=".$val." where cus_id =".$id;
$update=$db->query($q);

if ($val==1)
{
	$_SESSION['cus_msg']="Customer Activated";
	$actionq="insert into salesperson_actionlog (spid,action,action_date) values (".$_SESSION['sp_adminid'].",'Customer(id=".$id.") Activated','".date('Y-m-d H:i:s')."')";
	$db->query($actionq);

}
else
{
	$_SESSION['cus_msg']="Customer In-Activated";
	$actionq="insert into salesperson_actionlog (spid,action,action_date) values (".$_SESSION['sp_adminid'].",'Customer(id=".$id.") In-Activated','".date('Y-m-d H:i:s')."')";
	$db->query($actionq);

}


header ("Location:customers.php");

?>
