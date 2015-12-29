<?php /* Smarty version Smarty-3.0.7, created on 2015-12-29 15:23:41
         compiled from "/home/users/1/12nas24/domains/alyj.ru//design/fix_970/html/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:45710374156827b4dcdf504-50886585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55c79569c90fc592f964057199b59ef1775430cb' => 
    array (
      0 => '/home/users/1/12nas24/domains/alyj.ru//design/fix_970/html/page.tpl',
      1 => 1451389722,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45710374156827b4dcdf504-50886585',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/users/1/12nas24/domains/alyj.ru/Smarty/libs/plugins/modifier.escape.php';
?>

<!-- Заголовок страницы -->
<h1 page_id="<?php echo $_smarty_tpl->getVariable('page')->value->id;?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('page')->value->name);?>
</h1>

<!-- Тело страницы -->
<?php echo $_smarty_tpl->getVariable('page')->value->body;?>

<?php if ($_SERVER['REQUEST_URI']=='/to_clients'){?>

<?php }?>