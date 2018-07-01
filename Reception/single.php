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
    <title>Single</title>
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
    <link rel="stylesheet" href="css/index.css" type="text/css">
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
                                <a style="color: #d8703f" href="#" class="dropdown-toggle" data-toggle="dropdown">菜单 <b class="caret"></b></a>
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

<?php

if(empty($_GET['id'])){
    $id=1;
}else{
    $id=$_GET['id'];
}

$sql4="select * from tb_phone where id=$id";
$xian4=$mysqldb->select($sql4);
$info=mysql_fetch_array($xian4);

$pieces1 = explode(",", $info[7]);//基本参数
$pieces2 = explode(",", $info[9]);//主体
$pieces3 = explode(",", $info[10]);//基本信息
$pieces4 = explode(",", $info[13]);//网络支持
$pieces5 = explode(",", $info[14]);//屏幕
$pieces6 = explode(",", $info[15]);//摄像头
$pieces7 = explode(",", $info[16]);//电池
$pieces8 = explode(",", $info[17]);//手机特性
$pieces9 = explode(",", $info[19]);//手机三视图
$pieces10 = explode(",", $info[21]);//图片展示图
$pieces11 = explode(",", $info[5]);//颜色
$pieces12 = explode(",", $info[4]);//内存
$pieces13 = explode(",", $info[3]);//版本价格
$pieces14 = explode(",", $info[12]);//主芯片
$pieces15 = explode(",", $info[24]);//图介绍
if(empty($_GET['color'])){
    $color=$pieces11[0];
}else{
    $color=$_GET['color'];
}

$sql21="select * from tb_say where s_id=$id and s_strat='1'";
$xian21=$mysqldb->select($sql21);
$row21=mysql_num_rows($xian21);

?>
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">菜单 / <span style="color: #FF5722"><?php echo $info[0] ?></span></li>
        </ol>
    </div>
</div>
<!-- //breadcrumbs -->
<!-- single -->
<div class="single">
    <div class="container">
        <div class="col-md-4 products-left">
            <div class="filter-price animated wow slideInUp" data-wow-delay=".5s">
                <h3>手机详情</h3>
            </div>
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
        <div class="col-md-8 single-right">
            <div class="col-md-5 single-right-left animated wow slideInUp" data-wow-delay=".5s">
                <div class="flexslider">
                    <ul class="slides">
                        <?php
                        for($im=0;$im<count($pieces9);$im++){
                            echo "<li data-thumb='images/$pieces9[$im]'>
                            <div class='thumb-image'> <img src='images/$pieces9[$im]' data-imagezoom='true' class='img-responsive'> </div>
                        </li>";
                        }
                        ?>
                        <li data-thumb="images/<?php echo $info[20] ?>">
                            <div class="thumb-image"> <img src="images/<?php echo $info[20] ?>" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-md-7 single-right-left simpleCart_shelfItem animated wow slideInRight" data-wow-delay=".5s">
                <form name="form1" action="phone_check.php?id=<?php echo $id ?>&color=<?php echo $color ?>" method="post">
                <h3><?php echo $info[0] ?></h3>
                <h4><span id="moy" class="item_price">￥<?php echo $info[2] ?>.00</h4>
                <div class="rating1">
						<span class="starRating" style="background: url('images/xing<?php echo $info[22] ?>.png')no-repeat;width: 124px;height: 24px;"></span>
                </div>
                <div class="color-quality">
                    <div class="color-quality-left top">
                        <h5>颜色 : </h5>
                        <ul>
                            <?php
                            for($i=0;$i<count($pieces11);$i=$i+2){
                                $s=$i+1;
                                if($color==$pieces11[$i]){
                                    echo "<li><a href='single.php?id=$id&color=$pieces11[$i]'><span  class='color' style='background:$pieces11[$s]'></span>$pieces11[$i]</a></li>";
                                }else{
                                    echo "<li><a href='single.php?id=$id&color=$pieces11[$i]'><span  class='' style='background:$pieces11[$s]'></span>$pieces11[$i]</a></li>";
                                }
                            }
                            ?>
                        </ul>

                    </div>
                    <div class="color-quality-right">
                        <h5>运存/内存 :</h5>
                        <select name="memory" id="meory" class="frm-field required sect">
                            <?php
                            for($i=0;$i<count($pieces12);$i++){
                               echo" <option value='$pieces12[$i]'>$pieces12[$i]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="occasional">
                    <h5>手机版本 :</h5>

                        <?php
                        for($d=0;$d<count($pieces13);$d++){
                            if($d==0){
                                echo "<div class='colr ert'><label class='radio'><input type='radio' value='$pieces13[0]' name='radio' checked><i></i>标准版</label></div>";
                            }else if($d==1){
                                echo "<div class='colr ert'><label class='radio'><input type='radio' value='$pieces13[1]' name='radio' ><i></i>开发版</label></div>";
                            }else if($d==2){
                                echo "<div class='colr ert'><label class='radio'><input type='radio' value='$pieces13[2]' name='radio' ><i></i>旗舰版</label></div>";
                            }else{
                                echo "<div class='colr ert'><label class='radio'><input type='radio' value='$pieces13[$d]' name='radio' ><i></i>其他版本</label></div>";
                            }
                        }
                        ?>
                    <div class="clearfix"> </div>
                </div>
                    <script>
                        $(function () {
                            $("#meory").change(function () {
                                var ban= $('input:radio:checked').val();
                                var cun=$("#meory").val();
                                console.log(ban);
                               $.ajax({
                                    type: "POST",
                                    url: "ajax2.php",
                                    data: {"cun": cun,"ban":ban,"id":<?php echo $id ?>},
                                    dataType: "json",
                                    success: function (data) {
                                        $("#moy").text("￥"+data+".00")
                                    }
                                })
                            })
                            $(":radio").click(function(){
                             var ban =$(this).val();
                             var cun=$("#meory").val();
                                $.ajax({
                                    type: "POST",
                                    url: "ajax2.php",
                                    data: {"cun": cun,"ban":ban,"id":<?php echo $id ?>},
                                    dataType: "json",
                                    success: function (data) {
                                        $("#moy").text("￥"+data+".00")
                                    }
                                })
                            });
                            $("#meory").trigger("change");;
                        })
                    </script>

                <div class="occasional">
                    <p>购买数量(库存余<?php echo $info[6] ?>)</p>
                    <div class="very ">
                        <em id="jan" class="left">-</em>
                        <input  name="sub" style="background: white" id="num" class="left" type="text" value="1">
                        <em id="jia" class="left">+</em>
                    </div>
                </div>
                <div class="occasion-cart left2">
                    <a class="item_add" href='javascript:document.form1.submit();'>加入购物车 </a>
                </div>
                <div class="social">
                    <div class="social-left">
                        <p>基本参数 :</p>
                    </div>
                    <div class="social-right">
                        <ul class="social-icons" style="color:#a7a7a7;">
                            <li style="color:#2fa0f5;width: 170px;"><a style="color:#198cef">分辨率：</a><?php echo $pieces1[0]  ?></li>
                            <li style="color:#2fa0f5;width: 170px;"><a style="color:#198cef">后置摄像头：</a><?php echo $pieces1[1]  ?>万像素</li>
                            <li style="color:#2fa0f5;width: 170px;"><a style="color:#198cef">前置摄像头：</a><?php echo $pieces1[2]  ?>万像素</li>
                            <li style="color:#2fa0f5;width: 170px;"><a style="color:#198cef">商品毛重：</a><?php echo $pieces1[3]  ?>.00g</li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="description">
                    <h5><i>描述</i></h5>
                    <p><?php echo  $info[8] ?></p>
                </div>
                </form>
            </div>
            <div class="clearfix"> </div>
            <div class="bootstrap-tab animated wow slideInUp" data-wow-delay=".5s">
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">规格与包装</a></li>
                        <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">用户评价<?php if($row21<0){echo "(0)";}else{echo "($row21)";} ?></a></li>
                        <li role="presentation" class="dropdown">
                            <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents">问题解答<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
                                <?php
                                $sql6="select * from tb_question  where p_id=$id ";
                                $xian6=$mysqldb->select($sql6);
                                while ($row6=mysql_fetch_array($xian6)){
                                    echo "<li><a href='#dropdown$row6[3]' tabindex='-1' role='tab' id='dropdown$row6[3]-tab' data-toggle='tab' aria-controls='dropdown$row6[3]'>$row6[0]</a></li>";
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
                            <div class="he1">
                                <h5 style="margin:6px auto;text-align: center">主体</h5>
                                <p>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">品牌</b><?php echo $pieces2[0] ?></i>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">型号</b><?php echo $pieces2[1] ?></i>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">入网型号</b><?php echo $pieces2[2] ?></i>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">上市年份</b><?php echo $pieces2[3] ?></i>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">上市月份</b><?php echo $pieces2[4] ?></i>
                                </p>
                            </div>
                            <div class="he1">
                                <h5 style="margin:6px auto;text-align: center">基本信息</h5>
                                <p>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">机身长度（mm）</b><?php echo $pieces3[0] ?></i>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">机身宽度（mm）</b><?php echo $pieces3[1] ?></i>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">机身厚度（mm）</b><?php echo $pieces3[2] ?></i>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">机身重量(g)</b><?php echo $pieces3[3] ?></i>
                                </p>
                            </div>
                            <div class="he1">
                                <h5 style="margin:6px auto;text-align: center">操作系统</h5>
                                <p>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">操作系统</b><?php echo $info[11] ?></i>
                                </p>
                            </div>
                            <div class="he1">
                                <h5 style="margin:6px auto;text-align: center">主芯片</h5>
                                <p>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">CPU品牌</b><?php echo $pieces14[0] ?></i>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">CPU品牌</b><?php echo $pieces14[1] ?></i>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">CPU核数</b><?php echo $pieces14[2] ?></i>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">CPU型号</b><?php echo $pieces14[3] ?></i>
                                </p>
                            </div>
                            <div class="he1">
                                <h5 style="margin:6px auto;text-align: center">网络支持</h5>
                                <p>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">双卡类型</b><?php echo $pieces4[0] ?></i>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">最大支持SIM卡数量</b><?php echo $pieces4[1] ?>个</i>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">SIM卡类型</b><?php echo $pieces4[2] ?></i>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">4G网络</b><?php echo $pieces4[3] ?></i>
                                </p>
                            </div>
                            <div class="he1">
                                <h5 style="margin:6px auto;text-align: center">屏幕</h5>
                                <p>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">主屏幕尺寸（英寸）</b><?php echo $pieces5[0] ?>英寸</i>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">分辨率</b><?php echo $pieces5[1] ?></i>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">屏幕材质类型）</b><?php echo $pieces5[2] ?></i>
                                </p>
                            </div>
                            <div class="he1">
                                <h5 style="margin:6px auto;text-align: center">前置摄像头</h5>
                                <p>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">前置摄像头</b><?php echo $pieces6[0] ?>万像素</i>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">前摄光圈大小</b><?php echo $pieces6[1] ?></i>
                                </p>
                            </div>
                            <div class="he1">
                                <h5 style="margin:6px auto;text-align: center">后置摄像头</h5>
                                <p>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">摄像头数量</b><?php echo $pieces6[2] ?>个</i>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">后置摄像头</b><?php echo $pieces6[3] ?>万像素</i>
                                </p>
                            </div>
                            <div class="he1">
                                <h5 style="margin:6px auto;text-align: center">电池信息</h5>
                                <p>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">电池容量（mAh）</b><?php echo $pieces7[0] ?></i>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">电池是否可拆卸</b><?php echo $pieces7[1] ?></i>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">充电器</b><?php echo $pieces7[0] ?></i>
                                </p>
                            </div>
                            <div class="he1">
                                <h5 style="margin:6px auto;text-align: center">手机特性</h5>
                                <p>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">指纹识别</b><?php echo $pieces8[0] ?></i>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">GPS</b><?php echo $pieces8[1] ?></i>
                                    <i style="width: 33%;display: block;float: left"><b style="margin-right: 50px;">陀螺仪</b><?php echo $pieces8[2] ?></i>
                                </p>
                            </div>
                            <div class="he1">
                                <h5 style="margin:6px auto;text-align: center">包装清单</h5>
                                <p>
                                    <?php echo $info[18] ?>
                                </p>
                            </div>

                        </div>
                        <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
                            <div class="bootstrap-tab-text-grids">
                                <?php
                                $sql5="select * from tb_say  where s_id=$id and s_strat='1'";
                                $xian5=$mysqldb->select($sql5);
                                while ($row5=mysql_fetch_array($xian5)){
                                    echo "<div class='bootstrap-tab-text-grid'>
                                    <div class='bootstrap-tab-text-grid-left'>
                                        <span class='starRating' style='height: 100px;width: 120px;'>
                                            <p>$row5[0]</p>
                                            <p>$row5[2]</p>

						                </span>
                                    </div>
                                    <div class='bootstrap-tab-text-grid-right'>
                                        <ul>
                                            <li><a href='#'>$row5[1]</a></li>
                                            <li><a href='#'><span class='glyphicon glyphicon-share' aria-hidden='true'></span>分享</a></li>
                                        </ul>
                                        <p>$row5[3]</p>
                                    </div>
                                    <div class='clearfix'> </div>
                                </div>";
                                }
                                ?>
                                <div class="add-review">
                                    <h4>添加评论</h4>
                                    <form action="comment.php?id=<?php echo $id ?>" method="post">
                                        <textarea type="text" name="say" placeholder = '不发评论的用户等于咸鱼...' onfocus="this.placeholder = '';" onblur="if (this.placeholder == '') {this.placeholder = '不发评论的用户等于咸鱼...';}" required=""></textarea>
                                        <input type="submit" value="发表" >
                                    </form>
                                </div>
                            </div>
                        </div>

                        <?php
                        $sql7="select * from tb_question  where p_id=$id";
                        $xian7=$mysqldb->select($sql7);
                        while ($row7=mysql_fetch_array($xian7)){
                        echo "<div role='tabpane$row7[3]' class='tab-pane fade bootstrap-tab-text' id='dropdown$row7[3]' aria-labelledby='dropdown$row7[3]-tab'>
                            <p>$row7[1]</p>
                        </div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //single -->
<!-- single-related-products -->
<div class="single-related-products">
    <div class="container">
        <h3 class="animated wow slideInUp" data-wow-delay=".5s">图片展示</h3>
        <p class="est animated wow slideInUp" data-wow-delay=".5s">iphone X</p>
        <div class="new-collections-grids">
            <div class="col-md-12 new-collections-grid">
                <div class="products-right-grids-position animated wow slideInRight" data-wow-delay=".5s" style="background:white;">
                    <a href="single.php"><img src="images/<?php echo $pieces10[0] ?>" alt=" " class="img-responsive" /></a>
                    <div class="products-right-grids-position1" style='width: 40%'>
                        <h4 ><?php echo $info[0] ?></h4>
                        <p><?php echo $pieces15[0] ?></p>
                    </div>
                </div>
                <?php

               for($n=1;$n<count($pieces10);$n++){
                  $m=rand(1,2);
                   if($m==1){
                       echo "<div class='products-right-grids-position animated wow slideInRight top' style='background:white;' data-wow-delay='.6s'>
                    <img src='images/$pieces10[$n]' alt='' class='img-responsive'/>
                    <div class='products-right-grids-position1' style='width: 40%'>
                        <h4>$info[0]</h4>
                        <p>$pieces15[$n]</p>
                    </div>
                </div>";
                   }else if($m==2){
                       echo "<div class='products-right-grids-position animated wow slideInRight top' style='background:white;' data-wow-delay='.6s'>
                    <img src='images/$pieces10[$n]' alt='' class='img-responsive'/>
                    <div class='products-right-grids-position1' style='width: 40%;margin-left: 40%;'>
                        <h4> $info[0] </h4>
                        <p>$pieces15[$n]</p>
                    </div>
                </div>";
                   }else{
                       echo "<div class='products-right-grids-position animated wow slideInRight top' style='background:white;' data-wow-delay='.6s'>
                    <img src='images/$pieces10[$n]' alt='' class='img-responsive'/>
                    <div class='products-right-grids-position1' style='width: 40%;margin-left: 30%;'>
                        <h4> $info[0] </h4>
                        <p>$pieces15[$n]</p>
                    </div>
                </div>";
                   }
               }
                ?>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

</div>
<!-- //single-related-products -->
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
<!-- zooming-effect -->
<script src="js/imagezoom.js"></script>
<!-- //zooming-effect -->
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
<!-- flixslider -->
<script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });

        var jan=document.getElementById("jan");
        var jia=document.getElementById("jia");
        var num=document.getElementById("num");
        var a=num.value;
        jia.onclick=function () {
            a++;
            if (a>= 20) {
                a = 20;
                jia.style.background="#f0f0f0";
            }else if(a<20){
                jan.style.background="#fff";
                jia.style.background="#fff";
            }    num.value = a;
            console.log(num.value);
        };
        jan.onclick=function () {
            a--;
            if (a <=1) {
                a= 1;
                jan.style.background="#f0f0f0"
            }else if(a>1){
                jan.style.background="#fff";
                jia.style.background="#fff";
            }    num.value = a;
            console.log(num.value);
        }



    });
</script>
<!-- flixslider -->
</body>
</html>