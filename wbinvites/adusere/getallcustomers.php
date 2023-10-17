<?php
session_start();
require_once('../class/dbclass.php');
if(isset($_GET['action']) && isset($_SESSION['custreg_username']))
{
    
    ?>
<table class="table table-striped" id="table_<?php echo $stat; ?>" data-page-size="10" data-filter=#select-status>
<thead>
<tr>
<th>First name</th>
<th>Last name</th>
<th>Email Address</th>
<th>Phone Number</th>
<th>Event</th>
<th>Flying</th>
<th>Return Date</th>
<th>Passport</th>
<th width="120px">Passport File</th>
<th></th>
</tr>
</thead>
<tbody>
        <?php
$classconn=new db();
$mysqlconn=$classconn::mysql_connect();

$select1 = $mysqlconn->prepare("SELECT c.ID, c.firstname, c.lastname, c.email, c.phone, c.passport, o.returnDate,
o.choice, e.eventcode,p.fileID
FROM wbcustomersinfos c, wbcustflyingoptions o, wbcustevents e, wbcustomerpassports p
WHERE c.passport=o.custpassport and o.eventflight=e.ID and c.passport=p.custpassport order by e.ID desc, c.firstname ASC");
$select1->setFetchMode(PDO::FETCH_ASSOC);
$select1->setFetchMode(PDO::FETCH_OBJ);
$select1->execute();
$data=[];
$i=0;
while( $enregistrement = $select1->fetch(PDO::FETCH_ASSOC))
{
    echo "<tr><td>".$enregistrement['firstname']."</td><td>".$enregistrement['lastname']."</td><td>".$enregistrement['email']."</td>";
     echo "<td>".$enregistrement['phone']."</td><td>".$enregistrement['eventcode']."</td><td>".(($enregistrement['choice']==1)? 'Alone':'With Someone')."</td>";
     echo "<td>".$enregistrement['returnDate']."</td><td>".$enregistrement['passport']."</td>";
     ?>
<td><a class="btn btn-large" style="margin:0px;float: left;" href="download.php?id=<?php echo $enregistrement['fileID'];?>">
        <img src="../images/Download.png"/></a>
    <a href="#" onclick="previewpage('<?php echo $enregistrement['fileID']; ?>')" class="btn btn-large"  style="margin:0px;float: right;">
        <img src="../images/search.png" /></a></td>
     <?php 
     echo "<td>".(($enregistrement['choice']==1)? " -- ":"<img src='../images/view-32.png' onclick='getFlightMates(\"".$enregistrement['fileID']."\");' title='View people flying with ".$enregistrement['firstname']."' />")."</td></tr>";
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