<?php
session_start();

//File is called from packages page.
//Get package id, new name, new amout, upper and lower range of sms and package description


include_once "ez_sql.php";
$id=$_POST['package_id'];
$name=$_POST['new_name'];
$amount=$_POST['new_amount'];
$smslower=$_POST['new_sms_lower'];
$smsupper=$_POST['new_sms_upper'];

$buynowlink=$_POST['new_buynowlink'];

$desc=$_POST['new_desc'];

//query to update package info in package table

$q="update package set package='".$name."' , cost='".$amount."',sms_lower=".$smslower." ,sms_upper=".$smsupper." ,  description='".$desc."',  buynowlink ='".$buynowlink."' where pack_id=".$id;
//echo $q;

$db->query($q);
$_SESSION['msg']="Package updated";
$url="packages.php";
header ("Location:$url"); 

?>
