<?php
include_once "isadmin.php";
include_once "ez_sql.php";
$apiurl=$_POST['api'];
$username=$_POST['username'];
$password=$_POST['password'];
//$address="http://sms3.routesms.com/bulksms/login.asp?username=".$username."&password=".$password;
//$fh=fopen($address,"r");
//$admin = fread($fh,1);
//if($admin==1)
//{
	$q1="update sms_api set apilink ='".$apiurl."', username='".$username."', password='".$password."'";
	$db->query($q1);
	$url="new_routesms_msg.php";
/*}
else
{
	$_SESSION['route_api']='n';
	$url="routesms.php";
}*/
header("Location:$url"); 
?>