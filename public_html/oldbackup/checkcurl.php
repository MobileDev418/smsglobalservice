<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
//@ini_set('safe_mode', 'off');
		$sms="Hello how are you";
		@ini_set('allow_url_fopen', '1');
		$curlHandle = curl_init(); // init curl
		$sms = urlencode($sms);
		$phone='00923336581680';
		$apiCallUrl  = 'http://121.241.242.116:8080/sendsms?';
        $apiCallUrl .= 'username=ct-smsglob1&password=bolgsms!&type=0&dlr=0&destination='.$phone.'&source=mehreen';
        $apiCallUrl .= '&message='.$sms;
		
		// cURL options
        curl_setopt($curlHandle, CURLOPT_URL, $apiCallUrl); // set the url to fetch
        curl_setopt($curlHandle, CURLOPT_HEADER, 0); // set headers (0 = no headers in result)
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1); // type of transfer (1 = to string)
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30); // time to wait in seconds Library is not installed";
		$content = curl_exec($curlHandle);
	
		echo "Contents are".$content;
?>


</iframe>
</body>
</html>