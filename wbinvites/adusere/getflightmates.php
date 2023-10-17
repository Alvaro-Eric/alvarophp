<?php
session_start();
require_once('../class/dbclass.php');
if(isset($_GET['action']))
{
    
    ?>
<table class="table table-striped" id="table_<?php echo $stat; ?>" data-page-size="10">
<thead>
<tr>
<th>Full names</th>
<th>Age Category</th>
<th>Passport</th>
<th>Passport File</th>
</tr>
</thead>
<tbody>
        <?php
$classconn=new db();
$mysqlconn=$classconn::mysql_connect();

$select1 = $mysqlconn->prepare("SELECT m.ID, m.fullnames, m.agerange, m.passportnumber, p.fileID
FROM wbcustomerpassports p, wbcustflightmates m
WHERE m.passportnumber=p.custpassport and m.invitingcustomer=:pspt order by m.ID desc");
$select1 -> bindValue(":pspt",$_GET['pc']); 
$select1->setFetchMode(PDO::FETCH_ASSOC);
$select1->setFetchMode(PDO::FETCH_OBJ);
$select1->execute();
$i=0;
while( $enregistrement = $select1->fetch(PDO::FETCH_ASSOC))
{
    $agecat="";
    if($enregistrement['agerange']==1){
    $agecat="Adult";}
    else if($enregistrement['agerange']==2){
        $agecat="Child";}
     else if($enregistrement['agerange']==3){
        $agecat="Infant";}
    echo "<tr><td>".$enregistrement['fullnames']."</td><td>".$agecat."</td><td>".$enregistrement['passportnumber']."</td><td></td></tr>";
    ///$data[$i].=$enregistrement['fileID'];
    $i++;
}
if($i==0){
    echo "<tr><td colspan='10'> No data available </td></tr>";
}
?>
</tbody></table>
<?php

}else {
echo "No action is defined.";
}
?>