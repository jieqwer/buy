<meta charset="utf-8">
<?php
include_once("opensql.php");
$id=$_GET['id'];

$sql="delete from  tb_address where a_id=$id";
mysql_query($sql);
if(mysql_affected_rows()>0){
    $sql2="alter table tb_address drop column a_id";
    $sql3="alter   table   tb_address add a_id int(11)   auto_increment ,add primary key (a_id )";
    mysql_query($sql2);
    mysql_query($sql3);
    echo '<script>alert("删除成功");</script>';
    header("refresh:1;url=mess.php");
}else{
    echo '<script>alert("删除失败");</script>';
    header("refresh:1;url=mess.php");

}