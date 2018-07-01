<?php

include_once("opensql.php");
$id=$_POST['id'];
$pieces1 = explode(",", $id);//基本参数
$n=count($pieces1);
$sql="select * from tb_cart where c_id in ($id) ";
$xian=$mysqldb->select($sql);

$sql2="select sum(c_money) from tb_cart where c_id in ($id) ";
$xian2=$mysqldb->select($sql2);
$row=mysql_fetch_array($xian2);

while ($info=mysql_fetch_array($xian)) {
    $arr[]=$info;
}
echo json_encode([$arr,$n,$row]);//返回当前购物车信息，购买数量，总价格