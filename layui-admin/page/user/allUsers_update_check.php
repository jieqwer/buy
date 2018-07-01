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
$id=$_GET['id'];

if(!empty($_POST['username'])&&!empty($_POST['email'])&&!empty($_POST['password'])&&!empty($_POST['tel'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $tel=$_POST['tel'];
    $zhuang=$_POST['zhuang'];
    $sql2="update tb_user set u_username='$username',u_email='$email',u_password='$password',u_tel='$tel',u_strat='$zhuang' where u_id=$id";
    mysql_query($sql2);
    echo "修改成功";
    header("refresh:1;url=allUsers_update.php?id=$id");
}else{
    echo "修改失败";
    header("refresh:1;url=allUsers_update.php?id=$id");
}




