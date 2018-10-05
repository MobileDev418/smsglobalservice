<?php
//This file is not a part of this application
include_once "isadmin.php";
include_once "lib_constant.php";
include_once "ez_sql.php";

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

$q="select * from history where phone='2348082188058' and sms_date >='".$lower."' and sms_date <='".$upper."' order by sms_date desc";
$sms_history=$db->get_results($q);

?>
<html>
<head>
<title><?php echo $ADMIN_TITLE; ?> - RouteSms Customer</title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="script/admin.js"></script>
</head>
<body>

<table align="center" cellpadding="0" cellspacing="0" id="admin_table">
<tr>
    <td class="crown_head"><?php echo $WEBSITE; ?> - Messages</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
  ?>
</tr>
<tr><td valign="top" style="padding-top:20px">

<table align="center" cellpadding="2" cellspacing="2" class="admin_table">
    <form method="post" action="crownsms_messages.php">
   
    <tr><td>From</td><td><select name="dt1"><?php echo $dt_box1;?></select></td><td><select name="mn1"><?php echo $month_box1;?></select></td><td><select name="y1"><?php echo $year_box1; ?></select></td><td>To</td><td><select name="dt2"><?php echo $dt_box2;?></select></td><td><select name="mn2"><?php echo $month_box2;?></select></td><td><select name="y2"><?php echo $year_box2; ?></select></td><td align="center"><input type="submit" name="showhistory" value="Show" class="submit"  /></tr>
    </form>
    </table><br/>

	<table width="99%"  align="center" cellpadding="4px" cellspacing="2px" id='viewdiv' class="admin_table">
<tr class="topheading">
  <td colspan="6">Crown Sms Messages - <span style="font-size:12px">(Phone:234-80-82188058)</span></td>
</tr>
<tr class="topheading" style="font-size:11px; font-weight:normal">
	<th width="38" align="left">Sr#</th>
	<th width="310" align="left" >SMS</th>
    <th width="95" align="left" >From</th>
    <th width="83" align="center">Date</th>
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
    	echo "<td align='left'>".$history->sms_from."</td>";
		echo "<td align='right'>".$history->sms_date."</td>";
		echo "</tr>";

	}
}	
?>
<tr><td colspan="6" align="right"><a href="index.php">Back</a></td>
</tr>
</table>  

</td>
</tr>
</table>
</body>
</html>