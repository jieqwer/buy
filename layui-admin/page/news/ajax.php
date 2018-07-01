<?php

include_once("../../opensql.php");
$num_rec_per_page=4;   // 每页显示数量
$page=$_POST['page'];
$start_from =($page-1)*$num_rec_per_page;
$sql="select * from tb_match  limit $start_from, $num_rec_per_page";//准备sql语句
$xian1=$mysqldb->select($sql);
while ($info=mysql_fetch_array($xian1)) {//
    $arr[]=$info;
}

echo json_encode($arr);
