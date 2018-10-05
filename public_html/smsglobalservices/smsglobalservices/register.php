<?php
$menu=0;
$heading="User Registration";
include_once "header.php";
include_once "country.php";
/* Dispaly Register Form to user */
?>
<div class="formdiv">
    <form method="post" name="cus_reg" action="get_registered.php" onsubmit="return validRegForm()" >
        <table id="reg_form" >
        <!--<tr><td colspan="3" align="left"><pre>* Indicates the required fields</pre></td></tr>
        <tr>-->
            <td width="195" align="right" >FIRST NAME <span class="red">*</span></td>
             <td width="207"  align="left"><input name="fname" type="text" class="text" id='name' value="<?php echo $_SESSION['fnm']; ?>" maxlength="150" /></td>
            <td width="222"  align="left"><span class="invalid" id='er_name'><img src="images/cross.png" alt=""></span></td>
        </tr>
        <tr>
            <td align="right" >LAST NAME </td>
            <td  align="left"><input name="lname" type="text" class="text" id='lname' value="<?php echo $_SESSION['lnm']; ?>" maxlength="150" /></td>
            <td align="left">&nbsp;</td>
        </tr>
        <tr>
            <td align="right" >USER NAME <span class="red">*</span><br /></td>
            <td align="left"><input name="username" type="text" class="text" id='username' value="<?php echo $_SESSION['unm']; ?>" maxlength="150" /></td>
            <td align="left"><?php echo $_SESSION['ufound']; ?><span class="invalid" id='uname_er'><img src="images/cross.png" alt=""></span></td>
        </tr>
        <tr>
            <td align="right" >PASSWORD <span class="red">*</span><br /></td>
            <td align="left"><input name="pass1" type="password" class="text" id='pass1' maxlength="150" value="<?php echo $_SESSION['password']; ?>" /></td>
            <td align="left"><span class="invalid" id='pass1_er'><img src="images/cross.png" alt=""></span></td>
        </tr>
        <tr>
            <td align="right" >CONFIRM PASSWORD <span class="red">*</span><br /></td>
            <td align="left"><input name="pass2" type="password" class="text" id='pass2' maxlength="150" value="<?php echo $_SESSION['password']; ?>" /></td>
            <td align="left"><span class="invalid" id='pass2_er'><img src="images/cross.png" alt=""></span></td>
        </tr>
        <tr>
            <td align="right">COUNTRY <span class="red">*</span></td>
            <td align="left"><label></label>
                <select name="country" class="text" id="country">
                    <option value='0' >Select Your Country</option><?php echo $country_list; ?>
                </select>
            </td>
             <td align="left"><span class="invalid" id='country_er'><img src="images/cross.png" alt=""></span></td>
        </tr>
        <tr>
            <td align="right" >CITY</td>
            <td align="left"><input name="city" type="text" class="text" id='city' value="<?php echo $_SESSION['cty']; ?>" maxlength="150" /></td>
            <td align="left">&nbsp;</td>
        </tr>
        <tr>
            <td align="right" >ADDRESS</td>
            <td align="left"><input name="address" type="text" class="text" id='address' value="<?php echo $_SESSION['ady']; ?>" maxlength="150" /></td>
            <td align="left">&nbsp;</td>
        </tr>
        <!--<tr>
            <td align="right" >TELEPHONE NUMBER <span class="red">*</span></td>
            <td align="left"><input name="ph" type="text" class="text" id='ph' onkeypress="return isNumberKey(event)" value="<?php echo $_SESSION['phy']; ?>" maxlength="150" /></td>
            <td align="left"><span class="invalid" id='ph_er'><img src="images/cross.png" alt=""></span></td>
        </tr>-->
        <tr>
            <td align="right" >MOBILE NUMBER <span class="red">*</span></td>
            <td align="left"><input name="cell" type="text" class="text" id='cell' onkeypress="return isNumberKey(event)" value="<?php echo $_SESSION['cell']; ?>" maxlength="150" /></td>
            <td align="left"><?php echo $_SESSION['mobfound']; ?><span class="invalid" id='cell_er'><img src="images/cross.png" alt=""></span></td>
        </tr>
        <tr>
              <td align="right" >E-MAIL <span class="red">*</span></td>
              <td align="left"><input name="email" type="text" class="text" id='email' value="<?php echo $_SESSION['eml']; ?>" maxlength="150" /></td>
              <td align="left"><?php echo $_SESSION['mail_found']; ?> <span class="invalid" id='email_er'><img src="images/cross.png" alt=""></span></td>
        </tr>
        <tr>
                <td align="right" valign="top">SECURITY CODE<span class="red"> *</span></td>
                <td align="left"><input name="code" type="text" class="text" id="code" />
                <br />
                <img src="CaptchaSecurityImages.php?width=205&height=30&characters=6" style="margin-top:5px"/></td>
                <td align="left" valign="top"><?php echo $_SESSION['ucode']; ?><span class="invalid" id='code_er'><img src="images/cross.png" alt=""></span></td>
        </tr>
        <tr>
                <td align="left" colspan="2" style="padding-left:45px">TERMS &amp; CONDITIONS</td>
                <td align="left"></td>
        </tr>
        <tr><td></td>
                <td colspan="2" >
                
                <div style="height:200px; width:400px; overflow:scroll;border:1px solid #CCC;padding:5px; text-align:justify">
                <p><em class="color">SENDING AND DELIVERY OF SMS MESSAGES</em><br/>
               <?php echo $WEBSITE_NAME; ?> will, when indicated as functional by System Status, send each SMS message to one of our SMS gateways for delivery to the relevant network, provided no error is displayed to suggest that this will not be done. smsglobalservices guarantees that under these circumstances all messages are SENT. However, delivery is the responsibility of third party networks and services, including the receiving device itself, and cannot be guaranteed. When you click send and you see message sent, then your message has been sent.</p>
                <p>If you find this information to be incorrect, then providing us with full details of the message and confirmation code will allow us to investigate the problem with individual networks. Delivery confirmation may only be available at certain times.</p>
                <p><em class="color">MESSAGE CONTENT</em><br />          
                Use of <?php echo $WEBSITE_NAME; ?> service in sending abusive messages can be traced to the originator upon request from the Police and they will be liable to prosecution under the 1998 Malicious Communications Act. <?php echo $WEBSITE_NAME; ?> is not responsible for content of messages sent by users of the service. <?php echo $WEBSITE_NAME; ?> will co-operate with official inquiries into misuse of the service. You agree not to send abusive or defamatory messages through this service. Spam/unsolicited messages and bulk advertising through this service is not permitted. Messages containing sexual content are not permitted. Each message must be unique in content and purposeful, and may contain up to the permitted amount of characters.</p>
    
               <p><em class="color"> ADVERTISING/SPONSORSHIP</em><br />
                All Advert shown on <?php echo $WEBSITE; ?> are mainstream and not offensive. If you see an advert that does offend you, it is important that you contact us, so we can have it removed.</p>
                
                <p><em class="color">THIS DOCUMENT</em><br />
                By using this service you agree to be bound by the Terms and Conditions.<?php echo $WEBSITE_NAME; ?> may change these terms and conditiions at any time, and shall become effective immediately upon posting to this page.</p>
                </div>
                </td>
        </tr>
        <tr><td></td>
            <td align="left" colspan="3" class="orange" ><input type="checkbox" value="yes" name="reg_accept" id="reg_accept" onclick="enable_disable(this)" />    		I accept these terms and conditions</td>
        </tr>
        <tr>
          <td align="right" >&nbsp;</td>
          <td align="center"><input name="New" type="submit" class="formbutton" value="Register" id="register" disabled="disabled" style="color:#CCC" />
          &nbsp; <input type="button" class="formbutton" onClick="window.location='index.php'" value="Cancel" /></td>
          <td align="left">&nbsp;</td>
        </tr>
        
    
    <?php
    $_SESSION['fnm']="";
    $_SESSION['lnm']="";
    $_SESSION['unm']="";
    $_SESSION['cty']="";
    $_SESSION['ady']="";
    $_SESSION['phy']="";
    $_SESSION['cell']="";
    $_SESSION['eml']="";
    $_SESSION['cont_code']="";
    $_SESSION['ucode']="";
    $_SESSION['ufound']="";
    $_SESSION['mobfound']="";
    $_SESSION['mail_found']="";
	$_SESSION['password']="";
    ?>
    
    </table>
    </form>
</div>

<?php
include_once "right.php"; 
include_once "footer.php";
?>