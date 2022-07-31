<?php   
require_once "Classes/PHPExcel.php";

require_once('nusoap/lib/nusoap.php');
$path="bbbb.xls";

$reader= PHPExcel_IOFactory::createReaderForFile($path);
$excel_Obj = $reader->load($path);
//Read Sheet 0
$worksheet=$excel_Obj->getSheet('0');

$client = new SoapClient('http://extranet.sazehgostar.com/SGSWebService/SGSServices.asmx?WSDL');
$response1 = $client->GetPartTraceMaster (
    Array ( 'userName' => nadi
    , 'passWord'=> 424
    ,'manuCode' =>  99999 )
);
//[dsTrace_code] => Array ( [xsd:schema] => schema )
//Array ( [mahmoule_no] => 0113280763 [manu_trace_code] => 47 [userName] => nadi [passWord] => 424  [type] => 0 )
$response2 = $client->SendTracePartBarcodes(
    Array ( 'mahmoule_no' => '0113151365'
    , 'manu_trace_code' => 47
    , 'userName' => nadi
    , 'passWord' => 424 
    ,'dsTrace_code' =>  $path
    
      
    , 'type' => '0' )  
);
try{   
print_r($response2);
}
catch(Exception $e){  
     Echo 'Connection failed' . $e->getMessage();  
 } 
    ?>

