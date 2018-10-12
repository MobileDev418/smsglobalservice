<?php
	include_once "iscustomer.php";
	//File is called from edit_group.php fomr
	
	include_once "admin/ez_sql.php";
	
	//Get name and id of group
	
	@$nm=$_POST['name'];
	@$id=$_POST['group_id'];
	
	//query to update group name
	
	$q="update sms_group set name='".$nm."' where group_id=".$id;
	//echo $q;
	$db->query($q);
	$_SESSION['cont_msg']='<div class="approved"><div class="typo-icon">Group updated</div></div>';
	header("Location:groups.php");
?>