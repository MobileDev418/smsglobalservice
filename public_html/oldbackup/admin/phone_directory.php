<?php
include_once "isadmin.php";
include_once "lib_constant.php";
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
    <td width="639" class="crown_head"><?php echo $WEBSITE; ?> - Phone Directory</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
  ?>
</tr>
<tr>
<td valign="top" style="padding-top:5px">

<h2 align="center">Customers Phone #</h2>
<table width="83%"  align="center" cellpadding="4px" cellspacing="2px" id='viewdiv' class="admin_table">
<tr class="topheading" style="font-size:11px; font-weight:normal">
	<th width="53" align="left">Sr#</th>
	<th width="150" align="left" >Name</th>
   	<th width="118" align="left" >Phone</th>
    <th width="113" align="left" >Mobile</th>
</tr>

<?php
include_once "ez_sql.php";

$customers = $db->get_results("select cus_id, fname, lname, phone, mobile from customer order by fname");
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
    	echo "<td align='left'>".$cus->fname. " ".$cus->lname."</td>";
		echo "<td align='left'>".$cus->phone."</td>";
	   	echo "<td align='left'>".$cus->mobile."</td>";
		echo "</tr>";

	}
}	
?>



<tr><td colspan="4"></td></tr>
</table>

<h2 align="center"> SMS Phone #</h2>
<table width="75%"  align="center" cellpadding="4px" cellspacing="2px" id='viewdiv' class="admin_table">
<tr class="topheading" style="font-size:11px; font-weight:normal">
	<th width="49" align="left">Sr#</th>
	<th width="159" align="left" >Name</th>
   	<th width="190" align="left" >Mobile</th>
    </tr>

<?php
$history = $db->get_results("SELECT phone, sms_to FROM `history` group by phone, sms_to order by sms_to");
$ind=0;
if($history)
{
	foreach($history as $h)
	{
	
		$ind++;	
		if($ind%2==1)
			echo "<tr class='tr1'>";
		else
			echo "<tr class='tr2'>";
		
		echo "<td align='center'>".$ind."</td>";
		echo "<td align='left'>".$h->sms_to."</td>";
	   	echo "<td align='left'>".$h->phone."</td>";
		echo "</tr>";

	}
}	
?>



<tr><td colspan="3"></td></tr>
</table>



</td>
</tr>
</table>
</body>
</html>