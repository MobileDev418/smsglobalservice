<?php
include_once "is_spadmin.php";
include_once "../admin/ez_sql.php";

//File is called from cus_balance.php file. get customer id and new balance from submiited form

//id=5
//new balance 50

@$id=$_POST['cus_id'];
@$new_bal=$_POST['set_bal'];

//old balance 30
$old_balance=$db->get_var("select credits from customer where cus_id=".$id);

//added credits 50-30=20

$new_balance=$new_bal-$old_balance;


//Update the customer balance to new credits

$q="update customer set credits=".$new_bal.", balance=balance+".$new_balance." where cus_id=".$id;


$update=$db->query($q);
$_SESSION['cus_msg']="Customer Credits Updated";
$actionq="insert into salesperson_actionlog (spid,action,action_date) values (".$_SESSION['sp_adminid'].",'Customer(id=".$id.") Credits Updated. Set New Credits=".$new_bal."','".date('Y-m-d H:i:s')."')";
$db->query($actionq);

header ("Location:customers.php");

?>
