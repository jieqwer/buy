<?php
include_once("opensql.php");
$cun=$_POST['cun'];
$id=$_POST['id'];
$ban=$_POST['ban'];
$sql4="select * from tb_phone where id=$id";
$xian4=$mysqldb->select($sql4);
$info=mysql_fetch_array($xian4);

$sql1="select * from tb_memory where m_m1='$cun'";
$xian1=$mysqldb->select($sql1);
$row1=mysql_fetch_array($xian1);

$s=$info[2]+$row1[1]+$ban;


echo json_encode([$s]);//返回商品总价