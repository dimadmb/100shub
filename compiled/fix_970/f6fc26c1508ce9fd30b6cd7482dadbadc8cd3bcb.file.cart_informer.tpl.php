<?php /* Smarty version Smarty-3.0.7, created on 2015-12-28 13:11:32
         compiled from "/home/users/1/12nas24/domains/vodohod-moscow.ru//design/fix_970/html/cart_informer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:56783332856810ad47eaff8-26473918%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6fc26c1508ce9fd30b6cd7482dadbadc8cd3bcb' => 
    array (
      0 => '/home/users/1/12nas24/domains/vodohod-moscow.ru//design/fix_970/html/cart_informer.tpl',
      1 => 1450810980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56783332856810ad47eaff8-26473918',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/users/1/12nas24/domains/vodohod-moscow.ru/Smarty/libs/plugins/modifier.escape.php';
?><?php if ($_smarty_tpl->getVariable('cart')->value->total_products>0){?>
	В <a href="./cart/">корзине</a>
	<?php echo $_smarty_tpl->getVariable('cart')->value->total_products;?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['plural'][0][0]->plural_modifier($_smarty_tpl->getVariable('cart')->value->total_products,'товар','товаров','товара');?>

	на <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('cart')->value->total_price);?>
 <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('currency')->value->sign);?>

<?php }else{ ?>
	Корзина пуста
<?php }?>