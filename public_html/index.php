<?php
session_start();
include_once "library_const.php";
include_once "admin/ez_sql.php";
?>
<!doctype html>
<html>
<head>
<title>SMS254 | SMS Global Services</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="robots" content="index, follow" />
  <meta name="keywords" content="smsglobalservices, sms, Bulk sms,Bulk sms kenya,bulk sms providers in kenya,Short code Kenya, short codes in kenya, sms solution, send sms, free sms " />
  <meta name="description" content="smsglobalservice is an all in one SMS solution system. We are specialized in giving reliable, easy to use and affordable messaging solutions for both corporates and individuals all over the world." />
  <meta name="generator" content="PHP5" />
  <title><?php echo $WEBSITE_NAME." - ". $heading; ?></title>
  
  
  <link rel="stylesheet" href="smsglobalservices/plugins/system/rokbox/themes/light/rokbox-style.css" type="text/css" />
  <link rel="stylesheet" href="smsglobalservices/templates/rt_kinetic_j15/lib/gantry/css/gantry.css" type="text/css" />
  <link rel="stylesheet" href="smsglobalservices/templates/rt_kinetic_j15/lib/gantry/css/grid-12.css" type="text/css" />
  <link rel="stylesheet" href="smsglobalservices/templates/rt_kinetic_j15/lib/gantry/css/joomla.css" type="text/css" />
  <link rel="stylesheet" href="smsglobalservices/templates/rt_kinetic_j15/css/joomla.css" type="text/css" />
  <link rel="stylesheet" href="smsglobalservices/templates/rt_kinetic_j15/css/splitmenu.css" type="text/css" />
  <link rel="stylesheet" href="smsglobalservices/templates/rt_kinetic_j15/css/style1.css" type="text/css" />
  <link rel="stylesheet" href="smsglobalservices/templates/rt_kinetic_j15/css/demo-styles.css" type="text/css" />
  <link rel="stylesheet" href="smsglobalservices/templates/rt_kinetic_j15/css/template.css" type="text/css" />
  <link rel="stylesheet" href="smsglobalservices/templates/rt_kinetic_j15/css/template-firefox.css" type="text/css" />
  <link rel="stylesheet" href="smsglobalservices/templates/rt_kinetic_j15/css/typography.css" type="text/css" />
  <link rel="stylesheet" href="css/contents.css" type="text/css" />
 <link href="css/style.css" rel="stylesheet" type="text/css">
  <link href="css/mobile.css" rel="stylesheet" type="text/css">
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
  <link href="css/meanmenu.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="js/default.js"></script>
  <script type="text/javascript" src="smsglobalservices/media/system/js/mootools.js"></script>
 <script type="text/javascript" src="smsglobalservices/media/system/js/caption.js"></script>
  <script type="text/javascript" src="smsglobalservices/plugins/system/rokbox/rokbox.js"></script>
  <script type="text/javascript" src="smsglobalservices/plugins/system/rokbox/themes/light/rokbox-config.js"></script>

  <script type="text/javascript" src="smsglobalservices/templates/rt_kinetic_j15/js/gantry-pillanim.js"></script>
  <script type="text/javascript" src="smsglobalservices/templates/rt_kinetic_j15/lib/gantry/js/gantry-buildspans.js"></script>
  <script type="text/javascript" src="smsglobalservices/templates/rt_kinetic_j15/lib/gantry/js/gantry-inputs.js"></script>
  <script type="text/javascript">
		function rigerter(){
			var x = document.getElementById("pass1").value;
			var y = document.getElementById("pass2").value;
			if(x == null || x == "" || y == null || y == ""){
				return false;
			}else{
				document.getElementById("pass2").focus();
			}
		}
		window.addEvent('domready', function() {
			var count = 0;
				$$('table.grid tr').each(function(el) {
					if(count==0)
					{
						el.addClass('heading');
						count++;
					}
					else
						el.addClass(count++ % 2 == 0 ? 'row1' : 'row2');
					});
		});
	
	</script>
  <script type="text/javascript">
var rokboxPath = 'smsglobalservices/plugins/system/rokbox/';
			window.addEvent('domready', function() {
				var modules = ['rt-block'];
				var header = ['h3','h2','h1'];
				GantryBuildSpans(modules, header);
			});
		
InputsExclusion.push('.content_vote')
window.addEvent('domready', function() {new GantryPill('ul.menutop', {duration: 250, transition: Fx.Transitions.Sine.easeOut, color: false})});
window.addEvent('domready', function() {new GantryPill('#rt-submenu2', {duration: 250, transition: Fx.Transitions.Sine.easeOut, color: '#285B90'})});
  </script>
</head>
	<body  class=" ">
    <?php /* ?>
		backgroundlevel-high bodylevel-high cssstyle-style1 showcase-color2 articletitle-color1 font-family-helvetica font-size-is-default menu-type-splitmenu col12 feb10-home
	<?php */ ?>
    	<section id="header-section" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 header-left">
                        <a href="index.php"><img src="images/logo.png" alt="img"></a>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 header-right">
						
                        <?php if($_SESSION['cus_login']=='yes' || $_SESSION['cus_activated']=='yes'): ?>
                        	<!--<div class="form-box"> -->
							<!--<div class="col-lg-5 col-md-6 col-sm-6 col-xs-12 header-right">-->
									<?php
										$cus=$db->get_row("select credits, balance, credits_used, free_sms  from customer where cus_id=".$_SESSION['cus_id']);
									?>
                                    <div class="form-box">
										<div class="col-md-3"><h2 class="title">Welcome <?php echo $_SESSION['cus_uname']; ?></h2></div>
										<div class="col-md-3"><em class="color">Credit Alloted: </em><?php echo $cus->credits; ?></div>
										<div class="col-md-3"><em class="color">Credit Used: </em><?php echo $cus->credits_used; ?></div>
										<div class="col-md-3"><em class="color">Balance: </em><?php echo $cus->balance; ?></div>
										<!--<div style="position:relative; top:0; left:0;">-->
													
									<!--<h2 class="title">Welcome <?php echo $_SESSION['cus_uname']; ?></h2>-->
									<?php /* 
										$cus=$db->get_row("select credits, balance, credits_used, free_sms  from customer where cus_id=".$_SESSION['cus_id']);
										echo '<em class="color">Credit Alloted: </em>'.$cus->credits;
										echo '<em class="color"><br/>Credit Used: </em>'.$cus->credits_used;
										echo '<em class="color"><br/>Balance: </em>'.$cus->balance;
										/*if($cus->buy_status==0)
										{
											echo '<em class="color"><br/>Todays Free SMS: </em>'.$cus->free_sms;
										}*/	
									?>
								</div> 
                               
                            </div>
                        <?php else: ?>
                        	<div class="form-box">
                                <?php echo $_SESSION['login_err']; $_SESSION['login_err']=""; ?>
                                <form class="form-inline" action="cus_signin.php" method="post" name="login" id="form-login">
                                    <div class="form-group">
                                        <input id="modlgn_username" type="text" name="username" class="form-control" placeholder="Account Number" />
                                    </div>
                                    <div class="form-group">
                                        <input id="modlgn_passwd" type="password" name="password" class="form-control" placeholder="password">
                                    </div>
                                    <input type="hidden" name="option" value="com_user" />
                                    <input type="hidden" name="task" value="login" />
                                    <input type="hidden" name="return" value="L3Ntc2dsb2JhbHNlcnZpY2VzLw==" />
                                    <input type="hidden" name="d87a362f13cbb350aaf437fb715c9597" value="1" />
                                    <button type="submit" name="Submit" class="btn btn-success">Log in</button><br>
                                    <div class="form-group" >
                                    	<p class="help-block">                                        	
                                            <a href="activate_code.php">Activate your account</a>&nbsp;&nbsp;
                                            <a href="recoverpassword.php">Forgot Password</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
			<div class="header-shadow">&nbsp;</div>
        </section>
		<div class="sub_menu_title" style="text-align:right">
			<!--h2 class="title">User Menu</h2-->
			<ul class="menu_items">
				<li style="margin:0 10px" class="item9 <?php
					if($menu==9)
						echo "active";
					else
						echo "parent";
					 ?>" ><a class="orphan item" href="send_sms.php"><span>Send SMS</span></a>
				</li>
				<li class="item10 <?php
					if($menu==10)
						echo "active";
					else
						echo "parent";
					 ?>" ><a class="orphan item" href="sms_history.php"><span>Delivery Report</em></span></a>
				</li>
				<li class="item11 <?php
					if($menu==11)
						echo "active";
					else
						echo "parent";
					 ?>" ><a class="orphan item" href="sms_q.php"><span>SMS in Queue</em></span></a>
				</li>	
				<li class="item12 <?php
					if($menu==4)
						echo "active";
					else
						echo "parent";
					 ?>" ><a class="orphan item" href="buynow.php"><span>Purchase SMS</span></a>
				</li>
				<li class="item13 <?php
					if($menu==13)
						echo "active";
					else
						echo "parent";
					 ?>" ><a class="orphan item" href="groups.php"><span>Groups</em></span></a>
				</li>
				<li class="item14 <?php
					if($menu==14)
						echo "active";
					else
						echo "parent";
					 ?>" ><a class="orphan item" href="contacts.php"><span>Contacts</em></span></a>
				</li>
				<li class="item15 <?php
					if($menu==15)
						echo "active";
					else
						echo "parent";
					 ?>" ><a class="orphan item" href="profile.php"><span>My Profile</em></span></a>
				</li>	
				<li class="item16 <?php
					if($menu==16)
						echo "active";
					else
						echo "parent";
					 ?>" ><a class="orphan item" href="change_password.php"><span>Change Password</em></span></a>
				</li>		
				<li class="item17" ><a class="orphan item" href="cus_signout.php" onclick="return confirm('Are you sure to Log out?')"><span>Log Out</span></a></li>
 
 
			</ul>
		</div>
        <div class="mobile-menu"></div>
        <section id="nav-section" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="navi">
                            <ul>
                                <li class="item1 <?php
                                                if($menu==1 || $menu==0)
                                                    echo "active";
                                                else
                                                    echo "parent";
                                    ?>" ><a class="orphan item" href="index.php">Home</a>
                                </li>	
                                <li class="item2 <?php
                                                if($menu==2)
                                                    echo "active";
                                                else
                                                    echo "parent";
                                 ?>" ><a class="orphan item subtext" href="aboutus.php">About Us</a>
                                </li>	
                                <li class="item3 <?php
                                                if($menu==3)
                                                    echo "active";
                                                else
                                                    echo "parent";
                                 ?>" >
                                <a class="orphan item subtext" href="services.php">Services</a>
                                </li>
                                <li class="item4 <?php
                                                if($menu==4)
                                                    echo "active";
                                                else
                                                    echo "parent";
                                 ?>" >
                                <a class="orphan item subtext" href="buynow.php" >Pricing</a>
                                </li>	
                                <li class="item5 <?php
                                                if($menu==5)
                                                    echo "active";
                                                else
                                                    echo "parent";
                                 ?>" >
                                <a class="orphan item subtext" href="catalogue.php">Catalogue</a>
                                </li>
                                <li class="item6 <?php
                                                if($menu==6)
                                                    echo "active";
                                                else
                                                    echo "parent";
                                 ?>" >
                                <a class="orphan item subtext" href="faq.php">FAQ</a>
                                </li>
                                <li class="item7 <?php
                                                if($menu==7)
                                                    echo "active";
                                                else
                                                    echo "parent";
                                 ?>" >
                                 <a class="orphan item subtext" href="contactus.php">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php if($menu!=1){?>
        <section id="banner-section" class="section">
    		<div class="banner-box">
				<object align="middle" width="100%" height="250" id="flash" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">
					<param value="flash.swf" name="movie">
					<param value="high" name="quality">
					<param value="#3f7cbe" name="bgcolor">
					<param value="true" name="play">
					<param value="true" name="loop">
					<param value="transparent" name="wmode">
					<param value="showall" name="scale">
					<param value="true" name="menu">
					<param value="false" name="devicefont">
					<param value="" name="salign">
					<param value="sameDomain" name="allowScriptAccess">
					<!--[if !IE]>-->
					<object width="100%" height="250" data="flash.swf" type="application/x-shockwave-flash">
						<param value="flash.swf" name="movie">
						<param value="high" name="quality">
						<param value="#3f7cbe" name="bgcolor">
						<param value="true" name="play">
						<param value="true" name="loop">
						<param value="transparent" name="wmode">
						<param value="showall" name="scale">
						<param value="true" name="menu">
						<param value="false" name="devicefont">
						<param value="" name="salign">
						<param value="sameDomain" name="allowScriptAccess">
					<!--<![endif]-->
						<a href="http://www.adobe.com/go/getflash">
							<img alt="Get Adobe Flash player" src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif">
						</a>
					<!--[if !IE]>-->
					</object>
                    <!--<![endif]-->
                </object>
                    <?php /*?><img src="images/banner1.jpg" alt="SMS254" class="banner"/><?php */?>
            	
            </div>
			<!--<div class="banner-shadow">&nbsp;</div>-->
        </section>
        <?php } ?>
		 
<?php if($menu!=1){?>
<section id="content-section" class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="content-box">
<?php } ?>

<?php if($_SESSION['cus_login']!='yes'){ ?>
<p class="style2">Do you have announcements or reminders to make and need a fast, efficient solution to reach all your customers with a single click? Fill the form below to register your free bulk sms account and get 5 free sms to test our service.</p>
<div class="formdiv">
 <div class="note"><div class="typo-icon style1">Put mobile number in international format. Eg. 254733657122, 4477916745</div>
 </div>
    <form method="post" name="cus_reg" action="get_registeredd.php" onsubmit="return validRegForm()" >
        <table id="reg_form" >
        <!--<tr><td colspan="3" align="left"><pre>* Indicates the required fields</pre></td></tr>
        <tr>-->
            <td width="195" align="right" >FIRST NAME <span class="red">*</span></td>
             <td width="207"  align="left"><input name="fname" type="text" class="text" id='name' value="<?php echo $_SESSION['fnm']; ?>" maxlength="150" /></td>
            <td width="222"  align="left"><span class="invalid" id='er_name'><img src="images/cross.png" alt=""></span></td>
        </tr>
        <!--<tr>
            <td align="right" >LAST NAME </td>
            <td  align="left"><input name="lname" type="text" class="text" id='lname' value="<?php echo $_SESSION['lnm']; ?>" maxlength="150" /></td>
            <td align="left">&nbsp;</td>
        </tr>-->
        <tr>
            <td align="right" >USER NAME <span class="red">*</span><br /></td>
            <td align="left"><input name="username" type="text" class="text" id='username' value="<?php echo $_SESSION['unm']; ?>" maxlength="150" /></td>
            <td align="left"><?php echo $_SESSION['ufound']; ?><span class="invalid" id='uname_er'><img src="images/cross.png" alt=""></span></td>
        </tr>
        <tr>
            <td align="right" >PASSWORD <span class="red">*</span><br /></td>
            <td align="left"><input name="pass1" type="password" class="text" id='pass1' maxlength="150" value="<?php echo $_SESSION['password']; ?>" /></td>
            <td align="left"><span class="invalid" id='pass1_er'><img src="images/cross.png" alt=""></span></td>
        </tr>
        <tr>
            <td align="right" >CONFIRM PASSWORD <span class="red">*</span><br /></td>
            <td align="left"><input name="pass2" type="password" class="text" id='pass2' maxlength="150" value="<?php echo $_SESSION['password']; ?>" /></td>
            <td align="left"><span class="invalid" id='pass2_er'><img src="images/cross.png" alt=""></span></td>
        </tr>
        <tr>
            <td align="right">COUNTRY <span class="red">*</span></td>
            <td align="left"><label></label>
                <select name="country" class="text" id="country">
                    <option value='0' >Select Your Country</option><?php echo $country_list; ?>
                </select>
            </td>
             <td align="left"><span class="invalid" id='country_er'><img src="images/cross.png" alt=""></span></td>
        </tr>
        <!--<tr>
            <td align="right" >CITY</td>
            <td align="left"><input name="city" type="text" class="text" id='city' value="<?php echo $_SESSION['cty']; ?>" maxlength="150" /></td>
            <td align="left">&nbsp;</td>
        </tr>
        <tr>
            <td align="right" >ADDRESS</td>
            <td align="left"><input name="address" type="text" class="text" id='address' value="<?php echo $_SESSION['ady']; ?>" maxlength="150" /></td>
            <td align="left">&nbsp;</td>
        </tr>-->
        <!--<tr>
            <td align="right" >TELEPHONE NUMBER <span class="red">*</span></td>
            <td align="left"><input name="ph" type="text" class="text" id='ph' onkeypress="return isNumberKey(event)" value="<?php echo $_SESSION['phy']; ?>" maxlength="25" /></td>
            <td align="left"><span class="invalid" id='ph_er'><img src="images/cross.png" alt=""></span></td>
        </tr>-->
        <tr>
            <td align="right" >MOBILE NUMBER <span class="red">*</span></td>
            <td align="left"><input name="cell" type="text" class="text" id='cell' onkeypress="return isNumberKey(event)" value="<?php echo $_SESSION['cell']; ?>" maxlength="25" /></td>
            <td align="left"><?php echo $_SESSION['mobfound']; ?><span class="invalid" id='cell_er'><img src="images/cross.png" alt=""></span></td>
        </tr>
        <tr>
              <td align="right" >E-MAIL <span class="red">*</span></td>
              <td align="left"><input name="email" type="text" class="text" id='email' value="<?php echo $_SESSION['eml']; ?>" maxlength="150" /></td>
              <td align="left"><?php echo $_SESSION['mail_found']; ?> <span class="invalid" id='email_er'><img src="images/cross.png" alt=""></span></td>
        </tr>
        <tr>
                <td align="right" valign="top">SECURITY CODE<span class="red"> *</span></td>
                <td align="left"><input name="code" type="text" class="text" id="code" />
                <br />
                <img src="CaptchaSecurityImages.php?width=205&height=30&characters=6" style="margin-top:5px"/></td>
                <td align="left" valign="top"><?php echo $_SESSION['ucode']; ?><span class="invalid" id='code_er'><img src="images/cross.png" alt=""></span></td>
        </tr>
        <tr>
                <td align="left" colspan="2" style="padding-left:45px">TERMS &amp; CONDITIONS</td>
                <td align="left"></td>
        </tr>
        <tr><td></td>
                <td colspan="2" >
                
                <div style="height:200px; width:400px; overflow:scroll;border:1px solid #CCC;padding:5px; text-align:justify">
                <p><em class="color">SENDING AND DELIVERY OF SMS MESSAGES</em><br/>
               <?php echo $WEBSITE_NAME; ?> will, when indicated as functional by System Status, send each SMS message to one of our SMS gateways for delivery to the relevant network, provided no error is displayed to suggest that this will not be done. smsglobalservices guarantees that under these circumstances all messages are SENT. However, delivery is the responsibility of third party networks and services, including the receiving device itself, and cannot be guaranteed. When you click send and you see message sent, then your message has been sent.</p>
                <p>If you find this information to be incorrect, then providing us with full details of the message and confirmation code will allow us to investigate the problem with individual networks. Delivery confirmation may only be available at certain times.</p>
                <p><em class="color">MESSAGE CONTENT</em><br />          
                Use of <?php echo $WEBSITE_NAME; ?> service in sending abusive messages can be traced to the originator upon request from the Police and they will be liable to prosecution under the 1998 Malicious Communications Act. <?php echo $WEBSITE_NAME; ?> is not responsible for content of messages sent by users of the service. <?php echo $WEBSITE_NAME; ?> will co-operate with official inquiries into misuse of the service. You agree not to send abusive or defamatory messages through this service. Spam/unsolicited messages and bulk advertising through this service is not permitted. Messages containing sexual content are not permitted. Each message must be unique in content and purposeful, and may contain up to the permitted amount of characters.</p>
    
               <p><em class="color"> ADVERTISING/SPONSORSHIP</em><br />
                All Advert shown on <?php echo $WEBSITE; ?> are mainstream and not offensive. If you see an advert that does offend you, it is important that you contact us, so we can have it removed.</p>
                
                <p><em class="color">THIS DOCUMENT</em><br />
                By using this service you agree to be bound by the Terms and Conditions.<?php echo $WEBSITE_NAME; ?> may change these terms and conditiions at any time, and shall become effective immediately upon posting to this page.</p>
                </div>
                </td>
        </tr>
        <tr><td></td>
            <td align="left" colspan="3" class="orange" ><input type="checkbox" value="yes" name="reg_accept" id="reg_accept" onclick="enable_disable(this)" />    		I accept these terms and conditions</td>
        </tr>
        <tr>
          <td align="right" >&nbsp;</td>
          <td align="center"><input name="New" type="submit" class="formbutton" value="Register" id="register" disabled="disabled" style="color:#CCC" />
          &nbsp; <input type="button" class="formbutton" onClick="window.location='index.php'" value="Cancel" /></td>
          <td align="left">&nbsp;</td>
        </tr>
        
    
    <?php
    $_SESSION['fnm']="";
    $_SESSION['lnm']="";
    $_SESSION['unm']="";
    $_SESSION['cty']="";
    $_SESSION['ady']="";
    $_SESSION['phy']="";
    $_SESSION['cell']="";
    $_SESSION['eml']="";
    $_SESSION['cont_code']="";
    $_SESSION['ucode']="";
    $_SESSION['ufound']="";
    $_SESSION['mobfound']="";
    $_SESSION['mail_found']="";
	$_SESSION['password']="";
    ?>
    
    </table>
    </form>
</div>
<?php
include_once "right.php"; 
include_once "footer.php";
?>
<?php } ?>
