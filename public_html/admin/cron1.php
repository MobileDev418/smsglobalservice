<?php
//This file is not a part of this application. Check cron.php file
	session_start();
/*php -q /home/smsglob/public_html/admin/cron.php  is a path to execute this script in cron jobs feature of cpanel*/
	include_once "ez_sql.php";
	include_once "../sms.class.php";
	include_once "../library_const.php";
	$subject= $WEBSITE."- SMS Q Message Sending Delivery Report";
	global $cron;
	$cron='yes';
	global $cs_id;
	$sms=new sendsms();
	
	$q_cus="select distinct(cus_id) as cid from sms_q  where send_date<='".gmdate('Y-m-d H:i:s',time()+3600)."'";
	//echo $q_cus;
	
	$customers=$db->get_results($q_cus);
	if($customers)
	{
		foreach($customers as $cus)
		{
				
				$q="select q.sms_id as smsid, q.cus_id as cid, q.message as mesg, q.msg_to msgto, q.msg_from msgfrom, q.phone as ph, q.msgtype as msgtp, q.send_date as sdate from sms_q q where q.send_date<='".gmdate('Y-m-d H:i:s',time()+3600)."' and q.cus_id=".$cus->cid;
				$cus_info=$db->get_row("select balance, email from customer where cus_id=".$cus->cid);
				$credit=$cus_info->balance;
				$email=$cus_info->email;
							
				//echo "<br/>These are messages.".$q;
				
				$messages=$db->get_results($q);
				
				if($messages)
				{
					
					$mailbody="";
					$msg_send=false;
					
					foreach($messages as $msg)
					{
							$mailbody.="";
							$body="";
							$body.="\nMessage:".$msg->mesg;
							$body.="\nTO:".$msg->msgto;
							$body.="\nPhone:".$msg->ph;
							$body.="\nFrom:".$msg->msgfrom;
							$body.="\nDate:".gmdate("Y-m-d H:i:s",time()+3600)."\n\n";
							

						if($credit<1)
						{
							break;
						}
						$cs_id=$msg->cid;
						$code=$sms->message($msg->mesg,$msg->ph,$msg->msgfrom,$msg->msgtp);
						//$code=1701;
						if($code==1701)
						{	
							
								$db->query("update customer set balance=balance-1, credits_used=credits_used+1 where cus_id=".$msg->cid);
								//echo "customer update query";
								$db->query("insert into history (cus_id, sms, sms_to, phone, sms_from, sms_date) values (".$msg->cid.",'".$msg->mesg."','".$msg->msgto."','".$msg->ph."','".$msg->msgfrom."','".gmdate("Y-m-d H:i:s",time()+3600)."')");
								$db->query("delete from sms_q where sms_id=".$msg->smsid);
								$credit=$db->get_var("select balance from customer where cus_id=".$msg->cid);
								$mailbody.="Message Sent Successfully.";
								$mailbody.=$body;
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
						mail($email,$subject,$mailbody,"From:".$ADMIN_FROM_EMAIL);
				
				
		} // End for each customer
		
	} // End If Customer
	
$cron='No';
?>
