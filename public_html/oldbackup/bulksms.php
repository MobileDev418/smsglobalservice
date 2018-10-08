<?php
	include_once "iscustomer.php";
	$heading='Bulk SMS -  Send Sms';
	$menu=9;
	include_once "header.php";
?>

<script type="text/javascript" src="js/msglength.js" ></script>
<div class="formdiv">
	<div style="width:550px; margin:auto;">
     <div class="note"><div class="typo-icon">Attached a txt file of mobile numbers, seperated by line. Download <a href="demonumbers.txt">Sample File</a></div></div>
		<form name="form1" enctype="multipart/form-data" method="post"  action="sms_bulk.php"  onsubmit="return valid_BulkSms()">
        <input name="sender" type="hidden" id="sender" value="<?php echo $_SESSION['cus_mobile']; ?>"  />
        <div class="formborder">
            <table id="smsform">
               <tr>
                  <td style="text-align:right">File<span class="red"> *</span></td>
                  <td style="text-align:left"><input type="file" name="import_file" id="phone_dir" /></td>
               </tr> 
               <!--<tr>
                  <td style="text-align:right">From<span class="red"> *</span></td>
                  <td style="text-align:left"><input name="frommob" type="text" class="text" id="frommob" value="<?php echo $_SESSION['cus_mobile']; ?>" readonly="readonly"  /></td>
                </tr>--> 
                <tr>
                  <td height="27" style="text-align:right">Message Type<span class="red"> *</span></td>
                  <td style="text-align:left">
                <input value="160" name="hiddcount" type="hidden">
                
                <select name="ddtype" class="text" id="ddtype" onchange="setMessageLength()">
                <option selected="selected" value="0">Text</option>
                <option value="1">Flash</option>
                <option value="2">Unicode</option>
            </select></td>
                </tr>
                <tr></tr>
                <?php
                    include_once "date_selector.php";
               ?>
               <tr>
                          <td width="28%" align="right" style="vertical-align:top" >Message <span class="red">*</span></td>
                          <td width="72%" align="left"><textarea name="txtmessage" rows="7" id="txtmessage" onkeyup="setCounter()" onkeypress="setCounter()" onmouseout="setCounter()" onmouseup="setCounter()" onmousedown="setCounter()"></textarea></td>
        		</tr>                
          <tr>
              <td  align="right">Characters</td>
              <td  align="left"><input name="lblno" readonly="readonly" value="160/160" class="chr_left" type="text" style="width:75px;background:#FFC" /></td>
        </tr>

            </table> 
         </div>
         <div class="actionform">
    	<input type="submit" value="Send SMS" class="formbutton" name="submit" />&nbsp;<input type="button" value="Cancel" class="formbutton" onclick="window.location='send_sms.php'" />    </div>
         </form>
      </div>
   </div>

<?php
	include_once "right.php";
	include_once "footer.php";
?>
