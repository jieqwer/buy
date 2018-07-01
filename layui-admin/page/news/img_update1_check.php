
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
    if(empty($_FILES["picture"]['name'])){
        echo '修改成功';
        header("refresh:1;url=img_update1.php?id=$id");
    }else{
        $img=$_FILES["picture"]['name'];
        $type = strtolower(substr($img,strrpos($img,'.')+1)); //得到文件类型，并且都转化成小写
        $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
//判断文件类型是否被允许上传
        if(!in_array($type, $allow_type)){
            echo '不允许上传该类文件或你的文件为空';
            header("refresh:1;url=img_update1.php?id=$id");
        }else{
            $imgname= uniqid();
            $s=$imgname.'.png';
            $tmp = $_FILES["picture"]['tmp_name'];
            $filepath = '../../../Reception/images/';
            if(move_uploaded_file($tmp,$filepath.$imgname.".png")){
                $sql2="update tb_phone set 	p_pictures='$s'  where id=$id";
                mysql_query($sql2);
                echo '修改成功';
                header("refresh:1;url=img_update1.php?id=$id");
            }else{
                echo '修改失败';
                header("refresh:1;url=img_update1.php?id=$id");
            }
        }
    }
