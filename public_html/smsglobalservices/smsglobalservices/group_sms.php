<?php
	include_once "iscustomer.php";
		/* File send message to contacts list. This file is included in groups_sms.php */

	$heading='Groups - Send Sms';
	$menu=9;
	include_once "header.php";
	include_once "admin/ez_sql.php";
	/* ids are calculated from groups_sms.php file that includes this file to send sms */
	$group_names=$db->get_results("select name from sms_group where ".$ids);
	if($group_names) /* Loop to create a list of names of groups submitted by customer to send sms */
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
	
	$smsq="select name, phone from contacts where ".$ids; /* Query to select conatcts from the selected group */
	$phones=$db->get_results($smsq);
	if ($phones)
	{
		$i=1;
		foreach($phones as $ph) /* Loop to create a list of contacts names and phones to send sms */
		{
			if($i!=1)
			{
				$phlist.=",";	
				$cr_name.=",";
			}
			$phlist.=$ph->phone;
			$cr_name.=$ph->name;
			
			$i++;
		}
	}

?>

<script type="text/javascript" src="js/msglength.js" ></script>
<div class="formdiv">
	<div style="width:550px; margin:auto;">
    	<div style="background:#CCC; border:1px solid #999; padding:10px; margin-bottom:20px;font-weight:bold"><span style="color:#900;font-size:120%">To:</span> <?php echo $gr_name; ?></div>
        <div class="formborder">
            <form name="form1" method="post" action="sms.php" onsubmit="return valid_GroupSms()">
            <input name="sender" type="hidden" id="sender" value="<?php echo $_SESSION['cus_mobile']; ?>"  />
          	<table id="smsform">
            
<!--            	<tr>
                  <td style="text-align:right">From<span class="red"> *</span></td>
                  <td style="text-align:left"><input name="frommob" type="text" class="text" id="frommob" value="<?php echo $_SESSION['cus_mobile']; ?>" readonly="readonly"  /></td>
                </tr>-->
                <tr>
                  <td style="text-align:right">Message Type<span class="red"> *</span></td>
                  <td style="text-align:left"><input name="phone_list" id="phone_list" type="hidden" size="50" value="<?php echo $phlist; ?>"   />
                  <input name="name_list" id="name_list" type="hidden" size="50" value="<?php echo $cr_name; ?>"   />
                  <input name="title_list" id="title_list" type="hidden" size="50" value="<?php echo $titlelist; ?>"   />
                  <input name="lname_list" id="lname_list" type="hidden" size="50" value="<?php echo $lnamelist; ?>"   />
                  <input name="custom_list" id="custom_list" type="hidden" size="50" value="<?php echo $customlist; ?>"   />
                  
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
                  <td width="28%" align="right" style="vertical-align:top" >Message <span class="red">*</span></td>
                  <td width="72%" align="left"><textarea name="txtmessage" rows="7" id="txtmessage" onkeyup="setCounter()" onkeypress="setCounter()" onmouseout="setCounter()" onmouseup="setCounter()" onmousedown="setCounter()"></textarea></td>
        	</tr>
                <tr>
                  <td colspan="2">  <div style="float:left;width:280px; padding-left:70px;"></div></td>
                </tr>
                <tr>
                  <td  align="right">Characters</td>
                  <td  align="left"><input name="lblno" readonly="readonly" value="160/160" class="chr_left" type="text" style="width:75px;background:#FFC" /></td>
             </tr>
       
            </table> 
             </div>
            <div class="actionform">
    	<input type="submit" value="Send SMS" class="formbutton" name="submit" />&nbsp;<input type="button" value="Cancel" class="formbutton" onclick="window.location='groups.php'" />    </div>
            </form>
       
    </div>
</div>

<?php
	include_once "right.php";
	include_once "footer.php";
?>
