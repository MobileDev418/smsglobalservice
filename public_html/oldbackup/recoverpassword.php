<?php
	$heading='Recover Password';
	$menu=1;
?>
<?php
	include_once "header.php";
?>
<div class="formdiv">
			 <?php
				echo $_SESSION['rc_password'];
				$_SESSION['rc_password']="";
               ?>
	<div class="actionform">
    	<div class="rec_pass">
            <form  id="rec_password" name="form1" method="post" action="password_mail.php" onsubmit="return validRecoverPassword()">
               
                <table>    
                    <tr><td width="20%" align="right">E-mail: <span class="red">*</span></td><td align="left"><input name="email" type="text" class="text" id="email" />&nbsp;<input type="submit" class="formbutton" value="Recover Password" /></td></tr>     
    
                </table>
             </form>
         </div>
	</div>
 </div>
<?php
	include_once "right.php";
	include_once "footer.php";
?>
