<?php
header("content-type:text/html;charset=utf-8");

//引入项目初始化框架类

include './Frame/Frame.class.php';
//调用run方法
Frame::run();
//自动加载类文件
/*
function autoload($class_name){
	//先把已确定的核心类放到一个数组里面
	$frame_class_list=array(
		//类名=>类文件地址
		'Controller'=>FRAME_DIR.'Controller.class.php',
		'Model'     =>FRAME_DIR.'/Model.class.php',
		'Factory'   =>FRAME_DIR.'/Factory.class.php',
		'MYSQLDB'   =>FRAME_DIR.'/MYSQLDB.class.php',
	);
	//判断是否为核心类
	if(isset($frame_class_list[$class_name])){
		//说明是核心类
		include $frame_class_list[$class_name];
	}
	//判断是否是控制器类，截取后10个字符进行匹配
	elseif(substr($class_name,-10)=='Controller'){
		//说明是控制器类，应该在当前平台的Controller目录下进行加载
		include CURRENT_CON_DIR.$class_name.'.class.php';
	}
	//判断是否为模型类，截取后5个字符进行匹配
	elseif(substr($class_name,-5)=='Model'){
		//说明是模型类，应该在当前平台的Model目录下进行加载
		include CURRENT_MODEL_DIR.$class_name.'.class.php';
	}
}

//注册自动加载函数
spl_autoload_register('autoload');

//定义基础目录常量
define('ROOT_DIR',str_replace('\\','/',getCWD()).'/');  //根目录
define('APP_DIR',ROOT_DIR.'APP/');  //应用程序目录
define('FRAME_DIR',ROOT_DIR.'Frame/');  //框架目录

//确定分发参数p（平台）
$default_platform='Test'; //暂时用test
define('PLATFORM',isset($_GET['p'])?$_GET['p']:$default_platform);

//确定分发参数c（控制器）
$default_controller='Stu';//暂时为stu //$c=isset($_GET['c'])?$_GET['c']:$default_controller;
define('CONTROLLER',isset($_GET['c'])?$_GET['c']:$default_controller);//使用常量保存控制器名字

//确定分发参数a（控制器）
$default_action='list';  //$a=isset($_GET['a'])?$_GET['a']:$default_action;
define('ACTION',isset($_GET['a'])?$_GET['a']:$default_action);  //使用常量保存方法的名字

//定义当前平台下的相关目录常量
define('CURRENT_CON_DIR',APP_DIR.PLATFORM.'/Controller/');
define('CURRENT_MODEL_DIR',APP_DIR.PLATFORM.'/Model/');
define('CURRENT_VIEW_DIR',APP_DIR.PLATFORM.'/View/');

//确定控制器类的名字
//$controller_name=$c.'Controller';
$controller_name=CONTROLLER.'controller';
//载入当前所需要的控制器类
include './App/'.PLATFORM.'/Controller/'.$controller_name.'.class.php';
//实例化控制器类
$controller=new $controller_name;//可变类

//先拼凑出当前方法的名字
//$action_name=$a.'Action';
$action_name=ACTION.'Action';

//调用方法
$controller->$action_name();//可变方法


//实例化stucontroller控制器类
//include './StuController.class.php';
//$controller=new StuController;
//调用方法
//$controller->listAction();
*/
?>




