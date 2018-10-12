<?php
$menu=7;
$heading="Contact Us";
/* Contact Us Form */
?>
<?php
include_once "header.php";
?>

<div class="formdiv">
	<div style="width:500px; margin:auto; display:none;">
      <p><?php echo $_SESSION['contactus_err']; ?> </p>
      <p><strong>Office address</strong> : A310R,Xiang Ruihua Building, Aacao XinCun,Meilong Road, LongHua District, ShenZhen, (518131), China. </p>
      <p><strong>Tel</strong> : +8613410512890, +8618676736046</p>
      <p>Fill the form below to email us your enquiry.</p>
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
<div class="contact-box">
    <h1>Contact us</h1>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-left">
            <form method="post" name="ctfom" action="sendcontactusform.php" onsubmit="return validContactUsForm(this)" id="changeprofile" class="form-horizontal" >
              <div class="form-group">
                <label for="name">Name <i class="icon user-icon">&nbsp;</i></label>
                <input type="text" class="text form-control" maxlength="150" id='name' name="name" value="<?php echo $_SESSION['ct_name']; ?>" />
              </div>
              <div class="form-group">
                <label for="email">Email <i class="icon mail-icon"></i></label>
                <input name="email" type="text form-control" id='email' value="<?php echo $_SESSION['ct_email']; ?>" maxlength="150" />
              </div>
              <div class="form-group msgg">
                <label for="message">Message <i class="icon message-icon"></i></label>
                <textarea class="form-control" name="message" rows="4" id="message"  ><?php echo $_SESSION['ct_message']; ?></textarea>
              </div>
              <div class="form-group sec-code">
                <label for="code"><img src="CaptchaSecurityImages.php?width=120&height=30&characters=6" style="margin-top:0px"/></label>
                <input name="code" type="text" class="text form-control" id="code" style="" />
                
              </div>
              
                <div class="btn-group">
                  <button class="btn btn-success formbutton" type="submit"> Send Message </button>
                  <button class="btn btn-danger btn-icon" type="reset"> Cancel </button>
                </div>
            </form>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 contact-info">
            <p><span class="text-danger">Office address :</span> A310R,Xiang Ruihua Building, Aacao XinCun,Meilong Road, LongHua District, ShenZhen, (518131), China.</p>
            <p><span class="text-danger">Tel :</span> +8613410512890, +8618676736046</p>
            <p>Fill the form to email us your enquiry.</p>
        </div>
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