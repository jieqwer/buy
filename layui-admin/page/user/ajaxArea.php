<?php
include('OpenSQL.php');
$cityID = $_POST['cityID'];
$province=$db->fetchAll("select * from hat_area where father = $cityID");
foreach($province as $rows){
	$resu[] = $rows;
}
$jsonStr=json_encode($resu);
echo $jsonStr;