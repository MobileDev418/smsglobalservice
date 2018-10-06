<?php
include_once "is_spadmin.php";
include_once "../admin/ez_sql.php";

//File to add a new correspondents with client 


//@$send_date=$_POST['corres_date'];
@$clname=$_POST['clientname'];
@$clmobile=$_POST['clientmobile'];
@$comments=$_POST['discussion'];

$send_date=date('m-d-Y');

$dttime=substr($send_date,6,4)."-".substr($send_date,0,2)."-".substr($send_date,3,2);

//$dttime.=" ".$send_time;

//echo $dttime;

$q="insert into clients_correspondents (spid, corres_dt, clientname,clientmobile,comments) values(".$_SESSION['sp_adminid'].",'".$dttime."','".$clname."',".$clmobile.",'".$comments."')";
//echo $q;
$db->query($q);

$actionq="insert into salesperson_actionlog (spid,action,action_date) values (".$_SESSION['sp_adminid'].",'Correspondents saved for client(".$clname.")','".date('Y-m-d H:i:s')."')";
$db->query($actionq);


$_SESSION['corres']="Record Saved successfully for correspondents with client.";
//$_SESSION['new_corres']="y";
header ("Location:correspondents.php"); 

?>
