<?php /* Smarty version Smarty-3.0.7, created on 2015-12-24 14:50:28
         compiled from "/home/a100shub/100shub.ru/www//design/fix_970/html/blog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1777260052567bdc0434cbf7-56014822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ce03b8b769b819cee59efd57930f9d773101882' => 
    array (
      0 => '/home/a100shub/100shub.ru/www//design/fix_970/html/blog.tpl',
      1 => 1450814620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1777260052567bdc0434cbf7-56014822',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/a100shub/100shub.ru/www/Smarty/libs/plugins/modifier.escape.php';
?><!-- Заголовок /-->
<h1 tooltip="blog" class="float_left"><?php echo $_smarty_tpl->getVariable('page')->value->name;?>
</h1>

<?php $_template = new Smarty_Internal_Template('pagination.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<!-- Статьи /-->
<ul id="blog">
	<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('posts')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value){
?>
	<li>
		<h3><a post_id="<?php echo $_smarty_tpl->getVariable('post')->value->id;?>
" href="blog/<?php echo $_smarty_tpl->getVariable('post')->value->url;?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('post')->value->name);?>
</a></h3>
		<p><?php echo $_smarty_tpl->getVariable('post')->value->date;?>
</p>
		<p><?php echo $_smarty_tpl->getVariable('post')->value->annotation;?>
</p>
	</li>
	<?php }} ?>
</ul>
<!-- Статьи #End /-->    

<?php $_template = new Smarty_Internal_Template('pagination.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
          