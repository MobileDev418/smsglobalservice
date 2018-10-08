<?php
session_start();
include_once "ez_sql.php";
$id=$_POST['package_id'];
$name=$_POST['new_name'];
$amount=$_POST['new_amount'];

$lower=$_POST['lower_limit'];
$upper=$_POST['upper_limit'];


$desc=$_POST['new_desc'];



$q="update package set package='".$name."' , cost='".$amount."', description='".$desc."', sms_lower=".$lower.", sms_upper=".$upper." where pack_id=".$id;
//echo $q;
$db->query($q);
$_SESSION['msg']="Package updated";
$url="packages.php";
header ("Location:$url"); 

?>

