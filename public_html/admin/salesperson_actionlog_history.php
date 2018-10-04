<?php
ini_set("memory_limit","128M");
set_time_limit(600);

//File is called from sms_history.php. Get customer id, name and date to dipslay sms history

include_once "isadmin.php";
include_once "lib_constant.php";
include_once "ez_sql.php";


@$spid=$_POST['salesperson'];
//@$name=$_POST['cus_name'];


$dt1=$_POST['dt1'];
$dt2=$_POST['dt2']+1;


if($dt2<9)
		$dt2='0'.$dt2;



$mt1=$_POST['mn1'];
$mt2=$_POST['mn2'];
$y1=$_POST['y1'];
$y2=$_POST['y2'];
$page_no=$_POST['pagenumber'];

include_once "../inc/history_selector.php";	

//create lower and upper limit of date to display histroy

$lower=$y1."-".$mt1."-".$dt1;
$upper=$y2."-".$mt2."-".$dt2;

//query to get histroy for a specific customer for submitted interval of date

$wherespq="";
if ($spid!="0")
{
	$wherespq="spid=".$spid." and ";
}

$q="select spid, fname, lname , action, action_date from salesperson_actionlog, customer where ".$wherespq."  action_date >='".$lower."' and action_date <='".$upper."' and salesperson_actionlog.spid=customer.cus_id  order by action_date desc";


//Get the total records to do paging

$_SESSION['total_cus_his_rec']=$db->get_var("select count(*) from salesperson_actionlog where ".$wherespq." action_date >='".$lower."' and action_date <='".$upper."'");

//Divide total records to 20 to get total pages

$totalpages= ceil($_SESSION['total_cus_his_rec']/20);

//get the start page number eg 1,11,21,31,41.....

if($page_no%10==0)
	$startpage=floor($page_no/10)*10-9;
else
	$startpage=floor($page_no/10)*10+1;
	
if($_POST['exporttoexcel']==1) //Check that admin requested for excel report
		{
			//get the lower and upper limit of pages for excel report
			
			$l_page=$_POST['exp_pag1'];
			$u_page=($_POST['exp_pag2']-$l_page)+1;

			//limit the query to submiited page range
			
			$q.=" limit ".(($l_page-1)*20).",".($u_page * 20);
		
			$sms_history=$db->get_results($q);
			
			include_once "export_report_salesperson_log.php";
		}
//if export to excel is not true then limit the records to the current submiited page number


$q.=" limit ".(($page_no-1)*20).",20";
$sms_history=$db->get_results($q);


?>
<html>
<head>
<title><?php echo $ADMIN_TITLE?> - Sales Person Actions Log</title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="script/admin.js"></script>
</head>
<body>

<table align="center" cellpadding="0" cellspacing="0" id="admin_table" style="width:800px;">
<tr>
    <td class="crown_head"><?php echo $WEBSITE ?> - Sales Person Actions Log</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
  ?>
</tr>
<tr><td valign="top" style="padding-top:20px">
<form method="post" action="salesperson_actionlog_history.php">
<table align="center" cellpadding="2" cellspacing="2" class="admin_table">
   
    <input type="hidden" name="cus_id" value="<?php echo $id;?>" />
    <input type="hidden" name="cus_name" value="<?php echo $name;?>" />
    <input type="hidden" name="pagenumber" id="pagenumber" value="1" />
	<input type="hidden" name="exporttoexcel" id="exporttoexcel" value="0" />
                                
    <tr><td>From</td><td><select name="dt1"><?php echo $dt_box1;?></select></td><td><select name="mn1"><?php echo $month_box1;?></select></td><td><select name="y1"><?php echo $year_box1; ?></select></td><td>To</td><td><select name="dt2"><?php echo $dt_box2;?></select></td><td><select name="mn2"><?php echo $month_box2;?></select></td><td><select name="y2"><?php echo $year_box2; ?></select></td></tr>
    <tr>
    <td colspan="8" style="text-align:right">Sales Person:&nbsp; 
	<select name="salesperson">
<option value="0">Select Sales Person</option>
	<?php
		$qsp="select cus_id, fname, lname from customer where is_salesperson=1";
		$salespersons = $db->get_results($qsp." order by fname");
		if($salespersons)
		{
			foreach($salespersons as $sp) //Loop for each customer
			{
				echo '<option value="'.$sp->cus_id.'"';
				if($sp->cus_id==$spid)
					echo 'selected="selected"';
					echo ' >'.$sp->fname .' '.$sp->lname .'</option>';

			}
		}
	?>



	</select></td>
        
<td align="left"><input type="submit" name="showhistory" value="Show" class="submit" style="width:120px" onClick="document.getElementById('exporttoexcel').value=0"  /></td></tr>
    <tr>
    <td style="text-align:right; padding-top:8px;" colspan="8"><span style="color:#900">[Download in bunches of 500 ]</span> Page #&nbsp;
		  <input type="text" name="exp_pag1" id="xpg1" size="3" onKeyPress="return isNumberKey(event)" />&nbsp;To&nbsp;<input type="text" name="exp_pag2" id="xpg2" size="3" onKeyPress="return isNumberKey(event)" /><td align="left"><input type="button" name="" value="Export to Excel" class="submit" style="width:120px" onClick="return checkTotal('<?php echo $totalpages; ?>')" /></td></tr>

    </table><br/>
    
    <table width="99%"  align="center" cellpadding="2" cellspacing="2" class="admin_table">
    	<tr>
        <td width="250px" style="font-size:10px"><span style="font-weight:bold"><?php echo $_SESSION['total_cus_his_rec'];  ?></span> Record(s) Found - Page <span style="font-weight:bold"><?php echo $page_no;?></span> of <span style="font-weight:bold"><?php echo $totalpages;?></td>
        <td style="text-align:right"><span style="font-weight:bold">Pages: </span>
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
                            <input type="button" value="Last" style="width:35px; height:18px; background:#FFF; color:#285BA3;font-size:11px; border:1px solid #285BA3; padding:3px; padding-top:0px;" onclick='gotoPage("<?php echo $totalpages; ?>")' /></td></tr>
                        
    </table>
	</form>
	<table width="99%"  align="center" cellpadding="4px" cellspacing="2px" id='viewdiv' class="admin_table">
<tr class="topheading"><td colspan="6">Sales Person Actions Log History</td></tr>
<tr class="topheading" style="font-size:11px; font-weight:normal">
	<th width="35" align="left">Sr#</th>
	<th width="80" align="left">Sales Person</th>
	<th width="350" align="left" >Action</th>
     <th width="80" align="center">Date</th>
</tr>


<?php

$ind=($page_no-1)*20;
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
    		echo "<td align='left'>".$history->fname." ".$history->lname."</td>";
    		echo "<td align='left'>".$history->action."</td>";
    		echo "<td align='right'>".date('d-m-Y',strtotime($history->action_date))."</td>";
		echo "</tr>";

	}
}	
?>
<tr><td colspan="6" align="right"><a href="salesperson_actionlog.php">Back</a></td></tr>
</table>  

</td>
</tr>
</table>
</body>
</html>