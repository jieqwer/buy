<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include_once("../../opensql.php");

session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "select * from tb_admin where a_username='$username'";
    $xian = $mysqldb->select($sql);
    $row = mysql_fetch_row($xian);
    if ($row[1] == "超级管理员") {
        $id = $_GET['id'];
        $sql = "delete from  tb_order where o_id=$id";
        mysql_query($sql);
        if (mysql_affected_rows() > 0) {
            echo "删除成功";
            $sql2 = "alter table tb_order drop column o_id";
            $sql3 = "alter   table  tb_order add o_id int(11)   auto_increment ,add primary key (o_id)";
            mysql_query($sql2);
            mysql_query($sql3);

            header("refresh:1;url=order_table.php");
        } else {
            echo "删除失败";
            header("refresh:1;url=order_table.php");
        }
    } else {
        echo "您的权限不够，请联系超级管理员";
        header("refresh:1;url=order_table.php");

    }
}else{
    echo '必须登录后才能进入，请先登录';
    header("refresh:1;url=order_table.php");
}


?>

