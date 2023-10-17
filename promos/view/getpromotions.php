<?php
session_start();
if(isset($_SESSION['sales_username']) )
{

	require_once('../../class/db.php');
	$classconn=new db();
	$mysqlconn=$classconn::mysql_connect();
	?>

<body>
<table class="table demo" style="font-size:small;" id="promotions">

					<thead>
						<tr>
							<th data-type="numeric" data-sort-initial="true">
								Promotion ID
							</th>
							<th data-sort-ignore="true" >
								Promotion Title
							</th>
							<th data-hide="all">
								Details
							</th>
                                                        <th>
								Creation Date
							</th>
							<th>
								Status
							</th>
							<th>
							Action
							
							</th>

						</tr>
					</thead>

					<tbody>



	<?php

$select = $mysqlconn->prepare("select * from promotions where creator=:user order by creation_date desc");
 $select ->bindValue(":user", $_SESSION['sales_username']);
    $select ->setFetchMode(PDO::FETCH_ASSOC);
$select->setFetchMode(PDO::FETCH_OBJ);
$select->execute();

while( $enregistrement = $select->fetch(PDO::FETCH_ASSOC)) 
{		
			
?> <tr>
                          <td >
								 <?php echo $enregistrement['promotionid']; ?>
							</td>
							<td >
								<?php echo $enregistrement['promoTitle']; ?>
                                                        </td>
                                                        <td  style="width:80%;">
								<?php echo $enregistrement['body']; ?>
							</td>
							<td>
								<?php echo $enregistrement['creation_date']; ?>
							</td>
							
								<?php
                                                                 if($enregistrement['status']==-2){
                                                                echo "<td>Declined by Approver</td>";
//                                                                if($_SESSION['sales_userrole']!=2){
//                                                                echo "<td><button class='btn btn-small' style='padding: 1px;margin: 1px;' ";
//                                                                echo "onclick='getTemplates(".$enregistrement['promotionid'].");'>Choose Template</button></td>";
//                                                                }else {
                                                                    echo "<td> - </td>"; 
                                                                //}
                                                                }
                                                                else if($enregistrement['status']==-1){
                                                                echo "<td>No template attached</td>";
                                                                if($_SESSION['sales_userrole']!=2){
                                                                echo "<td><button class='btn btn-small' style='padding: 1px;margin: 1px;' ";
                                                                echo "onclick='getTemplates(".$enregistrement['promotionid'].");'>Choose Template</button></td>";
                                                                }else {echo "<td> - </td>";}
                                                                }
                                                                else if($enregistrement['status']==0){
                                                                echo "<td>Waiting for approval</td>";
                                                                if($_SESSION['sales_userrole']==2){
                                                                echo "<td><button class='btn btn-small' style='padding: 1px;margin: 1px;' ";
                                                                echo "onclick='setApproval(".$enregistrement['promotionid'].",1);'>Approve</button>";
                                                                echo "<button class='btn btn-small' style='padding: 1px;margin: 1px;' ";
                                                                echo "onclick='setApproval(".$enregistrement['promotionid'].",0);'>Decline</button></td>";
                                                                }  else {
                                                                   echo "<td> - </td>"; 
                                                                }
                                                                }else if($enregistrement['status']==1){
                                                                echo "<td>Waiting to be sent</td>";
                                                                if($_SESSION['sales_userrole']!=2){
                                                                echo "<td><button class='btn btn-small' style='padding: 1px;margin: 1px;' ";
                                                                echo "onclick='sendEmails(".$enregistrement['promotionid'].");'>Send Email</button></td>";
                                                                }else {
                                                                   echo "<td> - </td>"; 
                                                                }
                                                                }else if($enregistrement['status']==2){
                                                                    echo "<td>Promotion published</td>";
                                                                    if($_SESSION['sales_userrole']!=2){
                                                                echo "<td><button class='btn btn-small' style='padding: 1px;margin: 1px;visibility:none' ";
                                                                echo "onclick='ViewRecipients(".$enregistrement['promotionid'].");'>View Recipients</button></td>";
                                                                    }else{
                                                                       echo "<td> - </td>"; 
                                                                    }
                                                                }
                                                                ?>
                                                            
							
							
</tr>                                       

<?php
}
?>
</tbody>

</table>
  <script type="text/javascript">
        $(function () {
			
			jQuery.ajax({async: false});
			$('#promotions').footable();
            $('#promotions .sort-column').click(function (e) {
                e.preventDefault();

                //get the footable sort object
                var footableSort = $('#promotions').data('footable-sort');

                //get the index we are wanting to sort by
                var index = $(this).data('index');
                footableSort.doSort(index, 'toggle');		
        });

		

		
	
});

function getTemplates(value){
	 window.open("http://<?php echo $_SERVER['HTTP_HOST'];?>/salesMonitor/promos/view/gettemplates.php?promoid="+value,"LitsOfTemplates", "width=1000 height=500 top=150 left=150");
return false;
}

function sendEmails(value){
	 window.open("http://<?php echo $_SERVER['HTTP_HOST'];?>/salesMonitor/promos/view/processemails.php?promoid="+value,"sendEmails", "width=1000 height=500 top=150 left=150");
return false;
}
function setApproval(promoid, action){
    alert("Promo"+promoid+"  Action"+action);
    if(action==1){
        			           $.ajax({   
                type: 'GET',
                url: 'jquery/approvalrequest.php',
                data:'promoid='+promoid+'&status=1',  
                dataType: "html",
                async: false,
				cache: false,
            success: function(result) {
				if(result.trim()!=0)
					{
					console.log("sucess");
					promoid=result.trim();
				}
				else
					{
				console.log("falied");
				}
				
            },
            });
    }else{
        $.ajax({   type: 'GET',
                url: 'jquery/approvalrequest.php',
                data:'promoid='+promoid+'&status=-2',  
                dataType: "html",
                async: false,
				cache: false,
            success: function(result) {
				if(result.trim()!=0)
					{
					console.log("sucess");
					promoid=result.trim();
				}
				else
					{
				console.log("falied");
				}
				
            },
            });
    }
    window.location.reload();
}
</script>
<?php
}
?>
