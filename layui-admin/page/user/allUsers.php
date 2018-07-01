<meta charset="utf-8">
<?php
session_start();
include_once("../../opensql.php");
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
}else{
    header("location:../../login.php");
    echo '<script type="text/javascript">alert("必须登录后才能进入，请先登录");</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>后台管理模板--用户总数</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="../../layui/css/layui.css" media="all" />
	<link rel="stylesheet" href="../../css/font_eolqem241z66flxr.css" media="all" />
	<link rel="stylesheet" href="../../css/user.css" media="all" />
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
			<a class="layui-btn layui-btn-normal usersAdd_btn">添加用户</a>
		</div>
		<div class="layui-inline">
			<div class="layui-form-mid layui-word-aux">　本页面显示了所有的用户，请不要恶意删除</div>
		</div>
	</blockquote>
    <div class="layui-form news_list">
        <table class="layui-table" >
            <colgroup>
                <col width="15%">
                <col width="15%">
                <col width="30%">
                <col width="20%">
                <col width="10%">
                <col width="10%">
            </colgroup>
            <thead>
            <tr>
                <th >姓名</th>
                <th>邮箱</th>
                <th>密码</th>
                <th>电话</th>
                <th>状态</th>
                <th>最后登录时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody class="news_content" >
            <?php
            $num_rec_per_page=7;   // 每页显示数量
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            } else {
                $page=1;
            };
            $start_from = ($page-1) * $num_rec_per_page;
            include_once("../../opensql.php");
            $sql="select * from tb_user limit $start_from, $num_rec_per_page";//准备sql语句
            $xian=$mysqldb->select($sql);
            while ( $row=mysql_fetch_row($xian)) {
                if($row[4]=="0"){
                    echo "<tr>                               
                        <td style='font-size: 10px;'>$row[0]</td>
                        <td>$row[1]</td>     
                        <td><input type='password'  disabled class='layui-input  layui-disabled' style='border: none;text-align: center' value='$row[2]'></td>                                                           
                        <td>$row[3]</td>                                                                                                                                                                                                                                      
                        <td style='color:#0d957a'>启用</td>                                                                                                 
                        <td>$row[5]</td>                                                                                                 
                        <td><a href='allUsers_update.php?id=$row[6]' class='layui-btn layui-btn-mini news_edit'><i class='iconfont icon-edit'></i> 编辑</a>
                        <a href='allUsers_delete.php?id=$row[6]' class='layui-btn layui-btn-danger layui-btn-mini news_del'><i class='layui-icon'>&#xe640;</i> 删除</a>
                        </td>                    
                       </tr>";
                }else{
                    echo "<tr>                               
                        <td style='font-size: 10px;'>$row[0]</td>
                        <td>$row[1]</td>                                                               
                        <td><input type='password'  disabled class='layui-input  layui-disabled' style='border: none;text-align: center' value='$row[2]'></td>             
                        <td>$row[3]</td>                                                                                                                                                                                                             
                        <td style='color:#ee341c'>禁用</td>                                                                                                 
                        <td>$row[5]</td>                                                                                                 
                        <td><a href='allUsers_update.php?id=$row[6]' class='layui-btn layui-btn-mini news_edit'><i class='iconfont icon-edit'></i> 编辑</a>
                        <a href='allUsers_delete.php?id=$row[6]' class='layui-btn layui-btn-danger layui-btn-mini news_del'><i class='layui-icon'>&#xe640;</i> 删除</a>
                        </td>                    
                       </tr>";
                }
            }
            ?>
            </tbody>
        </table>
    </div>
    <?php
    $sql = "select * from  tb_user";//查询数据库
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
     <a href='allUsers.php?page=$prev' class='layui-laypage-prev '>上一页</a>";
    for ($i=1; $i<=$total_pages; $i++) {
        echo " <a href='allUsers.php?page=$i'>$i</a>";
    };
    echo "<a href='allUsers.php?page= $total_pages'  title='尾页' >尾页</a>
       <a href='allUsers.php?page=$next' class='layui-laypage-next'>下一页</a>";
    ?>
    </div>
    </div>

    <script type="text/javascript" src="../../layui/layui.js"></script>
	<script type="text/javascript" src="allUsers.js"></script>
    <script>
        $(function () {
            $("#jiao a:nth-of-type(<?php echo $page+1 ?>)").css({"background":"#009688","color":"white"});
        })
    </script>
</body>
</html>