<?php 
session_start();
set_time_limit(0);
if((isset($_SESSION['hrfi_username']) ) and isset($_GET['empid']) and isset($_GET['typeid']))
{
mysql_connect('localhost','root','');
mysql_select_db('hrfilerdb');
$empid=$_GET['empid'];
$typeid=$_GET['typeid'];
$query = "SELECT hu.id, hu.filename, hu.filesize, hu.filetype,hu.doc_type,  
hu.employeeid,td.description dtype, td.maxfilesize, td.sizeMeasure
FROM hrfilerupload hu, tblfilerdoctypes td
where hu.doc_type=td.id and hu.employeeid='".$empid."' and hu.doc_type=".$typeid ;

$result = mysql_query($query) or die('Error, query failed');
$data=[];
$k=0;
while($row = mysql_fetch_assoc($result)) {
$data[$k]=$row['id']."#".$row['filename']."#".$row['filesize']."#".$row['dtype'];
$k++;
}

if($k==0)
	echo json_encode("0#No record");
	else
echo json_encode($data);

}
?>
