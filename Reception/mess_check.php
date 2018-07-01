<?php

header('Content-Type:text/html; charset=UTF-8');
include_once("opensql.php");
date_default_timezone_set('prc');
session_start();
$username=$_SESSION['email'];//当前用户
$sql="select * from tb_user where u_email='$username'";//准备sql语句
$xian=$mysqldb->select($sql);
$row=mysql_fetch_row($xian);
if(empty($_POST['email'])){
    header("refresh:0;url=mess.php");
    echo '<script>alert("你没有填写邮箱");</script>';
    exit;
}else{
    $email=$_POST['email'];
}

if(empty($_POST['tel'])){
    header("refresh:0;url=mess.php");
    echo '<script>alert("你没有填写联系方式");</script>';
    exit;
}else{
    $tel=$_POST['tel'];
}


if(empty($_POST['password'])&&empty($_POST['password1'])&&empty($_POST['password2'])){
    $sql1="update tb_user set u_email='$email',u_tel='$tel' where u_email='$username'";
    $mysqldb->select($sql1);
    echo '<script type="text/javascript">alert("修改成功");</script>';
    header('refresh:0;url=mess.php');
}else{
    if(empty($_POST['password'])&&!empty($_POST['password1'])&&!empty($_POST['password2'])){
        echo '<script type="text/javascript">alert("你没有输入旧密码，请输入");</script>';
        header('refresh:0;url=mess.php');
        die();
    }else{
        $password=md5($_POST['password']);
        if(empty($_POST['password1'])||empty($_POST['password2'])){
            echo '<script type="text/javascript">alert("你没有输入新密码或确认密码，请输入");</script>';
            header('refresh:0;url=mess.php');
            die();
        }else{
            $password1=md5($_POST['password1']);
            $password2=md5($_POST['password2']);
        }
        if($password!=$row[2]){
            echo '<script type="text/javascript">alert("原密码不正确，请重新输入");</script>';
            header('refresh:0;url=mess.php');
            die();
        }if($password2!=$password1){
            echo '<script type="text/javascript">alert("两次密码不一致，请重新输入");</script>';
            header('refresh:0;url=mess.php');
            die();
        }else{
            $sql2="update tb_user set u_email='$email',u_tel='$tel',u_password='$password2' where u_email='$username'";
            $mysqldb->select($sql2);
            echo '<script type="text/javascript">alert("修改成功");</script>';
            header('refresh:0;url=mess.php');
        }
    }


}