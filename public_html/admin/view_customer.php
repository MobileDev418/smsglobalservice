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
<title><?php echo $ADMIN_TITLE?> - Customers</title>
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
<table width="506" align="center"  cellpadding="2px"  cellspacing="2px" class="admin_table">
 	
    <tr class="topheading" height="29px">
      <td align="center" colspan="2"> <?php echo ucfirst($cus->fname)." ".ucfirst($cus->lname); ?></td>
    </tr>
     <tr><td align="right" class="td1">Customer ID</td><td align="left" class="td2"><?php echo $cus->cus_id; ?></td></tr>
    <tr><td width="110" align="right" class="td1">First Name</td><td width="380" align="left" class="td2"><?php echo $cus->fname; ?></td></tr>
    <tr><td align="right" class="td1">Last Name</td><td align="left" class="td2"><?php echo $cus->lname; ?></td></tr>
    <tr><td align="right" class="td1">User Name</td><td align="left" class="td2"><?php echo $cus->username; ?></td></tr>
    <tr><td align="right" class="td1">Adress</td><td align="left" class="td2"><?php echo $cus->address; ?></td></tr>
    <tr><td align="right" class="td1">City</td><td align="left" class="td2"><?php echo $cus->city; ?></td></tr>
    <tr><td align="right" class="td1">Country</td><td align="left" class="td2"><?php echo $db->get_var("select name from country where id=".$cus->country) ?></td></tr>
    <!--<tr><td align="right" class="td1">Phone</td><td align="left" class="td2"><?php echo $cus->phone; ?></td></tr>-->
	<tr><td align="right" class="td1">Mobile No</td><td align="left" class="td2"><?php echo $cus->mobile; ?></td></tr>

    <tr><td align="right" class="td1">Sender's ID</td><td align="left" class="td2"><?php echo $cus->currentsid; ?></td></tr>
    <tr><td align="right" class="td1">E-mail</td><td align="left" class="td2"><?php echo $cus->email; ?></td></tr>
        <tr><td align="right" class="td1">Credit Alloted</td><td align="left" class="td2"><span class="balance"><?php echo $cus->credits; ?></span></td></tr>
            <tr><td align="right" class="td1">Credit used</td><td align="left" class="td2"><span class="balance"><?php echo $cus->credits_used; ?></span></td></tr>
    <tr><td align="right" class="td1">Balance</td><td align="left" class="td2"><span class="balance"><?php echo $cus->balance; ?></span></td></tr>
    <tr><td align="right" class="td1">Registered Date</td><td align="left" class="td2"><?php echo $cus->reg_date; ?></td></tr>
    <tr><td align="right" class="td1">Activation Code</td><td align="left" class="td2"><?php echo $cus->activation_code; ?></td></tr>
    <tr><td align="right" class="td1">Activation Date</td><td align="left" class="td2"><?php echo $cus->activation_date; ?></td></tr>
     <tr><td align="right" class="td1">Active</td><td align="left" class="td2"><?php 
	 if ($cus->active==1)
	  	echo "Yes";
	else
		echo "No";
	  ?></td></tr>
    
    
    <tr><td align="right" class="td1">Blocked</td><td align="left" class="td2"><?php 
	 if ($cus->block==0)
	  	echo "No";
	else
		echo "yes";
	  ?></td></tr>
<tr><td align="right" class="td1">Sales Person Representative</td><td align="left" class="td2"><?php 
	$qspnm="select fname, lname from customer where cus_id=".$cus->belong_to_sp;
	$spnm=$db->get_row($qspnm);
	if($spnm->fname!="")
	echo $spnm->fname." ".$spnm->lname;
	  ?></td></tr>

<tr>
  <td height="30" align="right" colspan="2" ><a href="customers.php">Back</a></td>
</tr>

</table>
</td>
</tr>
</table>
</body>
</html>