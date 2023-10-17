<?php 
session_start();
set_time_limit(0);
	require_once('../../class/db.php');
         require_once('../class/emailclass.php');
         
	$classconn=new db();
	$mysqlconn=$classconn::mysql_connect();
        $oracleconn=$classconn::ora_airline_connect();
        
         ?>
<head><title>Promotion Center - List of templates</title>
    <script src="../js/jquery-1.11.3.min.js" type="text/javascript"></script>
</head>
<body>
    <div id="container" style="width:1200px">
<div id="recipients" style="float:left; position: absolute;left: 10px; top: 10px;width: 45%;border-color: #000000;">
        <div style="width: 95%;"> <span style=" width: 100%">CURRENT RECIPIENTS IN <?php echo $_SESSION['country']; ?></span><hr/></div>    
       <?php
        
        $select4 = $oracleconn->prepare("select (a.firstname||' ' ||a.lastname) names,NVL(a.BUSINESS_EMAIL_ADDRESS,a.HOME_EMAIL_ADDRESS) email,
 b.ISO as FROM_BATCH from DREAMMILES_MSTR_CLNT_TMP a, COUNTRY b
where decode(to_number(replace(a.mobile_country_code,'+','')),257,257,237,237,242,242,243,243,241,241,233,233,254,254,234,234,250,250,27,27,249,249,255,255,256,256,971,971,0) 
=b.phonecode and (a.BUSINESS_EMAIL_ADDRESS IS NOT NULL OR a.HOME_EMAIL_ADDRESS IS NOT NULL) AND b.ISO='RW' and ROWNUM<=4
UNION
select (r.FIRSTNAME||' '||r.LASTNAME) names, r.EMAIL, c.\"FROM\" as FROM_BATCH from comm_reciepient r, COMM_BATCH c 
where r.BATCH_ID=c.ID and r.EMAIL IS NOT NULL and c.\"FROM\"='RW'");
 $select4->setFetchMode(PDO::FETCH_OBJ);
 $select4->execute();
$items=0;
echo '<input type="hidden" name="promoid" id="promoid" value="'.$_GET['promoid'].'" />';
echo '<select id="recipients"  name="recipients[]" multiple=multiple size=23 style="width:90%;">';
while( $enregistrement4 = $select4->fetch(PDO::FETCH_ASSOC)) 
{
    $mylist[$items]=$enregistrement4['EMAIL'];
    echo '<option value="'.$enregistrement4['EMAIL'].'" selected><b>'.$enregistrement4['NAMES'].'</b> | '.$enregistrement4['EMAIL'].'</option>';
    $items++;
    
}
echo '</select>';
?>
        <div style="width: 95%; float: left;">Total recipients : <?php echo $items; ?>&nbsp;&nbsp;<input type="button" id="btnSend" value="Send"/></div>
        <script type="text/javascript">
        $('#btnSend').click(function(){
            var foo = []; 
            $('#recipients :selected').each(function(i, selected){ 
                foo[i] = $(selected).text(); 
                console.log(foo[i].substring(0,foo[i].indexOf(' | ')));
                console.log(foo[i].substring(foo[i].indexOf(' | ')+3));
                $.ajax({   
                type: 'GET',
                url: '../jquery/sendEmailMsg.php',
                data:'promoid='+$('#promoid').val()+'&email='+foo[i].substring(foo[i].indexOf(' | ')+3)+'&names='+foo[i].substring(0,foo[i].indexOf(' | '))+'&status=1',  
                dataType: "html",
                async: false,
				cache: false,
            success: function(result) {
				if(result.trim()!=0)
					{
				$('#logs').append(result.trim());
                                $.ajax({   
                type: 'GET',
                url: '../jquery/approvalrequest.php',
                data:'promoid='+$('#promoid').val()+'&status=2',  
                dataType: "html",
                async: false,
				cache: false,
            success: function(result) {
				if(result.trim()!=0)
					{
					$('#logs').append(" -- Success<br/>");
                                        window.opener.location.reload();
				}
				else
					{
				console.log("falied");
				}
				
            },
            });
				}
				else
					{
				$('#logs').append(result.trim()+" -- Failed<br/>");
				}
				
            },
            });
            });
        });
        </script>
</div>
    <div id="sendlog" style="float:right; width: 49%;border-color: #000000;">
     <div style="width: 100%;"> <span style="width: 100%">Logs of Sending E-mails</span><hr/></div>
     <div id="logs" style="width: 99%;overflow-y: auto;font-size:small;"></div>
 </div>
        </div>
</body>