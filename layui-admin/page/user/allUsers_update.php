
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
    <meta charset='utf-8'>
    <title>后台管理--修改用户资料</title>
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

$sql="select * from tb_user where u_id=$id";
$xian=$mysqldb->select($sql);
$row=mysql_fetch_row($xian);

?>
<form class='layui-form' action="allUsers_update_check.php?id=<?php echo $id?>" method="post" enctype="multipart/form-data">
    <div class='user_left'>
        <div class='layui-form-item'>
            <label class='layui-form-label'>姓名</label>
            <div class='layui-input-block'>
                <input type='text' value="<?php echo $row[0]?>" name="username"  placeholder='姓名'   lay-verify='required|text' class='layui-input '>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>邮箱</label>
            <div class='layui-input-block'>
                <input type='text' name="email" value="<?php echo $row[1]?>" placeholder='邮箱' lay-verify='required|email' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>密码</label>
            <div class='layui-input-block'>
                <input type='password' name="password" value="<?php echo $row[2]?>" placeholder='更改密码' lay-verify='required|password' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>手机号码</label>
            <div class='layui-input-block'>
                <input type='tel' name="tel" value="<?php echo $row[3]?>" placeholder='手机号码' lay-verify='required|phone' class='layui-input'>
            </div>
        </div>

        <div class='layui-form-item'>
            <label class='layui-form-label'>状态</label>
            <div class='layui-input-block'>
                <select name="zhuang">
                    <option value="0"  <?php if($row[4]=="0"){echo 'selected';}?>>启用</option>
                    <option value="1"  <?php if($row[4]=="1"){echo 'selected';}?>>禁用</option>
                </select>
            </div>
        </div>
    </div>
    <div class='layui-btn' style="margin-left: 20px;margin-top: 20px;" ><a style="color: white" href="allUsers.php">返回用户表</a></div>
    <div class='layui-form-item' style='margin-left: 5%;'>
        <div class='layui-input-block'>
            <input type="submit" class='layui-btn' lay-submit='' lay-filter='changeUser' value="立即提交">
            <button type='reset' class='layui-btn layui-btn-primary'>重置</button>
        </div>
    </div>
</form>


<script type='text/javascript' src='../../layui/layui.js'></script>
<script type='text/javascript' src='../user/address.js'></script>
<script type='text/javascript' src='../user/user.js'></script>
</body>
</html>