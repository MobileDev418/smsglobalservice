<?php
	include_once "constants.php";
	include_once "iscustomer.php";
	$title='Crownsms - Profile - Change Password';
	$mid1='<h4>Chaneg Password</h4>';
	$mid2='';
	$mid3='';
	$menu15='profile-over.jpg';
	include_once "header.php";
?>

  
    <td id="bodybg"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>
        <td height="15" colspan="2"></td>
      </tr>
      <tr>
        <td width="25%" align="center" valign="top">
        	<?php
				include_once "left_col.php";
			?>
        </td>
        <td valign="top">
 <form id="sign" name="sign" method="post" action="password_new.php" onSubmit="return validPassword()">
         <table width="309" align="center"  cellpadding="2px"  cellspacing="2px" id="mid_tables">
 
    <tr class="heading" height="29px">
      <td colspan="3" align="center">Change Password</td>
    </tr>
    <?php
  if($_SESSION['pass']=='n')
  {
	  echo "<tr><td class='error' colspan='3'><img src='images/boxerror.gif' align='absmiddle' /> Old password is in-correct</td></tr>";
	  $_SESSION['pass']="";
  }
  ?>
    <tr>
      <td  align="right">Old Password</td>
      <td width="142"><input name="oldpass" type="password"  class="textbox" id="oldpass" /></td>
      <td></td>
    </tr>
    <tr>
      <td align="right">New Password</td>
      <td><input name="pass1" type="password"  class="textbox" id="pass1"  /></td>
      <td></td>
    </tr>
    <tr>
	<td align="right">Confirm Password</td>
    <td><input name="pass2" type="password"  class="textbox" id="pass2"  /></td>
    <td></td>
</tr>





<tr>
	<td height="30" colspan="3" align="center"><input type="submit" value="Change Password" class="submit"/> &nbsp;
    <input type="button" value="Cancel" class="submit" onClick="window.location='index.php'" /></td>
</tr>

</table>
</form>
        </td>
      </tr>
      <tr>
        <td height="5" colspan="2" align="center" valign="top"></td>

        </tr>
    </table></td>
  </tr>
<?php
	include_once "footer.php";
?>
