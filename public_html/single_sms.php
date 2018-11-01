<?php
session_start();

	include_once "iscustomer.php";

	$heading='Send Single SMS';

	$menu=9;
	//Form to display single sms Form
	include_once "header.php";

	include_once "ez_sql.php";
	$query = "SELECT * FROM sender WHERE customer_id='" . $_SESSION['cus_id'] . "'";
	$senders = $db->get_results($query);
?>

<script type="text/javascript" src="js/msglength.js" ></script>	

<div class="formdiv">

	<div style="width:550px; margin:auto;">

    <div class="note"><div class="typo-icon">Put mobile number in international format. Eg. 254733657122, 4477916745</div></div>

    <form name="form1" method="post" action="sms.php" onsubmit="return valid_singleSms()">

    <!--input name="sender" type="hidden" id="sender" value="<?php echo $_SESSION['cus_senderid']; ?>"  /-->

    <div class="formborder">

      <table id="smsform">

		<!--<tr>

			<td  align="right">To (ID#)<span class="red"> *</span></td>

			<td  align="left"><input value="160" name="hiddcount" type="hidden" />

				<select name="ddtype" id="ddtype" onchange="setMessageLength()">

					<option selected="selected" value="0">125487</option>

					<option value="1">225234</option>

					<option value="2">325412</option>

				</select>
			</td>

        </tr>-->
        <tr>

          <td  align="right">To (Mobile #)<span class="red"> *</span></td>

          <td align="left"><input name="phone_list" type="text" id="phone_list" value=""  onkeypress="return isNumberKey(event)" maxlength="15"  /></td>

        </tr>

<!--        <tr>

          <td  align="right">From <span class="red"> *</span></td>

          <td  align="left"><input name="frommob" type="text" id="frommob" value="<?php echo $_SESSION['cus_mobile']; ?>"  readonly="readonly" /></td>

        </tr>-->

        <tr>

          <td  align="right">Message Type<span class="red"> *</span></td>

         <td  align="left"><input value="160" name="hiddcount" type="hidden" />

              <select name="ddtype" id="ddtype" onchange="setMessageLength()">

                <option selected="selected" value="0">Text</option>

                <option value="1">Flash</option>

                <option value="2">Unicode</option>

            </select></td>

        </tr>

		<tr>
			<td align="right">Sender`s ID</td>
			<td align="left">
				<select name="sender">
					<option value="Propertypoa">Propertypoa</option>
				<?php
					for ( $i = 0; $i < count($senders); $i++ )
					{
						$sender = $senders[$i];
						echo "<option value='" . $sender->name . "'>" . $sender->name . "</option>";
					}
				?>
				</select>
			</td>
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

