<?php
include_once "isadmin.php";
include_once "ez_sql.php";

@$name=$_POST['new_pack'];
@$amount=$_POST['amount'];
@$lower=$_POST['lower_limit'];
@$upper=$_POST['upper_limit'];

$descrption=$_POST['desc'];

$qnext="select max(pack_id) from package";
$newid = $db->get_var($qnext);

if($newid=="")
	$newid=1;
else
	$newid=$newid+1;

$q="insert into package (pack_id, package, cost, description,sms_lower, sms_upper, publish) values(".$newid.",'".$name."','".$amount."','".$descrption."', ".$lower.",".$upper.",1)";
$db->query($q);

$_SESSION['msg']="Package added";
header ("Location:packages.php"); 

?>
