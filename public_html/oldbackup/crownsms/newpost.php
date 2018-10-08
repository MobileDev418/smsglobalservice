<?php
	
	echo $_POST['pos'];
	$msg= str_replace("\'","'",$_POST['pos']);
	//$msg=ereg_replace("\'","'",$_POST['pos']);
	echo $msg;
?>

