<?php
	include_once "iscustomer.php";
	include_once "admin/ez_sql.php";
	//File is called from edit_contact.php form
	
	
	//Get contact name, phone, group id and contact_id
	
	@$nm=$_POST['name'];
	@$phone=$_POST['phone'];
	@$group=$_POST['group_id'];
	@$id=$_POST['cont_id'];
	
	
	//query to update contact in contacts table
	
	$q="update contacts set name='".$nm."', phone='".$phone."', group_id=".$group." where contact_id=".$id;
	$db->query($q);
	$_SESSION['msg_ad']='<div class="approved"><div class="typo-icon">Contact updated</div></div>';
	header("Location:contacts.php");
?>