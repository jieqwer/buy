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
    <title>我的信息</title>
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
                            <li ><a  href="order.php">我的订单</a></li>
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
            <li class="active">我的信息</li>
        </ol>
    </div>
</div>
<!-- //breadcrumbs -->
<!-- checkout -->
<div class="checkout">
    <div class="container">
        <?php
        $sql5="select * from tb_user where u_email='$email'";
        $xian5=$mysqldb->select($sql5);
        $row5=mysql_fetch_array($xian5);

        ?>
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class=" layui-tab-title">
                <li class="layui-nav-item  layui-this"><a style="cursor: pointer">我的信息</a></li>
                <li class="layui-nav-item"><a style="cursor: pointer">地址管理</a></li>
                <li class="layui-nav-item"><a style="cursor: pointer">其它</a></li>
            </ul>
            <div class="layui-tab-content" >
                <div class="layui-tab-item layui-show" >
                    <form action="mess_check.php" class="info-form" method="POST" >
                        <div class="layui-form">
                            <div class="form-group" style="height: 40px;">
                                <label class="col-sm-2 control-label" style="color: #009688;line-height: 40px;">姓名</label>
                                <div class="layui-input-inline col-sm-8">
                                    <input style="border:none" name="username" type="text" disabled value="<?php echo $row5[0] ?>"  class="layui-input" placeholder="<?php echo $row5[0] ?>" >
                                </div>
                            </div>
                        </div>
                        <div class="layui-form">
                            <div class="form-group" style="height: 40px;">
                                <label class="col-sm-2 control-label" style="color:#009688;line-height: 40px;">邮箱</label>
                                <div class="layui-input-inline col-sm-8">
                                    <input  name="email" type="text" required value="<?php echo $row5[1] ?>"  class="layui-input" placeholder="请填写您的邮箱" >
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="form-group" >
                                <label class="col-sm-2 control-label" style="color: #009688;line-height: 40px;">密码</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" class="layui-input"  placeholder="旧密码">
                                </div>
                            </div>
                            <div class="layui-form-mid layui-word-aux">（更改密码填此项）</div>
                        </div>
                        <div class="layui-form-item">
                            <div class="form-group" >
                                <label class="col-sm-2 control-label" style="color:#009688;line-height: 40px;">新密码</label>
                                <div class=" col-sm-8">
                                    <input type="password" name="password1" class="layui-input"  placeholder="新密码">
                                </div>
                                <div class="layui-form-mid layui-word-aux">（更改密码填此项）</div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="form-group" >
                                <label class="col-sm-2 control-label" style="color:#009688;line-height: 40px;">确认密码</label>
                                <div class=" col-sm-8">
                                    <input type="password" name="password2" class="layui-input"  placeholder="确认密码">
                                </div>
                                <div class="layui-form-mid layui-word-aux">（更改密码填此项）</div>
                            </div>
                        </div>
                        <div class="layui-form">
                            <div class="form-group" style="height: 40px;">
                                <label class="col-sm-2 control-label" style="color:#009688;">联系方式</label>
                                <div class="layui-input-inline col-sm-8">
                                    <input type="text" name="tel"  class="layui-input" required value="<?php echo $row5[3] ?>"  placeholder="填写您的联系方式">
                                </div>
                            </div>
                        </div>
                        <div class="lu" style="margin-top: 20px;margin-left: 20px;">
                            <input type="submit" style="width: 100px;" class="layui-btn " value="提交 >">
                        </div>
                    </form>
                </div>
                <div id="shou" class="layui-tab-item">
                    <button id="add" class="layui-btn ">新增收货地址</button>
                    <?php
                    $sql6="select * from tb_address where a_user in (select u_id from tb_user where u_email='$email')";
                    $xian6=$mysqldb->select($sql6);
                    while ($row6=mysql_fetch_array($xian6)){
                        echo "<div class='top' style='padding: 20px; background-color: #F2F2F2;'>
                        <form action='spss_check.php?id=$row6[5]' method='post'>
                            <div class='layui-row layui-col-space15'>
                                <div class='layui-col-md6'>
                                    <div class='layui-card'>
                                        <div class='layui-card-header' style='color: #03a9f4'>收货人：</div>
                                        <div class='layui-card-body'>
                                            <input name='name' class='layui-input' style='border: 1px solid #f6f6f6' type='text' value='$row6[0]'>
                                        </div>
                                    </div>
                                </div>
                                <div class='layui-col-md6'>
                                    <div class='layui-card'>
                                        <div class='layui-card-header'  style='color: #03a9f4'>联系电话：</div>
                                        <div class='layui-card-body'>
                                            <input name='tel' class='layui-input' style='border: 1px solid #f6f6f6' type='text' value='$row6[1]'>
                                        </div>
                                    </div>
                                </div>
                                <div class='layui-col-md12'>
                                    <div class='layui-card'>
                                        <div class='layui-card-header' style='color: #03a9f4'>地址：</div>
                                        <div class='layui-card-body' >
                                            <input name='address' class='layui-input' style='border: 1px solid #f6f6f6' type='text' value='$row6[2]'>

                                        </div>
                                    </div>
                                </div>
                                <div class='layui-col-md12'>
                                    <div class='layui-card'>";
                        if($row6[3]==1){
                          echo " <div class='layui-card-header' style='color: #ff7918'>默认收获地址</div>
                                <input type='submit' href='spss_check.php?id=$row6[5]' class='layui-card-header layui-btn' value='修改'>
                                <a href='address_delete.php?id=$row6[5]' class='layui-card-header layui-btn layui-btn-danger' >删除</a>";
                        }else{
                            echo "<a href='mess_update.php?id=$row6[5]' class='layui-card-header layui-btn' >设为默认收货地址</a>
                                  <input type='submit' value='修改' href='spss_check.php?id=$row6[5]' class='layui-card-header layui-btn'>
                                  <a href='address_delete.php?id=$row6[5]' class='layui-card-header layui-btn layui-btn-danger' >删除</a>";
                        }
                        echo "     </div>
                                </div>
                            </div>
                        </form>
                    </div>";
                    };

                    ?>

                </div>
                <div class="layui-tab-item">还没想到写什么 先写在这儿</div>
            </div>

        </div>



    </div>
</div>
<!--quantity-->
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
<!-- //footer -->
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

    layui.use('element', function(){
        var element = layui.element; //导航的hover效果、二级菜单等功能，需要依赖element模块

        //监听导航点击
        element.on('nav(demo)', function(elem){
            //console.log(elem)
            layer.msg(elem.text());
        });
    })


    $("#add").click(function () {
        $("#shou").append("<div class='top' style='padding: 20px; background-color: #F2F2F2;'>\n" +
            "    <form action='add_check.php' method='post'>\n" +
            "        <div class='layui-row layui-col-space15'>\n" +
            "            <div class='layui-col-md6'>\n" +
            "                <div class='layui-card'>\n" +
            "                    <div class='layui-card-header' style='color: #03a9f4'>收货人：</div>\n" +
            "                    <div class='layui-card-body'>\n" +
            "                        <input class='layui-input' name='name' style='border: 1px solid #f6f6f6' type='text' placeholder='请填写收货人姓名'>\n" +
            "                    </div>\n" +
            "                </div>\n" +
            "            </div>\n" +
            "            <div class='layui-col-md6'>\n" +
            "                <div class='layui-card'>\n" +
            "                    <div class='layui-card-header'  style='color: #03a9f4'>联系电话：</div>\n" +
            "                    <div class='layui-card-body'>\n" +
            "                        <input class='layui-input' name='tel' style='border: 1px solid #f6f6f6' type='text' placeholder='请填写收货人联系电话'>\n" +
            "                    </div>\n" +
            "                </div>\n" +
            "            </div>\n" +
            "            <div class='layui-col-md12'>\n" +
            "                <div class='layui-card'>\n" +
            "                    <div class='layui-card-header' style='color: #03a9f4'>地址：</div>\n" +
            "                    <div class='layui-card-body' >\n" +
            "                        <input class='layui-input' name='address' style='border: 1px solid #f6f6f6' type='ext' placeholder='请填写收货人地址'>\n" +
            "\n" +
            "                    </div>\n" +
            "                </div>\n" +
            "            </div>\n" +
            "            <div class='layui-col-md12'>\n" +
            "                <div class='layui-card'>\n" +
            "                    <input type='submit' class='layui-card-header layui-btn' value='添加'>\n" +
            "                </div>\n" +
            "            </div>\n" +
            "        </div>\n" +
            "    </form>\n" +
            "</div>")
    })
</script>


</body>
</html>