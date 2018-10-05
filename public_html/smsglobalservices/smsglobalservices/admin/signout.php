<?php
	session_start();
	session_destroy();
	//Destry admin session and redirects to admin home page of web site
	$url="../";
	header("Location:$url");
		
?>
