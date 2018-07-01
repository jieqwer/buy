<meta charset="utf-8">
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
    <meta charset="utf-8">
    <title>商品列表--phone</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="../../layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="../../css/font_eolqem241z66flxr.css" media="all" />
    <link rel="stylesheet" href="../../css/news.css" media="all" />
    <script src="../user/jquery-3.3.1.min.js" type="text/javascript"></script>
</head>
<body class="childrenBody">
<blockquote class="layui-elem-quote news_search">
    <div class="layui-inline">
        <div class="layui-input-inline">
            <input type="text" value="" placeholder="请输入关键字" class="layui-input search_input">
        </div>
        <a class="layui-btn search_btn">查询</a>
    </div>
    <div class="layui-inline">
        <a href="add_phone.php" class="layui-btn layui-btn-normal newsAdd_btn">添加商品</a>
    </div>
    <div class="layui-inline">
        <div class="layui-form-mid layui-word-aux">此页面用于对商品的管理</div>
    </div>
</blockquote>
<div class="layui-form news_list" style="width:1480px;height:680px;overflow:auto;float: left">
    <table class="layui-table"   style="width: 10000px;position: relative">
        <thead>
        <colgroup>
        <col width="1%">
        <col width="1%">
        <col width="1%">
        <col width="5%">
        <col width="4%">
        <col width="4%">
        <col width="1%">
        <col width="6%">
        <col width="6%">
        <col width="7%">
        <col width="7%">
        <col width="1%">
        <col width="6%">
        <col width="5%">
        <col width="5%">
        <col width="5%">
        <col width="2.6%">
        <col width="5%">
        <col width="5%">
        <col width="8%">
        <col width="2%">
        <col width="7%">
        <col width="1%">
        <col width="2%">
        <col width="5%">

        </colgroup>
        <tr>
            <th style="background: #f2f2f2">手机名称</th>
            <th style="background: #f2f2f2">手机品牌</th>
            <th style="background: #f2f2f2">基本价格</th>
            <th style="background: #f2f2f2">版本价格</th>
            <th style="background: #f2f2f2">内存</th>
            <th style="background: #f2f2f2">颜色</th>
            <th style="background: #f2f2f2">手机存货量</th>
            <th style="background: #f2f2f2">基本参数</th>
            <th style="background: #f2f2f2">描述</th>
            <th style="background: #f2f2f2">主体</th>
            <th style="background: #f2f2f2">基本信息</th>
            <th style="background: #f2f2f2">操作系统</th>
            <th style="background: #f2f2f2">主芯片</th>
            <th style="background: #f2f2f2">网络支持</th>
            <th style="background: #f2f2f2">屏幕</th>
            <th style="background: #f2f2f2">摄像头</th>
            <th style="background: #f2f2f2">电池</th>
            <th style="background: #f2f2f2">手机特性</th>
            <th style="background: #f2f2f2">包装清单</th>
            <th style="background: #f2f2f2">手机三视图</th>
            <th style="background: #f2f2f2">手机其它图</th>
            <th style="background: #f2f2f2">图片展示</th>
            <th style="background: #f2f2f2">推荐指数</th>
            <th style="background: #f2f2f2">上架时间</th>
            <th style="background: #f2f2f2">图片叙述</th>
        </tr>
        </thead>

        <tbody class="news_content">
        <?php
        $num_rec_per_page=4;   // 每页显示数量
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page=1;
        };
        $start_from = ($page-1) * $num_rec_per_page;
        include_once("../../opensql.php");
        $sql="select * from tb_phone limit $start_from, $num_rec_per_page";//准备sql语句
        $xian=$mysqldb->select($sql);
        while ( $row=mysql_fetch_row($xian)) {
            $pieces13 = explode(",", $row[3]);//版本价格
            $pieces11 = explode(",", $row[5]);//颜色
            $pieces1 = explode(",", $row[7]);//基本参数
            $pieces2 = explode(",", $row[9]);//主体
            $pieces3 = explode(",", $row[10]);//基本信息
            $pieces14 = explode(",", $row[12]);//主芯片
            $pieces4 = explode(",", $row[13]);//网络支持
            $pieces5 = explode(",", $row[14]);//屏幕
            $pieces6 = explode(",", $row[15]);//摄像头
            $pieces7 = explode(",", $row[16]);//电池
            $pieces8 = explode(",", $row[17]);//手机特性
            $pieces9 = explode(",", $row[19]);//手机三视图
            $pieces10 = explode(",", $row[21]);//图片展示图
            $pieces15 = explode(",", $row[24]);//图介绍


                echo "<tr>                               
                        <td style='font-size: 10px;'>$row[0]</td>
                        <td>$row[1]</td>                                                               
                        <td>$row[2]</td> 
                        <td>";
                        for($i=0;$i<count($pieces13 );$i++){
                            if($i==0){
                                echo " 标准版：<span class='layui-bg-green'>$pieces13[$i]元</span>";
                            }else if($i==1){
                                echo " 旗舰版：<span class='layui-bg-red'>$pieces13[1]元</span>";
                            }else if($i==2){
                                echo " 开发版：<span class='layui-bg-blue'>$pieces13[2]元</span>";
                            }else{
                               echo " 其它版本：<span class='layui-bg-blue'>$pieces13[$i]元</span>" ;
                            }
                        }
                        echo "</td><td>$row[4]</td><td>  ";
                        for($o=0;$o<count($pieces11 );$o=$o+2){
                            $o1=$o+1;
                            echo "<p><span style='display: block;float: left'>$pieces11[$o]:</span><span style='display: block;width:20px;height:20px;margin-right:10px;float:left;background:$pieces11[$o1]'></span></p>";
                        }
                                                                
                           echo "</td>                                                                                                 
                        <td>$row[6]（部）</td>                                                                                                 
                        <td>分辨率：$pieces1[0] 后置摄像头：$pieces1[1]万像素 前置摄像头：$pieces1[2]万像素 商品毛重：$pieces1[3]g </td>                                                                                                 
                        <td>$row[8]</td>                                                                                                 
                        <td>品牌：$pieces2[0]  型号：$pieces2[1]  入网型号：$pieces2[2] 上市年份：$pieces2[3] 上市月份：$pieces2[4]</td>                                                                                                 
                        <td>机身长度(mm)：$pieces3[0] 机身宽度(mm)：$pieces3[1] 机身厚度(mm)：$pieces3[2] 机身重量(g)：$pieces3[3] </td>                                                                                                 
                        <td>$row[11]</td>                                                                                                 
                        <td>CPU品牌：$pieces14[0] CPU频率：$pieces14[1] CPU核数：$pieces14[2] CPU型号：$pieces14[3]</td>                                                                                                 
                        <td>双卡类型：$pieces4[0] 最大支持SIM卡个数：$pieces4[1]个 SIM卡类型：$pieces4[2] 4G网络：$pieces4[3] </td>                                                                                                 
                        <td>主屏幕尺寸（英寸）：$pieces5[0] 分辨率：$pieces5[1] 屏幕材质类型：$pieces5[2]</td>                                                                                                 
                        <td>前置摄像头：$pieces6[0]万像素 前置光圈大小：$pieces6[1] 摄像头数量：$pieces6[2]个 后置摄像头：$pieces6[3]万像素</td>                                                                                                                                                                                               
                        <td>电池容量（mAh）：$pieces7[0] 电池是否可拆卸：$pieces7[1] 充电器：$pieces7[2] </td>                                                                                                 
                        <td>指纹识别：$pieces8[0] GPS：$pieces8[1] 陀螺仪：$pieces8[2] </td>                                                                                                 
                        <td>$row[18]</td>                                                                                                 
                        <td>正面：$pieces9[0] <a class='layui-btn layui-btn-mini news_edit' href='img_update.php?id=$row[25]&im=0'>编辑正面图</a>侧面：$pieces9[1] <a class='layui-btn layui-btn-mini news_edit' href='img_update.php?id=$row[25]&im=1'>编辑侧面图</a>背面：$pieces9[2]<a class='layui-btn layui-btn-mini news_edit' href='img_update.php?id=$row[25]&im=2'>编辑背面图</a></td>                                                                                                 
                        <td>$row[20] <a class='layui-btn layui-btn-mini news_edit' href='img_update1.php?id=$row[25]'>编辑</a></td>                                                                                                 
                        <td>";
                       for($z=0;$z<count($pieces10);$z++){
                          echo  $pieces10[$z]."<a class='layui-btn layui-btn-mini news_edit' href='img_update2.php?id=$row[25]&im=$z'>编辑</a>";
                       }
                        echo "</td><td>$row[22]</td>                                                                                                 
                        <td>$row[23]</td>                                                                                                                                                                                                                                       
                        <td>$row[24]</td>                                                                                                                                                                                                                                       
                       </tr>";
            }
            ?>
   </tbody>
    </table>
</div>
<div class='layui-form news_list' style='width:200px;float: left'>
    <table class='layui-table' >
        <thead>
        <tr style='height: 59px;'><th>操作</th></tr>
        </thead>
        <tbody class='news_content'>
<?php        $sql1="select * from tb_phone limit $start_from, $num_rec_per_page";//准备sql语句
        $xian1=$mysqldb->select($sql1);
        while ($row1=mysql_fetch_row($xian1)){
            echo "<tr style='height: 79px;'><td><a href='phone_update.php?id=$row1[25]' class='layui-btn layui-btn-mini news_edit'><i class='iconfont icon-edit'></i> 编辑</a>
                <a href='phone_delete.php?id=$row1[25]' class='layui-btn layui-btn-danger layui-btn-mini news_del'><i class='layui-icon'>&#xe640;</i> 删除</a>
            </td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<?php
$sql = "select * from  tb_phone";//查询数据库
$rs_result = mysql_query($sql); //查询数据
$total_records = mysql_num_rows($rs_result);  // 统计总共的记录返回条数
$total_pages = ceil($total_records / $num_rec_per_page);  // 计算总页数=总共的记录条数/每页显示数量
if($page==1) {
    $prev = 1;
}else{
    $prev=$page-1;
}
if($page==$total_pages){
    $next=$total_pages;
}else{
    $next=$page+1;
}
echo "<div id='demo7'>
    <div id='jiao' class='layui-box layui-laypage layui-laypage-default'  ><span class='layui-laypage-count'>共 $total_records 条</span>
     <a href='phone_table.php?page=$prev' class='layui-laypage-prev '>上一页</a>";
for ($i=1; $i<=$total_pages; $i++) {
    echo " <a href='phone_table.php?page=$i'>$i</a>";
};
echo "<a href='phone_table.php?page= $total_pages'  title='尾页' >尾页</a>
       <a href='phone_table.php?page=$next' class='layui-laypage-next'>下一页</a>";
?>
</div>
</div>

<script>
    $(function () {
        $("#jiao a:nth-of-type(<?php echo $page+1 ?>)").css({"background":"#009688","color":"white"});
    })
</script>
<script type="text/javascript" src="../../layui/layui.js"></script>


</body>
</html>

