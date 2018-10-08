<?php
session_start();
if($_SESSION['cus_login']!="yes")
{
	header("location:index.php");
}
?>
