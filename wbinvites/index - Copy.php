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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Passenger Feeds</title>
	<link rel="icon" href="https://www.rwandair.com/images/rwandair.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/themes/base/jquery.ui.all.css">
        <link rel="stylesheet" href="./css/build.css" />
	<!--<script src="./js/jquery-1.10.2.js"></script>-->
         
	
	

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script src="./js/ui/jquery.ui.tabs.js"></script>
  <script type="text/javascript"  src="./js/jquery.jstree.js"></script>

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
 /*     
  .ui-tabs-vertical { width: 55em;}
  .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 18m;background-color: #00529b; }
  .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0;background-color: #00529b !important; }
  .ui-tabs-vertical .ui-tabs-nav li a { display:block;width: 100%;height: 100%; }
  .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; }
  .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 50em;float: right;position: absolute;top: 1%;left: 28%;}
  */
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
<!-- start of Ariella Google analytics-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64879055-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- End of Ariella Google Analytics-->
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

</head>

<body>

                                    <div id='header' style="background-color:#00529b;">
<a href='https://www.rwandair.com'><img src="https://www.rwandair.com/images/logo.jpg" width="271" height="76" border="0" alt=""></a>
</div>
                    <form name='form1' id="form1"  method='post' enctype='multipart/form-data'>        

                      <div class="container">
        	<div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item active">
                    <h7 class="glyphicon glyphicon-plane"></h7>&nbsp;Welcome
                </a>
                   <a href="#" class="list-group-item">
                  <h7 class="glyphicon glyphicon-plane"></h7>&nbsp;Registration Form
                </a>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <!-- welcome -->
                <div class="bhoechie-tab-content active">
                    <div style="text-align:center;" class="innercontent">
            <h3>Welcome to RwandAir Invitation Form</h3>
            <p>We thank you for sharing with us your experience about flying with RwandAir.</p>
            <p>This Survey will take Maximum 5 Minutes.</p>
        </div>  <!--style="position: absolute; bottom: 0px;border: 1px solid #000000;"-->
       <div>
                <input type="button" class="col-lg-2 col-md-3 col-sm-4 col-xs-4 btn buttons nexttab" value="Next"/>
            </div>  
                </div>
                <!--Identification & Submit-->
<div class="bhoechie-tab-content">
    <div class="innercontent">
        <fieldset style="margin: 10px 0px;"   class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<legend>Please fill you personal info to register</legend>
 <div class="form-horizontal">
     <div class="row">
    <div class="col-sm-6 col-lg-4">
        <div class="form-group">
          <label for="firstname" class="col-md-4 control-label"><font color='red'>*</font>First Name :</label>
          <div class="col-md-8">
            <input type='text' name='firstname' id='firstname' class='form-control' value='' required />
          </div>
        </div>
      </div>
        <div class="col-sm-6 col-lg-4">
        <div class="form-group">
            <label for="lastname" class="col-md-4 control-label"><font color='red'>*</font>Last Name :</label>
<div class="col-md-8">
     <input type='text' name='lastname' id='lastname' class='form-control' value='' required />
     <input type='hidden' name='gender' id='gender' class='form-control' value=''/>
      </div>
      </div>
     </div>
     </div>
     <div class="row">
      <div class="col-sm-6 col-lg-4">
        <div class="form-group">
          <label for="from" class="col-md-4 control-label"><font color='red'>*</font>Personal Email :</label>
          <div class="col-md-8">
            <input type='email' name='email' id='email' class='form-control' value='' required  placeholder='email address' />
          </div>
        </div>
      </div>
 <div class="col-sm-6 col-lg-4">
        <div class="form-group">
          <label for="phonenumber" class="col-md-4 control-label"><font color='red'>*</font>Phone Number :</label>
          <div class="col-md-8">
            <input type="phone" name='phonenumber' id='phonenumber' class="form-control" required />
          </div>
        </div>
      </div>
    </div>
        <div class="row">
        <div class="col-sm-6 col-lg-4">
        <div class="form-group">
          <label for="passport" class="col-md-4 control-label"><font color='red'>*</font>Passport Number :</label>
          <div class="col-md-8">
            <input type='text' class="form-control" name='passport' id='passport' required/>
          </div>
        </div>
      </div>
<div class="col-sm-6 col-lg-6">
        <div class="form-group">
          <label for="cpypassport" class="col-md-4 control-label"><font color='red'>*</font>Passport Copy :</label>
          <div class="col-md-8">
              <input type='file' name='cpypassport' id="cpypassport" class="form-control" />
          </div>
        </div>
      </div>
<div class="col-sm-3 col-lg-2">
        <div class="form-group">
          
        </div>
      </div>
    </div>
    
    <div class="row">
         <div class="col-sm-7 col-lg-5">
        <div class="form-group">
          <label for="confirmation" class="col-md-5 control-label">Confirmation :</label>
          <div class="col-md-7">
          <div class="radio radio-info">
              <input type="radio" name="confirmation" id="confirmation" value="1" checked="checked" onclick="flywithselect(this.value);">
  <label>Flying alone</label>
</div>
<div class="radio radio-info">
  <input type="radio" name="confirmation" id="confirmation" value="2" onclick="flywithselect(this.value);">
  <label>Flying with someone</label>
</div>
              <div class="radio radio-info">
                  <input type="radio" name="confirmation" id="confirmation" value="3" onclick="flywithselect(this.value);">
  <label>Not sure</label>
</div>
          </div>
        </div>
      </div>
      <div class="col-sm-5 col-lg-3">
        <div class="form-group">
            <label for="members" class="col-md-7 control-label" id="lblmembers" style="visibility: hidden;">Accompanied by :</label>
          <div class="col-md-5">
              <input type='number' name='members' min="0" max="10" id="members" style="visibility: hidden;" class="form-control" value="0" />
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4">
        <div class="form-group">
        </div>
      </div>
        <input type='hidden' class="form-control" name='eventflight' id="eventflight" value="Abidjan Launch"/>
     </div>
    
  </div>               
    </div>
<div>
                <input type="button" class="col-lg-2 col-md-3 col-sm-4 col-xs-4 btn buttons prevtab" value="Prev"/>
                <input name='submit' type='submit' id='submitform' class="col-lg-2 col-md-3 col-sm-4 col-xs-4 btn buttons " value='Submit' />
            </div>
  
                     
                </div>
            </div>
        </div>
  </div>
</div>
                    </form>


                    <div class="message" style="width:100%;">


</div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">×</span>
    <div style="text-align: center">
    <h3>RwandAir Flight Feedback</h3>
    <p>Thank you for completing this form.</p>
    <p>Click <a href="https://www.rwandair.com">here</a> to go to RwandAir website</p>
    </div>
  </div>

</div>

  
    </div>
</body>
</html>

<script type="text/javascript">
    
    function flywithselect(value){
     if(value=="2"){
     $("#members").css("visibility","visible");
     $("#lblmembers").css("visibility","visible");
 }else{
      $("#members").val("0");
      $("#members").css("visibility","hidden");
     $("#lblmembers").css("visibility","hidden");
 }
 } 
 
 function upload(){
	//start  upload<form action='' method='post' id='fileuploadfrm' name='fileuploadfrm' enctype='multipart/form-data'>
	var formData = new FormData($('#form1')[0]);
formData.append('uploadfile', $('input[type=file]')[0].files[0]);
formData.append('passport',$("#passport").val());	          
        var msge="";
		$.ajax({
          type: "POST",
          url: "jquery/files.php",
          data: formData,
          //use contentType, processData for sure.
          contentType: false, 
          processData: false,
         
            success: function(msg) {				
               console.log(msg);  
               msge=msg;
            },
            error: function(msg) {                   
                console.log("upload error :"+msg);
                msge="Uplad Error :"+msg;
            }
        });
        return msge;
//end of upload	
}

var modal = document.getElementById('myModal');
$(document).ready(function() {
        $('#overlay').hide();
    var over = '<div id="overlay"> <img id="loading1" src="./images/loading4.gif"></div>';
     //$('#status').hide();
      $( "#date" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true, //this option for allowing user to select from year range
	  dateFormat: 'dd-mm-yy',
          maxDate: '0'
    });
    //$('#ui-datepicker-div').css("width:100%");
    
    $('input[type="text"]').focus(function() {
    $(this).addClass("focus");
});
$('input[type="number"]').focus(function() {
    $(this).addClass("focus");
});
$('input[type="radio"]').focus(function() {
    $(this).addClass("focus");
});
$('input[type="email"]').focus(function() {
    $(this).addClass("focus");
});
$('input[type="date"]').focus(function() {
    $(this).addClass("focus");
});
 
$('input[type="text"]').blur(function() {
    $(this).removeClass("focus");
});
$('input[type="number"]').blur(function() {
    $(this).removeClass("focus");
});
    
    $('input[type="radio"]').blur(function() {
    $(this).removeClass("focus");
});
 $('input[type="email"]').blur(function() {
    $(this).removeClass("focus");
});
 $('input[type="date"]').blur(function() {
    $(this).removeClass("focus");
});
    
    $("#form1").change(function(){
        $('#status').hide();
        if($("#radio_63:checked").val()==="5")
        {
            
           
            $("#other_63").attr("type", "text");
        }
        else
        {
            
            $("#other_63").attr("type", "hidden");
            $("#other_63").val("");
        }
        if($("#radio_61:checked").val()==="7")
        {
            
           
            $("#other_61").attr("type", "text");
            
        }
        else
        {
            
            $("#other_61").attr("type", "hidden");
            $("#other_61").val("");
        }
        
        
        //alert($("#radio_63:checked").val());
        
    });
   
    
    
      $("#form1").submit(function(event){
          event.preventDefault;
		//$('#overlayin').html(over);
       //$('#overlay').show();
       //$(over).appendTo('body');
    	 
          if($("#email").val()!='')
          {
              var $email = $("#email"); //change form to id or containment selector
var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
if ($email.val() == '' || !re.test($email.val()))
{
    //$('#overlay').remove();
    alert('Please enter a valid email address.');
    
      return false; 
}
              
          }
      //alert("ok");
          $.post( 
             "jquery/insert_values.php",
             { firstname: $('#firstname').val(),lastname: $('#lastname').val(), gender:$('#gender').val(), email: $('#email').val(),phonenumber: $('#phonenumber').val()
              ,passport:$("#passport").val(),psptcopy:  $("#cpypassport").val(),confirmation: $("#confirmation:checked").val(), members:$('#members').val()
              ,eventflight:$("#eventflight").val()
         },
             function(data) {
                //alert("inside");
                console.log(data);
                if(data==="0")
                {
                alert("Unable to submit the form.");
				
                  return false; 
            }
           if(data.indexOf("Error") !== -1)
                {
                    alert("Unable to submit the form.");
                }else{
                    var ret=upload();
                    alert("Upload Result :"+ret);
                    //alert("Unable to submit the form.")
                }
                modal.style.display = "block";	
                                
                                $('#form1')[0].reset();
                                $('#overlay').remove();
                  return false; 
             }
         
          );
             
     return false; 
      });

      
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