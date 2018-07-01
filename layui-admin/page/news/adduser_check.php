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

$username=$_POST['username'];
$userGrade=$_POST['userGrade'];
$na=$_POST['na'];
$sex=$_POST['sex'];
$tel=$_POST['tel'];
$riqi=$_POST['riqi'];
$province=$_POST['province'];
$city=$_POST['city'];
$area=$_POST['area'];
$hobby = "";
if(empty($_POST['like1'])){
    $hobby="";
}else{
    foreach( $_POST['like1'] as $i)
    {
        $hobby .= $i;
    }
}

$email=$_POST['email'];
$say=$_POST['say'];
$zhuang=$_POST['zhuang'];
if(empty($_FILES['myFile']['name'])){
    $img='userface3.jpg';
    date_default_timezone_set('prc');
    $time1=date('Y-m-d H:i:s');
    $password=md5(123456);
    $sql="insert into tb_admin(a_username,a_group,a_name,a_password,a_sex,a_tel,a_data,a_province,a_hobby,a_email,a_portrait,a_jie,a_city,a_area,a_state,a_time) values('$username','$userGrade','$na','$password','$sex','$tel','$riqi','$province','1$hobby','$email','$img','$say','$city','$area','$zhuang','$time1')";
    mysql_query($sql);
    echo "添加成功";
    header('refresh:1;url=adduser.php');
}else{
    $img=$_FILES['myFile']['name'];
    $type = strtolower(substr($img,strrpos($img,'.')+1)); //得到文件类型，并且都转化成小写
    $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
//判断文件类型是否被允许上传
    if(!in_array($type, $allow_type)){
        echo '<script type="text/javascript">alert("不允许上传该类文件或你的文件为空");</script>';
        header('refresh:1;url=adduser.php');
    }else{
        $imgname= uniqid();
        $tmp = $_FILES['myFile']['tmp_name'];
        $filepath = '../../images/';
        date_default_timezone_set('prc');
        $time1=date('Y-m-d H:i:s');
        $password=md5(123456);
        if(move_uploaded_file($tmp,$filepath.$imgname.".png")){
            $sql2="insert into tb_admin(a_username,a_group,a_name,a_password,a_sex,a_tel,a_data,a_province,a_hobby,a_email,a_portrait,a_jie,a_city,a_area,a_state,a_time) values('$username','$userGrade','$na','$password','$sex','$tel','$riqi','$province','1$hobby','$email','$imgname.png','$say','$city','$area','$zhuang','$time1')";
            mysql_query($sql2);
            echo "添加成功";
            header('refresh:1;url=adduser.php');
        }else{
            echo "添加失败";
            header('refresh:1;url=adduser.php');
        }
    }


}



