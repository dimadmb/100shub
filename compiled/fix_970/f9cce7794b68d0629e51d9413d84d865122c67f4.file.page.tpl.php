<?php /* Smarty version Smarty-3.0.7, created on 2015-12-24 12:50:55
         compiled from "/home/a100shub/100shub.ru/www//design/fix_970/html/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:811340712567bbfff75ddb3-43141091%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9cce7794b68d0629e51d9413d84d865122c67f4' => 
    array (
      0 => '/home/a100shub/100shub.ru/www//design/fix_970/html/page.tpl',
      1 => 1450814622,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '811340712567bbfff75ddb3-43141091',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/a100shub/100shub.ru/www/Smarty/libs/plugins/modifier.escape.php';
?>

<!-- Заголовок страницы -->
<h1 page_id="<?php echo $_smarty_tpl->getVariable('page')->value->id;?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('page')->value->name);?>
</h1>

<!-- Тело страницы -->
<?php echo $_smarty_tpl->getVariable('page')->value->body;?>

<?php if ($_SERVER['REQUEST_URI']=='/to_clients'){?>

<?php }?>