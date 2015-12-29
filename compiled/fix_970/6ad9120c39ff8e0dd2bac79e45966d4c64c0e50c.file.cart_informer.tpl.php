<?php /* Smarty version Smarty-3.0.7, created on 2015-12-24 12:50:55
         compiled from "/home/a100shub/100shub.ru/www//design/fix_970/html/cart_informer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1998290805567bbfff53e508-43338907%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ad9120c39ff8e0dd2bac79e45966d4c64c0e50c' => 
    array (
      0 => '/home/a100shub/100shub.ru/www//design/fix_970/html/cart_informer.tpl',
      1 => 1450814620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1998290805567bbfff53e508-43338907',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/a100shub/100shub.ru/www/Smarty/libs/plugins/modifier.escape.php';
?><?php if ($_smarty_tpl->getVariable('cart')->value->total_products>0){?>
	В <a href="./cart/">корзине</a>
	<?php echo $_smarty_tpl->getVariable('cart')->value->total_products;?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['plural'][0][0]->plural_modifier($_smarty_tpl->getVariable('cart')->value->total_products,'товар','товаров','товара');?>

	на <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('cart')->value->total_price);?>
 <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('currency')->value->sign);?>

<?php }else{ ?>
	Корзина пуста
<?php }?>