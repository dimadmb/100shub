<?php /* Smarty version Smarty-3.0.7, created on 2015-12-24 14:26:01
         compiled from "/home/a100shub/100shub.ru/www//design/fix_970/html/hits.tpl" */ ?>
<?php /*%%SmartyHeaderCode:782434262567bd6496b7dd1-22317352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a43346bafa5e2460501c02ece07f79e487db4542' => 
    array (
      0 => '/home/a100shub/100shub.ru/www//design/fix_970/html/hits.tpl',
      1 => 1450814621,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '782434262567bd6496b7dd1-22317352',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/a100shub/100shub.ru/www/Smarty/libs/plugins/modifier.escape.php';
?>
<?php $_smarty_tpl->tpl_vars['wrapper'] = new Smarty_variable('index.tpl', null, 1);?>
<h1><!--<?php echo $_smarty_tpl->getVariable('page')->value->name;?>
-->Шубы норковые в Москве</h1>


<?php if ($_smarty_tpl->getVariable('products')->value){?>
<!-- Список товаров-->
<ul id="catalog">

 <script>
 k=0;
 </script>
 
	<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('products')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>
	<!-- Товар-->
	<li class="product">
         	<h3 style="margin-bottom:10px; font-size:14px;">
                Лот №<?php echo $_smarty_tpl->getVariable('product')->value->variant->sku;?>

                </h3>
		<!-- Фото товара -->
		<?php if ($_smarty_tpl->getVariable('product')->value->image){?>
		<div class="image">
                 <a href="/products/<?php echo $_smarty_tpl->getVariable('product')->value->url;?>
" target="_self"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->getVariable('product')->value->image->filename,200);?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('product')->value->name);?>
"/></a>
		</div>
		<?php }?>
		<!-- Фото товара (The End) -->

		<!-- Название товара -->
		<h3><a product_id="<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
" href="/products/<?php echo $_smarty_tpl->getVariable('product')->value->url;?>
" target="_self"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('product')->value->name);?>
</a></h3>
		<!-- Название товара (The End) -->

		<!-- Описание товара -->
		<div><?php echo $_smarty_tpl->getVariable('product')->value->annotation;?>
</div>
		<!-- Описание товара (The End) -->
		
		<?php if (count($_smarty_tpl->getVariable('product')->value->variants)>0){?>
		<!-- Цена и заказ товара -->
		<form class="cart" method="get" action="cart">
			
			<!-- Выбор варианта товара -->
			<select name="variant" <?php if (count($_smarty_tpl->getVariable('product')->value->variants)==1&&!$_smarty_tpl->getVariable('product')->value->variant->name){?>style='display:none;'<?php }?>>
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('product')->value->variants; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
?>
				<option value="<?php echo $_smarty_tpl->getVariable('v')->value->id;?>
" <?php if ($_smarty_tpl->getVariable('v')->value->compare_price>0){?>compare_price="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('v')->value->compare_price);?>
"<?php }?> price="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('v')->value->price);?>
">
				<?php echo $_smarty_tpl->getVariable('v')->value->name;?>

				</option>
				<?php }} ?>
			</select>
			<!-- Выбор варианта товара (The End) -->
			
			<!-- Цена товара -->
			<div class="price">
                         
				<?php if ($_smarty_tpl->getVariable('product')->value->variant->compare_price>0){?>
                                <span class='old-price'>старая цена:</span> <strike>
				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('product')->value->variant->compare_price);?>

                                </strike>
				<?php }?>
				
				<span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('product')->value->variant->price);?>
&nbsp;<i><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('currency')->value->sign);?>
</i></span>
				
			</div>
			<!-- Цена товара  (The End) -->			

			<!-- В корзину -->
			<a class="add_to_cart" style="text-align:center; line-height:20px;" href="/products/<?php echo $_smarty_tpl->getVariable('product')->value->url;?>
">Подробнее</a>
			<!--<input type="submit" class="add_to_cart" value="Купить" added_text="Добавлено"/>-->
			<!-- В корзину (The End) -->
			
		</form>
		<!-- Цена и заказ товара (The End)-->
		<?php }?>
		
	</li>
	<!-- Товар (The End)-->
	<?php }} ?>
			
</ul>
<?php }?>	
<!--Каталог товаров (The End)-->
<?php echo $_smarty_tpl->getVariable('page')->value->body;?>

<!-- Аяксовая корзина -->
<script src="js/ajax-cart.js"></script>

<script>

$(function() {
	// Выбор вариантов
	$('select[name=variant]').change(function() {
		price = $(this).find('option:selected').attr('price');
		compare_price = '';
		if(typeof $(this).find('option:selected').attr('compare_price') == 'string')
			compare_price = $(this).find('option:selected').attr('compare_price');
		$(this).find('option:selected').attr('compare_price');
		$(this).closest('form').find('span').html(price);
		$(this).closest('form').find('strike').html(compare_price);
		return false;		
	});
});
</script>
