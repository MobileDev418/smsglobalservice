<?php
session_start();
if($_SESSION['buy_sms']!="yes")
header("location:index.php");
$menu=4;
$heading="SMS Credits Updated";
include_once "header.php";
//Simple File to display message after user buy sms credits from paypal
?>
<div class="formdiv">
    <div class="approved"><div class="typo-icon">Thanks <?php echo $_SESSION['cus_name']; ?>. Your sms credits will be updated soon. <br/><br/>
        <br/><br/> <input type="button" value="Continue..."  onClick="window.location='send_sms.php'" class="formbutton" />
    </div></div>

</div>

<?php
include_once "right.php";
include_once "footer.php";
$_SESSION['buy_sms']="";
?>