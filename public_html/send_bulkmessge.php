<div class="formdiv">
    <table width="100%" cellspacing="0" cellpadding="0"  class="grid" >
    <?php
	//This file is no longer used in application. See send_bulkmessge_new.php to send bulk message
		$total_send=0;
		$mobile_send_left=0;
		include_once "admin/ez_sql.php";
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
				//distinct
				
				$total_with_duplication=$db->get_var("select count(mobile) as mob from  ".$table." where mobile<>0");
				$total_mob_send=$db->get_var("select count(distinct mobile) as mob from  ".$table." where mobile<>0");			
				if($total_mob_send==0)
					die("No mobile number");
				$mobile_send_left=$total_mob_send;
				$grp_total=ceil($total_mob_send/50);
				//echo "Total Bulk Chuck: ".$grp_total;
				//echo "Total Mobile Send: ".$total_mob_send;
				$lowerlimit=0;
				for($g=0;$g<$grp_total;$g++)
				{
					$dttime=gmdate("Y-m-d H:i:s",time()+(3600));
					$credit=$db->get_var("select balance from customer where cus_id=".$_SESSION['cus_id']);
					if($credit>=1)
					{
						if($credit<50)
							$upperlimit=$credit;
						elseif($mobile_send_left<50)
							$upperlimit=$mobile_send_left;
						else
							$upperlimit=50;
						$q="select distinct mobile as mob from ".$table." where mobile<>0 limit ".$lowerlimit.",".$upperlimit;
						//echo $q;
						$lowerlimit=$lowerlimit+50;
						$phones=$db->get_results($q);
						if($phones)
						{
							$i=0;
							$j=0;
							foreach ($phones as $phone)
							{
								
								if($j==0)
									$phlist=$phone->mob;
								else
									$phlist.=",".$phone->mob;
								$j++;	
							}
							
							$code=$sms->message($message,$phlist,$sender,$msgtype);
							//echo $code;
							$codes=explode(",",$code);
							$chunk_send=0;
							$his=0;
							foreach($phones as $phone)
							{	

								echo "<div style='display:none'><p>".$phone->mob."</p></div>";
								if(substr($codes[$i],0,4)==1701)
								{
									//echo "<br>Message Send<br />";
									$total_send++;
									$chunk_send++;
									if($his==0)
									{
										$insethistory="(".$_SESSION['cus_id'].",'".$message."','".$phone->mob."','".$sender."','".$dttime."')";
										$his++;
									}
									else
										$insethistory.=",(".$_SESSION['cus_id'].",'".$message."','".$phone->mob."','".$sender."','".$dttime."')";									
								}
								
								if($i==0)
										$deliverythistory="(".$_SESSION['cus_id'].", ".$msgtype.",'".$message."','".$phone->mob."','".$sender."','".$codes[$i]."', '".$dttime."')";
								else
										$deliverythistory.=",(".$_SESSION['cus_id'].", ".$msgtype.",'".$message."','".$phone->mob."','".$sender."','".$codes[$i]."', '".$dttime."')";
									
								$i++;
							}
							
							if($chunk_send>=1)
								$db->query("insert into history (cus_id, sms, phone, sms_from, sms_date) values ".$insethistory);
							
							$db->query("insert into sms_delivery (cus_id, msgtype, message, send_to, send_from, return_code, sent_date) values ".$deliverythistory);			
							$mobile_send_left=$total_mob_send-$total_send;
							//$credit=$credit-$total_send;
						}
					}
					else
					{
						break;
					}
					
				}
				
				
				$credit=$db->get_var("select balance from customer where cus_id=".$_SESSION['cus_id']);
				
					
				//echo "</td></tr>";
				if($total_send>=1)
				{ 	
					
					$db->query("update customer set balance=balance-".$total_send.", credits_used=credits_used+".$total_send." where cus_id=".$_SESSION['cus_id']);	
					echo "<tr><td><img src='images/success.png' align='absbottom' /><span style='color:green'>Message Sent Successfully</span></td></tr>";
					if($total_without_duplication<$total_mob_send)
						echo "<tr><td>your upload has ".($total_with_duplication-$total_mob_send)." duplicates, the duplicates have been removed</td></tr>";	
					echo "<tr><td><strong>Total Messages Sent: </strong>".$total_send."</td></tr>";
					echo "<tr><td><strong>Your current balance is: </strong>".($credit)."</td></tr>";
				}
				else
				{
					echo "<td><img src='images/fail.png' align='absbottom' /><span style='color:red'>Message Sending Failure</span></td></tr>";
					echo "<tr><td><strong>Total Messages Sent: </strong>".$total_send."</td></tr>";
				}

      	}
       //$db->query("drop table ".$table); 
    ?>
    </table>
 </div>