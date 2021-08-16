<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-30 12:46:09
  from 'D:\phpStudy\WWW\blog\blogm\APP\Back\View\Admin\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc4e9910f4ea4_20935842',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f9c845c66567d655510a1e884dac34d04808fe01' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\blog\\blogm\\APP\\Back\\View\\Admin\\login.html',
      1 => 1606132274,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc4e9910f4ea4_20935842 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>个人博客后台登录</title>
    <link rel="stylesheet" href="<?php echo @constant('CSS_DIR');?>
/pintuer.css">
    <link rel="stylesheet" href="<?php echo @constant('CSS_DIR');?>
/admin.css">
    <?php echo '<script'; ?>
 src="<?php echo @constant('JS_DIR');?>
/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('JS_DIR');?>
/pintuer.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('JS_DIR');?>
/respond.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('JS_DIR');?>
/admin.js"><?php echo '</script'; ?>
>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
</head>

<body>
	<div class="container">
		<div class="line">
			<div class="xs6 xm4 xs3-move xm4-move">
				<br /><br />
				<div class="media media-y">
					<a href="#" target="_blank"><img src="<?php echo @constant('IMAGES_DIR');?>
/logo.png" class="radius" alt="后台管理系统" /></a>
				</div>
				<br /><br />
				<form action="index.php?p=Back&c=Admin&a=check" method="POST">
				<div class="panel">
					<div class="panel-head"><strong>登录个人博客后台管理系统</strong></div>
					<div class="panel-body" style="padding:30px;">
						<div class="form-group">
							<div class="field field-icon-right">
								<input type="text" class="input" name="admin_name" placeholder="登录账号" data-validate="required:请填写账号,length#>=5:账号长度不符合要求" />
								<span class="icon icon-user"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="field field-icon-right">
								<input type="password" class="input" name="admin_pass" placeholder="登录密码" data-validate="required:请填写密码,length#>=8:密码长度不符合要求" />
								<span class="icon icon-key"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="field">
								<input type="text" class="input" name="passcode" placeholder="填写右侧的验证码" data-validate="required:请填写右侧的验证码" />
								<img src="index.php?p=Back&c=Admin&a=captcha" onclick="this.src='index.php?p=Back&c=Admin&a=captcha&n='+Math.random()" width="80" height="32" class="passcode" />
							</div>
						</div>
					</div>
					<div class="panel-foot text-center"><button class="button button-block bg-main text-big">立即登录后台</button></div>
				</div>
				<p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">MVC框架</a>构建</p>
				</form>
			</div>
		</div>
	</div>
</body>
</html><?php }
}
