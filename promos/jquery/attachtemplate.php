<?php
session_start();
if(isset($_GET['promoid']) && isset($_GET['tempid']))
{

	require_once('../../class/db.php');
        require_once '../../class/emailclass.php';
	$classconn=new db();
	$mysqlconn=$classconn::mysql_connect();
  
$promotionid=$_GET['promoid'];
$templateid=$_GET['tempid'];
$status=$_GET['status'];
	$select = $mysqlconn->prepare("UPDATE airlinesalesmonitor.promotions set template_id=:template_id,status=:status where promotionid=:promotionid");
// $select ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $select ->bindValue(":promotionid", $promotionid);
 $select ->bindValue(":template_id", $templateid);
 $select ->bindValue(":status", $status);

if($select->execute())
	{
        $select0 = $mysqlconn->prepare("select username from users where status=1 and role=2");
 $select0->setFetchMode(PDO::FETCH_OBJ);
$select0->execute();

$email =new email();
$to="";
while( $enregistrement0 = $select0->fetch(PDO::FETCH_ASSOC)) 
{
 $names=$enregistrement0['username'];
$to=$enregistrement0['username']."@rwandair.com";
//$filecontent="http://".$_SERVER['HTTP_HOST']."/salesMonitor/promos/jquery/approvalrequest.php?promoid=".$promotionid."&promo_user=".$to;
//echo file_get_contents($filecontent);
$select1 = $mysqlconn->prepare("select * from promotions where creator=:user and promotionid=:promoid order by creation_date desc");
 $select1 ->bindValue(":user", $_SESSION['sales_username']);
 $select1 ->bindValue(":promoid", $_GET['promoid']);
    $select1 ->setFetchMode(PDO::FETCH_ASSOC);
$select1->setFetchMode(PDO::FETCH_OBJ);
$select1->execute();

while( $enregistrement1 = $select1->fetch(PDO::FETCH_ASSOC)) 
{		
$filecontent='
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="5" style="background-color:#F0EDE4;border-radius: 10px;">
  <tr>
    <td align="center">
     <table width="60%" border="0" cellspacing="0" cellpadding="0" style="background-color:rgb(000,082,156); margin-top:10px;border-bottom: 4px rgb(253,223,15) solid;border-top-left-radius: 10px;border-top-right-radius: 10px;">
        <tr>
          <td align="center" valign="top">
              <a href="#">
                  
      <img src="http://www.rwandair.com/images/logo.jpg" alt="Rwandair Logo" width="100%" height="80" border="0" style="display:block"></a></td>
        </tr>
      </table>
      
      <table width="60%" border="0" cellspacing="0" cellpadding="0" style="background-color:#ffffff;" >
        <tr>
          <td width="52%" style="padding-left:40px; padding-top:40px; padding-right:40px; padding-bottom:40px; vertical-align:top; background-color:#ffffff;">
              <h3 style="color:#00746F;font-family:Arial, Helvetica, sans-serif; font-weight:100; font-size:20px; padding-top:20px; line-height:20px;  border-bottom:1px solid #ddd;">
                  <a href="#" style="color:#754A7E; text-decoration:none; text-align:left;">Request for Approval - Barter tickets</a></h3>
                  <p style="color:#4C4D4F; font-family:Cambria, Georgia, \'Times New Roman\', Times, serif;font-size:16px; line-height:24px; text-align:left;">
                      Dear '.ucfirst(substr($to,0,  strpos($to,'.'))).', <br/>
                            Please, approve the following promotion request.</p>
            <fieldset style="width:98%;border:0px;border-bottom:2px solid #ddd;color:#4C4D4F; font-family:Cambria, Georgia, \'Times New Roman\', Times, serif;font-size:16px; line-height:24px; text-align:left;">
            <legend style="border-bottom:2px solid #ddd;width: 100%;color:#4C4D4F; font-family:Cambria, Georgia, \'Times New Roman\', Times, serif;font-size:16px; line-height:24px; text-align:left;">Details</legend>
                <table width="100%" border="0" cellspacing="3" cellpadding="2" ><tr><td>Promotion Name :</td><td>'.$enregistrement1['promoTitle'].'</td></tr>'
        . '<tr><td>From :</td><td>'.$enregistrement1['creator'].'</td></tr><tr><td colspan="2">Fares Details :'.$enregistrement1['body'].'</td></tr></table> 
            <table style="width:60%;"><tr><td><a href="http://'.$_SERVER['HTTP_HOST'].'/salesMonitor/index.php?apv_promoid='.$_GET['promoid'].'&pro_status=1" 
                style="background-color:rgb(84,170,84);color: #ffffff;padding: 5px;border-radius: 3px;text-decoration: none;margin-top: 10px;">Approve</a></td>
                <td><a href="http://'.$_SERVER['HTTP_HOST'].'/salesMonitor/index.php?apv_promoid='.$_GET['promoid'].'&pro_status=-2" 
                style="background-color:rgb(84,170,84);color: #ffffff;padding: 5px;border-radius: 3px;text-decoration: none;margin-top: 10px;">Decline</a></td></tr></table></fieldset></td>
        </tr><tr><td><a href="http://'.$_SERVER['HTTP_HOST'].'/salesMonitor/">Go to PromoApp</a></td><td></td></tr></table>
      <table width="60%" cellspacing="0" cellpadding="0" style="background-color:rgb(000,082,156); height: 80px;margin-bottom:50px;border-top: 4px rgb(253,223,15) solid;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;">
        <tr><td align="center"><table width="60%" height="88" border="0" cellspacing="0" cellpadding="0" >
      <tr><td style="text-align:left;padding-left:40px;padding-top:40px;padding-bottom:40px;padding-right:40px;"></td></tr></table></td></tr></table></td></tr></table></body>';
$nameto=$names;
$subject="PROMOTION APPROVAL REQUEST";
$email::send_email($filecontent,$to,$nameto,$subject);
}
}
    
    echo "1";
        }  else {
            echo "0";
        }
}


