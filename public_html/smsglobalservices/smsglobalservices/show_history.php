<?php
	ini_set("memory_limit","128M");
	include_once "iscustomer.php";
	//Customer check
	include_once "admin/ez_sql.php"; //include database file
 
	//Show date selector 
	include_once "inc/date_selector.php";		
	
	//Set page heading
	$heading='SMS Delivery Report';

	//set active menu
	$menu=10;

	//Get user id
	$id=$_SESSION['cus_id'];
	//Get user name
	$name=$_SESSION['cus_uname'];
	
		//Get posted date to show sms delivery report
		$dt1=$_POST['dt1'];
		$dt2=$_POST['dt2']+1;
		if($dt2<9)
			$dt2='0'.$dt2;
			$mt1=$_POST['mn1'];
			$mt2=$_POST['mn2'];
			$y1=$_POST['y1'];
			$y2=$_POST['y2'];
			
			//create lower and upper date (date intervak to show report
			
			$lower=$y1."-".$mt1."-".$dt1;
			$upper=$y2."-".$mt2."-".$dt2;
			
			//count total records
			
			$total_cus_rec=$db->get_var("select count(*) from sms_delivery where cus_id=".$id);
			
			//count total records for selected data and time
			
			$_SESSION['total_rec']=$db->get_var("select count(*) from sms_delivery where cus_id=".$id." and sent_date >='".$lower."' and sent_date <='".$upper."'");
			
			//get posted page number.
			
			$page_no=$_POST['pagenumber'];
			
		    //Count total pages by divinding total_rec to 20. Display 20 records per page
			
			$totalpages= ceil($_SESSION['total_rec']/20);
			
			//get the start page number of page list that is 1, 11, 21, 31, 41..... etc
			if($page_no%10==0)
				$startpage=floor($page_no/10)*10-9;
			else
				$startpage=floor($page_no/10)*10+1;
			
			//$pagegroup=$totalpages/10;
		//echo "<br/>Total Pages:".$totalpages;
		include_once "inc/history_selector.php";
		
		
			
		//Query to select sms_delivery records for selected date interval
		
		$q="select * from sms_delivery where cus_id=".$id." and sent_date >='".$lower."' and sent_date <='".$upper."' order by sent_date desc";
		
		//If customer clicks on export to excel button then retrun an excel file
		if($_POST['exporttoexcel']==1)
		{
			//get start and end page number to create excel report
			$l_page=$_POST['exp_pag1'];
			$u_page=($_POST['exp_pag2']-$l_page)+1;
			
			
			$q.=" limit ".(($l_page-1)*20).",".($u_page * 20);
			$sms_history=$db->get_results($q);
			//include file to export excel file
			include_once "export_report_smsdeleivery.php";
		}
		//If clicked on some page number then move to that page and limit the sms report to that page only
		$q.=" limit ".(($page_no-1)*20).",20";
		$sms_history=$db->get_results($q);
?>

<?php

include_once "header.php";

?>

<script type="text/javascript" language="javascript" >

function gotoPage(pagenumber)
{
	document.getElementById('pagenumber').value=pagenumber;
	document.getElementById('exporttoexcel').value=0
	document.getElementById('historyform').submit();
}
function checkTotal()
{
	var total_rec="<?php echo $_SESSION['total_rec']; ?>";
	var total_pages="<?php echo $totalpages; ?>";
	if(parseInt(total_rec)>=1000000)
	{
		alert("The file you're exporting to Excel has "+total_rec+" records. The maximum file you can download is a file of 1Million records. Please contact support@smsglobalservice.com");
		return false;
	}
	else
	{
		var lp1=document.getElementById('xpg1');
		var lp2=document.getElementById('xpg2');
		if(lp1.value=="")
		{
			alert("please enter page range");
			lp1.focus();
			return false;
		}
		if(lp2.value=="")
		{
			alert("please enter page range");
			lp2.focus();
			return false;
		}
		if(parseInt(lp2.value)<parseInt(lp1.value))
		{
			alert("Upper limit should be more than lower limit")
			lp2.focus();
			return false;
		}
		if((parseInt(lp2.value)-parseInt(lp1.value)+1)>500)
		{
			alert("500 Pages is the maximum download limit");
			lp2.focus();
			return false;
		}
		if(parseInt(lp2.value)>parseInt(total_pages))
		{
			alert("Upper limit is not in range");
			lp2.focus();
			return false;
		}
		document.getElementById('exporttoexcel').value=1;
		document.getElementById('historyform').submit();
	}
}
</script>

<div class="formdiv">

	<div style="width:650px; margin:auto;">
                    <form method="post" action="show_history.php" id="historyform">
					<div class="actionform">
			            <div class="historyform">
                            <table width="100%" cellpadding="2" cellspacing="1" border="1">
                                <input type="hidden" name="cus_id" value="<?php echo $id;?>" />
                                <input type="hidden" name="cus_name" value="<?php echo $name;?>" />
                                <input type="hidden" name="pagenumber" id="pagenumber" value="1" />
								<input type="hidden" name="exporttoexcel" id="exporttoexcel" value="0" />
                                
                                <tr><td width="30">From</td><td width="44"><select name="dt1"><?php echo $dt_box1;?></select></td><td width="44"><select name="mn1"><?php echo $month_box1;?></select></td><td width="44"><select name="y1"><?php echo $year_box1; ?></select></td><td width="11">To</td><td width="44"><select name="dt2"><?php echo $dt_box2;?></select></td><td width="44"><select name="mn2"><?php echo $month_box2;?></select></td><td width="96"><select name="y2"><?php echo $year_box2; ?></select></td><td width="205" align="left"><input type="submit" name="showhistory" value="Show" class="formbutton" onclick="document.getElementById('exporttoexcel').value=0"  /></td></tr>
                                <?php
								if($_SESSION['total_rec']>=1)
								{	
								?>
									<tr>
									  <td style="text-align:right; padding-top:8px;" colspan="8"><span style="color:#900">[Report less than 1M, download in bunches of 500 ]</span> Page #&nbsp;
				              <input type="text" name="exp_pag1" id="xpg1" size="3" onkeypress="return isNumberKey(event)" />&nbsp;To&nbsp;<input type="text" name="exp_pag2" id="xpg2" size="3" onkeypress="return isNumberKey(event)" /><td align="left"><input type="button" name="" value="Export to Excel" class="formbutton" onclick="return checkTotal()"/></td></tr>
									
							<?php
								}
								?>
        
			                </table>
                          
                        </div>
                     </div>

                    				<?php
					if($totalpages>=1)
					{
				?>
                        <div class="actionform" style="text-align:left;">
                        	<div class="pagenumbers" style="text-align:left; height:25px;">
                             <div style="float:left;width:230px;font-size:11px;"><span style="font-weight:bold"><?php echo $_SESSION['total_rec'];  ?></span> Record(s) Found - Page <span style="font-weight:bold"><?php echo $page_no;?></span> of <span style="font-weight:bold"><?php echo $totalpages;?></span> </div>
                            <div style="float:left;text-align:right; width:390px;">
                            <span style="font-weight:bold">Pages:</span> 
                            <input type="button" value="First" style="width:35px; height:18px; background:#FFF; color:#285BA3;font-size:11px; border:1px solid #285BA3; padding:3px; padding-top:0px;" onclick='gotoPage("1")' />
                            
                            <?php
							if($startpage==1)
								echo "&nbsp;&lt;&lt;&nbsp;";
							else
								echo "&nbsp;<a href='#' onclick='gotoPage(\"".($startpage-1)."\")'>&lt;&lt;</a>&nbsp;";
                                $pagelist="";
								$j=1;
								
								
                                for($i=$startpage;$i<=$totalpages && $j<=10;$i++)
                                {
                                    $pagelist.="<a href='#' onclick='gotoPage(".$i.")'>".$i."</a>, ";
									$j++;
                                }
                                $pagelist=substr($pagelist,0,strlen($pagelist)-2);
                                echo "<span style='font-size:95%'>".$pagelist."</span>";
								if($i>$totalpages)
									echo "&nbsp;&gt;&gt;&nbsp;";
								else
									echo "&nbsp;<a href='#' onclick='gotoPage(\"".($i)."\")'>&gt;&gt;</a>&nbsp;";
								
                            ?>
                            <input type="button" value="Last" style="width:35px; height:18px; background:#FFF; color:#285BA3;font-size:11px; border:1px solid #285BA3; padding:3px; padding-top:0px;" onclick='gotoPage("<?php echo $totalpages; ?>")' />
                            </div>
                           
                        </div></div>
               <?php
					}
			   ?>
                
                    </form>



      <table class="grid" cellspacing="0" cellpadding="0">

      <tr class="heading">

            <td width="50" align="left">Sr#</td>
            <td width="155" align="left" >SMS</td>
             <td width="94" align="left" >From</td>
            <td width="94" align="left" >To</td>
            <td width="152" align="center">Date &amp; Time <span style="font-size:8px">(GMT + 1)</span></td>
            <td width="103" align="center">Status</span></td>

		</tr>



			<?php

            

            $ind=($page_no-1)*20;

            if($sms_history)

            {

                foreach($sms_history as $history) //Loop to display sms delivery records

                {

                    $ind++;	

                    echo "<tr><td align='center'>".$ind."</td>";

                    echo "<td align='left'>".$history->message."</td>";


           
                                    
					echo "<td align='left'>". ereg_replace(",",", ",$history->send_from)."</td>";
                    echo "<td align='left'>". ereg_replace(",",", ",$history->send_to)."</td>";


                    echo "<td align='right'>".$history->sent_date."</td>";
					if(substr($history->return_code,0,4)==1701)
						$status="<img src='images/success.png' align='left' /><span style='color:green'>Delivered</span> ";
					else
						$status=" <img src='images/fail.png' align='left' /><span style='color:red'>Un-delivered</span>";
						
					 echo "<td align='left'>".$status."</td>";

                    echo "</tr>";

            

                }

            }	

            ?>

            </table>
        

	</div>

 </div>

 

<?php
	include_once "right.php";
	include_once "footer.php";
?>

