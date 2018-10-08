<?php
session_start();
if($_SESSION['buy_sms']!="yes")
header("location:index.php");
$menu=4;
$heading="SMS Credits Updated";
include_once "header.php";
?>
<div class="formdiv">
    <div class="approved"><div class="typo-icon">Thanks <?php echo $_SESSION['cus_name']; ?>. Your sms credits has been updated. <br/><br/>
     <?php
						$cus=$db->get_row("select credits, balance, credits_used, free_sms from customer where cus_id=".$_SESSION['cus_id']);
						echo '<em class="color">Credit Alloted: </em>'.$cus->credits;
						echo '<em class="color"><br/>Credit Used: </em>'.$cus->credits_used;
						echo '<em class="color"><br/>Balance: </em>'.$cus->balance;                	
	?>
   <br/><br/> <input type="button" value="Continue..."  onClick="window.location='send_sms.php'" class="formbutton" />
    </div></div>

</div>

<?php
include_once "right.php";
include_once "footer.php";
$_SESSION['buy_sms']="";
?>