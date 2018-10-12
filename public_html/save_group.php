<?php
	include_once "iscustomer.php";
	//Add a new group in sms_group table
	//This file is called from add_group.php form
	
	include_once "admin/ez_sql.php";
	//Get name of group
	$nm=$_POST['name'];

	//query to add new group in sms_group table
		
	$q="insert into sms_group(name,cus_id) values('".$nm."',".$_SESSION['cus_id'].")";
	$db->query($q);
	$_SESSION['cont_msg']='<div class="approved"><div class="typo-icon">Group added</div></div>';
	header("Location:groups.php");
?>