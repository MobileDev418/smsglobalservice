<?php
	include_once "constants.php";
	include_once "iscustomer.php";
	include_once "admin/ez_sql.php";
	include_once "inc/date_selector.php";		
	$title='Crownsms -  Sms History';
	$mid1='<h4>Sms History</h4>';
	$mid2='<p>Select Date to view your sms history</p>';
	$mid3='';
	$menu14='history-over.jpg';
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
	include_once "header.php";
	$lower=$y1."-".$mt1."-".$dt1;
	$upper=$y2."-".$mt2."-".$dt2;
	$q="select * from history where cus_id=".$id." and sms_date >='".$lower."' and sms_date <='".$upper."' order by sms_date desc";
	$sms_history=$db->get_results($q);
?>

  <link href="style/sms-style.css" rel="stylesheet" type="text/css" />
    <td id="bodybg"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>
        <td height="15" colspan="2"></td>
      </tr>
      <tr>
        <td width="25%" align="center" valign="top">
        	<?php
				include_once "left_col.php";
			?>
        </td>
        <td valign="top">
        <div id="div_balance" style="width:550px; margin-top:30px">
               <table align="center" cellpadding="2" cellspacing="2" class="admin_table">
    <form method="post" action="show_history.php">
    <input type="hidden" name="cus_id" value="<?=$id;?>" />
    <input type="hidden" name="cus_name" value="<?=$name;?>" />
    
    <tr><td>From</td><td><select name="dt1"><?=$dt_box1;?></select></td><td><select name="mn1"><?=$month_box1;?></select></td><td><select name="y1"><?=$year_box1; ?></select></td><td>To</td><td><select name="dt2"><?=$dt_box2;?></select></td><td><select name="mn2"><?=$month_box2;?></select></td><td><select name="y2"><?=$year_box2; ?></select></td><td align="center"><input type="submit" name="showhistory" value="Show" class="submit"  /></tr>
    </form>
    </table>
      </div>
      
      <br />
      <table width="95%" border="1"  align="center" cellpadding="1px" cellspacing="1px" id="sms_history">

<tr class="heading">
	<th width="27" align="left">Sr#</th>
	<th width="256" align="left" >SMS</th>
   	<th width="86" align="left" >To</th>
    <th width="95" align="left" >Mobile #</th>
    <th width="71" align="left" >From</th>
    <th width="145" align="center">Date &amp; Time <span style="font-size:8px">(GMT + 1)</span></th>
</tr>

<?php

$ind=0;
if($sms_history)
{
	foreach($sms_history as $history)
	{
		$ind++;	
		if($ind%2==1)
			echo "<tr class='tr1'>";
		else
			echo "<tr class='tr2'>";
		
		echo "<td align='center'>".$ind."</td>";
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
        </td>
      </tr>
      <tr>
        <td height="5" colspan="2" align="center" valign="top"></td>

        </tr>
    </table></td>
  </tr>
<?php
	include_once "footer.php";
?>
