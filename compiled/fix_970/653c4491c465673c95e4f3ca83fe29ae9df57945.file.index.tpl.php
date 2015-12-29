<?php /* Smarty version Smarty-3.0.7, created on 2015-12-28 13:11:32
         compiled from "/home/users/1/12nas24/domains/vodohod-moscow.ru//design/fix_970/html/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5464487956810ad4655557-59493087%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '653c4491c465673c95e4f3ca83fe29ae9df57945' => 
    array (
      0 => '/home/users/1/12nas24/domains/vodohod-moscow.ru//design/fix_970/html/index.tpl',
      1 => 1451049240,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5464487956810ad4655557-59493087',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/users/1/12nas24/domains/vodohod-moscow.ru/Smarty/libs/plugins/modifier.escape.php';
?><!DOCTYPE html>
<html>
<head>
	<base href="<?php echo $_smarty_tpl->getVariable('config')->value->root_url;?>
/"/>
	<title><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('meta_title')->value);?>
</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<!--meta name="viewport"    content="width=device-width" /-->
	<meta name="description" content="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('meta_description')->value);?>
" />
	<meta name="keywords"    content="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('meta_keywords')->value);?>
" />
	<meta name='yandex-verification' content='6cc3a824aa9b522e' />
 	<meta name="google-site-verification" content="7KA810aMNxl40a_YtF8fZb7cNR0-vq8tWj1leId8cU8" />
        
	<link href="design/<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('settings')->value->theme);?>
/css/style.css" rel="stylesheet" type="text/css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=PT+Serif&subset=latin,cyrillic' rel='stylesheet' type='text/css'/>
	<link rel="shortcut icon" href="/design/default_1/images/favicon.ico" type="image/x-icon"/>
	<link rel="icon" href="/design/default_1/images/favicon.ico" type="image/x-icon"/>	
        
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.1.min.js"></script>
	<script src="js/jquery/jquery-ui.min.js" language="JavaScript" type="text/javascript"></script>
    
    <script type="text/javascript" src="js/jquery.jcarousel.min.js"></script> 
    	
    <link rel="stylesheet" type="text/css" href="/design/default_1/css/jcarousel/tango/skin.css" media="screen" /> 
	
	<?php if ($_SESSION['admin']=='admin'){?>
	<script src ="js/admintooltip/admintooltip.js" language="JavaScript" type="text/javascript"></script>
	<link   href="js/admintooltip/css/admintooltip.css" rel="stylesheet" type="text/css" /> 
	<?php }?>
        
	
	<script>
	$(function() {
		$('select[name=currency_id]').change(function() {
			$(this).closest('form').submit();
		});
	});
	</script>
	
   
    
    <!-- Include Cloud Zoom CSS. -->
        <link rel="stylesheet" type="text/css" href="design/<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('settings')->value->theme);?>
/css/cloudzoom.css" />

        <!-- Include Cloud Zoom script. -->

        <script type="text/javascript" src="js/cloudzoom.js"></script>
		
        <!-- Call quick start function. -->
        
        <script type="text/javascript">
            CloudZoom.quickStart();
        </script>   
	   
       
	
        <script type="text/javascript">

         // Тут был второй скрипт google

	</script>
        

        
        <script type="text/javascript">
        $(document).ready(function(){
          $('#mainCarousel').jcarousel({
                        scroll: 1,
                        auto: 3,
                        wrap: "last"
                    });  
            
        $("#main_menu > li").hover(function(){
		$(this).find("ul").stop().slideDown("fast");
	}, function(){
		$(this).find("ul").stop().slideUp('fast');
	});
        });
        </script>
        

<meta name="google-site-verification" content="iq5B3BmiARx2Z5lxN5LSKMDVez9NziIfSrHrfzKDf2A" />

</head>
<body>
	<!-- Вся страница --> 
	<!-- Шапка -->
			<div id="header">
				<!-- Логотип -->
			<div id="logo"><a href="/"><img src="design/<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('settings')->value->theme);?>
/images/logo.png" title="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('settings')->value->site_name);?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('settings')->value->site_name);?>
"/></a>
                         <div id="phone">
                          <span style="font-size:20px; color:#666; padding-left:7px">Москва,3-я Тверская-Ямская 21/23</span><br />
                          <small>    +7&nbsp;(495)&nbsp;</small><big>773-51-50</big>
                         </div>
                         <div id="cart_informer" style="font-weight:bold">
				<?php $_template = new Smarty_Internal_Template('cart_informer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
			</div>
                        </div>
                       
			<!-- Логотип (The End) -->

				
				
				<!-- Главное меню -->
				<ul id="main_menu"> 
				<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pages')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
?>
					<?php if (($_smarty_tpl->getVariable('p')->value->menu_id==1)&&($_smarty_tpl->getVariable('p')->value->parent_id==0)){?>
						<li <?php if ($_smarty_tpl->getVariable('page')->value&&$_smarty_tpl->getVariable('page')->value->id==$_smarty_tpl->getVariable('p')->value->id){?>class="selected"<?php }?>>
							<a data-page="<?php echo $_smarty_tpl->getVariable('p')->value->id;?>
" href="<?php echo $_smarty_tpl->getVariable('p')->value->url;?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('p')->value->name);?>
</a>
								<?php if ($_smarty_tpl->getVariable('p')->value->id==9){?>
								<ul>
									<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('categories')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value){
?>
										<?php if ((($_smarty_tpl->getVariable('category')->value->visible==1)&&($_smarty_tpl->getVariable('category')->value->id!=6))){?>
											<li ><a  href="/catalog/<?php echo $_smarty_tpl->getVariable('category')->value->url;?>
"><?php echo $_smarty_tpl->getVariable('category')->value->name;?>
</a></li>
										<?php }?>
									<?php }} ?>
								</ul>
								<?php }else{ ?>
								<ul>
								<?php  $_smarty_tpl->tpl_vars['pp'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pages')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pp']->key => $_smarty_tpl->tpl_vars['pp']->value){
?>
									<?php if (($_smarty_tpl->getVariable('pp')->value->menu_id==1)&&($_smarty_tpl->getVariable('pp')->value->parent_id==$_smarty_tpl->getVariable('p')->value->id)){?>
										<li <?php if ($_smarty_tpl->getVariable('page')->value&&$_smarty_tpl->getVariable('page')->value->id==$_smarty_tpl->getVariable('pp')->value->id){?>class="selected"<?php }?> ><a data-page="<?php echo $_smarty_tpl->getVariable('pp')->value->id;?>
" href="<?php echo $_smarty_tpl->getVariable('pp')->value->url;?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('pp')->value->name);?>
</a></li>
									<?php }?>
								<?php }} ?>
								</ul>
								<?php }?>							
						</li>
					<?php }?>
				<?php }} ?>
				</ul>
				<!-- Главное меню (The End)-->
                                
                            <div id="banner">
                                <a href="/sale"><img src="design/<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('settings')->value->theme);?>
/images/banner2.png" /></a>
                         	</div>
			</div>
			<!-- Шапка (The End)-->
			
			<!-- Основной блок -->
			<div style="position:absolute; z-index:100; width:100%;">
				<div class="container">
					
					<!--<div style="">-->
						
					<?php echo $_smarty_tpl->getVariable('settings')->value->news_text;?>
<?php echo $_smarty_tpl->getVariable('content')->value;?>

					<!--</div>-->
					
				</div>
			
			<!-- Основной блок (The End) -->
			
		<!-- Подвал сайта -->
		<div id="footer" class="footer" >
                
  		
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
                 

                 <div class="social">
                 	



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

   
   
   
                          <img style="box-shadow:none;margin-left: 10px;" alt="Гарантия качества наших шуб" src="/design/default_1/images/property-small.png"/>
                          <img style="box-shadow:none;margin-left: 10px;" alt="Доставка по Москве бесплатно" src="/design/default_1/images/delivery-small.png"/>
                          </a>
                         </div>

                    <div class="social" style="position:absolute; text-align:right; right:0px; bottom:40px;">
                          <ul>
                          <li style="float:right; padding:0px 5px 3px 5px;"><a href="http://www.100shub.ru/contact" title="Контакты">Контакты</a></li>
                           <li style="float:right; padding:0px 5px 3px 5px;"><a href="http://www.100shub.ru/to_clients" title="Сертификаты и оплата">Покупателю</a></li>
                           <li style="float:right; padding:0px 5px 3px 5px;"><a href="http://www.100shub.ru/blog" title="Статьи">Статьи</a></li>
                           <li style="float:right; padding:0px 5px 3px 5px;"><a href="/sale" title="Акции">Акции</a></li>
                           <li style="float:right; padding:0px 5px 3px 5px;"><a href="http://www.100shub.ru/" title="Магазин">Магазин</a></li>
                          </ul>
                          <div style="clear:both;"></div>
                                <p>
                                 © 2015 Меховой салон 100 Шуб. +7 (495) 773-51-50.<br />
                                 

                         	</p>
                 	</div>						 
		</div><!--footer-->
		
		<div style="width:150px; height:150px; position:fixed; right:0; top:0; cursor:pointer;z-index:100"><a href="/contact#order"><img src="design/default_1/images/ordercall.png" /></div>
		
		</div>
</body>
</html>