<?php
	include_once "iscustomer.php";
	include_once "constants.php";
	$title='Crownsms - Contacts - Edit Contact';
	$mid1='<h4>Contacts</h4>';
	$mid2='Manage Your address book by adding contacts. you can send bulk sms to your contacts';
	$mid3='';
	$menu11='contacts-over.jpg';
	include_once "header.php";
	@$id=$_GET['contact_id'];
	include_once "admin/ez_sql.php";
	$contact=$db->get_row("select * from contacts where contact_id=".$id);
	$gid=$contact->group_id;
	include_once "group_list.php";
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
	
    <form method="post" action="update_contact.php" name="c_form"  id="c_form" onsubmit="return validContactForm()">
   
   	<table width="36%" height="92" align="center" id="mid_tables" >
    
    
    	<tr class="heading">
    	  <th colspan="3">Edit Contact</th>
    	</tr>
        <tr>
          <td width="28%" height="28" align="right">Title&nbsp;</td>
        <td width="65%" align="left"><input name="cus_title" type="text" class="text" id="cus_title" value="<?=$contact->cus_title; ?>" /></td><td width="7%"></td>
        </tr>
         <tr>
          <td width="35%" height="28" align="right">First Name <span class="red">*</span></td>
        <td width="53%" align="left"><input type="hidden" name="cont_id" value="<?=$id; ?>"  /><input name="name" type="text" class="text" id="name" value="<?=$contact->name; ?>" /></td><td width="12%"><span class="invalid" id='er_name'><img src="images/cross.png" alt=""></span></td>
        </tr>
        <tr>
          <td width="35%" height="28" align="right">Last Name&nbsp;</td>
        <td width="53%" align="left"><input name="lname" type="text" class="text" id="lname" value="<?=$contact->lname; ?>" /></td><td width="12%">&nbsp;</td>
        </tr>
        <tr>
          <td width="35%" height="28" align="right">Mobile #<span class="red"> *</span></td>
        <td width="53%" align="left"><input type="text" value="23480" name="nig_code" id="nig_code" style="width:40px"  maxlength="5"/><span id="hy_ch"> - </span><input name="phone" type="text" id="phone" class="text" style="width:100px" onkeypress="return isNumberKey(event)" value="<?=substr($contact->phone,5,8) ; ?>" maxlength="8"  /></td><td width="12%"><span class="invalid" id='er_phone'><img src="images/cross.png" alt=""></span></td>
        </tr>
         <tr>
          <td width="35%" height="28" align="right">Group <span class="red">*</span></td>
          <td width="53%" align="left"><select name="group_id" style="width:165px" id="group_id">
     <option value='0' >Select Group</option>
     <?=$group_list; ?>
     </select></td><td width="12%"><span class="invalid" id='er_group'><img src="images/cross.png" alt=""></span></td>
        </tr>
        <tr>
          <td width="28%" height="28" align="right">Custom&nbsp;</td>
        <td width="65%" align="left"><input name="custom" type="text" class="text" id="custom" value="<?=$contact->custom; ?>" /></td><td width="7%"></td>
        </tr>
        <tr>
          <td align="center" colspan="3"><input type="submit" value="Update" class="submit" />
          &nbsp;
          <input type="button" value="Cancel" class="submit" onclick="window.location='contacts.php'" /></td></tr>
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
