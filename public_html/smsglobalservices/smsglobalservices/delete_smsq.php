<?php
	include_once "iscustomer.php";
	/* delete sms from Q */
	$f=0;
	
	foreach($_POST['chk_con'] as $chk) /* Loop to find the list of ids that must be deleted in sms q */
	{
		if($f==0)
			$ids.=" sms_id=".$chk;
		else
			$ids.=" or sms_id=".$chk;
		$f++;
	}
		$q="delete from sms_q where ".$ids;
		//echo $q;
		include_once "admin/ez_sql.php";
		$db->query($q);
		if($f>1)
			$grs="s";
		$_SESSION['q_del']='<div class="approved"><div class="typo-icon">Message'.$grs.' deleted</div></div>';
		header("location:sms_q.php");
	
?>
