<?php
$menu=5;
$heading="Catalogue";
/* A simple contents page */
?>
<?php
include_once "header.php";
?>
<h1><?php echo $heading; ?> </h1>
<pre>INSTALLATION AND USER MANUAL FOR <?php echo $WEBSITE ?> WEB INTERFACE</pre>
<h3>Introduction</h3>
<h4>What is SMS </h4>
<p>SMS stands for Short Message Service. A "Short Message" may contain up to 7 Bit 160 characters or 140 octets of binary data. A message in the format of normal text, custom ring tones and graphics and operator logos that appear directly on screen is called flash message </p>
<p><?php echo $WEBSITE ?> is a unique Short Message Service (SMS) messaging tool. It facilitates complete messaging capabilities over the GSM networks via HTTP, web interface. Also using our web interface the user can send single, group or bulk sms using any browser.</p>
<p><?php echo $WEBSITE ?> Web Interface also supports the sending of message in the format of Normal text, Unicode and Flash to individual or groups of destinations directly from Web Interface.</p>
<h3>Getting Started : User Account</h3>
<p>There is no need to install any software to your computer. To send sms, the client can either:-</p>
<ul class="bullet-4">
	<li>Click on link Send Sms provided.</li>
    <li>Login to his/her account from http://www.<?php echo $WEBSITE_NAME ?></li>
    <li></li>
    <li></li>
</ul>
<h3>User Interface Specifications: </h3>
<h4>1. Send Single Message</h4>
a. Mobile No. destination mobile number, start with country code. E.g 255732675469<br />
b. Message User can add his message to be sent to the receipient. Simple text<br />
message contains maximum 160 characters.<br />
c. Message Type : Messages are of mainly two types<br />
i) Normal Text ,<br />
ii) Flash<br />
d. Send Single Message As soon as user clicks on this button, message will be
send immediately to the destination mobile number. <br />




<div class="note"><div class="typo-icon">Every effort has been made to ensure that the information in this manual is accurate and complete. The software described in this document is protected by copyright, and may not be copied on any medium except as specifically authorized in the license or non-disclosure agreement</div></div>

<?php
include_once "right.php";
?>
<?php
include_once "footer.php";
?>