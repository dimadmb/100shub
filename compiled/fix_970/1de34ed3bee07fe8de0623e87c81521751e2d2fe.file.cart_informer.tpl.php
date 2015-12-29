<?php /* Smarty version Smarty-3.0.7, created on 2015-12-29 15:07:51
         compiled from "/home/users/1/12nas24/domains/alyj.ru//design/fix_970/html/cart_informer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:75480669056827797801c64-70712672%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1de34ed3bee07fe8de0623e87c81521751e2d2fe' => 
    array (
      0 => '/home/users/1/12nas24/domains/alyj.ru//design/fix_970/html/cart_informer.tpl',
      1 => 1451389722,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75480669056827797801c64-70712672',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/users/1/12nas24/domains/alyj.ru/Smarty/libs/plugins/modifier.escape.php';
?><?php if ($_smarty_tpl->getVariable('cart')->value->total_products>0){?>
	В <a href="./cart/">корзине</a>
	<?php echo $_smarty_tpl->getVariable('cart')->value->total_products;?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['plural'][0][0]->plural_modifier($_smarty_tpl->getVariable('cart')->value->total_products,'товар','товаров','товара');?>

	на <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('cart')->value->total_price);?>
 <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('currency')->value->sign);?>

<?php }else{ ?>
	Корзина пуста
<?php }?>