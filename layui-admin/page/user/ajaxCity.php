<?php
include('OpenSQL.php');
$provinceID = $_POST['provincesID'];
$province=$db->fetchAll("select * from hat_city where father = $provinceID");
/*foreach($province as $rows){
	$resu[] = $rows;
}*/
/*$jsonStr=json_encode($resu);
echo $jsonStr;*/
/*if(is_null($province)){
    echo json_encode([]);
} else {
    echo json_encode($province);
}*/
echo json_encode($province);