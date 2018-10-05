<?php
include_once "isadmin.php";
include_once "lib_constant.php";
include_once "ez_sql.php";

//File to display clinet credits on routesms gateway

$api=$db->get_row("select username, password from sms_api");
$credit_url="http://121.241.242.116:8080/CreditCheck/checkcredits?username=".$api->username."&password=".$api->password;
$fh=fopen($credit_url,"r");
$credit = fread($fh,50); // 
?>
<html>
<head>
<title><?php echo $ADMIN_TITLE; ?> - RouteSms Credit Left</title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="script/admin.js"></script>

</head>
<body>

<table align="center" cellpadding="0" cellspacing="0" id="admin_table">
<tr>
    <td class="crown_head"><?php echo $WEBSITE; ?> - Credit Left</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
  ?>
</tr>
<tr><td valign="top" style="padding-top:20px">
<table align="center"  cellpadding="2px"  cellspacing="2px" class="admin_table">

    <tr class="topheading" height="29px">
      <td width="246" align="center"> RouteSms Credit Left</td>
    </tr>
<tr>
	<td height="30" align="center" style="color:#990000; font-size:14px; font-weight:bold"><?php echo $credit;?>
	  </td>
</tr>
<tr>
  <td height="30" align="right"><a href="index.php">Back admin panel</a></td>
</tr>

</table>
</td>
</tr>
</table>
</body>
</html>