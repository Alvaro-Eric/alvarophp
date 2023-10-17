<?php
set_time_limit(0);
session_start();
if(isset($_SESSION['sales_username'])){
	require_once('../../class/db.php');
         require_once('../class/emailclass.php');
         
	$classconn=new db();
	$mysqlconn=$classconn::mysql_connect();
        $oracleconn=$classconn::ora_airline_connect();
// #WB_CUSTOM_PROMO_CONTENT#

if(isset($_GET['promoid']) && isset($_GET['names']) && isset($_GET['email']))
{
   $promoid=$_GET['promoid'];
   $names=$_GET['names'];
   $email=$_GET['email'];
	try{

    $select1 = $mysqlconn->prepare("SELECT p.promotionid, p.promoTitle,p.body, t.template_name,t.template_description 
FROM promotions p, promo_template t where p.template_id=t.template_id and p.promotionid=:promoid");
 $select1 ->bindValue(":promoid",$promoid);
 $select1->setFetchMode(PDO::FETCH_OBJ);
$select1->execute();
$i=0;
while( $enregistrement1 = $select1->fetch(PDO::FETCH_ASSOC)) 
{
   $email =new email();  
   $to="hubert.musangwa@rwandair.com";
   $nameto=$names;
   $subject="RWANDAIR PROMO :".$enregistrement1['promoTitle'];
   $body="<span style='color:#00529B;padding:10pt;font-weight:bold;'>Dear ".ucfirst(substr($nameto,0,strpos($nameto,' '))).", </span><br /> Please receive this offer from RWANDAIR Ltd.<br />".$enregistrement1['body'];                             // <?php echo $_GET['names']; ,
   $content=str_replace("#WB_CUSTOM_PROMO_CONTENT#",$body,$enregistrement1['template_description']);
   echo 'Names:  '.$nameto.'  | Email: '.$to."  | Status : ";
try{
$email::send_email($content,$to,$nameto,$subject);
//echo '1';
        }
  catch(Exception $e)
    {
      echo "Error 1";
    }
}    
	}
	catch(Exception $e)
	{
	echo "Error 2";
	}
}
}
        ?>
