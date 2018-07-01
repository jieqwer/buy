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



if(!empty($_POST['qu1'])&&!empty($_POST['qu2'])&&!empty($_POST['qu3'])){
    $qu1=$_POST['qu1'];
    $qu2=$_POST['qu2'];
    $qu3=$_POST['qu3'];
    $sql="insert into  tb_question (q_wen,q_aus,p_id) values ('$qu1','$qu2','$qu3') ";
    mysql_query($sql);
    echo "添加成功";
    header("refresh:1;url=question_table.php");
}else{
    echo "信息填写不完整";
    header("refresh:1;url=question_table.php");
}