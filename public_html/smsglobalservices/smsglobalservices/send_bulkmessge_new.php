<script type="text/javascript" language="javascript">
			
			function AJAXBULK(ajxurl)
			{
						
				if (window.XMLHttpRequest)
				{
					xmlhttp=new XMLHttpRequest();
  				}
				else
				{
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function()
				{
  					if (xmlhttp.readyState==4 && xmlhttp.status==200)
    				{

    					var outstr=xmlhttp.responseText;
						var strresult=outstr.split(":");
						document.getElementById("msgcount").innerHTML=strresult[0];
						//x=x+100;
						//alert(strresult[1]);
						/* reponse text gives the numbers of contacts to whom message has been sent and number of contacts remining to send SMS */
						/* If number of contacts remaning is greatet than zeor then again call the ajaxurl that us send_bulkmessage_ajax.php */
						if(parseInt(strresult[1])>0)
						{
							AJAXBULK(ajxurl);
						}
						else
						{
							if(parseInt(strresult[0])==0)
							{
								document.getElementById("sendmsg_div").style.display='none';
								document.getElementById("fail_msg_div").style.display="block";	
							}
							else
							{
								document.getElementById("sendmsg_div").style.display='none';
								document.getElementById("success_msg_div").style.display="block";
								document.getElementById("success_msgcount").innerHTML=strresult[0];
									
							}
						
						}
    				}
 				 }
				xmlhttp.open("GET",ajxurl,true);
				xmlhttp.send();
			}
			function startbulk()
			{
				document.getElementById("sendmsg_div").style.display='block';
				document.getElementById("surebutton").style.display='none';
				
			}
			</script>
<div class="formdiv">
	<div style="width:550px; margin:auto;">
    <?php
	   /* Ajax file to send bulk messages in q. This file displays contents when bulk sms form is submiited by the customer. and is included in sms_bulk.php file which uploaded the bulk contacts into a temporary table */
	 
		include_once "admin/ez_sql.php";
		$_SESSION['total_send']=0;
		$_SESSION['mobile_send_left']=0;
		$_SESSION['lowerlimit']=0;
        $credit=$db->get_var("select balance from customer where cus_id=".$_SESSION['cus_id']);
		//Check for sms credits 
		//if sms credits are less than one then simply display message insufficent balance
		
         if($credit<1)
         {
                echo '<div class="attention"><div class="typo-icon">Insufficent Balance</div></div>';
    
         }		
		 else
		 {
			 //Count toal numbers uploaded in the temporary table
			 //Count distinct conacts from the temporary table
			 //Display total conatcs and distinct conatcst and display a button to send message 
		 	$_SESSION['total_with_duplication']=$db->get_var("select count(mobile) as mob from  ".$table." where mobile<>0");
			$_SESSION['total_mob_send']=$db->get_var("select count(distinct mobile) as mob from  ".$table." where mobile<>0");			
			$_SESSION['mobile_send_left']=$_SESSION['total_mob_send'];
			
			if($_SESSION['total_mob_send']==0)
			{
				echo '<div class="attention"><div class="typo-icon">your upload has 0 mobile. Please try again...</div></div>';
			}
			else
			{
				if($_SESSION['total_with_duplication']>$_SESSION['total_mob_send'])
				{
				 echo '<div class="attention"><div class="typo-icon">your upload has '.($_SESSION['total_with_duplication']-$_SESSION['total_mob_send']).' duplicates, the duplicates have been removed</div></div>';
				}
				//send_bulkmessage_ajax.php is the file that sends sms to contacts from temporary table  
				$ajax_url="send_bulkmessage_ajax.php?table_name=".$table."&message=".$message."&msgtype=".$msgtype."";
				
				//Below div shows total messaeg to send with a button to start sending messages
				
				echo '<div class="notice"><div class="typo-icon">Total Messages to Send: <span style="color:#ff0000">'.$_SESSION['total_mob_send'].'</span><div style="padding:8px 0px; text-align:left" id="surebutton"><input type="button" class="formbutton" value="Are you sure to send messages?" onclick="startbulk(); AJAXBULK(\''.$ajax_url.'\');" /></div></div></div>';
				
				/* Sending Message Div starts here. Div will be displayed by AJAXBULK fnction to show sending process */
				echo '<div id="sendmsg_div" style="display:none;">';
				echo '<div style="padding:10px;background:#000;color:#fff;font-size:18px;">Message Sending....</div>';
				echo '<div style="padding:10px;background:#F0F0F0;border:1px solid #E9E9E9;">';
				echo '<div style="float:left;width:150px;text-align:center;" id="loader_wait"><img src="images/preloader9.gif" alt="Message Sending. Wait....." /></div>';
				echo '<div style="float:left;width:100px;padding:10px 10px;font-size:35px;color:green" id="msgcount">0</div>';
				echo '<div style="clear:both"></div></div></div>';
				
				/* Sending Message Div ends here. Div will be showd by the AJAXBULK function to show sending process */
				
				/* Success Message Div starts here */
				echo '<div id="success_msg_div" style="display:none;">';
				echo '<div class="approved"><div class="typo-icon">Total Messages Send: <span id="success_msgcount">0</span></div></div>';
				echo '</div>';
				/* Success Message Div ends here */
				
				/* Failure Message Div starts here Div will be showd by the AJAXBULK function to show sending process  */
				echo '<div id="fail_msg_div" style="display:none;">';
				echo '<div class="note"><div class="typo-icon">Message Sending Failure. Please Try again...</div>';
				echo '</div>';
				
				/* Failure Message Div ends here */
				
			}				
		 }
				
	
      	
    ?>
     </div>
    </div>
 </div>
