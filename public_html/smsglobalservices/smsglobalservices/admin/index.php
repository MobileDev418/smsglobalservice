<?php
include_once "isadmin.php";
include_once "lib_constant.php";
//Home page of admin to show menu to preform different admin operations
?>
<html>
<head>
<title><?php echo $ADMIN_TITLE; ?> - Administration</title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>
<body onLoad="MM_preloadImages('images/packages-over.png','images/routesms-over.png','images/customers-over.png','images/sign_out-over.png','images/credit_detail-over.png','images/ph_directory-over.png','images/crownsms-over.png','images/todays_sms_over.png','images/ch_password-over.png','images/sms_delivry_over.png')">
<table align="center" cellpadding="0" cellspacing="0" id="admin_table">
  <tr>
    <td class="crown_head"><?php echo $WEBSITE; ?> - Administration</td>
  </tr>

  <tr>
    <td valign="top" style="padding-top:20px" align="center">
    <div style="margin-top:30px">
      <p><a href="packages.php"><img src="images/packages.png" alt="Manage Packages" border="0" id="Image1" onMouseOver="MM_swapImage('Image1','','images/packages-over.png',1)" onMouseOut="MM_swapImgRestore()" /></a>&nbsp;<a href="customers.php"><img src="images/customers.png" alt="Manage Customers" border="0" id="Image5" onMouseOver="MM_swapImage('Image5','','images/customers-over.png',1)" onMouseOut="MM_swapImgRestore()" /></a></p>
      <p><a href="routesms.php"><img src="images/routesms.png" alt="Manage RoutSms"  border="0" id="Image2" onMouseOver="MM_swapImage('Image2','','images/routesms-over.png',1)" onMouseOut="MM_swapImgRestore()" /></a>&nbsp;<a href="credit.php"><img src="images/credit_detail.png" alt="Credit Left"  border="0" id="Image4" onMouseOver="MM_swapImage('Image4','','images/credit_detail-over.png',1)" onMouseOut="MM_swapImgRestore()" /></a></p>
      <p><a href="contactus_messages.php"><img src="images/crownsms.png" width="220" height="48" id="Image3" onMouseOver="MM_swapImage('Image3','','images/crownsms-over.png',1)" onMouseOut="MM_swapImgRestore()" border="0"></a>&nbsp;<a href="credit.php"></a>&nbsp;<a href="phone_directory.php"><img src="images/ph_directory.png" alt="Phone Directory" border="0" width="220" height="48" id="Image8" onMouseOver="MM_swapImage('Image8','','images/ph_directory-over.png',1)" onMouseOut="MM_swapImgRestore()"></a></p>
      <p><a href="history.php"><img src="images/todays_sms.png" name="Image10" width="220" height="48" border="0" id="Image10" onMouseOver="MM_swapImage('Image10','','images/todays_sms_over.png',1)" onMouseOut="MM_swapImgRestore()"></a>&nbsp;<a href="delivry.php"><img src="images/sms_delivry.png" width="220" height="48" border="0" id="Image11" onMouseOver="MM_swapImage('Image11','','images/sms_delivry_over.png',1)" onMouseOut="MM_swapImgRestore()"></a></p>
      <p><a href="changepassword.php"><img src="images/ch_password.png" alt="Change Password" border="0" id="Image6" onMouseOver="MM_swapImage('Image6','','images/ch_password-over.png',1)" onMouseOut="MM_swapImgRestore()"  /></a>&nbsp;<a href="signout.php" onClick="return confirm('Are you sure to sign-out?')"><img src="images/sign_out.png" alt="Sign Out"  border="0" id="Image7" onMouseOver="MM_swapImage('Image7','','images/sign_out-over.png',1)" onMouseOut="MM_swapImgRestore()" /></a>&nbsp;</p>
    </div></td>
  </tr>
</table>
</body>
</html>