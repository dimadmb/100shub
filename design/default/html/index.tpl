<!DOCTYPE html>
{*
	Общий вид страницы
	Этот шаблон отвечает за общий вид страниц без центрального блока.
*}
<html>
<head>
	<base href="{$config->root_url}/"/>
	<title>{$meta_title|escape}</title>
	
	{* Метатеги *}
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<!--meta name="viewport"    content="width=device-width" /-->
	<meta name="description" content="{$meta_description|escape}" />
	<meta name="keywords"    content="{$meta_keywords|escape}" />
	
	{* Стили *}
	<link href="design/{$settings->theme|escape}/css/style.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="design/{$settings->theme|escape}/images/favicon.ico" rel="icon"          type="image/x-icon">
	<link href="design/{$settings->theme|escape}/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
	
	{* JQuery *}
	<script src="js/jquery/jquery.js"        language="JavaScript" type="text/javascript"></script>
	<script src="js/jquery/jquery-ui.min.js" language="JavaScript" type="text/javascript"></script>
	
	{* Всплывающие подсказки для администратора *}
	{if $smarty.session.admin == 'admin'}
	<script src ="js/admintooltip/admintooltip.js" language="JavaScript" type="text/javascript"></script>
	<link   href="js/admintooltip/css/admintooltip.css" rel="stylesheet" type="text/css" /> 
	{/if}
        
	{* Выбор валюты *}
	{literal}
	<script>
	$(function() {
		$('select[name=currency_id]').change(function() {
			$(this).closest('form').submit();
		});
	});
	</script>
	{/literal}

</head>
<body>

	<!-- Вся страница --> 
	<div id="main">

		<!-- Правая часть страницы-->
		<div id="right_side">
		<div id="right_container">
		
			<!-- Шапка -->
			<div id="header">
				
				<!-- Вход пользователя -->
				{if $user}
					<span id="username">
						<a href="user">{$user->name}</a>{if $group->discount>0},
						ваша скидка &mdash; {$group->discount}%{/if}
					</span>
					<a id="logout" href="user/logout">выйти</a>
				{else}
					<a id="register" href="user/register">Регистрация</a>
					<a id=login href="user/login">Вход</a>
				{/if}
				<!-- Вход пользователя (The End)-->		

				<!-- Выбор валюты -->
				{* Выбор валюты только если их больше одной *}
				{if $currencies|count>1}
				<div id="currency">
				<form name="currency" method="post">
					Валюта:
					<select name="currency_id">
						{foreach from=$currencies item=c}
						{if $c->enabled}                       
						<option value="{$c->id}" {if $c->id==$currency->id}selected{/if}>
						{$c->name|escape}
						</option>
						{/if}
						{/foreach}
					</select>
				</form>
				</div> 
				{/if}
				<!-- Выбор валюты (The End) -->	

				<!-- Главное меню -->
				<ul id="main_menu"> 
				{foreach name=page from=$pages item=p}
					{* Выводим только страницы из первого меню *}
					{if $p->menu_id == 1}
					<li {if $page && $page->id == $p->id}class="selected"{/if} page_id="{$p->id}">
						<a href="{$p->url}">{$p->name|escape}</a>
					</li>
					{/if}
				{/foreach}
				</ul>
				<!-- Главное меню (The End)-->

			</div>
			<!-- Шапка (The End)-->
			
			<!-- Центральный блок, зависящий от текущего модуля -->
			{$content}
				
		</div>
		</div> 
		<!-- Правая часть страницы (The End)-->
		
		<!-- Левая часть страницы-->
		<div id="left_side">
		
		   	<!-- Логотип -->
			<div id="logo"><a href="."><img src="design/{$settings->theme|escape}/images/logo.png" title="{$settings->site_name|escape}" alt="{$settings->site_name|escape}"/></a></div>
			<!-- Логотип (The End) -->

			<!-- Корзина -->
			<div id="cart_informer">
				{* Обновляемая аяксом корзина должна быть в отдельном файле *}
				{include file='cart_informer.tpl'}
			</div>
			<!-- Корзина (The End)-->
			
			<!-- Поиск-->
			<div id="search">
				<form action="products">
					<input class="input_search" type="text" name="keyword" value="{$keyword}" />
					<input class="button_search" value="" type="submit" />
				</form>
			</div>
			<!-- Поиск (The End)-->
			
			<!-- Меню каталога -->
			<div id="catalog_menu">
			{* Рекурсивная функция вывода дерева категорий *}
			{function name=categories_tree}
			{if $categories}
			<ul>
			{foreach $categories as $c}
				{* Показываем только видимые категории *}
				{if $c->visible}
					<li {if $category->id == $c->id}class="selected"{/if}>
						{if $c->image}<img src="{$config->categories_images_dir}{$c->image}" alt="{$c->name}">{/if}
						<a href="catalog/{$c->url}" category_id="{$c->id}">{$c->name}</a>
					</li>
					{categories_tree categories=$c->subcategories}
				{/if}
			{/foreach}
			</ul>
			{/if}
			{/function}
			{categories_tree categories=$categories}
			</div>
			<!-- Меню каталога (The End)-->			

			<!-- Все бренды -->
			{* Выбираем в переменную $all_brands все бренды *}
			{get_brands var=all_brands}
			{if $all_brands}
			<div id="all_brands">
				<h2>Все бренды:</h2>
				{foreach $all_brands as $b}	
					{if $b->image}
					<a href="brands/{$b->url}"><img src="{$config->brands_images_dir}{$b->image}" alt="{$b->name|escape}"></a>
					{else}
					<a href="brands/{$b->url}">{$b->name}</a>
					{/if}
					</a>
				{/foreach}
			</div>
			{/if}
			<!-- Все бренды (The End)-->			
			
			<!-- Просмотренные товары -->
			{* Выбираем в переменную $browsed_products просмотренные товары *}
			{get_browsed_products var=browsed_products limit=20}
			{if $browsed_products}
			<div id="browsed_products">
				<h2>Вы просматривали:</h2>
				{foreach $browsed_products as $browsed_product}
					<a href="products/{$browsed_product->url}"><img src="{$browsed_product->image->filename|resize:50:50}" alt="{$browsed_product->name}" title="{$browsed_product->name}"></a>
				{/foreach}
			</div>
			{/if}
			<!-- Меню блога (The End)-->

			<!-- Просмотренные товары -->
			
			<!-- Меню блога -->
			{* Выбираем в переменную $last_posts последние записи *}
			{get_posts var=last_posts limit=5}
			{if $last_posts}
			<div id="blog_menu">
				<h2>Новые записи в <a href="blog">блоге</a></h2>
				{foreach $last_posts as $post}
				<ul>
					<li post_id="{$post->id}">{$post->date|date} <a href="blog/{$post->url}">{$post->name|escape}</a></li>
				</ul>
				{/foreach}
			</div>
			{/if}
			<!-- Просмотренные товары -->

		</div>
		<!-- Левая часть страницы (The End)-->

		<!-- Подвал сайта -->
		<div id="footer">
			&copy; 2011 <a href="http://memories.ks.ua/webmaster">Интернет-магазин</a><br><a href="http://memories.ks.ua/hosting">Очень выгодный и не дорогой Hosting</a>

		</div>
		<!-- Подвал сайта (The End)--> 
		
	</div>
	<!-- Вся страница (The End)--> 
	
</body>
</html>