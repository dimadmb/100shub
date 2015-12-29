{*
  Template name: Форма обратной связи
  Used by: Feedback.class.php   
*}

{* Подключаем js-проверку формы *}
<script src="js/baloon/js/default.js"
        language="JavaScript" type="text/javascript"></script>
<script src="js/baloon/js/validate.js"
        language="JavaScript" type="text/javascript"></script>
<script src="js/baloon/js/baloon.js"
        language="JavaScript" type="text/javascript"></script>
<link href="js/baloon/css/baloon.css"
      rel="stylesheet" type="text/css" /> 

   
<h1>{$page->name|escape}</h1>

<p>
{$page->body}
</p>

{if $message_sent}
<h1>Ваше сообщение принято</h1>
{else}
<h1>Ответим на ваш вопрос:</h1>
{/if}

{if $error}
<div id="error_block"><p>{$error}</p></div>
{/if}

{if $accepted}
Спасибо за ваш вопрос, мы ответим на него в ближайшее время.
{else}

<form method=post action='{$root_url}/contact/'>
  <table class="feedback">
    <tr>
      <td>Имя</td>
      <td><input format='.+' notice='Введите имя' value='{$name|escape}' name=name maxlength=25 type="text"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input format=email notice='Введите email' value='{$email|escape}' name=email maxlength=100 type="text"/></td>
    </tr>
    <tr>
      <td>Сообщение</td>
      <td><textarea name=message style=''>{$message|escape}</textarea>
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
      <!--  Капча /-->  
	    <div class="captcha">
	      <img src="captcha/image.php?t={math equation='rand(10,10000)'}" alt=""/>
          <p>Число:</p>
          <p><input type="text" name=captcha_code format='.+' notice='Введите чисто с картинки' />
          </p>
        </div>
        <input class=submit name='feedback' type=submit value='Отправить'>
	</tr>
  </table>
</form>
{/if}
