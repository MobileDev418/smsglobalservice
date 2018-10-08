<?php
include_once "isadmin.php";
include_once "lib_constant.php";
?>
<html>
<head>
<title><?php echo $ADMIN_TITLE; ?> - Change Password</title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />

</head>
<body>

<table align="center" cellpadding="0" cellspacing="0" id="admin_table">
<tr>
    <td class="crown_head"><?php echo $WEBSITE; ?> - RouteSms User &amp; Password</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
  ?>
</tr>
<tr><td valign="top" style="padding-top:20px" align="center">
<table width="256" align="center"  cellpadding="2px"  cellspacing="2px" class="admin_table">
    <tr class="topheading" height="29px">
      <td width="246" align="center"> RouteSms Configuration </td>
    </tr>
<tr>
	<td height="30" align="center" style="color:#FF0099"><p>RouteSms username and pasword changed successfully</p>
	  </td>
</tr>
<tr>
  <td height="30" align="right"><a href="index.php">Back admin panel</a></td>
</tr>
</table>  </td>
</tr>
</table>
</body>
</html>