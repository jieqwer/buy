<?php
session_start();
include_once("opensql.php");
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
	<title>layui后台管理</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="Access-Control-Allow-Origin" content="*">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="icon" href="iPhone%20X%20.ico">
	<link rel="stylesheet" href="layui/css/layui.css" media="all" />
	<link rel="stylesheet" href="css/main.css" media="all" />
    <script src="https://cdn.bootcss.com/blueimp-md5/2.10.0/js/md5.js"></script>
</head>
<body class="main_body">
	<div class="layui-layout layui-layout-admin">
		<!-- 顶部 -->
		<div class="layui-header header">
			<div class="layui-main">
				<a href="#" class="logo">layui后台管理</a>
				<!-- 搜索 -->
				<div class="layui-form component">
			        <select name="modules" lay-verify="required" lay-search="">
						<option value="">直接选择或搜索选择</option>
						<option value="1">layer</option>
						<option value="2">form</option>
						<option value="3">layim</option>
						<option value="4">element</option>
						<option value="5">laytpl</option>
						<option value="6">upload</option>
						<option value="7">laydate</option>
						<option value="8">laypage</option>
						<option value="9">flow</option>
						<option value="10">util</option>
						<option value="11">code</option>
						<option value="12">tree</option>
						<option value="13">layedit</option>
						<option value="14">nav</option>
						<option value="15">tab</option>
						<option value="16">table</option>
						<option value="17">select</option>
						<option value="18">checkbox</option>
						<option value="19">switch</option>
						<option value="20">radio</option>
			        </select>
			        <i class="layui-icon">&#xe615;</i>
			    </div>
			    <!-- 天气信息 -->
			    <div class="weather" pc>
			    	<div id="tp-weather-widget"></div>
					<script>(function(T,h,i,n,k,P,a,g,e){g=function(){P=h.createElement(i);a=h.getElementsByTagName(i)[0];P.src=k;P.charset="utf-8";P.async=1;a.parentNode.insertBefore(P,a)};T["ThinkPageWeatherWidgetObject"]=n;T[n]||(T[n]=function(){(T[n].q=T[n].q||[]).push(arguments)});T[n].l=+new Date();if(T.attachEvent){T.attachEvent("onload",g)}else{T.addEventListener("load",g,false)}}(window,document,"script","tpwidget","//widget.seniverse.com/widget/chameleon.js"))</script>
					<script>tpwidget("init", {
					    "flavor": "slim",
					    "location": "WX4FBXXFKE4F",
					    "geolocation": "disabled",
					    "language": "zh-chs",
					    "unit": "c",
					    "theme": "chameleon",
					    "container": "tp-weather-widget",
					    "bubble": "disabled",
					    "alarmType": "badge",
					    "color": "#FFFFFF",
					    "uid": "U9EC08A15F",
					    "hash": "14dff75e7253d3a8b9727522759f3455"
					});
					tpwidget("show");</script>
			    </div>
			    <!-- 顶部右侧菜单 -->
                <ul class="layui-nav top_menu">
                    <li class="layui-nav-item showNotice" id="showNotice" pc>
                        <a href="javascript:;"><i class="iconfont icon-gonggao"></i><cite>系统公告</cite></a>
                    </li>
                    <li class="layui-nav-item lockcms" >
                        <a href="javascript:;"><i class="iconfont icon-lock1"></i><cite>锁屏</cite></a>
                    </li>
                    <li class="layui-nav-item" >
                        <a href="javascript:;">
                            <?php
                            $sql='select * from tb_admin where a_username="'.$username.'"';
                            $xian=$mysqldb->select($sql);
                            while ($row=mysql_fetch_row($xian)) {
                                echo "<img src='images/$row[10]' class='layui-circle' width='35' height='35'>
	                                <cite> $row[0]</cite>";
                            }
                            ?>
                        </a>
                        <dl class="layui-nav-child">
                            <dd><a href="javascript:;" data-url="page/user/userInfo.php"><i class="iconfont icon-zhanghu" data-icon="icon-zhanghu"></i><cite>个人资料</cite></a></dd>
                            <dd><a href="javascript:;" data-url="page/user/changePwd.php"><i class="iconfont icon-shezhi1" data-icon="icon-shezhi1"></i><cite>修改密码</cite></a></dd>
                            <dd><a href="ssion.php"><i class="iconfont icon-loginout"></i><cite>退出</cite></a></dd>
                        </dl>
                    </li>
                </ul>
			</div>
		</div>
		<!-- 左侧导航 -->
		<div class="layui-side layui-bg-black">
			<div class="user-photo">
                <?php
                $sql='select * from tb_admin where a_username="'.$username.'"';
                $xian=$mysqldb->select($sql);
                $row=mysql_fetch_row($xian);
                echo "<a class='img' title='我的头像' ><img src='images/$row[10]'></a>
				<p>你好！<span class='userName'>$row[0]</span>, 欢迎登录</p>";

                ?>
			</div>
			<div class="navBar layui-side-scroll"></div>
		</div>
		<!-- 右侧内容 -->
		<div class="layui-body layui-form">
			<div class="layui-tab marg0" lay-filter="bodyTab">
				<ul class="layui-tab-title top_tab">
					<li class="layui-this" lay-id=""><i class="iconfont icon-computer"></i> <cite>后台首页</cite></li>
				</ul>
				<div class="layui-tab-content clildFrame">
					<div class="layui-tab-item layui-show">
						<iframe src="page/main.php"></iframe>
					</div>
				</div>
			</div>
		</div>
		<!-- 底部 -->
		<div class="layui-footer footer">
            <p>copyright @2018　<a onclick="donation()" class="layui-btn layui-btn-danger l·ayui-btn-small">联系作者</a></p>
        </div>
	</div>

	<!-- 锁屏 -->
	<div class="admin-header-lock" id="lock-box" style="display: none;">
        <div class="admin-header-lock-img"><img src="images/<?php echo $row[10]  ?>"/></div>
        <div class="admin-header-lock-name" id="lockUserName"><?php echo $row[0] ?></div>
		<div class="input_btn">
			<input type="password" class="admin-header-lock-input layui-input" placeholder="请输入密码解锁.." name="lockPwd" id="lockPwd" />
			<button class="layui-btn" id="unlock">解锁</button>
		</div>
        <p>请输入您的登录密码，否则不会解锁成功哦！！！</p>
	</div>
	<!-- 移动导航 -->
	<div class="site-tree-mobile layui-hide"><i class="layui-icon">&#xe602;</i></div>
	<div class="site-mobile-shade"></div>


	<script type="text/javascript" src="layui/layui.js"></script>
	<script type="text/javascript" src="js/nav.js"></script>
	<script type="text/javascript" src="js/leftNav.js"></script>
    <script type="text/javascript" >
        var $,tab,skyconsWeather;
        layui.config({
            base : "js/"
        }).use(['bodyTab','form','element','layer','jquery'],function(){
            var form = layui.form(),
                layer = layui.layer,
                element = layui.element();
            $ = layui.jquery;
            tab = layui.bodyTab();

            //锁屏
            function lockPage(){
                layer.open({
                    title : false,
                    type : 1,
                    content : $("#lock-box"),
                    closeBtn : 0,
                    shade : 0.9
                })
            }
            $(".lockcms").on("click",function(){
                window.sessionStorage.setItem("lockcms",true);
                lockPage();
            })
            // 判断是否显示锁屏
            if(window.sessionStorage.getItem("lockcms") == "true"){
                lockPage();
            }
            // 解锁
            $("#unlock").on("click",function(){
                if($(this).siblings(".admin-header-lock-input").val() == ''){
                    layer.msg("请输入解锁密码！");
                }else{
                    if(md5($(this).siblings(".admin-header-lock-input").val()) == '<?php echo $row[3];  ?>' ){ /*设置密码*/
                        window.sessionStorage.setItem("lockcms",false);
                        $(this).siblings(".admin-header-lock-input").val('');
                        layer.closeAll("page");
                    }else{
                        layer.msg("密码错误，请重新输入！");
                    }
                }
            });

            $(document).on('keydown', function() {
                if(event.keyCode == 13) {
                    $("#unlock").click();
                }
            });

            //手机设备的简单适配
            var treeMobile = $('.site-tree-mobile'),
                shadeMobile = $('.site-mobile-shade')

            treeMobile.on('click', function(){
                $('body').addClass('site-mobile');
            });

            shadeMobile.on('click', function(){
                $('body').removeClass('site-mobile');
            });

            // 添加新窗口
            $(".layui-nav .layui-nav-item a").on("click",function(){
                addTab($(this));
                $(this).parent("li").siblings().removeClass("layui-nav-itemed");
            })

            //公告层
            function showNotice(){
                layer.open({
                    type: 1,
                    title: "系统公告", //不显示标题栏
                    closeBtn: false,
                    area: '310px',
                    shade: 0.8,
                    id: 'LAY_layuipro', //设定一个id，防止重复弹出
                    btn: ['火速围观'],
                    moveType: 1, //拖拽模式，0或者1
                    content: '<div style="padding:15px 20px; text-align:justify; line-height: 22px; text-indent:2em;border-bottom:1px solid #e2e2e2;"><p>最近泸州天气有点热</p><p>别跟我说什么晴空万里</p></div>',
                    success: function(layero){
                        var btn = layero.find('.layui-layer-btn');
                        btn.css('text-align', 'center');
                        btn.on("click",function(){
                            window.sessionStorage.setItem("showNotice","true");
                        })
                        if($(window).width() > 432){  //如果页面宽度不足以显示顶部“系统公告”按钮，则不提示
                            btn.on("click",function(){
                                layer.tips('系统公告躲在了这里', '#showNotice', {
                                    tips: 3
                                });
                            })
                        }
                    }
                });
            }
            //判断是否处于锁屏状态(如果关闭以后则未关闭浏览器之前不再显示)
            if(window.sessionStorage.getItem("lockcms") != "true" && window.sessionStorage.getItem("showNotice") != "true"){
                showNotice();
            }
            $(".showNotice").on("click",function(){
                showNotice();
            })

            //刷新后还原打开的窗口
            if(window.sessionStorage.getItem("menu") != null){
                menu = JSON.parse(window.sessionStorage.getItem("menu"));
                curmenu = window.sessionStorage.getItem("curmenu");
                var openTitle = '';
                for(var i=0;i<menu.length;i++){
                    openTitle = '';
                    if(menu[i].icon.split("-")[0] == 'icon'){
                        openTitle += '<i class="iconfont '+menu[i].icon+'"></i>';
                    }else{
                        openTitle += '<i class="layui-icon">'+menu[i].icon+'</i>';
                    }
                    openTitle += '<cite>'+menu[i].title+'</cite>';
                    openTitle += '<i class="layui-icon layui-unselect layui-tab-close" data-id="'+menu[i].layId+'">&#x1006;</i>';
                    element.tabAdd("bodyTab",{
                        title : openTitle,
                        content :"<iframe src='"+menu[i].href+"' data-id='"+menu[i].layId+"'></frame>",
                        id : menu[i].layId
                    })
                    //定位到刷新前的窗口
                    if(curmenu != "undefined"){
                        if(curmenu == '' || curmenu == "null"){  //定位到后台首页
                            element.tabChange("bodyTab",'');
                        }else if(JSON.parse(curmenu).title == menu[i].title){  //定位到刷新前的页面
                            element.tabChange("bodyTab",menu[i].layId);
                        }
                    }else{
                        element.tabChange("bodyTab",menu[menu.length-1].layId);
                    }
                }
            }

        })

        //打开新窗口
        function addTab(_this){
            tab.tabAdd(_this);
        }

        //捐赠弹窗
        function donation(){
            layer.tab({
                area : ['260px', '367px'],
                tab : [{
                    title : "微信",
                    content : "<div style='padding:30px;overflow:hidden;background:#d2d0d0;'><img src='images/wechat.jpg'></div>"
                },{
                    title : "支付宝",
                    content : "<div style='padding:30px;overflow:hidden;background:#d2d0d0;'><img src='images/alipay.jpg'></div>"
                }]
            })
        }

    </script>
</body>
</html>