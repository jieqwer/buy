<?php
include_once("../../opensql.php");
$sql2="select count(id) from tb_user ";
$xian=$mysqldb->select($sql2);

while ($info=mysql_fetch_array($xian)) {
    $arr[]=$info;
}
echo json_encode($arr);