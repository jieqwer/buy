<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>内存列表--newlist</title>
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
        <div class="layui-form-mid layui-word-aux">修改内存价格</div>
    </div>
</blockquote>
<div class="layui-form news_list">
    <table class="layui-table" >
        <colgroup>
            <col width="20%">
            <col width="20%">
            <col width="10%">
        </colgroup>
        <thead>
        <tr>
            <th>内存</th>
            <th>价格</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody class="news_content" >
        <?php
        include_once("../../opensql.php");
        $sql="select * from tb_memory ";//准备sql语句
        $xian=$mysqldb->select($sql);
        while ( $row=mysql_fetch_row($xian)) {
            echo "<tr>        <form method='post' action='memory_update.php?id=$row[2]' >                  
                        <td style='font-size: 10px;'><input type='text' name='mem1' lay-verify='required' style='text-align: center' class='layui-input' value='$row[0]'></td>
                        <td><input type='number'   class='layui-input' name='mem2' lay-verify='required' style='text-align: center' value='$row[1]'></td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
                        <td><input type='submit' class='layui-btn layui-btn-mini news_edit' value='修改'><a href='memory_delete.php?id=$row[2]' class='layui-btn layui-btn-danger layui-btn-mini news_del'> 删除</a>                    
                        </td>        
                         </form>              
                       </tr>";
        }
        ?>
        <tr><form method='post' action='memory_insert.php' >
                <td style='font-size: 10px;'><input type='text' name='mem1' lay-verify='required' style='text-align: center' class='layui-input' placeholder='填写内存'></td>
                <td><input type='number'   class='layui-input' name='mem2' lay-verify='required' style='text-align: center' placeholder='填写价格'></td>
                <td><input type='submit' class='layui-btn layui-btn-mini news_edit' value="新增">
                </td>
            </form>
        </tr>
        </tbody>
    </table>
</div>

<script type="text/javascript" src="../../layui/layui.js"></script>

</body>
</html>