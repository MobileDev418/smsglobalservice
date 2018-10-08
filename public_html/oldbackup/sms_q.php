<?php
	include_once "iscustomer.php";
	include_once "admin/ez_sql.php";	
	$heading='Sms in Queue';
	$menu=11;
?>
<?php
	include_once "header.php";
?>
<?php
	$id=$_SESSION['cus_id'];
	$q="select * from sms_q where cus_id=".$id." order by send_date" ;
	$sms_q=$db->get_results($q);
?>
   
<div class="formdiv">
	<div style="width:650px; margin:auto">
        <form method="post" action="delete_smsq.php" onsubmit="return isCheck_q()">
        
                <?php
                    echo $_SESSION['q_del'];
                    $_SESSION['q_del']="";
                ?>
        
            <table cellpadding="0" cellspacing="0" class="grid" width="100%">
            
            <tr class="heading">
                <td width="7%" align="left" widtd="32">Sr#</td>
                <td width="5%" align="left" widtd="67"><input name="chkall" type="checkbox"  id="chkall" onclick="checkuncheck()" /></td>
                
                <td width="21%" align="left" widtd="317" >SMS</td>
                <td width="8%" align="left" widtd="83" >Type</td>
                <td width="13%" align="left" widtd="89" >To</td>
                <td width="16%" align="left" widtd="99" >Mobile #</td>
                <td width="9%" align="left" widtd="89" >From</td>
                <td width="21%" align="right" widtd="156">Date &amp; Time
                  <span style="font-size:9px;">(GMT +1)</span></td>
            </tr>
            
            <?php
            
            $ind=0;
            if($sms_q)
            {
                foreach($sms_q as $q)
                {
                    $ind++;	
                    echo "<tr><td align='center'>".$ind."</td>";
                    echo "<td align='center'><input type='checkbox' name='chk_con[]' value='".$q->sms_id."' ></td>";
                    echo "<td align='left'>".$q->message."</td>";
                    
                    if($q->msgtype==0)
                        $mtype="Text";
                    else if($q->msgtype==1)
                        $mtype="Flash";
                    else
                        $mtype="Unicode";
                    
                    echo "<td align='left'>".$mtype."</td>";
                    if($q->msg_to=="")
                        $msgto="&nbsp;";
                    else
                        $msgto=$q->msg_to;
                    echo "<td align='left'>".$msgto."</td>";
                    echo "<td align='left'>".$q->phone."</td>";
                    echo "<td align='left'>".$q->msg_from."</td>";
                        echo "<td align='right'>".$q->send_date."</td>";
                    echo "</tr>";
            
                }
            }	
            ?>
            </table>
            <div class="actionform"><input type="submit" value="Delete" class="formbutton"  />&nbsp;<input type="button" value="Cancel" class="formbutton" onclick="window.location='index.php'"  /></div>
        </form>
      </div>
</div>
<?php
	include_once "right.php";
	include_once "footer.php";
?>
