<?php
header('content-type:text/html;charset=utf-8');

class MYSQLDB implements I_DAO{
	private $host;
	private $port;
	private $user;
	private $pass;
	private $charset;
	private $dbname;
	private $link;
	private static $instance;
	
	public function __construct($arr){
		$this->init($arr);
		$this->my_connect();
		$this->my_charset();
		$this->my_dbname();
	}
	private function init($arr){
		$this->host=isset($arr['host']) ? $arr['host']:'127.0.0.1';
		$this->port=isset($arr['port']) ? $arr['port']:'3306';
		$this->user=isset($arr['user']) ? $arr['user']:'root';
		$this->pass=isset($arr['pass']) ? $arr['pass']:'';
		$this->charset=isset($arr['charset']) ? $arr['charset']:'utf8';
		$this->dbname=isset($arr['dbname']) ? $arr['dbname']:'';
	}
	private function my_connect(){
		if($link=@mysql_connect("$this->host:$this->port",$this->user,$this->pass)){
			$this->link=$link;
		}
		else{
			echo "数据库连接失败！<br>";
			echo "错误编号：",mysql_errno(),"<br>";
			echo "错误信息：",mysql_error(),"<br>";
			return false;
		}
	}
	public function my_query($sql){
		$result=mysql_query($sql);
		if(!$result){
			echo "SQL语句执行失败！<br>";
			echo "错误编号：",mysql_errno(),"<br>";
			echo "错误信息：",mysql_error(),"<br>";
			return false;
		}
		return $result;
	}
	private function my_charset(){
		$sql="set names $this->charset";
		$this->my_query($sql);
	}
	private function my_dbname(){
		$sql="use $this->dbname";
		$this->my_query($sql);
	}
	public function __destruct(){
		mysql_close($this->link);
	}
	public function __sleep(){
		return array('host','port','user','pass','charset','daname');
	}
	public function __wakeup(){
		$this->my_connect();
		$this->my_charset();
		$this->my_dbname();
	}
	public function fetchAll($sql){
		if($result=$this->my_query($sql)){
			$rows=array();
			while($row=mysql_fetch_assoc($result)){
				$rows[]=$row;
			}
			mysql_free_result($result);
			return $rows;
		}else{
			return false;
		}
	}
	public function fetchRow($sql){
		if($result=$this->my_query($sql)){
			$row=mysql_fetch_assoc($result);
			mysql_free_result($result);
			return $row;
		}else{
			return false;
		}
	}
	public function fetchColumn($sql){
		if($result=$this->my_query($sql)){
			$row=mysql_fetch_row($result);
			mysql_free_result($result);
			return isset($row[0])?$row[0]:false;
		}else{
			return false;
		}
	}
	public static function getInstance($arr){
		if(!self::$instance instanceof self){
			self::$instance=new self($arr);
		}
		return self::$instance;
	}
	
	
	
	
}

/*$arr=array(
	'pass'=>'root',
	'dbname'=>'test'
);

$db=new MYSQLDB($arr);
echo '<pre>';
var_dump($db);*/

?>