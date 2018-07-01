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

$password=md5($_POST['password']);
$password1=md5($_POST['password1']);
$password2=md5($_POST['password2']);

$sql1='select * from tb_admin where a_username="'.$username.'"';
$xian1=$mysqldb->select($sql1);
$row1=mysql_fetch_row($xian1);


if($password!=$row1[3]){
    echo '<script type="text/javascript">alert("旧密码输入错误，请重新输入");</script>';
    header('refresh:1;changePwd.php');
}else{
    if($password1==$password2&&$_POST['password2']!=''){
        echo '<script type="text/javascript">alert("修改成功");</script>';
        $sql="update tb_admin set a_password='$password2' where a_username='$username'";
        mysql_query($sql);
        header('refresh:1;changePwd.php');
    }else{
        echo '<script type="text/javascript">alert("两次密码不一致或没有输入密码，请重新输入");</script>';
        header('refresh:1;changePwd.php');
    }

}




