{* Для того чтобы обернуть центральный блок в шаблон, отличный от index.tpl *}
{* Укажите нужный шаблон строкой ниже. Это работает и для других модулей *}
{$wrapper = 'index.tpl' scope=parent}


{* Заголовок страницы *}
<h1><!--{$page->name}-->Шубы норковые в Москве</h1>


{if $products}
<!-- Список товаров-->
<ul id="catalog">
{literal}
 <script>
 k=0;
 </script>
 {/literal}
	{foreach $products as $product}
	<!-- Товар-->
	<li class="product">
         	<h3 style="margin-bottom:10px; font-size:14px;">
                Лот №{$product->variant->sku}
                </h3>
		<!-- Фото товара -->
		{if $product->image}
		<div class="image">
                 <a href="/products/{$product->url}" target="_self"><img src="{$product->image->filename|resize:200}" alt="{$product->name|escape}"/></a>
		</div>
		{/if}
		<!-- Фото товара (The End) -->

		<!-- Название товара -->
		<h3><a product_id="{$product->id}" href="/products/{$product->url}" target="_self">{$product->name|escape}</a></h3>
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
	<!-- Товар (The End)-->
	{/foreach}
			
</ul>
{/if}	
<!--Каталог товаров (The End)-->
 {* Тело страницы *}
{$page->body}
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
});
</script>
{/literal}