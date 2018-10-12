<?php
	$heading='Contact Us';
	$menu=16;
	include_once "header.php";
	$_SESSION['ct_name']="";
	$_SESSION['ct_email']="";
	$_SESSION['ct_message']="";
	/* File appears when users send contact us Form */

?>
	<div class="formdiv">
    <div class="approved"><div class="typo-icon">Thanks <?php echo $_GET['name'] ?>! Your message has been send successfully.<br/><br/>
    <input type="button" value="Continue..."  onClick="window.location='index.php'" class="formbutton" />
    </div></div>

</div>
      
<?php
	include_once "right.php";
	include_once "footer.php";
?>
