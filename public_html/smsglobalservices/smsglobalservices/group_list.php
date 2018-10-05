<?php
/* File that populates the select box with the list of groups */
include_once "admin/ez_sql.php";
$groups_name=$db->get_results("select group_id, g.name as gname from sms_group g where g.cus_id=".$_SESSION['cus_id']);
$group_list="";
if($groups_name)
{
	foreach ($groups_name as $grps)
	{
		$group_list.="<option value='".$grps->group_id."' ";
		if($gid==$grps->group_id)
				$group_list.="selected='selected' "; 
		$group_list.=">".$grps->gname."</option>";
	}
}
?>
