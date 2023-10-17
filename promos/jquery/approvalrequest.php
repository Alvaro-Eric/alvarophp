<?php
session_start();
if(isset($_SESSION['sales_username']) )
{

	require_once('../../class/db.php');
	$classconn=new db();
	$mysqlconn=$classconn::mysql_connect();
	$select = $mysqlconn->prepare("UPDATE airlinesalesmonitor.promotions set status=:status where promotionid=:promotionid and status+1=:status");
// $select ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $select ->bindValue(":promotionid", $_GET['promoid']);
 $select ->bindValue(":status", $_GET['status']);

if($select->execute())
	{
    
    echo '1';
    
        }else {echo '0';}
}
?>
