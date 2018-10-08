<?php
	include_once "iscustomer.php";
	include_once "constants.php";
	include_once "admin/ez_sql.php";
	$title='Crownsms - Groups';
	$mid1='<h4>Groups</h4>';
	$mid2='Manage Your address book by adding groups. you can send bulk sms to group or groups';
	$mid3='';
	$menu12='groups-over.jpg';
	include_once "header.php";
	$groups=$db->get_results("select group_id as gid, g.name as gname from sms_group g where g.cus_id=".$_SESSION['cus_id']);
?>

    <td id="bodybg"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>
        <td height="15" colspan="2"></td>
      </tr>
      <tr>
        <td width="25%" align="center" valign="top">
        	<?php
				include_once "left_col.php";
			?>
        </td>
        <td valign="top">
            <form  method="post" action="groups_sms.php" onsubmit="return isCheck()">
   
    <table width="486" align="center" id="sub_menu" >
    <tr><td width="34" align="center" valign="bottom"><a href="add_group.php"><img src="images/add.png" border="0" alt="add"  /></a></td>
    
    <td width="36" align="center" valign="bottom"><a href="#">
      <input type="image" src="images/delete.png" name="opt" value="1" onclick="setOption(1)" />
    </a></td>
    <td width="30" align="center" valign="bottom"><a href="#">
      <input type="image" src="images/sms_icon.png" name="opt" value="2" onclick="setOption(2)" />
    </a></td>
    <td width="366" valign="bottom" align="right">
     <input type="hidden" name="action" value="0" id="act" />
		<?php
			echo $_SESSION['cont_msg'];
			$_SESSION['cont_msg']="";
		?></td>
    </tr>
    </table>


    <table width="484" align="center" id="groups_table" border="1" cellspacing="2" cellpadding="2" >
    <tr class="heading">
    <th width="10%" >Sr #</th>
    <th width="16%" ><input name="chkall" type="checkbox"  id="chkall" onclick="checkuncheck()" />
    Select</th>
    <th width="50%">Name</th>
    <th width="24%">Total Contacts</th>
    </tr>
    <?php
	if($groups)
	{	$i=start+1;
		foreach($groups as $gr)
		{
			$total_contacts=$db->get_var("SELECT count(contacts.name) total_contacts FROM contacts WHERE GROUP_ID =".$gr->gid);
			if(!$total_contacts)
				$total_contacts="0";
			echo "<tr><td>".$i."</td><td align='center'><input type='checkbox' name='chk_con[]' value='".$gr->gid."' ></td><td><a href='edit_group.php?group_id=".$gr->gid."'><img border='0' src='images/ed.png' alt='Edit' /> ".$gr->gname."</a></td><td align='center'>".$total_contacts."</td></tr>";
			$i++;
		}
	}
	?>
    </table>
   
</form>
        </td>
      </tr>
      <tr>
        <td height="5" colspan="2" align="center" valign="top"></td>

        </tr>
    </table></td>
  </tr>
<?php
	include_once "footer.php";
?>
