<div class="formdiv">
<div style="display:none;color:red; text-align:left;font-size:125%;font-weight:bold;margin:-25px 0 5px 110px;" id="insufficentbalancediv">Insufficent Balance!</div>
<div style="display:none; background:#EBF6E9;border:1px solid #C1CEC1; color:#5A9B73; padding:5px; margin:10px 0px;" id="totalmessages_div"></div>
<table width="100%" cellspacing="0" cellpadding="0"  class="grid" >



<?php
	//File which sends message when single, contact or group sms from is submiited


	 $credit=$db->get_var("select balance from customer where cus_id=".$_SESSION['cus_id']);

	 $sms=new sendsms();
	 $i=0;
	 $total_send=0;

	 	if($phones) //Check for list of phone numbers to send sms

		{

			

			 echo '<tr class="heading"><td width="171">Message</td><td width="171">Name</td><td width="171">Mobile #</td><td width="340">Status</td></tr>';

			 


			foreach($phones as $phone) //send message for each phone number

			{

				//replace if used any filed in contactus sms form with the actual data

				$msg=$message;

				$msg=ereg_replace("{#fname}",$names[$i],$msg);

				$msg=ereg_replace("{#lname}",$lnames[$i],$msg);

				$msg=ereg_replace("{#title}",$titles[$i],$msg);

				$msg=ereg_replace("{#custom}",$customs[$i],$msg);

				
				//check if the balance is less than 1
				if($credit<1)

				{
					

					echo "<tr class='in_sufficent' align='left'><td colspan='4'>Insufficent Balance!</td></tr>";
					?>
                    <script type="text/javascript">
						document.getElementById('insufficentbalancediv').style.display='block';
					</script>
                    <?
					break;

				}		
				echo "<tr><td width='315px'>".stripcslashes($msg)."</td><td width='120px'>".$names[$i]." ".$lnames[$i]." </td><td style='width:80px'>".$phone."</td>";
				//Send message
				
				$code=$sms->message($msg,$phone,$sender,$msgtype);
				
				//save returned code and message in sms_delivery table, either message is sent or not
				
				$qstaus="insert into sms_delivery (cus_id, msgtype, message, send_to, send_from, return_code, sent_date) values (".$_SESSION['cus_id'].", ".$msgtype.",'".$msg."','".$phone."','".$sender."','".$code."', '".gmdate("Y-m-d H:i:s",time()+(3600))."')";
		//echo "<br/>This is deleiver status".$qstaus;
				$db->query($qstaus);

				if(substr($code,0,4)==1701)
				{
					//if message is send succesfuuly then update customer credits and save record in sms_history table
					echo "<td style='width:140px'><img src='images/success.png' align='absbottom' /><span style='color:green'>Message Sent Successfully</span></td></tr>";
					$db->query("update customer set balance=balance-1, credits_used=credits_used+1 where cus_id=".$_SESSION['cus_id']);

					$db->query("insert into history (cus_id, sms, sms_to, phone, sms_from, sms_date) values (".$_SESSION['cus_id'].",'".$msg."','".$names[$i]." ".$lnames[$i]."','".$phone."','".$sender."','".gmdate("Y-m-d H:i:s",time()+(3600))."')");		
					$credit=$db->get_var("select balance from customer where cus_id=".$_SESSION['cus_id']);	
					$total_send++;				
				}
				else
					echo "<td><img src='images/fail.png' align='absbottom' /><span style='color:red'> Message Sending Failure</span></td></tr>";

				$i++;

			}

		}

	

?>

</table>
<script type="text/javascript">
	document.getElementById('totalmessages_div').style.display='block';
	document.getElementById('totalmessages_div').innerHTML='<strong>Total Messages Sent: </strong><span style="color:#D54410"><?php echo $total_send; ?></span>';
</script>


</div>