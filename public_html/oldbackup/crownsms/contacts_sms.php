<?php
	include_once "library_const.php";
	include_once "iscustomer.php";
	include_once "admin/ez_sql.php";
	$opt= $_POST['action'];
	$f=0;
	foreach($_POST['chk_con'] as $chk)
	{
		if($f==0)
			$ids.=" contact_id=".$chk;
		else
			$ids.=" or contact_id=".$chk;
		$f++;
	}
		
	if($opt=="1")  /* Delete from Contacts */
	{
		$q="delete from contacts where ".$ids;
		$db->query($q);
		if($f>1)
			$grs="s";
		$_SESSION['msg_ad']="<div class='act_msg'>Contact".$grs." Deleted</div>";
		header("location:contacts.php");
		
	}
	if($opt=="2")  /* Send Sms to selected Candidates */
	{
		include_once "contact_sms.php";
	}
	
	
?>
