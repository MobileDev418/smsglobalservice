<?php
$menu=3;
$heading="Our Services";
include_once "header.php";
//Simple page to dispaly some html contents 
?>
<h1><?php echo $heading; ?> </h1>
<img src="images/smspic3.png" alt="services" align="right" />
<p><?php echo $WEBSITE; ?> is an online application to send online SMS from computer to Mobile Device without use of Mobile connection.</p>
<p><?php echo $WEBSITE; ?> consists of below features:</p>
  	 <ul class="bullet-1">
         <li>Connectivity: SMPP, HTTP API/web interface</li>
         <li>Daily 5 Free SMS</li>
         <li>Create your own address with different groups.</li>
         <li>Upload file (excel,csv,txt. Etc. to send bulk sms)</li>
         <li>Single and Bulk Messaging - Grouping Functionality</li>
         <li>Scheduled Messaging (automated)</li>
         <li>Faster than Mobile Device</li>
         <li>Integrated Phonebook with Group system</li>
         <li>Online Browser Based Application</li>
         <li>Easy And User Friendly Software</li>
         <li>Cheaper Rates with Best Quality</li>
         <li>Manage History and Delivery Reports</li>
         <li>Coverage : WorldWide</li>
	 </ul>
  	 
<?php
include_once "right.php";
include_once "footer.php";
?>