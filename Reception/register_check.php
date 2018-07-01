<meta charset="utf-8">
<?php
include_once("opensql.php");
if(empty($_POST['surname'])){
    echo '<script type="text/javascript">alert("你没有输入姓，请输入");</script>';
    header('refresh:0;url=register.php');
    die();
}else{
    if(!preg_match("/[\x{4e00}-\x{9fa5}]+/u",$_POST['surname'])){
        header("refresh:0;url=register.php");
        echo '<script>alert("姓格式有误");</script>';
        exit;
    }else{
        $surname=$_POST['surname'];
    }
}

if(empty($_POST['lastname'])){
    echo '<script type="text/javascript">alert("你没有输入名，请输入");</script>';
    header('refresh:0;url=register.php');
    die();
}else{
    if(!preg_match("/[\x{4e00}-\x{9fa5}]+/u",$_POST['lastname'])){
        header("refresh:0;url=register.php");
        echo '<script>alert("名格式有误");</script>';
        exit;
    }else{
        $name=$_POST['lastname'];
    }
}


if(empty($_POST['email'])){
    echo '<script type="text/javascript">alert("你没有填写登录邮箱，请填写");</script>';
    header('refresh:0;url=register.php');
    die();
}else{
    if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/",$_POST['email'])){
        header("refresh:0;url=register.php");
        echo '<script>alert("邮箱格式有误");</script>';
        exit;
    }else{
        $email=$_POST['email'];
    }
}

if(empty($_POST['password1'])){
    echo '<script type="text/javascript">alert("你没有输入密码，请输入");</script>';
    header('refresh:0;url=register.php');
    die();
}else{
    if(!preg_match("/^[a-zA-Z\d]{6,}$/", $_POST['password1'])){
        header("refresh:0;url=register.php");
        echo '<script>alert("密码格式有误");</script>';
        exit;
    }else{
        $password1=md5($_POST['password1']);
    }
}
if(empty($_POST['password2'])){
    echo '<script type="text/javascript">alert("你没有输入确认密码，请输入");</script>';
    header('refresh:0;url=register.php');
    die();
}else{
    $password2=md5($_POST['password2']);
}

if($password2!=$password1){
    echo '<script type="text/javascript">alert("密码和确认密码不一致，请重新输入");</script>';
    header('refresh:0;url=register.php');
    die();
}else{
    $sql="insert into tb_user (u_username,u_email,u_password,u_strat,u_time) values ('$surname$name','$email','$password2','0','0000-00-00 00:00:00')";
    $result=mysql_query($sql);
    if(!$result){
        echo '<script>alert("用户注册失败");</script>';
        header("refresh:0;url=register.php");
    }else{
        echo '<script>alert("用户注册成功");</script>';
        header("refresh:0;url=login.php");
    }
}




?>
