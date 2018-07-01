<meta charset="utf-8">
<?php
session_start();
include_once("opensql.php");
if(empty($_SESSION['email'])){
    echo '<script type="text/javascript">alert("你还没有登录，请先登录");</script>';
    header('refresh:0;url=login.php');
    die();
}else{
    $email=$_SESSION['email'];//用户
    $sql3="select * from tb_user where u_email='$email'";
    $xian3=$mysqldb->select($sql3);
    $row3=mysql_fetch_array($xian3);
    if(empty($_GET['id'])){
        echo '<script type="text/javascript">alert("添加购物车失败");</script>';
        header('refresh:0;url=single.php');
        die();
    }else{
        $id=$_GET['id'];//手机id
        $color=$_GET['color'];//颜色
    }

    $memory=$_POST['memory'];//内存
    $radio=$_POST['radio'];//版本价格
    $number=$_POST['sub'];//购买数量
    $sql1="select * from tb_memory where m_m1='$memory'";
    $xian1=$mysqldb->select($sql1);
    $row1=mysql_fetch_array($xian1);

    $sql="select * from tb_phone where id=$id";
    $xian=$mysqldb->select($sql);
    $row=mysql_fetch_array($xian);
    $pieces1 = explode(",", $row[19]);
if($radio==600){
    $ban="标准版";
}else if($radio==800){
    $ban="旗舰版";
}else{
    $ban="开发版";
    }
    $s=($row[2]+$radio+$row1[1])*$number;//总价= （基本价格+版本价格+内存价格）*数量
    $u=$row[6]-$number;
    $sql2="insert into tb_cart (c_name,c_img,c_num,c_color,c_memory,c_radio,c_sever,c_money,p_id,u_id) values('$row[0]','$pieces1[0]','$number','$color','$memory','$ban','5','$s','$row[25]','$row3[6]')";
    $result=mysql_query($sql2);
    if(!$result){
        echo '<script>alert("添加购物车失败");</script>';
        header("refresh:0;url=single.php?id=$id");
    }else{
        $sql4="update tb_phone set P_inventory='$u' where id=$id";
        $mysqldb->select($sql4);
        echo '<script>alert("添加购物车成功");</script>';
        header("refresh:0;url=single.php?id=$id");
    }
}
