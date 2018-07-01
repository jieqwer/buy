<?php
header('Content-Type:text/html; charset=UTF-8');
include_once("opensql.php");
date_default_timezone_set('prc');
session_start();
$email=$_SESSION['email'];//当前用户


if(empty($_POST['id'])){
    echo json_encode(["你没有选择手机"]);
}else{
    $id=$_POST['id'];//购物车id
    //验证收件人

    if(empty($_POST['name'])||empty($_POST['tel'])||empty($_POST['address'])){
        echo json_encode(["您的收获地址不完整，请先完善我的资料"]);
    }else if(!preg_match("/^[{4e00}-\x{9fa5}]+$/u",$_POST['name'])||!preg_match("/^1[34578]\d{9}$/",$_POST['tel'])) {
            echo json_encode(["您的地址格式有误，请检查"]);
    }else{
        $name=$_POST['name'];//收件人姓名
        $tel=$_POST['tel'];//收件人电话
        $address=$_POST['address'];//收件人地址
        $pieces1 = explode(",", $id);//将购物车id转化为数组
        $n=count($pieces1);

        $sql="select * from tb_cart where c_id in ($id) ";//查询对应购物车id的相关信息
        $xian=$mysqldb->select($sql);

        $sql2="select sum(c_money) from tb_cart where c_id in ($id) ";
        $xian2=$mysqldb->select($sql2);
        $row=mysql_fetch_array($xian2);

        while ($info=mysql_fetch_array($xian)) {
            $arr[]=$info;
        }
        for($i=0;$i<$n;$i++){
            $array1[]=$arr[$i][0];//手机名称
            $array2[]=$arr[$i][2];//手机数量
            $array3[]=$arr[$i][3];//手机颜色
            $array4[]=$arr[$i][5];//手机版本
            $array5[]=$arr[$i][4];//手机内存
            $array6[]=$arr[$i][8];//手机id
        }
        $array7[]=$arr[0][9];//用户id
        $order1= implode(',',$array1);
        $order2= implode(',',$array2);
        $order3= implode(',',$array3);
        $order4= implode(',',$array4);
        $order5= implode(',',$array5);
        $order6= implode(',',$array6);
        $order8= implode(',',$array7);
        $sever=$n*5;
        $t= date('Y-m-d H:i:s',time());
        $order7= implode(',',$row)+$sever;

        $sql3="insert into tb_order (o_name,o_num,o_color,o_ban,o_neicun,o_sever,o_dizhi,o_time,o_money,o_sname,o_tel,p_id,u_email) values ('$order1','$order2','$order3','$order4','$order5','$sever','$address','$t','$order7','$name','$tel','$order6','$order8')";
        $result=mysql_query($sql3);
        if(!$result){
            echo json_encode(["购买失败"]);
        }else{
            echo json_encode(["购买成功，可在我的订单中查看订单信息"]);
        }

    }

 }






