
<!DOCTYPE html>
<!-- saved from url=(0071)http://www.17sucai.com/preview/33522/2017-10-20/LarryCMS-new/login.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>后台登录</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <!-- load css -->
    <link rel="stylesheet" href="layui/css/layui.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/login.css" media="all">
    <script src="js/jquery.min.js"></script>
    <script src='js/prefixfree.min.js'></script>
    <style class="cp-pen-styles">
        body {
            background-attachment: fixed;
            overflow: hidden;
        }
        @keyframes rotate {
            0% {
                transform: perspective(400px) rotateZ(20deg) rotateX(-40deg) rotateY(0);
            }
            100% {
                transform: perspective(400px) rotateZ(20deg) rotateX(-40deg) rotateY(-360deg);
            }
        }
        .stars {
            transform: perspective(500px);
            transform-style: preserve-3d;
            position: absolute;
            bottom: 0;
            perspective-origin: 50% 100%;
            left: 30%;
            animation: rotate 80s infinite linear;
        }
        .star {
            width: 1px;
            height: 1px;
            background: #0fff4f;
            position: absolute;
            top: 0;
            left: 0;
            transform-origin: 0 0 -300px;
            transform: translate3d(0, 0, -300px);
            backface-visibility: hidden;
        }


        body{
            background: rgba(38, 48, 87, 0.8);
        }
        @media (max-width:800px) {

            .layui-canvs{
            }
            .layui-layout{
                width: auto;
            }
        }
    </style>
<body>
<div class="layui-layout layui-layout-login">
    <h1>
        <strong>管理系统后台</strong>
        <em>Welcome you to here</em>
    </h1>
    <form method="post" action="login_check.php">
        <div class="layui-user-icon larry-login">
            <input type="text" placeholder="账号" class="login_txtbx" name="username">
        </div>
        <div class="layui-pwd-icon larry-login">
            <input type="password" placeholder="密码" class="login_txtbx" name="password">
        </div>
        <div class="layui-val-icon larry-login">
            <div class="layui-code-box">
                <input type="text" id="code" name="code" placeholder="验证码" maxlength="4"  class="login_txtbx" >
                <canvas width="80px" height="30px"  id="canvas-vcode"></canvas>
            </div>
        </div>
        <div class="layui-submit larry-login">
            <input type="submit" value="立即登陆" class="submit_btn">
        </div>
        <div class="layui-login-text">
            <p>© 2017-2018 MATCH 版权所有</p>
            <p>蜀ICP备18006488号-2</p>
        </div>
    </form>
</div>
<div class="layui-canvs" style="width:100%; height:100%;"></div>
<div class="site-demo-button" id="layerDemo" >
    <button data-method="notice" class="layui-btn">管理员登录公告层</button>
</div>
<div class="stars"></div>
<script src='js/stopExecutionOnTimeout.js'></script>
<script src="layui/layui.js"></script>
<script>
    $(document).ready(function () {
        var stars = 800;
        var $stars = $('.stars');
        var r = 1000;
        for (var i = 0; i < stars; i++) {
            if (window.CP.shouldStopExecution(1)) {
                break;
            }
            var $star = $('<div/>').addClass('star');
            $stars.append($star);
        }
        window.CP.exitedLoop(1);
        $('.star').each(function () {
            var cur = $(this);
            var s = 0.5 + Math.random() * 1;
            var curR = r + Math.random() * 200;
            cur.css({
                transformOrigin: '0 0 ' + curR + 'px',
                transform: ' translate3d(0,0,-' + curR + 'px) rotateY(' + Math.random() * 360 + 'deg) rotateX(' + Math.random() * -50 + 'deg) scale(' + s + ',' + s + ')'
            });
        });
    });

    $("#canvas-vcode").click(function() {  //点击向后台执行一次请求，并返回值
        $.ajax({
            type:"GET",
            url:"code.php",
            success:function (msg) {
                var obj= JSON.parse(msg);
                drawCode1(obj);
            }
        });
    });

    function drawCode1(code) {
        var c=document.getElementById("canvas-vcode");
        var ctx=c.getContext("2d");
        ctx.clearRect(0, 0, c.width, c.height);//每次产生验证码时先清除画布的内容
        ctx.font="20px 微软雅黑";
        ctx.fillStyle="red";
        ctx.textAlign="center";
        ctx.textBaseline="middle";
        ctx.fillText(code ,40,15);

        for(var i=0;i<20;i++){
            var x=Math.ceil(Math.random()*80);
            var y=Math.ceil(Math.random()*30);
            var z=Math.ceil(Math.random()*3);
            var r=Math.ceil(Math.random()*255);
            var g=Math.ceil(Math.random()*255);
            var b=Math.ceil(Math.random()*255);
            ctx.fillStyle="rgb("+r+","+g+","+b+")";
            ctx.beginPath();
            ctx.arc(x,y,z,0,Math.PI*2,false);
            ctx.closePath();
            ctx.fill();

        }
        for(var j=0;j<4;j++){
            var a=Math.ceil(Math.random()*80);
            var b=Math.ceil(Math.random()*30);
            var m=Math.ceil(Math.random()*80);
            var n=Math.ceil(Math.random()*30);
            ctx.moveTo(a,b);
            ctx.lineTo(m,n);
            ctx.lineWidth=2;
            ctx.stroke();
            var r=Math.ceil(Math.random()*255);
            var g=Math.ceil(Math.random()*255);
            var b=Math.ceil(Math.random()*255);
            ctx.strokeStyle="rgb("+r+","+g+","+b+")";
        }
    }
    $("#canvas-vcode").trigger("click");//手动触发一次change事件
</script>

<script>

    layui.use('layer', function(){ //独立版的layer无需执行这一句
        var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句

        //触发事件
        var active = {
            notice: function(){
                //示范一个公告层
                layer.open({
                    type: 1
                    ,title: false //不显示标题栏
                    ,closeBtn: false
                    ,area: '300px;'
                    ,shade: 0.8
                    ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
                    ,btn: ['残忍拒绝', '开始登录']
                    ,btnAlign: 'c'
                    ,moveType: 1 //拖拽模式，0或者1
                    ,content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;"><br>1、请勿重复登录 ^_^</br><br>2、信息有误请联系管理员 ^_^</br><br>1、感谢你的观看 ^_^</br></div>'
                    ,success: function(layero){
                        var btn = layero.find('.layui-layer-btn');
                        btn.find('.layui-layer-btn0').attr({
                            href: 'login.php'
                            ,target: '_blank'
                        });
                    }
                });
            }
        };

        $('#layerDemo .layui-btn').on('click', function(){
            var othis = $(this), method = othis.data('method');
            active[method] ? active[method].call(this, othis) : '';
        });
        $("#layerDemo .layui-btn").trigger("click");

    });

</script>

</body>

</html>