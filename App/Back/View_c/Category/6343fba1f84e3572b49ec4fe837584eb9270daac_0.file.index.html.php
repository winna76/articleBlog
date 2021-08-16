<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-02 03:11:14
  from 'D:\phpStudy\WWW\blog\blogmmashiyu\APP\Back\View\Category\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc705d2a191f7_76395732',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6343fba1f84e3572b49ec4fe837584eb9270daac' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\blog\\blogmmashiyu\\APP\\Back\\View\\Category\\index.html',
      1 => 1606634202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/public.html' => 1,
  ),
),false)) {
function content_5fc705d2a191f7_76395732 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:../Public/public.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo '<script'; ?>
>
	//定义页面载入事件
	$(function(){
		//获取btnAdd按钮
		$('#btnAdd').bind('click',function(){
			// 添加分类的链接
			window.location.href ='index.php?p=Back&c=Category&a=add';
		});
	});
<?php echo '</script'; ?>
>
<div class="admin">
	<form method="POST" action="index.php?p=Back&c=Category&a=delAll">
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>分类列表</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="cate_id[]" value="全选" />
            <input type="button" id="btnAdd" class="button button-small border-green" value="添加分类" />
            <input type="submit" class="button button-small border-yellow" value="批量删除" onclick="return confirm('确认全部删除吗?')"/>
        </div>
        <table class="table table-hover">
		     <tr>
                <th width="45">选择</th>
                <th width="120">所属类别</th>
                <th width="240">分类名称</th>
                <th width="*">分类描述</th>
                <th width="100">操作</th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cateInfo']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
            <tr>
                <td><input type="checkbox" name="cate_id[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['cate_id'];?>
" /></td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['cate_pid'];?>
</td>
                <td>
                    <?php echo preg_replace('!^!m',str_repeat('-',(5*$_smarty_tpl->tpl_vars['row']->value['level'])),$_smarty_tpl->tpl_vars['row']->value['cate_name']);?>

                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['cate_desc'];?>
</td>
                <td>
                    <a class="button border-blue button-little" href="index.php?p=Back&c=Category&a=edit&cate_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['cate_id'];?>
">修改</a> 
                    <a class="button border-yellow button-little" href="index.php?p=Back&c=Category&a=del&cate_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['cate_id'];?>
" onclick="return confirm('确认删除吗?')">删除</a>
                </td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>
    </div>
    </form>
    <br />
    <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">MVC框架</a>构建</p>
</div>
</body>
</html><?php }
}
