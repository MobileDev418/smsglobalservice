<?php
include_once "isadmin.php";
include_once "lib_constant.php";
//File to display sms packages info with icons to perform opertions like add new package, edit, publish and delete package

?>
<html>
<title><?php echo $ADMIN_TITLE; ?> - Packages</title>
<head>
<script type="text/javascript" src="script/admin.js">
</script>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table align="center" cellpadding="0" cellspacing="0" id="admin_table">
<tr>
    <td class="crown_head"><?php echo $WEBSITE; ?> - Packages</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
  ?>
</tr>
<tr><td valign="top" style="padding-top:20px">
<table width="508" align="center">
<tr>
			<td width="37"><a href="#" onClick="showView()"><img src='images/view.png' border='0' alt='Show All' /></a></td>
		  <td width="33"><a href="#" onClick="showNew()"> <img src='images/new.png' alt='New' border='0' /></a></td>
<td width="28"><a href="#" onClick="showEdit(<?php echo $ind;?>)"><img src='images/edit.png' alt='Edit' border='0' /></a></td>

		  <td width="390" align="right">
<?php
if ($_SESSION['msg'])
{
	echo "<span class='opmsg'  id='opmsg'>".ucwords($_SESSION['msg'])."</span>";
	$_SESSION['msg']="";
}
else
	echo "<span class='opmsg' id='opmsg'></span>";

?>	</td>
</tr>
<tr>
	<td class="smalllink"><a href="#" onClick="showView()">View</a></td>
	<td class="smalllink"><a href="#" onClick="showNew()">New</a></td>
	<td class="smalllink"><a href="#" onClick="showEdit(<?php echo $ind;?>)">Edit</a></td>
	<td></td>
</tr>
<tr>
  <td colspan="4" ><table  bgcolor="#E7F0F8"  align="center" cellspacing="2px" cellpadding="4px" id='viewdiv' style="float:right; position:absolute; visibility:visible; width: 500px; height:27px; border-width:1px; border-color:#A3B2CC; border-style:solid">
<tr class="topheading">
	<td width="35" align="center">Sr#</td>
	<td width="34" align="center">ID</td>
    <td width="218" align="left" >Package</td>
    <td width="36" align="center">Price/Unit</td>
    <td width="36" align="center">SMS Range</td>
    <td width="59" align="center">Publish</td>
    <td width="54" align="center">Delete</td>
</tr>

<?php
include_once "ez_sql.php";

$packages = $db->get_results("select * from package order by pack_id");

$dmsg="This package will be deleted permanently.\\nAre Your Sure to delete this package?";
$ind=0;
if($packages)
{
	$pack_options="";
	foreach($packages as $pack)
	{	
	
		$id=$pack->pack_id;

		$package_name="<a href='#' onclick='showEdit(".$ind.",\"".$pack->package."\",\"".$pack->cost."\",\"".$pack->description."\",\"".$pack->buynowlink."\",\"".$pack->sms_lower."\",\"".$pack->sms_upper."\")' class='edname' />".$pack->package. "</a>";
		if($pack->publish==1)
		$publish="<a href='publish_package.php?id=".$id."& val=0'<font color='green'><img src='images/publish.png' border='0' alt='Y' /></a></font>";
		else
			$publish="<a href='publish_package.php?id=".$id."& val=1'><font color='red'><img src='images/un_publish.png' border='0' alt='N' /></a></font>";
	
		$del='<a href="delete_package.php?id='.$id.'" onClick="return cofirmDel(\''.$dmsg.'\')" ><img src="images/delete.png" alt="Delete" border="0" /></a>';
		$ind++;	
		if($ind%2==1)
			echo "<tr class='tr1'>";
		else
			echo "<tr class='tr2'>";
		
		echo "<td align='center'>".$ind."</td>";
		echo "<td align='center'>".$id."</td>";
    	echo "<td align='left'>".$package_name."</td>";
    	echo "<td align='center'>".$pack->cost."</a></td>";
        echo "<td align='center'>".$pack->sms_lower."-".$pack->sms_upper."</a></td>";
    	echo "<td align='center'>".$publish."</td>";
    	echo "<td align='center'>".$del."</td>";
		echo "</tr>";
		echo '<tr><td colspan="3" style="font-weight:bold;text-align:right;vertical-align:top">BuyNow Link</td><td colspan="4"><a href='.$pack->buynowlink.' target="_blank" >'.$pack->buynowlink.'</a></td></tr>';

		$pack_options.="<option value='".$id."'>".$package_name."</option>";
	}
}	
?>
<tr><td colspan="6"></td></tr>
</table>
<table bgcolor="#E7F0F8" style="visibility:hidden; position:absolute; width: 500px; border-width:1px; border-color:#A3B2CC; border-style:solid; height: 50px;" id='newdiv'>
<form method="post" action="add_package.php" onSubmit="return validAddForm()">
<tr class="topheading">
	<td height="29" colspan="3" align="center">Add New Package</td>
</tr>

<tr>
	 
	<td width="182" height="26" align="right" >Name *</td>
	 <td width="142"><input type="text" maxlength="150" id='name' name="new_pack" class="textbox" /></td>
	<td width="160" align="left">&nbsp;</td>
</tr>

<tr>
	<td width="182" height="26" align="right" >Price/unit *</td>
	<td width="142"><input type="text" maxlength="150" id='amount' name="amount" class="textbox" /></td>
	<td width="160" align="left">&nbsp;</td>
</tr>

<tr>
	<td width="182" height="26" align="right" >SMS Lower *</td>
	<td width="142"><input type="text" maxlength="150" id='lowersms' name="lowersms" class="textbox" /></td>
	<td width="160" align="left">&nbsp;</td>
</tr>
<tr>
	<td width="182" height="26" align="right" >SMS Upper *</td>
	<td width="142"><input type="text" maxlength="150" id='uppersms' name="uppersms" class="textbox" /></td>
	<td width="160" align="left">&nbsp;</td>
</tr>

<tr>
	 
	<td width="182" height="26" align="right" >Descrption</td>
	 <td width="142"><input type="text" maxlength="400" id='decrption' name="desc" class="textbox" /></td>
	<td width="160" align="left">&nbsp;</td>
</tr>

<tr>
	 
	<td width="182" height="26" align="right" >Buy Now Link</td>
	 <td width="142"><input type="text" maxlength="2000" id='buynow' name="buynowlink" class="textbox" /></td>
	<td width="160" align="left">&nbsp;</td>
</tr>


<tr>
  <td height="26" align="right" >&nbsp;</td>
  <td align="center"><input type="submit" name="New" value="Save" class="submit" />&nbsp; <input type="button" value="Cancel" class="submit" onClick="showView()" /></td>
  <td align="left">&nbsp;</td>
</tr>
<tr>
  <td height="26" align="right" >&nbsp;</td>
  <td>&nbsp;</td>
  <td align="left">&nbsp;</td>
</tr>
</form>
</table>



<table bgcolor="#E7F0F8" id='eddiv' style='visibility:hidden; position:absolute; width: 500px; border-width:1px; border-color:#A3B2CC; border-style:solid; height: 104px;'  >
<form method="post" action="update_package.php" onSubmit="return validUpdateForm()">
<tr class="topheading" height="29px">
	<td colspan="3" align="center">Update Package</td>
</tr>

<tr>
	<tr>
    	<td>        </td>
    </tr>
    <tr>
		<td width="205" align="right">New Name</td>
	    <td><select name="package_id" id="clist"  class="choics_list" ><?php echo $pack_options; ?></select></td>
  	</tr>
    <tr>
		<td width="205" align="right">New Name</td>
	    <td><input type="text" id="new_name" name="new_name" class="textbox" /></td>
  	</tr>
<tr>
	<td align="right">New Amount</td>
    <td><input type="text" id="new_amount" name="new_amount" class="textbox" /></td>
</tr>
<tr>
	<td align="right">New SMS Lower</td>
    <td><input type="text" id="new_sms_lower" name="new_sms_lower" class="textbox" /></td>
</tr>
<tr>
	<td align="right">New SMS Upper</td>
    <td><input type="text" id="new_sms_upper" name="new_sms_upper" class="textbox" /></td>
</tr>

<tr>
	<td align="right">New Descrption</td>
    <td><input type="text" id="new_desc" name="new_desc" class="textbox" /></td>
</tr>

<tr>
	 
	<td width="182" height="26" align="right" >Buy Now Link</td>
	 <td width="142"><input type="text" maxlength="2000" id='new_buynow' name="new_buynowlink" class="textbox" /></td>
	<td width="160" align="left">&nbsp;</td>
</tr>


<tr>
	<td></td>
    <td><input type="submit" value='Update' class="submit" />&nbsp;
    <input type="button" value="Cancel" class="submit" onClick="showView()" /></td>
</tr>
<tr height="5px"><td colspan="2"></td></tr>
</form>
</table></td></tr></table>
</td>
</tr>
</table>
</body>
</html>