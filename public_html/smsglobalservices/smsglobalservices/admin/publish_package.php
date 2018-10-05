<?php
include_once "isadmin.php";
include_once "ez_sql.php";
//publish or un publish any sms package. File is called from packages.php file. 

//Get the id of package and publish action (publish, un-publish)(1,0)
 
@$id=$_GET['id'];
@$val=$_GET['val'];

if(is_nan($id) || is_nan($val))
	header("Location:index.php");

$q="update package set publish=".$val." where pack_id =".$id;
$update=$db->query($q);

if ($val==1)
	$_SESSION['msg'].="Package published";
else
	$_SESSION['msg'].="Package un-published";

header ("Location:packages.php");

?>
