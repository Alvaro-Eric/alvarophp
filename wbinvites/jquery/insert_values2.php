<?php
session_start();
if(isset($_POST['fullname']) && isset($_POST['passportnumber']))
{
	try{
            require_once('../class/dbclass.php');
//echo 'Submitted';
$classconn=new db();
	$mysqlconn=$classconn::mysql_connect();
$mysqlconn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$stmt = $mysqlconn->prepare("INSERT INTO wbcustflightmates(fullnames, agerange, passportnumber,invitingcustomer) VALUES (?,?,?,?)");
$stmt->bindParam(1, $_POST['fullname']);
$stmt->bindParam(2, $_POST['agerange']);
$stmt->bindParam(3, $_POST['passportnumber']);
$stmt->bindParam(4, $_POST['parentnumber']);

$stmt->execute() or die("error: 1");

echo "ok";

}
catch(PDOException $e)
{
    echo $e->getMessage();
}
catch(Exception $e)
	{
echo "Error: 2";

}
}
 else {
echo "error: 3";    
}
?>