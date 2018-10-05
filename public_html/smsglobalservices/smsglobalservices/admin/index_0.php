<?php
include_once "isadmin.php";
include_once "lib_constant.php";
?>
<html>
<head>
<title><?php echo $ADMIN_TITLE; ?></title></head>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<body style="margin-top:25px">

<table align="center" cellpadding="0" cellspacing="0" id="admin_table">
  <!-- fwtable fwsrc="admin.png" fwpage="Page 1" fwbase="index.jpg" fwstyle="Dreamweaver" fwdocid = "2081338612" fwnested="0" -->
  <tr>
    <td colspan="15" class="crown_head">CrownSms - Administration</td>
  </tr>
  <tr>
    <td><img src="images/spacer.gif" width="37" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="11" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="134" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="7" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="25" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="8" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="119" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="7" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="40" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="6" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="120" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="9" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="8" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="47" height="1" border="0" alt="" /></td>
    <td><img src="images/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="14"><img name="index_r1_c1" src="images/index_r1_c1.jpg" width="578" height="123" border="0" id="index_r1_c1" alt="" /></td>
    <td><img src="images/spacer.gif" width="1" height="123" border="0" alt="" /></td>
  </tr>
  <tr>
    <td rowspan="2" colspan="2"><img name="index_r2_c1" src="images/index_r2_c1.jpg" width="48" height="158" border="0" id="index_r2_c1" alt="" /></td>
    <td valign="top" bgcolor="#ffffff"><p align="center" style="margin:0px"><a href="packages.php">Mange Packages</a></p></td>
    <td rowspan="4" colspan="3"><img name="index_r2_c4" src="images/index_r2_c4.jpg" width="40" height="303" border="0" id="index_r2_c4" alt="" /></td>
    <td colspan="2" valign="top" bgcolor="#ffffff"><p align="center" style="margin:0px"><a href="routesms.php">Manage RouteSms</a></p></td>
    <td rowspan="2" colspan="2"><img name="index_r2_c9" src="images/index_r2_c9.jpg" width="46" height="158" border="0" id="index_r2_c9" alt="" /></td>
    <td valign="top" bgcolor="#ffffff"><p align="center" style="margin:0px"><a href="#">Manage Locations</a></p></td>
    <td rowspan="2" colspan="3"><img name="index_r2_c12" src="images/index_r2_c12.jpg" width="64" height="158" border="0" id="index_r2_c12" alt="" /></td>
    <td><img src="images/spacer.gif" width="1" height="21" border="0" alt="" /></td>
  </tr>
  <tr>
    <td><img name="index_r3_c3" src="images/index_r3_c3.jpg" width="134" height="137" border="0" id="index_r3_c3" alt="" /></td>
    <td colspan="2"><img name="index_r3_c7" src="images/index_r3_c7.jpg" width="126" height="137" border="0" id="index_r3_c7" alt="" /></td>
    <td><img name="index_r3_c11" src="images/index_r3_c11.jpg" width="120" height="137" border="0" id="index_r3_c11" alt="" /></td>
    <td><img src="images/spacer.gif" width="1" height="137" border="0" alt="" /></td>
  </tr>
  <tr>
    <td rowspan="2">&nbsp;</td>
    <td colspan="2" valign="top" bgcolor="#ffffff"><p align="center" style="margin:0px"><a href="log_report.php">Log History</a><a href="view.php?tb=company"></a></p></td>
    <td valign="top" bgcolor="#ffffff"><p align="center" style="margin:0px"><a href="#">Manage </a></p></td>
    <td rowspan="2" colspan="2"><img name="index_r4_c8" src="images/index_r4_c8.jpg" width="47" height="145" border="0" id="index_r4_c8" alt="" /></td>
    <td colspan="3" valign="top" bgcolor="#ffffff"><p align="center" style="margin:0px"><a href="credit.php">Credit Detail</a></p></td>
    <td rowspan="2" colspan="2"><img name="index_r4_c13" src="images/index_r4_c13.jpg" width="55" height="145" border="0" id="index_r4_c13" alt="" /></td>
    <td><img src="images/spacer.gif" width="1" height="21" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="2"><img name="index_r5_c2" src="images/index_r5_c2.jpg" width="145" height="124" border="0" id="index_r5_c2" alt="" /></td>
    <td><img name="index_r5_c7" src="images/index_r5_c7.jpg" width="119" height="124" border="0" id="index_r5_c7" alt="" /></td>
    <td colspan="3"><img name="index_r5_c10" src="images/index_r5_c10.jpg" width="135" height="124" border="0" id="index_r5_c10" alt="" /></td>
    <td><img src="images/spacer.gif" width="1" height="124" border="0" alt="" /></td>
  </tr>
  <tr>
  	<td></td>
    <td colspan="3" valign="top" bgcolor="#ffffff"><p align="center" style="margin:0px"><a href="customers.php"> Manage Customers</a></p></td>
    <td rowspan="3">&nbsp;</td>
    <td colspan="3" valign="top" bgcolor="#ffffff"><p align="center" style="margin:0px"><a href="changepassword.php">Change Password</a></p></td>
    <td rowspan="3">&nbsp;</td>
    <td colspan="4" valign="top" bgcolor="#ffffff"><p align="center" style="margin:0px"><a href="signout.php" onClick="return confirm('Are you sure to sign out?')">Sign Out</a></p></td>
    <td rowspan="3">&nbsp;</td>
    <td><img src="images/spacer.gif" width="1" height="24" border="0" alt="" /></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="3" valign="top" bgcolor="#ffffff">&nbsp;</td>
    <td colspan="3" valign="top" bgcolor="#ffffff">&nbsp;</td>
    <td colspan="4" valign="top" bgcolor="#ffffff">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</body>
</html>