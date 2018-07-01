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
	<meta charset='utf-8'>
	<title>后台管理--个人资料</title>
	<meta name='renderer' content='webkit'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
	<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>
	<meta name='apple-mobile-web-app-status-bar-style' content='black'>
	<meta name='apple-mobile-web-app-capable' content='yes'>
	<meta name='format-detection' content='telephone=no'>
	<link rel='stylesheet' href='../../layui/css/layui.css' media='all' />
	<link rel='stylesheet' href='../../css/user.css' media='all' />
    <script src="jquery-3.3.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //  加载所有的省份
            $.ajax({
                type: "POST",
                url: "ajax.php", // type=1表示查询省份
                success: function(data) {
                    $("#provinces").html("<option value='四川省'>请选择省</option>");
                    var msg = JSON.parse(data);
                    $.each(msg, function(i, n) {
                        $("#provinces").append("<option value='" + n.provinceID + "'>" + n.province + "</option>");
                    });
                }
            });

            $("#provinces").change(function() {
                var provincesID = $('#provinces').val();
                $.ajax({
                    type: "POST",
                    url: "ajaxCity.php", // type =2表示查询市
                    data: {'provincesID':provincesID},
                    dataType: "json",
                    success: function(data) {
                        $("#citys").html("<option value=''>请选择市</option>");
                        $("#areas").html("<option value=''>请选择县</option>");
                        $.each(data, function(i, n) {
                            $("#citys").append("<option value='" + n.cityID + "'>" + n.city + "</option>");
                        });
                    }
                });

            });


            $("#citys").change(function() {
                var cityID = $('#citys').val();
                $.ajax({
                    type: "POST",
                    url: "ajaxArea.php",
                    data: {"cityID": cityID},
                    dataType: "json",
                    success: function(data) {
                        $("#areas").html("<option value=''>请选择县</option>");
                        $.each(data, function(i, n) {
                            $("#areas").append("<option value='" + n.areaID + "'>" + n.area + "</option>");
                        });
                    }
                });
            });

        });


    </script>
</head>
<body class='childrenBody'>

<?php
$sql='select * from tb_admin where a_username="'.$username.'"';
$xian=$mysqldb->select($sql);
$row=mysql_fetch_row($xian);

?>
	<form class='layui-form' action="info_check.php" method="post" enctype="multipart/form-data">
		<div class='user_left'>
			<div class='layui-form-item'>
			    <label class='layui-form-label'>用户名</label>
			    <div class='layui-input-block'>
			    	<input type='text' value="<?php echo $row[0]?>" disabled name="username"  class='layui-input  layui-disabled'>
			    </div>
			</div>
			<div class='layui-form-item'>
			    <label class='layui-form-label'>用户组</label>
			    <div class='layui-input-block'>
			    	<input type='text' value="<?php echo $row[1]?>" disabled class='layui-input layui-disabled'>
			    </div>
			</div>
			<div class='layui-form-item'>
			    <label class='layui-form-label'>真实姓名</label>
			    <div class='layui-input-block'>
			    	<input type='text' value="<?php echo $row[2]?>" disabled placeholder='请填写您的真实姓名' lay-verify='required' class='layui-input layui-disabled'>
			    </div>
			</div>
			<div class='layui-form-item' >
			    <label class='layui-form-label'>性别</label>
			    <div class='layui-input-block'>
			    	<input type='radio' name='sex' value='男' title='男' <?php if($row[4]=="男"){echo 'checked';}?> >
	     			<input type='radio' name='sex' value='女' title='女' <?php if($row[4]=="女"){echo 'checked';}?> >
	     			<input type='radio' name='sex' value='保密' title='保密' <?php if($row[4]=="保密"){echo 'checked';}?>>
			    </div>
			</div>
			<div class='layui-form-item'>
			    <label class='layui-form-label'>手机号码</label>
			    <div class='layui-input-block'>
			    	<input type='tel' name="tel" value="<?php echo $row[5]?>" placeholder='请填写常用的手机号码' lay-verify='required|phone' class='layui-input'>
			    </div>
			</div>
			<div class='layui-form-item'>
			    <label class='layui-form-label'>出生日期</label>
			    <div class='layui-input-block'>
			    	<input type='text' name="riqi" value="<?php echo $row[6]?>" placeholder='请填写正确的出生日期' lay-verify='required|date' onclick='layui.laydate({elem: this,max: laydate.now()})' class='layui-input'>
			    </div>
			</div>
			<div class='layui-form-item'>

			    <label class='layui-form-label'>家庭住址</label>
			    <div class='layui-input-inline'>
	                <select name='province' id="provinces" style="width: 100px;height: 30px; ">
                        <option value="四川省">四川省</option>
	                </select>
	            </div>
	            <div class='layui-input-inline'>
	                <select name='city'  id="citys" style="width: 100px;height: 30px; ">
                        <option value="泸州市">泸州市</option>
	                </select>
	            </div>
	            <div class='layui-input-inline'>
	                <select name='area' lay-filter='area' id="areas" style="width: 100px;height: 30px; ">
                        <option value="龙马潭区">龙马潭区</option>
	                </select>
	            </div>


            </div>
			<div class='layui-form-item'>
			    <label class='layui-form-label'>兴趣爱好</label>
			    <div class='layui-input-block'>
			    	<input type='checkbox' name='like1[javascript]' value="Javascript" title='Javascript' <?php if(stripos("$row[8]",'Javascript')>0){ echo 'checked';}?>>
				    <input type='checkbox' name='like1[html]' title='HTML(5)' value="HTML(5)" <?php if(stripos("$row[8])",'HTML(5')>0){ echo 'checked';}?>>
				    <input type='checkbox' name='like1[css]' title='CSS(3)' VALUE="CSS(3)" <?php if(stripos("$row[8]",'CSS(3)')>0){ echo 'checked';}?>>
				    <input type='checkbox' name='like1[php]' title='PHP' VALUE="php" <?php if(stripos("$row[8]",'PHP')>0){ echo 'checked';}?>>
				    <input type='checkbox' name='like1[.net]' title='.net' VALUE=".net" <?php if(stripos("$row[8]",'.net')>0){ echo 'checked';}?>>
				    <input type='checkbox' name='like1[ASP]' title='ASP' value="ASP" <?php if(stripos("$row[8]",'ASP')>0){ echo 'checked';}?>>
				    <input type='checkbox' name='like1[C#]' title='C#' value="C#" <?php if(stripos("$row[8]",'C#')>0){ echo 'checked';}?>>
				    <input type='checkbox' name='like1[Angular]' title='Angular' value="Angular" <?php if(stripos("$row[8]",'Angular')>0){ echo 'checked';}?>>
				    <input type='checkbox' name='like1[VUE]' title='VUE' value="VUE" <?php if(stripos($row[8],'vue')>0){ echo 'checked';}?> >
				    <input type='checkbox' name='like1[XML]' title='XML' value="XML" <?php if(stripos("$row[8]",'xml')>0){ echo 'checked';}?> >
			    </div>
			</div>
			<div class='layui-form-item'>
			    <label class='layui-form-label'>邮箱</label>
			    <div class='layui-input-block'>
			    	<input type='email' name="email" value="<?php echo $row[9]?>" placeholder='请填写您的邮箱' lay-verify='required|email' class='layui-input'>
			    </div>
			</div>
			<div class='layui-form-item'>
			    <label class='layui-form-label'>自我评价</label>
			    <div class='layui-input-block'>
			    	<textarea name="say" placeholder='来都来了，就随便说点吧'  class='layui-textarea'><?php echo $row[11]?></textarea>
			    </div>
			</div>
		</div>
		<div class='user_right'>
			<input type='file' name='myFile' class='layui-upload-file' lay-title='掐指一算，我要换一个头像了'>
			<p>哈哈，点击上方空白上传头像</p>
			<img src='../../images/<?php echo $row[10]?>' class='layui-circle' id='userFace'>
		</div>
		<div class='layui-form-item' style='margin-left: 5%;'>
		    <div class='layui-input-block'>
		    	<input type="submit" class='layui-btn' lay-submit='' lay-filter='changeUser' value="立即提交">
				<button type='reset' class='layui-btn layui-btn-primary'>重置</button>
		    </div>
		</div>
	</form>
	<script type='text/javascript' src='../../layui/layui.js'></script>
	<script type='text/javascript' src='user.js'></script>
</body>
</html>