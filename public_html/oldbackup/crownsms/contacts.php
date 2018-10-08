<?php
	include_once "iscustomer.php";
	include_once "constants.php";
	include_once "admin/ez_sql.php";
	$title='Crownsms - Contacts';
	$mid1='<h4>Contacts</h4>';
	$mid2='Manage Your address book by adding contacts. you can send bulk sms to your contacts';
	$mid3='';
	$menu11='contacts-over.jpg';
	include_once "header.php";
	$contacts=$db->get_results("select contact_id, c.cus_id , c.name as cname, lname,  cus_title, custom,  phone, g.name as gname from contacts c, sms_group g where c.cus_id=".$_SESSION['cus_id']." and c.group_id=g.group_id order by gname");

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
            <form method="post" action="contacts_sms.php" onsubmit="return isCheck()">
   
    <table width="486" align="center" id="sub_menu" >
    <tr><td width="32" align="center" valign="bottom"><a href="add_contact.php"><img src="images/add.png" border="0" alt="add"  /></a></td>
    
    <td width="39" align="center" valign="bottom"><a href="#">
      <input type="image" src="images/delete.png" name="opt" value="1" onclick="setOption(1)" />
    </a></td>
    <td width="32" align="center" valign="bottom"><a href="#">
      <input type="image" src="images/sms_icon.png" name="opt" value="2" onclick="setOption(2)" />
    </a></td>
    <td width="32" align="center" valign="bottom"><a href="add_bulkcontacts.php">
    <img src="images/bulkadd.png" border="0" align="absbottom" />
    </a></td>
    <td width="437" valign="bottom" align="right">
     <input type="hidden" name="action" value="0" id="act" />
		<?php
			echo $_SESSION['msg_ad'];
			$_SESSION['msg_ad']="";
		?></td>
    </tr>
    </table>


    <table width="77%" border="1" align="center" cellpadding="2" cellspacing="2" id="groups_table" style="margin-top:2px" >
    <tr class="heading">
    <th width="7%" >Sr #</th>
    <th width="7%" ><input name="chkall" type="checkbox"  id="chkall" onclick="checkuncheck()" />
    Select</th>
    <th width="6%">Title</th>
    <th width="39%">Name</th>
    <th width="16%">Mobile #</th>
    <th width="16%">Group</th>
    <th width="9%">Custom</th>
    </tr>
    <?php
	if($contacts)
	{
		$i=1;
		foreach($contacts as $ct)
		{
			$ctitle=$ct->cus_title!=""?$ct->cus_title:"&nbsp;";
			$custom=$ct->custom!=""?$ct->custom:"&nbsp;";
			
			echo "<tr><td>".$i."</td><td align='center'><input type='checkbox' name='chk_con[]' value='".$ct->contact_id."' ></td><td>".$ctitle."</td><td><a href='edit_contact.php?contact_id=".$ct->contact_id."'><img border='0' src='images/ed.png' alt='Edit' /> ".$ct->cname." ".$ct->lname."</a></td><td>".$ct->phone."</td><td>".$ct->gname."</td><td>".$custom."</td></tr>";
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
