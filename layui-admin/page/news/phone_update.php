
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
    <meta charset='utf-8'>
    <title>后台管理--修改商品信息</title>
    <meta name='renderer' content='webkit'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>
    <meta name='apple-mobile-web-app-status-bar-style' content='black'>
    <meta name='apple-mobile-web-app-capable' content='yes'>
    <meta name='format-detection' content='telephone=no'>
    <link rel='stylesheet' href='../../layui/css/layui.css' media='all' />
    <link rel='stylesheet' href='../../css/user.css' media='all' />
    <script src="../user/jquery-3.3.1.min.js" type="text/javascript"></script>
</head>
<body class='childrenBody'>

<?php

$id=$_GET['id'];

$sql="select * from tb_phone where id=$id";
$xian=$mysqldb->select($sql);
$row=mysql_fetch_row($xian);

?>
<form class='layui-form' action="phone_update_check.php?id=<?php echo $id?>" method="post" enctype="multipart/form-data">
    <div class='user_left'>
        <div class='layui-form-item'>
            <label class='layui-form-label'>手机名称</label>
            <div class='layui-input-block'>
                <input type='text' value="<?php echo $row[0]?>" lay-verify='required' name="pname"  class='layui-input '>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>手机品牌</label>
            <div class='layui-input-block'>
                <input type='text' value="<?php echo $row[1]?>" lay-verify='required' name="pname1"  class='layui-input '>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>基本价格</label>
            <div class='layui-input-block'>
                <input type='number' value="<?php echo $row[2]?>" lay-verify='required' name="pmoney"  class='layui-input '>
            </div>
        </div>
        <div class='layui-form-item'>
        <?php
        $pieces13 = explode(",", $row[3]);//版本价格
        for($i=0;$i<count($pieces13 );$i++){
            if($i==0){
                echo " <label class='layui-form-label'>标准版（元）</label>
            <div class='layui-input-inline' style='width: 65px;float: left'>
                <input type='number'  name='edition$i' value='$pieces13[$i]' lay-verify='required'  placeholder='价格' autocomplete='off' class='layui-input'>
            </div>";
            }else if($i==1){
                echo " <label class='layui-form-label'>旗舰版（元）</label>
            <div class='layui-input-inline' style='width: 65px;float: left'>
                <input type='number'  name='edition$i' value='$pieces13[$i]'   placeholder='价格' autocomplete='off' class='layui-input'>
            </div>";
            }else if($i==2){
                echo " <label class='layui-form-label'>开发版（元）</label>
            <div class='layui-input-inline' style='width: 65px;float: left'>
                <input type='number'  name='edition$i' value='$pieces13[$i]'  placeholder='价格' autocomplete='off' class='layui-input'>
            </div>";
            }else {
                echo " <label class='layui-form-label'>探索版（元）</label>
            <div class='layui-input-inline' style='width: 65px;float: left'>
                <input type='number'  name='edition$i' value='$pieces13[$i]'  placeholder='价格' autocomplete='off' class='layui-input'>
            </div>";
            }
        }
        ?>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>内存</label>
            <div class='layui-input-block'>
                <input type='checkbox' name='memory[4+64G]' value="4+64G" title='4+64G' <?php if(strpos("$row[4]",'4+64G')!==false){ echo 'checked';}?>>
                <input type='checkbox' name='memory[4+128G]' title='4+128G' value="4+128G" <?php if(stripos("$row[4])",'4+128G')!==false){ echo 'checked';}?>>
                <input type='checkbox' name='memory[6+64G]' title='6+64G' VALUE="6+64G" <?php if(stripos("$row[4]",'6+64G')!==false){ echo 'checked';}?>>
                <input type='checkbox' name='memory[6+128G]' title='6+128G' VALUE="6+128G" <?php if(stripos("$row[4]",'6+128G')!==false){ echo 'checked';}?>>
                <input type='checkbox' name='memory[8+64G]' title='8+64G' VALUE="8+64G" <?php if(stripos("$row[4]",'8+64G')>0){ echo 'checked';}?>>
                <input type='checkbox' name='memory[8+128G]' title='8+128G' value="8+128G" <?php if(stripos("$row[4]",'8+128G')!==false){ echo 'checked';}?>>
            </div>
        </div>
        <div class='layui-form-item'><label class='layui-form-label'>颜色</label>
            <?php
            $pieces14 = explode(",", $row[5]);//颜色
            for($k=0;$k<count($pieces14);$k=$k+2) {
                $k1=$k+1;
                echo "   
            <div class='layui-input-inline' style='width: 65px;float: left'>
                <input type='text' value='$pieces14[$k]' name='colorname$k' lay-verify='required' placeholder='颜色名称' class='layui-input'>
                <input type='color'  name='color$k' value='$pieces14[$k1]'  class='layui-input'>
            </div>";
            }
            ?>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>手机存货量</label>
            <div class='layui-input-block'>
                <input type='number' name="inventory" value="<?php echo $row[6]?>"  placeholder='请填写您的真实姓名' lay-verify='required' class='layui-input '>
            </div>
        </div>

        <?php
        $pieces15 = explode(",", $row[7]);//基本参数
        echo "      <div class='layui-form-item'><label class='layui-form-label'>分辨率</label>
            <div class='layui-input-inline' style='width: 230px;float: left'>
                <input type='text'  name='parameters1' value='$pieces15[0]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>后置摄像头(万像素)</label>
            <div class='layui-input-inline' style='width: 230px;float: left'>
                <input type='number'  name='parameters2' value='$pieces15[1]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            </div>
            <div class='layui-form-item'>
            <label class='layui-form-label'>前置摄像头(万像素）</label>
            <div class='layui-input-inline' style='width: 230px;float: left'>
                <input type='number'  name='parameters3' value='$pieces15[2]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>商品毛重(g)</label>
            <div class='layui-input-inline' style='width: 230px;float: left'>
                <input type='number'  name='parameters4' value='$pieces15[3]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div></div>";
        ?>
        <div class='layui-form-item'>
            <label class='layui-form-label'>描述</label>
            <div class='layui-input-block'>
                <textarea name="describe" placeholder='对手机的简单描述' lay-verify='required'  class='layui-textarea'><?php echo $row[8]?></textarea>
            </div>
        </div>

        <?php
        $pieces16 = explode(",", $row[9]);//主体
        echo " <div class='layui-form-item'><label class='layui-form-label'>品牌</label>
            <div class='layui-input-inline' style='width: 70px;float: left'>
                <input type='text'  name='subject1' value='$pieces16[0]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>型号</label>
            <div class='layui-input-inline' style='width: 75px;float: left'>
                <input type='text'  name='subject2' value='$pieces16[1]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>入网型号</label>
            <div class='layui-input-inline' style='width: 65px;float: left'>
                <input type='text'  name='subject3' value='$pieces16[2]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>上市年份</label>
            <div class='layui-input-inline' style='width: 65px;float: left'>
                <input type='text' id='test2'  name='subject4' value='$pieces16[3]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>上市月份</label>
            <div class='layui-input-inline' style='width: 65px;float: left'>
                <input type='text'  name='subject5' value='$pieces16[4]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div></div>";
        ?>

        <?php
        $pieces17 = explode(",", $row[10]);//基本信息
        echo " <div class='layui-form-item'><label class='layui-form-label'>机身长度(mm)</label>
            <div class='layui-input-inline' style='width: 70px;float: left'>
                <input type='number'  name='information1' value='$pieces17[0]' lay-verify='required'   autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>机身宽度(mm)</label>
            <div class='layui-input-inline' style='width: 75px;float: left'>
                <input type='number'  name='information2' value='$pieces17[1]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>机身厚度(mm)</label>
            <div class='layui-input-inline' style='width: 65px;float: left'>
                <input type='number'  name='information3' value='$pieces17[2]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>机身重量(g)</label>
            <div class='layui-input-inline' style='width: 65px;float: left'>
                <input type='number'  name='information4' value='$pieces17[3]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
           </div>";
        ?>
        <div class='layui-form-item'>
            <label class='layui-form-label'>操作系统</label>
            <div class='layui-input-block'>
                <input type='text' name="system" value="<?php echo $row[11]?>"   lay-verify='required' class='layui-input '>
            </div>
        </div>

        <?php
        $pieces18 = explode(",", $row[12]);//主芯片
        echo " <div class='layui-form-item'><label class='layui-form-label'>CPU品牌</label>
            <div class='layui-input-inline' style='width:250px;float: left'>
                <input type='text'  name='chip1' value='$pieces18[0]' lay-verify='required'   autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>CPU频率</label>
            <div class='layui-input-inline' style='width: 250px;float: left'>
                <input type='text'  name='chip2' value='$pieces18[1]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>CPU核数</label>
            <div class='layui-input-inline' style='width: 250px;float: left'>
                <input type='text'  name='chip3' value='$pieces18[2]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>CPU型号</label>
            <div class='layui-input-inline' style='width: 250px;float: left'>
                <input type='text'  name='chip4' value='$pieces18[3]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
           </div>";
        ?>
        <?php
        $pieces19 = explode(",", $row[13]);//网络支持
        echo " <div class='layui-form-item'><label class='layui-form-label'>双卡  类型</label>
            <div class='layui-input-inline' style='width:250px;float: left'>
                <input type='text'  name='network1' value='$pieces19[0]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>最大支持SIM卡个数</label>
            <div class='layui-input-inline' style='width: 250px;float: left'>
                <input type='number' max='2' min='1' name='network2' value='$pieces19[1]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div></div><div class='layui-form-item'>
            <label class='layui-form-label'>SIM卡类型</label>
            <div class='layui-input-inline' style='width: 200px;float: left'>
                <input type='text'  name='network3' value='$pieces19[2]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>4G网络</label>
            <div class='layui-input-inline' style='width: 300px;float: left'>
                <input type='text'  name='network4' value='$pieces19[3]' lay-verify='required'   autocomplete='off' class='layui-input'>
            </div>
           </div>";
        ?>
        <?php
        $pieces20= explode(",", $row[14]);//屏幕
        echo " <div class='layui-form-item'><label class='layui-form-label'>主屏幕尺寸（英寸）</label>
            <div class='layui-input-inline' style='width:100px;float: left'>
                <input type='number'  name='screen1' value='$pieces20[0]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>分辨率</label>
            <div class='layui-input-inline' style='width: 150px;float: left'>
                <input type='text'  name='screen2' value='$pieces20[1]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>屏幕材质</label>
            <div class='layui-input-inline' style='width: 100px;float: left'>
                <input type='text'  name='screen3' value='$pieces20[2]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>        
           </div>";
        ?>
        <?php
        $pieces21= explode(",", $row[15]);//摄像头
        echo " <div class='layui-form-item'><label class='layui-form-label'>前置光圈大小</label>
            <div class='layui-input-inline' style='width:250px;float: left'>
                <input type='text'  name='camera1' value='$pieces21[1]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>摄像头数量(个)</label>
            <div class='layui-input-inline' style='width: 250px;float: left'>
                <input type='number' max='4' min='1' name='camera2' value='$pieces21[2]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>    
           </div>";
        ?>
        <?php
        $pieces22= explode(",", $row[16]);//电池
        echo " <div class='layui-form-item'><label class='layui-form-label'>电池容量（mAh）</label>
            <div class='layui-input-inline' style='width:150px;float: left'>
                <input type='text'  name='battery1' value='$pieces22[0]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>电池是否可拆卸</label>
            <div class='layui-input-inline' style='width: 100px;float: left'>
                <input type='text'  name='battery2' value='$pieces22[1]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>充电器</label>
            <div class='layui-input-inline' style='width: 100px;float: left'>
                <input type='text'  name='battery3' value='$pieces22[2]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>        
           </div>";
        ?>
        <?php
        $pieces23= explode(",", $row[17]);//手机特性
        echo " <div class='layui-form-item'><label class='layui-form-label'>指纹识别</label>
            <div class='layui-input-inline' style='width:150px;float: left'>
                <input type='text'  name='characteristics1' value='$pieces23[0]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>GPS</label>
            <div class='layui-input-inline' style='width: 100px;float: left'>
                <input type='text'  name='characteristics2' value='$pieces23[1]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>陀螺仪</label>
            <div class='layui-input-inline' style='width: 100px;float: left'>
                <input type='text'  name='characteristics3' value='$pieces23[2]' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>        
           </div>";
        ?>
        <div class='layui-form-item'>
            <label class='layui-form-label'>包装清单</label>
            <div class='layui-input-block'>
                <textarea name="list"  lay-verify='required'  class='layui-textarea'><?php echo $row[18]?></textarea>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>推荐指数</label>
            <div class='layui-input-inline' >
                <input type='number' max="5" min="2" name='recommend' value='<?php echo $row[22]?>' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
        </div>
    </div>
    <div class='user_right' style="width: 45%;">
        <div class='layui-btn' ><a style="color: white" href="phone_table.php">返回商品表</a></div>
    </div>
    <div class='layui-form-item' style='margin-left: 5%;'>
        <div class='layui-input-block'>
            <input type="submit" class='layui-btn' lay-submit='' lay-filter='changeUser' value="立即提交">
            <button type='reset' class='layui-btn layui-btn-primary'>重置</button>
        </div>
    </div>
</form>


<script type='text/javascript' src='../../layui/layui.js'></script>
<script type='text/javascript' src='../user/user.js'></script>
<script>

/*layui.use('laydate', function(){
var laydate = layui.laydate;

//常规用法
laydate.render({
elem: '#test5'
});
});*/
</script>
</body>
</html>