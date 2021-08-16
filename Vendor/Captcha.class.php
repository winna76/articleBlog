<?php


//��֤�빤����

class Captcha{
	//�����������
	private $width;     //��
	private $height;    //��
	private $pixelnum;  //���ŵ��ܶ�
	private $linenum;   //����������
	private $stringnum; //��֤���ַ��ĸ���
	private $string;    //Ҫд�������ַ���
	
	//���췽��
	
	public function __construct(){
		//��ʼ���������
		$this->initParams();
	}
	
	//��ʼ���������
	
	private function initParams(){
		//�������ļ��г�ʼ������
		$this->width = $GLOBALS['conf']['Captcha']['width'];
		$this->height = $GLOBALS['conf']['Captcha']['height'];
		$this->pixelnum = $GLOBALS['conf']['Captcha']['pixelnum' ];
		$this->linenum = $GLOBALS['conf']['Captcha']['linenum']; 
		$this->stringnum = $GLOBALS['conf']['Captcha']['stringnum'] ;
	}
	
	//������֤��ͼƬ
	
	public function generate(){
		//1����������
		$img=imagecreatetruecolor($this->width,$this->height);
		//2����䱳��
		//2.1����������ɫ���
		$backcolor=imagecolorallocate($img,mt_rand(200,255),mt_rand(150,255),mt_rand(200,255));
		//2.2 ��䱳��
		imagefill($img,0,0,$backcolor);
		//3���õ������֤���ַ���
		$this->string=$this->getRandString();
		//4����֤���ַ���д��ͼƬ��
		//4.1 �����ַ����
		$span=ceil($this->width/($this->stringnum+1));
		//4.2 ѭ��д�뵥���ַ�
		for($i=1;$i<=$this->stringnum;$i++){
			$stringcolor=imagecolorallocate($img,mt_rand(0,255),mt_rand(0,100),mt_rand(0,80));
			imagestring($img,5,$i*$span,($this->height/2)-6,$this->string[$i-1],$stringcolor);
		}
		//5����Ӹ�����
		for($i=1;$i<=$this->linenum;$i++){
			$linecolor=imagecolorallocate($img,mt_rand(0,150),mt_rand(30,250),mt_rand(200,255));
			$x1=mt_rand(0,$this->width-1);
			$y1=mt_rand(0,$this->height-1);
			$x2=mt_rand(0,$this->width-1);
			$y2=mt_rand(0,$this->height-1);
			imageline($img,$x1,$y1,$x2,$y2,$linecolor);
		}
		//6����Ӹ��ŵ�
		for($i=1;$i<=$this->width*$this->height*$this->pixelnum;$i++){
			$pixelcolor=imagecolorallocate($img,mt_rand(100,150),mt_rand(0,120),mt_rand(0,255));
			imagesetpixel($img,mt_rand(0,$this->width-1),mt_rand(0,$this->height-1),$pixelcolor);
		}
		//7�����ͼƬ
		header("content-type:image/png");
		ob_clean(); //�������ݻ�����
		imagepng($img);
		//8������ͼƬ
		imagedestroy($img);
	}
	
	//�õ������֤���ַ���
	
	private function getRandString(){
		$arr=array_merge(range(0,9),range('a','z'),range('A','Z'));
		shuffle($arr);
		$rand_keys=array_rand($arr,$this->stringnum);
		$str='';
		foreach($rand_keys as $value){
			$str.=$arr[$value];
		}
		//���浽session������
		@session_start();
		$_SESSION['captcha']=$str;
		return $str;
	}
	
	//���ó��Ϳ�Ĺ�������
	
	public function setWidth($w){
		$this->width=$w;
	}
	public function setHeight($h){
		$this->height=$h;
	}
	
	//��֤��֤���Ƿ�Ϸ��Ĺ�������
	
	public function checkCaptcha($passcode){
		@session_start();
		if(strtolower($passcode)!==strtolower($_SESSION['captcha'])){
			return false;
		}else{
			return true;
		}
	}
}






?>