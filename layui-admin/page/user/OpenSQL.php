<?php 
class MySQLDB{
	private $host;
	private $port;
	private $user;
	private $pwd;
	private $charset;
	private $dbname;
	private $link;
	private static $instance;  //保存MySQLDB的实例
//初始化连接数据库的参数
private function initParam($config){
	//如果你有就用你自己的，如果没有就等于空
	$this->host=isset($config['host'])?$config['host']:"";
	$this->port=isset($config['port'])?$config['port']:'3306';
	$this->user=isset($config['user'])?$config['user']:'';
	$this->pwd=isset($config['pwd'])?$config['pwd']:'';
	$this->charset=isset($config['charset'])?$config['charset']:'utf8';
	$this->dbname=isset($config['dbname'])?$config['dbname']:"";
}
//链接数据库
private function connect(){
	$this->link=@mysql_connect("{$this->host}:{$this->port}",$this->user,$this->pwd) or die("数据库连接失败");
}
//设置字符编码
private function setCharset(){
	$sql="set names '{$this->charset}'";
	$this->query($sql);
}
//选择数据库
private function selectDB(){
	$sql="use `{$this->dbname}`";
	$this->query($sql);
}
/*此方法用来执行SQL语句
如果是查询语句，成功返回结果集，失败返回false
如果是数据操作语句，成功返回true，失败返回false
*/
public function query($sql){
	if(!$result=mysql_query($sql,$this->link)){
		echo "SQL语句执行失败<br>";
		echo "错误编号：".mysql_errno,'<br>';
		echo "错误信息：".mysql_error,"<br>";
		echo "错误的SQL语句",$sql,"<br>";
		exit;
	}
	return $result;
}
/*
*私有的构造函数防止在类的外部实例化对象
*@param $config array 连接数据库的参数
 */
private function __construct($config){
	$this->initParam($config);
	$this->connect();
	$this->setCharset();
	$this->selectDB();

}
//私有的__clone用来阻止类的外部克隆对象
private function __clone(){

}

/*公有的静态方法泪获取MySQLDB的实例
@return object MySQLDB的实例*/
public static function getInstance($config=array()){
	if(!self::$instance instanceof self)
		self::$instance=new self($config);
	return self::$instance;
}


/*从数据库中获取所有的数据
@param $sql string SQL语句
@param $fetch_type string assoc|row|array
@return array 将表中的数据匹配成二维数组返回*/
public function fetchAll($sql,$fetch_type="assoc"){
	$rs=$this->query($sql);
	$fetch_types=array('assoc','row','array');
	if(!in_array($fetch_type,$fetch_types))
		$fetch_type='assoc';
	$fetch_fun='mysql_fetch_'.$fetch_type;
	$array=array();
	while($rows=$fetch_fun($rs)){
		$array[]=$rows;
	}
	return $array;
}
//获取表中记录的一条记录
public function fetchRow($sql,$fetch_type='assoc'){
	$rs=$this->fetchAll($sql,$fetch_type);
	return empty($rs)?null:$rs[0];
}
//获取记录的第一行第一列
public function  fetchColumn($sql){
	$rs=$this->fetchRow($sql,'row');
	return empty($rs)?null:$rs[0];
}

}
//测试
$config=array(
	'host' => "127.0.0.1",
	'user' => "root",
	'pwd'  => "woainirr@1314.++",
	'dbname'=>"db_phone"
	);
$db=MySQLDB::getInstance($config);
/*$province=$db->fetchAll("select * from hat_province");
$city=$db->fetchAll("select * from hat_city");
$area=$db->fetchAll("select * from hat_area");*/

?>