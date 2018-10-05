<?php

include_once "iscustomer.php";
include_once "library_const.php";
include_once "admin/ez_sql.php";
$menu=13;
/* This file displays the list of groups with buttons to perform different operations(add, edit, delete, send sms) on groups */
$heading="Manage Groups";
$q="select group_id as gid, g.name as gname from sms_group g where g.cus_id=".$_SESSION['cus_id'];
$groups=$db->get_results($q);
include_once "header.php";
?>
<link href="css/contents.css" rel="stylesheet" type="text/css" />

<div class="formdiv">
<div style="width:550px; margin:auto;">
	<?php
			echo $_SESSION['cont_msg'];
			$_SESSION['cont_msg']="";
	?>
	<form  method="post" action="groups_sms.php" onsubmit="return isCheck()">
    <table class="grid" align="center" cellspacing="0" cellpadding="0"  >
    <tr>
    <td width="10%" align="left" >Sr #</td>
    <td width="5%" align="center" ><input name="chkall" type="checkbox"  id="chkall" onclick="checkuncheck()" /></td>
    <td width="65%" align="left">Name</td>
    <td width="20%" align="left">Total Contacts</td>
    </tr>
    <?php
	if($groups)
	{	$i=start+1;
		foreach($groups as $gr)
		{
			$total_contacts=$db->get_var("SELECT count(contacts.name) total_contacts FROM contacts WHERE GROUP_ID =".$gr->gid);
			if(!$total_contacts)
				$total_contacts="0";
			echo "<tr><td align='center'>".$i."</td><td align='center'><input type='checkbox' name='chk_con[]' value='".$gr->gid."' /></td><td><a href='edit_group.php?group_id=".$gr->gid."'><img border='0' src='images/ed.png' alt='Edit' /> ".$gr->gname."</a></td><td align='center'>".$total_contacts."</td></tr>";
			$i++;
		}
	}
	?>

    </table>
     
        <div class="actionform">
        <input type="button" class="formbutton" value="Add Group" onclick="window.location='add_group.php'"  />&nbsp;<input type="submit" class="formbutton" value="Delete Group" onclick="setOption(1)"  />&nbsp;<input type="submit" class="formbutton" value="Send SMS"  onclick="setOption(2)" name="sendsms"  />
        <input type="hidden" name="action" value="0" id="act" /></div>
    </form>
</div>
</div>

<?php
include_once "right.php"; 
include_once "footer.php";
?>