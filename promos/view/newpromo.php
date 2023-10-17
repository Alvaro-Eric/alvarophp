
<fieldset>
    <div class="form-group">
        <label for="promoTitle" class="">Promo Title :</label>
        <input type="text" id="promoTitle" class="form-control"/>
    </div>
    <div class="form-group">
        <table id="tblData" class="table demo table-bordered">	
                        <thead style='border:none;border-top:solid #00529B 1.0pt;background:#00529B;padding:3.75pt 3.75pt 3.75pt 3.75pt;height:25.5pt;font-size:10.0pt;font-family:"Arial",sans-serif;color:#FFDE00'> 
                            <tr> <th>DESTINATION</th> <th>ECONOMY CLASS</th> <th>BUSINESS CLASS</th> <td></td> </tr> 
                        </thead> 
                        <tbody style="border:1px #FFDE00 solid;"> </tbody>
                        <tfoot><tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><button id="btnAdd" class="btn btn-primary">New</button> </td>
                            </tr></tfoot> </table>
<!--        <label for="promoContent" class="">Promo Content :</label>
        <input name="input" type="text" value="" id="promoContent" class="jqte-test">-->
    </div>
    <div class="form-group">
        <button class="btn btn-primary" id="createpromo">Create</button>
    </div>
</fieldset>
<script type="text/javascript">
var rows=0;
    jQuery(document).ready(function ($) {
         console.log("Start");   
         $("#createpromo").hide();
    $(".btnEdit").bind("click", Edit); 
    $(".btnDelete").bind("click", Delete); 
    $("#btnAdd").bind("click", Add);
    
       $("#createpromo").click(function(){
           var ptitle=$("#promoTitle").val();
           var pcontent="";
           var ptr = $("#tblData").find("tr");
           console.log(ptr.find("td:last").remove());
           console.log(rows);
           pcontent="<table class='Clear' border=1 cellspacing=0 cellpadding=0 width='95%' style='width:95.0%;border-collapse:collapse;border:none;border-spacing:0px'>"+$("#tblData").html()+"</table>";
           console.log(pcontent);
           $.ajax({   type: 'POST',
                url: './jquery/createpromo.php',
                data: {
        title: ptitle,
        body: pcontent
    },  
                dataType: "html",
                async: false,
				cache: false,
            success: function(result) {
				if(result.trim()!=0)
					{
					console.log("sucess");
					promoid=result.trim();
                                        $("#newpanel").toggle();
                                        $("#dvContent_2").load('http://localhost:81/salesMonitor/promos/view/getpromotions.php');
                                        
				}
				else
					{
				console.log("falied");
				}
				
            },
            });
       });
        
    });
//	$('.jqte-test').jqte();
//	
//	// settings of status
//	var jqteStatus = true;
//	$(".status").click(function()
//	{
//		jqteStatus = jqteStatus ? false : true;
//		$('.jqte-test').jqte({"status" : jqteStatus})
//	});
        
        function Add(){ 
          console.log("Clicked Add");
          $("#tblData tbody").append( "<tr style='font-size:9.0pt;font-family:Arial,sans-serif;color:#00529B;'>"+ "<td style='font-weight: bold;'><input type='text'/></td>"+ "<td>$<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57'/></td>"+ "<td>$<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57'/></td>"+ "<td class='actions'><img src='images/disk.png' class='btnSave'><img src='images/delete.png' class='btnDelete'/></td>"+ "</tr>"); 
          $(".btnSave").bind("click", Save);	
          $(".btnDelete").bind("click", Delete);
      
      }; 
      
      
      function Save(){ 
          var par = $(this).parent().parent();//tr 
          var tdName = par.children("td:nth-child(1)");
          var tdPhone = par.children("td:nth-child(2)"); 
          var tdEmail = par.children("td:nth-child(3)"); 
          var tdButtons = par.children("td:nth-child(4)"); 
          tdName.html(tdName.children("input[type=text]").val()); 
          tdPhone.html("$"+tdPhone.children("input[type=text]").val()); 
          tdEmail.html("$"+tdEmail.children("input[type=text]").val()); 
          tdButtons.html("<img src='images/delete.png' class='btnDelete'/><img src='images/pencil.png' class='btnEdit'/>"); 
          $(".btnEdit").bind("click", Edit); 
          $(".btnDelete").bind("click", Delete); 
          $("#createpromo").show();
          rows++;
      };
      
      function Edit(){ var par = $(this).parent().parent(); //tr 
        var tdName = par.children("td:nth-child(1)"); 
        var tdPhone = par.children("td:nth-child(2)"); 
        var tdEmail = par.children("td:nth-child(3)"); 
        var tdButtons = par.children("td:nth-child(4)"); 
        tdName.html("<input type='text' id='txtName' value='"+tdName.html()+"'/>"); 
        tdPhone.html("<input type='text' id='txtPhone' value='"+tdPhone.html()+"'/>"); 
        tdEmail.html("<input type='text' id='txtEmail' value='"+tdEmail.html()+"'/>"); 
        tdButtons.html("<img src='images/disk.png' class='btnSave'/>"); 
        $(".btnSave").bind("click", Save); 
        $(".btnEdit").bind("click", Edit); 
        $(".btnDelete").bind("click", Delete); 
    };
function Delete(){ 
    var par = $(this).parent().parent();//tr 
    par.remove(); 
     rows--;
    };

</script>
