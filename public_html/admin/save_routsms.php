<?php
include_once "isadmin.php";
include_once "ez_sql.php";

//get form data submiited from routesms.php file

$apiurl=$_POST['api'];
$username=$_POST['username'];
$password=$_POST['password'];

//update api info in sms_api table
	$q1="update sms_api set apilink ='".$apiurl."', username='".$username."', password='".$password."'";
	$db->query($q1);
	$url="new_routesms_msg.php";

header("Location:$url"); 
?>