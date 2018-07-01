<?php
session_start();
include_once("../../opensql.php");
date_default_timezone_set('prc');
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
}else{
    header("location:../../login.php");
    echo '<script type="text/javascript">alert("必须登录后才能进入，请先登录");</script>';
}


$id=$_GET['id'];

$sql="select * from tb_phone where id=$id";
$xian=$mysqldb->select($sql);
$row=mysql_fetch_row($xian);


$pname=$_POST['pname'];
$pname1=$_POST['pname1'];
$pmoney=$_POST['pmoney'];

for($i=0;$i<5;$i++){
    if(!empty($_POST["edition$i"])){
        $arr1[]=$_POST["edition$i"];
    }
}
$phone1= implode(',',$arr1);//版本

$memory="";
foreach( $_POST['memory'] as $i)
{
    $memory.= $i.',';
}
$mem=rtrim($memory, ',');

for($m=0;$m<10;$m++){
    $m1=$m+1;
    if(!empty($_POST["colorname$m"])){
        $arr2[]=$_POST["colorname$m"].','.$_POST["color$m"];
    }
    if(!empty($_POST["parameters$m1"])){
        $arr4[]=$_POST["parameters$m1"];
    }
    if(!empty($_POST["subject$m1"])){
        $arr5[]=$_POST["subject$m1"];
    }
    if(!empty($_POST["information$m1"])){
        $arr6[]=$_POST["information$m1"];
    }
    if(!empty($_POST["chip$m1"])){
        $arr7[]=$_POST["chip$m1"];
    }
    if(!empty($_POST["network$m1"])){
        $arr8[]=$_POST["network$m1"];
    }
    if(!empty($_POST["screen$m1"])){
        $arr9[]=$_POST["screen$m1"];
    }
    if(!empty($_POST["camera$m1"])){
        $arr10[]=$_POST["camera$m1"];
    }
    if(!empty($_POST["battery$m1"])){
        $arr11[]=$_POST["battery$m1"];
    }
    if(!empty($_POST["characteristics$m1"])){
        $arr12[]=$_POST["characteristics$m1"];
    }

}

$phone2= implode(',',$arr2);//颜色名称
$phone4= implode(',',$arr4);//基本参数
$phone5= implode(',',$arr5);//主体
$phone6= implode(',',$arr6);//基本信息
$phone7= implode(',',$arr7);//cup品牌
$phone8= implode(',',$arr8);//网络支持
$phone9= implode(',',$arr9);//屏幕
$phone10= implode(',',$arr10);//摄像头
$phone11= implode(',',$arr11);//电池
$phone12= implode(',',$arr12);//手机特性

$pieces1 = explode(",", $phone4);//基本参数


$phone13=$pieces1[2].','.$phone10.','.$pieces1[1];

$inventory=$_POST['inventory'];//手机存货量
$describe=$_POST['describe'];//手机描述
$system=$_POST['system'];//操作系统
$list=$_POST['list'];//包装清单
$recommend=$_POST['recommend'];//推荐指数
$t= date('Y-m-d H:i:s',time());//发布时间

if(!empty($_GET['id'])){
$sql2="update tb_phone set p_name='$pname',p_brand='$pname1',p_money='$pmoney',p_edition='$phone1',p_memory='$mem',p_color='$phone2',P_inventory='$inventory',p_parameters='$phone4',p_describe='$describe',p_subject='$phone5',p_information='$phone6'
 ,p_system='$system',
 p_chip='$phone7',
p_network='$phone8',
p_screen='$phone9',
p_camera='$phone13',
 p_battery='$phone11',
 p_characteristics='$phone12',
 p_list='$list',
 p_recommend='$recommend',
 p_time='$t'
 where id=$id";
mysql_query($sql2);
echo '修改成功';
header("refresh:1;url=phone_update.php?id=$id");
}else{
    echo '修改失败';
    header("refresh:1;url=phone_update.php?id=$id");
}















?>