<?php


//后台分类管理控制器

class CategoryController extends PlatformController{
	
	//显示分类管理首页
	
	public function indexAction(){
		//显示分类
		$category=Factory::M('CategoryModel');
		$cateInfo=$category->getCategory();
		//分配变量到视图文件
		$this->assign('cateInfo',$cateInfo);
		$this->display('index.html');
	}
	
	//显示添加分类表单动作
	
	public function addAction(){
		//显示分类
		$category=Factory::M('CategoryModel');
		$cateInfo=$category->getCategory();
		//分配变量到视图文件
		$this->assign('cateInfo',$cateInfo);
		//显示输出视图文件
		$this->display('add.html');
	}
	/*
		处理提交的分类表单
	*/
	public function dealAddAction(){
		//接受表单数据
		$cate=array();
		$cate['cate_name']=$this->escapeData($_POST['cate_name']);
		$cate['cate_pid']=$_POST['cate_pid'];
		$cate['cate_sort']=$this->escapeData($_POST['cate_sort']);
		$cate['cate_desc']=$this->escapeData($_POST['cate_desc']);
		//判断数据是否合法
		if(empty($cate['cate_name']) || empty($cate['cate_sort']) || empty($cate['cate_desc'])){
			$this->jump('index.php?p=Back&c=Category&a=add',':(您填写的信息不完整！');
		}
		if(!is_numeric($cate['cate_sort']) || (int)($cate['cate_sort']) !=$cate['cate_sort'] || $cate['cate_sort']<0){
			$this->jump('index.php?p=Back&c=Category&a=add',':(排序编号为1-50');
		}
		//数据入库，需要调用模型
		$category=Factory::M('CategoryModel');
		//用insertCate方法
		$result=$category->insertCate($cate);
		if($result){
			//成功入库，即立即跳转到分类首页
			$this->jump('index.php?p=Back&c=Category&a=index');
		}else{
			//入库失败
			$this->jump('index.php?p=Back&c=Category&a=add','发生未知错误，添加分类失败！');
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}