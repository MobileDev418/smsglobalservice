<h1>Test API</h1>

<?php

		$sms_api=$_POST['api'];	
		//$sms_api="http://smpp6.routesms.com/sendsms?username=ct-smsglob&password=bolgsms!";
		
		//urlencode($sms_api);
		echo "<h4>".$sms_api."</h4>";				
		echo"<h3>Wait Checking API.....</h3>";
		$curlHandle = curl_init();	
		curl_setopt($curlHandle, CURLOPT_URL, $sms_api); // set the url to fetch
        curl_setopt ($curlHandle, CURLOPT_PORT , 8080);
		//curl_setopt($curlHandle, CURLOPT_HEADER, 0); // set headers (0 = no headers in result)
        //curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1); // type of transfer (1 = to string)
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 200); // time to wait in seconds Library is not installed";
		$code = curl_exec($curlHandle);
		curl_close ($curlHandle);
		echo "<br/><b>Returned Data is:</b>(".$code.")";		
?>