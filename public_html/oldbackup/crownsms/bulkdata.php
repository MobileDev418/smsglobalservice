<?php
	include_once "iscustomer.php";
	include_once "constants.php";
	include('fileImporter.class.php');
	$title='Crownsms -  Sending Bulk SMS';
	$mid1='<h4>Sending BULK SMS</h4>';
	$mid2='';
	$mid3='';
	$menu10='sms-over.jpg';
	include_once "header.php";
	include_once "admin/ez_sql.php";
	include_once "sms.class.php";
	@$message=$_POST['txtmessage'];
	@$sender=$_POST['sender'];
	@$msgtype=$_POST['ddtype'];
	@$msg_opt=$_POST['send_opt'];
	$optmsg="";
		
	echo "This is bulk data file";
	
    //set the temp dir
    $path = 'bulk_export';
    //create an object of this class
	//$table=$_POST['table'];
	$table="sms_".time();
	$qtable="CREATE TABLE ".$table." ( mobile int(11) )  ";
	echo $qtable;
	$db->query($qtable);
	//$table=$_POST['table'];
	
    $importer = new fileImporter( $path , 'datingan_crownsms', $table);
    //create DB connection, if DB is not connected
    $importer->connectDatabase( 'localhost', 'datingan_crown' ,'pakistan');
	
    //set delimiter,by defult tab  
    $importer->setDelimiter('tab'); //FOR COMMA,use $importer->setDelimiter('comma');
    //import file

    if( $importer->importFile() ) {
		$optmsg.="<span style='color:#FF0099'>File imported successfully</span>"; 
    } else {
        $optmsg.="<span style='color:#FF0000'>Error Occured!Please try again<span>";
    }    
	echo $optmsg;
	
	
	
?>
<link href="style/sms-style.css" rel="stylesheet" type="text/css" />
<td id="bodybg"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>
        <td height="15" colspan="2"></td>
      </tr>
      <tr>
        <td width="25%" align="center" valign="top">
        	<?php
				include_once "left_col.php";
			?>
        </td>
        <td valign="top">
	

	<h2 align="center">&nbsp;</h2>
    
	
	   
     <?php
	 
	 if($msg_opt==1)
	 {
		 	include_once "send_bulkmessge.php";
	 }
	 else
	 {
		 	include_once "schedule_bulk_messge.php";
	 }
    $db->query("drop table ".$table)	
	?>

     

</td>
      </tr>
      <tr>
        <td height="5" colspan="2" align="center" valign="top"></td>
        </tr>
    </table></td>
  </tr>
<?php
	include_once "footer.php";
?>
