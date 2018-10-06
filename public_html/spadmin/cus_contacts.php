<?php
include_once "is_spadmin.php";
include_once "lib_sp_constant.php";
//File displays customer contacts list from database. Page gets customer id from query string and then displays customer contacts from contacts table
@$id=$_GET['id'];
include_once "is_sp_client.php";
if($is_sp_client=="")
	header ("Location:customers.php");

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
    <td width="639" class="crown_head"><?php echo $WEBSITE; ?> - Customer Contacts</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
  ?>
</tr>
<tr>
<td valign="top" style="padding-top:5px">

<h2 align="center"><?php echo  ucwords($_GET['name']);  ?> Contacts</h2>
<table width="71%"  align="center" cellpadding="4px" cellspacing="2px" id='viewdiv' class="admin_table">
<tr class="topheading" style="font-size:11px; font-weight:normal">
	<th width="76" align="left">Sr#</th>
	<th width="195" align="left" >Name</th>
   	<th width="104" align="left" >Mobile</th>
</tr>

<?php
include_once "../admin/ez_sql.php";

$customers = $db->get_results("select * from contacts where cus_id=".$_GET['id']);
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
    	echo "<td align='left'>".$cus->name."</td>";
	   	echo "<td align='left'>".$cus->phone."</td>";
		echo "</tr>";

	}
}	
?>

<tr><td colspan="3" align="right"><a href="customers.php">Back</a></td></tr>
</table>

<h2 align="center">&nbsp;</h2>
</td>
</tr>
</table>
</body>
</html>