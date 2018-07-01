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

if(!empty($_POST['ca1'])&&!empty($_POST['ca2'])){
    $ca1=$_POST['ca1'];
    $ca2=$_POST['ca2'];
    $ca3=$_POST['ca3'];
    $ca4=$_POST['ca4'];
    $sql="update tb_classification4 set c4_name=' $ca1',c4_url='$ca2',c3_id='$ca3',c4_re='$ca4' where c4_id=$id";
    mysql_query($sql);
    echo "修改成功";
    header("refresh:1;url=classification_table.php");
}else{
    echo "信息填写不完整";
    header("refresh:1;url=classification_table.php");
}