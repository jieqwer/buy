<meta charset="utf-8">
<?php
include_once("opensql.php");
$id=$_GET['id'];

$sql4="select * from tb_phone where id=$id";
$xian4=$mysqldb->select($sql4);
$info=mysql_num_rows($xian4);
if($info<=0){
    header("refresh:0;url=index.php");
    echo '<script>alert("该手机卖完啦");</script>';
    exit;
}else{
    header("refresh:0;url=single.php?id=$id");
}
