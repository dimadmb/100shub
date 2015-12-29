<link href="design/{$settings->theme|escape}/css/reveal.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="design/{$settings->theme|escape}/js/jquery.reveal.js"></script> 

{* Заголовок *}
<h3 style="margin-bottom:10px; font-size:14px;">
                Лот №{$product->variant->sku}
                </h3><h1 product_id="{$product->id}">{$product->name|escape}</h1>

<div class="product">

	<!-- Большое фото -->
	{if $product->image}
	<div class="image">
		<a href="{$product->image->filename|resize:800:600:w}" class="zoom" rel="group"><img title="{$meta_keywords|escape}" class = "cloudzoom" {literal}data-cloudzoom = '{"zoomImage":"http://100shub.ru/files/originals/{/literal}{$product->image->filename}{literal}"}'{/literal}  src="{$product->image->filename|resize:300}" alt="{$product->product->name|escape}" /></a>
	</div>
	{/if}
	<!-- Большое фото (The End)-->

	<!-- Дополнительные фото продукта -->
	{if $product->images|count>1}
	<div class="images">
		{* cut удаляет первую фотографию, если нужно начать 2-й - пишем cut:2 и тд *}
		{foreach $product->images|cut as $i=>$image}
			<a href="{$image->filename|resize:800:600:w}" class="zoom" rel="group"><img src="{$image->filename|resize:73}" title="{$meta_keywords|escape}" alt="{$product->name|escape}" /></a>
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
				<a href="#" class="add_to_cart_big" style="margin-top:34px;" data-reveal-id="modal_credit">Рассчитать кредит</a>
				<a href="#" class="add_to_cart_big" style="margin-top:34px;" data-reveal-id="modal_rassrochka">Рассчитать рассрочку</a>
                {else}
				<input type="submit" class="add_to_cart_big" value="Купить" added_text="Добавлено"/>
				<a href="#" class="add_to_cart_big" data-reveal-id="modal_credit">Рассчитать кредит</a>
				<a href="#" class="add_to_cart_big" data-reveal-id="modal_rassrochka">Рассчитать рассрочку</a>
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

<div id="modal_rassrochka" class="reveal-modal" style="top:-200px; opacity:1; visibility:hidden;">

<p style="font-size:20px;">{$product->name|escape} {$product->variant->price|convert} {$currency->sign|escape}</p>
<p style="font-size:20px;">Первоначальный взнос {($product->variant->price/2)|convert} {$currency->sign|escape} (50%)</p>

	<p style="font-size:18px; margin-top:20px;">Ежемесячный платёж {(($product->variant->price*1)/12)|convert} руб</p>
	<p style="font-size:18px;">Переплата  0 руб</p>	
	
	<form action="/contact#callback" class="form beedback_form_rassrochka" method="post">
		<p style="text-align:center; font-size:18px;">Отправить заявку</p>
	<label>Имя</label>
		<input format=".+" notice="Введите имя" value="" name="name_callback" maxlength="255" type="text">
		
		<label>Телефон</label>
		<input format=".+" notice="Введите телефон" value="" name="phone_callback" maxlength="255" type="text">
		<button class="button_send" type="submit" name="callback" >Отправить</button>
	</form>	<br>	
	
	
	<table class="table_raschet">
		<tr>
			<th>Месяц</th>
			<th>Платёж</th>
		</tr>
		{for $i=1 to 6}
		
		<tr>
			<td>{$i}-й месяц</td>
			<td>{(($product->variant->price*1)/12)|convert} руб</td>
		</tr>
		{/for}
	</table>
	<a style="line-height:50px;float:right;font-size:16px;" href="/rassrochka">Как оформить рассрочку</a>

</div><!-- #rassrochka -->

<div id="modal_credit" class="reveal-modal" style="top:-200px; opacity:1; visibility:hidden;">

	
	<p style="font-size:20px;">{$product->name|escape} {$product->variant->price|convert} {$currency->sign|escape}</p>
	
	<table class="credit_form">
		<tr>
			<td>
				<p>Первоначальный взнос</p>
				<div class="slider slider_vznos" ></div>
			</td>
			<td>
				<input type="text" id="input_vznos" value="0"/> руб. 
			</td>
		</tr>
		<tr>
			<td>
				<p>Срок</p>
				<div class="slider slider_srok" ></div>
			</td>
			<td>
				<input type="text" id="input_srok" value="12"/> месяцев
			</td>
		</tr>
	</table>

	<p style="font-size:18px; margin-top:20px;">В кредит <span id="v_kred"> </span></p>
	<p style="font-size:18px; margin-top:20px;">Ежемесячный платёж <span id="pl"> </span></p>
	<p style="font-size:18px;">Переплата <span id="pereplata"> </span></p>
	
	
	<form action="/contact#callback" class="form beedback_form" method="post">
		<p style="text-align:center; font-size:18px;">Отправить заявку</p>
	<label>Имя</label>
		<input format=".+" notice="Введите имя" value="" name="name_callback" maxlength="255" type="text">
		
		<label>Телефон</label>
		<input format=".+" notice="Введите телефон" value="" name="phone_callback" maxlength="255" type="text">
		<button class="button_send" type="submit" name="callback" >Отправить</button>
	</form>	<br>
	
{literal}
	<script type="text/javascript">
  
	$(document).ready(function(){

	$('.beedback_form').submit(function(){
		//console.log('submit');
			
			if ( ($('input[name="name_callback"]').val() != '') && ($('input[name="phone_callback"]').val() != '' )){
			
			data = 'name_callback='+$('input[name="name_callback"]').val()+'&phone_callback='+$('input[name="phone_callback"]').val()+'<br>Заявка на кредит {/literal}{$product->name|escape} {$product->variant->price|convert} {$currency->sign|escape}{literal}<br>Взнос '+$( "#input_vznos" ).val()+' <br>Срок '+$( "#input_srok" ).val()+'&callback=45';
			//console.log(data);
			$.ajax("/contact", {
			  type: "POST",
			  data: data,
			  timeout: 5000,
			  beforeSend: function(){
				//$("div#cont").html('<div style="margin:100px;">Идёт загрузка   <img src="files/loading16.gif" />  <div>');
			  }, 
			  success: function(data, textStatus, jqXHR){
				//console.log(data);
				$('<p style="color:green;">Заявка принята</p>').insertAfter( ".beedback_form" );
				$( ".beedback_form" ).remove();
			  },
			  error: function(jqXHR, textStatus){
				console.log('Ошибка');
			  }
			});
			}
		return false;
	});
	
	$('.beedback_form_rassrochka').submit(function(){
		//console.log('submit');
			
			if ( ($('input[name="name_callback"]').val() != '') && ($('input[name="phone_callback"]').val() != '' )){
			
			data = 'name_callback='+$('input[name="name_callback"]').val()+'&phone_callback='+$('input[name="phone_callback"]').val()+'<br>Заявка на Рассрочку {/literal}{$product->name|escape} {$product->variant->price|convert} {$currency->sign|escape}{literal}&callback=45';
			//console.log(data);
			$.ajax("/contact", {
			  type: "POST",
			  data: data,
			  timeout: 5000,
			  beforeSend: function(){
				//$("div#cont").html('<div style="margin:100px;">Идёт загрузка   <img src="files/loading16.gif" />  <div>');
			  }, 
			  success: function(data, textStatus, jqXHR){
				//console.log(data);
				$('<p style="color:green;">Заявка принята</p>').insertAfter( ".beedback_form_rassrochka" );
				$( ".beedback_form_rassrochka" ).remove();
			  },
			  error: function(jqXHR, textStatus){
				console.log('Ошибка');
			  }
			});
			}
		return false;
	});
	
	
	
			$( ".slider_vznos" ).slider({
							animate: true,
							range: "min",
							value: 0,
							min: 0,
							max: Math.floor({/literal}{$product->variant->price*1}{literal}/1000)*1000,
							step: 1000,
							slide: function( event, ui ) {
									$( "#input_vznos" ).val( ui.value );
									raschet();
							},
			});
			$( ".slider_srok" ).slider({
							animate: true,
							range: "min",
							value: 12,
							min: 6,
							max: 24,
							step: 1,
							slide: function( event, ui ) {
									$( "#input_srok" ).val( ui.value );
									raschet();
							},
			}); 

			
			$('.credit_form input').keyup(function(){
				raschet();
			}); 
			
			function raschet(){
				var summa = {/literal}{$product->variant->price*1}{literal};// $('#input_summa').val()*1;
				var vznos = $('#input_vznos').val()*1;
				var stavka = {/literal}{$settings->prozent_stavka|escape}{literal};  
				var srok = $('#input_srok').val()*1;
				
				
				var z = (stavka/1200);
				
				if (z != 0 ){var a = (z * Math.pow((1 + z),srok))  /  (Math.pow((1 + z),srok) - 1);}
				else {var a = 1/srok;}
				
				var v_kred =  summa-vznos;
				var pl=Math.round((summa-vznos)*a);
				var pereplata = Math.round(pl*srok - (summa-vznos));
				
				$('#pereplata').text(pereplata+" руб");
				$('#pl').text(pl + " руб");
				$('#v_kred').text(v_kred + " руб");
				
				
				var table = "<table id='table_raschet' class='table_raschet'>";
				table += "<tr><th>Месяц</th><th>Платёж</th></tr>";
				
				for(i=1;i<=srok; i++ ){
					table += "<tr><td>"+i+"-й месяц</td><td>"+pl+" руб</td></tr>";
				}
				
				table +=  "</table>";
				table +=  '<a id="ssylka_remove" style="line-height:50px;float:right;font-size:16px;" href="/rassrochka#link_kredit">Как оформить кредит</a>';
				
				//console.log(table);
				
				$('#table_raschet').remove();
				$('#ssylka_remove').remove();
				$(table).appendTo('#modal_credit');
				
			}
		raschet();
	});
	</script>
{/literal}	
	
</div><!-- Модальное окно :)-->





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

