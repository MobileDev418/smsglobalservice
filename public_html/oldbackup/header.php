<?php
session_start();
include_once "library_const.php";
include_once "admin/ez_sql.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" >
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="robots" content="index, follow" />
  <meta name="keywords" content="smsglobalservices, sms, sms solution, send sms, free sms " />
  <meta name="description" content="Joomla! - the dynamic portal engine and content management system" />
  <meta name="generator" content="SMSAbby is an all in one SMS solution system. We are specialized in giving reliable, easy to use and affordable messaging solutions for both corporates and individuals all over the world." />
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
    
  <style type="text/css">
    <!--
#rt-main-surround ul.menu li.active > a, #rt-main-surround ul.menu li.active > .separator, #rt-main-surround ul.menu li.active > .item, h2.title span, #rt-submenu ul.menu li.active > .item, #rt-submenu .nopill ul.menu li > .item:hover, .menutop li.root:hover > .item, .menutop li.root.f-mainparent-itemfocus > .item, .menu-type-splitmenu .menutop li:hover .item {color:#285B90;}
a, body .menutop .nolink, #rt-main-surround ul.menu a:hover, #rt-main-surround ul.menu .separator:hover, #rt-main-surround ul.menu .item:hover {color:#285B90;}
    -->
  </style>
  <script type="text/javascript" src="js/default.js"></script>
  <script type="text/javascript" src="smsglobalservices/media/system/js/mootools.js"></script>
 <script type="text/javascript" src="smsglobalservices/media/system/js/caption.js"></script>
  <script type="text/javascript" src="smsglobalservices/plugins/system/rokbox/rokbox.js"></script>
  <script type="text/javascript" src="smsglobalservices/plugins/system/rokbox/themes/light/rokbox-config.js"></script>

  <script type="text/javascript" src="smsglobalservices/templates/rt_kinetic_j15/js/gantry-pillanim.js"></script>
  <script type="text/javascript" src="smsglobalservices/templates/rt_kinetic_j15/lib/gantry/js/gantry-buildspans.js"></script>
  <script type="text/javascript" src="smsglobalservices/templates/rt_kinetic_j15/lib/gantry/js/gantry-inputs.js"></script>
 
   <script type="text/javascript">
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
	<body  class="backgroundlevel-high bodylevel-high cssstyle-style1 showcase-color2 articletitle-color1 font-family-helvetica font-size-is-default menu-type-splitmenu col12 feb10-home">
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
                        <a class="orphan item subtext" href="pricing.php" ><span>Pricing<em>afordable</em></span></a>
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