<?php
include_once "isadmin.php";
include_once "lib_constant.php";
?>
<html>
<head>
<title><?php echo $ADMIN_TITLE; ?> - Change Password</title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="script/admin.js"></script>
<script type="text/javascript" >
function validPassword()
{

	if(sign.oldpass.value=="")
	{
		alert("Enter old password");
		sign.oldpass.focus();
		return false;
	}
	if(sign.pass1.value=="")
	{
		alert("Enter New Password");
		sign.pass1.focus();
		return false;
	}
	if(sign.pass2.value=="")
	{
		alert("Confirm New Password");
		sign.pass2.focus();
		return false;
	}
	if(sign.pass1.value!=sign.pass2.value)
	{
		alert("Password does not match");
		sign.pass1.select();
		return false;		
	}

	
}
</script>


</head>
<body>

<table align="center" cellpadding="0" cellspacing="0" id="admin_table">
<tr>
    <td class="crown_head"><?php echo $WEBSITE; ?> - Change Password</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
  ?>
</tr>
<tr><td valign="top" style="padding-top:20px" align="center">
<table align="center"  cellpadding="2px"  cellspacing="2px" bgcolor="#E7F0F8"  class="admin_table">
  <form name="sign" method="post" action="password_new.php" onSubmit="return validPassword()">
    <tr class="topheading" height="29px">
      <td colspan="2" align="center">Change Password</td>
    </tr>
    <?php
  if($_SESSION['pass']=='n')
  {
	  echo "<tr><td class='error' colspan='2'><img src='images/boxerror.gif' align='absmiddle' /> Old password is in-correct</td></tr>";
	  $_SESSION['pass']="";
  }
  ?>
    <tr>
      <td  align="right">Old Password</td>
      <td width="142"><input name="oldpass" type="password"  class="textbox" id="oldpass" /></td>
    </tr>
    <tr>
      <td align="right">New Password</td>
      <td><input name="pass1" type="password"  class="textbox" id="pass1" /></td>
    </tr>
    <tr>
	<td align="right">Confirm Password</td>
    <td><input name="pass2" type="password"  class="textbox" id="pass2" /></td>
</tr>





<tr>
	<td height="30" colspan="2" align="center"><input type="submit" value="Change Password" class="submit"/> &nbsp;
    <input type="button" value="Cancel" class="submit" onClick="window.location='index.php'" /></td>
</tr>
</form>
</table>
</td>
</tr>
</table>
</body>
</html>