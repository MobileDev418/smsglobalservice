<?php
	include_once "iscustomer.php";
	//Get Form data submitted by pricing page and send user to paypal page for payment
	$price=$_POST['cost'];
	$quantity=$_POST['amount'];
	$customer=$_SESSION['cus_id'];
	$itemtitle=$_POST['packtitle'];
/*	$price=.0285;
	$quantity=2500;
	$customer=1;
	$itemtitle="buy sms from 5000-10000 @ 0.0285/Unit";*/
?>

<form name="paypalform" action="https://www.paypal.com/cgi-bin/webscr" method="post">
		
        <input type="hidden" name="cmd" value="_xclick">
		<input type="hidden" name="business" value="paypal@kenyalocalmusic.com">
		<input type="hidden" name="item_name" value="<?php echo $itemtitle; ?>">
		<input type="hidden" name="amount" value="<?php echo $price; ?>">
		<input type="hidden" name="quantity" size="10" value="<?php echo $quantity; ?>">
		<input type="hidden" name="tax" value="0">
		<input type="hidden" name="return" value="http://www.smsglobalservice.com/smscredits_update.php?customer=<?php echo $customer ?>&sms=<?php echo $quantity; ?>&price=<?php echo $price; ?>" />
		<input type="hidden" name="cancel_return" value="http://smsglobalservice.com/pricing.php">
		<input type="hidden" name="currency_code" value="USD">
		<input type="hidden" name="bn" value="PP-BuyNowBF">
        
<input style="margin-top:5px; margin-bottom:5px" type="image" src="admin/images/view.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>	

<script type="text/javascript" language="javascript">
 document.forms["paypalform"].submit();
</script>

