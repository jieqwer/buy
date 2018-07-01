<meta charset="utf-8">
<?php

include_once("opensql.php");
session_start();

if(empty($_SESSION['email'])){
    echo '<script type="text/javascript">alert("您还没有登录，请先登录");</script>';
    header('refresh:0;url=login.php');
    die();
}else{
    $email=$_SESSION['email'];
}
$sql4="select * from tb_cart where u_id in(select u_id from tb_user where u_email='$email')";

$xian4=$mysqldb->select($sql4);
$row4=mysql_num_rows($xian4);


?>
<!DOCTYPE html>
<html>
<head>
<title>Checkout</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
	<script src="js/simpleCart.min.js"> </script>
<!-- cart -->
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet">
<script src="js/wow.min.js"></script>
    <link href="layui/css/layui.css" type="text/css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/index.css" type="text/css">
    <script src="layui/layui.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
</head>
	
<body>
<!-- header -->
<div class="header">
    <div class="container">
        <div class="header-grid">
            <div class="header-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                <ul>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:xiaoxiaoli7@outlook.com">给我发送邮件</a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1828 111 2810</li>
                    <li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="login.php">登录</a></li>
                    <li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="register.php">注册</a></li>
                </ul>
            </div>
            <div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">
                <ul  class="social-icons ">
                    <?php
                    if(empty($_SESSION['email'])){
                        echo "<li style='font-size:14px;color: #028298;'>你还没有登录</li>";
                    }else{
                        $email=$_SESSION['email'];
                        echo "<li style='font-size:14px;color: #028298;'>欢迎您</li><li><a class='tui'>$email</a>
                        <ul class='er'>
                            <li><a href='mess.php'>我的信息</a></li>
                            <li><a href='ssion.php'>退出</a></li>
                        </ul>
                    </li>";
                    }
                    ?>

                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="logo-nav">
            <div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
                <h1><a href="index.php">Best Phone <span>开始你的手机发现之旅</span></a></h1>
            </div>
            <div class="logo-nav-left1">
                <nav class="navbar navbar-default">
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav">
                            <li ><a href="index.php" class="act">Home</a></li>
                            <li class="dropdown">
                                <a  href="#" class="dropdown-toggle" data-toggle="dropdown">菜单 <b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="row">
                                        <?php
                                        $sql="select * from tb_classification1";
                                        $xian=$mysqldb->select($sql);
                                        while ($row=mysql_fetch_array($xian)){
                                            echo "<div class='col-sm-3'>
											<ul class='multi-column-dropdown'>
												<h6>$row[0]</h6>";
                                            $sql1="select * from tb_classification2 where c1_id=$row[1]";
                                            $xian1=$mysqldb->select($sql1);
                                            while ($row1=mysql_fetch_array($xian1)){
                                                if($row1[2]=='1'){
                                                    echo "<li><a class='yan' style='color:#ff7918 !important' href='index_c.php?id=$row1[3]'>$row1[0]</a></li>";
                                                }else{
                                                    echo "<li><a class='yan' href='index_c.php?id=$row1[3]'>$row1[0]</a></li>";
                                                }
                                            }
                                            echo "</ul></div>";
                                        }
                                        ?>
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>
                            <li ><a href="phone.php" class="act">phone</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">网站导航 <b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="row">
                                        <?php
                                        $sql2="select * from tb_classification3";
                                        $xian2=$mysqldb->select($sql2);
                                        while ($row2=mysql_fetch_array($xian2)){
                                            echo "<div class='col-sm-4'>
											<ul class='multi-column-dropdown'>
												<h6>$row2[0]</h6>";
                                            $sql3="select * from tb_classification4 where c3_id=$row2[1]";
                                            $xian3=$mysqldb->select($sql3);
                                            while ($row3=mysql_fetch_array($xian3)){
                                                if($row3[3]=='1'){
                                                    echo "<li><a class='yan' style='color:#ff7918 !important' href='$row3[1]'>$row3[0]</a></li>";
                                                }else{
                                                    echo "<li><a class='yan' href='$row3[1]'>$row3[0]</a></li>";
                                                }

                                            }
                                            echo "</ul></div>";
                                        }
                                        ?>
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>
                            <li><a href="order.php">我的订单</a></li>
                            <li><a href="mail.php">联系我们</a></li>

                        </ul>
                    </div>
                </nav>
            </div>
            <div class="logo-nav-right">
                <div class="search-box">
                    <div id="sb-search" class="sb-search" style="right: 28%">
                        <form action="index_check.php" method="post">
                            <input class="sb-search-input" name="phone" placeholder="搜索你喜欢的手机..." type="search" id="search">
                            <input class="sb-search-submit" type="submit" value="">
                            <span class="sb-icon-search"> </span>
                        </form>
                    </div>
                </div>
                <!-- search-scripts -->
                <script src="js/classie.js"></script>
                <script src="js/uisearch.js"></script>
                <script>
                    new UISearch( document.getElementById( 'sb-search' ) );
                </script>
                <!-- //search-scripts -->
            </div>
            <div class="header-right">
                <div class="cart box_1">
                    <a href="cart.php">
                        <h3> <div class="total">
                                (<span  ><?php echo $row4 ?></span> 款手机)</div>
                            <img src="images/bag.png" alt="" />
                        </h3>
                    </a>
                    <p><a href="javascript:;" class="simpleCart_empty"><?php if($row4>0){echo "购物车";}else{echo "空购物车";} ?></a></p>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">购物车</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<h3 class="animated wow slideInLeft" data-wow-delay=".5s">您的仓库现在有: <span><?php if($row4>0){echo $row4;}else{echo "0";}?>款类型的手机</span></h3>
			<div class="checkout-right animated wow slideInUp" data-wow-delay=".5s">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>手机</th>
							<th>图片</th>
							<th>数量</th>
							<th>手机名称</th>
							<th>手机规格</th>
							<th>服务费</th>
							<th>价格</th>
							<th>操作</th>
						</tr>
					</thead>
                    <?php
                    $sql5="select * from tb_cart where u_id in(select u_id from tb_user where u_email='$email')";
                    $xian5=$mysqldb->select($sql5);
                    while ($row5=mysql_fetch_array($xian5)){
                        echo "
                        <tr class='rem1'>
						<td class='invert'><input  name='che' value='$row5[10]'  type='checkbox'></td>
						<td class='invert-image' style='width: 300px;'><a href='single.php?id=$row5[8]'><img src='images/$row5[1]' alt='' class='img-responsive' /></a></td>
						<td class='invert'>
							 <div class='quantity'>
								<div class='quantity-select'>
									<a data-m='$row5[10]' class='entry value-minus'>&nbsp;</a>
									<div class='entry value'><span>$row5[2]</span></div>
									<a data-m='$row5[10]' class='entry value-plus active'>&nbsp;</a>
								</div>
							</div>
						</td>
						<td class='invert'>$row5[0]</td>
						<td class='invert'>$row5[3]（$row5[4]$row5[5]）</td>
						<td class='invert'>￥$row5[6]</td>
						<td data-s='$row5[10]' class='invert'>￥$row5[7].00</td>
						<td class='invert'>
							<div class='rem'>
								<a  href='car_delete.php?id=$row5[10]' class='close1'> </a>
							</div>
						</td>
					</tr>";
                    };

                    ?>
				</table>
			</div>
            <div>
                <form class="layui-form-item"  action="" lay-filter="example">
                <div class="layui-form-item">
                    <label class="layui-form-label layui-btn " style="width: 100px">收货地址</label>
                    <div class="layui-input-block ">
                        <select id="address" name="interest" class="layui-input layui-form " >
                            <?php
                                              $sql6="select * from tb_address where a_user in(select u_id from tb_user where u_email='$email')";
                                                $xian6=$mysqldb->select($sql6);
                                               while ($row6=mysql_fetch_array($xian6)){
                                                   if($row6[3]==1){
                                                       echo "<option selected  style='cursor: pointer; width: 40px;height: 40px ;background: #59bb81;color: white' value='$row6[5]'>默认地址</option>";
                                                   }else{
                                                       echo "<option style='appearance:none;  width: 40px;height: 40px ;background: #59bb81;color: white' value='$row6[5]'>地址</option>";
                                                   }
                                               } ;
                                                ?>
                        </select>
                    </div>


                </div>
            </form>
                    <div class='layui-form-item' id="add">

                    </div>


                <script>
                    $("#address").change(function () {
                        $("#add").empty();

                        var a=$("#address").val();
                        $.ajax({
                            type: "POST",
                            url: "ajax7.php",
                            data: {"address": a},
                            dataType: "json",
                            success: function (data) {
                                $.each(data, function(i,n) {
                                    $("#add").append("<label class='layui-form-label' style='background-color: #FBFBFB;  border:1px solid #e6e6e6; border-radius: 2px 0 0 2px;line-height: 18px;'>姓名</label><div class='layui-input-inline'><input type='text' style='width: 200px;' name='username' lay-verify='required' value='"+n.a_name+"' autocomplete='off' class='layui-input'></div><label class='layui-form-label' style='background-color: #FBFBFB;  border:1px solid #e6e6e6; border-radius: 2px 0 0 2px;line-height: 18px;'>电话</label><div class='layui-input-inline'><input type='text' style='width: 200px;' name='tel' lay-verify='required' value='"+n.a_tel+"' autocomplete='off' class='layui-input'></div><label class='layui-form-label' style='background-color: #FBFBFB;  border:1px solid #e6e6e6; border-radius: 2px 0 0 2px;line-height: 18px;'>地址</label><div class='layui-input-inline'><input type='text' style='width: 500px;' name='address' lay-verify='required' value='"+n.a_address+"' autocomplete='off' class='layui-input'></div>");
                                })
                                }
                            })
                        });
                    $("#address").trigger("change");
                </script>

            </div>
			<div class="checkout-left">
                <div class="checkout-left-basket animated wow slideInLeft" style="width: 30%;" data-wow-delay=".5s">
                    <h4>小计</h4>
                    <ul id="count">


                    </ul>
                </div>
                <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                    <a style="cursor: pointer" id="order"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>立即下单</a>
                </div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!--quantity-->
<script>
    //点击增加数量获取当前价格


    $('.value-plus').on('click', function(){
       var c=$(this).parent().parent().parent().parent().find('.invert input').attr("checked");//判断是否被选中
       if(c!='checked'){
           var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
           divUpd.text(newVal);
           var num=newVal;
           var id = $(this).attr('data-m');
           $.ajax({
               type: "POST",
               url: "ajax3.php",
               data: {"num":num,"id":id},
               dataType: "json",
               success: function (data) {
                   var l=data[1];
                   $("td[data-s=" + l + "]").text("￥"+data[0]+".00");
               }
           })
       }else{
           alert('请先去除本手机的选中按钮');
       }
    });
    //点击减少数量获取当前价格

    $('.value-minus').on('click', function(){
        var c=$(this).parent().parent().parent().parent().find('.invert input').attr("checked");//判断是否被选中
        if(c!='checked') {
            var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10) - 1;
            if (newVal >= 1) divUpd.text(newVal);
            var num = newVal;
            var id = $(this).attr('data-m');
            if (num > 0) {
                $.ajax({
                    type: "POST",
                    url: "ajax3.php",
                    data: {"num": num, "id": id},
                    dataType: "json",
                    success: function (data) {
                        var l = data[1];
                        $("td[data-s=" + l + "]").text("￥" + data[0] + ".00");
                    }
                })
            }
        }else{
            alert('请先去除本手机的选中按钮');
        }
    });

    //点击选中
    $("input[type='checkbox']").click(function () {
        $("#count").empty();
        var id_array=new Array();
        $('input[name="che"]:checked').each(function(){
            id_array.push($(this).val());//向数组中添加元素
        });
        var idstr=id_array.join(',');//将数组元素连接起来以构建一个字符串

        $.ajax({
            type: "POST",
            url: "ajax4.php",
            data: {"id":idstr},
            dataType: "json",
            success: function (data) {
                $.each(data[0], function(i,n) {
                    $("#count").append("<li>"+n.c_name+"<i>--"+n.c_color+"（"+n.c_memory+n.c_radio+"）"+n.c_num+"部</i> <span>￥"+n.c_money+".00</span></li>");
                });
                var s=data[1]*5;
                var  ss=data[2][0]*1 + s*1;
                $("#count").append(" <li>服务费 <i>-</i> <span>￥"+s+".00</span></li>");
                $("#count").append(" <li class='zong'>总计 <i>-</i> <span>￥"+ss+".00</span></li>");

            }
        });
    });

    $("#order").click(function () {

            var id_array=new Array();
            $('input[name="che"]:checked').each(function(){
                id_array.push($(this).val());//向数组中添加元素
            });
            var idstr=id_array.join(',');//将数组元素连接起来以构建一个字符串

            var name = $("input[name='username']").val();
            var tel = $("input[name='tel']").val();
            var address= $("input[name='address']").val();

            $.ajax({
                type: "POST",
                url: "ajax5.php",
                data: {"id":idstr,"name":name,"tel":tel,"address":address},
                dataType: "json",
                success: function (data) {
                   alert(data);
                }
            });




    })




</script>
<!--quantity-->
<!-- //checkout -->
<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".5s">
                <h3>关于我们</h3>
                <p><span>因为是实训项目，所以没什么好说的</span><span>这是一个为买卖手机而生的网站</span><span>我们不仅卖手机，我们还卖充电器和耳机......</span></p>
            </div>
            <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".6s">
                <h3>联系方式</h3>
                <ul>
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>泸州市龙马潭区红星街道 <span>长桥路2号-泸州职业技术学院</span></li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:xiaoxiaoli7@outlook.com">xiaoxiaoli7@outlook.com</a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1660 820 9974</li>
                </ul>
            </div>
            <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".7s">
                <h3>店长推荐</h3>
                <?php
                $sql11="select * from tb_phone order by P_inventory asc limit 6";
                $xian11=$mysqldb->select($sql11);
                while ($info11=mysql_fetch_array($xian11)){
                    $piece1 = explode(",", $info11[19]);//手机三视图
                    echo " <div class='footer-grid-left'>
                    <a href='single.php?id=$info11[25]'><img src='images/$piece1[0]' alt='' class='img-responsive' /></a>
                </div>";
                } ;
                ?>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".8s">
                <h3>最新商品</h3>

                <?php
                $sql12="select * from tb_phone order by p_time desc limit 2";
                $xian12=$mysqldb->select($sql12);
                while ($info12=mysql_fetch_array($xian12)){
                    $piece2 = explode(",", $info12[19]);//手机三视图
                    echo "<div class='footer-grid-sub-grids'>
                    <div class='footer-grid-sub-grid-left'>
                        <a href='single.php?id=$info12[25]'><img src='images/$piece2[0]' alt='' class='img-responsive' /></a>
                    </div>
                    <div class='footer-grid-sub-grid-right'>
                        <h4><a href='single.php?id=$info12[25]'>$info12[0]</a></h4>
                        <p style='color: #03a9f4'>$info12[11]</p>
                        <p>发布时间 $info12[23]</p>
                    </div>
                    <div class='clearfix'> </div>
                </div>";
                } ;
                ?>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="footer-logo animated wow slideInUp" data-wow-delay=".5s">
            <h2><a href="index.php">Best Phone<span>shop anywhere</span></a></h2>
        </div>
        <div class="copy-right animated wow slideInUp" data-wow-delay=".5s">
            <p>Copyright &copy; 2018.Best Phone</p>
        </div>
    </div>
</div>
<div class="huidao">
    <div class="toop"><span></span></div>
    <div class="boot"><span></span></div>
</div>
<script>
    $(".toop").click(function () {
        $('html,body').animate({
            scrollTop: 0//高度
        }, 1000);//s时间
    });


    $(".boot").click(function () {
        $('html,body').animate({
            scrollTop:$("body").css("height" )//高度
        }, 1000);//s时间
    });
    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,layedit = layui.layedit
            ,laydate = layui.laydate;

        //日期
        laydate.render({
            elem: '#date'
        });
        laydate.render({
            elem: '#date1'
        });

        //创建一个编辑器
        var editIndex = layedit.build('LAY_demo_editor');

        //自定义验证规则
        form.verify({
            title: function(value){
                if(value.length < 5){
                    return '标题至少得5个字符啊';
                }
            }
            ,pass: [/(.+){6,12}$/, '密码必须6到12位']
            ,content: function(value){
                layedit.sync(editIndex);
            }
        });

        //监听指定开关
        form.on('switch(switchTest)', function(data){
            layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
                offset: '6px'
            });
            layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
        });

        //监听提交
        form.on('submit(demo1)', function(data){
            layer.alert(JSON.stringify(data.field), {
                title: '最终的提交信息'
            })
            return false;
        });

        //表单初始赋值
        form.val('example', {
            "username": "贤心" // "name": "value"
            ,"password": "123456"
            ,"interest": 1
            ,"like[write]": true //复选框选中状态
            ,"close": true //开关状态
            ,"sex": "女"
            ,"desc": "我爱 layui"
        })


    });

</script>
<!-- //footer -->
</body>
</html>