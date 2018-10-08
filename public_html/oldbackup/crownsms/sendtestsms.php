<?php
$phone=$_POST['mobile'];
$message=$_POST['message'];
$url="http://sms3.routesms.com/bulksms/bulksms.asp?username=lujoshven&password=olu123jo&message=".$message."&mobile=".$phone."&sender=Test&type=1&route=1";
header("location:$url");


?>