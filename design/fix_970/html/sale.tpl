{* Заголовок страницы *}
<h1><!--{$page->name}-->Шуба из норки распродажа!</h1>


{* Фильтр по брендам *}
{if $category->brands}
<div id="brands">
	{foreach name=brands item=b from=$category->brands}
		{if $b->image}
		<img src="{$config->brands_images_dir}{$b->image}" alt="{$b->name|escape}">
		{/if}
		<a brand_id="{$b->id}" href="/catalog/{$category->url}/{$b->url}{$filter_params}" {if $b->id == $brand->id}class="selected"{/if}>{$b->name|escape}</a>
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



<!--Каталог товаров-->
{if $products}

{include file='pagination.tpl'}

<!-- Список товаров-->
<ul id="catalog">
{literal}
 <script>
 k=0;
 </script>
 {/literal}
	{foreach $products as $product}
	<!-- Товар-->
	{if $product->variant->compare_price > 0}
	<li class="product">
         	<h3 style="margin-bottom:10px; font-size:14px;">
                Лот №{$product->variant->sku}
                </h3>
		<!-- Фото товара -->
		{if $product->image}
		<div class="image">
                 <a href="/products/{$product->url}"><img src="{$product->image->filename|resize:200}" alt="{$product->name|escape}"/></a>
		</div>
		{/if}
		<!-- Фото товара (The End) -->

		<!-- Название товара -->
		<h3><a product_id="{$product->id}" href="/products/{$product->url}">{$product->name|escape}</a></h3>
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
                         
				{if $product->variant->compare_price > 0}
                                <span class='old-price'>старая цена:</span> <strike>
				{$product->variant->compare_price|convert}
                                </strike>
				{/if}
				
				<span>{$product->variant->price|convert}&nbsp;<i>{$currency->sign|escape}</i></span>
				
			</div>
			<!-- Цена товара  (The End) -->			

			<!-- В корзину -->
            <a class="add_to_cart" style="text-align:center; line-height:20px;" href="/products/{$product->url}">Подробнее</a>
			<!--<input type="submit" class="add_to_cart" value="Купить" added_text="Добавлено"/>-->
			<!-- В корзину (The End) -->
			
		</form>
		<!-- Цена и заказ товара (The End)-->
		{/if}
		
	</li>
	{/if}
	<!-- Товар (The End)-->
	{/foreach}
			
</ul>

{include file='pagination.tpl'}	
<!-- Список товаров (The End)-->

{else}
Товары не найдены
{/if}	
<!--Каталог товаров (The End)-->
{* Описание страницы (если задана) *}
{$page->body}

{* Описание категории *}
{$category->description} 
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