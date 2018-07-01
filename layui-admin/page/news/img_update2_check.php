
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
$im=$_GET['im'];

$sql="select * from tb_phone where id=$id";
$xian=$mysqldb->select($sql);
$row=mysql_fetch_row($xian);
$pieces1 = explode(",", $row[21]);//手机展示图
$pieces2 = explode(",", $row[24]);//宣传词

if(empty($_POST["say$im"])){
    $say=' ';
}else{
    $say=$_POST["say$im"];
}


if($im==0){
    if(empty($_FILES["picture$im"]['name'])){
        $x=$say.','.$pieces2[1].','.$pieces2[2].','.$pieces2[3];
        $sql3="update tb_phone set p_xu='$x' where id=$id";
        mysql_query($sql3);
        echo '修改成功';
        header("refresh:1;url=img_update2.php?id=$id&im=$im");
    }else{
        $img=$_FILES["picture$im"]['name'];
        $type = strtolower(substr($img,strrpos($img,'.')+1)); //得到文件类型，并且都转化成小写
        $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
//判断文件类型是否被允许上传
        if(!in_array($type, $allow_type)){
            echo '不允许上传该类文件或你的文件为空';
            header("refresh:1;url=img_update2.php?id=$id&im=$im");
        }else{
            $x=$say.','.$pieces2[1].','.$pieces2[2].','.$pieces2[3];
            $imgname= uniqid();
            $s=$imgname.'.png'.','.$pieces1[1].','.$pieces1[2].','.$pieces1[3];
            $tmp = $_FILES["picture$im"]['tmp_name'];
            $filepath = '../../../Reception/images/';
            if(move_uploaded_file($tmp,$filepath.$imgname.".png")){
                $sql2="update tb_phone set p_exhibition='$s',p_xu='$x'  where id=$id";
                mysql_query($sql2);
                echo '修改成功';
                header("refresh:1;url=img_update2.php?id=$id&im=$im");
            }else{
                echo '修改失败';
                header("refresh:1;url=img_update2.php?id=$id&im=$im");
            }
        }
    }
}else if($im==1){
    if(empty($_FILES["picture$im"]['name'])){
        $x=$pieces2[0].','.$say.','.$pieces2[2].','.$pieces2[3];
        $sql3="update tb_phone set p_xu='$x' where id=$id";
        mysql_query($sql3);
        echo '修改成功';
        header("refresh:1;url=img_update2.php?id=$id&im=$im");
    }else{
        $img=$_FILES["picture$im"]['name'];
        $type = strtolower(substr($img,strrpos($img,'.')+1)); //得到文件类型，并且都转化成小写
        $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
//判断文件类型是否被允许上传
        if(!in_array($type, $allow_type)){
            echo '不允许上传该类文件或你的文件为空';
            header("refresh:1;url=img_update2.php?id=$id&im=$im");
        }else{
            $x=$pieces2[0].','.$say.','.$pieces2[2].','.$pieces2[3];
            $imgname= uniqid();
            $s=$pieces1[0].','.$imgname.'.png'.','.$pieces1[2].','.$pieces1[3];
            $tmp = $_FILES["picture$im"]['tmp_name'];
            $filepath = '../../../Reception/images/';
            if(move_uploaded_file($tmp,$filepath.$imgname.".png")){
                $sql2="update tb_phone set p_exhibition='$s',p_xu='$x'  where id=$id";
                mysql_query($sql2);
                echo '修改成功';
                header("refresh:1;url=img_update2.php?id=$id&im=$im");
            }else{
                echo '修改失败';
                header("refresh:1;url=img_update2.php?id=$id&im=$im");
            }
        }
    }

}else if($im==2){
    if(empty($_FILES["picture$im"]['name'])){
        $x=$pieces2[0].','.$pieces2[1].','.$say.','.$pieces2[3];
        $sql3="update tb_phone set p_xu='$x' where id=$id";
        mysql_query($sql3);
        echo '修改成功';
        header("refresh:1;url=img_update2.php?id=$id&im=$im");
    }else{
        $img=$_FILES["picture$im"]['name'];
        $type = strtolower(substr($img,strrpos($img,'.')+1)); //得到文件类型，并且都转化成小写
        $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
//判断文件类型是否被允许上传
        if(!in_array($type, $allow_type)){
            echo '不允许上传该类文件或你的文件为空';
            header("refresh:1;url=img_update2.php?id=$id&im=$im");
        }else{
            $x=$pieces2[0].','.$pieces2[1].','.$say.','.$pieces2[3];
            $imgname= uniqid();
            $s=$pieces1[0].','.$pieces1[1].','.$imgname.'.png'.','.$pieces1[3];
            $tmp = $_FILES["picture$im"]['tmp_name'];
            $filepath = '../../../Reception/images/';
            if(move_uploaded_file($tmp,$filepath.$imgname.".png")){
                $sql2="update tb_phone set p_exhibition='$s',p_xu='$x'  where id=$id";
                mysql_query($sql2);
                echo '修改成功';
                header("refresh:1;url=img_update2.php?id=$id&im=$im");
            }else{
                echo '修改失败';
                header("refresh:1;url=img_update2.php?id=$id&im=$im");
            }
        }
    }
}else{
    if(empty($_FILES["picture$im"]['name'])){
        $x=$pieces2[0].','.$pieces2[1].','.$pieces2[2].','.$say;
        $sql3="update tb_phone set p_xu='$x' where id=$id";
        mysql_query($sql3);
        echo '修改成功';
        header("refresh:1;url=img_update2.php?id=$id&im=$im");
    }else{
        $img=$_FILES["picture$im"]['name'];
        $type = strtolower(substr($img,strrpos($img,'.')+1)); //得到文件类型，并且都转化成小写
        $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
//判断文件类型是否被允许上传
        if(!in_array($type, $allow_type)){
            echo '不允许上传该类文件或你的文件为空';
            header("refresh:1;url=img_update2.php?id=$id&im=$im");
        }else{
            $x=$pieces2[0].','.$pieces2[1].','.$pieces2[2].','.$say;
            $imgname= uniqid();
            $s=$pieces1[0].','.$pieces1[1].','.$pieces1[2].','.$imgname.'.png';
            $tmp = $_FILES["picture$im"]['tmp_name'];
            $filepath = '../../../Reception/images/';
            if(move_uploaded_file($tmp,$filepath.$imgname.".png")){
                $sql2="update tb_phone set p_exhibition='$s',p_xu='$x'  where id=$id";
                mysql_query($sql2);
                echo '修改成功';
                header("refresh:1;url=img_update2.php?id=$id&im=$im");
            }else{
                echo '修改失败';
                header("refresh:1;url=img_update2.php?id=$id&im=$im");
            }
        }
    }
}


