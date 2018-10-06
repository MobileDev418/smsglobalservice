<?php
include_once "is_spadmin.php";
include_once "../admin/ez_sql.php";

//File that updates customer password. File is called from set_new_password.php file
//Get id of customer and password from submitted form and update customer password

@$id=$_POST['cid'];
$mobilno=$_POST['mobile_no'];
$freesms=$_POST['free_sms'];
$activationcode=$_POST['activation_code'];
$active=$_POST['isactive'];


$q="update customer set mobile='".$mobilno."', free_sms=".$freesms.", activation_code='".$activationcode."', active=".$active;
$q=$q." where cus_id=".$id;
$update=$db->query($q);


$actionq="insert into salesperson_actionlog (spid,action,action_date) values (".$_SESSION['sp_adminid'].",'Changed Customer(id=".$id.") Record','".date('Y-m-d H:i:s')."')";
$db->query($actionq);

$_SESSION['cus_msg']="Customer Record Updated";

header ("Location:customers.php");

?>
