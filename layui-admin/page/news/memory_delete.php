<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include_once("../../opensql.php");
$id=$_GET['id'];
$sql="delete from  tb_memory where m_id=$id";
mysql_query($sql);
if(mysql_affected_rows()>0){

    echo "删除成功";
    $sql2="alter table tb_memory drop column m_id";
    $sql3="alter   table  tb_memory add m_id int(11)   auto_increment ,add primary key (m_id)";
    mysql_query($sql2);
    mysql_query($sql3);

    header("refresh:1;url=memory_table.php");
}else{
    echo "删除失败";
    header("refresh:1;url=memory_table.php");

}
?>

