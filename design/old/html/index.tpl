{* 
  template name: Общий вид страницы

  Этот шаблон отвечает за общий вид страниц.
  Используется классом Site.class.php
  Передаваемые в шаблон параметры смотрите в конце файла  
  
*}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
<head>
    <title>{$meta_title|escape}</title>
    <base href="{$config->root_url}">
    <meta name="description" content="{$description|escape}" />
    <meta name="keywords" content="{$keywords|escape}" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
    <meta http-equiv="Content-Language" content="ru" />
    <meta name="robots" content="all" />
    <link rel="stylesheet" type="text/css" href="design/{$settings->theme}/css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="design/{$settings->theme}/css/forms.css" media="screen" />
    
    <link rel="icon" href="design/{$settings->theme}/images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="design/{$settings->theme|escape}/images/favicon.ico" type="image/x-icon">
        
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
<div id="wrap_top_bg"><div id="wrap_bottom_bg">

<!-- Вся страница /-->
<div id="wrap">

    <!-- Шапка /-->
    <div id="header"> 
            
        <!-- Логотип /-->   
        <div id="logo"> 
             <a href="./" title="Simpla" class="image"></a><a href="./" title="Simpla" class="link"></a>          
        </div>
        <!-- Логотип #End /-->
                
        <!-- Основная часть заголовка /-->
        <div id="header_menu">
        
            <!-- Верхняя панель заголовка /-->
            <div id="top_panel">
            
                <!-- Вход пользователя /-->  
                <div id="top_panel_left">
                
                <!-- Если пользователь не залогинен /-->  
                {if !$user}
                   <a href="user/login/" id="user_login_link" class="black_link" >вход</a>
                   | <a href="user/register/" class="black_link">регистрация</a>                
                <!-- Если пользователь не залогинен /-->  
                {else}
                   <a href="user" class="black_link">{$user->name|escape}</a>{if $user->discount>0},
                   ваша скидка {$user->discount}%{/if} 
                   <a href="user/logout/" class="black_link" id="user_exit_link">выйти</a>
                {/if}
                
                </div>
                <!-- Вход пользователя #End /-->  
                
                <!-- Выбор валюты /--> 
                <div id="top_panel_right">
                
                    <form name=currency method=post>
                        <p>валюта магазина:
					<select name="currency_id">
						{foreach from=$currencies item=c}
						{if $c->enabled}                       
						<option value="{$c->id}" {if $c->id==$currency->id}selected{/if}>
						{$c->name|escape}
						</option>
						{/if}
						{/foreach}
					</select>
                        </p>
                    </form>
                    
                </div>
                <!-- Выбор валюты #End /-->                 
                
            </div>
            <!-- Верхняя панель заголовка #End /-->
            
            <!-- Верхнее меню /-->
            <ul id="top_header_menu">
                {foreach name=sections from=$pages item=s}
                {if $s->menu_id == 1}
                <li>
                  {if $page->id == $s->id}                  
                  <span page_id='{$s-id}'>{$s->name|escape}</span>
                  {else}
                  <a page_id='{$s->id}' href='{$s->url}'>{$s->name|escape}</a>
                  {/if}
                </li>
                {/if}
                {/foreach}                
            </ul>
            <!-- Верхнее меню #end /-->     
                
            <!-- Информер корзины /-->  
            {if $cart->total_products>0}
                 <p id="cart_info">В <a href="cart/" class="black_link" onclick="document.cookie='from='+location.href+';path=/';">корзинe</a> {$cart->total_products} {$cart->total_products|plural:'товар':'товаров':'товара'}
                на сумму {$cart->total_price|convert} {$currency->sign|escape}</p>
            {else}
                <p id="cart_info">Корзина пуста</p>
            {/if}
            <!-- Информер корзины #End /-->         
            
            
        </div>  
    </div>
    <!-- Шапка #End /-->
    
    
    <!-- Основная часть страницы /-->
    <div id="main_part">
    
        <!-- Левая часть страницы /-->
        <div id="left_side">
        
            <!-- Меню каталога /-->
            <div id="catalog_menu">
			{function name=categories_tree}
			{if $categories}
			<ul class="catalog_menu">
			{foreach item=c from=$categories}
				{if $category->id != $c->id}
				<li><a href='catalog/{$c->url}' category_id='{$c->id}'>{$c->name}</a></li>
				{else}
				<li><span category_id='{$c->id}'>{$c->name}</span></li>
				{/if}
				{*if in_array($category->category_id, $c->subcats_ids)*}
				{categories_tree categories=$c->subcategories}        
				{*/if*}
			{/foreach}  
			</ul>
			{/if}    
			{/function}
			{categories_tree categories=$categories}
            </div>
            <!-- Меню каталога #End /-->

			{get_brands var=all_brands}
            {if $all_brands}
            <!-- Список брендов /-->
            <div id="brands_menu">
				{foreach name=brands from=$all_brands item=b}
                 <a href='brands/{$b->url}'>{$b->name|escape}</a>
                {/foreach}  
            </div>
            <!-- Список брендов #End /-->
            {/if}
            
            <!-- Поиск /-->
            <div id="search">
                <form name=search method=get action="products">
                    <p><input type="text" name=keyword value="{$keyword|escape}" class="search_input_text"/><input type="submit" value="Найти" class="search_input_submit"/></p>
                </form>
            </div>
            <!-- Поиск #End /-->

                                    
            {get_posts var=last_posts limit=5}
            {if $last_posts}
            <!-- Новости /-->
            <ul id="news">
            {foreach  name=news from=$last_posts item=post}
                <li>
                    <p class="news_date">{$post->date|date}</p>
                    <p post_id="{$post->id}"><a href="blog/{$post->url}">{$post->name|escape}</a></p>
                    <p class="news_annotation">
                        {$n->annotation}
                    </p>
                </li>
            {/foreach}         
                <li><a href="blog/">архив новостей →</a></li>
            </ul>
            <!-- Новости #End /-->
            {/if}
            
        </div>
        <!-- Левая часть страницы #End /-->
        
        
        <!-- Правая часть страницы #Begin /-->
        <div id="right_side">
                    
            {$content}
            
        </div>
        <!-- Правая часть страницы #End /-->
    </div>
    <!-- Основная часть страницы #End /-->
    
    <!-- Подвал #Begin /-->
    <div id="footer">
        <ul id="syst">
            <li><img src="design/{$settings->theme}/images/visa.jpg" alt=""/></li>
            <li><img src="design/{$settings->theme}/images/master_card.jpg" alt=""/></li>
            <li><img src="design/{$settings->theme}/images/web_money.jpg" alt=""/></li>
        </ul>
        {$settings->counters}
        <p id="copyright">© Интернет-магазин 2005-2010</p>
    </div>
    <!-- Подвал #End /-->
    
</div>
<!-- Вся страница #End /-->

</div></div>
</body>
</html>
{*

  Передаваемые в шаблон параметры:
  
  $title - заголовок страницы
  $description - описание страницы
  $keywords - ключевые слова
  
  $sections - разделы меню
  $categories - категории товаров
  $content - основная часть страницы
  
  Параметры, передаваемые для всех страниц, и этой в том чисте:
  
  $root_url - корневой url сайта (без http://)
  $settings - настройки сайта, хранящиеся в базе
  $config - настройки сайта, хранящиеся в файле Config.class.php
  $currencies - валюты
  $currency - текущая валюта
  $main_currency - основная валюта
  $user - пользователь, если залогинен  
  
*}