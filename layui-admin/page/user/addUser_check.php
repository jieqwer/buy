<meta charset="utf-8">
<?php
session_start();
include_once("../../opensql.php");
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
}else{
    header("location:../../login.php");
    echo '<script type="text/javascript">alert("必须登录后才能进入，请先登录");</script>';
}

if(!empty($_POST['username'])&&!empty($_POST['email'])&&!empty($_POST['password'])&&!empty($_POST['tel'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $tel=$_POST['tel'];
    $zhuang=$_POST['zhuang'];
    $sql2="insert into tb_user (u_username,u_email,u_password,u_tel,u_strat,u_time) values('$username','$email','$password','$tel','$zhuang','0000-00-00 00:00:00')";
    mysql_query($sql2);
    echo "用户添加成功";
    header("refresh:1;url=allUsers.php");
}else{
    echo "用户添加失败，请检查填写信息是否有误";
    header("refresh:1;url=allUsers.php");
}


