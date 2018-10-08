<div class="formdiv">
    <table width="100%" cellspacing="0" cellpadding="0"  class="grid" >
    <?php
         $credit=$db->get_var("select balance from customer where cus_id=".$_SESSION['cus_id']);
         if($credit<1)
         {
                echo "<tr class='in_sufficent' align='center'><td>Insufficent Balance</td></tr>";
    
         }		
         else
         {
				//echo "<tr><td>";
				$sms=new sendsms();
				$i=0;
				$phones=$db->get_results("select distinct(mobile) as mob from ".$table." where mobile<>0 limit 0,".$credit);
				
				//$phones=$db->get_results("select mobile as mob from ".$table." limit 0,".$credit);
				$i=0;
				if($phones)
				{
					$dttime=gmdate("Y-m-d H:i:s",time()+(3600));
						foreach($phones as $phone)
						{
							if($i==0)
							{
								
								$phlist=$phone->mob;
								$insethistory="(".$_SESSION['cus_id'].",'".$message."','".$phone->mob."','".$sender."','".$dttime."')";
							}
							else
							{
								$phlist.=",".$phone->mob;
								$insethistory.=",(".$_SESSION['cus_id'].",'".$message."','".$phone->mob."','".$sender."','".$dttime."')";
							}									
						$i++;
						}
				}
				//echo $phlist;
				//echo "<br>".$insethistory;
								
				$code=$sms->message($message,$phlist,$sender,$msgtype);
				
				//echo "</td></tr>";
				if($code==1701)
				{ 
					echo "<td><img src='images/success.png' align='absbottom' /><span style='color:green'>Message Sent Successfully</span></td></tr>";
					echo "<tr><td><strong>Total Messages Sent: </strong>".$i."</td></tr>";
					echo "<tr><td><strong>Your current balance is: </strong>".($credit-$i)."</td></tr>";
					$db->query("update customer set balance=balance-".$i.", credit_used=credit_used+".$i." where cus_id=".$_SESSION['cus_id']);	
					$db->query("insert into history (cus_id, sms, phone, sms_from, sms_date) values ".$insethistory);
				}
				else
					 echo "<td><img src='images/fail.png' align='absbottom' /><span style='color:red'> Message Sending Failure</span></td></tr>";			
      	}
       $db->query("drop table ".$table); 
    ?>
    </table>
 </div>