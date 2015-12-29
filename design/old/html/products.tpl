{*
  Template name: Список товаров
  Вовод списка товаров в категории
  Used by: Strefront.class.php   
  Assigned vars: $products, $brands, $category, $total_pages, $page
*}

{if $category->image}
<!-- Баннер  /-->
<div id="banner"><img src="files/categories/{$category->image}" alt="Banner image"/></div>
<!-- Баннер #End /-->
{/if}


<!-- Заголовок  /-->
<div id="page_title"> 
	
	
	<h1>{$category->name|escape} {$brand->name|escape} {$keyword|escape}</h1>
    

    <!-- Хлебные крошки /-->
    <div id="path">
      <a href="./">Главная</a>
      {foreach from=$category->path item=cat}
      → <a href="catalog/{$cat->url}">{$cat->name|escape}</a>
      {/foreach}  
      {if $brand}
      → {$brand->name|escape}
      {/if}
    </div>
    <!-- Хлебные крошки #End /-->
</div>      

{* Описание категории *}
{if $category->description}
{$category->description}
<br/>
{elseif $brand->description}
{$brand->description}
<br/>
{/if}
{* END Описание категории *}

<!-- Фильтр по брендам /-->
{if $category->brands}
<div id="category_description">
  {foreach name=brands item=b from=$category->brands}
    {if $b->id == $brand->id}
      {$b->name|escape}
    {else}
      <a href='catalog/{$category->url}/{$b->url}{$filter_params}'>{$b->name|escape}</a>
    {/if}
    {if not $smarty.foreach.brands.last}
    |
    {/if}
  {/foreach}
</div>
{/if}
<!-- Фильтр по брендам #End /-->

<!-- Фильтр по свойствам /-->
{if $features}
<div id="filter_params">
<table>
  {foreach name=properties item=property from=$features}
  {assign var=property_id value=$property->id}
  <tr>
  <td>{$property->name}:</td>
  <td>
  	{if $smarty.get.$property_id}<a href='catalog/{$category->url}{$property->clear_url}'>все</a>{else}все{/if}
  	{foreach name=options from=$property->options item=option}
  		{if $smarty.get.$property_id == $option->value}
  		<span>{$option->value}</span>
  		{else}
  		<span><a href='{url params=[$property->id=>$option->value, page=>null]}'>{$option->value}</a></span>
  		{/if}  		
  	{/foreach}
  	</td>
  </tr>
  {/foreach}
  </table>
</div>
{/if}
<!-- Фильтр по свойствам  #End /-->

{if $products}
<!-- Список товаров  /-->
<div id="products_list">

    {foreach name=products item=product from=$products}    
    <!-- Товар /-->
    <div class="product_block">
    
        <!-- Картинка товара /-->
        <div class="product_block_img">
            <p>
              <a href="products/{$product->url}">
                <img src="{$product->image->filename|resize:150:250}" alt=""/>
              </a>
              </p>
        </div>
        <!-- Картинка товара #End /-->
        
        <!-- Информация о товаре /-->
        <div class="product_block_annotation" >
        
            <!-- Название /-->
            <p product_id='{$product->id}'><a href="products/{$product->url}" {if $product->hit}class="product_name_link_hit"{else}class="product_name_link"{/if}>{$product->name|escape}</a></p>
            <!-- Название #End /-->

  <!-- Цена /-->
  <p>
  {if $product->variant->price>0}
  <span class="price"><span id=variant_price_{$product->id}>{$product->variant->price|convert}</span></span>&nbsp;{$currency->sign|escape}</span>
  {/if}
  </p>
  <!-- Цена #End /-->
	
  <form action=cart method=get>
  <p>
  {if $product->variants|@count > 1}
  <!-- Варианты товара /--> 
  <select name=variant onchange="display_variant({$product->id}, this.value);return false;"> 
  {foreach from=$product->variants item=variant}
  <option value='{$variant->id|escape}'>{$variant->name|escape}<strong></strong><br>
  {/foreach}
  </select>
  <input type=button  value='' class="link_to_cart" onclick="document.cookie='from='+location.href+';path=/';this.form.submit();">
  <br>
  {elseif $product->variants|@count == 1}
  <input type=hidden name=variant value='{$product->variant->id}'>
  <input type=button value='' class="link_to_cart" onclick="document.cookie='from='+location.href+';path=/';this.form.submit();">
  {/if}  
  <!-- Варианты товара #END /-->  

  </p>
  </form> 

            <!-- Описание товара /-->
            <p class="product_annotation">
                {$product->annotation}
            </p>
            <!-- Описание товара #End /-->
            
        </div>
        <!-- Информация о товаре #End /-->
        
    </div>
    <!-- Товар #End /-->
    {if $smarty.foreach.products.iteration%2 == 0}
      <div class="clear"><!-- /--></div>
    {/if}
    {/foreach}
    
    <div class="clear"><!-- /--></div>
    
</div>
<!-- Список товаров #End /-->
{else}
Товары не найдены
{/if}

<script>
var variants_prices = new Array;
{foreach from=$products item=product}
variants_prices[{$product->id|escape}] = new Array;
{foreach from=$product->variants item=variant}
  variants_prices[{$product->id|escape}][{$variant->id|escape}] = '{$variant->price|convert}';
{/foreach}
{/foreach}

  {literal}
  function display_variant(product, variant)
  { 
  	document.getElementById('variant_price_'+product).innerHTML = variants_prices[product][variant];
  }
  {/literal}
</script>

<!-- Листалка страниц -->
<div id="paging">
	
	{assign var=page_delta value=5}
	
	{if $current_page_num<$page_delta}{assign var=page_delta value=$page_delta*2-$current_page_num}{/if}
	{if $total_pages_num-$current_page_num<$page_delta}{assign var=page_delta value=$page_delta*2-$total_pages_num+$current_page_num}{/if}
  
	{section name=pages loop=$total_pages_num+1 start=1}
		{if $smarty.section.pages.index > $current_page_num-$page_delta and $smarty.section.pages.index < $current_page_num+$page_delta}
			<a {if $smarty.section.pages.index==$current_page_num}class="current_page" {/if}href="{url page=$smarty.section.pages.index}">{$smarty.section.pages.index}</a>
		{elseif $smarty.section.pages.index == $current_page_num-$page_delta || $smarty.section.pages.index == $current_page_num+$page_delta}
			<a href="{url page=$smarty.section.pages.index}">...</a>
		{/if}
	{/section}

	{if $current_page_num>1}<a id="PrevLink" href="{url page=$current_page_num-1}">←назад</a>{/if}
	{if $current_page_num<$total_pages_num}<a id="NextLink" href="{url page=$current_page_num+1}">вперед→</a>{/if}
	
</div>
<!-- Листалка страниц (The End) -->
