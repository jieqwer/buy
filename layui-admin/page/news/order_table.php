<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>订单列表--newlist</title>
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
        <div class="layui-form-mid layui-word-aux">非超级管理员不能操作订单列表</div>
    </div>
</blockquote>
<div class="layui-form news_list">
    <table class="layui-table" >
        <colgroup>
            <col width="8%">
            <col width="4%">
            <col width="8%">
            <col width="8%">
            <col width="8%">
            <col width="4%">
            <col width="12%">
            <col width="10%">
            <col width="5%">
            <col width="4%">
            <col width="8%">
            <col width="4%">
            <col width="4%">
            <col width="2%">
        </colgroup>
        <thead>
        <tr>
            <th>手机名称</th>
            <th>手机数量</th>
            <th>手机颜色</th>
            <th>手机版本</th>
            <th>手机内存</th>
            <th>服务费</th>
            <th>下单收货地址</th>
            <th>下单时间</th>
            <th>总价</th>
            <th>订单联系人</th>
            <th>订单联系人电话</th>
            <th>商品ID</th>
            <th>订单所属用户ID</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody class="news_content" >
        <?php
        $num_rec_per_page=6;   // 每页显示数量
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page=1;
        };
        $start_from = ($page-1) * $num_rec_per_page;
        include_once("../../opensql.php");
        $sql="select * from tb_order limit $start_from, $num_rec_per_page";//准备sql语句
        $xian=$mysqldb->select($sql);
        while ( $row=mysql_fetch_row($xian)) {
            echo "<tr>                               
                        <td style='font-size: 10px;'>$row[0]</td>
                        <td>$row[1]</td>                                                               
                        <td>$row[2]</td>             
                        <td>$row[3]</td>             
                        <td>$row[4]</td>                                                                                                 
                        <td>$row[5]</td>                                                                                                 
                        <td>$row[6]</td>                                                                                                 
                        <td>$row[7]</td>                                                                                                 
                        <td>$row[8]</td>                                                                                                 
                        <td>$row[9]</td>                                                                                                                                                                                                                                                                                                                
                        <td>$row[10]</td>                                                                                                                                                                                                                                                                                                                
                        <td>$row[11]</td>                                                                                                                                                                                                                                                                                                                
                        <td>$row[12]</td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
                        <td><a href='order_update.php?id=$row[13]' class='layui-btn layui-btn-mini news_edit'><i class='iconfont icon-edit'></i> 修改收获地址</a>
                        <a href='order_delete.php?id=$row[13]' class='layui-btn layui-btn-danger layui-btn-mini news_del'><i class='layui-icon'>&#xe640;</i> 删除该订单</a>
                        </td>                   
                       </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<?php
$sql = "select * from  tb_order";//查询数据库
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
     <a href='order_table.php?page=$prev' class='layui-laypage-prev '>上一页</a>";
for ($i=1; $i<=$total_pages; $i++) {
    echo " <a href='order_table.php?page=$i'>$i</a>";
};
echo "<a href='order_table.php?page= $total_pages'  title='尾页' >尾页</a>
       <a href='order_table.php?page=$next' class='layui-laypage-next'>下一页</a>";
?>
</div>
</div>

<script type="text/javascript" src="../../layui/layui.js"></script>
<script>
    $(function () {
        $("#jiao a:nth-of-type(<?php echo $page+1 ?>)").css({"background":"#009688","color":"white"});
    })


</script>
</body>
</html>