<?php
include_once "is_spadmin.php";
include_once "lib_sp_constant.php";
include_once "../admin/ez_sql.php";
//Get customer data
@$id=$_GET['id'];
include_once "is_sp_client.php";
if($is_sp_client=="")
	header ("Location:customers.php");

@$name=$_GET['name'];
include_once "../inc/date_selector.php";
?>

<html>
<head>
<title><?php echo $ADMIN_TITLE?> - Customer SMS History</title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="script/admin.js"></script>

</head>
<body>

<table align="center" cellpadding="0" cellspacing="0" id="admin_table">
<tr>
    <td class="crown_head"><?php echo $WEBSITE ?> - Customer SMS History</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
  ?>
</tr>
<tr><td valign="top" style="padding-top:20px">
<table align="center" cellpadding="2" cellspacing="2" class="admin_table">
    <form method="post" action="show_history.php">
    <input type="hidden" name="cus_id" value="<?php echo $id;?>" />
    <input type="hidden" name="cus_name" value="<?php echo $name;?>" />
     <input type="hidden" name="pagenumber" value="1" />
    
    <tr>
    	<td>From</td><td><select name="dt1"><?php echo $dt_box1;?></select></td><td><select name="mn1"><?php echo $month_box;?></select></td><td><select name="y1"><?php echo $year_box; ?></select></td></tr>
        <tr>
    	<td>To</td><td><select name="dt2"><?php echo $dt_box2;?></select></td><td><select name="mn2"><?php echo $month_box;?></select></td><td><select name="y2"><?php echo $year_box; ?></select></td>
        
    </tr>
    <tr><td align="center" colspan="4"><input type="submit" name="showhistory" value="Show History" class="submit"  />&nbsp; <input type="button" value="Cancel" class="submit" onClick="window.location='customers.php'" /></td></tr>
    </form>
    </table>
    
</td>
</tr>
</table>
</body>
</html>