<meta charset="utf-8">
<?php
include_once("opensql.php");
$id = $_GET['id'];
$sql = "delete from  tb_order where o_id=$id";
mysql_query($sql);
if (mysql_affected_rows() > 0) {
    echo "<script type='text/javascript'>alert('退货成功，我们会尽快给您处理');</script>";
    $sql2 = "alter table tb_order drop column o_id";
    $sql3 = "alter   table  tb_order add o_id int(11)   auto_increment ,add primary key (o_id)";
    mysql_query($sql2);
    mysql_query($sql3);

    header("refresh:1;url=order.php");
} else {
    echo "<script type='text/javascript'>alert('退货失败');</script>";
    header("refresh:1;url=order.php");
}