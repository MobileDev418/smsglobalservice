<?php
session_start();
/* This file is a check in all user privilideges files */
if($_SESSION['cus_login']!="yes")
{
	header("location:index.php");
}
?>
