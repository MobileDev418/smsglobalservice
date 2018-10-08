<?php
include_once "admin/ez_sql.php";
$packages=$db->get_results("select * from package where publish=1");
if ($packages)
{
?>
<table width="47%" border="1" align="center" cellpadding="5" cellspacing="0" id="mid_tables">
          <tr class="heading">
            <td >BULKSMS</td>
            <td >AMOUNT</td>
          </tr>
<?php
	foreach ($packages as $pack)
	{
?>
          <tr>
            <td ><?=$pack->package; ?></td>

            <td ><?=$pack->amount; ?></td>
          </tr>
         <?php
	}
?>
        </table>
<?php
}
else
	echo "Currenlty no package is available";
?> 