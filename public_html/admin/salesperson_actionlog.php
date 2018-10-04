<?php
include_once "isadmin.php";
include_once "lib_constant.php";
include_once "ez_sql.php";
//File to display a form for sales person to add new correspondents with client
?>
<html>
<head>
<title><?php echo $ADMIN_TITLE; ?> - Salesperson Action Log</title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/default.js"></script>
</head>
<body>

<table align="center" cellpadding="0" cellspacing="0" id="admin_table">
<tr>
    <td class="crown_head"><?php echo $WEBSITE; ?> - Salesperson Action Log</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
	include_once "../inc/date_selector.php";

  ?>
</tr>

<tr><td valign="top" style="padding-top:10px" align="center">


<table align="center"  cellpadding="2px"  cellspacing="2px" bgcolor="#E7F0F8"  class="admin_table" style="width:500px;">
    <tr class="topheading" height="29px">
      <td colspan="8" align="center">Salesperson Action Log</td>
    </tr>


    <form method="post" action="salesperson_actionlog_history.php">
     <input type="hidden" name="pagenumber" value="1" />  
    <tr>
    	<td>From</td><td><select name="dt1"><?php echo $dt_box1;?></select></td><td><select name="mn1"><?php echo $month_box;?></select></td><td><select name="y1"><?php echo $year_box; ?></select></td><td>To</td><td><select name="dt2"><?php echo $dt_box2;?></select></td><td><select name="mn2"><?php echo $month_box;?></select></td><td><select name="y2"><?php echo $year_box; ?></select></td>
        
    </tr>
    <tr>
    	<td colspan="8" style="text-align:right">Sales Person:&nbsp;

	<select name="salesperson">
<option value="0">Select Sales Person</option>
	<?php
		$qsp="select cus_id, fname, lname from customer where is_salesperson=1";
		$salespersons = $db->get_results($qsp." order by fname");
		if($salespersons)
		{
			foreach($salespersons as $sp) //Loop for each customer
			{
				echo '<option value="'.$sp->cus_id.'">'.$sp->fname .' '.$sp->lname .'</option>';

			}
		}
	?>



	</select></td>
        
    </tr>


    <tr><td align="right" colspan="8"><input type="submit" name="showhistory" value="View Actions Log" class="submit"  />&nbsp; <input type="button" value="Cancel" class="submit" onClick="window.location='index.php'" /></td></tr>
    </form>
    </table>
    
</td>
</tr>
</table>
</body>
</html>