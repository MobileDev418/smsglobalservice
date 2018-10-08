<?php
	include_once "iscustomer.php";
	include_once "admin/ez_sql.php";
	$f=0;
	foreach($_POST['chk_con'] as $chk)
	{
		if($f==0)
			$ids.=" sms_id=".$chk;
		else
			$ids.=" or sms_id=".$chk;
		$f++;
	}
		$q="delete from sms_q where ".$ids;
		//echo $q;
		$db->query($q);
		if($f>1)
			$grs="s";
		$_SESSION['q_del']='<div class="approved"><div class="typo-icon">Message'.$grs.' deleted</div></div>';
		header("location:sms_q.php");
	
?>
