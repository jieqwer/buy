<?php
include_once("opensql.php");
$address=$_POST['address'];
$sql2="select * from tb_address where a_id='$address'";
$xian=$mysqldb->select($sql2);

while ($info=mysql_fetch_array($xian)) {
    $arr[]=$info;
}
echo json_encode($arr);