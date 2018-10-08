<?php
session_start();
include_once "library_const.php";
$menu=0;
$heading="New Activation Code";
include_once "header.php";
?>
<div class="formdiv">
    <div class="approved">
      <div class="typo-icon">You changed your mobile number in your profile so you need to validate your new mobile number. We sent you new activation code to mobile number you provided. Activate your account again to use <?php echo $WEBSITE_NAME; ?> services.<br/><br/>
    <input type="button" value="Continue..."  onClick="window.location='activate_code.php'" class="formbutton" />
    </div></div>

</div>

<?php
include_once "right.php";
include_once "footer.php";
?>