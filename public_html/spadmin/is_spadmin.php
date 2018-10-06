<?php
session_start();
//admin check in all admin privilides files
if($_SESSION['spadmin']=="" || $_SESSION['spadmin']=='n')
{
	header("location:login.php");
}
?>
