<?php
session_start();
set_time_limit(0);
if((isset($_SESSION['custreg_username']) ) and isset($_GET['id']))
{
  $file=$_GET['id'];
// if id is set then get the file with the id from database

mysql_connect('localhost','root','');
mysql_select_db('wbinvitedcustomers');
$load_doc = "SELECT  fileID, custpassport, filenames, filetype, filesize, content FROM wbcustomerpassports WHERE fileID = '$file'";
 $doc = mysql_query($load_doc) or die(mysql_error());
 $fp = null;
 $ext1="";
 $filename="";
 while($row = mysql_fetch_array($doc)){
	 if($row['filetype']=="application/pdf")
		 $ext1=".pdf";
	  else if($row['filetype']=="image/gif")
		 $ext1=".gif";
	  else if($row['filetype']=="image/jpeg")
		 $ext1= (strpos($row['filetype'], ".jpg")!==false)? ".jpg" :".jpeg";
	  else if($row['filetype']=="image/png")
		 $ext1=".png";

	 $fp = fopen("C:\\xampp\\htdocs\\wbinvites\\adusere\\temp\\previu_file".$row['custpassport'].$row['fileID'].$ext1, "w+");
	 $filename="http://localhost:81/wbinvites/adusere/temp/previu_file".$row['custpassport'].$row['fileID'].$ext1;
     fwrite($fp, $row['content']);
     }
	 fclose($fp);
	 
	 echo $filename;
	 
}	 

?>