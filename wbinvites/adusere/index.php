<?php
session_start();
$_SESSION['username']='pub';
if(isset($_GET['logout']))
    {
    
    session_destroy();
	
    ?>
    <script type="text/javascript">
    window.location.href = ".";
    </script>
    <?php
  }
  ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RwandAir Events Registration</title>
	<link rel="icon" href="https://www.rwandair.com/images/rwandair.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/themes/base/jquery.ui.all.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script src="../js/ui/jquery.ui.tabs.js"></script>

	<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	</script>
        
		<script>
  $(function() {
    $( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
    
  // $("#tabs").tabs();
$(".nexttab").click(function() {
    var active = $( "#tabs" ).tabs( "option", "active" );
    $( "#tabs" ).tabs( "option", "active", active + 1 );

});

$(".prevtab").click(function() {
    var active = $( "#tabs" ).tabs( "option", "active" );
    $( "#tabs" ).tabs( "option", "active", active - 1 );

});
  });
  
  </script>
  
  <style>
  .choices{
       text-align: center;
  }
  
  .buttons{
      background-color: #00529b;
      border-radius: 3px;
      margin:5px 2px;
      color: #ffffff;
      //width: 15%;
      cursor: pointer;
      font-weight: bold;
  }
  
  .ulchoices{
      list-style: none;
      
  }
  
  .nexttab{
      float: right;
      margin-right: 40px;
  }
  .prevtab{
      float: left;
      margin-right: 0px; 
  }
  
  #submitform{
     float: right;
      margin-right: 40px; 
  }
  
  .innercontent{
      margin-bottom:50px;
      margin-left:0px;
      margin-right:0px;
  }
  
  html {
   margin: auto;
   height: 100%;
   width: 100%;
}

body {
   margin:auto;
   min-height: 100%;
   width: 100%;
   background-color: #ffffff;
font-family:Arial, Helvetica, sans-serif; 
font-size:13px;
}
  
 
  

  </style>
   <style>
                    .focus {
    border: 2px solid #AA88FF;
    background-color: #FFEEAA;
}
    .error {
    border: 2px solid #ff0000;
    background-color: #FFEEAA;
}
#loading{
display:none;
margin-left:145px
}

.info, .success, .warning, .error, .validation {
border: 1px solid;
margin: 10px 0px;
padding:15px 10px 15px 50px;
background-repeat: no-repeat;
background-position: 10px center;
}
.info {
color: #00529B;
background-color: #BDE5F8;
background-image: url('./images/info.png');
width: 1050px;
}
.success {
color: #4F8A10;
background-color: #DFF2BF;
background-image:url('./images/success.png');
width: 998px;
}
.stage {
color: #4F8A10;
background-color: #d6d6d6;
width: 998px;
}
.warning {
color: #9F6000;
background-color: #FEEFB3;
background-image: url('./images/warning.png');
width: 1050px;
}
.error {
color: #D8000C;
background-color: #FFBABA;
background-image: url('./images/error.png');
width: 1050px;
}
#overlay {
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    background: #000;
    opacity: 0.8;
    filter: alpha(opacity=80);
}
#loading1 {
    width: 50px;
    height: 57px;
    position: absolute;
    top: 50%;
    left: 50%;
    margin: -28px 0 0 -25px;
}



                </style>
        <style>
            
/*  bhoechie tab */
div.bhoechie-tab-container{
  //z-index: 10;
  background-color: #ffffff;
  padding: 0 !important;
  border-radius: 4px;
  -moz-border-radius: 4px;
  border:1px solid #ddd;
  margin-top: 5px;
  margin-left: 0px;
  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  background-clip: padding-box;
  opacity: 0.97;
  filter: alpha(opacity=97);
}
div.bhoechie-tab-menu{
  padding-right: 0;
  padding-left: 0;
  padding-bottom: 0;
}
div.bhoechie-tab-menu div.list-group{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a .glyphicon,
div.bhoechie-tab-menu div.list-group>a .fa {
  color: #00529b;
}
div.bhoechie-tab-menu div.list-group>a:first-child{
  border-top-right-radius: 0;
  -moz-border-top-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a:last-child{
  border-bottom-right-radius: 0;
  -moz-border-bottom-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a.active,
div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
div.bhoechie-tab-menu div.list-group>a.active .fa{
  background-color: #00529b;
  background-image: #00529b;
  color: #ffffff;
}
div.bhoechie-tab-menu div.list-group>a.active:after{
  content: '';
  position: absolute;
  left: 100%;
  top: 50%;
  margin-top: -13px;
  border-left: 0;
  border-bottom: 13px solid transparent;
  border-top: 13px solid transparent;
  border-left: 10px solid #00529b;
}

div.bhoechie-tab-content{
  background-color: #ffffff;
  /* border: 1px solid #eeeeee; */
  padding-left: 0px;
  padding-top: 5px;
  height: 100%;
}

div.bhoechie-tab div.bhoechie-tab-content:not(.active){
  display: none;
}



        </style>
        <style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
        
        <script type="text/javascript">
            $(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
     $('.nexttab').click(function(e){
  e.preventDefault();
        //$("div.bhoechie-tab-menu>div.list-group>a").siblings('a.active').removeClass("active");
        var index = $("div.bhoechie-tab-menu>div.list-group>a.active").index();
        console.log("Before index .. "+index);
        $("div.bhoechie-tab-menu>div.list-group>a").siblings('a.active').removeClass("active");
        $("div.bhoechie-tab-menu>div.list-group>a").eq(index+1).addClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index+1).addClass("active");
        console.log("After index .. "+index);
});

  $('.prevtab').click(function(e){
  e.preventDefault();
      var index = $("div.bhoechie-tab-menu>div.list-group>a.active").index();
        console.log("Before index .. "+index);
        $("div.bhoechie-tab-menu>div.list-group>a").siblings('a.active').removeClass("active");
        $("div.bhoechie-tab-menu>div.list-group>a").eq(index-1).addClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index-1).addClass("active");
        console.log("After index .. "+index);
});
});
        </script>
         <?php if(isset($_SESSION['custreg_username'])){ ?>
<script type="text/javascript">
        function getCustomers(){
           
            $.ajax({
                url: 'getallcustomers.php',
                data:'action=list',
                dataType: "html",
                async: false,
				cache: false,
				success: function(result) {
                                    $('#custdata').html(result);
				   //console.log(result);
            },
                error:function(result){
                    console.log("error :: "+result);
                }
            });
       }
       
       function getFlightMates(pspt){
       alert("OK");
           $.ajax({
                url: 'getflightmates.php',
                data:'action=list&pc='+pspt,
                dataType: "html",
                async: false,
				cache: false,
				success: function(result) {
                                    $('#matesdata').html(result);
				  modal.style.display = "block";
            },
                error:function(result){
                    console.log("error :: "+result);
                }
            });
   }
   
   function previewpage(fileid){
	 $.ajax({
                url: 'preview.php',
		data:'id='+fileid,
                dataType: "html",
                async: false,
				cache: false,
            success: function(result) {
				console.log(result);
				
var win = window.open('http://localhost:81/wbinvites/adusere/viewdocs.php?link='+result, '_blank');
if (win) {
    //Browser has allowed it to be opened
    win.focus();
} else {
    //Browser has blocked it
    alert('Please allow popups for this website');
}
            },
                error:function(result){
                    console.log("error "+result.d);
                }
            });
			$('#emprofile').show();
			return false;
}
   
 
</script>
 <?php } ?>
</head>
 <?php if(!isset($_SESSION['custreg_username'])){ ?> 
<body>
    <?php } if(isset($_SESSION['custreg_username'])){ ?>
<body onload="getCustomers();" >
    <?php }  ?>

                                    <div id='header' style="background-color:#00529b;">
<a href='https://www.rwandair.com'><img src="https://www.rwandair.com/images/logo.jpg" width="271" height="76" border="0" alt=""></a>
<div style="float:right;margin-right: 100px;color:#ffffff;"><h4>RwandAir Events Registration</h4></div>
</div>      

                      <div class="container">
        	<div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
              <div class="list-group">
                 <?php if(!isset($_SESSION['custreg_username'])){ ?> 
                <a href="#" class="list-group-item active">
                    <h7 class="glyphicon glyphicon-plane"></h7>&nbsp;Welcome
                </a>
                 <?php } if(isset($_SESSION['custreg_username'])){ ?>
                  <a href="#" class="list-group-item active" onclick="getCustomers();">
                  <h7 class="glyphicon glyphicon-plane"></h7>&nbsp;Registered Customers
                </a>
                  <a href="#" class="list-group-item">
                  <h7 class="glyphicon glyphicon-plane"></h7>&nbsp;Rwandair Events
                </a>
                  <a href="#" class="list-group-item">
                  <h7 class="glyphicon glyphicon-plane"></h7>&nbsp;Logout
                </a>
                  <?php } ?>
              </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
                <!-- welcome -->
                <?php if(!isset($_SESSION['custreg_username'])){ ?>
                <div class="bhoechie-tab-content active">
                    <div style="text-align:center;" class="innercontent">
                            <div class="row" style="margin:auto;">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            
            <div class="account-wall"  style="width:60%;margin:5px auto;padding:5px;">
              <form class="form-signin" action='' method='post'>
                <input name='user' type="text" class="form-control"  style="width:100%;margin:3px;" placeholder="user name" required autofocus>
                <input name='pass'type="password" class="form-control"  style="width:100%;margin:3px;" placeholder="Password" required >
                <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin:10px 2px 20px 2px;" >
                    Sign in</button>
                </form>
            </div>
           
        </div>
    </div>
           
        </div>
                </div>
                
                <!---- Registered customers --->

                <?php } else {
                      ?>
                                    <div class="bhoechie-tab-content active">
                            <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div id="custdata"></div>
    </div>
           
        </div>
                </div> 
                
        <div class="bhoechie-tab-content">
                    <div style="text-align:center;" class="innercontent">
                            <div class="row" style="margin:auto;">
        <div class="col-sm-12 col-md-12 col-md-offset-12 col-lg-9"></div>
        </div></div>
        </div>   
                 <div class="bhoechie-tab-content">
                    <div style="text-align:center;" class="innercontent">
                            <div class="row" style="margin:auto;">
        <div class="col-sm-12 col-md-12 col-md-offset-12 col-lg-9"></div>
        </div></div>
        </div> 
                          <?php
                  }  ?>
            </div>
        </div>
  </div>
</div>
    
  <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">×</span>
    <div style="text-align: center">
    <h3>RwandAir Event Registration</h3>
    <div id="matesdata"></div>
    <p>Click <a href="https://www.rwandair.com">here</a> to go to RwandAir website</p>
    </div>
  </div>

</div>
  <script type="text/javascript">
   var modal = document.getElementById('myModal');
   
   
   $(document).ready(function() {
       
       
   });
   
  var span = document.getElementsByClassName("close")[0];

	  // When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
    //window.location.href="https://www.rwandair.com";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

  </script>
   <?php

if(isset($_POST['user']) and isset($_POST['pass']))
	{
	
//chdir('/opt/lampp/htdocs/flightinfo/salesMonitor/dist');
chdir('C:\xampp\htdocs\ADDMonitor\dist');
//exec('java -jar ./SWS_Client.jar \ sws_client.SWS_Client', $result);
//echo shell_exec('java -jar ./SWS_Client.jar \ sws_client.SWS_Client');
exec('java -cp dreammiles.jar airlinetraffic.Login "'.$_POST['user'].'" "'.$_POST['pass'].'" 2>&1', $output);

if($output[1]==1)
		{
	$_SESSION['custreg_username']=$_POST['user'];

require_once('dbclass.php');
	$classconn=new db();
	$mysqlconn=$classconn::mysql_connect();

$select = $mysqlconn->prepare("select username,role from users where username=:custreg_username and status=1");
 $select ->bindValue(":custreg_username", $_SESSION['custreg_username']);
    $select ->setFetchMode(PDO::FETCH_ASSOC);

$select->setFetchMode(PDO::FETCH_OBJ);
$select->execute();

while( $enregistrement = $select->fetch(PDO::FETCH_ASSOC)) 
{
        $_SESSION['custreg_userrole']=$enregistrement['role']; // used in promo approval
}

?>
<script type="text/javascript">
window.location = ".";

</script>
<?php

}
else
		{
echo "000000";

}
}
?>

</body>
</html>
