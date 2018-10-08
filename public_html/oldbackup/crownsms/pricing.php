<?php
	include_once "constants.php";
	$title='Crownsms -  Pricing';
	$mid1='<h4>Pricing</h4>';
	$mid2='<p align="center"><strong>CROWNSMS PRICE LIST</strong></p><p align="center"><strong>For prices above 10,000, please call :</strong> 234-80-82188058, 01-8770078</p>';
	$mid3='';
	$menu4='pricing-over.jpg';
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
        <td valign="top" class="innerText">
        <?php
			include_once "getPricing.php";
		?>
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