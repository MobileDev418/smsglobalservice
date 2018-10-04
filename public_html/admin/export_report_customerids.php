<?php
/*

A quick script to demo the use of the export-xls.class.php script.

*/

include_once "ez_sql.php";
#include the export-xls.class.php file
require('../export-xls.class.php');


$filename = 'CustomerIds.xls'; // The file name you want any resulting file to be called.

#create an instance of the class
$xls = new ExportXLS($filename);

$customers = $db->get_results("select cus_id, fname, lname, mobile from customer where cus_id!=0 order by cus_id");


#lets set some headers for top of the spreadsheet
#

$header = "Customer SMSHistroy"; // single first col text
$xls->addHeader($header);

#add blank line
$header = null;
$xls->addHeader($header);

#add 2nd header as an array of 4 columns
$header[] = "Sr#";
$header[] = "Customer ID";
$header[] = "Name";
$header[] = "Sender ID";
	
$xls->addHeader($header);


# Lets add some sample data
#
# Of course this can be from a SQL query or anyother data source
#

#first line

 if($customers)

{
				$ind=1;
                foreach($customers as $cus) //add rowns in excel file

                {                  
					$row = array();
					$row[] = $ind++;
					$row[] = $cus->cus_id;
					$row[] = $cus->fname. " ".$cus->lname;
					$row[] = $cus->mobile;	      
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