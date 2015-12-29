{$meta_title = "Корзина" scope=parent}

<h1>
{if $cart->purchases}В корзине {$cart->total_products} {$cart->total_products|plural:'товар':'товаров':'товара'}
{else}Корзина пуста{/if}
</h1>

{if $cart->purchases}
<form method="post" name="cart" style="position:relative;">

{* Список покупок *}
<table id="purchases">

{foreach from=$cart->purchases item=purchase}
<tr>
	{* Изображение товара *}
	<td class="image>"
		{$image = $purchase->product->images|first}
		{if $image}
		<a href="products/{$purchase->product->url}"><img src="{$image->filename|resize:50:50}"></a>
		{/if}
	</td>
	
	{* Название товара *}
	<td class="name">
		<a href="products/{$purchase->product->url}">{$purchase->product->name|escape}</a>
		{$purchase->variant->name|escape}			
	</td>

	{* Цена за единицу *}
	<td class="price">
		{($purchase->variant->price)|convert}&nbsp;{$currency->sign}
	</td>

	{* Количество *}
	<td class="amount">
		<select name="amounts[{$purchase->variant->id}]" onchange="document.cart.submit();">
			{section name=amounts start=1 loop=$purchase->variant->stock+1 step=1}
			<option value="{$smarty.section.amounts.index}" {if $purchase->amount==$smarty.section.amounts.index}selected{/if}>{$smarty.section.amounts.index} {$settings->units}</option>
			{/section}
		</select>
	</td>

	{* Цена *}
	<td class="price">
		{($purchase->variant->price*$purchase->amount)|convert}&nbsp;{$currency->sign}
	</td>
	
	{* Удалить из корзины *}
	<td class="remove">
		<a href="cart/remove/{$purchase->variant->id}">
		<img src="design/{$settings->theme}/images/delete.png" title="Удалить из корзины" alt="Удалить из корзины">
		</a>
	</td>
			
</tr>
{/foreach}
{if $user->discount}
<tr>
	<th class="image"></th>
	<th class="name">скидка</th>
	<th class="price"></th>
	<th class="amount"></th>
	<th class="price">
		{$user->discount}&nbsp;%
	</th>
	<th class="remove"></th>
</tr>
{/if}
<tr>
	<th class="image"></th>
	<th class="name">итого</th>
	<th class="price"></th>
	<th class="amount"></th>
	<th class="price">
		{$cart->total_price|convert}&nbsp;{$currency->sign}
	</th>
	<th class="remove"></th>
</tr>
</table>

<img style="position:absolute;left: 550px;top:-60px;" src="/design/default_1/images/property.png"/>
<img style="position:absolute;left: 550px;top:135px;" src="/design/default_1/images/delivery.png"/>
<img style="position:absolute;left: 550px;top:330px;" src="/design/default_1/images/phone2.png"/>

{* Доставка *}
{if $deliveries}
<h2>Выберите способ доставки:</h2>
<ul id="deliveries">
	{foreach $deliveries as $delivery}
	<li>
		<div class="checkbox">
			<input type="radio" name="delivery_id" value="{$delivery->id}" {if $delivery@first}checked{/if} id="deliveries_{$delivery->id}">
		</div>
		<label for="deliveries_{$delivery->id}">
			<h3>
			{$delivery->name}
			{if $cart->total_price <= $delivery->free_from && $delivery->price>0}
				({$delivery->price|convert}&nbsp;{$currency->sign})
			{else}
				(бесплатно)
			{/if}
			</h3>
			{$delivery->description}
		</label>
	</li>
	{/foreach}
</ul>
{/if}
    
<h2>Ваши данные</h2>
 <p>Для оформления заказа введите, пожалуйста, информацию о себе.</p>
{* Подключаем js-проверку формы *}
<script src="js/baloon/js/default.js" language="JavaScript" type="text/javascript"></script>
<script src="js/baloon/js/validate.js" language="JavaScript" type="text/javascript"></script>
<script src="js/baloon/js/baloon.js" language="JavaScript" type="text/javascript"></script>
<link   href="js/baloon/css/baloon.css" rel="stylesheet" type="text/css" /> 
	
<div class="form cart_form">         
	{if $error}
	<div class="message_error">
		{if $error == 'empty_name'}Введите имя{/if}
		{if $error == 'empty_email'}Введите email{/if}
	</div>
	{/if}
	<label>Представьтесь*</label>
	<input name="name" type="text" value="{$name|escape}" format=".+" notice="Введите имя"/>
	
	{* <label>Email</label>
	<input name="email" type="text" value="{$email|escape}" format="email" notice="Введите email" />*}

	<label>Телефон*</label>
	<input name="phone" type="text" value="{$phone|escape}" />
	
	{*<label>Адрес доставки</label>
	<input name="address" type="text" value="{$address|escape}"/>*}

	<label>Комментарий к&nbsp;заказу</label>
	<textarea name="comment" id="order_comment">{$comment|escape}</textarea>
	<input type="submit" name="checkout" onclick="_gaq.push(['_trackPageview', '/order_success']);" class="button_submit" value="Оформить заказ">
	</div>
   
</form>
{else}
  В корзине нет товаров
{/if}