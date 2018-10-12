<?php
	include_once "iscustomer.php";
	$heading='Manage Groups - Add Group';
	$menu=13;
	/* Form to add new group in address book */
?>
<?php
	include_once "header.php";
?>
<div class="formdiv">
	<div style="width:550px; margin:auto;">
	 
            <form name="cus_group" id="cus_group" method="post" action="save_group.php" onsubmit="return validGroup()">    
               <div class="formborder">
            <table width="100%">
             <tr>
                <td width="37%" align="right">Group Name <span class="red">*</span></td>
                <td width="27%" align="left"><input name="name" type="text" id="name" /></td><td width="36%" align="left"><span class="invalid" id='er_name'><img src="images/cross.png" alt=""></span></td>
             </tr>
             </table>
           
         </div>        
		<div class="actionform">
    	<input type="submit" value="Save" class="formbutton" />&nbsp;<input type="button" value="Cancel" class="formbutton" onclick="window.location='groups.php'" />    </div>
          </form>
	</div>
</div>
<?php
include_once "right.php"; 
include_once "footer.php";
?>