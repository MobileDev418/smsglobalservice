<?php
	include_once "constants.php";
	include_once "iscustomer.php";
	include_once "admin/ez_sql.php";
	$cus=$db->get_row("select * from customer where cus_id=".$_SESSION['cus_id']);
	$country_name=$db->get_var("select name from country where id=".$cus->country);
	$title='Crownsms -  Profile';
	$mid1='<h4>Customer Profile</h4>';
	$mid2='';
	$mid3='';
	$menu15='profile-over.jpg';
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

                <table width="338" align="center" cellpadding="2" cellspacing="2" id="mid_tables">
<tr class="heading">
  <td colspan="2" align="center">Change Profile</td>
</tr>
                          <tr><td width="109" align="right">First Name</td><td width="213"  class="caption"><?=$cus->fname ?></td>
                  </tr>
                          <tr><td align="right">Last Name</td><td  class="caption"><?=$cus->lname ?></td></tr>
                          <tr>
                            <td align="right" >Country</td><td  class="caption"><?=$country_name ?></td></tr>
                          <tr>
                            <td align="right" >City</td>
                            <td  class="caption"><?=$cus->city ?></td>
                          </tr>
                          <tr>
                            <td align="right" >Address</td>
                            <td  class="caption"><?=$cus->address ?></td>
                          </tr>
                          <tr>
                            <td align="right" >Telephone #</td>
                            <td  class="caption"><?=$cus->phone ?></td>
                          </tr>
                          <tr>
                            <td align="right" >Mobile #</td>
                            <td  class="caption"><?=$cus->mobile ?></td>
                          </tr>
                          <tr>
                            <td align="right" >E-mail</td>
                            <td  class="caption"><?=$cus->email ?></td>
                          </tr>
                          <tr>
                            <td colspan="2" align="center" ><input type="button" class="submit" value="Change Profile" onclick="window.location='change_profile.php'" />
                            &nbsp;<input type="button" class="submit" value="Change Password" onclick="window.location='change_password.php'" /> </td>

                          </tr>
                </table>

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
