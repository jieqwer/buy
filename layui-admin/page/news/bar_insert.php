
<?php
session_start();
include_once("../../opensql.php");
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
}else{
    header("location:../../login.php");
    echo '<script type="text/javascript">alert("必须登录后才能进入，请先登录");</script>';
}


if(empty($_FILES["picture"]['name'])){
    echo '没有添加图片';
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
            $id=$_POST['qu2'];
            $sql="select * from tb_phone where id=$id";//准备sql语句
            $xian=$mysqldb->select($sql);
            $row=mysql_fetch_row($xian);
            $sql2="insert into  tb_bar (b_url,p_name,p_id) values ('$s','$row[0]','$id')";
            mysql_query($sql2);
            echo '添加成功';
            header("refresh:1;url=bar_table.php");
        }else{
            echo '添加失败';
            header("refresh:1;url=bar_table.php");
        }
    }
}
