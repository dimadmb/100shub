{* Заголовок *}
<h1 product_id="{$product->id}">{$product->name|escape}</h1>

<div class="product">

	<!-- Большое фото -->
	{if $product->image}
	<div class="image">
		<a href="{$product->image->filename|resize:800:600:w}" class="zoom" rel="group"><img src="{$product->image->filename|resize:200:300}" alt="{$product->product->name|escape}" /></a>
	</div>
	{/if}
	<!-- Большое фото (The End)-->

	<!-- Дополнительные фото продукта -->
	{if $product->images|count>1}
	<div class="images">
		{* cut удаляет первую фотографию, если нужно начать 2-й - пишем cut:2 и тд *}
		{foreach $product->images|cut as $i=>$image}
			<a href="{$image->filename|resize:800:600:w}" class="zoom" rel="group"><img src="{$image->filename|resize:95:95}" alt="{$product->name|escape}" /></a>
		{/foreach}
	</div>
	{/if}
	<!-- Дополнительные фото продукта (The End)-->
	
	{if $product->variants|count > 0}
	<!-- Цена и заказ товара -->
	<form class="cart" action="cart" method="get">
		
		<!-- Выбор варианта товара -->
		{* Не показывать выбор варианта, если он один и без названия *}
		<select name="variant" {if $product->variants|count==1  && !$product->variant->name}style='display:none;'{/if}>
			{foreach $product->variants as $v}
			<option value="{$v->id}" {if $v->compare_price > 0}compare_price="{$v->compare_price|convert}"{/if} price="{$v->price|convert}" {if $v->id == $product->variant->id}selected{/if}>
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
	
	<!-- Описание товара -->
	<div class="product_description">
		{$product->body}
	</div>
	<!-- Описание товара (The End)-->

	{if $product->features}
	<!-- Характеристики товара -->
	<ul class="features">
	{foreach $product->features as $f}
	<li>
		<label feature_id="{$f->feature_id}">{$f->name}</label>
		<span>{$f->value}</span>
	</li>
	{/foreach}
	</ul>
	<!-- Характеристики товара (The End)-->
	{/if}

	<!-- Соседние товары /-->
	<div id="back_forward">
		{if $prev_product}
			←&nbsp;<a class="back" id="PrevLink" href="products/{$prev_product->url}">{$prev_product->name|escape}</a>
		{/if}
		{if $next_product}
			<a class="forward" id="NextLink" href="products/{$next_product->url}">{$next_product->name|escape}</a>&nbsp;→
		{/if}
	</div>

</div>
<!-- Описание продукта (The End)-->

{* Связанные товары *}
{if $related_products}
<h2>Так же советуем посмотреть</h2>
<!-- Список каталога товаров-->
<ul id="catalog">
	{foreach $related_products as $product}
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
			<input type="submit" class="add_to_cart" value="В корзину"  added_text="Добавлено"/>
			<!-- В корзину (The End) -->
			
		</form>
		<!-- Цена и заказ товара (The End)-->
		{/if}
		
	</li>
	<!-- Товар (The End)-->
	{/foreach}				
</ul>
{/if}

<!-- Комментарии -->
<div id="comments">

	<h2>Комментарии</h2>
	
	{if $comments}
	<!-- Список с комментариями -->
	<ul class="comment_list">
		{foreach $comments as $comment}
		<a name="comment_{$comment->id}"></a>
		<li>
			<!-- Имя и дата комментария-->
			<div class="comment_header">	
				{$comment->name|escape} <i>{$comment->date|date}, {$comment->date|time}</i>
				{if !$comment->approved}ожидает модерации</b>{/if}
			</div>
			<!-- Имя и дата комментария (The End)-->
			
			<!-- Комментарий -->
			{$comment->text|escape|nl2br}
			<!-- Комментарий (The End)-->
		</li>
		{/foreach}
	</ul>
	<!-- Список с комментариями (The End)-->
	{else}
	<p>
		Пока нет комментариев
	</p>
	{/if}
	
	<!--Форма отправления комментария-->
	<!--Подключаем js-проверку формы -->
	<script src="/js/baloon/js/default.js"   language="JavaScript" type="text/javascript"></script>
	<script src="/js/baloon/js/validate.js"  language="JavaScript" type="text/javascript"></script>
	<script src="/js/baloon/js/baloon.js"    language="JavaScript" type="text/javascript"></script>
	<link   href="/js/baloon/css/baloon.css" rel="stylesheet"      type="text/css" /> 
	
	<form class="comment_form" method="post">
		<h2>Написать комментарий</h2>
		{if $error}
		<div class="message_error">
			{if $error=='captcha'}
			Неверно введена капча
			{elseif $error=='empty_name'}
			Введите имя
			{elseif $error=='empty_comment'}
			Введите комментарий
			{/if}
		</div>
		{/if}
		<textarea class="comment_textarea" id="comment_text" name="text" format=".+" notice="Введите комментарий">{$comment_text}</textarea><br />
		<div>
		<label for="comment_name">Имя</label>
		<input class="input_name" type="text" id="comment_name" name="name" value="{$comment_name}" format=".+" notice="Введите имя"/><br />
		
		<label for="comment_captcha">Число</label>
		<div class="captcha"><img src="captcha/image.php?{math equation='rand(10,10000)'}"/></div> 
		<input class="input_captcha" id="comment_captcha" type="text" name="captcha_code" value="" format="\d\d\d\d" notice="Введите капчу"/>
		
		<input class="button_send" type="submit" name="comment" value="Отправить" />
		</div>
	</form>
	<!--Форма отправления комментария (The End)-->
	
</div>
<!-- Комментарии (The End) -->


<!-- Увеличитель картинок -->
<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" href="js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />

<!-- Аяксовая корзина -->
<script src="js/ajax-cart.js"></script>

<script>
{literal}
$(function() {
	// Зум картинок
	$("a.zoom").fancybox({
		'hideOnContentClick' : true
	});
	
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

{* Скрипт для листания через ctrl → *}
{* Ссылки на соседние страницы должны иметь id PrevLink и NextLink *}
<script type="text/javascript" src="js/ctrlnavigate.js"></script>           

