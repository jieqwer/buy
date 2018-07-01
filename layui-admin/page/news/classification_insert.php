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

if(!empty($_POST['class1'])){
    $class1=$_POST['class1'];
    $sql="insert into  tb_classification3 (c3_name) values ('$class1')";
    mysql_query($sql);
    echo "添加成功";
    header("refresh:1;url=classification_table.php");
}else{
    echo "信息填写不完整";
    header("refresh:1;url=classification_table.php");
}