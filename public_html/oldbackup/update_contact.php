<?php
	include_once "iscustomer.php";
	include_once "admin/ez_sql.php";
	@$nm=$_POST['name'];
	@$phone=$_POST['phone'];
	@$group=$_POST['group_id'];
	@$id=$_POST['cont_id'];
	$q="update contacts set name='".$nm."', phone='".$phone."', group_id=".$group." where contact_id=".$id;
	$db->query($q);
	$_SESSION['msg_ad']='<div class="approved"><div class="typo-icon">Contact updated</div></div>';
	header("Location:contacts.php");
?>