<?php
session_start();
include_once("../opensql.php");
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
    <title>首页--layui后台管理模板</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="../layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="../css/font_eolqem241z66flxr.css" media="all" />
    <link rel="stylesheet" href="../css/main.css" media="all" />
</head>
<body class="childrenBody">
<div class="panel_box row">
    <div class="panel col">
        <a href="javascript:;" data-url="page/news/phone_table.php" >
            <div class="panel_icon">
                <i class="layui-icon" data-icon="&#xe63a;">&#xe63a;</i>
            </div>
            <div class="panel_word newMessage">
                <span>
                    <?php
                    $sql1="select * from tb_phone ";
                    $xian1=$mysqldb->select($sql1);
                    $row1=mysql_num_rows($xian1);
                    echo $row1;
                    ?>
                </span>
                <cite>手机总数</cite>
            </div>
        </a>
    </div>
    <div class="panel col">
        <a href="javascript:;" data-url="page/user/allUsers.php"  >
            <div class="panel_icon" style="background-color:#FF5722;">
                <i class="iconfont icon-dongtaifensishu" data-icon="icon-dongtaifensishu"></i>
            </div>
            <div class="panel_word userAll">
                <span>
                     <?php
                     $sql2="select * from tb_user ";
                     $xian2=$mysqldb->select($sql2);
                     $row2=mysql_num_rows($xian2);
                     echo $row2;
                     ?>
                </span>
                <cite>用户人数</cite>
            </div>
        </a>
    </div>
    <div class="panel col">
        <a href="javascript:;" data-url="page/news/newsList.php" >
            <div class="panel_icon" style="background-color:#009688;">
                <i class="layui-icon" data-icon="&#xe613;">&#xe613;</i>
            </div>
            <div class="panel_word userAll">
                <span>
                     <?php
                     $sql3="select * from tb_admin ";
                     $xian3=$mysqldb->select($sql3);
                     $row3=mysql_num_rows($xian3);
                     echo $row3;
                     ?>
                </span>
                <cite>管理员总数</cite>
            </div>
        </a>
    </div>
    <div class="panel col">
        <a href="javascript:;" data-url="page/news/phone_table.php">
            <div class="panel_icon" style="background-color:#5FB878;">
                <i class="layui-icon" data-icon="&#xe64a;">&#xe64a;</i>
            </div>
            <div class="panel_word imgAll">
                <span>
                    <?php
                    $sql4="select * from tb_phone ";
                    $xian4=$mysqldb->select($sql4);
                    $row4=mysql_num_rows($xian4);
                    $s=$row4*7;
                    echo $s;
                    ?>
                </span>
                <cite>图片总数</cite>
            </div>
        </a>
    </div>
    <div class="panel col">
        <a href="javascript:;" data-url="page/news/say_table.php">
            <div class="panel_icon" style="background-color:#F7B824;">
                <i class="iconfont icon-wenben" data-icon="icon-wenben"></i>
            </div>
            <div class="panel_word waitNews">
                <span>
                    <?php
                    $sql5="select * from tb_say where s_strat='0'";
                    $xian5=$mysqldb->select($sql5);
                    $row5=mysql_num_rows($xian5);
                    echo $row5;
                    ?>
                </span>
                <cite>待审核</cite>
            </div>
        </a>
    </div>
    <div class="panel col max_panel">
        <a href="javascript:;" data-url="page/news/classification_table.php">
            <div class="panel_icon" style="background-color:#2F4056;">
                <i class="iconfont icon-text" data-icon="icon-text"></i>
            </div>
            <div class="panel_word allNews">
                <span>
                  <?php
                  $sql6="select * from tb_classification4";
                  $xian6=$mysqldb->select($sql6);
                  $row6=mysql_num_rows($xian6);
                  echo $row6;
                  ?>
                </span>
                <em>导航总数</em>
                <cite>导航总数</cite>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="sysNotice col">
        <blockquote class="layui-elem-quote title">最新通知</blockquote>
        <div class="layui-elem-quote layui-quote-nm">
            <h3># 2016-05-01 - 2017-03-01</h3>
            <p>* 1</p>
            <p>* 2</p>
            <p>* 3</p>
            <p>* 4</p>
            <p>* 5</p>
            <br />
            <p># 其它</p>
            <p>* 1</p>
            <p>* 2</p>
            <p>* 3</p>
            <p>* 4</p>
            <p>* 5</p>
            <p>* 6</p>
            <p>* 7</p>
            <p>* 8</p>
            <p>* 9</p>
            <p>* 10</p>
            <p>* 11</p>
        </div>
    </div>
    <div class="sysNotice col">
        <blockquote class="layui-elem-quote title">系统基本参数</blockquote>
        <table class="layui-table">
            <colgroup>
                <col width="150">
                <col>
            </colgroup>
            <tbody>
            <tr>
                <td>当前版本</td>
                <td class="version">1.0.0</td>
            </tr>
            <tr>
                <td>开发作者</td>
                <td class="author">小黎</td>
            </tr>
            <tr>
                <td>网站首页</td>
                <td class="homePage">page/index.html</td>
            </tr>
            <tr>
                <td>服务器环境</td>
                <td class="server">Linux</td>
            </tr>
            <tr>
                <td>数据库版本</td>
                <td class="dataBase">8.00.2039</td>
            </tr>
            <tr>
                <td>最大上传限制</td>
                <td class="maxUpload">2M</td>
            </tr>
            <tr>
                <td>当前用户权限</td>
                <td class="userRights">
                    <?php
                    $sql7="select * from tb_admin where a_username='$username' ";
                    $xian7=$mysqldb->select($sql7);
                    $row7=mysql_fetch_array($xian7);
                    echo $row7[1];
                    ?>

                </td>
            </tr>
            </tbody>
        </table>
        <blockquote class="layui-elem-quote title">最新文章<i class="iconfont icon-new1"></i></blockquote>
        <table class="layui-table" lay-skin="line">
            <colgroup>
                <col>
                <col width="110">
            </colgroup>
            <tbody class="hot_news">
            <table>
                <tr><td>暂无</td></tr>
            </table>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript" src="../layui/layui.js"></script>
<script type="text/javascript" src="../js/main.js"></script>

</body>
</html>