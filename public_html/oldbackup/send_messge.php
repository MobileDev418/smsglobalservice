<div class="formdiv">
<table width="100%" cellspacing="0" cellpadding="0"  class="grid" >

<?php

	 $credit=$db->get_var("select balance from customer where cus_id=".$_SESSION['cus_id']);
	 $sms=new sendsms();
	 	if($phones)
		{
			
			 echo '<tr class="heading"><td width="171">Message</td><td width="171">Name</td><td width="171">Mobile #</td><td width="340">Status</td></tr>';
			 
			$i=0;
			foreach($phones as $phone)
			{
				
				$msg=$message;
				$msg=ereg_replace("{#fname}",$names[$i],$msg);
				$msg=ereg_replace("{#lname}",$lnames[$i],$msg);
				$msg=ereg_replace("{#title}",$titles[$i],$msg);
				$msg=ereg_replace("{#custom}",$customs[$i],$msg);
				
				if($credit<1)
				{
					echo "<tr class='in_sufficent' align='center'><td colspan='3'>Insufficent Balance</td></tr>";
					break;
				}		
				echo "<tr><td width='315px'>".$msg."</td><td width='120px'>".$names[$i]." ".$lnames[$i]." </td><td style='width:80px'>".$phone."</td>";
				$code=$sms->message($msg,$phone,$sender,$msgtype);
				if($code==1701)
				{
					
					echo "<td style='width:140px'><img src='images/success.png' align='absbottom' /><span style='color:green'>Message Sent Successfully</span></td></tr>";
					$db->query("update customer set balance=balance-1, credits_used=credits_used+1 where cus_id=".$_SESSION['cus_id']);
					$db->query("insert into history (cus_id, sms, sms_to, phone, sms_from, sms_date) values (".$_SESSION['cus_id'].",'".$msg."','".$names[$i]." ".$lnames[$i]."','".$phone."','".$sender."','".gmdate("Y-m-d H:i:s",time()+(3600))."')");
					$credit=$db->get_var("select balance from customer where cus_id=".$_SESSION['cus_id']);
					
				}
				else
					echo "<td><img src='images/fail.png' align='absbottom' /><span style='color:red'> Message Sending Failure</span></td></tr>";
				$i++;
			
				
			}
		}
	
?>
</table>
</div>