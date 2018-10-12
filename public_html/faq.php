<?php
$menu=6;
$heading="Frequently Asked Questions";
?>
<?php
include_once "header.php";
?>
<h1><?php echo $heading; ?> </h1>
<img src="images/faq.jpg" alt="FAQ" align="right" />
<ol class="bullet-1">
	<li><em class="color">I need a brief info about SMSGobalServices?</em><br>
		 A.Go to www.smsglobalservice.com</li>
    <li><em class="color">What are the services available with you?</em><br>
          A. Please visit <a href="services.php">www.smsglobalservice.com/services</a>.php</li>
    <li><em class="color">where can I get registered to use <?php echo $WEBSITE; ?> services?</em><br>

              A. <a href="register.php">www.smsglobalservives.com/register.php</a></li>
            <li><em class="color">What is the range of <?php echo $WEBSITE; ?> coverage area?</em><br>
              Our coverage spans over 600 networks in 200 plus countries across the globe. (for now you can only send sms to mobile phone within Nigeria, once other countries are available we will let you know).</em><br>
              Can I send message to anyone for my product advertisement or any such purpose?</em><br>
              A. Yes, u can use this service for your advertisement by sending messages to your customers as well.</li>

            <li><em class="color">Can I use this service for sending messages on my products or services info, advertisement or any such purpose to my customers or intending customers?</em><br>

              A. Yes, you can. This service is meant for you.</li>
            <li><em class="color">What is sender ID? How do I set them?</em><br>
              A. Before you start sending SMS, you need to set your name or number which would be displayed on the receiver's mobile phone. You can set any number or name (not more then 11 characters) such as your GSM ID which belongs to you. The sender ID can be set in the sender tab of our web interface or desktop application.</li>
            <li><em class="color">Can I send SMS with alphanumeric sender ID?</em><br>

              A. Yes, you can send SMS with an alphanumeric sender ID? Except to CDMA mobiles because they do not support alphanumeric sender ID.</li>

            <li><em class="color">              Can I send special characters in SMS?</em><br>
              A. Yes, you can send any special character of a US Keyboard. </li>
            <li><em class="color">  What are the payment methods supported by <?php echo $WEBSITE; ?>?</em><br>
              A. We currently accept cash and cheque deposits into our bank account. However plans are ongoing to accept online payments.</li>

            <li><em class="color">  What is your payment mode?</em><br>

              A. Pre Paid and Post Paid payment modes are available.</li>
            <li><em class="color">What is the minimum SMS credit?</em><br>
              A. The minimum SMS credit you can purchase is 50 credits.</li>
            <li><em class="color">How do I know whether <?php echo $WEBSITE; ?> is appropriate for me?</em><br>

              A. Go to www.<?php echo $WEBSITE_NAME; ?>/clients for testimonies from our clients that have tried our services.</li>
            <li><em class="color"> Why do messages at times get delayed reaching their destinations?</em><br>

              A. There are many reasons for delay like either the receiver has switched off his or her Mobile or the mobile is out of range. 
              If I have set my mobile number as Sender ID</li>
            <li><em class="color">  will the messages sent displaying my number be charged against my account with my mobile operator?</em><br>
              A. No the bills will be charged against the credits that would be provided by <?php echo $WEBSITE; ?>.</li>

            <li><em class="color"> Why do I need a username and password with my <?php echo $WEBSITE; ?> Account?</em><br>
              A. Your password keeps your <?php echo $WEBSITE; ?> account completely private and personal. The password assures that you are the only one sending messages from your account. Except of course you share such details with someone.</li>

            <li><em class="color"> What can I do if I forget my password?</em><br>
              A. Simply inform us and upon verification that you are the rightful account owner, your password would be sent to you.</li>
            <li><em class="color">What happens when my message encounters a switched off mobile?</em><br>

              A. When the system tries to deliver your message to a phone number which is switched off or out of range the message will remain in the network for sometime. As soon as the mobile comes in range that message will be delivered to it.</li>
            <li><em class="color">Is there any limitation to the amount of messages I send?</em><br>

              A. No, there is no limitation on the amount of messages you send. Note however that the amount of messages you can send is only limited by the credit balance of your account.</li>
            <li><em class="color">How quickly are messages delivered?</em><br>
              A. Your messages are sent to the phones as soon as you send them. However, depending on the volume of sent requests, there could be some delay. Messages are delivered on a first come, first served basis.</li>

            <li><em class="color"> How do I contact technical support?</em><br>
              A. If you have questions e-mail us at <a href="mailto:support@<?php echo $$WEBSITE_NAME; ?>">support@<?php echo $$WEBSITE_NAME; ?></a>.</li>

            <li><em class="color"> How do I check my balance/credits?</em><br>
              A. To check the balance you have in your account do the following:-<br>

              1. Login to your account with your user-name and password.<br>
              2. Click on credit details.<br>
              3. It will display the credit allotted to you and the credit you have used.</li>
            <li><em class="color">How can I increase the number of messages I can send?</em><br>

              A. You can buy more credits as and whenever u need as per your requirement.</li>

            <li><em class="color">How can I get answers to my billing questions?</em><br>
              A. All billing questions should be e-mailed to <a href="mailto:billing@<?php echo $WEBSITE_NAME; ?>">billing@<?php echo $WEBSITE_NAME; ?></a>.</li>
            <li><em class="color">How many messages can I send with my package?</em><br>
              A. You can send as many messages as your account balance allows. Fee is charged for each SMS.</li>
 </ol>
<?php
include_once "right.php";
?>
<?php
include_once "footer.php";
?>