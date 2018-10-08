<?php
$_SESSION['cont_code']=$cus->country;
include_once "country.php";
?>
<table width="362" align="center" id="mid_tables" border="0" style="margin-top:50px" >
<form method="post" name="cus_reg" action="update_profile.php" onsubmit="return validProfileForm()" >
<tr>
  <td colspan="3" class="heading" align="center">Change Profile</td>
</tr>
<tr>
	<td width="159" align="right" >FIRST NAME <span class="red">*</span></td>
	 <td width="165"  align="left"><input type="text" class="text" maxlength="150" id='name' name="fname" value="<?=$cus->fname; ?>" /></td>
	<td width="24"  align="left"><span class="invalid" id='er_name'><img src="images/cross.png" alt=""></span></td>
</tr>

<tr>
	 
	<td align="right" >LAST NAME <span class="red">*</span></td>
	 <td  align="left"><input name="lname" type="text" class="text" id='lname' value="<?=$cus->lname ?>" maxlength="150" /></td>
	 <td align="left">&nbsp;</td>
</tr>
 <tr>
      <td align="right">COUNTRY <span class="red">*</span></td>

      <td align="left"><label></label>
      <select name="country" class="text" id="country" style="width:165px">
     <?=$country_list; ?>
      </select></td>
 <td align="left"></td>
    </tr>
<tr>
  <td align="right" >CITY</td>
  <td align="left"><input name="city" type="text" class="text" id='city' value="<?=$cus->city; ?>" maxlength="150" /></td>
  <td align="left">&nbsp;</td>
</tr>
<tr>
  <td align="right" >ADDRESS</td>
  <td align="left"><input name="address" type="text" class="text" id='address' value="<?=$cus->address; ?>" maxlength="150" /></td>
  <td align="left">&nbsp;</td>
</tr>
<tr>
  <td align="right" >TELEPHONE NUMBER</td>
  <td align="left"><input name="ph" type="text" class="text" id='ph' onkeypress="return isNumberKey(event)" value="<?=$cus->phone; ?>" maxlength="150" /></td>
  <td align="left">&nbsp;</td>
</tr>
<tr>
  <td align="right" >MOBILE NUMBER</td>
  <td align="left"><input name="cell" type="text" class="text" id='cell' onkeypress="return isNumberKey(event)" value="<?=$cus->mobile; ?>" maxlength="150" /></td>
  <td align="left">&nbsp;</td>
</tr>
<tr>
  <td align="right" >E-MAIL <span class="red">*</span></td>
  <td align="left"><input name="email" type="text" class="text" id='email' value="<?=$cus->email; ?>" maxlength="150" /></td>
  <td align="left"><span class="invalid" id='email_er'><img src="images/cross.png" alt=""></span></td>
</tr>

<tr>
  <td align="right" >&nbsp;</td>
  <td align="left"><input name="New" type="submit" class="submit" value="Update" id="register" />
  &nbsp; <input type="button" class="submit" onClick="window.location='profile.php'" value="Cancel" /></td>
  <td align="left">&nbsp;</td>
</tr>
</form>
</table>
<?php
	$_SESSION['cont_code']="";
?>
