<?php
//just a test file to check database connection
$link = mysql_connect('localhost', 'mehreen', 'pakistan@123');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_close($link);
?>