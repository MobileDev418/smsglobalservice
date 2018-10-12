<?php
/*

A quick script to demo the use of the export-xls.class.php script.

*/


#include the export-xls.class.php file
require('export-xls.class.php');


$filename = 'SMSDelivery.xls'; // The file name you want any resulting file to be called.

#create an instance of the class
$xls = new ExportXLS($filename);


#lets set some headers for top of the spreadsheet
#

$header = "SMS Delivery"; // single first col text
$xls->addHeader($header);

#add blank line
$header = null;
$xls->addHeader($header);


//Add Customer name

$header = $name; // single first col text
$xls->addHeader($header);

#add blank line
$header = null;
$xls->addHeader($header);


#add 2nd header as an array of 6 columns
$header[] = "Sr#";
$header[] = "SMS";
$header[] = "From";
$header[] = "To";
$header[] = "Date & Time (GMT + 1)";
$header[] = "Status";



$xls->addHeader($header);



if($sms_history)

{
				$ind=(($l_page-1)*20)+1;
                foreach($sms_history as $history) /* Loop to populate excel sheet with actual data */

                {
						if(substr($history->return_code,0,4)==1701)
							$status="Delivered";
						else
							$status="Un-delivered";	
						$row = array();
						$row[] = $ind++;
						$row[] = $history->message;
						$row[] = $history->send_from;	
						$row[] = $history->send_to;
						$row[] = $history->sent_date;
						$row[] = $status;        
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