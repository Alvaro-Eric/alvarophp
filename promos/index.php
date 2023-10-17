
<?php
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

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Promotion Center</title>
	<link rel="icon" href="../images/" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/jquery.autocomplete.js"></script>
        <link type="text/css" rel="stylesheet" href="css/demo.css">
        <link type="text/css" rel="stylesheet" href="../css/jquery-te-1.4.0.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/jquery-te-1.4.0.min.js" type="text/javascript" charset="utf-8"></script>  
    <link href="../css/footable.core.css?v=2-0-1" rel="stylesheet" type="text/css"/>
    <link href="../css/footable-demos.css" rel="stylesheet" type="text/css"/>
    <script src="../js/footable.js?v=2-0-1" type="text/javascript"></script>
    <script src="../js/footable.paginate.js?v=2-0-1" type="text/javascript"></script>
       <link href="css/loading.css" rel="stylesheet" type="text/css"/>
        <style>
   .show_hide {
    display:none;
}         
.a{
    font: 2em Arial;
    text-decoration: none
}
            
            #loadingDiv{
display:none;
}
* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
</style>
<script type="text/javascript">
// Loading div animation
    $(document).ajaxStart(function(){
          $("#loadingDiv").css("display","block");
        });
        $(document).ajaxComplete(function(){
          $("#loadingDiv").css("display","none");
        });
		</script>
</head>
<body>

<div class="container" >

  <div class="bs-example">
<nav role="navigation" class="navbar navbar-default">
	<div id='header'>

  <a href='https://www.rwandair.com'><img src="../images/logo.jpg"  style="width: 30%; height: 30%;" alt=""></a>
    <font color='ffffff'></font>
    
  </div>
  <?php
  if(isset($_SESSION['sales_username']))
  {
  ?>
   <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="../" class="navbar-brand">Sales Monitor</a>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
        
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="">Setup <b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                                                <li><a href="#" class='targets'>Manage Promos</a></li>
                        
                       
                    </ul>
                </li>
            </ul>
           
            <ul class="nav navbar-nav navbar-right">
				
                <li><a href="http://www.rwandair.com/?rubrique16">Contact Us</a> </li>
				<li><a href="./?logout">Logout</a> <?php echo $_SESSION['sales_username']; ?></a></li>
			

            </ul>
        </div>
    </nav>
 
  <div id="loadingDiv">
  <form action="#">
        Please wait...
  <div id="facebookG">
<div id="blockG_1" class="facebook_blockG">
</div>
<div id="blockG_2" class="facebook_blockG">
</div>
<div id="blockG_3" class="facebook_blockG">
</div>
</div>
  </form>
</div>
</div>
    <div id="alert" style="border-color:#ff4733;padding:3px;"></div>
    <div class="panel-group" style="width:80%;margin:5px auto;">
        <div class="panel panel-default" id="newpanel">
           
            <div class="panel-heading"> 
                <a href="#" id="arrow-toggle" style="border-radius: 50%;text-decoration:none;color:#606466;">
                <img src="images/arrow-down.png">
                <img src="images/arrow-up.png" class="up" style="display: none;">
                <span style="margin:2px 5px;font-size:13pt;font-weight: bold;">New Promotion</span>
                </a></div>
    <div class="panel-body" id="new">
        <div id="dvContent_1" style="width: 90%;margin: auto;">

        </div>       
    </div>
  </div>
  <div class="panel panel-default" id="listpanel">
       <div class="panel-heading">
           <a href="#" id="arrow-toggle1" style="border-radius: 50%;text-decoration: none;color:#606466;">
                <img src="images/arrow-down.png" class="down" style="display: none;">
                <img src="images/arrow-up.png">
                <span style="margin:2px 5px;font-size:13pt;font-weight: bold;">List of promotions</span>
           </a>
           </div>
       <div class="panel-body" id="list">
        <div id="dvContent_2" style="width: 90%;margin: auto;">
        
        
    </div></div>
  </div>
</div>
    <hr/>
    <p>&copy;<?php $today = date("Y-m-d");$date = DateTime::createFromFormat("Y-m-d", $today);
echo $date->format("Y"); ?> - RwandAir Ltd.</p>    
<?php
  }
?>

</div>
</body>
</html>
<script>
jQuery(document).ready(function ($) {
  $('#new').toggle();

    $('#arrow-toggle').click(function(event) {
        event.preventDefault();
        $('img:visible', this).hide().siblings().show();
        $('#new').toggle($('img:visible').is('.up'));
    });

         $('#arrow-toggle1').click(function(event) {
        event.preventDefault();
        $('#list').toggle($('img:visible').is('.down'));
        $('img:visible', this).hide().siblings().show();
        
    });

	$("#dvContent_1").load('view/newpromo.php');
        $("#dvContent_2").load('view/getpromotions.php');
/*
        //$("#new").toggle();
        */
    });
//        $("#newpanel").click(function(){
//            $("#new").toggle();
//        });
//         $("#listpanel").click(function(){
//            $("#list").toggle();
//        });
</script>

