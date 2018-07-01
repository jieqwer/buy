<meta charset="utf-8">
<?php

include_once("opensql.php");
session_start();
if(!empty($_SESSION['email'])){
    $email=$_SESSION['email'];
    $sql4="select * from tb_cart where u_id in(select u_id from tb_user where u_email='$email')";
    $xian4=$mysqldb->select($sql4);
    $row4=mysql_num_rows($xian4);
}else{
    $row4=0;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
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
    <script src="js/simpleCart.min.js"></script>
    <!-- cart -->
    <!-- for bootstrap working -->
    <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
    <!-- //for bootstrap working -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- timer -->
    <link rel="stylesheet" href="css/jquery.countdown.css" />
    <link rel="stylesheet" href="css/index.css" type="text/css">
    <!-- //timer -->
    <!-- animation-effect -->
    <link href="layui/css/layui.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/animate.min.css" rel="stylesheet">
    <script src="js/wow.min.js"></script>
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
                            <li class="active"><a href="index.php" class="act">Home</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">菜单 <b class="caret"></b></a>
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
<!-- banner -->
<div class="banner">
    <div class="container">
        <div class="banner-info animated wow zoomIn" data-wow-delay=".5s">
            <div class="wmuSlider example1">
                <div class="wmuSliderWrapper" style="text-align: center">

                    <?php
                    $sql16="select * from tb_bar ";
                    $xian16=$mysqldb->select($sql16);
                    while ($info16=mysql_fetch_array($xian16)){
                        echo "<article style='position: absolute; height:550px;width: 100%; opacity: 0;'>
                        <h4 style='font-size: 30px;color: #90784ded;'>$info16[1]</h4>
                        <img src='images/$info16[0]'>
                        <div class='banner-wrap' style='margin-top: 20px;'>
                            <div class='banner-info1' style='text-align: center'>
                                <a href='single.php?id=$info16[2]' style='font-size:14px;color: #0070c9;padding-left: 60px;'> 进一步了解 ></a>
                            </div>
                        </div>
                    </article>";
                    }
                    ?>
                </div>
            </div>
            <script src="js/jquery.wmuSlider.js"></script>
            <script>
                $('.example1').wmuSlider();
            </script>
        </div>
    </div>
</div>

<!-- //banner-bottom -->
<!-- collections -->
<div class="new-collections">
    <div class="container">
        <h3 class="animated wow zoomIn" data-wow-delay=".5s">新藏品</h3>
        <p class="est animated wow zoomIn" data-wow-delay=".5s">给你意想不到的享受</p>
        <div class="new-collections-grids">
            <?php
            $sql13="select * from tb_phone order by p_time desc limit 3";
            $xian13=$mysqldb->select($sql13);
            while ($info13=mysql_fetch_array($xian13)){
                $piece3 = explode(",", $info13[19]);//手机三视图
                $piece4= explode(",", $info13[24]);//手机介绍
                echo " <div class='col-md-4 new-collections-grid top'>
                <div class='new-collections-grid1 animated wow slideInUp' data-wow-delay='.5s'>
                    <div class='new-collections-grid1-image'>
                        <a href='single.php' class='product-image'><img src='images/$piece3[0]' alt='' class='img-responsive' /></a>
                        <div class='new-collections-grid1-image-pos left1'>
                            <a href='single.php?id=$info13[25]'>火速围观</a>
                        </div>
                        <div class='new-collections-grid1-right left2'>
                            <div class='rating'>
                                    <img src='images/xing$info13[22].png'  class='img-responsive' />
                            </div>
                        </div>
                    </div>
                    <h4><a href='single.php'>$info13[0]</a></h4>
                    <p>$piece4[0]</p>
                    <div class='new-collections-grid1-left simpleCart_shelfItem'>
                        <p><i>$8888</i> <span class='item_price'>$8688</span><a class='item_add' href='single.php?id=$info13[25]'>加入购物车 </a></p>
                    </div>
                </div>
            </div>";
            } ;
            ?>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //collections -->
<!-- new-timer -->
<div class="timer">
    <div class="container">

        <?php
        $sql14="select * from tb_phone order by p_money asc limit 3";
        $xian14=$mysqldb->select($sql14);
        $info14=mysql_fetch_array($xian14);
        $m1= $info14[2]+200;
        $piece4= explode(",", $info14[24]);//手机介绍
        echo "    <div class='timer-grids'>
            <div class='col-md-8 timer-grid-left animated wow slideInLeft' data-wow-delay='.5s'>
                <h3><a href='single.php?id=$info14[25]'>$info14[0]</a></h3>
                <div class='rating'>
                        <img src='images/xing$info14[22].png' alt='' class='img-responsive' />
                </div>
                <div class='new-collections-grid1-left simpleCart_shelfItem timer-grid-left-price'>
                    <p><i>￥$m1.00</i> <span class='item_price'>￥$info14[2].00</span></p>";
        for($i=0;$i<count($piece4);$i++){
            echo "<h4>$piece4[$i]</h4>";
        }

        echo"<p><a class='item_add timer_add' href='single.php?id=$info14[25]'>加入购物车 </a></p>
                </div>
                <div id='counter' class='countdownHolder'>
                    <div class='countDays' >
                        <span >
                            <span id='Days' ></span>
                        </span>
                        <span class='boxName'>
                            <span  class='Days'>Days</span>
                        </span>
                    </div>
                    <div class='countHours' >
                        <span >
                            <span id='Hours'></span>
                        </span>
                        <span class='boxName'>
                            <span class='Hours'>Hours</span>
                        </span>
                    </div>
                    <div class='countMinutes' >
                        <span >
                            <span id='Minutes'></span>
                        </span>
                        <span class='boxName'>
                            <span class='Minutes'>Minutes</span>
                        </span>
                    </div>
                    <div class='countSeconds' >
                        <span >
                            <span id='Seconds'></span>
                        </span>
                        <span class='boxName'>
                            <span class='Seconds'>Seconds</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class='col-md-4 timer-grid-right animated wow slideInRight' data-wow-delay='.5s'>
                <div class='timer-grid-right1'>
                    <img src='images/$info14[20]' alt='' class='img-responsive' />
                    <div class='timer-grid-right-pos'>
                        <h4>特价</h4>
                    </div>
                </div>
            </div>
            <div class='clearfix'> </div>
        </div>
    </div>
";


        ?>




</div>
<!-- //new-timer -->
<!-- collections-bottom -->
<div class="collections-bottom">
    <div class="container">
        <div class="collections-bottom-grids" style="background:url(images/mi8-3.png) no-repeat 0px 0px;">
            <div class="collections-bottom-grid animated wow slideInLeft" data-wow-delay=".5s">
                <h3>小米8 <span>透明探索版</span><span>骁龙 845 旗舰处理器</span></h3>
            </div>
        </div>
        <div class="newsletter animated wow slideInUp" data-wow-delay=".5s">
            <h3>新福利</h3>
            <p>加入我们现在得到所有的新闻和特别优惠。</p>
            <form>
                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                <input type="email" value="填写您的邮箱" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '填写您的邮箱';}" required="">
                <input type="submit" value="加入我们" >
            </form>
        </div>
    </div>
</div>
<!-- //collections-bottom -->
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
    function countDown(times){
        var timer=null;
        timer=setInterval(function(){
            var day=0,
                hour=0,
                minute=0,
                second=0;//时间默认值
            if(times > 0){
                day = Math.floor(times / (60 * 60 * 24));
                hour = Math.floor(times / (60 * 60)) - (day * 24);
                minute = Math.floor(times / 60) - (day * 24 * 60) - (hour * 60);
                second = Math.floor(times) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
            }
            if (day <= 9) day = '0' + day;
            if (hour <= 9) hour = '0' + hour;
            if (minute <= 9) minute = '0' + minute;
            if (second <= 9) second = '0' + second;

            $("#Days").html(day);
            $("#Hours").html(hour);
            $("#Minutes").html(minute);
            $("#Seconds").html(second);
            times--;
        },1000);
        if(times<=0){
            clearInterval(timer);
        }
    }
    countDown(<?php echo "720000" ?>);
</script>
</body>
</html>