<?php
	include_once "iscustomer.php";
	include_once "admin/ez_sql.php";
	include_once "inc/date_selector.php";		
	$heading='SMS History';
	$menu=10;
?>
<?php
	include_once "header.php";
?>
<div class="formdiv">
	<div style="width:450px; margin:auto;">
			<div class="actionform">
                <div class="historyform" style="text-align:center">
                  
                    <form method="post" action="show_history.php" id="historyform">
                      <table cellpadding="2" cellspacing="2" style="margin:auto">
                    <tr>
                    <td>From</td><td><select name="dt1"><?php echo $dt_box1;?></select></td><td><select name="mn1"><?php echo $month_box;?></select></td><td><select name="y1"><?php echo $year_box; ?></select></td></tr>
                            <tr>
                            <td>To</td><td><select name="dt2"><?php echo $dt_box2;?></select></td><td><select name="mn2"><?php echo $month_box;?></select></td><td><select name="y2"><?php echo $year_box; ?></select></td>
                        </tr>
                        <tr><td align="center" colspan="4" style="padding-top:10px;"><input type="submit" name="showhistory" value="Show History" class="formbutton"  />&nbsp; <input type="button" value="Cancel" class="formbutton" onClick="window.location='index.php'" /></td></tr>
                        </table>
                        </form>
                        
                </div>
           </div>
    </div>
</div>
    
<?php
include_once "right.php"; 
include_once "footer.php";
?>
