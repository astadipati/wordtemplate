<?php

require_once 'excell/PHPExcel.php';

$template = "tpl.xls";

$simpan = "Testing.xls";

$objReader = PHPExcel_IOFactory::createReader('Excel5');
$objPHPExcel = $objReader->load($template);

$da = "192.34343/2019/pa_tbn";
$data = array($da, "BMW", "Toyota");


$objPHPExcel->getProperties()->setCreator("silawe")
							 ->setLastModifiedBy("pta-surabaya.go.id")
							 ->setTitle("Laporan Perkara Pengadilan Agama")
							 ->setSubject("Laporan Perkara Pengadilan Agama");

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A2", "Hello")
            ->setCellValue("A3", $da)
            ->setCellValue("A4", $data['1']);


header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$simpan.'"');
header('Cache-Control: max-age=0');
            // If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
            
            // If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
            
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
            