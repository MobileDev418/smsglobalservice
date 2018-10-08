<?php
	include_once "iscustomer.php";
	include_once "admin/ez_sql.php";
	$heading='Manage Contacts';
	$menu=14;
?>
<?php
	include_once "header.php";
?>
<?php
	$contacts=$db->get_results("select contact_id, c.cus_id , c.name as cname, phone, g.name as gname from contacts c, sms_group g where c.cus_id=".$_SESSION['cus_id']." and c.group_id=g.group_id order by gname");

?>
<div class="formdiv">
<div style="width:550px; margin:auto;">
  	<?php
			echo $_SESSION['msg_ad'];
			$_SESSION['msg_ad']="";
	?>
<form method="post" action="contacts_sms.php" onsubmit="return isCheck()">
    <table class="grid" cellspacing="0px" cellpadding="0px" width="100%">
    <tr class="heading">
        <td width="8%" >Sr #</td>
        <td width="5%" ><input name="chkall" type="checkbox"  id="chkall" onclick="checkuncheck()" /></td>
        <td width="52%">Name</td>
        <td width="21%">Mobile #</td>
        <td width="14%">Group</td>
    </tr>
    <?php
	if($contacts)
	{
		$i=1;
		foreach($contacts as $ct)
		{
			$ctitle=$ct->cus_title!=""?$ct->cus_title:"&nbsp;";
			$custom=$ct->custom!=""?$ct->custom:"&nbsp;";
			
			echo "<tr><td>".$i."</td><td align='center'><input type='checkbox' name='chk_con[]' value='".$ct->contact_id."' ></td><td><a href='edit_contact.php?contact_id=".$ct->contact_id."'><img border='0' src='images/ed.png' alt='Edit' /> ".$ct->cname."</a></td><td>".$ct->phone."</td><td>".$ct->gname."</td></tr>";
			$i++;
		}
	}
	?>
    </table>
    <div class="actionform">
        <input type="button" class="formbutton" value="Add Contact" onclick="window.location='add_contact.php'"  />&nbsp;<input type="submit" class="formbutton" value="Delete Contact" onclick="setOption(1)"  />&nbsp;<input type="submit" class="formbutton" value="Send SMS"  onclick="setOption(2)" name="sendsms"  />
        <input type="hidden" name="action" value="0" id="act" /></div>
   
</form>
</div>
</div>
<?php
include_once "right.php"; 
include_once "footer.php";
?>
