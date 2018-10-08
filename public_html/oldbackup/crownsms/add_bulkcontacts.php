<?php
	include_once "iscustomer.php";
	include_once "constants.php";
	$title='Crownsms - Contacts - Add Contact';
	$mid1='<h4>Contacts</h4>';
	$mid2='Add Contact';
	$mid3='';
	$menu11='contacts-over.jpg';
	include_once "header.php";
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
	
    <form method="post" action="save_bulkcontact.php" name="c_form" id="c_form" onsubmit="return validBulkContactForm()">
   
   	<table width="47%" height="92" align="center" id="mid_tables">
    
    
    	<tr class="heading">
    	  <th colspan="3">Upload Contacts File</th>
    	</tr>
         <tr>
          <td width="25%" height="28" align="right">Select File<span class="red">*</span></td>
        <td width="66%" align="left"><input name="txtcontacts" type="file" class="text" id="txtcontacts" /></td><td width="9%"><span class="invalid" id='er_file'><img src="images/cross.png" alt=""></span></td>
        </tr>
         <tr>
           <td width="25%" height="28" align="right">Group <span class="red">*</span></td>
           <td width="66%" align="left"><select name="group_id" style="width:165px" id="group_id">
             <option value='0' >Select Group</option>
             <?=$group_list; ?>
             </select></td><td width="9%"><span class="invalid" id='er_group'><img src="images/cross.png" alt=""></span></td>
         </tr>
        <tr>
          <td align="center" colspan="3"><input type="submit" value="Save" class="submit" />
          &nbsp;
          <input type="button" value="Cancel" class="submit" onclick="window.location='contacts.php'" /></td></tr>
        <tr>
          <td align="left" colspan="3">&nbsp;</td>
        </tr>
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
