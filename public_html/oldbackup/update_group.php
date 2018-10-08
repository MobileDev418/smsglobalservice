<?php
	include_once "iscustomer.php";
	include_once "admin/ez_sql.php";
	@$nm=$_POST['name'];
	@$id=$_POST['group_id'];
	$q="update sms_group set name='".$nm."' where group_id=".$id;
	//echo $q;
	$db->query($q);
	$_SESSION['cont_msg']='<div class="approved"><div class="typo-icon">Group updated</div></div>';
	header("Location:groups.php");
?>