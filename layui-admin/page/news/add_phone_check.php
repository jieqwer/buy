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

$pname=$_POST['pname'];
$pname1=$_POST['pname1'];
$pmoney=$_POST['pmoney'];

$memory="";
foreach( $_POST['memory'] as $i)
{
    $memory.= $i.',';
}
$mem=rtrim($memory, ',');

for($m=0;$m<10;$m++){
    $m1=$m+1;

    if(!empty($_POST["Version$m"])){
        $arr1[]=$_POST["Version$m"];
    }

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

for($s=0;$s<4;$s++){
    if(empty($_POST["say$s"])){
        $arr14[]=' ';
    }else{
        $arr14[]=$_POST["say$s"];
    }
}


$phone1= implode(',',$arr1);//版本价格
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
 $phone14= implode(',',$arr14);//手机宣传词

$pieces1 = explode(",", $phone4);//基本参数


$phone13=$pieces1[2].','.$phone10.','.$pieces1[1]; //摄像头

$inventory=$_POST['inventory'];//手机存货量
$describe=$_POST['describe'];//手机描述
$system=$_POST['system'];//操作系统
$list=$_POST['list'];//包装清单
$recommend=$_POST['recommend'];//推荐指数
$t= date('Y-m-d H:i:s',time());//发布时间


for($y=1;$y<4;$y++){
    if(empty($_FILES["picture$y"]['name'])){
        header("refresh:1;url=add_phone.php");
    }else{
        $img=$_FILES["picture$y"]['name'];
        $type = strtolower(substr($img,strrpos($img,'.')+1)); //得到文件类型，并且都转化成小写
        $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
//判断文件类型是否被允许上传
        if(!in_array($type, $allow_type)){
            echo '不允许上传该类文件或你的文件为空';
            header("refresh:1;url=add_phone.php");
        }else{
            $imgname= uniqid();
            $s=$imgname.'.png';
            $tmp = $_FILES["picture$y"]['tmp_name'];
            $filepath = '../../../Reception/images/';
            if(move_uploaded_file($tmp,$filepath.$imgname.".png")){
                $arr15[]=$s;
            }else{
                echo '上传失败';
                header("refresh:1;url=add_phone.php");

            }
        }
    }

}


if(empty($_FILES["pictures"]['name'])){
    echo '没有上传其他图';
    header("refresh:1;url=add_phone.php");
} else{
    $img=$_FILES["pictures"]['name'];
    $type = strtolower(substr($img,strrpos($img,'.')+1)); //得到文件类型，并且都转化成小写
    $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
//判断文件类型是否被允许上传
    if(!in_array($type, $allow_type)){
        echo '不允许上传该类文件或你的文件为空';
        header("refresh:1;url=add_phone.php");
    }else{
        $imgname= uniqid();
        $s1=$imgname.'.png';
        $tmp = $_FILES["pictures"]['tmp_name'];
        $filepath = '../../../Reception/images/';
        if(move_uploaded_file($tmp,$filepath.$imgname.".png")){
            $phone16=$s1;
        }else{
            echo '上传失败';
            header("refresh:1;url=add_phone.php");

        }
    }
}

for($z=1;$z<5;$z++){
    if(empty($_FILES["exhibition$z"]['name'])){
        header("refresh:1;url=add_phone.php");
    }else{
        $img=$_FILES["exhibition$z"]['name'];
        $type = strtolower(substr($img,strrpos($img,'.')+1)); //得到文件类型，并且都转化成小写
        $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
//判断文件类型是否被允许上传
        if(!in_array($type, $allow_type)){
            echo '不允许上传该类文件或你的文件为空';
            header("refresh:1;url=add_phone.php");
        }else{
            $imgname= uniqid();
            $s2=$imgname.'.png';
            $tmp = $_FILES["exhibition$z"]['tmp_name'];
            $filepath = '../../../Reception/images/';
            if(move_uploaded_file($tmp,$filepath.$imgname.".png")){
                $arr17[]=$s2;
            }else{
                echo '上传失败';
                header("refresh:1;url=add_phone.php");
            }
        }
    }

}

if(empty($_FILES["picture1"]['name'])||empty($_FILES["picture2"]['name'])||empty($_FILES["picture3"]['name'])||empty($_FILES["pictures"]['name'])||empty($_FILES["exhibition1"]['name'])||empty($_FILES["exhibition2"]['name'])||empty($_FILES["exhibition3"]['name'])||empty($_FILES["exhibition4"]['name'])){

    if(count($arr15)<3||count($arr17)<4){
        for($sc=0;$sc<count($arr15);$sc++){
            unlink("../../../Reception/images/$arr15[$sc]");
        }
        for($sc1=0;$sc1<count($arr17);$sc1++){
            unlink("../../../Reception/images/$arr17[$sc1]");
        }
        if(!empty($_FILES["pictures"]['name'])){
            unlink("../../../Reception/images/$phone16");
        }
    }
    echo "图片添加不完整";
    header("refresh:1;url=add_phone.php");
}else{
    $phone15= implode(',',$arr15);//三视图
    $phone17= implode(',',$arr17);//展示图

    $sql="insert into tb_phone (p_name,p_brand,p_money,p_edition,p_memory,p_color,P_inventory,p_parameters,p_describe,p_subject,p_information ,p_system,p_chip,p_network,p_screen,p_camera,p_battery,p_characteristics,p_list,p_picture,p_pictures,p_exhibition,p_recommend,p_time,p_xu)
 values ('$pname','$pname1','$pmoney','$phone1','$mem','$phone2','$inventory','$phone4','$describe','$phone5','$phone6','$system','$phone7','$phone8','$phone9','$phone13','$phone11','$phone12','$list','$phone15','$phone16','$phone17','$recommend','$t','$phone14')";
     $result=mysql_query($sql);
     if(!$result){
         echo   "添加商品失败";
         header("refresh:1;url=add_phone.php");
     }else{
         echo "添加商品成功";
         header("refresh:1;url=add_phone.php");
     }

}

