<?php
session_start();
include_once "library_const.php";
@$fname=$_POST['fname'];
@$lname=$_POST['lname'];
@$uname=$_POST['username'];
@$password=md5($_POST['pass1']);
@$email=$_POST['email'];
@$country=$_POST['country'];
@$city=$_POST['city'];
@$address=$_POST['address'];
@$phone=$_POST['ph'];
@$cus_cell=$_POST['cell'];


$_SESSION['fnm']=$fname;
$_SESSION['lnm']=$lname;
$_SESSION['unm']=$uname;
$_SESSION['cty']=$city;
$_SESSION['ady']=$address;
$_SESSION['phy']=$phone;
$_SESSION['eml']=$email;
$_SESSION['cell']=$cus_cell;
$_SESSION['cont_code']=$country;

$_SESSION['ufound']="";
if($_SESSION['security_code'] == $_POST['code'] && !empty($_SESSION['security_code']))
{
			include_once "admin/ez_sql.php";			
			//echo  $login;
			
			
			$q="select email from customer where email='".$email."'";
			//echo $q;
			$user_email=$db->get_var($q);
			//echo $nm;
			if($user_email!="")
			{
				$_SESSION['mail_found']="<span style='color:red'>Already Registered.</span>";
				$goback=true;
			}
			
			$q="select username from customer where username='".$uname."'";
			//echo $q;			
			$nm=$db->get_var($q);
			//echo $nm;
			if($nm!="")
			{			
				$_SESSION['ufound']="<span style='color:red'>Already taken.</span>";
				$goback=true;
				
			}
			if($goback==true)
				header("Location:register.php"); 
			
			else
			{
	
				
				$_SESSION['fnm']="";
				$_SESSION['lnm']="";
				$_SESSION['unm']="";
				$_SESSION['cty']="";
				$_SESSION['ady']="";
				$_SESSION['phy']="";
				$_SESSION['cell']="";
				$_SESSION['eml']="";
				$_SESSION['cont_code']="";
				$_SESSION['ufound']="";
				$_SESSION['mail_found'];
						
				$qnextid="select max(cus_id) from customer";
				
				$newid = $db->get_var($qnextid);
				if($newid=="")
					$newid=1;
				else
					$newid=$newid+1;
				
$q="insert into customer  (cus_id, fname, lname, username, cus_password, email, country, city, address, phone, mobile, reg_date, balance, active) values(".$newid.",'".$fname."','".$lname."','".$uname."','".$password."','".$email."',".$country.", '".$city."','".$address."','".$phone."','".$cus_cell."','".gmdate('Y-m-d',time()+3600)."',0,1)";
				$_SESSION['cus_id']=$newid;
				$_SESSION['cus_login']="yes";
				$_SESSION['cus_uname']=$uname;
				$_SESSION['cus_name']=$fname;
				$db->query($q);			
			
				$body="This user registerd on CrownSms";
				$body.="\nID: ".$newid;
				$body.="\nName: ".$fname." ".$lname;
				$body.="\nUser Name: ".$uname;
				$body.="\nEmail: ".$email;
				$body.="\nCity: ".$city;
				$body.="\nAddress: ".$address;
				$body.="\nPhone: ".$phone;
				$body.="\nMobile: ".$cus_cell;
				mail($ADMIN_EMAIL,$REG_SUBJECT,$body,"From:".$ADMIN_FROM_EMAIL);
				header ("Location:index.php");  
			}
}
else
{
				$_SESSION['ucode']="<span style='color:red'>Invalid Code</span>";
				header("Location:register.php"); 
}

?>
