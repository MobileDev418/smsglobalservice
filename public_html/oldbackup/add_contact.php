<?php
	include_once "iscustomer.php";
	$heading='Manage Contacts - Add Contact';
	$menu=14;
?>
<?php
	include_once "header.php";
?>
<?php
	include_once "group_list.php";
?>

<div class="formdiv">
	<div style="width:550px; margin:auto;">
    	
  <form method="post" action="save_contact.php" name="c_form" id="c_form" onsubmit="return validContactForm()">
            <div class="formborder">
            <table width="100%">
                <tr>
                    <td width="36%" height="28" align="right">Name <span class="red">*</span></td>
                    <td width="38%" align="left"><input name="name" type="text" class="text" id="name" /></td><td width="26%" align="left"><span class="invalid" id='er_name'><img src="images/cross.png" alt=""></span></td>
                 </tr>
                 <tr>
                    <td width="36%" height="28" align="right">Mobile #<span class="red"> *</span></td>
                    <td width="38%" align="left"><input name="phone" type="text" id="phone" class="text" onkeypress="return isNumberKey(event)" maxlength="30" /></td><td width="26%" align="left"><span class="invalid" id='er_phone'><img src="images/cross.png" alt=""></span></td>
                    </tr>
                <tr>
                    <td width="36%" height="28" align="right">Group <span class="red">*</span></td>
                    <td width="38%" align="left"><select name="group_id" id="group_id">
                    <option value='0' >Select Group</option>
                    <?php echo $group_list; ?>
                    </select></td>
                    <td width="26%" align="left"><span class="invalid" id='er_group'><img src="images/cross.png" alt=""></span></td>
                 </tr>
    		</table>
	  </div>
            <div class="actionform">
                <input type="submit" value="Save" class="formbutton" />&nbsp;<input type="button" value="Cancel" class="formbutton" onclick="window.location='contacts.php'" />
      </div>
      </form>
</div>
</div>

<?php
include_once "right.php"; 
include_once "footer.php";
?>