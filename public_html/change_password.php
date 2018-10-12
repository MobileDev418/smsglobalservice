<?php
	include_once "iscustomer.php";
	$heading='Change Password';
	$menu=16;
	/* Form to change user password */
?>
<?php
	include_once "header.php";
?>
<div class="formdiv">
<div style="width:550px; margin:auto">
 <form id="sign" name="sign" method="post" action="password_new.php" onSubmit="return validPassword()">
  <?php
			  echo $_SESSION['password_action'];
			  $_SESSION['password_action']="";
		  ?>
 	<div class="formborder">
         
        <table cellpadding="2px"  cellspacing="2px">

            <tr>
              <td width="216"  align="right">Old Password <span class="red">*</span></td>
              <td width="144"><input name="oldpass" type="password"  id="oldpass" /></td>
              <td width="166"></td>
            </tr>
            <tr>
              <td align="right">New Password <span class="red">*</span></td>
              <td><input name="pass1" type="password"  id="pass1"  /></td>
              <td></td>
            </tr>
            <tr>
            <td align="right">Confirm Password <span class="red">*</span></td>
            <td><input name="pass2" type="password"  id="pass2"  /></td>
            <td></td>
            </tr>
            </table>
      </div>
      <div class="actionform">
      	<input type="submit" value="Change Password" class="formbutton"/> &nbsp;<input type="button" value="Cancel" class="formbutton" onClick="window.location='profile.php'" />
      </div>
	</form>
   </div>
</div>
<?php
	include_once "right.php";
	include_once "footer.php";
?>
