<?php
include_once "isadmin.php";
include_once "lib_constant.php";
include_once "ez_sql.php";
$api=$db->get_row("select * from sms_api where id=1");
?>
<html>
<head>
<title><?php echo $ADMIN_TITLE; ?> - RouteSms Configuration</title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function valid_conf()
{
	
	var sign=document.getElementById('sign');
	
	if(sign.username.value=="")
	{
		alert("Enter username");
		sign.username.focus();
		return false;
	}
	if(sign.password.value=="")
	{
		alert("Enter New Password");
		sign.password.focus();
		return false;
	}
}
</script>


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
<table align="center"  cellpadding="2px"  cellspacing="2px" class="admin_table">
  <form name="sign" id="sign" method="post" action="save_routsms.php" onSubmit="return valid_conf()">
    <tr class="topheading" height="29px">
      <td colspan="2" align="center">Set RouteSms User &amp; password</td>
    </tr>
    <?php
  		if($_SESSION['route_api']=='n')
  		{		 
			  echo "<tr><td class='error' colspan='2'><img src='images/boxerror.gif' align='absmiddle' />Invalid Username/Password</td></tr>";
			  $_SESSION['route_api']="";
  		}
  ?>
    
    <tr>
      <td width="82"  align="right">API URL</td>
      <td width="158"><input name="api" type="text"  class="textbox" id="username" value="<?php echo $api->apilink; ?>" /></td>
    </tr>
    
    <tr>
      <td width="82"  align="right">User Name</td>
      <td width="158"><input name="username" type="text"  class="textbox" id="username" value="<?php echo $api->username; ?>" /></td>
    </tr>
    <tr>
      <td align="right"> Password</td>
      <td><input name="password" type="password"  class="textbox" id="password" value="<?php echo $api->password; ?>" /></td>
    </tr>
<tr>
	<td height="30" colspan="2" align="center"><input type="submit" value="Save" class="submit"/> &nbsp;
    <input type="button" value="Cancel" class="submit" onClick="window.location='index.php'" /></td>
</tr>
</form>
</table>  
</td>
</tr> 
<tr>
  <td height="15" align="center" style="color:red" >
  
  </td>
</tr>
</table>

</td>
</tr>
</table>
</body>
</html>