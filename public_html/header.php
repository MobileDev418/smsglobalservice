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
			<?php if($_SESSION['cus_login']=='yes' || $_SESSION['cus_activated']=='yes'): ?>
				<div class="header-shadow">&nbsp;</div>
			<?php endif;?>
        </section>
		<?php if($_SESSION['cus_login']=='yes' || $_SESSION['cus_activated']=='yes'): ?>
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
		<?php endif;?>
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
            	<!--<div class="banner-shadow">&nbsp;</div>-->
            </div>
        </section>
        <?php } ?>
    <?php /* ?>
        <div class="rt-container">
        	<div id="rt-drawer">
            	<div class="clear"></div>
			</div>
            <div class="rt-surround-top"></div>
            <div class="rt-surround">
            	<div id="rt-header">
                	<div class="rt-grid-3 rt-alpha">
                    	<div class="rt-block" style="padding:5px 0px 0px 0px;">
                        	<a href="http://smsglobalservice.com" id="rt-logo"></a>
                        </div>
                    </div>

                <div class="rt-grid-9 rt-omega">
                	<ul class="menutop level1" style="padding-left:40px;"  >
                    	<li class="item1 <?php
										if($menu==1 || $menu==0)
											echo "active";
										else
											echo "parent";
						 	?>" ><a class="orphan item" href="index.php"><span>Home</span></a>
                        </li>	
                        <li class="item2 <?php
										if($menu==2)
											echo "active";
										else
											echo "parent";
						 ?>" ><a class="orphan item subtext" href="aboutus.php"><span>About Us<em>SMS provider</em></span></a>
                        </li>	
						<li class="item3 <?php
										if($menu==3)
											echo "active";
										else
											echo "parent";
						 ?>" >
                        <a class="orphan item subtext" href="services.php"><span>Services<em>reliable</em></span></a>
                        </li>
                        <li class="item4 <?php
										if($menu==4)
											echo "active";
										else
											echo "parent";
						 ?>" >
                        <a class="orphan item subtext" href="buynow.php" ><span>Pricing<em>afordable</em></span></a>
                        </li>	
                        <li class="item5 <?php
										if($menu==5)
											echo "active";
										else
											echo "parent";
						 ?>" >
                        <a class="orphan item subtext" href="catalogue.php"><span>Catalogue<em>download</em></span></a>
                        </li>
                        <li class="item6 <?php
										if($menu==6)
											echo "active";
										else
											echo "parent";
						 ?>" >
                        <a class="orphan item subtext" href="faq.php"><span>FAQ<em>? answered</em></span></a>
                        </li>
                        <li class="item7 <?php
										if($menu==7)
											echo "active";
										else
											echo "parent";
						 ?>" >
                         <a class="orphan item subtext" href="contactus.php"><span>Contact Us<em>available 24/7</em></span></a>
                        </li>
                    </ul>
	            </div>
                <div class="clear"></div>
			</div>
			<div id="rt-showcase">
				<div class="rt-header-spacer"></div>
					<div class="rt-grid-12 rt-alpha rt-omega">
                    	<div class="rt-block">
                        	<div class="module-content">
                            	<div class="module-inner">
                                	<!--<div id="rokstories-45" class="rokstories-layout2">-->
                                    <div style="height: 250px; width: 100%; text-align: center;">
                                    <?php if($menu==1)
									{
									 ?>
                                    <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="920" height="250" id="flash" align="middle">
                                        <param name="movie" value="flash.swf" />
                                        <param name="quality" value="high" />
                                        <param name="bgcolor" value="#3f7cbe" />
                                        <param name="play" value="true" />
                                        <param name="loop" value="true" />
                                        <param name="wmode" value="transparent" />
                                        <param name="scale" value="showall" />
                                        <param name="menu" value="true" />
                                        <param name="devicefont" value="false" />
                                        <param name="salign" value="" />
                                        <param name="allowScriptAccess" value="sameDomain" />
                                        <!--[if !IE]>-->
                                        <object type="application/x-shockwave-flash" data="flash.swf" width="920" height="250">
                                            <param name="movie" value="flash.swf" />
                                            <param name="quality" value="high" />
                                            <param name="bgcolor" value="#3f7cbe" />
                                            <param name="play" value="true" />
                                            <param name="loop" value="true" />
                                            <param name="wmode" value="transparent" />
                                            <param name="scale" value="showall" />
                                            <param name="menu" value="true" />
                                            <param name="devicefont" value="false" />
                                            <param name="salign" value="" />
                                            <param name="allowScriptAccess" value="sameDomain" />
                                        <!--<![endif]-->
                                            <a href="http://www.adobe.com/go/getflash">
                                                <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
                                            </a>
                                        <!--[if !IE]>-->
                                        </object>
                                        <!--<![endif]-->
                                    </object>
									<?php
									}
									else
									{
										?>
                                        <img src="images/banner1.jpg" alt="smsglobalservices"  />
                                        <?php
									}
									?>
                                    </div>
                                	<!--</div>-->		
                                </div>
							</div>
						</div>  	
					</div>
					<div class="clear"></div>
				</div>
		<div id="rt-main-divider"></div>
			<div id="rt-main-surround">
				<div id="rt-main" class="mb9-sa3">
                	<div class="rt-main-inner">
                    	<div class="rt-grid-9 ">
                        	<div class="rt-block">
								<div id="rt-mainbody">                             
									<div class="rt-joomla ">
										<div class="rt-article">
                                        	<div class="rt-headline"><h1 class="rt-article-title"><?php echo $heading; ?></h1></div>
                                            <div class="clear"></div>
											<?php */?>
<?php if($menu!=1){?>
<section id="content-section" class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="content-box">
<?php } ?>