{if $total_pages_num>1}

{* Скрипт для листания через ctrl → *}
{* Ссылки на соседние страницы должны иметь id PrevLink и NextLink *}
<script type="text/javascript" src="js/ctrlnavigate.js"></script>           

<!-- Листалка страниц -->
<div class="pagination">
	
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

	{if $current_page_num>1}←<a id="PrevLink" href="{url page=$current_page_num-1}">назад</a>{/if}
	{if $current_page_num<$total_pages_num}<a id="NextLink" href="{url page=$current_page_num+1}">вперед</a>→{/if}
	
</div>
<!-- Листалка страниц (The End) -->
{/if}
