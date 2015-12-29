<?php /* Smarty version Smarty-3.0.7, created on 2015-12-29 15:35:31
         compiled from "/home/users/1/12nas24/domains/alyj.ru//design/fix_970/html/product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8257776756827e1339e9a2-80453911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1167091ce86ef6641172d26e40dd04bf1a013d6' => 
    array (
      0 => '/home/users/1/12nas24/domains/alyj.ru//design/fix_970/html/product.tpl',
      1 => 1451392486,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8257776756827e1339e9a2-80453911',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/users/1/12nas24/domains/alyj.ru/Smarty/libs/plugins/modifier.escape.php';
if (!is_callable('smarty_function_math')) include '/home/users/1/12nas24/domains/alyj.ru/Smarty/libs/plugins/function.math.php';
?><link href="design/<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('settings')->value->theme);?>
/css/reveal.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="design/<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('settings')->value->theme);?>
/js/jquery.reveal.js"></script>
<h3 style="margin-bottom:10px; font-size:14px;">
                Лот №<?php echo $_smarty_tpl->getVariable('product')->value->variant->sku;?>

                </h3><h1 product_id="<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('product')->value->name);?>
</h1>

<div class="product">

	<!-- Большое фото -->
	<?php if ($_smarty_tpl->getVariable('product')->value->image){?>
	<div class="image">
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->getVariable('product')->value->image->filename,800,600,'w');?>
" class="zoom" rel="group"><img title="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('meta_keywords')->value);?>
" class = "cloudzoom" data-cloudzoom = '{"zoomImage":"http://100shub.ru/files/originals/<?php echo $_smarty_tpl->getVariable('product')->value->image->filename;?>
"}'  src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->getVariable('product')->value->image->filename,300);?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('product')->value->product->name);?>
" /></a>
	</div>
	<?php }?>
	<!-- Большое фото (The End)-->

	<!-- Дополнительные фото продукта -->
	<?php if (count($_smarty_tpl->getVariable('product')->value->images)>1){?>
	<div class="images">
		<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['cut'][0][0]->cut_modifier($_smarty_tpl->getVariable('product')->value->images); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['image']->key;
?>
			<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->getVariable('image')->value->filename,800,600,'w');?>
" class="zoom" rel="group"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->getVariable('image')->value->filename,73);?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('meta_keywords')->value);?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('product')->value->name);?>
" /></a>
		<?php }} ?>
	</div>
	<?php }?>
	<!-- Дополнительные фото продукта (The End)-->
	
	<?php if (count($_smarty_tpl->getVariable('product')->value->variants)>0){?>
	<!-- Цена и заказ товара -->
	<form class="cart" action="cart" method="get">
		
		<!-- Выбор варианта товара -->
		<select name="variant" <?php if (count($_smarty_tpl->getVariable('product')->value->variants)==1&&!$_smarty_tpl->getVariable('product')->value->variant->name){?>style='display:none;'<?php }?>>
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('product')->value->variants; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
?>
			<option value="<?php echo $_smarty_tpl->getVariable('v')->value->id;?>
" <?php if ($_smarty_tpl->getVariable('v')->value->compare_price>0){?>compare_price="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('v')->value->compare_price);?>
"<?php }?> price="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('v')->value->price);?>
" <?php if ($_smarty_tpl->getVariable('v')->value->id==$_smarty_tpl->getVariable('product')->value->variant->id){?>selected<?php }?>>
			<?php echo $_smarty_tpl->getVariable('v')->value->name;?>

			</option>
			<?php }} ?>
		</select>
		<!-- Выбор варианта товара (The End) -->
		
		
	
	<?php }?>
	
	

	<?php if ($_smarty_tpl->getVariable('product')->value->features){?>
	<!-- Характеристики товара -->
	<ul class="features">
	<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('product')->value->features; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
?>
	<li>
		<label feature_id="<?php echo $_smarty_tpl->getVariable('f')->value->feature_id;?>
"><?php echo $_smarty_tpl->getVariable('f')->value->name;?>
</label>
		<span><?php echo $_smarty_tpl->getVariable('f')->value->value;?>
</span>
	</li>
	<?php }} ?>
	</ul>
	<!-- Характеристики товара (The End)-->
        
        <!-- Описание товара -->
	<div class="product_description" style="margin-bottom:20px;">
		<?php echo $_smarty_tpl->getVariable('product')->value->body;?>

        <p><span style="color: #ff0000;">Для примерки этой модели Вы можете посетить наш меховой салон или заказать бесплатную доставку.</span></p>
	</div>
	<!-- Описание товара (The End)-->
        
	<?php }?>
        <!-- Цена товара -->
		<div class="price" style="font-size:55px; float:left">
			
			<?php if ($_smarty_tpl->getVariable('product')->value->variant->compare_price>0){?>
                        <span class='old-price'>старая цена:</span><strike>
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('product')->value->variant->compare_price);?>
                        
			</strike>
			<?php }?>
			<span style="float:left"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('product')->value->variant->price);?>
</span>
            <i style="float:left; line-height:64px; text-indent:10px"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('currency')->value->sign);?>
</i>
		          
                </div>
		<!-- Цена товара  (The End) -->	
                                	
		<!-- В корзину -->
                <?php if ($_smarty_tpl->getVariable('product')->value->variant->compare_price>0){?>
                <input type="submit" class="add_to_cart_big" value="Купить" style="margin-top:34px" added_text="Добавлено"/>
				<a href="#" class="add_to_cart_big" style="margin-top:34px;" data-reveal-id="modal_credit">Рассчитать кредит</a>
				<a href="#" class="add_to_cart_big" style="margin-top:34px;" data-reveal-id="modal_rassrochka">Рассчитать рассрочку</a>
                <?php }else{ ?>
				<input type="submit" class="add_to_cart_big" value="Купить" added_text="Добавлено"/>
				<a href="#" class="add_to_cart_big" data-reveal-id="modal_credit">Рассчитать кредит</a>
				<a href="#" class="add_to_cart_big" data-reveal-id="modal_rassrochka">Рассчитать рассрочку</a>
				<?php }?>

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
                <?php if ($_smarty_tpl->getVariable('prev_product')->value){?>
			←&nbsp;<a class="back" id="PrevLink" href="products/<?php echo $_smarty_tpl->getVariable('prev_product')->value->url;?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('prev_product')->value->name);?>
</a>
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('next_product')->value){?>
			<a class="forward" id="NextLink" href="products/<?php echo $_smarty_tpl->getVariable('next_product')->value->url;?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('next_product')->value->name);?>
</a>&nbsp;→
		<?php }?>
	
                
        </div>

</div>

<div id="modal_rassrochka" class="reveal-modal" style="top:-200px; opacity:1; visibility:hidden;">

<p style="font-size:20px;"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('product')->value->name);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('product')->value->variant->price);?>
 <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('currency')->value->sign);?>
</p>
<p style="font-size:20px;">Первоначальный взнос <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->getVariable('product')->value->variant->price/2));?>
 <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('currency')->value->sign);?>
 (50%)</p>

	<p style="font-size:18px; margin-top:20px;">Ежемесячный платёж <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert((($_smarty_tpl->getVariable('product')->value->variant->price*1)/12));?>
 руб</p>
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
		<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 6+1 - (1) : 1-(6)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
		
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
-й месяц</td>
			<td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert((($_smarty_tpl->getVariable('product')->value->variant->price*1)/12));?>
 руб</td>
		</tr>
		<?php }} ?>
	</table>
	<a style="line-height:50px;float:right;font-size:16px;" href="/rassrochka">Как оформить рассрочку</a>

</div><!-- #rassrochka -->

<div id="modal_credit" class="reveal-modal" style="top:-200px; opacity:1; visibility:hidden;">

	
	<p style="font-size:20px;"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('product')->value->name);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('product')->value->variant->price);?>
 <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('currency')->value->sign);?>
</p>
	
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
	

	<script type="text/javascript">
  
	$(document).ready(function(){

	$('.beedback_form').submit(function(){
		//console.log('submit');
			
			if ( ($('input[name="name_callback"]').val() != '') && ($('input[name="phone_callback"]').val() != '' )){
			
			data = 'name_callback='+$('input[name="name_callback"]').val()+'&phone_callback='+$('input[name="phone_callback"]').val()+'<br>Заявка на кредит <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('product')->value->name);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('product')->value->variant->price);?>
 <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('currency')->value->sign);?>
<br>Взнос '+$( "#input_vznos" ).val()+' <br>Срок '+$( "#input_srok" ).val()+'&callback=45';
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
			
			data = 'name_callback='+$('input[name="name_callback"]').val()+'&phone_callback='+$('input[name="phone_callback"]').val()+'<br>Заявка на Рассрочку <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('product')->value->name);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('product')->value->variant->price);?>
 <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('currency')->value->sign);?>
&callback=45';
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
	
	
	
			$( ".slider_vznos" ).slider({
							animate: true,
							range: "min",
							value: 0,
							min: 0,
							max: Math.floor(<?php echo $_smarty_tpl->getVariable('product')->value->variant->price*1;?>
/1000)*1000,
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
				var summa = <?php echo $_smarty_tpl->getVariable('product')->value->variant->price*1;?>
;// $('#input_summa').val()*1;
				var vznos = $('#input_vznos').val()*1;
				var stavka = <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('settings')->value->prozent_stavka);?>
;  
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
	
	
</div><!-- Модальное окно :)-->





<!-- Описание продукта (The End)-->
<?php if ($_smarty_tpl->getVariable('related_products')->value){?>
<h2>Так же советуем посмотреть</h2>
<!-- Список каталога товаров-->
<ul id="catalog">
	<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('related_products')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>
	<!-- Товар-->
	<li class="product">
		
		<!-- Фото товара -->
		<?php if ($_smarty_tpl->getVariable('product')->value->image){?>
		<div class="image">
			<a href="products/<?php echo $_smarty_tpl->getVariable('product')->value->url;?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->getVariable('product')->value->image->filename,200,200);?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('product')->value->name);?>
"/></a>
		</div>
		<?php }?>
		<!-- Фото товара (The End) -->

		<!-- Название товара -->
		<h3><a product_id="<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
" href="products/<?php echo $_smarty_tpl->getVariable('product')->value->url;?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('product')->value->name);?>
</a></h3>
		<!-- Название товара (The End) -->

		<!-- Описание товара -->
		<div><?php echo $_smarty_tpl->getVariable('product')->value->annotation;?>
</div>
		<!-- Описание товара (The End) -->
		
		<?php if (count($_smarty_tpl->getVariable('product')->value->variants)>0){?>
		<!-- Цена и заказ товара -->
		<form class="cart" method="get" action="cart">
			
			<!-- Выбор варианта товара -->
			<select name="variant" <?php if (count($_smarty_tpl->getVariable('product')->value->variants)==1&&!$_smarty_tpl->getVariable('product')->value->variant->name){?>style='display:none;'<?php }?>>
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('product')->value->variants; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
?>
				<option value="<?php echo $_smarty_tpl->getVariable('v')->value->id;?>
" <?php if ($_smarty_tpl->getVariable('v')->value->compare_price>0){?>compare_price="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('v')->value->compare_price);?>
"<?php }?> price="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('v')->value->price);?>
">
				<?php echo $_smarty_tpl->getVariable('v')->value->name;?>

				</option>
				<?php }} ?>
			</select>
			<!-- Выбор варианта товара (The End) -->
			
			<!-- Цена товара -->
			<div class="price">
				<strike>
				<?php if ($_smarty_tpl->getVariable('product')->value->variant->compare_price>0){?>
				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('product')->value->variant->compare_price);?>

				<?php }?>
				</strike>
				<span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('product')->value->variant->price);?>
</span>
				<i><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('currency')->value->sign);?>
</i>
			</div>
			<!-- Цена товара  (The End) -->
			
			<!-- В корзину -->
			<input type="submit" class="add_to_cart" value="В корзину"  added_text="Добавлено"/>
			<!-- В корзину (The End) -->
			
		</form>
		<!-- Цена и заказ товара (The End)-->
		<?php }?>
		
	</li>
	<!-- Товар (The End)-->
	<?php }} ?>				
</ul>
<?php }?>

<!-- Комментарии -->
<div id="comments">

	<h2>Комментарии</h2>
	
	<?php if ($_smarty_tpl->getVariable('comments')->value){?>
	<!-- Список с комментариями -->
	<ul class="comment_list">
		<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('comments')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value){
?>
		<a name="comment_<?php echo $_smarty_tpl->getVariable('comment')->value->id;?>
"></a>
		<li>
			<!-- Имя и дата комментария-->
			<div class="comment_header">	
				<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('comment')->value->name);?>
 <i><?php echo $_smarty_tpl->getVariable('comment')->value->date;?>
 </i>
				<?php if (!$_smarty_tpl->getVariable('comment')->value->approved){?>ожидает модерации</b><?php }?>
			</div>
			<!-- Имя и дата комментария (The End)-->
			
			<!-- Комментарий -->
			<?php echo nl2br(smarty_modifier_escape($_smarty_tpl->getVariable('comment')->value->text));?>

			<!-- Комментарий (The End)-->
		</li>
		<?php }} ?>
	</ul>
	<!-- Список с комментариями (The End)-->
	<?php }else{ ?>
	<p>
		Пока нет комментариев
	</p>
	<?php }?>
	
	<!--Форма отправления комментария-->
	<!--Подключаем js-проверку формы -->
	<script src="/js/baloon/js/default.js"   language="JavaScript" type="text/javascript"></script>
	<script src="/js/baloon/js/validate.js"  language="JavaScript" type="text/javascript"></script>
	<script src="/js/baloon/js/baloon.js"    language="JavaScript" type="text/javascript"></script>
	<link   href="/js/baloon/css/baloon.css" rel="stylesheet"      type="text/css" /> 
	
	<form class="comment_form" method="post">
		<h2>Написать комментарий</h2>
		<?php if ($_smarty_tpl->getVariable('error')->value){?>
		<div class="message_error">
			<?php if ($_smarty_tpl->getVariable('error')->value=='captcha'){?>
			Неверно введена капча
			<?php }elseif($_smarty_tpl->getVariable('error')->value=='empty_name'){?>
			Введите имя
			<?php }elseif($_smarty_tpl->getVariable('error')->value=='empty_comment'){?>
			Введите комментарий
			<?php }?>
		</div>
		<?php }?>
		<textarea class="comment_textarea" id="comment_text" name="text" format=".+" notice="Введите комментарий"><?php echo $_smarty_tpl->getVariable('comment_text')->value;?>
</textarea><br />
		<div>
		<label for="comment_name">Имя</label>
		<input class="input_name" type="text" id="comment_name" name="name" value="<?php echo $_smarty_tpl->getVariable('comment_name')->value;?>
" format=".+" notice="Введите имя"/><br />
		<label for="comment_captcha">Число</label>
		<div class="captcha"><img src="captcha/image.php?<?php echo smarty_function_math(array('equation'=>'rand(10,10000)'),$_smarty_tpl);?>
"/></div> 
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

<script type="text/javascript" src="js/ctrlnavigate.js"></script>           

