<?php
session_start();
set_time_limit(0);
if((isset($_SESSION['custreg_username']) ) and isset($_GET['id']))
{
	$file=$_GET['id'];
// if id is set then get the file with the id from database

mysql_connect('localhost','root','');
mysql_select_db('wbinvitedcustomers');
//$id    = $_GET['id'];
$query = "SELECT filenames, filetype, filesize, content FROM wbcustomerpassports WHERE fileID = '$file'";

$result = mysql_query($query) or die('Error, query failed');
list($name, $type, $size, $content) =  mysql_fetch_array($result);
header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");
header("Content-transfer-encoding: binary");
echo $content;


exit;
}
?>
