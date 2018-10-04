<?php
include_once "isadmin.php";
include_once "lib_constant.php";
//A simple file to display message that password is changed. File is called from password_new.php
?>
<html>
<head>
<title><?php echo $ADMIN_TITLE; ?> - Change Password</title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />

</head>
<body>

<table align="center" cellpadding="0" cellspacing="0" id="admin_table">
<tr>
    <td class="crown_head"><?php echo $WEBSITE ?> - Change Password</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
  ?>
</tr>
<tr><td valign="top" style="padding-top:20px" align="center"><table align="center"  cellpadding="2px"  cellspacing="2px" class="admin_table">
  <form method="post" action="password_new.php">
    <tr class="topheading" height="29px">
      <td width="246" align="center"> Password Changed</td>
    </tr>





<tr>
	<td height="30" align="center" style="color:#FF0099"><p>Your password is successfully changed</p>
	  </td>
</tr>
<tr>
  <td height="30" align="right"><a href="index.php">Back admin panel</a></td>
</tr>
</form>
</table></td>
</tr>
</table>
</body>
</html>