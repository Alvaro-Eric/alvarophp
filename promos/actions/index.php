<?php
set_time_limit(0);
session_start();

if(isset($_GET['logout']))
{
	session_destroy();
?>
<script type="text/javascript">
<!--
window.location = "."
//-->
</script>
<?php
}
?>
<?php
if(isset($_SESSION['sales_username']))
{

	require_once('../../class/db.php');
       
         require_once('../class/emailclass.php');

	$classconn=new db();
	$mysqlconn=$classconn::mysql_connect();
  ?>
<meta name="viewport" content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no"/>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
          <script>
        if (!window.jQuery) { document.write('<script src="../js/jquery-1.9.1.min.js"><\/script>'); }
    </script>
      <?php
	try{
$promoid=$_GET['apv_promoid'];
$status=$_GET['pro_status'];
$user_id=$_SESSION['sales_username'];

$select = $mysqlconn->prepare("UPDATE airlinesalesmonitor.promotions set status=:status where promotionid=:promotionid");

 $select ->bindValue(":status", $status);
   $select ->bindValue(":promotionid", $promoid);
if($select->execute())
	{
    $select0 = $mysqlconn->prepare("SELECT *  FROM airlinesalesmonitor.promotions where promotionid=:promotionid");
 $select0 ->bindValue(":promotionid",$promoid);
 $select0->setFetchMode(PDO::FETCH_OBJ);
$select0->execute();
 $email =new email();
   echo "<div class='alert alert-success'>Your approval is recorded.</div><br/>"; 
while( $enregistrement1 = $select0->fetch(PDO::FETCH_ASSOC)) 
{
$to=$enregistrement1['creator'].'@rwandair.com';
$subject="PROMOTION APPROVAL REQUEST";	
//chdir('/opt/lampp/htdocs/flightinfo/services/dist');
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
                            Your promotion request has been '.(($status==-2)? 'declined':'approved').'.</p>
            <fieldset style="width:98%;border:0px;border-bottom:2px solid #ddd;color:#4C4D4F; font-family:Cambria, Georgia, \'Times New Roman\', Times, serif;font-size:16px; line-height:24px; text-align:left;">
            <legend style="border-bottom:2px solid #ddd;width: 100%;color:#4C4D4F; font-family:Cambria, Georgia, \'Times New Roman\', Times, serif;font-size:16px; line-height:24px; text-align:left;">Details</legend>
                <table width="100%" border="0" cellspacing="3" cellpadding="2" ><tr><td>Promotion Name :</td><td>'.$enregistrement1['promoTitle'].'</td></tr>'
        . '<tr><td>From :</td><td>'.$enregistrement1['creator'].'</td></tr><tr><td colspan="2">Fares Details :'.$enregistrement1['body'].'</td></tr></table> 
            </fieldset></td>
        </tr><tr><td><a href="http://'.$_SERVER['HTTP_HOST'].'/salesMonitor/index.php?app=promo">Go to PromoApp</a></td><td></td></tr></table>
      <table width="60%" cellspacing="0" cellpadding="0" style="background-color:rgb(000,082,156); height: 80px;margin-bottom:50px;border-top: 4px rgb(253,223,15) solid;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;">
        <tr><td align="center"><table width="60%" height="88" border="0" cellspacing="0" cellpadding="0" >
      <tr><td style="text-align:left;padding-left:40px;padding-top:40px;padding-bottom:40px;padding-right:40px;"></td></tr></table></td></tr></table></td></tr></table></body>';
$nameto=  str_replace('.', ' ', $to);
$email::send_email($filecontent,$to,$nameto,$subject);   
}
    
    
echo '1';
 //echo $request_id;
}
else
	{
echo '0';
}

	}
	catch(Exception $e)
	{
	echo $e;
	}
}
else
{
    echo "<div style='margin:auto;width:40%'>";
    include '../view/login.php';
    echo "</div>";
    
}
?>

    <script type="text/javascript">

jQuery(document).ready(function ($) {
$('#btn-login').click(function()
			{
var request_id="<?php echo $_GET['request_id'];?>";
var action="<?php echo $_GET['action'];?>";
	console.log('click login');
	var user=$('#login-username').val();
		var pass=$('#login-password').val();
		console.log(user);
		console.log(pass);
	



	$.ajax({
                url:'https://app.rwandair.com:442/services/authentication.php',
                 data: 'key=Nas!2015&user='+user+'&pass='+pass,
                dataType: "json",
                async: false,
				cache: false,
            success: function(result) {

				console.log(result)
				// return 1 if authticated 
				//return 0 if not
				if(result==1)
					{
					window.location.href='../jquery/authentication.php?username='+user+"&page=1&request_id="+request_id+"&action="+action;
				
				
				
				}
				
            },
            });
			});
                    });
</script>