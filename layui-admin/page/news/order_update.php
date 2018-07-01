<meta charset="utf-8">
<?php
session_start();
include_once("../../opensql.php");
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
    $sql="select * from tb_admin where a_username='$username'";
    $xian=$mysqldb->select($sql);
    $row=mysql_fetch_row($xian);
    if($row[1]=="超级管理员"){
        $id=$_GET['id'];
        $sql1="select * from tb_order where o_id=$id";
        $xian1=$mysqldb->select($sql1);
        $row1=mysql_fetch_row($xian1);
    }else{
        header("refresh:0;url=order_table.php");
        echo '<script type="text/javascript">alert("您的权限不够，请联系超级管理员");</script>';
        die();
    }
}else{
    header("refresh:0;url=order_table.php");
    echo '<script type="text/javascript">alert("必须登录后才能进入，请先登录");</script>';
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>订单管理--后台管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="../../layui/css/layui.css" media="all" />
    <style type="text/css">
        .layui-form-item .layui-inline{ width:33.333%; float:left; margin-right:0; height: 500px;}
        @media(max-width:1240px){
            .layui-form-item .layui-inline{ width:100%; float:none; }
        }
    </style>
</head>

<body class="childrenBody">
<form method="post" action="order_check.php?id=<?php echo $row1[13] ?>" class="layui-form" style="width:80%;">
    <div class='user_left' style="width: 700px;float: left">
        <div class='layui-form-item'>
            <label class='layui-form-label'>订单联系人</label>
            <div class='layui-input-block'>
                <input type='text' name="name" value="<?php echo $row1[9] ?>" placeholder='订单联系人' lay-verify='required' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>订单联系人电话</label>
            <div class='layui-input-block'>
                <input type='tel' name="tel" value="<?php echo $row1[10] ?>" placeholder='请输入联系人电话' lay-verify='required' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>下单收货地址</label>
            <div class='layui-input-block'>
                <input type='text' name="please" value="<?php echo $row1[6] ?>" placeholder='请输入地址' lay-verify='required' class='layui-input'>
            </div>
        </div>
    </div>
    <div class="user_right" style="float: left;width: 200px;">
        <div class='layui-btn' style="margin-left: 40px;" ><a style="color: white" href="order_table.php">返回订单表</a></div>
    </div>
    <div class='layui-form-item' style='margin-left: 5%;'>
        <div class='layui-input-block'>
            <input type="submit" class='layui-btn' lay-submit='' lay-filter='changeUser' value="立即提交">
            <button type='reset' class='layui-btn layui-btn-primary'>重置</button>
        </div>
    </div>
</form>
<script type="text/javascript" src="../../layui/layui.js"></script>

</body>
</html>