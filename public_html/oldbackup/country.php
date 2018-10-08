<?php
include_once "admin/ez_sql.php";
$countries=$db->get_results("select * from country");
$country_list="";
if($countries)
{
	foreach ($countries as $country)
	{
		$country_list.="<option value='".$country->id."' ";
		if($_SESSION['cont_code']==$country->id)
				$country_list.="selected='selected' ";
		$country_list.=">".$country->name."</option>";
	}
}
?>
