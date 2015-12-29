{* Заголовок страницы *}
{if $page}
<h1>{$page->name|escape}</h1>
{else}
<h1>{$category->name|escape} {$brand->name|escape} {$keyword|escape}</h1>
{/if}

{* Описание страницы (если задана) *}
{$page->body}

{* Описание категории *}
{$category->description}

{* Фильтр по брендам *}
{if $category->brands}
<div id="brands">
	{foreach name=brands item=b from=$category->brands}
		{if $b->image}
		<img src="{$config->brands_images_dir}{$b->image}" alt="{$b->name|escape}">
		{/if}
		<a brand_id="{$b->id}" href="catalog/{$category->url}/{$b->url}{$filter_params}" {if $b->id == $brand->id}class="selected"{/if}>{$b->name|escape}</a>
	{/foreach}
</div>
{/if}

{* Описание бренда *}
{$brand->description}

{* Фильтр по свойствам *}
{if $features}
<div id="features">
	{foreach $features as $f}
	<div class="feature">
		<b feature_id="{$f->id}">{$f->name}:</b>
		<a href="{url params=[$f->id=>null, page=>null]}" {if !$smarty.get.$f@key}class="selected"{/if}>Все</a>
		{foreach $f->options as $o}
		<a href="{url params=[$f->id=>$o->value, page=>null]}" {if $smarty.get.$f@key == $o->value}class="selected"{/if}>{$o->value|escape}</a>
		{/foreach}
	</div>
	{/foreach}
</div>
{/if}

{* Сортировка *}
{if $products|count>1}
<div class="sort">
	Сортировать по 
	<a {if $sort=='position'} class="selected"{/if} href="{url sort=position}">умолчанию</a>
	<a {if $sort=='price'}    class="selected"{/if} href="{url sort=price}">цене</a>
	<a {if $sort=='name'}     class="selected"{/if} href="{url sort=name}">названию</a>
</div>
{/if}

<!--Каталог товаров-->
{if $products}

{include file='pagination.tpl'}

<!-- Список товаров-->
<ul id="catalog">

	{foreach $products as $product}
	<!-- Товар-->
	<li class="product">
		
		<!-- Фото товара -->
		{if $product->image}
		<div class="image">
			<a href="products/{$product->url}"><img src="{$product->image->filename|resize:200:200}" alt="{$product->name|escape}"/></a>
		</div>
		{/if}
		<!-- Фото товара (The End) -->

		<!-- Название товара -->
		<h3><a product_id="{$product->id}" href="products/{$product->url}">{$product->name|escape}</a></h3>
		<!-- Название товара (The End) -->

		<!-- Описание товара -->
		<div>{$product->annotation}</div>
		<!-- Описание товара (The End) -->
		
		{if $product->variants|count > 0}
		<!-- Цена и заказ товара -->
		<form class="cart" method="get" action="cart">
			
			<!-- Выбор варианта товара -->
			{* Не показывать выбор варианта, если он один и без названия *}
			<select name="variant" {if $product->variants|count==1  && !$product->variant->name}style='display:none;'{/if}>
				{foreach $product->variants as $v}
				<option value="{$v->id}" {if $v->compare_price > 0}compare_price="{$v->compare_price|convert}"{/if} price="{$v->price|convert}">
				{$v->name}
				</option>
				{/foreach}
			</select>
			<!-- Выбор варианта товара (The End) -->
			
			<!-- Цена товара -->
			<div class="price">
				<strike>
				{if $product->variant->compare_price > 0}
				{$product->variant->compare_price|convert}
				{/if}
				</strike>
				<span>{$product->variant->price|convert}</span>
				<i>{$currency->sign|escape}</i>
			</div>
			<!-- Цена товара  (The End) -->
			
			<!-- В корзину -->
			<input type="submit" class="add_to_cart" value="В корзину" added_text="Добавлено"/>
			<!-- В корзину (The End) -->
			
		</form>
		<!-- Цена и заказ товара (The End)-->
		{/if}
		
	</li>
	<!-- Товар (The End)-->
	{/foreach}
			
</ul>

{include file='pagination.tpl'}	
<!-- Список товаров (The End)-->

{else}
Товары не найдены
{/if}	
<!--Каталог товаров (The End)-->
 
<!-- Аяксовая корзина -->
<script src="js/ajax-cart.js"></script>

<script>
{literal}
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
{/literal}