<?php
/* php -q /home/smsgloba/public_html/admin/cron.php  
is a command to execute this script in cron jobs feature of cpanel*/

	//Include database config file
	
	include_once "ez_sql.php";
	//include file to send sms
	include_once "../sms.class.php";
	//include file to get application constant variables
	
	include_once "../library_const.php";
	//email subject
	
	$subject= $WEBSITE."- SMS Q Message Sending Delivery Report";
	
	//create a new object to send sms
	
	$sms=new sendsms();
	
	//get the list of customers whos messages are found in sms_q and for the messages the date and time is less than eqaul to gmdate+1
	
	$q_cus="select distinct(cus_id) as cid from sms_q  where send_date<='".gmdate('Y-m-d H:i:s',time()+3600)."'";
	
	//run query to get customers;
	$customers=$db->get_results($q_cus);
	//if found customers
	if($customers)
	{
		foreach($customers as $cus) //Loop for each customers
		{
				//for a customer get list of all messages in sms_q table
				
				$q="select q.sms_id as smsid, q.cus_id as cid, q.message as mesg, q.msg_to msgto, q.msg_from msgfrom, q.phone as ph, q.msgtype as msgtp, q.send_date as sdate from sms_q q where q.send_date<='".gmdate('Y-m-d H:i:s',time()+3600)."' and q.cus_id=".$cus->cid;
				
				//get credit and email information of customer
				
				$cus_info=$db->get_row("select balance, email from customer where cus_id=".$cus->cid);
				
				$credit=$cus_info->balance;
				$email=$cus_info->email;
							
				//Run query to get messages;
				
				$messages=$db->get_results($q);
				
				if($messages) //if messages found
				{
					
					$mailbody="";
					$msg_send=false;
					
					foreach($messages as $msg) //Loop for each message in sms_q. Nested Loop for each customer
					{
							//Get sms data (message, mobile bumber, from and to from sms_q row
							
							$mailbody.="";
							$body="";
							$body.="\nMessage:".$msg->mesg;
							$body.="\nTO:".$msg->msgto;
							$body.="\nPhone:".$msg->ph;
							$body.="\nFrom:".$msg->msgfrom;
							$body.="\nDate:".gmdate("Y-m-d H:i:s",time()+3600)."\n\n";
							
						//if customer creduts is less than 1 then break the loop to send messages
						
						if($credit<1)
						{
							break;
						}
						
						//send SMS by calling the message metohod of sms.class.php
						
						$code=$sms->message($msg->mesg,$msg->ph,$msg->msgfrom,$msg->msgtp);
						
						//if code retuned is 1701 then message is send successfully
						
						if(substr($code,0,4)==1701)
						{	
						
								//message send successfully then update customer sms credits. deduct 1 credit from customer credits
							
								$db->query("update customer set balance=balance-1, credits_used=credits_used+1 where cus_id=".$msg->cid);
								
								//add sms record in sms histroy table
								
								$db->query("insert into history (cus_id, sms, sms_to, phone, sms_from, sms_date) values (".$msg->cid.",'".$msg->mesg."','".$msg->msgto."','".$msg->ph."','".$msg->msgfrom."','".gmdate("Y-m-d H:i:s",time()+3600)."')");
								
								//add sms record in sms delivery table
								
								$qstaus="insert into sms_delivery (cus_id, msgtype, message, send_to, send_from, return_code, sent_date) values (".$msg->cid.", ".$msg->msgtp.",'".$msg->mesg."','".$msg->ph."','".$msg->msgfrom."','".$code."', '".gmdate("Y-m-d H:i:s",time()+(3600))."')";
								$db->query($qstaus);				
													
								//Delete message from sms_q
								
								$db->query("delete from sms_q where sms_id=".$msg->smsid);
								//again get customer credits
								
								$credit=$db->get_var("select balance from customer where cus_id=".$msg->cid);
								$mailbody.="Message Sent Successfully.";
								$mailbody.=$body;
								//Email message send should be true to inform customer that messsages in q send successfully
								
								$msg_send=true;
								
								
								
						} // End If Code
						else
						{
							$db->query("delete from sms_q where sms_id=".$msg->smsid);
							$mailbody.="Message Sending Failure.";
							$mailbody.=$body;
							$msg_send=true;
						}

					
					} // End For Each $messages		
					

				} // End if Messages
				if($msg_send==true)
				{
						//echo "mail send successfully";
						mail($email,$subject,$mailbody,"From:".$ADMIN_FROM_EMAIL);
				}
				
				
				
		} // End for each customer
		
	} // End If Customer
//echo $cron;
$GLOBALS['cron']='No';
?>
