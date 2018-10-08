<?php
	include_once "iscustomer.php";
	$heading='Manage Contacts - Edit Contact';
	$menu=14;;
	@$id=$_GET['contact_id'];
	include_once "admin/ez_sql.php";
	$contact=$db->get_row("select * from contacts where contact_id=".$id." and cus_id=".$_SESSION['cus_id']);
	$gid=$contact->group_id;
	include_once "group_list.php";
?>
<?php
	include_once "header.php";
?>
<div class="formdiv">
	<div style="width:550px; margin:auto;">
        <form method="post" action="update_contact.php" name="c_form"  id="c_form" onsubmit="return validContactForm()">
           <div class="formborder">
            <table>
                 <tr>
                  <td width="33%" height="28" align="right">Name <span class="red">*</span></td>
                <td width="38%" align="left"><input type="hidden" name="cont_id" value="<?php echo $id; ?>"  /><input name="name" type="text" class="text" id="name" value="<?php echo $contact->name; ?>" /></td><td width="29%" align="left"><span class="invalid" id='er_name'><img src="images/cross.png" alt=""></span></td>
                </tr>
                <tr>
                  <td width="33%" height="28" align="right">Mobile #<span class="red"> *</span></td>
                <td width="38%" align="left"><input name="phone" type="text" id="phone" class="text" onkeypress="return isNumberKey(event)" value="<?php echo $contact->phone ; ?>" maxlength="30"  /></td><td width="29%" align="left"><span class="invalid" id='er_phone'><img src="images/cross.png" alt=""></span></td>
                </tr>
                 <tr>
                  <td width="33%" height="28" align="right">Group <span class="red">*</span></td>
                  <td width="38%" align="left"><select name="group_id" id="group_id">
             <option value='0' >Select Group</option>
             <?php echo $group_list; ?>
             </select></td><td width="29%" align="left"><span class="invalid" id='er_group'><img src="images/cross.png" alt=""></span></td>
                </tr>
            </table> 
            </div>
             <div class="actionform">
                <input type="submit" value="Update Contact" class="formbutton" />&nbsp;<input type="button" value="Cancel" class="formbutton" onclick="window.location='contacts.php'" /></div>
            </form>
</div>
</div>

<?php
include_once "right.php"; 
include_once "footer.php";
?>