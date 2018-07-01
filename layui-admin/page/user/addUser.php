<meta charset="utf-8">
<?php
session_start();
include_once("../../opensql.php");
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
}else{
    header("location:login.php");
    echo '<script type="text/javascript">alert("必须登录后才能进入，请先登录");</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>后台管理--会员添加</title>
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
	<form method="post" action="addUser_check.php" class="layui-form" style="width:80%;">
        <div class='user_left'>
        <div class='layui-form-item'>
            <label class='layui-form-label'>姓名</label>
            <div class='layui-input-block'>
                <input type='text'  name="username"  placeholder='请输入姓名'   lay-verify='required|text' class='layui-input '>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>邮箱</label>
            <div class='layui-input-block'>
                <input type='text' name="email" placeholder='请输入邮箱' lay-verify='required|email' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>密码</label>
            <div class='layui-input-block'>
                <input type='password' name="password"  placeholder='请输入密码' lay-verify='required|password' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>手机号码</label>
            <div class='layui-input-block'>
                <input type='tel' name="tel"  placeholder='请输入手机号码' lay-verify='required|phone' class='layui-input'>
            </div>
        </div>

        <div class='layui-form-item'>
            <label class='layui-form-label'>状态</label>
            <div class='layui-input-block'>
                <select name="zhuang">
                    <option value="0"  >启用</option>
                    <option value="1"  >禁用</option>
                </select>
            </div>
        </div>
        </div>
        <div class='layui-form-item' style='margin-left: 5%;'>
            <div class='layui-input-block'>
                <input type="submit" class='layui-btn' lay-submit='' lay-filter='changeUser' value="立即提交">
                <button type='reset' class='layui-btn layui-btn-primary'>重置</button>
            </div>
        </div>


	</form>
	<script type="text/javascript" src="../../layui/layui.js"></script>
	<script type="text/javascript" src="addUser.js"></script>
</body>
</html>