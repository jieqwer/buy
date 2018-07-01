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

if(!empty($_POST['qu1'])&&!empty($_POST['qu2'])&&!empty($_POST['qu3'])){
    $qu1=$_POST['qu1'];
    $qu2=$_POST['qu2'];
    $qu3=$_POST['qu3'];
    $sql="update tb_question set q_wen='$qu1',q_aus='$qu2',p_id='$qu3' where id=$id";
    mysql_query($sql);
    echo "修改成功";
    header("refresh:1;url=question_table.php");
}else{
    echo "信息填写不完整";
    header("refresh:1;url=question_table.php");
}