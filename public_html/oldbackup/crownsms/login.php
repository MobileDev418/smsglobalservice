<?php
	session_start();
	include_once "constants.php";
	$title='Crownsms -  Login';
	$mid1='<h4>Login</h4>';
	$mid2='<p class="bodyText">Please do not hesitate to contact us for more information. You could also visit our online frequent questions &amp; answers section.e Feedback or Questions</p>';
	$mid3='';
	$menu8='login-over.jpg';
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
        <td align="center" valign="top" class="innerText">
        <form id="form1" name="form1" method="post" action="cus_signin.php">
          <table width="34%" border="0" align="center" cellpadding="2" cellspacing="3" id="login"  style="margin-top:50px" >
          <?php
		  	if ($_SESSION['cus_login']=="no")
				echo '<tr><td class="error" colspan="2" align="left"><img src="images/boxerror.gif" align="absmiddle" /> '.$_SESSION['cus_lg'].'</td></tr>';
			
		  ?>
        
            <tr>
              <td width="30%">Username</td>
              <td width="70%"><input type="text" name="name" /></td>
            </tr>
            <tr>

              <td>Password</td>
              <td><input type="password" name="password" /></td>
            </tr>
            <tr>
              <td rowspan="2"></td>
              <td><input name="Submit" type="submit" class="submit" value="Login" /></td>
            </tr>
            <tr>
              <td align="left">Forgot Pasword?<a href="recoverpassword.php" class="click">Click Here</a></td>
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
