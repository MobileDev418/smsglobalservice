<h1>Test API</h1>
<?php
		ini_set('allow_url_fopen', 1);
		$sms_api=$_POST['api'];	
		//$newapi="http://121.241.242.116:8080/".urlencode($sms_api);
		echo "<h4>".$sms_api."</h4>";				
		echo"<h3>Wait Checking API.....</h3>";
		/*$curlHandle = curl_init();	
		curl_setopt($curlHandle, CURLOPT_URL, $sms_api); // set the url to fetch
        curl_setopt($curlHandle, CURLOPT_HEADER, 0); // set headers (0 = no headers in result)
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1); // type of transfer (1 = to string)
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30); // time to wait in seconds Library is not installed";
		$code = curl_exec($curlHandle);
		curl_close ($curlHandle); */
		$options = array(
    'http' => array(
        'protocol_version' => '1.0',
        'method' => 'GET'
    )
);
$context = stream_context_create($options);
$resp = file_get_contents($sms_api, false, $context);


		echo "<br/><b>Returned Code is:</b>(".$resp.")";		
		
?>