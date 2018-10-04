<?php
include_once "isadmin.php";
include_once "lib_constant.php";
include_once "ez_sql.php";
//File is called from customers.php file to dipslay a cutomer detail
//Get customer data
@$id=$_GET['id'];
//Get customer inforamtion from database

$cus=$db->get_row("select * from customer where cus_id=".$id);
?>
<html>
<head>
<title><?php echo $ADMIN_TITLE?> - Edit Customers</title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="script/admin.js"></script>

</head>
<body>

<table align="center" cellpadding="0" cellspacing="0" id="admin_table">
<tr>
    <td class="crown_head"><?php echo $WEBSITE; ?> - Customer</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
  ?>
</tr>
<tr><td valign="top" style="padding-top:20px">
<form method="post" action="update_customer.php">
<input type="hidden" name="cid" value="<?php echo $cus->cus_id; ?>" />

<table width="506" align="center"  cellpadding="2px"  cellspacing="2px" class="admin_table">
 	
    <tr class="topheading" height="29px">
      <td align="center" colspan="2"> <?php echo ucfirst($cus->fname)." ".ucfirst($cus->lname); ?></td>
    </tr>
     <tr><td align="right" class="td1">Customer ID</td><td align="left" class="td2"><?php echo $cus->cus_id; ?></td></tr>
    <tr><td align="right" class="td1">User Name</td><td align="left" class="td2"><?php echo $cus->username; ?></td></tr>
	<tr><td align="right" class="td1">Mobile No</td><td align="left" class="td2"><input type="text" name="mobile_no" value="<?php echo $cus->mobile; ?>" /></td></tr>
	<tr><td align="right" class="td1">Free SMS</td><td align="left" class="td2"><input type="text" name="free_sms" value="<?php echo $cus->free_sms; ?>" /></td></tr>
    <tr><td align="right" class="td1">Activation Code</td><td align="left" class="td2"><input type="text" name="activation_code" value="<?php echo $cus->activation_code; ?>" /></td></tr>
	 <tr><td align="right" class="td1">Active</td><td align="left" class="td2">
	 <input type="radio" name="isactive" value="1" <?php 
	 if ($cus->active==1)
	  	echo 'Checked="Checked"';
	  ?>" />Yes &nbsp;&nbsp;&nbsp;
	<input type="radio" name="isactive" value="0" <?php 
	 if ($cus->active==0)
		echo 'Checked="Checked"';
	  ?>"/>No

	  </td></tr>
<tr><td align="right" class="td1">Assign to Sales Person </td><td align="left" class="td2">
<select name="sp_owner">
<option value="0">Select Sales Person</option>
?>
<?php
$qsp="select cus_id, fname, lname from customer where is_salesperson=1";
$salespersons = $db->get_results($qsp." order by fname");
if($salespersons)
{
	foreach($salespersons as $sp) //Loop for each customer
	{
	echo '<option value="'.$sp->cus_id.'"';
	if($sp->cus_id==$cus->belong_to_sp)
		echo 'selected="selected"';
	echo ' >'.$sp->fname .' '.$sp->lname .'</option>';

	}
}
?>
</select>

</tr>


<tr><td colspan="2" style="text-align:center"><br/><br/><input type="submit" name="submit" value="Update Customer" >&nbsp;<input type="button" name="cancel" onClick="window.location='customers.php'" value="Cancel" />
<br/><br/>
</td></tr>


</table>
</td>
</tr>
</table>


</form>
</body>
</html>