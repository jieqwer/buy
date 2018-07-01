<meta charset="utf-8">
<?php
include_once("opensql.php");
$id=$_GET['id'];
$sql1="select * from tb_cart where c_id=$id";
$xian1=$mysqldb->select($sql1);
$row1=mysql_fetch_array($xian1);
$sql4="update tb_phone set 	P_inventory=P_inventory+$row1[2] where id=$row1[8]";
$mysqldb->select($sql4);

$sql="delete from  tb_cart where c_id=$id";
mysql_query($sql);
if(mysql_affected_rows()>0){
    echo "删除成功";
    $sql2="alter table tb_cart  drop column c_id";
    $sql3="alter   table   tb_cart add c_id int(11)   auto_increment ,add primary key (c_id )";
    mysql_query($sql2);
    mysql_query($sql3);
    header("refresh:1;url=cart.php");
}else{
    echo "删除失败";
    header("refresh:1;url=cart.php");

}