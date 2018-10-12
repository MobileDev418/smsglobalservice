<?php
ob_start();
session_start();
include_once "library_const.php";

/* Get Form Data */
@$fname=$_POST['fname'];
@$lname="";
@$uname=$_POST['username'];
@$password=$_POST['pass1'];
@$email=$_POST['email'];
@$country=$_POST['country'];
@$city="";
@$address="";
//@$phone=$_POST['ph'];
@$cus_cell=$_POST['cell'];
var_dump($_POST);
var_dump($_SESSION);

/*echo $fname.$lname.$uname.$password.$email.'variable';
echo $_POST['fname'].$_POST['username'].$_POST['pass1'].$_POST['country'].$_POST['cell'].'die';*/

$_SESSION['fnm']=$fname;
$_SESSION['lnm']=$lname;
$_SESSION['unm']=$uname;
$_SESSION['password']=$password;
$_SESSION['cty']=$city;
$_SESSION['ady']=$address;
//$_SESSION['phy']=$phone;
$_SESSION['eml']=$email;
$_SESSION['cell']=$cus_cell;
$_SESSION['cont_code']=$country;

$_SESSION['ufound']="";
$_SESSION['mobfound']="";
$_SESSION['mail_found']="";
include_once "admin/ez_sql.php";

$q="select email from customer where email='".$email."'";
//echo $q;
$user_email=$db->get_var($q);
//echo $nm;
/* Check that user email is already registered */
if($user_email!="")
{
	$_SESSION['mail_found']="<span style='color:red'>Already Registered.</span>";
	$goback=true;
}

$q="select username from customer where username='".$uname."'";
//echo $q;			
$nm=$db->get_var($q);
//echo $nm;
/* Check username is already registered */
if($nm!="")
{			
	$_SESSION['ufound']="<span style='color:red'>Already Taken.</span>";
	$goback=true;
	
}
$q="select mobile from customer where mobile='".$cus_cell."'";	
$mob=$db->get_var($q);
//echo $nm;
/* Check user mobile number is already registered */
if($mob!="")
{			
	echo "Mobile Already Registered";
	$_SESSION['mobfound']="<span style='color:red'>Already Registered.</span>";
	$goback=true;
	
}
/*check that captcha code is valid */
if (!($_SESSION['security_code'] == $_POST['code'] && !empty($_SESSION['security_code'])))
{
	$_SESSION['ucode']="<span style='color:red'>Invalid Code</span>";
	$goback=true;
}
if($goback==true)
{
	header("location:index.php");
}
else
{

		/*$_SESSION['fnm']="";
		$_SESSION['lnm']="";
		$_SESSION['unm']="";
		$_SESSION['password']="";
		$_SESSION['cty']="";
		$_SESSION['ady']="";
		$_SESSION['phy']="";
		$_SESSION['cell']="";
		$_SESSION['eml']="";
		$_SESSION['cont_code']="";
		$_SESSION['ufound']="";
		$_SESSION['mail_found'];
		*/
		/* Create a random activation code */		
		$activation_code=rand(100000,900000);
		$qsid="select sender_id from default_sender_id  where id=1";	
		$sid=$db->get_var($qsid);
		/* if new username, email and mobile number is submitted, add a new account into customer database */
		$q="insert into customer  (fname, lname, username, cus_password, email, country, city, address, mobile, reg_date, credits, balance, free_sms, active, activation_code, block,currentsid) values('".$fname."','".$lname."','".$uname."','".md5($password)."','".$email."',".$country.", '".$city."','".$address."','".$cus_cell."','".gmdate('Y-m-d',time()+3600)."',5,5,".$FREE_SMS." , 0,".$activation_code.",'0','".$sid."')";
		$_SESSION['cus_register']="yes";
		$_SESSION['cus_regname']=$fname." ".$lname;
		$db->query($q);					

		$qcid="select cus_id from customer  where username ='".$uname."'";	
		$cus_cid=$db->get_var($qcid);

		$q1="insert into sender_ids (cus_id, sender_id) values (".$cus_cid.",'".$sid."')";
		$db->query($q1);

		$q1="insert into customer_mobilenos (cusid, mobileno, activated) values (".$cus_cid.",'".$cus_cell."',0)";
		$db->query($q1);					

		$q="select name from country where id='".$country."'";	
		$country_name=$db->get_var($q);
		$body="This user registerd on globalsmsservices.com";
		$body.="\nID: ".$newid;
		$body.="\nName: ".$fname." ".$lname;
		$body.="\nUser Name: ".$uname;
		$body.="\nEmail: ".$email;
		$body.="\nCountry: ".$country_name;
		$body.="\nCity: ".$city;
		$body.="\nAddress: ".$address;
		/*$body.="\nPhone: ".$phone;*/
		$body.="\nMobile: ".$cus_cell;

		//mail($ADMIN_EMAIL,$REG_SUBJECT,$body,"From:".$ADMIN_FROM_EMAIL);
		$_SESSION['cus_id']=0;
		include("sms.class.php");
		
		$activation_message = "Hello ".$fname."! your activation code for smsglobalservice.com is ".$activation_code." and username is ".$uname." Please activate your account to get started. Thanks";
		/* Create a new sms object */
		$sms=new sendsms();
		/* send sms alert to user to inform acctivatio code */
		//echo $sid;
		$smscode=$sms->message($activation_message,$cus_cell,"smsglobal",0);
		
		
		//$smscode=$sms->message($activation_message,$cus_cell,$sid,0);
		/* send email to customer to inform about registartion */
		//mail($email,$WEBSITE." Registration","You are successfully registered. Please activate your account using the activation code that is sent to your mobile");
		//$msgs= "You are successfully registered. Please activate your account using the activation code is ".$activation_code."";
		$activation_email = "You are successfully registered. Please activate your account using the activation code that is sent to your mobile";
		
		mail($email,"New Account Activation Code",$activation_email);
		
		header("Location:registered.php");
}
?>