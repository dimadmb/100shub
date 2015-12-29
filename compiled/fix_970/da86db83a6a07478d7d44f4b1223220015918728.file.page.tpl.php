<?php /* Smarty version Smarty-3.0.7, created on 2015-12-28 13:11:39
         compiled from "/home/users/1/12nas24/domains/vodohod-moscow.ru//design/fix_970/html/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:81985433956810adbe8f979-48311380%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da86db83a6a07478d7d44f4b1223220015918728' => 
    array (
      0 => '/home/users/1/12nas24/domains/vodohod-moscow.ru//design/fix_970/html/page.tpl',
      1 => 1450810980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81985433956810adbe8f979-48311380',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/users/1/12nas24/domains/vodohod-moscow.ru/Smarty/libs/plugins/modifier.escape.php';
?>

<!-- Заголовок страницы -->
<h1 page_id="<?php echo $_smarty_tpl->getVariable('page')->value->id;?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('page')->value->name);?>
</h1>

<!-- Тело страницы -->
<?php echo $_smarty_tpl->getVariable('page')->value->body;?>

<?php if ($_SERVER['REQUEST_URI']=='/to_clients'){?>

<?php }?>