<?php
	include_once "iscustomer.php";
	$heading='Manage Contacts - Add Bulk Contacts';
	$menu=10;
	include_once "group_list.php";
?>
<?php
	include_once "header.php";
	
?>
<div class="formdiv">
	<div style="width:550px; margin:auto;">
	
	<form method="post" action="save_bulkcontact.php" name="c_form" id="c_form" onsubmit="return validBulkContactForm()">
        <div class="formborder">
    	<table width="100%">    
            <tr>
              <td width="25%" height="28" align="right">Select File<span class="red">*</span></td>
            <td width="49%" align="left"><input name="txtcontacts" type="file" class="text" id="txtcontacts" /></td><td width="26%"><span class="invalid" id='er_file'><img src="images/cross.png" alt=""></span></td>
            </tr>
             <tr>
               <td width="25%" height="28" align="right">Group <span class="red">*</span></td>
               <td width="49%" align="left"><select name="group_id" style="width:230px" id="group_id">
                 <option value='0' >Select Group</option>
                 <?=$group_list; ?>
                 </select></td><td width="26%"><span class="invalid" id='er_group'><img src="images/cross.png" alt=""></span></td>
             </tr>
          
        </tr>
    </table> 
    </div>
    <div class="actionform">
    	<input type="submit" value="Save" class="formbutton" />&nbsp;<input type="button" value="Cancel" class="formbutton" onclick="window.location='contacts.php'" />    </div>
   
	</form>
</div>
</div>
<?php
include_once "right.php"; 
include_once "footer.php";
?>
