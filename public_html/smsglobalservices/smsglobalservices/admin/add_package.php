<?php
include_once "isadmin.php";
include_once "ez_sql.php";

//File to add a new package in package table. File is called from packages.php file


@$name=$_POST['new_pack'];
@$amount=$_POST['amount'];
@$lowersms=$_POST['lowersms'];
@$uppersms=$_POST['uppersms'];

$descrption=$_POST['desc'];

$qnext="select max(pack_id) from package";
$newid = $db->get_var($qnext);

if($newid=="")
	$newid=1;
else
	$newid=$newid+1;

$q="insert into package (pack_id, package, cost,sms_lower,sms_upper, description, publish) values(".$newid.",'".$name."','".$amount."',".$lowersms.",".$uppersms.",'".$descrption."',1)";
$db->query($q);

$_SESSION['msg']="Package added";
header ("Location:packages.php"); 

?>
