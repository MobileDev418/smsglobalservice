<?php
/*

A quick script to use of the export-xls.class.php script.

*/


#include the export-xls.class.php file
require('../export-xls.class.php');


$filename = 'CorrespondentsHistroy.xls'; // The file name you want any resulting file to be called.

#create an instance of the class
$xls = new ExportXLS($filename);


#lets set some headers for top of the spreadsheet
#

$header = "Client Correspondents Histroy"; // single first col text
$xls->addHeader($header);

#add blank line
$header = null;
$xls->addHeader($header);


//Add Customer name

$header = $name; // single first col text
$xls->addHeader($header);

#add blank line
$header = null;
//$xls->addHeader($header);


#add 2nd header as an array of 6 columns
$header[] = "Sr#";
$header[] = "Client Name";
$header[] = "Client Mobile";
$header[] = "Comments";
$header[] = "Date";

	
$xls->addHeader($header);


# Lets add some sample data
#
# Of course this can be from a SQL query or anyother data source
#

#first line

 if($sms_history)

           {
		$ind=(($l_page-1)*20)+1;
                foreach($sms_history as $history) //add rows in excel file

                {
                    
					$row = array();
					$row[] = $ind++;
					$row[] = $history->clientname;
					$row[] = $history->clientmobile;	
					$row[] = $history->comments;
					$row[] = date('d-m-Y',strtotime($history->corres_dt));     
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