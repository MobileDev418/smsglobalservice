<div class="formdiv">
    <table width="100%" class="grid" cellspacing="0">
    <tr class="heading"><td width="194">Message</td>
    <td width="108">Phone</td>
    <td width="102">From</td>
    <td width="106">Send Date</td>
    <td width="82">Status</td>
    </tr>

<?php
	@$send_date=$_POST['send_date'];
	@$send_time=$_POST['send_time'];
	$phones=$db->get_results("select distinct(mobile) as mob from ".$table);
	
 	if($phones)
		{
			$i=0;
			foreach($phones as $phone)
			{
				$msg_dt=substr($send_date,6,4)."-".substr($send_date,0,2)."-".substr($send_date,3,2);
				$msg_dt.=" ".$send_time;
								
				
				echo "<tr><td>".$message."</td><td>".$phone->mob."</td><td>".$sender."</td><td>".$msg_dt."</td><td style='color:green'>Saved in Que</td></tr>"; 
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
</div>