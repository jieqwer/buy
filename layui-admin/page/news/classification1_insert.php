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


if(!empty($_POST['ca1'])&&!empty($_POST['ca2'])){
    $ca1=$_POST['ca1'];
    $ca2=$_POST['ca2'];
    $ca3=$_POST['ca3'];
    $ca4=$_POST['ca4'];
    $sql="insert into  tb_classification4 (c4_name,c4_url,c3_id,c4_re) values ('$ca1','$ca2','$ca3','$ca4')";
    mysql_query($sql);
    echo "添加成功";
    header("refresh:1;url=classification_table.php");
}else{
    echo "信息填写不完整";
    header("refresh:1;url=classification_table.php");
}