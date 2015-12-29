{*
  Template name: Заказ
  Вывод состояния заказа.
  Используется классом  Order.class.php

  Передаваемые параметры:
  $order - заказ
*}


<h1>Ваш заказ №{$order->id}
{if $order->paid == 1}оплачен{else}еще не оплачен{/if},
{if $order->status == 0}ждет обработки{elseif $order->status == 1}в обработке{elseif $order->status == 2}выполнен{/if}
</h1>

  
<div class='order_products'>
<table class="order_products">
  {foreach from=$purchases item=purchase}
  {if $product->download != ''}{assign var=digital_products value=1}{/if}
  <tr>
    <td class="td_1">
      <a href="products/{$product->url}">{$purchase->product_name} {$purchase->variant_name}</a>
    </td>
    <td class="td_2">
      {$purchase->amount} &times; {$purchase->price|convert}&nbsp;{$currency->sign}
    </td>
  </tr>
  {/foreach}
  {if $order->discount}
  <tr>
    <td class="td_1">
      Скидка
    </td>
    <td class="td_2">
      {$order->discount} %
    </td>
  </tr>
  {/if}
</table>
<div class="line"><!-- /--></div>

<!-- Итого /-->
<div class="total_line">
   {if $order->paid == 1}
   <span class=total_sum>Оплачено: {$order->total_price|convert} {$currency->sign}</span>
   {else}
   <span class=total_sum>К оплате: {$order->total_price|convert} {$currency->sign}</span>
   {/if}
</div>

<div class="line"><!-- /--></div>

{if !$order->paid}
{* Выбор способа оплаты *}
{if $payment_methods && !$payment_method}
<form method="post">
<h2>Выберите способ оплаты</h2>
    {foreach $payment_methods as $payment_method}
    <p>
    		
				<h3>
				<input type=radio name=payment_method_id value='{$payment_method->id}' {if $payment_method@first}checked{/if} id=payment_{$payment_method->id}>
				{$payment_method->name}, к оплате {$order->total_price|convert:$payment_method->currency_id}&nbsp;{$currencies[$payment_method->currency_id]->sign}</h3>
    			{$payment_method->description}
    </p>
    {/foreach}
<input type='submit' value='Закончить заказ'>
</form>

{* Выбраный способ оплаты *}
{elseif $payment_method}
<h2>Способ оплаты &mdash; {$payment_method->name}
<form method=post><input type=submit name='reset_payment_method' value='Выбрать другой способ оплаты'></form>	
</h2>
<p>
{$payment_method->description}
</p>
<h2>
К оплате {$order->total_price|convert:$payment_method->currency_id}&nbsp;{$currencies[$payment_method->currency_id]->sign}
</h2>
{* Форма оплаты, генерируется модулем оплаты *}
{checkout_form order_id=$order->id module=$payment_method->module}
{/if}
{/if}

</div>


<table class="order_info">
  <tr>
    <td>
       Дата:
    </td>
    <td>
      {$order->date|escape}
    </td>
  </tr>
  {if $order->name}
  <tr>
    <td>
       Имя:
    </td>
    <td>
      {$order->name|escape}
    </td>
  </tr>
  {/if}
  {if $order->email}
  <tr>
    <td>
      Email:
    </td>
    <td>
      {$order->email|escape}
    </td>
  </tr>
  {/if}
  {if $order->phone}
  <tr>
    <td>
      Телефон:
    </td>
    <td>
      {$order->phone|escape}
    </td>
  </tr>
  {/if}
  {if $order->address}
  <tr>
    <td>
      Адрес доставки:
    </td>
    <td>
      {$order->address|escape}
    </td>
  </tr>
  {/if}
  {if $order->comment}
  <tr>
    <td colspan=2>
      Комментарий:
    </td>
  </tr>
  <tr>
    <td colspan=2>
      {$order->comment|escape|nl2br}
    </td>
  </tr>
  {/if}
</table>

<div class="clear"><!-- /--></div>

{if $PaymentMethods && $order->payment_status != 1}
<br>
<H1>Оплата заказа</H1>
<div class="billet">
  <table>
    {foreach name=payment from=$PaymentMethods item=payment_method}
    <tr>
      <td class="delivery_text">
      <h3>{$payment_method->name}  {$payment_method->amount} {$payment_method->currency_sign}</h3>
        {$payment_method->description}
        {if $payment_method->payment_button}
         {$payment_method->payment_button}
        {/if}     
        <br>   
        <div class="line"><!-- /--></div>
      </td>
    </tr>
    {/foreach}
  </table>
</div>			
{/if}

{if $order->paid == 1 && $digital_products == 1}
<br>
<h1>Скачать файлы:</h1>
{foreach from=$order->products item=product}
<a href='http://{$root_url}/order/{$order->code}/{$product->download}'>{$product->product_name}</a><br><br>
{/foreach}
{/if}



 