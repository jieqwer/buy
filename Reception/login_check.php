<meta charset="utf-8">
<?php


$email=$_POST["email"];
$password=$_POST['password'];
session_start();

if(isset($_SESSION['email'])){
    echo '<script type="text/javascript">alert("你已登录，请勿重复登录");</script>';
    header('refresh:0;url=index.php');
    die();
}else{
    if(empty($_POST["email"])){
        echo '<script type="text/javascript">alert("你没有输入登录邮箱，请输入");</script>';
        header('refresh:0;url=login.php');
        die();
    }else{
        $email=$_POST['email'];
    }
    if(empty($_POST['password'])){
        echo '<script type="text/javascript">alert("你没有输入密码，请输入");</script>';
        header('refresh:0;url=login.php');
        die();
    }else{
        $password=md5($_POST['password']) ;
    }
    include_once("opensql.php");
    $sql='select * from tb_user where u_email="'.$email.'" and u_password="'.$password.'"';
    $xian=$mysqldb->select($sql);
    $r=mysql_num_rows($xian);
    if($r>0){
        $_SESSION['email']=$email;
        header("refresh:0;url=index.php");
    }else{
        echo '<script type="text/javascript">alert("用户名和密码有错，请重新输入");</script>';
        header('refresh:0;url=login.php');
    }

}


?>