<?php
	session_start();
	include_once "constants.php";
	$title='Crownsms -  Recover Password';
	$mid1='<h4>Recover Password</h4>';
	$mid2='<p class="bodyText">Please Enter Your email address. We will sent you new password to your email address.</p>';
	$mid3='';
	$menu8='login-over.jpg';
	include_once "header.php";
?>

<link href="style/sms-style.css" rel="stylesheet" type="text/css" />


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
        <td align="center" valign="top" class="innerText">
        <form id="form1" name="form1" method="post" action="password_mail.php" onsubmit="return validRecoverPassword()">
          <table width="32%" border="0" align="center" cellpadding="2" cellspacing="3" id="mid_tables" >    
        <tr class="heading" align="center"><td colspan="2">Recover Password</td></tr>
        <?php
			if($_SESSION['rc_password']=="n")
			{
		echo "<tr><td colspan='2' class='error'><img src='images/boxerror.gif' align='absmiddle' />".$_SESSION['rc_pass']."</td></tr>";
		$_SESSION['rc_password']="";
			}
		?>
              <td width="28%" align="right">E-mail</td>
              <td width="72%"><input name="email" type="text" class="text" id="email" /> </td>
              
            </tr>  <tr>
                <td>&nbsp;</td>
                <td><input type="submit" class="submit" value="Send" /> <input type="button" class="submit" value="Cancel" onclick="window.location='login.php'" /></td>
              </tr>
          </table>
          </form>
        </td>
      </tr>
      <tr>
        <td height="5" colspan="2" align="center" valign="top"></td>

        </tr>
    </table></td>
  </tr>
<?php
	include_once "footer.php";
	$_SESSION['cus_lg']="";
	$_SESSION['cus_login']="";
?>
