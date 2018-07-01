<?php
include('OpenSQL.php');

$province=$db->fetchAll("select * from hat_province");
//var_dump($province);
//foreach($province as $rows){
//	$resu[] = $rows;
//}

$jsonStr=json_encode($province);
echo $jsonStr;
