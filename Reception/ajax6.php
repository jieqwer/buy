<?php

header('Content-Type:text/html; charset=UTF-8');
include_once("opensql.php");

$price=$_POST['price'];
$phone=$_POST['phone'];
$pieces1 = explode(",", $price);
$num_rec_per_page=6;   // 每页显示数量
if(empty($_POST['page'])){
    $page=1;
}else{
    $page=$_POST['page'];
}
$start_from =($page-1)*$num_rec_per_page;
if($pieces1[0]=='所有价位'&&$phone=='全部机型'){
    $sql="select * from tb_phone limit $start_from, $num_rec_per_page";
    $xian=$mysqldb->select($sql);
    $sql2 = "select * from tb_phone";//查询数据库
    $rs_result2 = mysql_query($sql2); //查询数据
    $total_records2 = mysql_num_rows($rs_result2);  // 统计总共的记录返回条数
    $total_pages = ceil($total_records2 / $num_rec_per_page);  // 计算总页数=总共的记录条数/每页显示数量
    while ($info=mysql_fetch_array($xian)) {
        $arr[]=$info;
    }
    echo json_encode([$arr,$total_pages,$page]);
}else if($pieces1[0]=='所有价位'&&$phone!='全部机型'){
    $sql="select * from tb_phone where p_brand='$phone'  limit $start_from, $num_rec_per_page";
    $xian=$mysqldb->select($sql);
    $sql2 = "select * from tb_phone where p_brand='$phone'";//查询数据库
    $rs_result2 = mysql_query($sql2); //查询数据
    $total_records2 = mysql_num_rows($rs_result2);  // 统计总共的记录返回条数
    $total_pages = ceil($total_records2 / $num_rec_per_page);  // 计算总页数=总共的记录条数/每页显示数量
    while ($info=mysql_fetch_array($xian)) {
        $arr[]=$info;
    }
    echo json_encode([$arr,$total_pages,$page]);

}else if($pieces1[0]!='所有价位'&&$phone=='全部机型'){
    $sql="select * from tb_phone where  p_money  between '$pieces1[0]'  and  '$pieces1[1]'  limit $start_from, $num_rec_per_page";
    $xian=$mysqldb->select($sql);
    $sql2 = "select * from tb_phone where  p_money  between '$pieces1[0]'  and  '$pieces1[1]'";//查询数据库
    $rs_result2 = mysql_query($sql2); //查询数据
    $total_records2 = mysql_num_rows($rs_result2);  // 统计总共的记录返回条数
    $total_pages = ceil($total_records2 / $num_rec_per_page);  // 计算总页数=总共的记录条数/每页显示数量
    while ($info=mysql_fetch_array($xian)) {
        $arr[]=$info;
    }
    echo json_encode([$arr,$total_pages,$page]);
}else{
    $sql="select * from tb_phone where p_brand='$phone' and p_money  between '$pieces1[0]'  and  '$pieces1[1]'  limit $start_from, $num_rec_per_page";
    $xian=$mysqldb->select($sql);
    $sql2 = "select * from tb_phone where p_brand='$phone' and p_money  between '$pieces1[0]'  and  '$pieces1[1]'";//查询数据库
    $rs_result2 = mysql_query($sql2); //查询数据
    $total_records2 = mysql_num_rows($rs_result2);  // 统计总共的记录返回条数
    $total_pages = ceil($total_records2 / $num_rec_per_page);  // 计算总页数=总共的记录条数/每页显示数量
    while ($info=mysql_fetch_array($xian)) {
        $arr[]=$info;
    }
    echo json_encode([$arr,$total_pages,$page]);
}



