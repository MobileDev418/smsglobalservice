<?php
include_once "is_spadmin.php";
include_once "../admin/ez_sql.php";

//File that updates customer password. File is called from set_new_password.php file
//Get id of customer and password from submitted form and update customer password

@$id=$_POST['id'];

if(is_nan($id) || is_nan($val))
	header("Location:index.php");

$q="update customer set cus_password='".md5($_POST['pass1'])."' where cus_id=".$id;
$update=$db->query($q);

$actionq="insert into salesperson_actionlog (spid,action,action_date) values (".$_SESSION['sp_adminid'].",'Customer(id=".$id.") Password Changed','".date('Y-m-d H:i:s')."')";
$db->query($actionq);

$_SESSION['cus_msg']="Customer Password Changed";

header ("Location:customers.php");

?>
