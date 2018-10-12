<?php
	include_once "iscustomer.php";
	include_once "admin/ez_sql.php";
	$cus=$db->get_row("select * from customer where cus_id=".$_SESSION['cus_id']);
	$heading='Change Profile';
	$menu=15;
	/* Form to change user profile */
	/* If user changes sender id and the sender id format is number fomrat then new activation code is send to customer and customer account status becomes un-active untill he activates accoutn using activation code */
?>
<?php
	include_once "header.php";
?>

		 <?php
$_SESSION['cont_code']=$cus->country;
include_once "country.php";
?>
<div class="formdiv">
	<div style="width:550px; margin:auto;">

        <form method="post" name="profileupdate" action="update_profile.php" onsubmit="return validProfileForm()" id="changeprofile" >
         <div class="formborder">
            <table width="362" align="center" id="mid_tables" border="0">
             <tr>
                <td width="194" align="right" >FIRST NAME <span class="red">*</span></td>
                 <td width="207"  align="left"><input type="text" class="text" maxlength="150" id='name' name="fname" value="<?php echo $cus->fname; ?>" /></td>
                <td width="133"  align="left"><span class="invalid" id='er_name'><img src="images/cross.png" alt=""></span></td>
            </tr>
            
            <tr>
                 
                <td align="right" >LAST NAME </td>
                 <td  align="left"><input name="lname" type="text" class="text" id='lname' value="<?php echo $cus->lname ?>" maxlength="150" /></td>
                 <td align="left">&nbsp;</td>
            </tr>
             <tr>
                  <td align="right">COUNTRY <span class="red">*</span></td>
            
                  <td align="left"><label></label>
                  <select name="country" class="text" id="country">
                 <?php echo $country_list; ?>
                  </select></td>
             <td align="left"></td>
                </tr>
            <tr>
              <td align="right" >CITY</td>
              <td align="left"><input name="city" type="text" id='city' value="<?php echo $cus->city; ?>" maxlength="150" /></td>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" >MOBILE <span class="red">*</span></td>
              <td align="left"><input name="umobile" type="text" id='mobileno' value="<?php echo $cus->mobile; ?>" maxlength="15" onkeypress="return isNumberKey(event)" /></td>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" style="vertical-align:top" >Sender's ID <span class="red">*</span></td>
              <td align="left"><input type="radio" name="senderidoption" id="addnewoption" onclick="document.getElementById('cell').disabled=0;document.getElementById('senderids').disabled=1" value="addnewid" /><span style="color:#000">Add New:</span>&nbsp;<input name="cell" type="text"  id='cell'  maxlength="15" style="width:125px;" disabled="disabled" /></td>
              <td align="left"><span class="invalid" id='cell_er'><img src="images/cross.png" alt=""></span></td>
            </tr>
            <tr>
              <td align="right" style="vertical-align:top" >&nbsp;</td>
              <td align="left"><input type="radio" name="senderidoption" checked="checked" onclick="document.getElementById('cell').disabled=1;document.getElementById('senderids').disabled=0" value="selectedid" /><span style="color:#000">Select ID:</span>&nbsp;<select style="width:125px;" id="senderids" name="mysenderid">
              <?php
			  	$sids=$db->get_results("select sender_id from sender_ids where cus_id=".$_SESSION['cus_id']." order by sid");
				foreach($sids as $sid)
				{
					echo '<option value="'.$sid->sender_id.'"';
					if($sid->sender_id==$_SESSION['cus_senderid'])
						echo ' selected="selected"';
					echo ' >'.$sid->sender_id.'</option>';
				}
			  ?>
              </select>
              </td>
              <td align="left"><span class="invalid" id='cell_er'><img src="images/cross.png" alt=""></span></td>
            </tr>
            <tr>
              <td align="right" >E-MAIL <span class="red">*</span></td>
              <td align="left"><input name="email" type="text" id='email' value="<?php echo $cus->email; ?>" maxlength="150" /></td>
              <td align="left"><span class="invalid" id='email_er'><img src="images/cross.png" alt=""></span></td>
            </tr>
            </table>         
            </div>
            <div class="actionform">
            	<input name="update" type="submit" class="formbutton" value="Update" />&nbsp; <input type="button" class="formbutton" onClick="window.location='profile.php'" value="Cancel" /></td>
              <td align="left">&nbsp;</td>
            </tr>
            </div>
        </form>
 	</div>
 </div>
<?php
	$_SESSION['cont_code']="";
?>

<?php
	include_once "right.php";
	include_once "footer.php";
?>
