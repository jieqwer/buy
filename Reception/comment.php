<meta charset="utf-8">
<?php
date_default_timezone_set('prc');
include_once("opensql.php");
session_start();
$id=$_GET['id'];
if(empty($_SESSION['email'])){
    echo '<script type="text/javascript">alert("您还没有登录，请先登录");</script>';
    header('refresh:0;url=login.php');
    die();
}else{
    if(empty($_POST['say'])){
        echo '<script type="text/javascript">alert("您没有填写评论内容");</script>';
        header("refresh:0;url=single.php?id=$id");
        die();
    }else{
        $say=$_POST['say'];
        $email=$_SESSION['email'];

        $sql4="select * from tb_phone  where id=$id";
        $xian4=$mysqldb->select($sql4);
        $row4=mysql_fetch_array($xian4);

        $t= date('Y-m-d H:i:s',time());//时间
            $sql="insert into  tb_say (s_phone,s_user,s_time,s_say,s_strat,s_id) values ('$row4[0]','$email','$t','$say','0','$id')";
            mysql_query($sql);
            echo "<script type='text/javascript'>alert('添加成功');</script>";
            header("refresh:0;url=single.php?id=$id");

    }



}