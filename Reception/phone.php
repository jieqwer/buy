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
    <title>phone</title>
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
    <link rel="stylesheet" href="css/index.css" type="text/css">
    <script src="js/wow.min.js"></script>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="layui/css/layui.css" type="text/css" rel="stylesheet" media="all">

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
                            <li class="active"><a href="phone.php" class="act">phone</a></li>
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
            <li class="active">手机</li>
        </ol>
    </div>
</div>
<div class="products">
    <div class="container">
        <div class="col-md-4 products-left">
            <div class="categories animated wow slideInUp" data-wow-delay=".5s">
                <h3>类别</h3>
                <ul class="cate">
                    <div class="layui-collapse" lay-accordion="">
                        <?php
                         $sql="select * from tb_classification1";
                        $xian=$mysqldb->select($sql);
                        while ($row=mysql_fetch_array($xian)){
                        $sql2="select count(*) from tb_classification2 where c1_id=$row[1]";
                        $xian2=$mysqldb->select($sql2);
                        $row2=mysql_fetch_array($xian2);

                        if($row[1]=='1'){
                            echo  " <div class='layui-colla-item'>
                            <h2 class='layui-colla-title'>$row[0]<span style='color: #FF5722;margin-left: 150px;'>($row2[0])部</span></h2>
                            <div class='layui-colla-content layui-show'>";
                            $sql1="select * from tb_classification2 where c1_id=$row[1]";
                            $xian1=$mysqldb->select($sql1);
                            while ($row1=mysql_fetch_array($xian1)){
                                if($row1[2]=='1'){
                                    echo "<p class='layui-colla-title'><a  style='color:#ff7918 !important' href='index_c.php?id=$row1[3]'>$row1[0]</a></p>";
                                }else{
                                    echo "<p class='layui-colla-title'><a  href='index_c.php?id=$row1[3]'>$row1[0]</a></p>";
                                }
                            }
                            echo "</div>
                        </div>";
                        }else{
                          echo  " <div class='layui-colla-item'>
                            <h2 class='layui-colla-title'>$row[0]<span style='color: #FF5722;margin-left: 150px;'>($row2[0])部</span></h2>
                            <div class='layui-colla-content'>";
                        $sql1="select * from tb_classification2 where c1_id=$row[1]";
                        $xian1=$mysqldb->select($sql1);
                        while ($row1=mysql_fetch_array($xian1)){
                            if($row1[2]=='1'){
                                echo "<p class='layui-colla-title'><a style='color:#ff7918 !important' href='index_c.php?id=$row1[3]'>$row1[0]</a></p>";
                            }else{
                                echo "<p class='layui-colla-title'><a  href='index_c.php?id=$row1[3]'>$row1[0]</a></p>";
                            }
                        }
                          echo "   </div>
                        </div>";
                        }
                        }
                        ?>
                    </div>
                </ul>
            </div>
            <div class="new-products animated wow slideInUp" data-wow-delay=".5s">
                <h3>销量最高</h3>
                <div class="new-products-grids">
                    <?php
                    $sql15="select * from tb_phone order by P_inventory asc limit 1";
                    $xian15=$mysqldb->select($sql15);
                        $info15=mysql_fetch_array($xian15);
                        $piece6 = explode(",", $info15[19]);//手机三视图
                        $piece7= explode(",", $info15[24]);//手机介绍
                        echo "<div class='new-products-grid'>
                        <div class='new-products-grid-left'>
                            <a href='single.php?id=$info15[25]'><img src='images/$info15[20]' alt='' class='img-responsive'/></a>
                        </div>
                        <div class='new-products-grid-right'>
                            <h4><a href='single.php'>$info15[0]</a></h4>
                            <div class='rating'>
                                    <img src='images/xing$info15[22].png' alt='' class='img-responsive'>
                                <div class='clearfix'> </div>
                            </div>
                            <div class='simpleCart_shelfItem new-products-grid-right-add-cart'>
                                <p> <span class='item_price'>￥$info15[2].00</span><a class='item_add' href='single.php?id=$info15[25]'>加入购物车</a></p>
                            </div>
                        </div>
                        <div class='clearfix'> </div>
                    </div>";
                    ?>
                </div>
            </div>
            <?php
            $sql14="select * from tb_phone order by P_inventory asc limit 3";
            $xian14=$mysqldb->select($sql14);
            while ($info14=mysql_fetch_array($xian14)){
            $piece4 = explode(",", $info14[19]);//手机三视图
                $piece5= explode(",", $info14[24]);//手机介绍
            echo "<div class='men-position animated wow slideInUp' data-wow-delay='.5s'>
                <a href='single.php?id=$info14[25]'><img src='images/$piece4[0]' alt='' class='img-responsive' /></a>
                <div class='men-position-pos'>
                    <h4 style='color: #8c8c8c'>$info14[0]</h4>
                    <h5><span>$piece5[0]</span></h5>
                </div>
            </div>";
            } ;
            ?>
        </div>
        <div class="col-md-8 products-right">
            <div class="products-right-grid">
                <div class="products-right-grids animated wow slideInRight" data-wow-delay=".5s">
                    <div class="sorting-left">
                        <select  id="phone"  class="frm-field required sect">
                            <option value="全部机型">全部机型</option>
                            <option value="苹果">苹果</option>
                            <option value="小米">小米</option>
                            <option value="oppo">OPPO</option>
                            <option value="锤子">锤子</option>
                            <option value="努比亚">努比亚</option>
                            <option value="vivo">VIVO</option>
                            <option value="华为">华为</option>
                            <option value="海信">海信</option>
                            <option value="配件">配件</option>
                        </select>
                    </div>
                    <div class="sorting">
                        <select  id="price" class="frm-field required sect">
                            <option value="所有价位,所有价位">所有价位</option>
                            <option value="2000,3000">￥2000-￥3000</option>
                            <option value="1000,2000">￥1000-￥2000</option>
                            <option value="2500,4500">￥2500-￥4500</option>
                            <option value="4500,6000">￥4500-￥6000</option>
                            <option value="6000,7000">￥6000-￥7000</option>
                            <option value="7000,100000">￥7000以上</option>
                        </select>
                    </div>

                    <div class="clearfix"> </div>
                </div>
                <div class="products-right-grids-position animated wow slideInRight" data-wow-delay=".5s">
                    <?php
                    $sql16="select * from tb_phone order by P_inventory asc limit 1";
                    $xian16=$mysqldb->select($sql16);
                    $info16=mysql_fetch_array($xian16);
                    $piece8= explode(",", $info16[21]);//图片展示图
                    $piece9= explode(",", $info16[24]);//手机介绍
                    $ss= rand(0,count($piece8)-1);
                    echo "<a href='single.php?id=$info16[25]'><img src='images/$piece8[$ss]' alt='' class='img-responsive' /></a>
                    <div class='products-right-grids-position1' style='width: 40%'>
                        <h4>$info16[0]</h4>
                        <p>$piece9[$ss]</p>
                    </div>";
                    ?>
                </div>
            </div>
            <div id="zhan" class="products-right-grids-bottom">
                <div class="clearfix"> </div>
            </div>

            <script>

                $("#price").change(function () {
                    $("#zhan").empty();
                    $("#nums").empty();
                    var s=$("#price").val();
                    var p=$("#phone").val();
                    $.ajax({
                        type: "POST",
                        url: "ajax6.php",
                        data: {"price": s,"phone":p},
                        dataType: "json",
                        success: function (data) {
                               $.each(data[0], function(i, n) {
                                   var y=n.p_money*1+200*1;
                                    var m=n.p_picture.split(',')[0];
                                    var x=n.p_xu.split(',')[0];
                                   $("#zhan").append("<div class='col-md-4 products-right-grids-bottom-grid top'><div class='new-collections-grid1 products-right-grid1 animated wow slideInUp' data-wow-delay='.5s'> <div class='new-collections-grid1-image'><a href='single.php' class='product-image'><img src='images/"+m+"' alt='' class='img-responsive'></a> <div class='new-collections-grid1-image-pos products-right-grids-pos'> <a href='single.php?id="+n.id+"' style='margin-left: 10px'>火速围观</a> </div> <div class='new-collections-grid1-right products-right-grids-pos-right'> <div class='rating'> <div class='rating-left'> <img src='images/xing"+n.p_recommend+".png' alt='' class='img-responsive'> </div> <div class='clearfix'> </div> </div> </div> </div> <h4><a href='single.php?id="+n.id+"'>"+n.p_name+"</a></h4> <p>"+x+"</p> <div class='simpleCart_shelfItem products-right-grid1-add-cart'> <p><i>￥"+y+".00</i> <span class='item_price'>￥"+n.p_money+".00</span><a class='item_add' href='single.php?id="+n.id+"'>加入购物车 </a></p> </div> </div> </div>");
                               });
                        }
                    });
                });

                $("#phone").change(function () {
                    $("#zhan").empty();
                    $("#nums").empty();
                    var s=$("#price").val();
                    var p=$("#phone").val();
                    $.ajax({
                        type: "POST",
                        url: "ajax6.php",
                        data: {"price": s,"phone":p},
                        dataType: "json",
                        success: function (data) {
                            $.each(data[0], function(i, n) {
                                var y=n.p_money*1+200*1;
                                var m=n.p_picture.split(',')[0];
                                var x=n.p_xu.split(',')[0];

                                $("#zhan").append("<div class='col-md-4 products-right-grids-bottom-grid top'><div class='new-collections-grid1 products-right-grid1 animated wow slideInUp' data-wow-delay='.5s'> <div class='new-collections-grid1-image'><a href='single.php' class='product-image'><img src='images/"+m+"' alt='' class='img-responsive'></a> <div class='new-collections-grid1-image-pos products-right-grids-pos'> <a href='single.php?id="+n.id+"' style='margin-left: 10px'>火速围观</a> </div> <div class='new-collections-grid1-right products-right-grids-pos-right'> <div class='rating'> <div class='rating-left'> <img src='images/xing"+n.p_recommend+".png' alt='' class='img-responsive'> </div> <div class='clearfix'> </div> </div> </div> </div> <h4><a href='single.php?id="+n.id+"'>"+n.p_name+"</a></h4> <p>"+x+"</p> <div class='simpleCart_shelfItem products-right-grid1-add-cart'> <p><i>￥"+y+".00</i> <span class='item_price'>￥"+n.p_money+".00</span><a class='item_add' href='single.php?id="+n.id+"'>加入购物车 </a></p> </div> </div> </div>");
                            });
                        }
                    });

                });


                $("#price").trigger("change");

                $("#nums li").click(function () {
                    var page=$(this).children().text();
                    $("#zhan").empty();
                    $("#nums").empty();
                    var s=$("#price").val();
                    var p=$("#phone").val();

                    $.ajax({
                        type: "POST",
                        url: "ajax6.php",
                        data: {"price": s,"phone":p,"page":page},
                        dataType: "json",
                        success: function (data) {
                            $.each(data[0], function(i, n) {
                                var y=n.p_money*1+200*1;
                                var m=n.p_picture.split(',')[0];
                                var x=n.p_xu.split(',')[0];

                                $("#zhan").append("<div class='col-md-4 products-right-grids-bottom-grid top'><div class='new-collections-grid1 products-right-grid1 animated wow slideInUp' data-wow-delay='.5s'> <div class='new-collections-grid1-image'><a href='single.php' class='product-image'><img src='images/"+m+"' alt='' class='img-responsive'></a> <div class='new-collections-grid1-image-pos products-right-grids-pos'> <a href='single.php?id="+n.id+"' style='margin-left: 10px'>火速围观</a> </div> <div class='new-collections-grid1-right products-right-grids-pos-right'> <div class='rating'> <div class='rating-left'> <img src='images/xing"+n.p_recommend+".png' alt='' class='img-responsive'> </div> <div class='clearfix'> </div> </div> </div> </div> <h4><a href='single.php?id="+n.id+"'>"+n.p_name+"</a></h4> <p>"+x+"</p> <div class='simpleCart_shelfItem products-right-grid1-add-cart'> <p><i>￥"+y+".00</i> <span class='item_price'>￥"+n.p_money+".00</span><a class='item_add' href='single.php?id="+n.id+"'>加入购物车 </a></p> </div> </div> </div>");
                            });
                            $("#nums").append("<li><a aria-label='Previous'><span aria-hidden='true'>1</span></a></li>");
                            for(var i=1;i<=data[1];i++){
                                if(i==data[2]){
                                    $("#nums").append("<li class='active' ><a>"+i+"</a></li>");
                                }else {
                                    $("#nums").append("<li ><a>"+i+"</a></li>");
                                }
                            }
                            $("#nums").append("<li><a aria-label='Next'><span aria-hidden='true'>"+data[1]+"</span></a>");
                        }
                    });
                });
            </script>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //breadcrumbs -->
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
<script src="layui/layui.all.js"></script>
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
    layui.use(['element', 'layer'], function(){
        var element = layui.element;
        var layer = layui.layer;

        //监听折叠
        element.on('collapse(test)', function(data){
            layer.msg('展开状态：'+ data.hidden);
        });
    });



</script>
</body>
</html>