<?php /* Smarty version Smarty-3.0.7, created on 2015-12-28 13:44:06
         compiled from "/home/users/1/12nas24/domains/vodohod-moscow.ru//design/fix_970/html/feedback.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17853580035681127647c0c5-51298084%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47a53d1edb047f40a85ecc4f20b78e936f386306' => 
    array (
      0 => '/home/users/1/12nas24/domains/vodohod-moscow.ru//design/fix_970/html/feedback.tpl',
      1 => 1450810980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17853580035681127647c0c5-51298084',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/users/1/12nas24/domains/vodohod-moscow.ru/Smarty/libs/plugins/modifier.escape.php';
if (!is_callable('smarty_function_math')) include '/home/users/1/12nas24/domains/vodohod-moscow.ru/Smarty/libs/plugins/function.math.php';
?>
<script src="/js/baloon/js/default.js" language="JavaScript" type="text/javascript"></script>
<script src="/js/baloon/js/validate.js" language="JavaScript" type="text/javascript"></script>
<script src="/js/baloon/js/baloon.js" language="JavaScript" type="text/javascript"></script>
<link   href="/js/baloon/css/baloon.css" rel="stylesheet" type="text/css" /> 

<h1><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('page')->value->name);?>
</h1>

<?php echo $_smarty_tpl->getVariable('page')->value->body;?>

<br /><br />

<h2>Заказать звонок</h2>
<a name="callback"></a>
<?php if ($_smarty_tpl->getVariable('callback_sent')->value){?>
	Спасибо, <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('callback_name')->value);?>
, ваша заявка на звонок отправлена.
    
    <script type="text/javascript">
    _gaq.push(['_trackPageview', '/callback_success']);
    </script>
   	
<?php }else{ ?>
<form action="/contact#callback" class="form beedback_form" method="post">
    <?php if ($_smarty_tpl->getVariable('error_callback')->value){?>
	<div class="message_error">
	   Пожалуйста, введите все поля.
	</div>
	<?php }?>
    <label>Имя</label>
	<input format=".+" notice="Введите имя" value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('name')->value);?>
" name="name_callback" maxlength="255" type="text"/>
    
    <label>Телефон</label>
	<input format=".+" notice="Введите телефон" value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('name')->value);?>
" name="phone_callback" maxlength="255" type="text"/>
    <input class="button_send" type="submit" name="callback" value="Отправить" />
</form>
<?php }?>
<br /><br />
<h2>Обратная связь</h2>
<?php if ($_smarty_tpl->getVariable('message_sent')->value){?>
	<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('name')->value);?>
, ваше сообщение отправлено.
    
    <script type="text/javascript">
    _gaq.push(['_trackPageview', '/feedback_success']);
    </script>
   	
<?php }else{ ?>
<form class="form beedback_form" method="post">
	<?php if ($_smarty_tpl->getVariable('error')->value){?>
	<div class="message_error">
		<?php if ($_smarty_tpl->getVariable('error')->value=='captcha'){?>
		Неверно введена капча
		<?php }elseif($_smarty_tpl->getVariable('error')->value=='empty_name'){?>
		Введите имя
		<?php }elseif($_smarty_tpl->getVariable('error')->value=='empty_email'){?>
		Введите email
		<?php }elseif($_smarty_tpl->getVariable('error')->value=='empty_text'){?>
		Введите сообщение
		<?php }?>
	</div>
	<?php }?>
	<label>Имя</label>
	<input format=".+" notice="Введите имя" value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('name')->value);?>
" name="name" maxlength="255" type="text"/>
 
	<label>Email</label>
	<input format="email" notice="Введите email" value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('email')->value);?>
" name="email" maxlength="255" type="text"/></td>
	
	<label>Сообщение</label>
	<textarea format=".+" notice="Введите сообщение" value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('message')->value);?>
" name="message"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('message')->value);?>
</textarea></td>

	<label for="comment_captcha">Число</label>
	<div class="captcha"><img src="captcha/image.php?<?php echo smarty_function_math(array('equation'=>'rand(10,10000)'),$_smarty_tpl);?>
"/></div> 
	<input class="input_captcha" id="comment_captcha" type="text" name="captcha_code" value="" format="dddd" notice="Введите капчу"/>
	
	<input class="button_send" type="submit" name="feedback" value="Отправить" />
</form>
<?php }?>