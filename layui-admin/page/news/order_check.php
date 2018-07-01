<meta charset="utf-8">
<?php
session_start();
include_once("../../opensql.php");

if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
    $sql="select * from tb_admin where a_username='$username'";
    $xian=$mysqldb->select($sql);
    $row=mysql_fetch_row($xian);
    if($row[1]=="超级管理员"){
        $id=$_GET['id'];
        if(empty($_POST['name'])||empty($_POST['tel'])||empty($_POST['please'])){
            echo '您的收获地址不完整';
            header("refresh:1;url=order_update.php?id=$id");
            die();
        }else if(!preg_match("/^[{4e00}-\x{9fa5}]+$/u",$_POST['name'])||!preg_match("/^1[34578]\d{9}$/",$_POST['tel'])) {
            echo '您的地址格式有误，请检查';
            header("refresh:1;url=order_update.php?id=$id");
            die();
        }else{
            $name=$_POST['name'];//收件人姓名
            $tel=$_POST['tel'];//收件人电话
            $address=$_POST['please'];//收件人地址
            $sql="update tb_order set o_dizhi='$address',o_sname='$name',o_tel='$tel' where o_id=$id";
            $mysqldb->select($sql);
            echo '修改成功';
            header("refresh:1;url=order_update.php?id=$id");
        }
    }else{
        echo '您的权限不够，请联系超级管理员';
        header("refresh:1;url=order_table.php?id=$id");
    }
}else{
    echo '必须登录后才能进入，请先登录';
    header("refresh:1;url=order_table.php?id=$id");
}



