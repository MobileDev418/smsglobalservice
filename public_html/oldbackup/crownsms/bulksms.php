<?php
	include_once "iscustomer.php";
	include_once "constants.php";
	$title='Crownsms -  Send Sms - Bulk Sms';
	$mid1='<h4>Single Sms</h4>';
	$mid2='Send Message';
	$mid3='';
	$menu10='sms-over.jpg';
	include_once "header.php";

?>

<script type="text/javascript" src="js/msglength.js" ></script>

<td id="bodybg"><blockquote>&nbsp;</blockquote>  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>
        <td height="15" colspan="2"></td>
      </tr>
      <tr>
        <td width="25%" align="center" valign="top">
        	<?php
				include_once "left_col.php";
			?>        </td>
        <td valign="top">
	<!--action="sms_bulk.php"-->
    <form name="form1" enctype="multipart/form-data" method="post"  action="sms_bulk.php"  onsubmit="return valid_BulkSms()">
   	<table width="462" align="center" id="mid_tables">
    	<tr class="heading">
    	  <th colspan="2">Bulk SMS</th>
    	</tr>	
       <tr>
          <td align="right">File<span class="red"> *</span></td>
          <td><input type="file" name="import_file" id="phone_dir" /></td>
       </tr> 
       <tr>
          <td align="right">From<span class="red"> *</span></td>
          <td><input name="sender" type="text" class="text" id="sender" value="<?=$_SESSION['cus_name']; ?>" maxlength="11"  /></td>
        </tr>      
        <tr>
          <td height="27" align="right">Message Type<span class="red"> *</span></td>
          <td>
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
        <td width="28%" align="right" >Message <span class="red">*</span></td>
        <td width="72%" align="center">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="center"><textarea name="txtmessage" rows="7" id="txtmessage" onkeyup="setCounter()" onkeypress="setCounter()" onmouseout="setCounter()" onmouseup="setCounter()" onmousedown="setCounter()" cols="35" style="width: 363px;"></textarea></td>
        </tr>
        <tr>
          <td align="center" colspan="2"  >Characters<strong> 
            <input name="lblno" readonly="readonly" value="160/160" class="chr_left" type="text">
          </strong></td>
        </tr>
<tr>
          <td align="center" colspan="2"><input type="submit" value="Send" class="submit" />
          &nbsp;
<input type="button" value="Cancel" class="submit" onclick="window.location='send_sms.php'" /></td></tr>
    </table> 
	</form>        </td>
      </tr>
      <tr>
        <td height="5" colspan="2" align="center" valign="top"></td>
        </tr>
    </table></td>
</tr>
<?php
	include_once "footer.php";
?>
