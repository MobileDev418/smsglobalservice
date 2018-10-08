<table width="523" align="center" id="mid_tables">
<?php
 	 $credit=$db->get_var("select balance from customer where cus_id=".$_SESSION['cus_id']);
	 if($credit<1)
	 {
			echo "<tr class='in_sufficent' align='center'><td>Insufficent Balance</td></tr>";

	 }		
	 else
	 {
	 	echo "<tr><td>";
		 	 $sms=new sendsms();
			 $valid=$sms->validate();
	 	 	 if($valid==1)
	 		{
				//$mobilecount=$db->get_var("select distinct(count(mobile)) as mob_count from ".$table);
				$mobilecount=$db->get_var("select count(mobile) as mob_count from ".$table);
					$i=0;
					//echo $mobilecount;
				//$phones=$db->get_results("select distinct(mobile) as mob from ".$table." limit 0,".$credit);
				$phones=$db->get_results("select mobile as mob from ".$table." limit 0,".$credit);
				$i=0;
				foreach($phones as $phone)
				{
					if($i==0)
					{
						$phlist=$phone->mob;
						$insethistory="(".$_SESSION['cus_id'].",'".$message."','".$phone->mob."','".$sender."','".gmdate("Y-m-d H:i:s",time()+(3600))."')";
					}
					else
					{
						$phlist.=",".$phone->mob;
						$insethistory.=",(".$_SESSION['cus_id'].",'".$message."','".$phone->mob."','".$sender."','".gmdate("Y-m-d H:i:s",time()+(3600))."')";
					}									
				$i++;


				}
				//echo $phlist;
				//echo "<br>".$insethistory;
								
				$code=$sms->message($message,$phlist,$sender,$msgtype);
				echo "</td></tr>";
				$code=1701;
				if($code==1701)
				{ 
					echo "<td><img src='images/success.jpg' align='absbottom' /><span style='color:green'>Message Sent Successfully</span></td></tr>";
					echo "<tr><td><strong>Total Messages Sent: </strong>".$i."</td></tr>";
					echo "<tr><td><strong>Your current balance is: </strong>".($credit-$i)."</td></tr>";
					
					$db->query("update customer set balance=balance-".$i." where cus_id=".$_SESSION['cus_id']);	
					$db->query("insert into history (cus_id, sms, phone, sms_from, sms_date) values ".$insethistory);
					
				}
				else
					echo "<td><img src='images/fail.jpg' align='absbottom' /><span style='color:red'> Message Sending Failure</span></td></tr>";			
		
			}
			else
				echo "<td align='center' class='in_sufficent'>Server Not Currently Available! Try After Sometime</td></tr>";
		}
	
?>
</table>