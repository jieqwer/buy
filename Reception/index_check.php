<meta charset="utf-8">
<?php
include_once("opensql.php");
$phone=$_POST['phone'];

$sql="select * from tb_phone  where p_name like'%$phone%'";
$xian=$mysqldb->select($sql);
$row=mysql_num_rows($xian);
if($row<=0){
    echo "<script type='text/javascript'>alert('该手机卖完啦!');</script>";
    header('refresh:0;url=index.php');
    die();
}else{
    $sql1="select id from tb_phone  where p_name like '%$phone%'";
    $xian1=$mysqldb->select($sql1);
    $row1=mysql_fetch_array($xian1);
    header("refresh:0;url=single.php?id=$row1[0]");
}
