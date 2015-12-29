{*
  Template name: Лента новостей
  Вывод новостной ленты.
  Используется классом NewsLine.class.php

  Передаваемые параметры:
  $news - список новостей
*}

<!-- Заголовок  /-->
<div id="page_title">      
  <h1 tooltip='newsline' class="float_left">{if $section->header}{$section->header|escape}{else}Новости{/if}</h1>
  <!-- Хлебные крошки /-->
  <div id="path">
    <a href="./">Главная</a>
    → {if $section->header}{$section->header|escape}{else}Новости{/if}
  </div>
  <!-- Хлебные крошки #End /-->
</div> 

<!-- Текст раздела /-->
{if $section->body}
<div id="category_description">
  {$section->body}
</div>
{/if}
<!-- Текст раздела #End /-->


<!-- Новости /-->
<ul id="news">
  {foreach name=news from=$posts item=news_item}
  <li>
    <p class="news_date">{$news_item->date|date}</p>
    <h2 class="h2">
      <a post_id={$news_item->id}  href="blog/{$news_item->url}">{$news_item->name|escape}</a>
    </h2>
    <p>
      {$news_item->annotation}
    </p>
    <div class="clear"><!-- /--></div>
  </li>
  {/foreach}
</ul>
<!-- Новости #End /-->
    
