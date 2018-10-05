<?php
	include_once "iscustomer.php";
	include_once "admin/ez_sql.php";
	include_once "sms.class.php";
	//This is the file called by send_bulkmessge_new.php AJAXBulk javasript function to send message via AJAX
	//echo "Mobile Sending Left:".$_SESSION['mobile_send_left']."<br/>";
	
	$credit=$db->get_var("select balance from customer where cus_id=".$_SESSION['cus_id']);
	//First check for credits
	if($credit<1)
		echo $_SESSION['total_send'].":0";
	else
	{
	/*send sms to 100 contacts so check for 100 sms credits. if credits are lower than 100 then send message eqaul to sms credits else send message to 100 contacts */
		if($credit<100)
			$upperlimit=$credit;
		else
			$upperlimit=100;
			
		
		//Get table name, message and msgtype from query string 
		
		$tb_name=$_GET['table_name'];
		$message=$_GET['message']; 	
		$msgtype=$_GET['msgtype'];
		
		$dttime=gmdate("Y-m-d H:i:s",time()+(3600));
		$sms=new sendsms();
		$chunk_send=0;
	
		$his=0;
		
		
		//select contacts from temporary table 
		$q="select distinct mobile as mob from ".$tb_name." where mobile<>0 limit ".$_SESSION['lowerlimit'].",".$upperlimit;
		
		//echo $q."<br/>";
		$phones=$db->get_results($q);
		$_SESSION['lowerlimit']=$_SESSION['lowerlimit']+100;
				
		if($phones)
		{
			$j=0;
			foreach ($phones as $phone)
			{
				if($j==0)
					$phlist=$phone->mob;
				else
					$phlist.=",".$phone->mob;
				$j++;	
			}
		}
		$sender=$_SESSION['cus_mobile'];					
		//$code=$sms->message($message,$phlist,$sender,$msgtype);
		//send message to contacts list
		$code=$sms->message($message,$phlist,$sender,$msgtype);
		
		$codes=explode(",",$code);
		$i=0;
		foreach($phones as $phone) //for each phone save data in sms history and delivery table
		{		
			if(substr($codes[$i],0,4)==1701) //if message is send successfully stores data into histroy table
			{
				 
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
			$_SESSION['mobile_send_left']=$_SESSION['mobile_send_left']-$i;
			
			if($chunk_send>=1)
				$db->query("insert into history (cus_id, sms, phone, sms_from, sms_date) values ".$insethistory);
			$db->query("insert into sms_delivery (cus_id, msgtype, message, send_to, send_from, return_code, sent_date) values ".$deliverythistory);			
			$db->query("update customer set balance=balance-".$chunk_send.", credits_used=credits_used+".$chunk_send." where cus_id=".$_SESSION['cus_id']);	
		//echo "Total Send:".$_SESSION['total_send']."<br/>Mobile Send Left".$_SESSION['mobile_send_left'].":";
		$_SESSION['total_send']=$_SESSION['total_send']+$chunk_send;
		//$_SESSION['mobile_send_left']=$_SESSION['total_mob_send']- $_SESSION['total_send'];
		echo $_SESSION['total_send'].":".$_SESSION['mobile_send_left'];
	}
?>
