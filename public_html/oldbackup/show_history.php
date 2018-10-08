<?php
	include_once "iscustomer.php";
	include_once "admin/ez_sql.php";
	include_once "inc/date_selector.php";		
	$heading='SMS History';
	$menu=10;
	$id=$_SESSION['cus_id'];
	$name=$_SESSION['cus_uname'];
	$dt1=$_POST['dt1'];
	$dt2=$_POST['dt2']+1;
	if($dt2<9)
		$dt2='0'.$dt2;
	$mt1=$_POST['mn1'];
	$mt2=$_POST['mn2'];
	$y1=$_POST['y1'];
	$y2=$_POST['y2'];
	include_once "inc/history_selector.php";	
	$lower=$y1."-".$mt1."-".$dt1;
	$upper=$y2."-".$mt2."-".$dt2;
	$q="select * from history where cus_id=".$id." and sms_date >='".$lower."' and sms_date <='".$upper."' order by sms_date desc";
	$sms_history=$db->get_results($q);
?>
<?php
include_once "header.php";
?>

<div class="formdiv">
	<div style="width:650px; margin:auto;">
			<div class="actionform">
            <div class="historyform">
                  
                    <form method="post" action="show_history.php" id="historyform">
                    <table cellpadding="2" cellspacing="2" style="margin:auto">
                    <input type="hidden" name="cus_id" value="<?php echo $id;?>" />
                    <input type="hidden" name="cus_name" value="<?php echo $name;?>" />
                    
                    <tr><td>From</td><td><select name="dt1"><?php echo $dt_box1;?></select></td><td><select name="mn1"><?php echo $month_box1;?></select></td><td><select name="y1"><?php echo $year_box1; ?></select></td><td>To</td><td><select name="dt2"><?php echo $dt_box2;?></select></td><td><select name="mn2"><?php echo $month_box2;?></select></td><td><select name="y2"><?php echo $year_box2; ?></select></td><td align="center"><input type="submit" name="showhistory" value="Show" class="formbutton"  /></td></tr>
                     </table>
                    </form>
                   
              </div>
            </div>
      
		
      <table class="grid" cellspacing="0" cellpadding="0">
      <tr class="heading">
            <td width="35" align="left">Sr#</td>
            <td width="210" align="left" >SMS</td>
            <td width="81" align="left" >To</td>
            <td width="87" align="left" >Mobile #</td>
            <td width="71" align="left" >From</td>
            <td width="138" align="center">Date &amp; Time <span style="font-size:8px">(GMT + 1)</span></td>
		</tr>

			<?php
            
            $ind=0;
            if($sms_history)
            {
                foreach($sms_history as $history)
                {
                    $ind++;	
                    echo "<tr><td align='center'>".$ind."</td>";
                    echo "<td align='left'>".$history->sms."</td>";
                    if($history->sms_to=="")
                        $con_name="&nbsp;";
                    else
                        $con_name=$history->sms_to;
                        
                    if($history->sms_from=="")
                        $con_from="&nbsp;";
                    else
                        $con_from=$history->sms_from;
                                    
                    echo "<td align='left'>".$con_name."</td>";
                    echo "<td align='left'>".$history->phone."</td>";
                    echo "<td align='left'>".$con_from."</td>";
                    echo "<td align='right'>".$history->sms_date."</td>";
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
