<?php
session_start(); 
set_time_limit(0);   
if((isset($_SESSION['custreg_username']) ) and isset($_GET['link']))
{                
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RwandAir Events Registration</title>
	<link rel="icon" href="https://www.rwandair.com/images/rwandair.png" />
</head>
<body style="width:100%;height:1000px;">
<?php 
if(strpos($_GET['link'],".jpg")===false || strpos($_GET['link'],".jpeg")===false || strpos($_GET['link'],".png")===false || strpos($_GET['link'],".gif")===false){
?>
<iframe src="https://docs.google.com/gview?url=<?php echo $_GET['link'];  ?>&embedded=true" style="width:100%;height:100%;"></iframe>
<?php
} else{
	?>
	<!--<iframe src="</?php echo $_GET['link'];  ?>" style="width:70%;height:70%;"></iframe>galleryimg="no"-->
	<img src="<?php echo $_GET['link'];  ?>"  oncontextmenu="return false;" style="margin:auto;"/>
<?php
}
?>
</body>
<?php 
}
?>