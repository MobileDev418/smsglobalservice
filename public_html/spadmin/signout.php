<?php
	include_once "../admin/ez_sql.php";
	session_start();
	$actionq="insert into salesperson_actionlog (spid,action,action_date) values (".$_SESSION['sp_adminid'].",'Logout from sales person admin panel','".date('Y-m-d H:i:s')."')";
	$db->query($actionq);
	$_SESSION['spadmin']="";

	//Destry admin session and redirects to admin home page of web site
	$url="../";
	header("Location:$url");
		
?>
