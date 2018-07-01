<?php
include_once("opensql.php");
$id=$_POST['id'];
$num=$_POST['num'];



$sql3="select * from tb_cart where c_id='$id'";
$xian3=$mysqldb->select($sql3);
$row3=mysql_fetch_array($xian3);



$sql1="select * from tb_cart where c_id=$id";
$xian1=$mysqldb->select($sql1);
$row1=mysql_fetch_array($xian1);

if($row3[2]>$num){
    $s=$row3[2]-$num;
    $sql5="update tb_phone set 	P_inventory=P_inventory+$s where id=$row1[8]";
    $mysqldb->select($sql5);
}else{
    $s=$num-$row3[2];
    $sql5="update tb_phone set 	P_inventory=P_inventory-$s where id=$row1[8]";
    $mysqldb->select($sql5);
}



$p=$row3[7]*($num/$row3[2]);
echo json_encode([$p,$id]);//返回购物车id，和更改后的价格
$sql4="update tb_cart set c_num='$num',c_money='$p' where c_id=$id";
$mysqldb->select($sql4);


