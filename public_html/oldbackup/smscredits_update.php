<?php
	session_start();
	include_once "admin/ez_sql.php";
	$cid=$_GET['customer'];
	$buy_credits=$_GET['sms'];
	$pack_price=$_GET['price'];
	$q="update customer set credits=credits+".$buy_credits.", balance=balance+".$buy_credits." where cus_id=".$cid;
	

	$db->query($q);
	$q="insert into paypal_payments (customer_id, price, quantity, buy_date) values (".$cid.",".$pack_price.",".$buy_credits.",'".date('y-m-d')."')";
	
	$db->query($q);
	
	$q="select cus_id, fname, mobile, username, active, block from customer where cus_id=".$cid;
	$cus=$db->get_row($q);

	$_SESSION['cus_login']='yes';
	$_SESSION['cus_uname']=$cus->username;
	$_SESSION['cus_name']=$cus->fname;
	$_SESSION['cus_mobile']=$cus->mobile;
	$_SESSION['cus_id']=$cus->cus_id;
	$_SESSION['buy_sms']="yes";
	
	header("location:updated_credits.php");	
	

?>