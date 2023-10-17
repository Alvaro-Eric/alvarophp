<?php
session_start();
set_time_limit(0);
if((isset($_SESSION['hrfi_username']) ) and isset($_GET['id']))
{
$file=$_GET['id'];
$username="exchange.monitor@rwandair.com";
$password="EXmon@rdair123";
$url="http://10.0.0.215:1254/FilesUtilities.asmx?WSDL";
$options = array(
     'login' => $username,
     'password' => $password );
$client = new SoapClient($url, $options);

$params = array();
$params["id"] = $file;
$result = $client->GetAQPulseFile($params);
$xml = str_replace('localhost','10.0.0.215',$result->GetAQPulseFileResult);

echo $xml;
/*
$connection_string = 'DRIVER={SQL Server};SERVER=10.0.0.215;DATABASE=QPulse52'; 
$user = 'sa'; 
$pass = 'abcd@1234';

$connection = odbc_connect( $connection_string, $user, $pass ); 

$success = odbc_exec($connection, "SELECT  ID, AttachmentID, DisplayFileName, Extension, FileData, FileSize, ModifiedDate FROM  PersonTrainingEventAttachmentItem  where ID='".$file."'");

if (!$success){
    exit("Error in SQL");
}
while (odbc_fetch_row($success)){

$name=odbc_result($success, 'DisplayFileName');
$ext1=odbc_result($success, 'Extension');
if( $ext1==".pdf")
		$type="application/pdf";
	 else if($ext1==".doc")
		 $type="application/msword";
	  else if( $ext1==".gif")
		$type="image/gif";
	  else if($ext1==".jpg" OR $ext1==".jpeg")
		 $type="image/jpeg";
	  else if($ext1==".png")
		 $type="image/png";
	  else if($ext1==".docx")
		 $type="application/vnd.openxmlformats-officedocument.wordprocessingml.document";
	  else if($ext1==".xls")
		 $type="application/vnd.ms-excel";
	 else if($ext1==".xlsx")
		 $type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
$size=odbc_result($success, 'FileSize');
$content= hex2bin(odbc_result($success, 'FileData'));
    //echo "$col1\n";
}

// Disconnect the database from the database handle.
odbc_close($connection);

header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");
header("Content-transfer-encoding: binary");
echo $content;

*/
exit;
}
?>
