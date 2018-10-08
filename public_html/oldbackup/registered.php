<?php
session_start();
if ($_SESSION['cus_register']!="yes")
	header("Location:register.php");
$menu=0;
$heading="User Registration";
include_once "header.php";
?>
<div class="formdiv">
    <div class="approved"><div class="typo-icon">Thanks <?php echo $_SESSION['cus_regname']; ?>. Your account has been created. Your activation code has been sent to your mobile number. If you don't receive any message please contact us to activate your account.<br/><br/>
    <input type="button" value="Activate your account..."  onClick="window.location='activate_code.php'" class="formbutton" />
    </div></div>

</div>

<?php
include_once "right.php";
include_once "footer.php";
$_SESSION['activation_error']="";
?>