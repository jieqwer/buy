
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
    <title>后台管理--修改密码</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="../../layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="../../css/user.css" media="all" />
</head>
<body class="childrenBody">
<?php
$sql='select * from tb_admin where a_username="'.$username.'"';
$xian=$mysqldb->select($sql);
$row=mysql_fetch_row($xian);

?>
<form class="layui-form changePwd" method="post" action="changePwd_check.php">
    <div style="margin:0 0 15px 110px;color:#f00;">旧密码请输入您的初始密码，新密码必须两次输入一致才能提交</div>
    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-block">
            <input type="text" value="<?php echo $row[0]?>" disabled class="layui-input layui-disabled">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">旧密码</label>
        <div class="layui-input-block">
            <input type="password" name="password" placeholder="请输入旧密码" lay-verify="required|oldPwd" class="layui-input pwd">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">新密码</label>
        <div class="layui-input-block">
            <input type="password" name="password1" placeholder="请输入新密码" lay-verify="required|newPwd" id="oldPwd" class="layui-input pwd">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">确认密码</label>
        <div class="layui-input-block">
            <input type="password" name="password2" placeholder="请确认密码" lay-verify="required|confirmPwd" class="layui-input pwd">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input class="layui-btn" type="submit"  lay-submit=''  lay-filter="changePwd" value="立即修改"/>
            <input type="reset" class="layui-btn layui-btn-primary" value="重置"/>
        </div>
    </div>
</form>
<script type="text/javascript" src="../../layui/layui.js"></script>
<script type="text/javascript" src="user.js"></script>
</body>
</html>