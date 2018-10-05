<?php
$menu=7;
$heading="Contact Us";
/* Contact Us Form */
?>
<?php
include_once "header.php";
?>
<div class="formdiv">
	<div style="width:500px; margin:auto">
    <?php echo $_SESSION['contactus_err']; ?>
    <form method="post" name="ctfom" action="sendcontactusform.php" onsubmit="return validContactUsForm(this)" id="changeprofile" >
         <div class="formborder">
            <table width="357" align="center" id="contactusform" border="0">
             <tr>
                <td width="96"  align="right" >Name <span class="red">*</span></td>
                 <td width="344"   align="left"><input type="text" class="text" maxlength="150" id='name' name="name" value="<?php echo $_SESSION['ct_name']; ?>" /></td>
                <td width="44"   align="left"><span class="invalid" id='er_name'><img src="images/cross.png" alt=""></span></td>
            </tr>
            <tr>
              <td align="right" >E-mail <span class="red">*</span></td>
              <td align="left"><input name="email" type="text" id='email' value="<?php echo $_SESSION['ct_email']; ?>" maxlength="150" /></td>
              <td align="left"><span class="invalid" id='email_er'><img src="images/cross.png" alt=""></span></td>
            </tr>
             <tr>
              <td align="right" style="vertical-align:top"  >Message<span class="red">*</span></td>
              <td align="left" ><textarea name="message" rows="7" id="message"  ><?php echo $_SESSION['ct_message']; ?></textarea></td>
              <td align="left" style="vertical-align:top"><div style="height:120px;"><span class="invalid" id='message_er' style="vertical-align:top"><img src="images/cross.png"  /></span></div></td>
            </tr>

            <tr>
                <td align="right" valign="top"> Security Code<span class="red"> *</span></td>
                <td align="left"><input name="code" type="text" class="text" id="code" style="width:120px;" />
                <br />
                <img src="CaptchaSecurityImages.php?width=120&height=30&characters=6" style="margin-top:5px"/></td>
                <td align="left" valign="top"><span class="invalid" id='code_er'><img src="images/cross.png" alt=""></span></td>
			</tr>
            
            </table>         
            </div>
            <div class="actionform">
            	<input name="send" type="submit" class="formbutton" value="Send Message" />&nbsp; <input type="button" class="formbutton" onClick="window.location='index.php'" value="Cancel" /></td>
              <td align="left">&nbsp;</td>
            </tr>
            </div>
        </form>
	</div>
</div> 

<?php
$_SESSION['ct_name']="";
$_SESSION['ct_email']="";
$_SESSION['ct_message']="";
$_SESSION['contactus_err']="";
include_once "right.php";
?>
<?php
include_once "footer.php";
?>