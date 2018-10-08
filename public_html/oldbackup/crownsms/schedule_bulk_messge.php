<table width="720" align="center" id="mid_tables">
<tr class="heading"><th width="194">Message</th>
<th width="100">To</th>
<th width="108">Phone</th>
<th width="102">From</th>
<th width="106">Send Date</th>
<th width="82">Status</th>
</tr>
<?
	@$send_date=$_POST['send_date'];
	@$send_time=$_POST['send_time'];
	$phones=$db->get_results("select distinct(mobile) as mob from ".$table);
	
 	if($phones)
		{
//			echo '<tr class="heading"><th width="171">Message</th><th width="171">To</th><th width="340">Phone</th><th width="340">From</th><th width="340">Send Date</th><th width="340">Status</th></tr>';	
			$i=0;
			foreach($phones as $phone)
			{
				
//				echo "<br/>".$_SESSION['cus_id'];
//				echo "<br/>".$message;
//				echo "<br/>".$phone;
//				echo "<br/>".$sender;
//				echo "<br/>".$msgtype;
//				echo "<br/>".$names[$i];
//				echo "<br/>".$send_date;
//				echo "<br/>".$send_time;
				
				$msg_dt=substr($send_date,6,4)."-".substr($send_date,0,2)."-".substr($send_date,3,2);
				$msg_dt.=" ".$send_time;
								
				
				echo "<tr><td>".$message."</td><td>".$names[$i]."</td><td>".$phone->mob."</td><td>".$sender."</td><td>".$msg_dt."</td><td style='color:green'>Saved in Que</td></tr>"; 
				$newid=$db->get_var("select max(sms_id) from sms_q");
				
				if(is_null($newid))
					$newid=1;
				else
					$newid=$newid+1;
					
				$q="insert into sms_q (sms_id,cus_id,message,msg_to,msg_from,phone,msgtype,req_date,send_date)values(".$newid.",".$_SESSION['cus_id'].",'".$message."','".$names[$i]."','".$sender."','".$phone->mob."',".$msgtype.",'".gmdate("Y-m-d H:i:s",time()+3600)."','".$msg_dt."')";
	//			echo "<tr><td>".$q."</td></tr>";
				$db->query($q);					
				$i++;
					
			}

	}
	

?>
    </table>