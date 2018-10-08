<?php
include_once "country.php";
?>
<link href="style/sms-style.css" rel="stylesheet" type="text/css" />


<table width="470" align="center" border="0" id="mid_tables" >
<form method="post" name="cus_reg" action="get_registered.php" onsubmit="return validRegForm()" >
<tr>
  <td colspan="3" align="left" class="red"><strong>&nbsp;* Indicates the required fields</td>
</tr>
<tr>
	<td width="158" align="right" >FIRST NAME <span class="red">*</span></td>
	 <td width="165"  align="left"><input name="fname" type="text" class="text" id='name' value="<?=$_SESSION['fnm']; ?>" maxlength="150" /></td>
	<td width="133"  align="left"><span class="invalid" id='er_name'><img src="images/cross.png" alt=""></span></td>
</tr>

<tr>
	 
	<td align="right" >LAST NAME <span class="red">*</span></td>
	 <td  align="left"><input name="lname" type="text" class="text" id='lname' value="<?=$_SESSION['lnm']; ?>" maxlength="150" /></td>
	 <td align="left">&nbsp;</td>
</tr>

<tr>
 <td align="right" >USER NAME <span class="red">*</span><br /></td>
  <td align="left"><input name="username" type="text" class="text" id='username' value="<?=$_SESSION['unm']; ?>" maxlength="150" /></td>
  <td align="left"><?=$_SESSION['ufound']; ?><span class="invalid" id='uname_er'><img src="images/cross.png" alt=""></span></td>
</tr>
<tr>
 <td align="right" >PASSWORD <span class="red">*</span><br /></td>
  <td align="left"><input name="pass1" type="password" class="text" id='pass1' maxlength="150" /></td>
  <td align="left"><span class="invalid" id='pass1_er'><img src="images/cross.png" alt=""></span></td>
</tr>

<tr>
 <td align="right" >CONFIRM PASSWORD <span class="red">*</span><br /></td>
  <td align="left"><input name="pass2" type="password" class="text" id='pass2' maxlength="150" /></td>
  <td align="left"><span class="invalid" id='pass2_er'><img src="images/cross.png" alt=""></span></td>
</tr>
 <tr>
      <td align="right">COUNTRY <span class="red">*</span></td>

      <td align="left"><label></label>
      <select name="country" class="text" id="country" style="width:165px">
     <option value='0' >Select Your Country</option>
     <?=$country_list; ?>
     </select></td>
 <td align="left"><span class="invalid" id='country_er'><img src="images/cross.png" alt=""></span></td>
    </tr>
<tr>
  <td align="right" >CITY</td>
  <td align="left"><input name="city" type="text" class="text" id='city' value="<?=$_SESSION['cty']; ?>" maxlength="150" /></td>
  <td align="left">&nbsp;</td>
</tr>
<tr>
  <td align="right" >ADDRESS</td>
  <td align="left"><input name="address" type="text" class="text" id='address' value="<?=$_SESSION['ady']; ?>" maxlength="150" /></td>
  <td align="left">&nbsp;</td>
</tr>
<tr>
  <td align="right" >TELEPHONE NUMBER <span class="red">*</span></td>
  <td align="left"><input name="ph" type="text" class="text" id='ph' onkeypress="return isNumberKey(event)" value="<?=$_SESSION['phy']; ?>" maxlength="150" /></td>
   <td align="left"><span class="invalid" id='ph_er'><img src="images/cross.png" alt=""></span></td>
</tr>
<tr>
  <td align="right" >MOBILE NUMBER <span class="red">*</span></td>
  <td align="left"><input name="cell" type="text" class="text" id='cell' onkeypress="return isNumberKey(event)" value="<?=$_SESSION['cell']; ?>" maxlength="150" /></td>
   <td align="left"><span class="invalid" id='cell_er'><img src="images/cross.png" alt=""></span></td>
</tr>
<tr>
  <td align="right" >E-MAIL <span class="red">*</span></td>
  <td align="left"><input name="email" type="text" class="text" id='email' value="<?=$_SESSION['eml']; ?>" maxlength="150" /></td>
  <td align="left"><?=$_SESSION['mail_found']; ?> <span class="invalid" id='email_er'><img src="images/cross.png" alt=""></span></td>
</tr>
  <tr>
  <td align="right" valign="top">SECURITY CODE<span class="red"> *</span><td align="center"><input name="code" type="text" class="text" id="code" />
  <br />
    <img src="CaptchaSecurityImages.php?width=130&height=30&characters=6" style="margin-top:5px"/></td>
  <td align="left" valign="top"><?=$_SESSION['ucode']; ?><span class="invalid" id='code_er'><img src="images/cross.png" alt=""></span></td>
</tr>
<tr>
  <td align="left" colspan="2" style="padding-left:45px">TERMS &amp; CONDITIONS</td>
  <td align="left"></td>
</tr>

<tr>
  <td align="center" colspan="3" ><textarea cols="40" rows="7" readonly="readonly">SENDING AND DELIVERY OF SMS MESSAGES
Crownsms.com will, when indicated as functional by System Status, send each SMS message to one of our SMS gateways for delivery to the relevant network, provided no error is displayed to suggest that this will not be done. Crownsms guarantees that under these circumstances all messages are SENT. However, delivery is the responsibility of third party networks and services, including the receiving device itself, and cannot be guaranteed. When you click send and you see message sent, then your message has been sent.

If you find this information to be incorrect, then providing us with full details of the message and confirmation code will allow us to investigate the problem with individual networks. Delivery confirmation may only be available at certain times.

MESSAGE CONTENT
Use of Crownsms service in sending abusive messages can be traced to the originator upon request from the Police and they will be liable to prosecution under the 1998 Malicious Communications Act. CrownSms.com is not responsible for content of messages sent by users of the service. CrownSms.com will co-operate with official inquiries into misuse of the service. You agree not to send abusive or defamatory messages through this service. Spam/unsolicited messages and bulk advertising through this service is not permitted. Messages containing sexual content are not permitted. Each message must be unique in content and purposeful, and may contain up to the permitted amount of characters.

ADVERTISING/SPONSORSHIP
All Advert shown on CrownSms are mainstream and not offensive. If you see an advert that does offend you, it is important that you contact us, so we can have it removed.

THIS DOCUMENT
By using this service you agree to be bound by the Terms and Conditions. CrownSms.com may change these terms and conditiions at any time, and shall become effective immediately upon posting to this page.
</textarea></td>
</tr>
<tr>
  <td align="center" colspan="3" class="orange" ><input type="checkbox" value="yes" name="reg_accept" id="reg_accept" onclick="enable_disable(this)" />    
    I accept these terms and conditions</td>
</tr>
<tr>
  <td align="right" >&nbsp;</td>
  <td align="center"><input name="New" type="submit" class="submit" value="Register" id="register" disabled="disabled" />
  &nbsp; <input type="button" class="submit" onClick="window.location='index.php'" value="Cancel" /></td>
  <td align="left">&nbsp;</td>
</tr>
<tr>
  <td align="right" >&nbsp;</td>
  <td>&nbsp;</td>
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
$_SESSION['mail_found']="";
?>
</form>
</table>
