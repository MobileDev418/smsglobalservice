<?php
include_once "ez_sql.php";
$api=$db->get_row("select username, password from sms_api");
$report_url="http://121.241.242.116:8080/report.asp?username=".$api->username."&password=".$api->password;
$report=file_get_contents($report_url);
echo $report;
?>

