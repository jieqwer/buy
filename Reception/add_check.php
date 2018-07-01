<meta charset="utf-8">
<?php
session_start();
include_once("opensql.php");
$user=$_SESSION['email'];

$sql4="select * from tb_user where u_email='$user'";
$xian4=$mysqldb->select($sql4);
$row4=mysql_fetch_array($xian4);


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
    $sql="insert  into  tb_address (a_name,a_tel,a_address,a_user,a_strat) values ('$name','$tel','$address','$row4[6]','0')";
    $mysqldb->select($sql);
    echo '<script type="text/javascript">alert("添加成功");</script>';
    header('refresh:0;url=mess.php');
}