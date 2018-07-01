
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
$vid=$_POST['qu2'];
if(empty($_FILES["picture"]['name'])){
    $sql="select * from tb_phone where id=$vid";//准备sql语句
    $xian=$mysqldb->select($sql);
    $row=mysql_fetch_row($xian);
    $sql2="update tb_bar set p_name='$row[0]',p_id='$vid'  where id=$id";
    mysql_query($sql2);
    echo '修改成功';
    header("refresh:1;url=bar_table.php");
}else{
    $img=$_FILES["picture"]['name'];
    $type = strtolower(substr($img,strrpos($img,'.')+1)); //得到文件类型，并且都转化成小写
    $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
//判断文件类型是否被允许上传
    if(!in_array($type, $allow_type)){
        echo '不允许上传该类文件或你的文件为空';
        header("refresh:1;url=bar_table.php");
    }else{
        $imgname= uniqid();
        $s=$imgname.'.png';
        $tmp = $_FILES["picture"]['tmp_name'];
        $filepath = '../../../Reception/images/';
        if(move_uploaded_file($tmp,$filepath.$imgname.".png")){
            $sql3="select * from tb_phone where id=$vid";//准备sql语句
            $xian3=$mysqldb->select($sql3);
            $row3=mysql_fetch_row($xian3);
            $sql5="select * from tb_bar  where id=$id";
            $xian5=$mysqldb->select($sql5);
            $row5=mysql_fetch_row($xian5);
            unlink("../../../Reception/images/$row5[0]");
            $sql4="update tb_bar set b_url='$s',p_name='$row3[0]',p_id='$vid'  where id=$id";
            mysql_query($sql4);
            echo '修改成功';
            header("refresh:1;url=bar_table.php");
        }else{
            echo '修改失败';
            header("refresh:1;url=bar_table.php");
        }
    }
}
