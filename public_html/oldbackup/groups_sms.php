<?php
	if($_POST['sendsms']=="")
		header("location:groups.php");
	include_once "iscustomer.php";
	include_once "admin/ez_sql.php";
	$opt= $_POST['action'];
	$f=0;
	foreach($_POST['chk_con'] as $chk)
	{
			if($f==0)
				$ids.=" group_id=".$chk;	
			else
				$ids.=" or group_id=".$chk;
			$f++;
	}
		
	if($opt=="1")  /* Delete from Contacts */
	{
		$q="delete from sms_group where ".$ids;
		//echo $q;
		$db->query($q);
		$q="delete from contacts where ".$ids;
		//echo $q;
		$db->query($q);
		if($f>1)
			$grs="s";
		$_SESSION['cont_msg']='<div class="approved"><div class="typo-icon">Group'.$grs.' deleted</div></div>';
		header("location:groups.php");
		
	}
	if($opt=="2")  /* Send Sms to selected Candidates */
	{
		include_once "group_sms.php";
	}
	
	
?>
