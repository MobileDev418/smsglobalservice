<?php
include_once "is_spadmin.php";
include_once "lib_sp_constant.php";
include_once "../admin/ez_sql.php";
@$id=$_GET['id'];
include_once "is_sp_client.php";
if($is_sp_client=="")
	header ("Location:customers.php");
//File to change customer password. File is called from customers.php get customer name and id  from query string
?>
<html>
<title><?php echo $ADMIN_TITLE; ?> - Customers</title>
<head>
<script type="text/javascript" src="../admin/script/admin.js">
</script>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="652" align="center" cellpadding="0" cellspacing="0" id="admin_table">
<tr>
    <td width="639" class="crown_head"><?php echo $WEBSITE; ?> - Customer Contacts</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
  ?>
</tr>
<tr>
<td valign="top" style="padding-top:5px">

<h2 align="center">Set New Password - <?php echo  ucwords($_GET['name']);  ?></h2>
<form name="setpassword" onSubmit="return validPassword(this)" action="set_cus_password.php" method="post" >
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
<table width="71%"  align="center" cellpadding="4px" cellspacing="2px" id='viewdiv' class="admin_table" style="margin-top:40px;">
<tr><td width="45%" style="text-align:right">New Password * </td><td width="55%" style="text-align:left"><input type="password" name="pass1" id="pass1"> </td></tr>
<tr><td style="text-align:right"> Confirm Password * </td><td style="text-align:left"><input type="password" name="pass2" id="pass2"> </td></tr>
<tr><td colspan="2" style="text-align:center"><input type="submit" name="submit" value="Set New Password" >&nbsp;<input type="button" name="cancel" onClick="window.location='customers.php'" value="Cancel" /></td></tr>
</table>
</form>
<h2 align="center">&nbsp;</h2>
</td>
</tr>
</table>
</body>
</html>