<?php
session_start();
if($_SESSION['admin']=="" || $_SESSION['admin']=='n')
{
	header("location:login.php");
}
?>
