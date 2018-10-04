<?php
include_once "isadmin.php";
include_once "ez_sql.php";
//Assign and un-addign privilidges of a sales perosn

//Get the id of customer and block action (block, un-block)(0,1)

@$id=$_GET['id'];
@$val=$_GET['val'];

if(is_nan($id) || is_nan($val))
	header("Location:index.php");

//update the 
$q="update customer set is_salesperson=".$val." where cus_id =".$id;
$update=$db->query($q);

if ($val==1)
{
	$_SESSION['cus_msg'].="Customer gets privilidges of a sales person";
}
else
{
	$q='update customer set belong_to_sp="" where belong_to_sp='.$id;
	$update=$db->query($q);
	$_SESSION['cus_msg'].="Privilidges of a sales person is revoked";
}

header ("Location:customers.php");

?>
