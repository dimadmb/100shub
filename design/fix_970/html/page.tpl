{*
  Шаблон текстовой страницы
*}

<!-- Заголовок страницы -->
<h1 page_id="{$page->id}">{$page->name|escape}</h1>

<!-- Тело страницы -->
{$page->body}
{if $smarty.server.REQUEST_URI  == '/to_clients'}

{/if}