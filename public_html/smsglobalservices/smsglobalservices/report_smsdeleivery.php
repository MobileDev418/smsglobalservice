<?php
//Just a test file to check that sms reports are working properly
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2010 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2010 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */

/** Error reporting */
error_reporting(E_ALL);

/** Include path **/
set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');

/** PHPExcel */
include 'PHPExcel.php';

/** PHPExcel_IOFactory */
include 'PHPExcel/IOFactory.php';


set_time_limit(600);

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw");
$objPHPExcel->getProperties()->setLastModifiedBy("Maarten Balliauw");
$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");
$objPHPExcel->getProperties()->setKeywords("office 2007 openxml php");
$objPHPExcel->getProperties()->setCategory("Test result file");


// Add some data

$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->setCellValue('A1' . $i, "FName $i");
$objPHPExcel->getActiveSheet()->setCellValue('B1' . $i, "LName $i");
$objPHPExcel->getActiveSheet()->setCellValue('C1' . $i, "PhoneNo $i");
$objPHPExcel->getActiveSheet()->setCellValue('D1' . $i, "FaxNo $i");
		

$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Sr#');
$objPHPExcel->getActiveSheet()->setCellValue('B1', 'SMS');
$objPHPExcel->getActiveSheet()->setCellValue('C1', 'From');
$objPHPExcel->getActiveSheet()->setCellValue('D1', 'To');
$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Date & Time (GMT + 1)');
$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Status');



if($sms_history)

{
				$i=2;
				$ind=(($l_page-1)*20)+1;
                foreach($sms_history as $history)

                {
						if(substr($history->return_code,0,4)==1701)
							$status="Delivered";
						else
							$status="Un-delivered";
						
						$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, "$ind");
						$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, "$history->message");
						$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, "$history->send_from");
						$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, "$history->send_to");
						$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, "$history->sent_date");
						$objPHPExcel->getActiveSheet()->setCellValue('F' . $i, "$status");
						$i++;
						$ind++;
				}
				
}

  
					
/*$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);*/


// Miscellaneous glyphs, UTF-8
/*$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A4', 'Miscellaneous glyphs')
            ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç'); */

// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client's web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="smsdelivery.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
