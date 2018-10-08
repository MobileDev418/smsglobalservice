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
    <td width="639" class="crown_head"><?php echo $WEBSITE; ?> - Customers</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
  ?>
</tr>
<tr height="20px"><td height="13" align="right" class='opmsg'  style="padding-top:30px" >
<?php
		echo $_SESSION['cus_msg'];
		$_SESSION['cus_msg']="";
?>
&nbsp;</td></tr>
<tr>
<td valign="top" style="padding-top:5px">

<table width="99%"  align="center" cellpadding="4px" cellspacing="2px" id='viewdiv' class="admin_table">
<tr class="topheading" style="font-size:11px; font-weight:normal">
	<th width="23" align="left" rowspan="2">Sr#</th>
	<th width="88" align="left" rowspan="2">Name</th>
   	<th width="84" align="left" rowspan="2">User Name</th>
    <th align="left" colspan="3" style="text-align:center">Credits</th>
    <th width="172" align="center" rowspan="2">Actions</th>
</tr>
<tr class="topheading" style="font-size:11px; font-weight:normal">

    <th width="46" align="left">Alloted</th>
    <th width="32" align="left">Used</th>
    <th width="51" align="left">Balance</th>
 
</tr>

<?php
include_once "ez_sql.php";

$customers = $db->get_results("select * from customer order by cus_id");

$dmsg="This customer will be deleted permanently.\\nAre Your Sure to delete this customer?";
$ind=0;
if($customers)
{
	foreach($customers as $cus)
	{
		if($cus->active==1)
			$active='<a href="active_cus.php?id='.$cus->cus_id.'& val=0" onClick="return cofirmDel(\'Are you sure to un-activeate this customer?\')" ><font color="green"><img src="images/active.png" border="0" alt="Active" /></a></font>';
		else
		$active='<a href="active_cus.php?id='.$cus->cus_id.'& val=1" onClick="return cofirmDel(\'Are you sure to activate this customer?\')" ><font color="red"><img src="images/inactive.png" border="0" alt="In-Active" /></a></font>';
		
		if($cus->block==0)
			$block='<a href="block_cus.php?id='.$cus->cus_id.'& val=1" onClick="return cofirmDel(\'Are you sure to block this customer?\')" ><font color="green"><img src="images/accept.png" border="0" alt="Un-Block" /></a></font>';
		else
		$block='<a href="block_cus.php?id='.$cus->cus_id.'& val=0" onClick="return cofirmDel(\'Are you sure to un-block this customer?\')" ><font color="red"><img src="images/block.png" border="0" alt="Block" /></a></font>';
		
		
		$del='<a href="delete_customer.php?id='.$cus->cus_id.'" onClick="return cofirmDel(\''.$dmsg.'\')" ><img src="images/delete.png" border="0" alt="Delete" /></a>';
		$add_balance='<a href="cus_balance.php?id='.$cus->cus_id.'&name='.$cus->fname.' '.$cus->lname.' " alt="" border="0" /><img src="images/add_balance.png" border="0" alt="Balance" /></a>';
		$view='<a href="view_customer.php?id='.$cus->cus_id.'" alt=""/><img src="images/user.png" border="0" alt="View" /></a>';
		
		$history='<a href="sms_history.php?id='.$cus->cus_id.'&name='.$cus->fname.' '.$cus->lname.' " alt=""/><img src="images/history.png" border="0" alt="history" /></a>';
		
		$cus_directory='<a href="cus_contacts.php?id='.$cus->cus_id.'&name='.$cus->fname.' '.$cus->lname.' " alt=""/><img src="images/contacts.png" border="0" alt="directory" /></a>';
		
		$change_password='<a href="set_new_password.php?id='.$cus->cus_id.'&name='.$cus->fname.' '.$cus->lname.' " alt=""/><img src="images/password.png" border="0" alt="set password" /></a>';
		
		$ind++;	
		if($ind%2==1)
			echo "<tr class='tr1'>";
		else
			echo "<tr class='tr2'>";
		
		echo "<td align='center'>".$ind."</td>";
    	echo "<td align='left'>".$cus->fname. " ".$cus->lname."</td>";
    	echo "<td align='left'>".$cus->username."</td>";
	   	echo "<td align='center' class='balance'>".$cus->credits."</td>";
		echo "<td align='center' class='balance'>".$cus->credits_used."</td>";
		echo "<td align='center' class='balance'>".$cus->balance."</td>";
    	echo "<td align='center'>".$view."".$active."".$block."".$add_balance ."".$cus_directory."".$history."". $change_password."".$del."</td>";
		echo "</tr>";

	}
}	
?>
<tr><td colspan="5"></td></tr>
</table>
</td>
</tr>
</table>
</body>
</html>