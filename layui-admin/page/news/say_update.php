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
$s=$_GET['s'];
if($s==0){
    $s=1;
}else{
    $s=0;
}
if(!empty($_GET['id'])){
    $id=$_GET['id'];
    $sql="update tb_say set s_strat='$s' where id=$id";
    mysql_query($sql);
    echo "审核成功";
    header("refresh:1;url=say_table.php");
}else{
    echo "审核成功";
    header("refresh:1;url=say_table.php");
}