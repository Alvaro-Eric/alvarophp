<?php
session_start();
//echo $_POST['ticketPNR'];
//ECHO $_GET['ticketPNR'];
if(isset($_POST['title']))
{
	//echo $_POST['requestingCompany'];
echo $_POST['body'];

	require_once('../../class/db.php');
	$classconn=new db();
	$mysqlconn=$classconn::mysql_connect();
  
$promotitle=$_POST['title'];
$promobody=$_POST['body'];
$user=$_SESSION['sales_username'];
	$select = $mysqlconn->prepare("INSERT INTO airlinesalesmonitor.promotions (promoTitle, body, creator, status) VALUES(:promotitle,:promobody,:user,-1)");
// $select ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $select ->bindValue(":promotitle", $promotitle);
  $select ->bindValue(":promobody", $promobody);
  $select ->bindValue(":user", $user);

if($select->execute())
	{
    echo "1";
        }  else {
            echo "0";
        }
}


