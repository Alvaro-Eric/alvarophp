<?php
session_start();
if(isset($_SESSION['sales_username']) )
{

	require_once('../../class/db.php');
	$classconn=new db();
	$mysqlconn=$classconn::mysql_connect();
	?>
<head>
    <title>PromoApp - List of templates</title>
    <script src="../js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
     <link href="../css/footable.core.css?v=2-0-1" rel="stylesheet" type="text/css"/>
    <link href="../css/footable-demos.css" rel="stylesheet" type="text/css"/>    
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/footable.js?v=2-0-1" type="text/javascript"></script>
    <script src="../js/footable.paginate.js?v=2-0-1" type="text/javascript"></script>
    <style>
        #iframe {
    //zoom: 0.15;
    -moz-transform:scale(0.75);
    -moz-transform-origin: 0 0;
    -o-transform: scale(0.75);
    -o-transform-origin: 0 0;
    -webkit-transform: scale(0.75);
    -webkit-transform-origin: 0 0;
}
    </style>
</head>
<body>
    
<table class="table demo" style="font-size:small;" id="templates">

					<thead>
						<tr>
							<th data-type="numeric" data-sort-initial="true">
								Template ID
							</th>
							<th data-sort-ignore="true" >
								Template Name
							</th>
							<th data-hide="all">
								
							</th>
							<th>
							Action
							</th>

						</tr>
					</thead>

					<tbody>



	<?php

$select = $mysqlconn->prepare("SELECT template_id, template_name, template_description FROM promo_template");
    $select ->setFetchMode(PDO::FETCH_ASSOC);
$select->setFetchMode(PDO::FETCH_OBJ);
$select->execute();

while( $enregistrement = $select->fetch(PDO::FETCH_ASSOC)) 
{		
			
    ?> <tr title="Template Preview">
                          <td >
								 <?php echo $enregistrement['template_id']; ?>
							</td>
							<td >
								<?php echo $enregistrement['template_name']; ?>
                                                        </td>
							<td>
                                                            <?php
                                                            $myFile = "template".$enregistrement['template_id'].".html"; // or .php   
                                                            $fh = fopen($myFile, 'w'); // or die("error");  
                                                            $stringData = $enregistrement['template_description'];;   
                                                            fwrite($fh, $stringData);
                                                            ?>
                                                            <a href="<?php echo $myFile;?>" class="btn btn-info" target="_blank">View in browser</a><br/>
                                                                        <iframe src="<?php echo $myFile;?>" id="iframe" style="width: 400px; height:400px;border:none;"></iframe>
							</td>
							<td>
							<button class="btn btn-small" onclick="chooseTemplate(<?php echo $enregistrement['template_id']; ?>);">Choose</button>
							</td>
</tr>                                       

<?php
}
?>
</tbody>

</table>
  <script type="text/javascript">


	
        $(function () {
			
			jQuery.ajax({async: false});
			$('#templates').footable();

            $('.sort-column').click(function (e) {
                e.preventDefault();

                //get the footable sort object
                var footableSort = $('#templates').data('footable-sort');

                //get the index we are wanting to sort by
                var index = $(this).data('index');

                footableSort.doSort(index, 'toggle');
				
        });
 window.onunload = refreshParent;
        function refreshParent() {
            window.opener.location.reload();
        }
		

		
	
});

function chooseTemplate(val){
    
				var value=val;
                                alert(value);
			           $.ajax({   type: 'GET',
                url: '../jquery/attachtemplate.php',
                data:'tempid='+value+'&promoid='+<?php echo $_GET["promoid"]; ?>+'&status=0',  
                dataType: "html",
                async: false,
				cache: false,
            success: function(result) {
				if(result.trim()!=0)
					{
					console.log("sucess");
					promoid=result.trim();
                                        window.close();
				}
				else
					{
				console.log("falied");
				}
				
            },
            });
			}
		
    </script>
<?php
}
?>
