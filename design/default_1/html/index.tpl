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
	<meta name='yandex-verification' content='6cc3a824aa9b522e' />
 	<meta name="google-site-verification" content="7KA810aMNxl40a_YtF8fZb7cNR0-vq8tWj1leId8cU8" />
        
        {* Стили *}
	<link href="design/{$settings->theme|escape}/css/style.css" rel="stylesheet" type="text/css" media="screen" />
	<!--<link href="design/{$settings->theme|escape}/images/favicon.ico" rel="icon"          type="image/x-icon"/>
	<link href="design/{$settings->theme|escape}/images/favicon.ico" rel="shortcut icon" type="image/x-icon"/>-->
	<link href='http://fonts.googleapis.com/css?family=PT+Serif&subset=latin,cyrillic' rel='stylesheet' type='text/css'/>
	<link rel="shortcut icon" href="http://100shub.ru/design/default_1/images/favicon.ico" type="image/x-icon"/>
	<link rel="icon" href="http://100shub.ru/design/default_1/images/favicon.ico" type="image/x-icon"/>	
        
	{* JQuery *}
	{*<script src="js/jquery/jquery.js"        language="JavaScript" type="text/javascript"></script> *}
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.1.min.js"></script>
	<script src="js/jquery/jquery-ui.min.js" language="JavaScript" type="text/javascript"></script>
    
    <script type="text/javascript" src="js/jquery.jcarousel.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="http://100shub.ru/design/default_1/css/jcarousel/tango/skin.css" media="screen" /> 
	
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
   
    
    <!-- Include Cloud Zoom CSS. -->
        <link rel="stylesheet" type="text/css" href="design/{$settings->theme|escape}/css/cloudzoom.css" />

        <!-- Include Cloud Zoom script. -->
        <script type="text/javascript" src="js/cloudzoom.js"></script>

        <!-- Call quick start function. -->
        {literal}
        <script type="text/javascript">
            CloudZoom.quickStart();
        </script>   
	   {/literal}
       
	{* Google Analytics код отслеживания *}
	{literal}
        <script type="text/javascript">

         // Тут был второй скрипт google

	</script>
        {/literal}

        {literal}
        <script type="text/javascript">
        $(document).ready(function(){
          $('#mainCarousel').jcarousel({
                        scroll: 1,
                        auto: 3,
                        wrap: "last"
                    });  
            
        $("#main_menu > li").hover(function(){
		$(this).find("ul").slideDown("fast");
	}, function(){
		$(this).find("ul").slideUp('fast');
	});
        });
        </script>
        {/literal}

<meta name="google-site-verification" content="iq5B3BmiARx2Z5lxN5LSKMDVez9NziIfSrHrfzKDf2A" />

</head>
<body>

	<!-- Вся страница --> 
	<!-- Шапка -->
			<div id="header">
				<!-- Логотип -->
			<div id="logo"><a href="http://100shub.ru"><img src="design/{$settings->theme|escape}/images/logo.png" title="{$settings->site_name|escape}" alt="{$settings->site_name|escape}"/></a>
                         <div id="phone">
                          <span style="font-size:20px; color:#666; padding-left:7px">Москва,3-я Тверская-Ямская 21/23</span><br />
                          <small>    +7&nbsp;(495)&nbsp;</small><big>773-51-50</big>
                         </div>
                         <div id="cart_informer" style="font-weight:bold">
				{* Обновляемая аяксом корзина должна быть в отдельном файле *}
				{include file='cart_informer.tpl'}
			</div>
                        </div>
                       
			<!-- Логотип (The End) -->

				

				<!-- Главное меню -->
				<ul id="main_menu"> 
				{foreach $pages as $p}
					{* Выводим только страницы из первого меню *}
					{if ($p->menu_id == 1) && ($p->parent_id == 0)}
						<li {if $page && $page->id == $p->id}class="selected"{/if}>
							<a data-page="{$p->id}" href="{$p->url}">{$p->name|escape}</a>

								{if $p->id == 9}
								
								<ul>
									{foreach $categories as $category}
										{if $category->visible == 1}
											<li ><a  href="/catalog/{$category->url}">{$category->name}</a></li>
										{/if}
									{/foreach}
								</ul>
								
								{else}
								
								
								<ul>
								{foreach $pages as $pp}
									
									{if ($pp->menu_id == 1) && ($pp->parent_id == $p->id)}
										
										<li {if $page && $page->id == $pp->id}class="selected"{/if}><a data-page="{$pp->id}" href="{$pp->url}">{$pp->name|escape}</a></li>
									
									{/if}
									
								{/foreach}
								</ul>
								
								{/if}							

						</li>
					{/if}
				{/foreach}
				</ul>
				<!-- Главное меню (The End)-->
                                
                                <div id="banner">
                                <a href="http://100shub.ru/sale"><img src="design/{$settings->theme|escape}/images/banner2.png" /></a>
                         	</div>
			</div>
			<!-- Шапка (The End)-->
 
 <div id="girl"></div>
 {if $smarty.server.REQUEST_URI=='/'}
 <!--<div class="mainSliderSubWrap" style="margin-bottom:30px; -moz-box-shadow: 0 0 10px rgba(0,0,0,0.5);
    -webkit-box-shadow: 0 0 10px rgba(0,0,0,0.5);
    box-shadow: 0 0 10px rgba(0,0,0,0.5);">
     <ul id="mainCarousel" class="mainSlider">
        <li><img src="http://100shub.ru/design/default_1/images/slider1.jpg"/></li>
        <li><img src="http://100shub.ru/design/default_1/images/slider2.jpg"/></li>
        <li><a href="http://100shub.ru/contact#order"><img src="http://100shub.ru/design/default_1/images/slider3.jpg"/></a></li>
     </ul>
 </div>-->
 {/if}
                        <div id="main">		
                
		<!-- Правая часть страницы-->
		<div id="right_side">
		<div id="right_container">	
			<!-- Центральный блок, зависящий от текущего модуля -->
			{$content}
			                     
                        
                        
		</div>
		</div> 
		<!-- Правая часть страницы (The End)-->
		
		
		<!-- Подвал сайта -->
		<div id="footer">
                
  		
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
                 </p>
			
			
                        
                 <div style="width:50px;float:left">                 

                 </div>                 
                 <div class="social">
{literal}                 	

 <!-- Yandex.Metrika informer -->
<a href="https://metrika.yandex.ru/stat/?id=31263708&amp;from=informer"
target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/31263708/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:31263708,lang:'ru'});return false}catch(e){}" /></a>
<!-- /Yandex.Metrika informer -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter31263708 = new Ya.Metrika({
                    id:31263708,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/31263708" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
	
{/literal}

      </div>
                 
      <div class="social">
{literal}
<!-- Start SiteHeart code -->
<script type="text/javascript">// <![CDATA[
(function(){
var widget_id = 803185;
_shcp =[{widget_id : widget_id}];
var lang =(navigator.language || navigator.systemLanguage 
|| navigator.userLanguage ||"en")
.substr(0,2).toLowerCase();
var url ="widget.siteheart.com/widget/sh/"+ widget_id +"/"+ lang +"/widget.js";
var hcc = document.createElement("script");
hcc.type ="text/javascript";
hcc.async =true;
hcc.src =("https:"== document.location.protocol ?"https":"http")
+"://"+ url;
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(hcc, s.nextSibling);
})();
// ]]></script><!-- End SiteHeart code -->
                            
                            
                            
                            
   {/literal}
                          <img style="box-shadow:none;margin-left: 10px;" alt="Гарантия качества наших шуб" src="http://100shub.ru/design/default_1/images/property-small.png"/>
                          <img style="box-shadow:none;margin-left: 10px;" alt="Доставка по Москве бесплатно" src="http://100shub.ru/design/default_1/images/delivery-small.png"/>
                          </a>
                         </div>
                         <div class="social" style="float:right; text-align:right; margin-right:-85px; margin-top:-5px;">
                          <ul>
                          <li style="float:right; padding:0px 5px 3px 5px;"><a href="http://www.100shub.ru/contact" title="Контакты">Контакты</a></li>
                           <li style="float:right; padding:0px 5px 3px 5px;"><a href="http://www.100shub.ru/to_clients" title="Сертификаты и оплата">Покупателю</a></li>
                           <li style="float:right; padding:0px 5px 3px 5px;"><a href="http://www.100shub.ru/blog" title="Статьи">Статьи</a></li>
                           <li style="float:right; padding:0px 5px 3px 5px;"><a href="http://100shub.ru/sale" title="Акции">Акции</a></li>
                           <li style="float:right; padding:0px 5px 3px 5px;"><a href="http://www.100shub.ru/" title="Магазин">Магазин</a></li>
                          </ul>
                          <div style="clear:both;"></div>
                                <p>
                                 © 2015 Меховой салон 100 Шуб. +7 (495) 773-51-50.<br />
                                 

                         	</p>
                 	</div>
		</div>
		<!-- Подвал сайта (The End)--> 
		
	</div>
	<!-- Вся страница (The End)--> 
        <div style="width:150px; height:150px; position:fixed; right:0; top:0; cursor:pointer;z-index:100"><a href="http://100shub.ru/contact#order"><img src="design/default_1/images/ordercall.png" /></div>
{literal}
<script type='text/javascript'> /* build:::7 */
	var liveTex = true,
		liveTexID = 27214,
		liveTex_object = true;
	(function() {
		var lt = document.createElement('script');
		lt.type ='text/javascript';
		lt.async = true;
        lt.src = 'http://cs15.livetex.ru/js/client.js';
		var sc = document.getElementsByTagName('script')[0];
		if ( sc ) sc.parentNode.insertBefore(lt, sc);
		else  document.documentElement.firstChild.appendChild(lt);
	})();
</script>





<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-68485307-1', 'auto');
  ga('send', 'pageview');

</script>  

{/literal}



</body>
</html>