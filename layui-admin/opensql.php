<?php
class Mysql{
    private $server;//服务器地址
    private $user;//用户名
    private $pwd;//密码
    private $dbname;//数据库名
    const CODE="utf8";//字符编码
    private $link;//链接标识

    public function __construct($server,$user,$pwd,$dbname){//创建构造函数，传入行参
        $this->server=$server;//为行参赋值，服务器地址
        $this->user=$user;//用户名
        $this->pwd=$pwd;//密码
        $this->dbname=$dbname;//数据库名
        $this->connection();//调用connection()方法
    }

    private function connection(){//创建链接数据库的方法
        $this->link=mysql_connect($this->server,$this->user,$this->pwd,$this->dbname) or die(mysql_errno());//链接服务器
        $this->link=mysql_select_db($this->dbname) or die(mysql_errno);//链接数据库
        mysql_query("set names ".self::CODE);//设置字符编码

    }
    public function select($sql){//创建链接数据表方法
        $result=mysql_query($sql);//返回结果集
   /*     while ($info=mysql_fetch_array($result)) {//
            $arr[]=$info;// 遍历结果集转化为数组
        }*/
        return $result;//返回值
    }


}

$server='127.0.0.1';
$user='root';
$pwd="woainirr@1314.++";
$dbname='db_phone';
$mysqldb=new Mysql($server,$user,$pwd,$dbname);

?>