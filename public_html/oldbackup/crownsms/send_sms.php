<?php
	include_once "constants.php";
	include_once "iscustomer.php";
	$title='Crownsms -  Send Sms';
	$mid1='<h4>Send Sms</h4>';
	$mid2='<p>Select from one of the options to send your messages</p>';
	$mid3='';
	$menu10='sms-over.jpg';
	include_once "header.php";

?>

    <td id="bodybg"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>
        <td height="15" colspan="2"></td>
      </tr>
      <tr>
        <td width="25%" align="center" valign="top">
        	<?php
				include_once "left_col.php";
			?>        </td>
        <td valign="top">
    
              <div id="div_balance" >
              <p align="center" class="in_sufficent">SMS Service is avilabe for Nigeria GSM numbers only for now</p>
              <a href="contacts.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('contactsms','','images/contactsms-over.jpg',1)"><img src="images/contactsms.jpg" alt="Send Sms to your contacts" name="contactsms" border="0" id="contactsms" /></a><br />
            <a href="groups.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('groupsms','','images/groupsms-over.jpg',1)"><img src="images/groupsms.jpg" alt="Send Sms to groups" name="groupsms" border="0" id="groupsms" /></a><br />
             <a href="single_sms.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('singlesms','','images/singlesms-over.jpg',1)"><img src="images/singlesms.jpg" alt="Send a single Sms" name="singlesms" border="0" id="singlesms" /></a><br />
             <a href="bulksms.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('bulksms','','images/bulksms-over.jpg',1)"><img src="images/bulksms.jpg" alt="Upload Text File" name="bulksms" border="0" id="bulksms" /></a><br />
             
             <p align="center" class="red">For Bulk Sms upload a text file with format like this.
               <textarea cols="35" rows="8" readonly="readonly">2348082188050
2348023423423
2348082123233
2348082188058
2348087888888
2348083423423
2348034322343
2348032232323</textarea>
             </p>
          </div>
 
      
      <br /></td>
      </tr>
      <tr>
        <td height="5" colspan="2" align="center" valign="top"></td>
        </tr>
    </table></td>
  </tr>
<?php
	include_once "footer.php";
?>
