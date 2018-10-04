<?php
include_once "isadmin.php";
include_once "lib_constant.php";
//File to display customer pay pal payment histroy. File is called from  cus_balance.php
?>
<html>
<title><?php echo $ADMIN_TITLE; ?> - Customers</title>
<head>
<script type="text/javascript" src="script/admin.js">
</script>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="652" align="center" cellpadding="0" cellspacing="0" id="admin_table">
<tr>
    <td width="639" class="crown_head"><?php echo $WEBSITE; ?> - Customer Payment</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
  ?>
</tr>
<tr>
<td valign="top" style="padding-top:5px">

<h2 align="center"><?php echo  ucwords($_GET['name']);  ?> - Payment History</h2>
<table width="72%"  align="center" cellpadding="4px" cellspacing="2px" id='viewdiv' class="admin_table">
<tr class="topheading" style="font-size:11px; font-weight:normal">
	<th width="58" align="left">Sr#</th>
	<th width="130" align="left" >SMS Quantity</th>
   	<th width="87" align="left" >Price/Unit</th>
    <th width="87" align="left" >Payment</th>
  	<th width="96" align="left" >Date</th>
</tr>

<?php
include_once "ez_sql.php";

//query to get customer payment histroy. get id from query string

$customers = $db->get_results("select * from paypal_payments where customer_id=".$_GET['id']);
$ind=0;
if($customers)
{
	foreach($customers as $cus)
	{
	
		$ind++;	
		if($ind%2==1)
			echo "<tr class='tr1'>";
		else
			echo "<tr class='tr2'>";
		
		echo "<td align='center'>".$ind."</td>";
    	echo "<td align='left'>".$cus->quantity."</td>";
	   	echo "<td align='right'>".$cus->price."</td>";
		echo "<td align='right'>".$cus->quantity*$cus->price."$</td>";
		echo "<td align='right'>".$cus->buy_date."</td>";
		echo "</tr>";

	}
}	
?>

<tr><td colspan="5" align="right"><a href="customers.php">Back</a></td></tr>
</table>

<h2 align="center">&nbsp;</h2>
</td>
</tr>
</table>
</body>
</html>