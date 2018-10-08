<?php
include_once "isadmin.php";
include_once "lib_constant.php";
include_once "ez_sql.php";
@$id=$_POST['cus_id'];
@$name=$_POST['cus_name'];
$dt1=$_POST['dt1'];
$dt2=$_POST['dt2']+1;
if($dt2<9)
		$dt2='0'.$dt2;
$mt1=$_POST['mn1'];
$mt2=$_POST['mn2'];
$y1=$_POST['y1'];
$y2=$_POST['y2'];

include_once "../inc/history_selector.php";	

$lower=$y1."-".$mt1."-".$dt1;
$upper=$y2."-".$mt2."-".$dt2;
$q="select * from history where cus_id=".$id." and sms_date >='".$lower."' and sms_date <='".$upper."' order by sms_date desc";
$sms_history=$db->get_results($q);

?>
<html>
<head>
<title><?php echo $ADMIN_TITLE?> - Customer</title>
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
    
    <tr><td>From</td><td><select name="dt1"><?php echo $dt_box1;?></select></td><td><select name="mn1"><?php echo $month_box1;?></select></td><td><select name="y1"><?php echo $year_box1; ?></select></td><td>To</td><td><select name="dt2"><?php echo $dt_box2;?></select></td><td><select name="mn2"><?php echo $month_box2;?></select></td><td><select name="y2"><?php echo $year_box2; ?></select></td><td align="center"><input type="submit" name="showhistory" value="Show" class="submit"  /></tr>
    </form>
    </table><br/>

	<table width="99%"  align="center" cellpadding="4px" cellspacing="2px" id='viewdiv' class="admin_table">
<tr class="topheading"><td colspan="6"><?php echo ucfirst($name);?> - Sms History</td></tr>
<tr class="topheading" style="font-size:11px; font-weight:normal">
	<th width="23" align="left">Sr#</th>
	<th width="162" align="left" >SMS</th>
    <th width="77" align="left" >To</th>
    <th width="89" align="left" >Phone</th>
    <th width="67" align="left" >From</th>
    <th width="88" align="center">Date</th>
</tr>

<?php

$ind=0;
if($sms_history)
{
	foreach($sms_history as $history)
	{
		$ind++;	
		if($ind%2==1)
			echo "<tr class='tr1'>";
		else
			echo "<tr class='tr2'>";
		
		echo "<td align='center'>".$ind."</td>";
    	echo "<td align='left'>".$history->sms."</td>";
		echo "<td align='left'>".$history->sms_to."</td>";
    	echo "<td align='left'>".$history->phone."</td>";
    	echo "<td align='left'>".$history->sms_from."</td>";
		echo "<td align='right'>".$history->sms_date."</td>";
		echo "</tr>";

	}
}	
?>
<tr><td colspan="6" align="right"><a href="customers.php">Back</a></td></tr>
</table>  

</td>
</tr>
</table>
</body>
</html>