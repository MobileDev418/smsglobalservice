<?php
	include_once "iscustomer.php";
	include_once "admin/ez_sql.php";
	$cus=$db->get_row("select * from customer where cus_id=".$_SESSION['cus_id']);
	$country_name=$db->get_var("select name from country where id=".$cus->country);
	$heading='Profile';
	/* Displays user profile to customer with options to change profile or to change password */
	$menu=15;
?>
<?php
	include_once "header.php";
?>
<div class="formdiv">
	<div style="width:550px;margin:auto">
    <?php
	echo $_SESSION['profile_action'];
	$_SESSION['profile_action']="";
	?>
        <table cellpadding="0" cellspacing="0" class="grid" width="100%">
        	<tr class="heading"><td colspan="2">Profile</td></tr>
            <tr><td width="109" style="font-weight:bold; text-align:right">First Name:</td><td width="213"  class="caption"><?php echo $cus->fname ?></td></tr>
            <tr><td style="font-weight:bold; text-align:right">Last Name:</td><td  class="caption"><?php echo $cus->lname ?></td></tr>
            <tr><td style="font-weight:bold; text-align:right">Country:</td><td  class="caption"><?php echo $country_name ?></td></tr>
            <tr><td style="font-weight:bold; text-align:right">City:</td><td  class="caption"><?php echo $cus->city ?></td></tr>
            <tr><td style="font-weight:bold; text-align:right">Mobile:</td><td  class="caption"><?php echo $cus->mobile ?></td></tr>
            <tr><td style="font-weight:bold; text-align:right">Sender's ID:</td><td  class="caption"><?php echo $cus->currentsid ?></td></tr>
            <tr><td style="font-weight:bold; text-align:right">E-mail:</td><td  class="caption"><?php echo $cus->email ?></td></tr>
        </table>
        <div class="actionform">
            <input type="button" class="formbutton" value="Change Profile" onclick="window.location='change_profile.php'" />&nbsp;<input type="button" class="formbutton" value="Change Password" onclick="window.location='change_password.php'" />
        </div>
    </div>
</div>
<?php
	include_once "right.php";
	include_once "footer.php";
?>
