<?php
include_once "is_spadmin.php";
include_once "lib_sp_constant.php";
//File to display customers data
include_once "../admin/ez_sql.php";
$scname="";
$scloginid="";
$scmobno="";
$scactive="2";
$scblock="2";
$scissp="2";
$spowner="0";

$showall=$_GET['showall'];
$q="select * from customer where cus_id!=0 and belong_to_sp=".$_SESSION['sp_adminid']." ";

if($showall=="1")
{
	echo 'Show All Customers';
}
elseif($_POST['submit_search']=="Search Customers")
{
	if($_POST['c_name']!="")
	{
		$scname=$_POST['c_name'];
		$q=$q." and (fname like '%".$_POST['c_name']."%' or lname like '%".$_POST['c_name']."%')";
	}
	if($_POST['c_mobno']!="")
	{
		$scmobno=$_POST['c_mobno'];
		$q=$q." and mobile like '%".$_POST['c_mobno']."%'";
	}
	if($_POST['c_loginid']!="")
	{
		$scloginid=$_POST['c_loginid'];
		//echo "login id is".$scloginid;
		$q=$q." and username like '%".$_POST['c_loginid']."%'";

	}
	if($_POST['c_active']!="2")
	{
		$scactive=$_POST['c_active'];
		$q=$q." and active=".$_POST['c_active'];
	}
	if($_POST['c_blocked']!="2")
	{
		$scblock=$_POST['c_blocked'];
		$q=$q." and block=".$_POST['c_blocked'];
	}
/*	if($_POST['c_issp']!="2")
	{
		$scissp=$_POST['c_issp'];
		$q=$q." and is_salesperson=".$_POST['c_issp'];
	}
	
	if($_POST['sp_owner']!="0")
	{
		if($_POST['sp_owner']=="no")
		{
			$spowner=$_POST['sp_owner'];
			$q=$q.' and belong_to_sp =""';
		}
		else
		{

			$spowner=$_POST['sp_owner'];
			$q=$q." and belong_to_sp=".$_POST['sp_owner'];
		}

	}*/



}
//echo $q;
	$customers = $db->get_results($q." order by cus_id");

$dmsg="This customer will be deleted permanently.\\nAre Your Sure to delete this customer?";
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
<td>
<div style="width:100%;">
<form method="post" action="customers.php">
	<table style="float:right;width:900px;border:1px solid #eee;background:#ccc;padding:10px 0px;" cellspacing="4" cellpaddin="4" >
	<tr>
		<td style="text-align:right">Name</td>
		<td><input type="text" name="c_name" value="<?php echo $scname; ?>"></td>
		<td style="text-align:right">Login ID</td>
		<td><input type="text" name="c_loginid" value="<?php echo $scloginid; ?>"></td>
		<td style="text-align:right">Mobile #</td>
		<td><input type="text" name="c_mobno" value="<?php echo $scmobno; ?>"></td>
	</tr>
	<tr>
		<td style="text-align:right">Active Status</td><td><input type="radio" name="c_active" 
	<?php 
	if($scactive=="2")
	echo 'checked="checked"';
	?>
	 value="2">All&nbsp;&nbsp;<input type="radio" name="c_active" 
	 <?php 
	 if($scactive=="1")
		echo 'checked="checked"';
	?>
	 value="1">Yes&nbsp;&nbsp;<input type="radio" name="c_active" value="0" 
	 <?php if($scactive=="0")
	echo 'checked="checked"';
	?>
	 >No</td>
	 <td style="text-align:right">Blocked Status</td><td><input type="radio" name="c_blocked"
	<?php if($scblock=="2")
	echo 'checked="checked"';
	?>

	value="2">All&nbsp;&nbsp;<input type="radio" name="c_blocked" value="1" 	
	<?php if($scblock=="1")
	echo 'checked="checked"';
	?> >Yes&nbsp;&nbsp;<input type="radio" name="c_blocked" value="0" 	
	
	<?php if($scblock=="0")
	echo 'checked="checked"';
	?>
	>No</td>
	<td colspan="2"><input type="Submit" value="Search Customers" name="submit_search">&nbsp;<input type="Submit" value="Clear Search"></td>
	</tr>
	</table>
</form>
</div>
</td>

</tr>
<tr>
<td valign="top" style="padding-top:5px">


<table width="99%"  align="center" cellpadding="4px" cellspacing="2px" id='viewdiv' class="admin_table">
<tr class="topheading" style="font-size:11px; font-weight:normal">
	<th width="23" align="left" rowspan="2">Sr#</th>
	<th width="88" align="left" rowspan="2">Name</th>
   	<th width="84" align="left" rowspan="2">User Name</th>
	<th width="84" align="left" rowspan="2">Mobile No.</th>
	<th width="84" align="left" rowspan="2">Activation Code</th>
	<th width="84" align="left" rowspan="2">Regiseration Date</th>
	<th width="84" align="left" rowspan="2">Free SMS</th>
    <th align="left" colspan="3" style="text-align:center">Credits</th>
    <th width="172" align="center" rowspan="2">Actions</th>
</tr>
<tr class="topheading" style="font-size:11px; font-weight:normal">

    <th width="46" align="left">Alloted</th>
    <th width="32" align="left">Used</th>
    <th width="51" align="left">Balance</th>

 
</tr>

<?php

//query to get customers from database


$ind=0;
if($customers)
{
	foreach($customers as $cus) //Loop for each customer
	{
		if($cus->active==1)
			$active='<a href="active_cus.php?id='.$cus->cus_id.'& val=0" onClick="return cofirmDel(\'Are you sure to un-activeate this customer?\')" ><font color="green"><img src="images/active.png" border="0" alt="Active" /></a></font>';
		else
		$active='<a href="active_cus.php?id='.$cus->cus_id.'& val=1" onClick="return cofirmDel(\'Are you sure to activate this customer?\')" ><font color="red"><img src="images/inactive.png" border="0" alt="In-Active" /></a></font>';
		
		if($cus->block==0)
			$block='<a href="block_cus.php?id='.$cus->cus_id.'& val=1" onClick="return cofirmDel(\'Are you sure to block this customer?\')" ><font color="green"><img src="images/accept.png" border="0" alt="Un-Block" /></a></font>';
		else
		$block='<a href="block_cus.php?id='.$cus->cus_id.'& val=0" onClick="return cofirmDel(\'Are you sure to un-block this customer?\')" ><font color="red"><img src="images/block.png" border="0" alt="Block" /></a></font>';
		
		
		
		if($cus->is_salesperson==0)
			$issp='<a href="sp_cus.php?id='.$cus->cus_id.'& val=1" onClick="return cofirmDel(\'Are you sure to privlidge this customer as a sales person?\')" ><font color="green"><img src="images/sp_nouser.png" border="0" alt="Sales Person" /></a></font>';
		else
			$issp='<a href="sp_cus.php?id='.$cus->cus_id.'& val=0" onClick="return cofirmDel(\'Are you sure to revoke privilidges of sales person from this customer?\')" ><font color="red"><img src="images/sp_user.png" border="0" alt="Delete Sales Person" /></a></font>';




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
    	echo "<td align='left'><a href='edit_customer.php?id=".$cus->cus_id."'>".$cus->fname. " ".$cus->lname."</a></td>";
    	echo "<td align='left'>".$cus->username."</td>";
		echo "<td align='left'>".$cus->mobile."</td>";
		echo "<td align='left'>".$cus->activation_code."</td>";
		echo "<td align='left'>".$cus->reg_date."</td>";
		echo "<td align='left'>".$cus->free_sms."</td>";
	   	echo "<td align='center' class='balance'>".$cus->credits."</td>";
		echo "<td align='center' class='balance'>".$cus->credits_used."</td>";
		echo "<td align='center' class='balance'>".$cus->balance."</td>";
//    	echo "<td align='center'>".$view."".$active."".$block."".$add_balance ."".$cus_directory."".$history."". $change_password."".$issp."".$del."</td>";
    	echo "<td align='center'>".$view."".$active."".$block."".$add_balance ."".$cus_directory."".$history."". $change_password."</td>";
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