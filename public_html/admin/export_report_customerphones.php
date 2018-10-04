<?php
/*

A quick script to demo the use of the export-xls.class.php script.

*/

include_once "ez_sql.php";
#include the export-xls.class.php file
require('../export-xls.class.php');


$filename = 'SMSMobiles.xls'; // The file name you want any resulting file to be called.

#create an instance of the class
$xls = new ExportXLS($filename);
$q="Select phone, sms_to FROM `history` group by phone, sms_to order by sms_to ";
$phones = $db->get_results($q);


#lets set some headers for top of the spreadsheet
#

$header = "Customer Phone Numbers"; // single first col text
$xls->addHeader($header);

#add blank line
$header = null;
$xls->addHeader($header);

#add 2nd header as an array of 3 columns
$header[] = "Sr#";
$header[] = "Name";
$header[] = "Mobile";
	
$xls->addHeader($header);


# Lets add some sample data
#
# Of course this can be from a SQL query or anyother data source
#

#first line

 if($phones)

{
				$ind=1;
                foreach($phones as $ph) //add rows into excel file

                {                  
					$row = array();
					$row[] = $ind++;
					$row[] = $ph->sms_to;
					$row[] = $ph->phone;	      
					$xls->addRow($row);
                }

}	


# You can return the xls as a variable to use with;
# $sheet = $xls->returnSheet();
#
# OR
#
# You can send the sheet directly to the browser as a file 
#
$xls->sendFile();


?>