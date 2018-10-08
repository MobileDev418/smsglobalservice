<?php
	include_once "constants.php";
	include_once "iscustomer.php";
	include_once "admin/ez_sql.php";
	$balance=$db->get_var("select balance from customer where cus_id=".$_SESSION['cus_id']);
	if(is_null($balance))
		$balance="0";
		
	$title='Crownsms -  Balance';
	$mid1='<h4>Balance</h4>';
	$mid2='';
	$mid3='';
	$menu13='balance-over.jpg';
	include_once "header.php";
?>

  
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
        <div id="div_balance">
                <p align="center" class="heading">SMS BALANCE</p>
          <p align="center" class="bal"><?=$balance; ?> SMS</p>
               <p align="center" >For any inquiry, please call : 234-80-82188058, 01-8770078</p>
      </div>
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
