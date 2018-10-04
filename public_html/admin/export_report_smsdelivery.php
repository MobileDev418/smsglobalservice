<?php
/*

A quick script to demo the use of the export-xls.class.php script.

*/


#include the export-xls.class.php file
require('../export-xls.class.php');


$filename = 'SMSDelivery.xls'; // The file name you want any resulting file to be called.

#create an instance of the class
$xls = new ExportXLS($filename);


#lets set some headers for top of the spreadsheet
#

$header = "SMS Delivery Report"; // single first col text
$xls->addHeader($header);

#add blank line
$header = null;
$xls->addHeader($header);

#add 2nd header as an array of 8 columns
$header[] = "Sr#";
$header[] = "SMS ID";
$header[] = "Message";
$header[] = "Type";
$header[] = "Customer";
$header[] = "Return Code";
$header[] = "Sent";
$header[] = "Date and Time";

	
$xls->addHeader($header);


# Lets add some sample data
#
# Of course this can be from a SQL query or anyother data source
#

#first line

 if($sms_history)

            {
				$ind=(($l_page-1)*20)+1;
                foreach($sms_history as $history) //add rows into excel file

                {
							if ($history->type==0)
								$msg_type="Text";
							elseif ($history->type==1)
								$msg_type="Flash";
							else
								$msg_type="Unicode";
							
							if(substr($history->return_code,0,4)==1701)
								$msg_send="Yes";
							else
								$msg_send="No";
                    
					$row = array();
					$row[] = $ind++;
					$row[] = $history->delievery_id;
					$row[] = $history->message;	
					$row[] = $msg_type;
					$row[] = $history->fname;
					$row[] = $history->return_code;
					$row[] = $msg_send;
					$row[] = $history->sent_date;
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