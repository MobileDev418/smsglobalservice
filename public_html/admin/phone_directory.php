<?php
include_once "isadmin.php";
include_once "lib_constant.php";
//A File to display customers sender ids and all phone numbers used while sending SMS
?>
<html>
<title><?php echo $ADMIN_TITLE; ?> - Customers</title>
<head>
<script type="text/javascript" src="script/admin.js">
</script>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="779" align="center" cellpadding="0" cellspacing="0" id="admin_table" style="width:800px">
<tr>
    <td width="777" class="crown_head"><?php echo $WEBSITE; ?> - Phone Directory</td>
  </tr>
<tr>
  <?php
  	include_once "sub_top.php";
  ?>
</tr>
<tr>
<td valign="top" style="padding-top:5px">

<h2 align="center">Customers Sender's ID</h2>
<table width="60%"  align="center" cellpadding="4px" cellspacing="2px" id='viewdiv' class="admin_table">
<tr class="topheading" style="font-size:11px; font-weight:normal">
	<th width="138" align="left">Sr#</th>
	<th width="234" align="left" >Name</th>
    <th width="153" align="left" >Sender's ID</th>
</tr>

<?php
include_once "ez_sql.php";

$customers = $db->get_results("select cus_id, fname, lname, phone, mobile from customer where cus_id!=0 order by cus_id");
$ind=0;
if($customers)
{
	foreach($customers as $cus)
	{
	
		$ind++;	
		if($ind%2==1)
			echo "<tr class='tr1'>";
		else
			echo "<tr class='tr2'>";
		
		echo "<td align='center'>".$ind."</td>";
    	echo "<td align='left'>".$cus->fname. " ".$cus->lname."</td>";
	   	echo "<td align='left'>".$cus->mobile."</td>";
		echo "</tr>";

	}
}	
?>

<tr><td colspan="3" align="right"><input type="button" name="ExporttoExcel" value="Export to Excel" onClick="window.location='export_report_customerids.php'" class="submit" ></td></tr>
</table>
<br/>
<h2 align="center"> SMS Phone #</h2>
<?php

$page_no=$_POST['pagenumber'];
if($page_no=="")
	$page_no=1;

$q="SELECT phone, sms_to FROM `history` group by phone, sms_to order by sms_to ";
$q.=" limit ".(($page_no-1)*20).",20";

$history = $db->get_results($q);

$total_phones = $db->get_var("SELECT count(distinct phone, sms_to ) from history");
$totalpages= ceil($total_phones/20);
if($page_no%10==0)
	$startpage=floor($page_no/10)*10-9;
else
	$startpage=floor($page_no/10)*10+1;
?>
 <form method="post" action="phone_directory.php" />
     <input type="hidden" name="pagenumber" id="pagenumber" value="1" />
	<input type="hidden" name="exporttoexcel" id="exporttoexcel" value="0" />
 	    <table width="60%"  align="center" cellpadding="2" cellspacing="2" class="admin_table">
    	<tr>
        <td width="250px" style="text-align:right"><span style="font-weight:bold"><?php echo $_SESSION['total_cus_his_rec'];  ?></span> Record(s) Found - Page <span style="font-weight:bold"><?php echo $page_no;?></span> of <span style="font-weight:bold"><?php echo $totalpages;?></span></td></tr>
        <tr><td style="text-align:right"><span style="font-weight:bold">Pages: </span>
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

<table width="60%"  align="center" cellpadding="4px" cellspacing="2px" id='viewdiv' class="admin_table">
<tr class="topheading" style="font-size:11px; font-weight:normal">
	<th width="49" align="left">Sr#</th>
	<th width="254" align="left" >Name</th>
   	<th width="141" align="left" >Mobile</th>
    </tr>
<?php
$ind=0;
if($history)
{
	foreach($history as $h)
	{
	
		$ind++;	
		if($ind%2==1)
			echo "<tr class='tr1'>";
		else
			echo "<tr class='tr2'>";
		
		echo "<td align='center'>".$ind."</td>";
		echo "<td align='left'>".$h->sms_to."</td>";
	   	echo "<td align='left'>".$h->phone."</td>";
		echo "</tr>";

	}
}	
?>



<tr><td colspan="3" align="right"><input type="button" name="ExporttoExcel" value="Export to Excel" onClick="window.location='export_report_customerphones.php'" class="submit" ></td></tr>
</table>



</td>
</tr>
</table>
</body>
</html>