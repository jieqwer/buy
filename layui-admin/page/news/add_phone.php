
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
    <title>后台管理--添加商品信息</title>
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
<form class='layui-form' action="add_phone_check.php" method="post" enctype="multipart/form-data">
    <div class='user_left'>
        <div class='layui-form-item'>
            <label class='layui-form-label'>手机名称</label>
            <div class='layui-input-block'>
                <input type='text'  lay-verify='required' placeholder='请填写手机名称' name="pname"  class='layui-input '>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>手机品牌</label>
            <div class='layui-input-block'>
                <input type='text' lay-verify='required' placeholder='请填写手机品牌' name="pname1"  class='layui-input '>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>基本价格</label>
            <div class='layui-input-block'>
                <input type='number'  lay-verify='required' placeholder='请填写手机基本价格' name="pmoney"  class='layui-input '>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>手机版本</label>
            <div class='layui-input-inline' style='width: 65px;float: left'>
                <input type='text'  name='edition0'    disabled  placeholder='标准版' autocomplete='off' class='layui-input layui-input layui-disabled'>
                <input type='number'  name='Version0'  lay-verify='required'  placeholder='必填' autocomplete='off' class='layui-input'>
            </div>
            <div class='layui-input-inline' style='width: 65px;float: left'>
                <input type='text'  name='edition1'   disabled placeholder='旗舰版' autocomplete='off' class='layui-input layui-input layui-disabled'>
                <input type='number'  name='Version1'  lay-verify='required'  placeholder='必填' autocomplete='off' class='layui-input'>
            </div>
            <div class='layui-input-inline' style='width: 65px;float: left'>
                <input type='text'  name='edition2'    placeholder='开发版' disabled autocomplete='off' class='layui-input layui-input layui-disabled'>
                <input type='number'  name='Version2'    placeholder='选填' autocomplete='off' class='layui-input'>
            </div>
            <div class='layui-input-inline' style='width: 65px;float: left'>
                <input type='text'  name='edition3'    placeholder='探索版' disabled autocomplete='off' class='layui-input layui-input layui-disabled'>
                <input type='number'  name='Version3'   placeholder='选填' autocomplete='off' class='layui-input'>
            </div>

        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>手机内存</label>
            <div class='layui-input-block'>
                <input type='checkbox' name='memory[4+64G]' value="4+64G" title='4+64G'>
                <input type='checkbox' name='memory[4+128G]' title='4+128G' value="4+128G">
                <input type='checkbox' name='memory[6+64G]' title='6+64G' VALUE="6+64G" >
                <input type='checkbox' name='memory[6+128G]' title='6+128G' VALUE="6+128G">
                <input type='checkbox' name='memory[8+64G]' title='8+64G' VALUE="8+64G">
                <input type='checkbox' name='memory[8+128G]' title='8+128G' value="8+128G">
            </div>
        </div>
        <div class='layui-form-item'><label class='layui-form-label'>手机颜色</label>
            <div class='layui-input-inline' style='width: 80px;float: left'>
                <input type='text'  name='colorname0' lay-verify='required' placeholder='名称(必填)' class='layui-input'>
                <input type='color'  name='color0'   class='layui-input'>
            </div>
            <div class='layui-input-inline' style='width: 80px;float: left'>
                <input type='text'  name='colorname1' lay-verify='required' placeholder='名称(必填)' class='layui-input'>
                <input type='color'  name='color1'   class='layui-input'>
            </div>
            <div class='layui-input-inline' style='width: 80px;float: left'>
                <input type='text'  name='colorname2'  placeholder='名称(选填)' class='layui-input'>
                <input type='color'  name='color2'   class='layui-input'>
            </div>
            <div class='layui-input-inline' style='width: 80px;float: left'>
                <input type='text'  name='colorname3'  placeholder='名称(选填)' class='layui-input'>
                <input type='color'  name='color3'   class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>手机存货量</label>
            <div class='layui-input-block'>
                <input type='number' name="inventory" value="100"  placeholder='请填写手机库存量' lay-verify='required' class='layui-input '>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>分辨率</label>
            <div class='layui-input-inline' style='width: 230px;float: left'>
                <input type='text'  name='parameters1'  lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>后置摄像头(万像素)</label>
            <div class='layui-input-inline' style='width: 230px;float: left'>
                <input type='number'  name='parameters2'  lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>前置摄像头(万像素）</label>
            <div class='layui-input-inline' style='width: 230px;float: left'>
                <input type='number'  name='parameters3'  lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>商品毛重(g)</label>
            <div class='layui-input-inline' style='width: 230px;float: left'>
                <input type='number'  name='parameters4'  lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
        </div>

        <div class='layui-form-item'>
            <label class='layui-form-label'>描述</label>
            <div class='layui-input-block'>
                <textarea name="describe" placeholder='对手机的简单描述' lay-verify='required'  class='layui-textarea'></textarea>
            </div>
        </div>

        <div class='layui-form-item'>
            <label class='layui-form-label'>品牌</label>
            <div class='layui-input-inline' style='width: 70px;float: left'>
                <input type='text'  name='subject1'   lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>型号</label>
            <div class='layui-input-inline' style='width: 75px;float: left'>
                <input type='text'  name='subject2' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>入网型号</label>
            <div class='layui-input-inline' style='width: 65px;float: left'>
                <input type='text'  name='subject3'  lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>上市年份</label>
            <div class='layui-input-inline' style='width: 65px;float: left'>
                <input type='text' id='test5'  name='subject4'  lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>上市月份</label>
            <div class='layui-input-inline' style='width: 65px;margin-top:10px;float: left'>
                <input type='text'  name='subject5'  lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
        </div>

        <div class='layui-form-item'>
            <label class='layui-form-label'>机身长度(mm)</label>
            <div class='layui-input-inline' style='width: 70px;float: left'>
                <input type='number'  name='information1'  lay-verify='required'   autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>机身宽度(mm)</label>
            <div class='layui-input-inline' style='width: 75px;float: left'>
                <input type='number'  name='information2' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>机身厚度(mm)</label>
            <div class='layui-input-inline' style='width: 65px;float: left'>
                <input type='number'  name='information3'  lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>机身重量(g)</label>
            <div class='layui-input-inline' style='width: 65px;float: left'>
                <input type='number'  name='information4'  lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>操作系统</label>
            <div class='layui-input-block'>
                <input type='text' name="system"  lay-verify='required' class='layui-input '>
            </div
        </div>

        <div class='layui-form-item'>
            <label class='layui-form-label'>CPU品牌</label>
            <div class='layui-input-inline' style='width:250px;float: left'>
                <input type='text'  name='chip1' value='以官网信息为准' lay-verify='required'   autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>CPU频率</label>
            <div class='layui-input-inline' style='width: 250px;float: left'>
                <input type='text'  name='chip2' value='以官网信息为准' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>CPU核数</label>
            <div class='layui-input-inline' style='width: 250px;float: left'>
                <input type='text'  name='chip3' value='以官网信息为准' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>CPU型号</label>
            <div class='layui-input-inline' style='width: 250px;float: left'>
                <input type='text'  name='chip4' value='以官网信息为准' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>双卡  类型</label>
            <div class='layui-input-inline' style='width:250px;float: left'>
                <input type='text'  name='network1' value='单卡' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>最大支持SIM卡个数</label>
            <div class='layui-input-inline' style='width: 250px;float: left'>
                <input type='number' max='2' min='1' name='network2' value='1' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div></div><div class='layui-form-item'>
            <label class='layui-form-label'>SIM卡类型</label>
            <div class='layui-input-inline' style='width: 200px;float: left'>
                <input type='text'  name='network3' value='Nano SIM' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>4G网络</label>
            <div class='layui-input-inline' style='width: 300px;float: left'>
                <input type='text'  name='network4' value='4G：移动（TD-LTE)；4G：联通(TD-LTE)；4G：电信(TD-LTE)' lay-verify='required'   autocomplete='off' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>主屏幕尺寸（英寸）</label>
            <div class='layui-input-inline' style='width:100px;float: left'>
                <input type='number'  name='screen1'  lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>分辨率</label>
            <div class='layui-input-inline' style='width: 150px;float: left'>
                <input type='text'  name='screen2'  lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>屏幕材质</label>
            <div class='layui-input-inline' style='width: 100px;float: left'>
                <input type='text'  name='screen3' value='其它' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>前置光圈大小</label>
            <div class='layui-input-inline' style='width:250px;float: left'>
                <input type='text'  name='camera1' value='f/2.2' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>摄像头数量(个)</label>
            <div class='layui-input-inline' style='width: 250px;float: left'>
                <input type='number' max='4' min='1' name='camera2' value='2' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>电池容量（mAh）</label>
            <div class='layui-input-inline' style='width:150px;float: left'>
                <input type='text'  name='battery1'  lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>电池是否可拆卸</label>
            <div class='layui-input-inline' style='width: 100px;float: left'>
                <input type='text'  name='battery2' value='否' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>充电器</label>
            <div class='layui-input-inline' style='width: 100px;float: left'>
                <input type='text'  name='battery3' value='以官网信息为准' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>指纹识别</label>
            <div class='layui-input-inline' style='width:150px;float: left'>
                <input type='text'  name='characteristics1' value='支持' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>GPS</label>
            <div class='layui-input-inline' style='width: 100px;float: left'>
                <input type='text'  name='characteristics2' value='支持' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
            <label class='layui-form-label'>陀螺仪</label>
            <div class='layui-input-inline' style='width: 100px;float: left'>
                <input type='text'  name='characteristics3' value='支持' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>包装清单</label>
            <div class='layui-input-block'>
                <textarea name="list"  lay-verify='required'  class='layui-textarea'></textarea>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>推荐指数</label>
            <div class='layui-input-inline' >
                <input type='number' max="5" min="2" name='recommend' value='3' lay-verify='required'  autocomplete='off' class='layui-input'>
            </div>
        </div>
    </div>
    </div>

    <div class='user_right' style="width: 45%;float: left">
        <div class='layui-btn' style="margin-left: -640px;" ><a style="color: white;" href="phone_table.php">返回商品表</a></div>
        <div class='layui-form-item' style="margin-top: 20px;">
            <label class='layui-form-label'>正面图</label>
            <div class='layui-input-inline' style='width:500px;float: left;'>
                <input type='file' class='layui-btn' style='line-height: 40px'  name='picture1'  lay-verify='required'   autocomplete='off' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>侧面图</label>
            <div class='layui-input-inline' style='width:500px;float: left;'>
                <input type='file' class='layui-btn' style='line-height: 40px'  name='picture2'  lay-verify='required'   autocomplete='off' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>背面图</label>
            <div class='layui-input-inline' style='width:500px;float: left;'>
                <input type='file' class='layui-btn' style='line-height: 40px'  name='picture3' lay-verify='required'   autocomplete='off' class='layui-input'>
            </div>
        </div>

        <div class='layui-form-item'>
            <label class='layui-form-label'>其它图</label>
            <div class='layui-input-inline' style='width:500px;float: left;'>
                <input type='file' class='layui-btn' style='line-height: 40px'  name='pictures' lay-verify='required'   autocomplete='off' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>第 1 张图</label>
            <div class='layui-input-inline' style='width:500px;float: left;'>
                <input type='file' class='layui-btn' style='line-height: 40px'  name='exhibition1'   lay-verify='required'   autocomplete='off' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label' style='line-height: 60px'>宣传词</label>
            <div class='layui-input-inline' style='width:500px;float: left;margin-top: 20px;'>
                <input type='text'  style='line-height: 40px'  name='say0' placeholder="可不填"   autocomplete='off' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>第 2 张图</label>
            <div class='layui-input-inline' style='width:500px;float: left;'>
                <input type='file' class='layui-btn' style='line-height: 40px'  name='exhibition2'  lay-verify='required'   autocomplete='off' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label' style='line-height: 60px'>宣传词</label>
            <div class='layui-input-inline' style='width:500px;float: left;margin-top: 20px;'>
                <input type='text'  style='line-height: 40px'  name='say1'   placeholder="可不填"    autocomplete='off' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>第 3 张图</label>
            <div class='layui-input-inline' style='width:500px;float: left;'>
                <input type='file' class='layui-btn' style='line-height: 40px'  name='exhibition3'  lay-verify='required'   autocomplete='off' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label' style='line-height: 60px'>宣传词</label>
            <div class='layui-input-inline' style='width:500px;float: left;margin-top: 20px;'>
                <input type='text'  style='line-height: 40px'  name='say2'  placeholder="可不填"    autocomplete='off' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label'>第 4 张图</label>
            <div class='layui-input-inline' style='width:500px;float: left;'>
                <input type='file' class='layui-btn' style='line-height: 40px'  name='exhibition4'  lay-verify='required'   autocomplete='off' class='layui-input'>
            </div>
        </div>
        <div class='layui-form-item'>
            <label class='layui-form-label' style='line-height: 60px'>宣传词</label>
            <div class='layui-input-inline' style='width:500px;float: left;margin-top: 20px;'>
                <input type='text'  style='line-height: 40px'  name='say3'  placeholder="可不填"    autocomplete='off' class='layui-input'>
            </div>
        </div>
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

</body>
</html>