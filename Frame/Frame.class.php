<?php


//初始框架类

class Frame{
	
	//项目入口方法
	
	public static function run(){
		//定义基础目录常量
		static::initConst();
		//初始化配置
		static::initConfig();
		//确定分发参数
		static::initDispatchParam();
		//定义当前平台相关的目录常量
		static::initPlatformConst();
		//注册自动加载方法
		static::initAutoload();
		//请求分发
		static::initDispatch();
	}
	
	//定义基础目录常量
	
	private static function initConst(){
		define('ROOT_DIR',str_replace('\\','/',getCWD()).'/');  //根目录
		define('APP_DIR',ROOT_DIR.'APP/');  //应用程序目录
		define('FRAME_DIR',ROOT_DIR.'Frame/');  //框架目录
		define('CONFIG_DIR',APP_DIR.'Config/'); //配置文件目录
		define('DAO_DIR',FRAME_DIR.'dao/');  //dao层目录
		define('VENDOR_DIR',ROOT_DIR.'Vendor/'); //插件目录
		define('SMARTY_DIR',VENDOR_DIR.'Smarty/'); //Smarty目录
		define('PUBLIC_DIR',ROOT_DIR.'Public/');//Public公开目录
	}
	
	//初始化配置
	
	private static function initConfig(){
		//将配置文件存储到超全局变量中以便整个项目都可以使用
		$GLOBALS['conf']=include CONFIG_DIR.'conf.php';
	}
	
	//确定分发参数
	
	private static function initDispatchParam(){
		//确定分发参数p（平台）
		$default_platform=$GLOBALS['conf']['App']['default_platform'];
		define('PLATFORM',isset($_GET['p'])?$_GET['p']:$default_platform);
		//确定分发参数c（控制器）
		$default_controller=$GLOBALS['conf'][PLATFORM]['default_controller'];
		define('CONTROLLER',isset($_GET['c'])?$_GET['c']:$default_controller);//使用常量保存控制器名字
		//确定分发参数a（控制器）
		$default_action=$GLOBALS['conf'][PLATFORM]['default_action'];
		define('ACTION',isset($_GET['a'])?$_GET['a']:$default_action);  //使用常量保存方法的名字
	}
	
	//定义当前平台相关的目录常量
	
	private static function initPlatformConst(){
		define('CURRENT_CON_DIR',APP_DIR.PLATFORM.'/Controller/');
		define('CURRENT_MODEL_DIR',APP_DIR.PLATFORM.'/Model/');
		define('CURRENT_VIEW_DIR',APP_DIR.PLATFORM.'/View/');
		//以下三个只能用相对路径
		define('CSS_DIR','/Public/'.PLATFORM.'/css');
		define('JS_DIR','/Public/'.PLATFORM.'/js');
		define('IMAGES_DIR','/Public/'.PLATFORM.'/images');
	}
	
	//实现类文件的加载方法
	
	public static function autoload($class_name){
		//先把已确定的核心类放到一个数组里面
		$frame_class_list=array(
			//类名=>类文件地址
			'Controller'=>FRAME_DIR.'Controller.class.php',
			'Model'     =>FRAME_DIR.'/Model.class.php',
			'Factory'   =>FRAME_DIR.'/Factory.class.php',
			'MYSQLDB'   =>DAO_DIR.'/MYSQLDB.class.php',
			'PDODB'     =>DAO_DIR.'PDODB.class.php',
			'I_DAO'     =>DAO_DIR.'I_DAO.interface.php',
			'Smarty'    =>SMARTY_DIR.'Smarty.class.php',
			'Captcha'   =>VENDOR_DIR.'Captcha.class.php',
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
	
	//注册自动加载方法
	
	private static function initAutoload(){
		spl_autoload_register(array(__CLASS__,'autoload'));
	}
	
	//请求分发
	
	private static function initDispatch(){
		//确定控制器类的名字//载入当前所需要的控制器类//include './App/'.PLATFORM.'/Controller/'.$controller_name.'.class.php';
		$controller_name=CONTROLLER.'Controller';
		//实例化控制器类
        $controller=new $controller_name;//可变类
		//先拼凑出当前方法的名字
		$action_name=ACTION.'Action';
		//调用方法
		$controller->$action_name();//可变方法
	}
}




?>