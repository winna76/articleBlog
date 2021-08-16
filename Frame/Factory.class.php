<?php
header("content-type:text/html;charset=utf-8");
//项目中的单例工厂
class Factory{
	//生产模型类的单例对象
	public static function M($class_name){
		//定义静态变量，用于保存已经存在实例化好了的对象列表
		//下标是类名，值是类的对象
		static $model_list=array();
		//判断当前模型是否被实例化
		if(!isset($model_list[$class_name])){
			//没有实例化
			//include_once './App/Test/Model/'.$class_name.'.class.php';
			$model_list[$class_name]=new $class_name;//可变类
		}
		return $model_list[$class_name];
	}
}


?>