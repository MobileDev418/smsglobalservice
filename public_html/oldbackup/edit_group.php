<?php
	include_once "iscustomer.php";
	@$id=$_GET['group_id'];
	include_once "admin/ez_sql.php";
	$group=$db->get_row("select * from sms_group where group_id=".$id." and cus_id=".$_SESSION['cus_id']);
	if($group->name=="")
		header("location:groups.php");
		
	$heading='Manage Groups - Edit Group';
	$menu=13;
?>
<?php
	include_once "header.php";
?>

<div class="formdiv">
	<div style="width:550px; margin:auto;">
    <form name="cus_group" id="cus_group" method="post" action="update_group.php" onsubmit="return validGroup()">
   	<div class="formborder">
   	<table>
        <tr>
          <td width="36%" height="28" align="right">Name <span class="red">*</span></td>

        <td width="36%" align="center"> <input name="group_id" type="hidden" id="group_id" value="<?php echo $group->group_id; ?>" /><input name="name" type="text" id="name" value="<?php echo $group->name; ?>" /></td><td width="28%" align="left"><span class="invalid" id='er_name'><img src="images/cross.png" alt=""></span></td>
        </tr>
    </table> 
    </div>
    
   <div class="actionform">
    	<input type="submit" value="Save" class="formbutton" />&nbsp;<input type="button" value="Cancel" class="formbutton" onclick="window.location='groups.php'" />    </div>
	</form>
</div>
</div>
<?php
include_once "right.php"; 
include_once "footer.php";
?>