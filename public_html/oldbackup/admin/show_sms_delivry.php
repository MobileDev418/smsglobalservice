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
$q="select * from sms_delivery where sent_date >='".$lower."' and sent_date <='".$upper."' order by sent_date desc";
$sms_history=$db->get_results($q);

?>
<html>
<head>
<title><?php echo $ADMIN_TITLE?> - SMS Delivery Report</title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="script/admin.js"></script>

</head>
<body>

<table align="center" cellpadding="0" cellspacing="0" id="admin_table">
<tr>
    <td class="crown_head"><?php echo $WEBSITE ?> -  SMS Delivery Report</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
  ?>
</tr>
<tr><td valign="top" style="padding-top:20px">

<table align="center" cellpadding="2" cellspacing="2" class="admin_table">
    <form method="post" action="show_sms_delivry.php">
    <input type="hidden" name="cus_id" value="<?php echo $id;?>" />
    <input type="hidden" name="cus_name" value="<?php echo $name;?>" />
    
    <tr><td>From</td><td><select name="dt1"><?php echo $dt_box1;?></select></td><td><select name="mn1"><?php echo $month_box1;?></select></td><td><select name="y1"><?php echo $year_box1; ?></select></td><td>To</td><td><select name="dt2"><?php echo $dt_box2;?></select></td><td><select name="mn2"><?php echo $month_box2;?></select></td><td><select name="y2"><?php echo $year_box2; ?></select></td><td align="center"><input type="submit" name="showhistory" value="Show" class="submit"  /></tr>
    </form>
    </table><br/>

	<table width="99%"  align="center" cellpadding="4px" cellspacing="2px" id='viewdiv' class="admin_table">
<tr class="topheading">
  <td colspan="8">Sms Delivery Report</td>
</tr>
<tr class="topheading" style="font-size:11px; font-weight:normal">
	<th width="23" align="left">Sr#</th>
    <th width="20" align="left">Id</th>
	<th width="138" align="left" >Message</th>
    <th width="34" align="left" >Type</th>
    <th width="63" align="left" >Customer</th>
    <th width="82" align="left" >Return Code</th>
    <th width="82" align="left" >Delivered</th>
    <th width="136" align="center">Date</th>
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
		echo "<td align='center'>".$history->delievery_id."</td>";
		echo "<td align='left'>".$history->message."</td>";
		if ($history->type==0)
			$msg_type="Text";
		elseif ($history->type==1)
			$msg_type="Flash";
		else
			$msg_type="Unicode";
		
    	echo "<td align='left'>".$msg_type."</a></td>";
    	if ($history->cus_id==0)
echo "<td align='center'>".$history->cus_id."</td>";
else

echo "<td align='center'><a href='view_customer.php?id=".$history->cus_id."'>".$history->cus_id."</td>";
		
    	echo "<td align='left'>".$history->return_code."</td>";
		echo "<td align='center'>";
		if(substr($history->return_code,0,4)==1701)
			echo '<img src="../images/success.png" alt="yes" />';
		else
			echo '<img src="../images/fail.png" alt="no" />';
		echo "</td>";
		echo "<td align='right'>".$history->sent_date."</td>";
		echo "</tr>";

	}
}	
?>
<tr><td colspan="8" align="right"><a href="index.php">Back</a></td></tr>
</table>  


</td>
</tr>
</table>
</body>
</html>