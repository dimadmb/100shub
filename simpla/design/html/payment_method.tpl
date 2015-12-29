{capture name=tabs}
		<li><a href="index.php?module=SettingsAdmin">Настройки</a></li>
		<li><a href="index.php?module=CurrencyAdmin">Валюты</a></li>
		<li><a href="index.php?module=DeliveriesAdmin">Доставка</a></li>
		<li class="active"><a href="index.php?module=PaymentMethodsAdmin">Оплата</a></li>
{/capture}

{if $payment_method->id}
{$meta_title = $payment_method->name scope=parent}
{else}
{$meta_title = 'Новый способ оплаты' scope=parent}
{/if}

{* Подключаем Tiny MCE *}
{include file='tinymce_init.tpl'}

{* On document load *}
{literal}
<script src="design/js/jquery/jquery.js"></script>
<script src="design/js/jquery/jquery-ui.min.js"></script>


<script type="text/javascript" src="design/js/autocomplete/jquery.autocomplete-min.js"></script>
<style>
.autocomplete-w1 { background:url(img/shadow.png) no-repeat bottom right; position:absolute; top:0px; left:0px; margin:6px 0 0 6px; /* IE6 fix: */ _background:none; _margin:1px 0 0 0; }
.autocomplete { border:1px solid #999; background:#FFF; cursor:default; text-align:left; overflow-x:auto; min-width: 300px; overflow-y: auto; margin:-6px 6px 6px -6px; /* IE6 specific: */ _height:350px;  _margin:0; _overflow-x:hidden; }
.autocomplete .selected { background:#F0F0F0; }
.autocomplete div { padding:2px 5px; white-space:nowrap; }
.autocomplete strong { font-weight:normal; color:#3399FF; }
</style>

<script>
$(function() {

$('select[name=module]').change(function(){
	$('div#module_settings').hide();
	$('div#module_settings[module='+$(this).val()+']').show();
	});
});


</script>


{/literal}



{if $message_success}
<!-- Системное сообщение -->
<div class="message message_success">
	<span>{$message_success}</span>
	{if $smarty.get.return}
	<a class="button" href="{$smarty.get.return}">Вернуться</a>
	{/if}
</div>
<!-- Системное сообщение (The End)-->
{/if}

{if $message_error}
<!-- Системное сообщение -->
<div class="message message_error">
	<span>{$message_error}</span>
	<a class="button" href="">Вернуться</a>
</div>
<!-- Системное сообщение (The End)-->
{/if}


<!-- Основная форма -->
<form method=post id=product enctype="multipart/form-data">
<input type=hidden name="session_id" value="{$smarty.session.id}">
	<div id="name">
		<input class="name" name=name type="text" value="{$payment_method->name|escape}"/> 
		<input name=id type="hidden" value="{$payment_method->id}"/> 
		<div class="checkbox">
			<input name=enabled value='1' type="checkbox" id="active_checkbox" {if $payment_method->enabled}checked{/if}/> <label for="active_checkbox">Активен</label>
		</div>
	</div> 

	<div id="product_categories">
		<select name="module">
            <option value=''>Ручная обработка</option>
       		{foreach $payment_modules as $payment_module}
            	<option value='{$payment_module@key|escape}' {if $payment_method->module == $payment_module@key}selected{/if} >{$payment_module->name|escape}</option>
        	{/foreach}
		</select>
	</div>
	
	<div id="product_brand">
		<label>Валюта</label>
		<div>
		<select name="currency_id">
			{foreach $currencies as $currency}
            <option value='{$currency->id}' {if $currency->id==$payment_method->currency_id}selected{/if}>{$currency->name|escape}</option>
            {/foreach}
		</select>
		</div>
	</div>
	
	<!-- Левая колонка свойств товара -->
	<div id="column_left">
	
   		{foreach $payment_modules as $payment_module}
        	<div class="block layer" {if $payment_module@key!=$payment_method->module}style='display:none;'{/if} id=module_settings module='{$payment_module@key}'>
			<h2>{$payment_module->name}</h2>
			{* Параметры модуля оплаты *}
			<ul>
			{foreach $payment_module->settings as $setting}
				{$variable_name = $setting->variable}
				{if $setting->options|@count>1}
				<li><label class=property>{$setting->name}</label>
				<select name="payment_settings[{$setting->variable}]">
					{foreach $setting->options as $option}
					<option value='{$option->value}' {if $option->value==$payment_settings[$setting->variable]}selected{/if}>{$option->name|escape}</option>
					{/foreach}
				</select>
				</li>
				{elseif $setting->options|@count==1}
				{$option = $setting->options|@first}
				<li><label class=property>{$setting->name|escape}</label><input name="payment_settings[{$setting->variable}]" class="simpla_inp" type="checkbox" value="{$option->value|escape}" {if $option->value==$payment_settings[$setting->variable]}checked{/if} /> {$option->name}</li>
				{else}
				<li><label class=property>{$setting->name|escape}</label><input name="payment_settings[{$setting->variable}]" class="simpla_inp" type="text" value="{$payment_settings[$setting->variable]|escape}" /></li>
				{/if}
			{/foreach}
			</ul>
			{* END Параметры модуля оплаты *}
        	
        	</div>
    	{/foreach}


			
	</div>
	<!-- Левая колонка свойств товара (The End)--> 
	
	
	<!-- Описагние товара -->
	<div class="block layer">
		<h2>Описание</h2>
		<textarea name="description" class="editor_small">{$payment_method->description|escape}</textarea>
	</div>
	<!-- Описание товара (The End)-->
	<input class="button_green button_save" type="submit" name="" value="Сохранить" />
	
</form>
<!-- Основная форма (The End) -->

