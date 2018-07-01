
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
    <title>修改用户资料--layui后台管理</title>
    <meta name='renderer' content='webkit'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>
    <meta name='apple-mobile-web-app-status-bar-style' content='black'>
    <meta name='apple-mobile-web-app-capable' content='yes'>
    <meta name='format-detection' content='telephone=no'>
    <link rel='stylesheet' href='../../layui/css/layui.css' media='all' />
    <link rel='stylesheet' href='../../css/user.css' media='all' />
    <script src="../user/jquery-3.3.1.min.js" type="text/javascript"></script>
    <style>
        #layui-layer-iframe1{
            height: 500px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            //  加载所有的省份
            $.ajax({
                type: "POST",
                url: "ajax.php", // type=1表示查询省份
                success: function(data) {
                    $("#provinces").html("<option value='四川省'>请选择省</option>");
                    var msg = JSON.parse(data);
                    $.each(msg, function(i, n) {
                        $("#provinces").append("<option value='" + n.provinceID + "'>" + n.province + "</option>");
                    });
                }
            });

            $("#provinces").change(function() {
                var provincesID = $('#provinces').val();
                $.ajax({
                    type: "POST",
                    url: "ajaxCity.php", // type =2表示查询市
                    data: {'provincesID':provincesID},
                    dataType: "json",
                    success: function(data) {
                        $("#citys").html("<option value=''>请选择市</option>");
                        $("#areas").html("<option value=''>请选择县</option>");
                        $.each(data, function(i, n) {
                            $("#citys").append("<option value='" + n.cityID + "'>" + n.city + "</option>");
                        });
                    }
                });

            });


            $("#citys").change(function() {
                var cityID = $('#citys').val();
                $.ajax({
                    type: "POST",
                    url: "ajaxArea.php",
                    data: {"cityID": cityID},
                    dataType: "json",
                    success: function(data) {
                        $("#areas").html("<option value=''>请选择县</option>");
                        $.each(data, function(i, n) {
                            $("#areas").append("<option value='" + n.areaID + "'>" + n.area + "</option>");
                        });
                    }
                });
            });

        });


    </script>
</head>
<body class='childrenBody'>

<form class='layui-form' action="adduser_check.php" method="post" enctype="multipart/form-data">
    <div class='user_left'>
        <div class='layui-form-item'>
            <label class='layui-form-label'>用户名</label>
            <div class='layui-input-block'>
                <input type='text' name="username" lay-verify='required'   class='layui-input '>
            </div>
        </div>

        <div class='layui-form-item'>
            <label class='layui-form-label'>用户组</label>
            <div class='layui-input-block'>
                <select name="userGrade" class="userGrade" >
                    <option value="学生管理员">学生管理员</option>
                    <option value="干部管理员">干部管理员</option>
                    <option value="教师管理员">教师管理员</option>
                    <option value="超级管理员">超级管理员</option>
                </select>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>真实姓名</label>
            <div class='layui-input-block'>
                <input type='text' name="na"  placeholder='请填写您的真实姓名' lay-verify='required' class='layui-input '>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>密码</label>
            <div class='layui-input-block'>
                <input type='password'  placeholder='默认密码123456'  disabled class='layui-input layui-disabled'>
            </div>
        </div>


        <div class='layui-form-item' pane=''>
            <label class='layui-form-label'>性别</label>
            <div class='layui-input-block'>
                <input type='radio' name='sex' checked value='男' title='男'  >
                <input type='radio' name='sex' value='女' title='女' >
                <input type='radio' name='sex' value='保密' title='保密' >
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>手机号码</label>
            <div class='layui-input-block'>
                <input type='tel' name="tel"  placeholder='请填写常用的手机号码' lay-verify='required|phone' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>出生日期</label>
            <div class='layui-input-block'>
                <input type='text' name="riqi"  placeholder='请填写正确的出生日期' lay-verify='required|date' onclick='layui.laydate({elem: this,max: laydate.now()})' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>

            <label class='layui-form-label'>家庭住址</label>
            <div class='layui-input-inline'>
                <select name='province' id="provinces" style="width: 100px;height: 30px; ">
                    <option value="四川省">四川省</option>
                </select>
            </div>
            <div class='layui-input-inline'>
                <select name='city'  id="citys" style="width: 100px;height: 30px; ">
                    <option value="泸州市">泸州市</option>
                </select>
            </div>
            <div class='layui-input-inline'>
                <select name='area' lay-filter='area' id="areas" style="width: 100px;height: 30px; ">
                    <option value="龙马潭区">龙马潭区</option>
                </select>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>兴趣爱好</label>
            <div class='layui-input-block'>
                <input type='checkbox' name='like1[javascript]' value="Javascript" title='Javascript' >
                <input type='checkbox' name='like1[html]' title='HTML(5)' value="HTML(5)" >
                <input type='checkbox' name='like1[css]' title='CSS(3)' VALUE="CSS(3)" >
                <input type='checkbox' name='like1[php]' title='PHP' VALUE="php" >
                <input type='checkbox' name='like1[.net]' title='.net' VALUE=".net" >
                <input type='checkbox' name='like1[ASP]' title='ASP' value="ASP" >
                <input type='checkbox' name='like1[C#]' title='C#' value="C#" >
                <input type='checkbox' name='like1[Angular]' title='Angular' value="Angular" >
                <input type='checkbox' name='like1[VUE]' title='VUE' value="VUE"  >
                <input type='checkbox' name='like1[XML]' title='XML' value="XML"  >
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>邮箱</label>
            <div class='layui-input-block'>
                <input type='text' name="email"  placeholder='请填写您的邮箱' lay-verify='required|email' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>自我评价</label>
            <div class='layui-input-block'>
                <textarea name="say" placeholder='来都来了，就随便说点吧'  class='layui-textarea'></textarea>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>状态</label>
            <div class='layui-input-block'>
                <select name="zhuang">
                    <option value="启用" >启用</option>
                    <option value="禁用" >禁用</option>
                </select>
            </div>
        </div>
    </div>
    <div class='user_right'>
        <input type='file' name='myFile' class='layui-upload-file' lay-title='掐指一算，我要换一个头像了'>
        <p>哈哈，点击上方空白上传头像</p>
    </div>
    <div class='layui-btn' ><a style="color: white" href="newsList.php">返回管理员表</a></div>
    <div class='layui-form-item' style='margin-left: 5%;'>
        <div class='layui-input-block'>
            <input type="submit" class='layui-btn' lay-submit='' lay-filter='changeUser' value="立即提交">
            <button type='reset' class='layui-btn layui-btn-primary'>重置</button>
        </div>
    </div>
</form>


<script type='text/javascript' src='../../layui/layui.js'></script>
<script type='text/javascript' src='../user/user.js'></script>
</body>
</html>