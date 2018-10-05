<?php
	if($_POST['sendsms']=="")
		header("location:contacts.php");
	include_once "iscustomer.php";
	include_once "admin/ez_sql.php";
	/* this files deals with the deletion or send sms to contacts in address book */
	$opt= $_POST['action'];
	$f=0;
	foreach($_POST['chk_con'] as $chk) /* Loop to see selected contacts submitted by the user to perform opeation */
	{
		if($f==0)
			$ids.=" contact_id=".$chk;
		else
			$ids.=" or contact_id=".$chk;
		$f++;
	}
		
	if($opt=="1")  /* Delete from Contacts */
	{
		/* delete contacts from the address book */
		$q="delete from contacts where ".$ids;
		$db->query($q);
		if($f>1)
			$grs="s";
		$_SESSION['msg_ad']='<div class="approved"><div class="typo-icon">Contact'.$grs.' Deleted</div></div>';
		header("location:contacts.php");
		
	}
	if($opt=="2")  /* Send Sms to selected Candidates */
	{
		include_once "contact_sms.php";
	}
	
	
?>
