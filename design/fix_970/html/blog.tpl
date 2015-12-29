<!-- Заголовок /-->
<h1 tooltip="blog" class="float_left">{$page->name}</h1>

{include file='pagination.tpl'}

<!-- Статьи /-->
<ul id="blog">
	{foreach $posts as $post}
	<li>
		<h3><a post_id="{$post->id}" href="blog/{$post->url}">{$post->name|escape}</a></h3>
		<p>{$post->date}</p>
		<p>{$post->annotation}</p>
	</li>
	{/foreach}
</ul>
<!-- Статьи #End /-->    

{include file='pagination.tpl'}
          