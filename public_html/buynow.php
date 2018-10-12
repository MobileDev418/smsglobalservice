<?php
session_start();
$menu=4;
$heading="Pricing";
/* Display sms pacakeges */
?>
<?php
include_once "header.php";
?>
<h1><?php echo $heading; ?> </h1>
<?php
	include_once "getPricing.php";
?>
<?php
include_once "right.php";
?>
<?php
include_once "footer.php";
?>