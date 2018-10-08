<?php
	include_once "iscustomer.php";
	include_once "admin/ez_sql.php";
	$nm=$_POST['name'];
	$nextid=$db->get_var("select max(group_id) from sms_group");
	if(is_null($nextid))
		$nextid=1;
	else
		$nextid=$nextid+1;
	$q="insert into sms_group(group_id, name,cus_id) values(".$nextid.",'".$nm."',".$_SESSION['cus_id'].")";
	$db->query($q);
	$_SESSION['cont_msg']="<div class='act_msg'>Group added</div>";
	header("Location:groups.php");
?>