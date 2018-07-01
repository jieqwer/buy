<?php
session_start();
include_once("../../opensql.php");
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
}else{
    header("location:../../login.php");
    echo '<script type="text/javascript">alert("必须登录后才能进入，请先登录");</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>后台管理--修改商品信息</title>
    <meta name='renderer' content='webkit'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>
    <meta name='apple-mobile-web-app-status-bar-style' content='black'>
    <meta name='apple-mobile-web-app-capable' content='yes'>
    <meta name='format-detection' content='telephone=no'>
    <link rel='stylesheet' href='../../layui/css/layui.css' media='all' />
    <link rel='stylesheet' href='../../css/user.css' media='all' />
    <script src="../user/jquery-3.3.1.min.js" type="text/javascript"></script>
</head>
<body class='childrenBody'>

<?php

$id=$_GET['id'];
$im=$_GET['im'];
$sql="select * from tb_phone where id=$id";
$xian=$mysqldb->select($sql);
$row=mysql_fetch_row($xian);
$pieces1 = explode(",", $row[19]);//手机三视图
if($im==0){
    $s='手机正面';
}else if($im==1){
    $s='手机侧面';
}else{
    $s='手机背面';
}

echo "<form class='layui-form' action='img_update_check.php?id=$id&im=$im' method='post' enctype='multipart/form-data'>

    <div class='layui-form-item'><label class='layui-form-label'>$s</label>
        <div class='layui-input-inline' style='width:600px;float: left;margin-top: 20px;'>
            <input type='file' class='layui-btn' style='line-height: 40px'  name='picture$im'    autocomplete='off' class='layui-input'>
            <img src='../../../Reception/images/$pieces1[$im]' style='width: 200px;height: 200px;' id='userFace'>           
        </div>
        <div class='layui-btn' ><a style='color: white;float: left' href='phone_table.php'>返回商品表</a></div>
    </div>
    <div class='layui-form-item' style='margin-left: 5%;'>
        <div class='layui-input-block'>
            <input type='submit' class='layui-btn' lay-submit='' lay-filter='changeUser' value='立即修改'>
        </div>
    </div>

</form>

";
?>




<script type='text/javascript' src='../../layui/layui.js'></script>
<script type='text/javascript' src='../user/user.js'></script>

</body>
</html>