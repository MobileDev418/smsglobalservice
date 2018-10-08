<?php
	include_once "iscustomer.php";
	include_once "constants.php";
	$title='Crownsms - Groups - Send Sms';
	$mid1='<h4>Groups</h4>';
	$mid2='Send Message';
	$mid3='';
	$menu12='groups-over.jpg';
	include_once "header.php";
	include_once "admin/ez_sql.php";
	$group_names=$db->get_results("select name from sms_group where ".$ids);
	if($group_names)
	{
		
		$i=1;
		foreach($group_names as $gp)
		{
			if($i!=1)
			{
				$gr_name.=", ";	
			}
			$gr_name.=$gp->name;
			$i++;
		}
	}
	
	$cr_name="";
	$phlist="";
	
	$smsq="select cus_title, name, lname, phone, custom from contacts where ".$ids;
	$phones=$db->get_results($smsq);
	if ($phones)
	{
		$i=1;
		foreach($phones as $ph)
		{
			if($i!=1)
			{
				$phlist.=",";	
				$cr_name.=",";
				$titlelist.=", ";
				$lnamelist.=", ";
				$customlist.=", ";
			}
			$phlist.=$ph->phone;
			$cr_name.=$ph->name;
			$titlelist.=$ph->cus_title;
			$lnamelist.=$ph->lname;
			$customlist.=$ph->custom;
			
			$i++;
		}
	}

?>

<script type="text/javascript" src="js/msglength.js" ></script>
<link href="style/sms-style.css" rel="stylesheet" type="text/css" />
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
	
    <form name="form1" method="post" action="sms.php" onsubmit="return valid_GroupSms()">
   	<table width="543" align="center" id="mid_tables">
    	<tr class="heading">
    	  <th colspan="2">Group SMS</th>
    	</tr>
        <tr class="sub_heading">
    	  <th colspan="2">To: <span class="caption"><?=$gr_name; ?></span></th>
    	</tr>
        <tr>
          <td align="right">From<span class="red"> *</span></td>
          <td><input name="sender" type="text" class="text" id="sender" value="<?=$_SESSION['cus_name']; ?>" maxlength="11"  /></td>
        </tr>      
        <tr>
          <td height="27" align="right">Message Type<span class="red"> *</span></td>
          <td><input name="phone_list" id="phone_list" type="hidden" size="50" value="<?=$phlist; ?>"   />
          <input name="name_list" id="name_list" type="hidden" size="50" value="<?=$cr_name; ?>"   />
          <input name="title_list" id="title_list" type="hidden" size="50" value="<?=$titlelist; ?>"   />
          <input name="lname_list" id="lname_list" type="hidden" size="50" value="<?=$lnamelist; ?>"   />
          <input name="custom_list" id="custom_list" type="hidden" size="50" value="<?=$customlist; ?>"   />
          
        <input value="160" name="hiddcount" type="hidden">
        
        <select name="ddtype" class="text" id="ddtype" onchange="setMessageLength()">
        <option selected="selected" value="0">Text</option>
		<option value="1">Flash</option>
		<option value="2">Unicode</option>
	</select></td>
        </tr>
        <?php
	   		include_once "date_selector.php";
	   ?>
        <tr></tr>
        <tr>
        <td width="28%" align="right" >Message <span class="red">*</span></td>
        <td width="72%" align="center">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">  <div style="float:left;width:280px; padding-left:70px;"><textarea name="txtmessage" rows="7" id="txtmessage" onkeyup="setCounter()" onkeypress="setCounter()" onmouseout="setCounter()" onmouseup="setCounter()" onmousedown="setCounter()" cols="35" style="width: 363px;"></textarea></div>
          <div style="float:right; width:100px;" id="personalized">
          <input type="button" value="Title" onclick="insertAtCaret(txtmessage,'{#title}')" class=""  /><br />
          <input type="button" value="First Name" onclick="insertAtCaret(txtmessage,'{#fname}')"  /><br />
          <input type="button" value="Last Name" onclick="insertAtCaret(txtmessage,'{#lname}')"  /><br />
          <input type="button" value="Custom" onclick="insertAtCaret(txtmessage,'{#custom}')"  /><br />
          </div>
          </td>
        </tr>
        <tr>
          <td align="center" colspan="2"  >Characters<strong> 
            <input name="lblno" readonly="readonly" value="160/160" class="chr_left" type="text">
          </strong></td>
        </tr>
<tr>
          <td align="center" colspan="2"><input type="submit" value="Send" class="submit" />
          &nbsp;
<input type="button" value="Cancel" class="submit" onclick="window.location='groups.php'" /></td></tr>
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
