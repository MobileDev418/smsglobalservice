<?php
session_start();
//admin check in all admin privilides files
if($_SESSION['admin']=="" || $_SESSION['admin']=='n')
{
	header("location:login.php");
}
?>
