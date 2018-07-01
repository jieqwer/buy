<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>导航列表--newlist</title>
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
        <div class="layui-form-mid layui-word-aux">导航网址管理</div>
    </div>
</blockquote>
<div class="layui-form news_list" style="float: left;width: 400px;">
    <table class="layui-table" >
        <colgroup>
            <col width="10%">
            <col width="10%">
        </colgroup>
        <thead>
        <tr>
            <th>分类名</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody class="news_content">
        <?php
        include_once("../../opensql.php");
        $sql="select * from tb_classification3 ";//准备sql语句
        $xian=$mysqldb->select($sql);
        while ( $row=mysql_fetch_row($xian)) {
            echo "<tr>        <form method='post' action='classification_update.php?id=$row[1]' >                  
                        <td style='font-size: 10px;'><input type='text' name='class1' lay-verify='required' style='text-align: center' class='layui-input' value='$row[0]'></td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
                        <td><input type='submit' class='layui-btn layui-btn-mini news_edit' value='修改'><a href='classification_delete.php?id=$row[1]' class='layui-btn layui-btn-danger layui-btn-mini news_del'> 删除</a>                    
                        </td>        
                         </form>              
                       </tr>";
        }
        ?>
        <tr><form method='post' action='classification_insert.php' >
                <td style='font-size: 10px;'><input type='text' name='class1' lay-verify='required' style='text-align: center' class='layui-input' placeholder='分类名称'></td>
                <td><input type='submit' class='layui-btn layui-btn-mini news_edit' value="新增">
                </td>
            </form>
        </tr>
        </tbody>
    </table>
</div>
<div class="layui-form news_list" style="float: left;margin-left:20px;width: 1200px">
    <table class="layui-table" >
        <colgroup>
            <col width="10%">
            <col width="20%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
        </colgroup>
        <thead>
        <tr>
            <th>网站名称</th>
            <th>地址</th>
            <th>所属分类</th>
            <th>是否热门</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody class="news_content">
        <?php
        $num_rec_per_page=10;   // 每页显示数量
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page=1;
        };
        $start_from = ($page-1) * $num_rec_per_page;
        include_once("../../opensql.php");
        $sql2="select * from tb_classification4 limit $start_from, $num_rec_per_page";//准备sql语句
        $xian2=$mysqldb->select($sql2);
        while ( $row2=mysql_fetch_row($xian2)) {
            echo "<tr>    <form method='post' action='classification_check.php?id=$row2[4]'>                        
                        <td style='font-size: 10px;'><input type='text' class='layui-input' style='text-align: center' name='ca1' value='$row2[0]' ></td>                                                                 
                        <td style='font-size: 10px;'><input type='text' class='layui-input' style='text-align: center' name='ca2' value='$row2[1]' ></td>                                                                 
                        <td style='font-size: 10px;'>
                        <select name='ca3'  class='layui-input' style='display: block'>";
              $sql4="select * from tb_classification3";//准备sql语句
        $xian4=$mysqldb->select($sql4);
        while ( $row4=mysql_fetch_row($xian4)) {
            if ($row4[1] == $row2[2]) {
                echo "<option selected value='$row4[1]'>$row4[0]</option>";
            } else {
                echo "<option value='$row4[1]'>$row4[0]</option>";
            }
        }
            echo"                     
                        </select> </td>                                                           
                        <td style='font-size: 10px;'><select style='display: block'  class='layui-input' name='ca4'>";
                        if($row2[3]==0){
                            echo "<option value='1'>是</option>";
                            echo "<option selected value='0'>否</option>";
                        }else{
                            echo "<option selected value='1'>是</option>";
                            echo "<option  value='0'>否</option>";
                        }
                        echo "</select></td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
                        <td><input type='submit' class='layui-btn layui-btn-mini news_edit' value='修改'><a href='classification1_delete.php?id=$row2[4]' class='layui-btn layui-btn-danger layui-btn-mini news_del'><i class='layui-icon'>&#xe640;</i> 删除</a>
                        </td>      
                        </form>               
                       </tr>";
        }
        ?>
        <tr><form method='post' action='classification1_insert.php' >
                <td style='font-size: 10px;'><input type='text' name='ca1' lay-verify='required' style='text-align: center' class='layui-input' placeholder='网站名称'></td>
                <td><input type='text'   class='layui-input' name='ca2' lay-verify='required' style='text-align: center' placeholder='填写地址'></td>
                <td>
                    <select name='ca3'  class='layui-input' style='display: block'>
                    <?php
                    $sql5="select * from tb_classification3";//准备sql语句
                    $xian5=$mysqldb->select($sql5);
                    while ( $row5=mysql_fetch_row($xian5)) {
                        echo "<option  value='$row5[1]'>$row5[0]</option>";
                    }
                    ?>
                    </select>
                </td>
                <td>
                    <select name='ca4'  class='layui-input' style='display: block'>
                        <option  value='0'>否</option>
                        <option  value='1'>是</option>
                    </select>
                    </td>
                <td><input type='submit' class='layui-btn layui-btn-mini news_edit' value="新增">
                </td>
            </form>
        </tr>
        </tbody>
    </table>
</div>
<?php
$sql3 = "select * from  tb_classification4";//查询数据库
$rs_result = mysql_query($sql3); //查询数据
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
     <a href='classification_table.php?page=$prev' class='layui-laypage-prev '>上一页</a>";
for ($i=1; $i<=$total_pages; $i++) {
    echo " <a href='classification_table.php?page=$i'>$i</a>";
};
echo "<a href='classification_table.php?page= $total_pages'  title='尾页' >尾页</a>
       <a href='classification_table.php?page=$next' class='layui-laypage-next'>下一页</a>";
?>
<script type="text/javascript" src="../../layui/layui.js"></script>
<script>
    $(function () {
        $("#jiao a:nth-of-type(<?php echo $page+1 ?>)").css({"background":"#009688","color":"white"});
    })


</script>
</body>
</html>