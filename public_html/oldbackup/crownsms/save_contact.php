<?php
	session_start();
	include_once "admin/ez_sql.php";
	$cus_title=$_POST['cus_title'];
	$nm=$_POST['name'];
	$lname=$_POST['lname'];
	$phone=$_POST['phone'];
	$group=$_POST['group_id'];
	$custom=$_POST['custom'];

	$nextid=$db->get_var("select max(contact_id) from contacts");
	if(is_null($nextid))
		$nextid=1;
	else
		$nextid=$nextid+1;
	$q="insert into contacts (contact_id, cus_title, name, lname, phone, group_id,cus_id,custom) values(".$nextid.",'".$cus_title."','".$nm."','".$lname."','".$phone."',".$group.",".$_SESSION['cus_id'].",'".$custom."')";
	$db->query($q);
	$_SESSION['msg_ad']="<div class='act_msg'>Contact added</div>";
	header("Location:contacts.php");
?>