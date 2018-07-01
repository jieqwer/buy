<meta charset="utf-8">
<?php
include_once("opensql.php");

$id=$_GET['id'];

if(empty($_POST['name'])||empty($_POST['tel'])||empty($_POST['address'])){
    echo '<script type="text/javascript">alert("您的收获地址不完整");</script>';
    header('refresh:0;url=mess.php');
    die();
}else if(!preg_match("/^[{4e00}-\x{9fa5}]+$/u",$_POST['name'])||!preg_match("/^1[34578]\d{9}$/",$_POST['tel'])) {
    echo '<script type="text/javascript">alert("您的地址格式有误，请检查");</script>';
    header('refresh:0;url=mess.php');
    die();
}else{
    $name=$_POST['name'];//收件人姓名
    $tel=$_POST['tel'];//收件人电话
    $address=$_POST['address'];//收件人地址
    $sql="update tb_address set a_name='$name',a_tel='$tel',a_address='$address' where a_id='$id'";
    $mysqldb->select($sql);
    echo '<script type="text/javascript">alert("修改成功");</script>';
    header('refresh:0;url=mess.php');
}