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
$sql1="select * from tb_admin where a_id=$id";
$xian1=$mysqldb->select($sql1);
$row1=mysql_fetch_row($xian1);

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
foreach( $_POST['like1'] as $i)
{
    $hobby .= $i;
}
$email=$_POST['email'];
$say=$_POST['say'];
$zhuang=$_POST['zhuang'];
if(empty($_FILES['myFile']['name'])){
    $img=$row1[10];
    $sql="update tb_admin set a_username='$username',a_group='$userGrade',a_name='$na',a_sex='$sex',a_tel='$tel',a_data='$riqi',a_province='$province',a_hobby='$hobby',a_email='$email',a_portrait='$img',a_jie='$say',a_city='$city',a_area='$area',a_state='$zhuang' where a_id=$id";
    mysql_query($sql);
    echo "修改成功";
    header("refresh:1;url=newsList_update.php?id=$id");
}else{
    $img=$_FILES['myFile']['name'];
    $type = strtolower(substr($img,strrpos($img,'.')+1)); //得到文件类型，并且都转化成小写
    $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
//判断文件类型是否被允许上传
    if(!in_array($type, $allow_type)){
        echo '<script type="text/javascript">alert("不允许上传该类文件或你的文件为空");</script>';
        header("refresh:1;url=newsList_update.php?id=$id");
    }else{
        $imgname= uniqid();
        $tmp = $_FILES['myFile']['tmp_name'];
        $filepath = '../../images/';
        if(move_uploaded_file($tmp,$filepath.$imgname.".png")){
            $sql2="update tb_admin set a_username='$username',a_group='$userGrade',a_name='$na',a_sex='$sex',a_tel='$tel',a_data='$riqi',a_province='$province',a_hobby='$hobby',a_email='$email',a_portrait='$imgname.png',a_jie='$say',a_city='$city',a_area='$area',a_state='$zhuang' where a_id=$id";
            mysql_query($sql2);
            echo "修改成功";
            header("refresh:1;url=newsList_update.php?id=$id");
        }else{
            echo "修改失败";
            header("refresh:1;url=newsList_update.php?id=$id");
        }
    }


}



