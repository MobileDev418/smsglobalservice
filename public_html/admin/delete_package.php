<?php
include_once "isadmin.php";
include_once "ez_sql.php";

//Delete any package. File is called from packages.php file. 

//Get the id of package to delete from query string

@$id=$_GET['id'];
if(is_nan($id))
	header("Location:index.php");

$del=$db->query("delete from package where pack_id=".$id);
$_SESSION['msg'].="Package deleted";
header("Location:packages.php"); 

?>