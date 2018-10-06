<?php
include_once "is_spadmin.php";
include_once "lib_sp_constant.php";
//File to display a form for sales person to add new correspondents with client
?>
<html>
<head>
<title><?php echo $ADMIN_TITLE; ?> - Correspondents - Add New</title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/default.js"></script>

<script type="text/javascript" >

function validCorrespondentsForm()
{

	if(sign.clname.value=="")
	{
		alert("Enter Client Name.");
		sign.clname.focus();
		return false;
	}
	if(sign.clmobile.value=="")
	{
		alert("Enter Client Mobile #.");
		sign.clmobile.focus();
		return false;
	}
	if(sign.cldisc.value=="")
	{
		alert("Enter Comments of client as discussed during the phone call.");
		sign.cldisc.focus();
		return false;
	}
	
	
}
</script>


</head>
<body>

<table align="center" cellpadding="0" cellspacing="0" id="admin_table">
<tr>
    <td class="crown_head"><?php echo $WEBSITE; ?> - Correspondents</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
	include_once "../inc/date_selector.php";

  ?>
</tr>
<tr height="20px"><td height="13" align="right" class='opmsg'  style="padding-top:30px" >
<?php
		echo $_SESSION['corres'];
		$_SESSION['corres']="";
?>
&nbsp;</td></tr>

<tr><td valign="top" style="padding-top:10px" align="center">


<table align="center"  cellpadding="2px"  cellspacing="2px" bgcolor="#E7F0F8"  class="admin_table" style="width:500px;">
    <tr class="topheading" height="29px">
      <td colspan="8" align="center">View Correspondents</td>
    </tr>


    <form method="post" action="correspondents_history.php">
     <input type="hidden" name="pagenumber" value="1" />  
    <tr>
    	<td>From</td><td><select name="dt1"><?php echo $dt_box1;?></select></td><td><select name="mn1"><?php echo $month_box;?></select></td><td><select name="y1"><?php echo $year_box; ?></select></td><td>To</td><td><select name="dt2"><?php echo $dt_box2;?></select></td><td><select name="mn2"><?php echo $month_box;?></select></td><td><select name="y2"><?php echo $year_box; ?></select></td>
        
    </tr>
    <tr><td align="right" colspan="8"><input type="submit" name="showhistory" value="Correspondents History" class="submit"  />&nbsp; <input type="button" value="Cancel" class="submit" onClick="window.location='index.php'" /></td></tr>
    </form>
    </table>
    
<table align="center"  cellpadding="2px"  cellspacing="2px" bgcolor="#E7F0F8"  class="admin_table" style="margin-top:20px;width:500px;">
  <form name="sign" method="post" action="save_correspondents.php" onSubmit="return validCorrespondentsForm()">
    <tr class="topheading" height="29px">
      <td colspan="2" align="center">New Correspondents</td>
    </tr>
    <tr>
      <td  align="right">Date:</td>
      <td width="142"><input type="textbox" name="corresdt" value="<?php echo date('d-m-Y'); ?>"    disabled="disabled" readonly="readonly" class="textbox" />      
    </tr>

    <tr>
      <td align="right">Client Name:</td>
      <td><input name="clientname" type="textbox"  class="textbox" id="clname" /></td>
    </tr>
    <tr>
	<td align="right">Client Mobile #:</td>
    <td><input name="clientmobile" type="textbox"  class="textbox" id="clmobile" onkeypress="return isNumberKey(event)" maxlength="15" /></td>
    </tr>
    <tr>
	<td align="right" style="vertical-align:top">Comments:</td>
    <td><textarea col="25" rows="7" name="discussion" class="textbox" id="cldisc" style="height:150px;width:350px;" ></textarea></td>
    </tr>

<tr>
	<td height="30" colspan="2" align="center"><input type="submit" value="Submit" class="submit"/> &nbsp;
    <input type="button" value="Cancel" class="submit" onClick="window.location='index.php'" /></td>
</tr>
</form>
</table>
</td>
</tr>
</table>
</body>
</html>