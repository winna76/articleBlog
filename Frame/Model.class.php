<?php
header("content-type:text/html;charset=utf-8");
//基础模型类
class Model{
	protected $dao;  //定义用来存储dao对象的属性，要求可以在子类中被访问
	
	public function __construct(){  //构造方法
		$this->initDAo();  //初始化dao
	}
	public function initDAo(){
		//include 'MYSQLDB.class.php';  //加载mysqlDB类  //易错相对位置
		/*$config=array(  //初始化dao
			'pass'=>'root',
			'dbname'=>'xscj',
		);*/
		$config=$GLOBALS['conf']['db'];
		//根据配置文件，选择相应的数据库文件
		switch($GLOBALS['conf']['App']['dao']){
			case 'mysql' : $dao_class='MYSQLDB';break;
			case 'pdo'   : $dao_class='PDODB';break;
		}
		$this->dao=$dao_class::getInstance($config);
	}
}





?>
