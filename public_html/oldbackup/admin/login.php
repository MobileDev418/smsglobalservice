<?php
session_start();
include_once "lib_constant.php";
?>
<html>
<head>
<title><?php echo $ADMIN_TITLE; ?> - Login</title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="script/admin.js"></script>

</head>
<body>
<table width="239" align="center" style="margin-top:50px">
<tr><td width="329"><img src='images/logo.jpg' alt="" /></td>
</tr>
<tr>
<td>
<table width="100%" align="center"  cellpadding="2px"  cellspacing="2px" class="admin_table">
  <form method="post" action="signadmin.php">
    <tr class="topheading" height="29px">
      <td colspan="2" align="center">Administrator</td>
    </tr>
    <tr>
    	<td width="78"  align="right">User</td>
   	  <td width="171"><input name="name" type="text"  class="textbox" id="name" /></td>
    </tr>
    <tr>
	<td align="right">Password</td>
    <td><input name="password" type="password"  class="textbox" id="password" /></td>
</tr>





<tr>
	<td height="30" colspan="2" align="right"><input type="submit" value="Sign-in" class="submit"/></td>
</tr>
</form>
</table>  
</td>
</tr> 
<tr>
  <td height="15" align="center" style="color:red" >
  <?php
  if($_SESSION['admin']=='n')
  {
	  echo "* Invalid User Name or Password";
	  $_SESSION['admin']="";
  }
  ?>
  </td>
</tr>
</table>

</body>
</html>
