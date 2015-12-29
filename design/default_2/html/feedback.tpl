{* Подключаем js-проверку формы *}
<script src="/js/baloon/js/default.js" language="JavaScript" type="text/javascript"></script>
<script src="/js/baloon/js/validate.js" language="JavaScript" type="text/javascript"></script>
<script src="/js/baloon/js/baloon.js" language="JavaScript" type="text/javascript"></script>
<link   href="/js/baloon/css/baloon.css" rel="stylesheet" type="text/css" /> 

<h1>{$page->name|escape}</h1>

{$page->body}
<br /><br />

<h2>Заказать звонок</h2>
<a name="callback"></a>
{if $callback_sent}
	Спасибо, {$callback_name|escape}, ваша заявка на звонок отправлена.
    {literal}
    <script type="text/javascript">
    _gaq.push(['_trackPageview', '/callback_success']);
    </script>
   	{/literal}
{else}
<form action="http://100shub.ru/contact#callback" class="form beedback_form" method="post">
    {if $error_callback}
	<div class="message_error">
	   Пожалуйста, введите все поля.
	</div>
	{/if}
    <label>Имя</label>
	<input format=".+" notice="Введите имя" value="{$name|escape}" name="name_callback" maxlength="255" type="text"/>
    
    <label>Телефон</label>
	<input format=".+" notice="Введите телефон" value="{$name|escape}" name="phone_callback" maxlength="255" type="text"/>
    <input class="button_send" type="submit" name="callback" value="Отправить" />
</form>
{/if}
<br /><br />
<h2>Обратная связь</h2>
{if $message_sent}
	{$name|escape}, ваше сообщение отправлено.
    {literal}
    <script type="text/javascript">
    _gaq.push(['_trackPageview', '/feedback_success']);
    </script>
   	{/literal}
{else}
<form class="form beedback_form" method="post">
	{if $error}
	<div class="message_error">
		{if $error=='captcha'}
		Неверно введена капча
		{elseif $error=='empty_name'}
		Введите имя
		{elseif $error=='empty_email'}
		Введите email
		{elseif $error=='empty_text'}
		Введите сообщение
		{/if}
	</div>
	{/if}
	<label>Имя</label>
	<input format=".+" notice="Введите имя" value="{$name|escape}" name="name" maxlength="255" type="text"/>
 
	<label>Email</label>
	<input format="email" notice="Введите email" value="{$email|escape}" name="email" maxlength="255" type="text"/></td>
	
	<label>Сообщение</label>
	<textarea format=".+" notice="Введите сообщение" value="{$message|escape}" name="message">{$message|escape}</textarea></td>

	<label for="comment_captcha">Число</label>
	<div class="captcha"><img src="captcha/image.php?{math equation='rand(10,10000)'}"/></div> 
	<input class="input_captcha" id="comment_captcha" type="text" name="captcha_code" value="" format="dddd" notice="Введите капчу"/>
	
	<input class="button_send" type="submit" name="feedback" value="Отправить" />
</form>
{/if}