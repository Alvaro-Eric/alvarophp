<?php
session_start();
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['passport']))
{


	try{
            require_once('../class/dbclass.php');
//echo 'Submitted';
$classconn=new db();
	$mysqlconn=$classconn::mysql_connect();
$mysqlconn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$stmt = $mysqlconn->prepare("INSERT INTO wbcustomersinfos(firstname, lastname, gender, email, phone, passport) VALUES (?,?,?,?,?,?)");
$stmt->bindParam(1, $_POST['firstname']);
$stmt->bindParam(2, $_POST['lastname']);
$stmt->bindParam(3, $_POST['gender']);
$stmt->bindParam(4, $_POST['email']);
$stmt->bindParam(5, $_POST['phonenumber']);
$stmt->bindParam(6, $_POST['passport']);

$stmt->execute() or die("error: 1");
//$stmt->execute();
//end of inserting into contact table
//------------2 table  flight table----------------
// check and insert into flight table (contact_id,date,flight_number,from,to)

$stmt = $mysqlconn->prepare("INSERT INTO wbcustflyingoptions(custpassport, choice, members, eventflight, returndate) VALUES (?,?,?,?,?)");
$stmt->bindParam(1, $_POST['passport']);
$stmt->bindParam(2, $_POST['confirmation']);
$stmt->bindParam(3, $_POST['members']);
$stmt->bindParam(4, $_POST['eventflight']);
$stmt->bindParam(5, $_POST['returndate']);

//$stmt->execute()or die("error: 2".print_r($connection->errorInfo(), true));
$stmt->execute() or die("error: 2");

echo "ok";

}
catch(PDOException $e)
{
    echo $e->getMessage();
}
catch(Exception $e)
	{
echo "Error: 3";

}
}
 else {
echo "error: 4";    
}
?>