<?php /* Smarty version Smarty-3.0.7, created on 2015-12-24 12:50:59
         compiled from "/home/a100shub/100shub.ru/www//design/fix_970/html/pagination.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1047648099567bc003182021-41399556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '709f6bee5e563edce07dc7d24feaa66197c6e122' => 
    array (
      0 => '/home/a100shub/100shub.ru/www//design/fix_970/html/pagination.tpl',
      1 => 1450814622,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1047648099567bc003182021-41399556',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('total_pages_num')->value>1){?>
<script type="text/javascript" src="js/ctrlnavigate.js"></script>           

<!-- Листалка страниц -->
<div class="pagination">
	
	<?php $_smarty_tpl->tpl_vars['page_delta'] = new Smarty_variable(5, null, null);?>
	
	<?php if ($_smarty_tpl->getVariable('current_page_num')->value<$_smarty_tpl->getVariable('page_delta')->value){?><?php $_smarty_tpl->tpl_vars['page_delta'] = new Smarty_variable($_smarty_tpl->getVariable('page_delta')->value*2-$_smarty_tpl->getVariable('current_page_num')->value, null, null);?><?php }?>
	<?php if ($_smarty_tpl->getVariable('total_pages_num')->value-$_smarty_tpl->getVariable('current_page_num')->value<$_smarty_tpl->getVariable('page_delta')->value){?><?php $_smarty_tpl->tpl_vars['page_delta'] = new Smarty_variable($_smarty_tpl->getVariable('page_delta')->value*2-$_smarty_tpl->getVariable('total_pages_num')->value+$_smarty_tpl->getVariable('current_page_num')->value, null, null);?><?php }?>
  
	<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['name'] = 'pages';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('total_pages_num')->value+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pages']['total']);
?>
		<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']>$_smarty_tpl->getVariable('current_page_num')->value-$_smarty_tpl->getVariable('page_delta')->value&&$_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']<$_smarty_tpl->getVariable('current_page_num')->value+$_smarty_tpl->getVariable('page_delta')->value){?>
			<a <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']==$_smarty_tpl->getVariable('current_page_num')->value){?>class="current_page" <?php }?>href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('page'=>$_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pages']['index'];?>
</a>
		<?php }elseif($_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']==$_smarty_tpl->getVariable('current_page_num')->value-$_smarty_tpl->getVariable('page_delta')->value||$_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']==$_smarty_tpl->getVariable('current_page_num')->value+$_smarty_tpl->getVariable('page_delta')->value){?>
			<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('page'=>$_smarty_tpl->getVariable('smarty')->value['section']['pages']['index']),$_smarty_tpl);?>
">...</a>
		<?php }?>
	<?php endfor; endif; ?>

	<?php if ($_smarty_tpl->getVariable('current_page_num')->value>1){?>←<a id="PrevLink" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('page'=>$_smarty_tpl->getVariable('current_page_num')->value-1),$_smarty_tpl);?>
">назад</a><?php }?>
	<?php if ($_smarty_tpl->getVariable('current_page_num')->value<$_smarty_tpl->getVariable('total_pages_num')->value){?><a id="NextLink" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('page'=>$_smarty_tpl->getVariable('current_page_num')->value+1),$_smarty_tpl);?>
">вперед</a>→<?php }?>
	
</div>
<!-- Листалка страниц (The End) -->
<?php }?>
