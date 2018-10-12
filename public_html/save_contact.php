<?php
	include_once "iscustomer.php";
	include_once "admin/ez_sql.php";
	
	//This file is called from add_contact.php form
	//Get name, phone and group of new contact
	
	$nm=$_POST['name'];
	$phone=$_POST['phone'];
	$group=$_POST['group_id'];	
	
	//query to add new contact in contacts table
	
	$q="insert into contacts (name, phone, group_id,cus_id) values('".$nm."','".$phone."',".$group.",".$_SESSION['cus_id'].")";
	$db->query($q);
	$_SESSION['msg_ad']='<div class="approved"><div class="typo-icon">Contact added</div></div>';
	header("Location:contacts.php");
?>