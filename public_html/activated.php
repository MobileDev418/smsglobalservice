<?php
session_start();
if ($_SESSION['cus_activated']!="yes")
	header("Location:activate_code.php");
$menu=0;
$heading="Welcome ". $_SESSION['cus_name'];
include_once "header.php";
?>
<div class="formdiv">
    <div class="approved"><div class="typo-icon">Thanks <?php echo $_SESSION['cus_name']; ?>. Your account has been activated.<br/><br/>
    <input type="button" value="Continue..."  onClick="window.location='send_sms.php'" class="formbutton" />
    </div></div>

</div>

<?php
include_once "right.php";
include_once "footer.php";
?>