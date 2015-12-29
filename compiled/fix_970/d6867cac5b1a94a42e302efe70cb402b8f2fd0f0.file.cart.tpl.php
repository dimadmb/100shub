<?php /* Smarty version Smarty-3.0.7, created on 2015-12-28 13:14:03
         compiled from "/home/users/1/12nas24/domains/vodohod-moscow.ru//design/fix_970/html/cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213165071656810b6b157dc7-12828530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6867cac5b1a94a42e302efe70cb402b8f2fd0f0' => 
    array (
      0 => '/home/users/1/12nas24/domains/vodohod-moscow.ru//design/fix_970/html/cart.tpl',
      1 => 1451292000,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213165071656810b6b157dc7-12828530',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/users/1/12nas24/domains/vodohod-moscow.ru/Smarty/libs/plugins/modifier.escape.php';
?><?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Корзина", null, 1);?>

<h1>
<?php if ($_smarty_tpl->getVariable('cart')->value->purchases){?>В корзине <?php echo $_smarty_tpl->getVariable('cart')->value->total_products;?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['plural'][0][0]->plural_modifier($_smarty_tpl->getVariable('cart')->value->total_products,'товар','товаров','товара');?>

<?php }else{ ?>Корзина пуста<?php }?>
</h1>

<?php if ($_smarty_tpl->getVariable('cart')->value->purchases){?>
<form method="post" name="cart" style="position:relative;">
<table id="purchases">

<?php  $_smarty_tpl->tpl_vars['purchase'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cart')->value->purchases; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['purchase']->key => $_smarty_tpl->tpl_vars['purchase']->value){
?>
<tr>
	<td class="image>"
		<?php $_smarty_tpl->tpl_vars['image'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['first'][0][0]->first_modifier($_smarty_tpl->getVariable('purchase')->value->product->images), null, null);?>
		<?php if ($_smarty_tpl->getVariable('image')->value){?>
		<a href="products/<?php echo $_smarty_tpl->getVariable('purchase')->value->product->url;?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->getVariable('image')->value->filename,50,50);?>
"></a>
		<?php }?>
	</td>
	
	<td class="name">
		<a href="products/<?php echo $_smarty_tpl->getVariable('purchase')->value->product->url;?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('purchase')->value->product->name);?>
</a>
		<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('purchase')->value->variant->name);?>
			
	</td>
	<td class="price">
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->getVariable('purchase')->value->variant->price));?>
&nbsp;<?php echo $_smarty_tpl->getVariable('currency')->value->sign;?>

	</td>
	<td class="amount">
		<select name="amounts[<?php echo $_smarty_tpl->getVariable('purchase')->value->variant->id;?>
]" onchange="document.cart.submit();">
			<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['name'] = 'amounts';
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('purchase')->value->variant->stock+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'] = ((int)1) == 0 ? 1 : (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['total']);
?>
			<option value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['amounts']['index'];?>
" <?php if ($_smarty_tpl->getVariable('purchase')->value->amount==$_smarty_tpl->getVariable('smarty')->value['section']['amounts']['index']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['amounts']['index'];?>
 <?php echo $_smarty_tpl->getVariable('settings')->value->units;?>
</option>
			<?php endfor; endif; ?>
		</select>
	</td>
	<td class="price">
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->getVariable('purchase')->value->variant->price*$_smarty_tpl->getVariable('purchase')->value->amount));?>
&nbsp;<?php echo $_smarty_tpl->getVariable('currency')->value->sign;?>

	</td>
	
	<td class="remove">
		<a href="cart/remove/<?php echo $_smarty_tpl->getVariable('purchase')->value->variant->id;?>
">
		<img src="design/<?php echo $_smarty_tpl->getVariable('settings')->value->theme;?>
/images/delete.png" title="Удалить из корзины" alt="Удалить из корзины">
		</a>
	</td>
			
</tr>
<?php }} ?>
<?php if ($_smarty_tpl->getVariable('user')->value->discount){?>
<tr>
	<th class="image"></th>
	<th class="name">скидка</th>
	<th class="price"></th>
	<th class="amount"></th>
	<th class="price">
		<?php echo $_smarty_tpl->getVariable('user')->value->discount;?>
&nbsp;%
	</th>
	<th class="remove"></th>
</tr>
<?php }?>
<tr>
	<th class="image"></th>
	<th class="name">итого</th>
	<th class="price"></th>
	<th class="amount"></th>
	<th class="price">
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('cart')->value->total_price);?>
&nbsp;<?php echo $_smarty_tpl->getVariable('currency')->value->sign;?>

	</th>
	<th class="remove"></th>
</tr>
</table>

<img style="position:absolute;left: 550px;top:-60px;" src="/design/default_1/images/property.png"/>
<img style="position:absolute;left: 550px;top:135px;" src="/design/default_1/images/delivery.png"/>
<img style="position:absolute;left: 550px;top:330px;" src="/design/default_1/images/phone2.png"/>
<?php if ($_smarty_tpl->getVariable('deliveries')->value){?>
<h2>Выберите способ доставки:</h2>
<ul id="deliveries">
	<?php  $_smarty_tpl->tpl_vars['delivery'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('deliveries')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['delivery']->index=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['delivery']->key => $_smarty_tpl->tpl_vars['delivery']->value){
 $_smarty_tpl->tpl_vars['delivery']->index++;
 $_smarty_tpl->tpl_vars['delivery']->first = $_smarty_tpl->tpl_vars['delivery']->index === 0;
?>
	<li>
		<div class="checkbox">
			<input type="radio" name="delivery_id" value="<?php echo $_smarty_tpl->getVariable('delivery')->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['delivery']->first){?>checked<?php }?> id="deliveries_<?php echo $_smarty_tpl->getVariable('delivery')->value->id;?>
">
		</div>
		<label for="deliveries_<?php echo $_smarty_tpl->getVariable('delivery')->value->id;?>
">
			<h3>
			<?php echo $_smarty_tpl->getVariable('delivery')->value->name;?>

			<?php if ($_smarty_tpl->getVariable('cart')->value->total_price<=$_smarty_tpl->getVariable('delivery')->value->free_from&&$_smarty_tpl->getVariable('delivery')->value->price>0){?>
				(<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('delivery')->value->price);?>
&nbsp;<?php echo $_smarty_tpl->getVariable('currency')->value->sign;?>
)
			<?php }else{ ?>
				(бесплатно)
			<?php }?>
			</h3>
			<?php echo $_smarty_tpl->getVariable('delivery')->value->description;?>

		</label>
	</li>
	<?php }} ?>
</ul>
<?php }?>
    
<h2>Ваши данные</h2>
 <p>Для оформления заказа введите, пожалуйста, информацию о себе.</p>
<script src="js/baloon/js/default.js" language="JavaScript" type="text/javascript"></script>
<script src="js/baloon/js/validate.js" language="JavaScript" type="text/javascript"></script>
<script src="js/baloon/js/baloon.js" language="JavaScript" type="text/javascript"></script>
<link   href="js/baloon/css/baloon.css" rel="stylesheet" type="text/css" /> 
	
<div class="form cart_form">         
	<?php if ($_smarty_tpl->getVariable('error')->value){?>
	<div class="message_error">
		<?php if ($_smarty_tpl->getVariable('error')->value=='empty_name'){?>Введите имя<?php }?>
		<?php if ($_smarty_tpl->getVariable('error')->value=='empty_email'){?>Введите email<?php }?>
	</div>
	<?php }?>
	<label>Представьтесь*</label>
	<input name="name" type="text" value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('name')->value);?>
" format=".+" notice="Введите имя"/>
	

	<label>Телефон*</label>
	<input name="phone" type="text" value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('phone')->value);?>
" />
	

	<label>Комментарий к&nbsp;заказу</label>
	<textarea name="comment" id="order_comment"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('comment')->value);?>
</textarea>
	<input type="submit" name="checkout" onclick="_gaq.push(['_trackPageview', '/order_success']);" class="button_submit" value="Оформить заказ">
	</div>
   
</form>
<?php }else{ ?>
  В корзине нет товаров
<?php }?>