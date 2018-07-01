<meta charset="utf-8">
<?php
include_once("opensql.php");
session_start();
$user=$_SESSION['email'];

$id=$_GET['id'];
$sql="update tb_address set a_strat='1' where a_id='$id'";
$mysqldb->select($sql);

$sql1="update tb_address set a_strat='0' where a_id not in($id)";
$mysqldb->select($sql1);
echo '<script type="text/javascript">alert("已将该地址设为默认地址");</script>';
header('refresh:0;url=mess.php');