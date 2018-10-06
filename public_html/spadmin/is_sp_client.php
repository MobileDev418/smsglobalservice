<?php
session_start();
//File to check that client is a valid customer of a sales person
include_once "../admin/ez_sql.php";
//Get username and password
//query to validate slaesperson client
$q="select username from customer where cus_id=".$id." and belong_to_sp=".$_SESSION['sp_adminid'];
//echo $q;
$is_sp_client=$db->get_var($q);

?>