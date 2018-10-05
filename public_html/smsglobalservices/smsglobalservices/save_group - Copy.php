<?php
	include_once "iscustomer.php";
	include_once "admin/ez_sql.php";
	$nm=$_POST['name'];
	$q="insert into sms_group(name,cus_id) values('".$nm."',".$_SESSION['cus_id'].")";
	$db->query($q);
	$_SESSION['cont_msg']='<div class="approved"><div class="typo-icon">Group added</div></div>';
	header("Location:groups.php");
?>