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

if(!empty($_POST['mem1'])&&!empty($_POST['mem2'])){
    $mem1=$_POST['mem1'];
    $mem2=$_POST['mem2'];
    $sql="update tb_memory set m_m1='$mem1',m_money='$mem2' where m_id=$id";
    mysql_query($sql);
    echo "修改成功";
    header("refresh:1;url=memory_table.php");
}else{
    echo "信息填写不完整";
    header("refresh:1;url=memory_table.php");
}