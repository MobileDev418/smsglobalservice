<?php
include_once "isadmin.php";
include_once "lib_constant.php";
include_once "ez_sql.php";
include_once "../inc/date_selector.php";
?>

<html>
<head>
<title><?php echo $ADMIN_TITLE; ?> - SMS History</title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="script/admin.js"></script>

</head>
<body>

<table align="center" cellpadding="0" cellspacing="0" id="admin_table">
<tr>
    <td class="crown_head"><?php echo $WEBSITE; ?> - SMS History</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
  ?>
</tr>
<tr><td valign="top" style="padding-top:20px">
<table align="center" cellpadding="2" cellspacing="2" class="admin_table">
    <form method="post" action="show_sms.php">
    
    <tr>
    	<td>From</td><td><select name="dt1"><?php echo $dt_box1;?></select></td><td><select name="mn1"><?php echo $month_box;?></select></td><td><select name="y1"><?php echo $year_box; ?></select></td></tr>
        <tr>
    	<td>To</td><td><select name="dt2"><?php echo $dt_box2;?></select></td><td><select name="mn2"><?php echo $month_box;?></select></td><td><select name="y2"><?php echo $year_box; ?></select></td>
        
    </tr>
    <tr><td align="center" colspan="4"><input type="submit" name="showhistory" value="SMS History" class="submit"  />&nbsp; <input type="button" value="Cancel" class="submit" onClick="window.location='index.php'" /></td></tr>
    </form>
    </table>
    
</td>
</tr>
</table>
</body>
</html>