<?php
include_once "isadmin.php";
include_once "ez_sql.php";
@$id=$_POST['cus_id'];
@$new_bal=$_POST['set_bal'];
$old_balance=$db->get_var("select credits from customer where cus_id=".$id);
$new_balance=$new_bal-$old_balance;
$q="update customer set credits=".$new_bal.", balance=balance+".$new_balance." where cus_id=".$id;
//echo $q;
$update=$db->query($q);
$_SESSION['cus_msg']="Customer Credits Updated";
header ("Location:customers.php");

?>
