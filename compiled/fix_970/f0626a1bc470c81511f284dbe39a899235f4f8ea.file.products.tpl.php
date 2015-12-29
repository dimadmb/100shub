<?php /* Smarty version Smarty-3.0.7, created on 2015-12-29 15:07:51
         compiled from "/home/users/1/12nas24/domains/alyj.ru//design/fix_970/html/products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20848420865682779723e8d2-44282834%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0626a1bc470c81511f284dbe39a899235f4f8ea' => 
    array (
      0 => '/home/users/1/12nas24/domains/alyj.ru//design/fix_970/html/products.tpl',
      1 => 1451389722,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20848420865682779723e8d2-44282834',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/users/1/12nas24/domains/alyj.ru/Smarty/libs/plugins/modifier.escape.php';
?>
<h1><!--<?php echo $_smarty_tpl->getVariable('page')->value->name;?>
-->Шубы норковые в Москве</h1>

<div class="side_left">
	<?php if ($_smarty_tpl->getVariable('category')->value->brands){?>
	<div id="brands">
		<?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('category')->value->brands; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value){
?>
			<?php if ($_smarty_tpl->getVariable('b')->value->image){?>
			<img src="<?php echo $_smarty_tpl->getVariable('config')->value->brands_images_dir;?>
<?php echo $_smarty_tpl->getVariable('b')->value->image;?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('b')->value->name);?>
">
			<?php }?>
			<a brand_id="<?php echo $_smarty_tpl->getVariable('b')->value->id;?>
" href="/catalog/<?php echo $_smarty_tpl->getVariable('category')->value->url;?>
/<?php echo $_smarty_tpl->getVariable('b')->value->url;?>
<?php echo $_smarty_tpl->getVariable('filter_params')->value;?>
" <?php if ($_smarty_tpl->getVariable('b')->value->id==$_smarty_tpl->getVariable('brand')->value->id){?>class="selected"<?php }?>><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('b')->value->name);?>
</a>
		<?php }} ?>
	</div>
	<?php }?>
<?php if ($_smarty_tpl->getVariable('features')->value){?>



<div id="features">
	<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('features')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
?>
	<div class="feature" >
		<b style="line-height:24px;" feature_id="<?php echo $_smarty_tpl->getVariable('f')->value->id;?>
"><?php echo $_smarty_tpl->getVariable('f')->value->name;?>
:</b>
		<form >
			<select  name="<?php echo $_smarty_tpl->getVariable('f')->value->id;?>
" id="">
				<option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('params'=>array($_smarty_tpl->getVariable('f')->value->id=>null,'page'=>null)),$_smarty_tpl);?>
" <?php if (!$_GET[$_smarty_tpl->getVariable('f')->key]){?> selected <?php }?>>Все</option>
				<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('f')->value->options; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
?>
				<option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('params'=>array($_smarty_tpl->getVariable('f')->value->id=>$_smarty_tpl->getVariable('o')->value->value,'page'=>null)),$_smarty_tpl);?>
" <?php if ($_GET[$_smarty_tpl->getVariable('f')->key]==$_smarty_tpl->getVariable('o')->value->value){?> selected <?php }?> ><?php echo $_smarty_tpl->getVariable('o')->value->value;?>
</option>
				<?php }} ?>
			</select>
		</form>
	</div>

	<?php }} ?>
</div>


	<script>
		$('#features form select').change(function(){document.location.href = $(this).val() });
	</script>


<div style="clear:both;"></div>

<?php }?>


</div> <!-- .side_left -->

<div class="side_right">	
<!--Каталог товаров-->
<?php if ($_smarty_tpl->getVariable('products')->value){?>

<?php $_template = new Smarty_Internal_Template('pagination.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

	<!-- Список товаров 22  -->

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
" target="_self" ><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->getVariable('product')->value->image->filename,200);?>
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
</div><!-- .side_right -->
	
<?php $_template = new Smarty_Internal_Template('pagination.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>	
<!-- Список товаров (The End)-->

<?php }else{ ?>
Товары не найдены
<?php }?>	
<!--Каталог товаров (The End)-->
<?php echo $_smarty_tpl->getVariable('page')->value->body;?>

<?php echo $_smarty_tpl->getVariable('category')->value->description;?>
 
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
	
	// Бесконечная прокрутка.
	endless_scroll = false; // true: включена 
	
	if(!$.browser.msie && endless_scroll && window.location.href.indexOf('page=')==-1)
	{
		endless_scroll_page = 1;
		endless_scroll_buffer = 500;
		endless_scroll_loading = false;
		endless_scroll_content = $('#catalog');
		//endless_scroll_loading = $('<img src="images/loading.gif">');
		$('.pagination').hide();
		$(window).scroll(load_more_products);
		load_more_products();
	}
	function load_more_products()
	{
		if(!endless_scroll_loading && endless_scroll_content.offset().top+endless_scroll_content.height()
			< $(document).scrollTop()+$(window).height()+endless_scroll_buffer)
		{
			endless_scroll_loading = true;
			endless_scroll_page++;
			$.get(window.location.href+(window.location.href.indexOf('?')==-1?'?':'&')+'page='+endless_scroll_page, function(data) {
				new_elements = $(data).find('.product');
				if(new_elements.length>0)
				{
					endless_scroll_loading = false;
					endless_scroll_content.append(new_elements);
					load_more_products();
				}
			}).error(function() { endless_scroll_loading=false; });	
		};
	};		
});
</script>
