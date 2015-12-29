{* Заголовок *}
<h3 style="margin-bottom:10px; font-size:14px;">
                Лот №{$product->variant->sku}
                </h3><h1 product_id="{$product->id}">{$product->name|escape}</h1>

<div class="product">

	<!-- Большое фото -->
	{if $product->image}
	<div class="image">
		<a href="{$product->image->filename|resize:800:600:w}" class="zoom" rel="group"><img class = "cloudzoom" {literal}data-cloudzoom = '{"zoomImage":"http://100shub.ru/files/originals/{/literal}{$product->image->filename}{literal}"}'{/literal}  src="{$product->image->filename|resize:300}" alt="{$product->product->name|escape}" /></a>
	</div>
	{/if}
	<!-- Большое фото (The End)-->

	<!-- Дополнительные фото продукта -->
	{if $product->images|count>1}
	<div class="images">
		{* cut удаляет первую фотографию, если нужно начать 2-й - пишем cut:2 и тд *}
		{foreach $product->images|cut as $i=>$image}
			<a href="{$image->filename|resize:800:600:w}" class="zoom" rel="group"><img src="{$image->filename|resize:73}" alt="{$product->name|escape}" /></a>
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
		
		
	
	{/if}
	
	

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
        
        <!-- Описание товара -->
	<div class="product_description" style="margin-bottom:20px;">
		{$product->body}
        <p><span style="color: #ff0000;">Для примерки этой модели Вы можете посетить наш меховой салон или заказать бесплатную доставку.</span></p>
	</div>
	<!-- Описание товара (The End)-->
        
	{/if}
        <!-- Цена товара -->
		<div class="price" style="font-size:55px; float:left">
			
			{if $product->variant->compare_price > 0}
                        <span class='old-price'>старая цена:</span><strike>
			{$product->variant->compare_price|convert}                        
			</strike>
			{/if}
			<span style="float:left">{$product->variant->price|convert}</span>
            <i style="float:left; line-height:64px; text-indent:10px">{$currency->sign|escape}</i>
		          
                </div>
		<!-- Цена товара  (The End) -->	
                                	
		<!-- В корзину -->
                {if $product->variant->compare_price > 0}
                <input type="submit" class="add_to_cart_big" value="Купить" style="margin-top:34px" added_text="Добавлено"/>
		
                {else}
		<input type="submit" class="add_to_cart_big" value="Купить" added_text="Добавлено"/>
         	{/if}
                
                
  
                
                
		<!-- В корзину (The End) -->
</form>
	<!-- Цена и заказ товара (The End)-->
	<!-- Соседние товары /-->
	
        <div id="back_forward" style="clear:both">
        <script type="text/javascript">(function() {
  if (window.pluso)if (typeof window.pluso.start == "function") return;
  if (window.ifpluso==undefined) { window.ifpluso = 1;
    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
  }})();</script>
<div class="pluso" data-background="transparent" data-options="medium,square,line,horizontal,nocounter,theme=03" data-services="vkontakte,odnoklassniki,facebook,twitter,google"></div>
		</div>
                <div id="back_forward" style="clear:both">
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
				{$comment->name|escape} <i>{$comment->date} {*$comment->date|time*}</i>
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
		<input class="input_captcha" id="comment_captcha" type="text" name="captcha_code" value="" format=".+" notice="Введите капчу"/>
		
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

