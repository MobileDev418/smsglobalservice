<?php
include_once "is_spadmin.php";
include_once "lib_sp_constant.php";
include_once "../admin/ez_sql.php";
//Display Form to update customer balanace
//Get the id and name from query string. This page is called from customers page
@$id=$_GET['id'];
include_once "is_sp_client.php";
if($is_sp_client=="")
	header ("Location:customers.php");

@$name=$_GET['name'];

$credits = $db->get_var("select credits from customer where cus_id=".$id);

?>
<html>
<head>
<title><?php echo $ADMIN_TITLE; ?> - Update Balance</title>
<link href="../admin/css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../admin/script/admin.js"></script>
<script type="text/javascript" >

function update_balance(opt)
{
	var old_bal=balance.old_balance.value;
	var deposit=balance.amount.value;
	var new_bal;
	if(isNaN(deposit) || deposit=="")
	{
		alert("Please enter numbers in deposit");
		balance.amount.focus();
		return false;
	}
	
	if(opt==1)
		new_bal=parseInt(old_bal)+parseInt(deposit);
	else
		new_bal=old_bal-deposit
		balance.new_balance.value=new_bal;
		balance.set_bal.value=new_bal;

}

function confirm_update()
{
	var set_balance=balance.new_balance.value;
	conf=confirm("Customer new credit is "+set_balance+".\nAre You Sure to update this credit?");
	return conf;
}

</script>


</head>
<body onLoad="document.getElementById('amount').focus()">

<table align="center" cellpadding="0" cellspacing="0" id="admin_table">
<tr>
    <td class="crown_head"><?php echo $WEBSITE; ?> - Customer Balance</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
  ?>
</tr>
<tr><td valign="top" style="padding-top:20px" align="center">
<table align="center"  cellpadding="2px"  cellspacing="2px" class="admin_table">
  <form name="balance" method="post" action="update_balance.php" onSubmit="return confirm_update()">
    <tr class="topheading" height="29px">
      <td colspan="2" align="center"><?php echo ucfirst($name);?> - Update Balance </td>
    </tr>
    <tr>
      <td  align="right">Credit Alloted:</td>
      <td width="142">
      <input name="cus_id" type="hidden" value="<?php echo $id; ?>" /><input type="hidden" name="set_bal" 
      	value="<?php if($credits==0)
	  		echo "0";
				else
			echo $credits; ?>"/>
      <input name="old_balance" type="text"  class="textbox" id="old_balance" disabled="disabled" value="<?php if($credits==0)
	  		echo "0";
				else
			echo $credits; ?>"/></td>
    </tr>
    <tr>
      <td  align="right">Deposit:</td>
      <td width="142"><input name="amount" type="text"  class="textbox" id="amount" /></td>
    </tr>
    <tr>
      <td align="center" colspan="2" ><input type="button" name="add" value="Add (+)" onClick="update_balance(1)" >
      &nbsp;<input type="button" name="minus" value="Minus (-)" onClick="update_balance(0)" >&nbsp;</td>
      
    </tr>
    <tr>
	<td align="right">New Credit:</td>
    <td><input name="new_balance" type="text"  class="textbox" id="new_balance" disabled="disabled" value="<?php if($balance==0)
	  		echo "0";
				else
			echo $balance; ?>"/></td>
</tr>





<tr>
	<td height="30" colspan="2" align="center"><input type="submit" value="Update Credits" class="submit"/>
	 &nbsp;
    <input type="button" value="Cancel" class="submit" onClick="window.location='customers.php'" />&nbsp;<input type="button" name="Payment" class="submit" value="PalPal Payment" onClick="window.location='showpaypalpayment.php?id=<?php echo $id;?>&name=<?php echo $name ?>'" ></td>
</tr>
</form>
</table>
</td>
</tr>
</table>
</body>
</html>