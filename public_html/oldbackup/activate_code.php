<?php
session_start();
$menu=0;
$heading="Activate Code";
include_once "header.php";
?>
<div class="formdiv">
<div style="width:500px; margin:auto">


	<?php if ($_SESSION['newactive']!="" )
				echo $_SESSION['newactive'];
		else
			echo '<div class="note"><div class="typo-icon">An activation code has been sent to the mobile phone number you provided. Please enter the code here.</div></div>'; 
		 ?>
	<?php echo $_SESSION['activation_error']; ?><form method="post" name="cus_reg" action="get_activated.php" onsubmit="return validCodeForm(this)" >
    	<div class="formborder">
        <table width="84%" id="reg_form" >
        <tr>
            <td width="40%" align="right" >USER NAME <span class="red">*</span><br /></td>
            <td width="32%" align="left"><input name="username" type="text" class="text" id='username'  maxlength="150" /></td>
            <td width="28%" align="left"><span class="invalid" id='uname_er'><img src="images/cross.png" alt=""></span></td>
        </tr>
        <tr>
            <td align="right" >ACTIVATION CODE <span class="red">*</span><br /></td>
            <td align="left"><input name="act_code" type="text" class="text" id='act_code' maxlength="150"  /></td>
            <td align="left"><span class="invalid" id='code_er'><img src="images/cross.png" alt=""></span></td>
        </tr>
        </table>
        </div>
        <div class="actionform"><input name="New" type="submit" class="formbutton" value="Activate" id="register"  />&nbsp; <input type="button" class="formbutton" onClick="window.location='index.php'" value="Cancel" />
        </div>
    </form>
    </div>
</div>
<?php
include_once "right.php";
include_once "footer.php";
$_SESSION['activation_error']="";
$_SESSION['newactive']="";
?>