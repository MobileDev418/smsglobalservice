<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$title;?></title>
<link rel="stylesheet" type="text/css" href="style/sms-style.css"  />
<link rel="shortcut icon" href="favicon.ico" />
<script language="javascript" src="headimgscript.js"></script>
<script type="text/javascript" src="js/default.js"></script>
</head>

<body onload="MM_preloadImages('images/home-over.jpg','images/about-over.jpg','images/services-over.jpg','images/pricing-over.jpg','images/faq-over.jpg','images/order.jpg','images/contact-over.jpg','images/login-over.jpg','images/register-over.jpg','images/register-over.jpg','images/sms-over.jpg','images/groups-over.jpg','images/balance-over.jpg','images/history-over.jpg','images/logout-over.jpg','images/contactsms.jpg','images/groupsms.jpg','images/singlesms.jpg','images/bulksms.jpg', 'images/smsinq-over.jpg')">


<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="66%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="74%" valign="top"><img src="images/crownsms-logo.jpg" alt="Crown SMS - Home" width="308" height="118" /></td>
            <td width="26%" rowspan="2" align="center" valign="top"><img src="images/top-lady.jpg" alt="crown" width="105" height="238" /></td>
          </tr>

          <tr>
            <td height="196" valign="bottom"><table width="65%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="25%"><a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('home','','images/home-over.jpg',1)"><img src="images/<?=$menu1; ?>" alt="Home" name="home" width="119" height="61" border="0" id="home" /></a></td>
                <td width="25%"><a href="aboutus.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('about us','','images/about-over.jpg',1)"><img src="images/<?=$menu2; ?>" alt="About Us" name="about us" width="118" height="61" border="0" id="about us" /></a></td>
                <td width="25%"><a href="services.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('services','','images/services-over.jpg',1)"><img src="images/<?=$menu3; ?>" alt="Services" name="services" width="120" height="61" border="0" id="services" /></a></td>
                <td width="25%"><a href="pricing.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('pricing','','images/pricing-over.jpg',1)"><img src="images/<?=$menu4; ?>" alt="Pricing" name="pricing" width="119" height="61" border="0" id="pricing" /></a></td>
              </tr>
            </table></td>

          </tr>
          <tr>
            <td height="30" colspan="2" valign="bottom"><?=$mid1; ?></td>
            </tr>
          <tr>
            <td colspan="2" valign="top" class="bodyText"><?=$mid2; ?></td>
            </tr>
          <tr>

            <td height="5" colspan="2" align="right" valign="bottom"><?=$mid3; ?></td>
          </tr>
        </table></td>
        <td width="34%" align="right" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="images/sms-clock.jpg" name="PictureBox" width="333" height="425" border="0" id="PictureBox" /></td>
              </tr>
              <tr>                <td id="CaptionBox" class="imgtopbg"align="center"></td>

              </tr>
              <?php
			  	if($img_sms==true)
							     echo '<tr><td align="center"><img src="images/sys-cell.jpg" alt="system to cell" width="102" height="56" /></td></tr>';
			?>
          </table></td>
      </tr>
    </table></td>
     </tr>
  <tr>

    <td align="right">
    <?php if($_SESSION['cus_login']!="yes")
		{
	?>
    
    <table width="47%" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td width="11%"><a href="faq.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('faq','','images/faq-over.jpg',1)"><img src="images/<?=$menu5; ?>" alt="FAQ" name="faq" width="107" height="30" border="0" id="faq" /></a></td>
        <td width="11%"><a href="order.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('order','','images/order-over.jpg',1)"><img src="images/<?=$menu6; ?>" alt="Order" name="order" width="109" height="30" border="0" id="order" /></a></td>
        <td width="11%"><a href="contact.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('contact','','images/contact-over.jpg',1)"><img src="images/<?=$menu7; ?>" alt="Contact Us" name="contact" width="109" height="30" border="0" id="contact" /></a></td>
        <td width="11%"><a href="login.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('login','','images/login-over.jpg',1)"><img src="images/<?=$menu8; ?>" alt="Login" name="login" width="109" height="30" border="0" id="login" /></a></td>
        <td width="56%"><a href="register.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('reg','','images/register-over.jpg',1)"><img src="images/<?=$menu9; ?>" alt="register" name="reg" width="112" height="30" border="0" id="reg" /></a></td>
      </tr>
    </table>
    <?php
	}
	else
	{
	?>
		<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
      <td width="70%" align="left" class="caption" style="font-weight:bold">Hi, <?=$_SESSION['cus_uname'];?></td>


      <td width="10%"><a href="send_sms.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('sms','','images/sms-over.jpg',1)"><img src="images/<?=$menu10; ?>" name="sms" width="109" height="30" border="0" id="sms" /></a></td>
    
        <td width="8%"><a href="contacts.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('contacts','','images/contacts-over.jpg',1)"><img src="images/<?=$menu11; ?>" name="contacts" width="109" height="30" border="0" id="contacts" /></a></td>
        <td width="8%"><a href="groups.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('groups','','images/groups-over.jpg',1)"><img src="images/<?=$menu12; ?>"  name="groups" width="109" height="30" border="0" id="groups" /></a></td>
        <td width="8%"><a href="balance.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('balance','','images/balance-over.jpg',1)"><img src="images/<?=$menu13; ?>" name="balance" width="109" height="30" border="0" id="balance" /></a></td>
        <td width="8%"><a href="sms_history.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('history','','images/history-over.jpg',1)"><img src="images/<?=$menu14; ?>"  name="history" width="109" height="30" border="0" id="history" /></a></td>
        <td width="8%"><a href="profile.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('profile','','images/profile-over.jpg',1)"><img src="images/<?=$menu15; ?>"  name="profile" width="109" height="30" border="0" id="profile" /></a></td>
              <td width="10%"><a href="sms_q.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('smsinq','','images/smsinq-over.jpg',1)"><img src="images/<?=$menu16; ?>" name="smsinq" width="109" height="30" border="0" id="smsinq" /></a></td>
              
        <td width="8%"><a href="cus_signout.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('logout','','images/logout-over.jpg',1)" onclick="return confirm('Are Your sure to log out?')"><img src="images/logout.jpg" name="logout" width="109" height="30" border="0" id="logout" /></a></td>
      </tr>
    </table>
    <?php
	}
	?>
    
    
    </td>

  </tr>