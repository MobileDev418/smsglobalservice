<?php
	session_start();
	include_once "constants.php";
	$title='Crownsms -  Register';
	$mid1='<h4>Register</h4>';
	$mid2='<p class="bodyText"></p>';
	$mid3='';
	$menu9='register-over.jpg';
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
		?>        </td>
        <td align="center" valign="top" class="innerText"><?php
			include_once "cus_register_form.php";
		?></td>
    </tr>
      <tr>
        <td height="5" colspan="2" align="center" valign="top"></td>
        </tr>
</table></td>
  </tr>
<?php
	include_once "footer.php";
?>