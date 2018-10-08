<?php
include_once "isadmin.php";
include_once "lib_constant.php";

?>
<html>
<head>
<title><?php echo $ADMIN_TITLE; ?> - Log Report</title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="script/admin.js"></script>

</head>
<body>

<table align="center" cellpadding="0" cellspacing="0" id="admin_table">
<tr>
    <td class="crown_head"><?php echo $WEBSITE; ?> - Log Report</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
  ?>
</tr>
<tr><td valign="top" style="padding-top:20px" align="center">
<table align="center"  cellpadding="2px"  cellspacing="2px" class="admin_table">

<tr><td align="center"><iframe src="rpt_frame.php" width="500px" height="400px"> </iframe></td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>