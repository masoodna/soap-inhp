<?php
require_once "Classes/PHPExcel.php";
$path="/bbbb.xls";
//$path="uploads/".$file_name;
$reader= PHPExcel_IOFactory::createReaderForFile($path);
$excel_Obj = $reader->load($path);

//Read Sheet 0
$worksheet=$excel_Obj->getSheet('0');
echo $worksheet;

?>