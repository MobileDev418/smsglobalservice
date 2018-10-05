<div class="formdiv">
    <table width="100%" class="grid" cellspacing="0">
    <tr class="heading"><td width="194">Message</td>
    <td width="100">To</td>
    <td width="108">Phone</td>
    <td width="102">From</td>
    <td width="106">Send Date</td>
    <td width="82">Status</td>
    </tr>
    <?php
        //Get the date and time to save message in queue
		@$send_date=$_POST['send_date'];
        @$send_time=$_POST['send_time'];
		
    
        if($phones)
            {
    //			echo '<tr class="heading"><th width="171">Message</th><th width="171">To</th><th width="340">Phone</th><th width="340">From</th><th width="340">Send Date</th><th width="340">Status</th></tr>';	
                $i=0;
                foreach($phones as $phone)
                {
                    

                    
                    $msg=$message;
                    $msg=ereg_replace("{#fname}",$names[$i],$msg);
                    $msg=ereg_replace("{#lname}",$lnames[$i],$msg);
                    $msg=ereg_replace("{#title}",$titles[$i],$msg);
                    $msg=ereg_replace("{#custom}",$customs[$i],$msg);
                    
                    $msg_dt=substr($send_date,6,4)."-".substr($send_date,0,2)."-".substr($send_date,3,2);
                    $msg_dt.=" ".$send_time;
                                    
                    
                    echo "<tr><td>".$msg."</td><td>".$names[$i]." ".$lnames[$i]."</td><td>".$phone."</td><td>".$sender."</td><td>".$msg_dt."</td><td style='color:green'>Saved in Que</td></tr>"; 

                        
                    $q="insert into sms_q (cus_id,message,msg_to,msg_from,phone,msgtype,req_date,send_date)values(".$_SESSION['cus_id'].",'".$msg."','".$names[$i]." ".$lnames[$i]."','".$sender."','".$phone."',".$msgtype.",'".gmdate("Y-m-d H:i:s",time()+3600)."','".$msg_dt."')";
					$db->query($q);
        //			echo "<tr><td>".$q."</td></tr>";			
                    $i++;
                        
                }
    
        }
        
    
    ?>
	</table>
</div>