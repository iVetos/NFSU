<?php /* Smarty version Smarty 3.1.4, created on 2014-06-01 14:06:59
         compiled from "templates\administration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30221538b01d8cb5a36-38795388%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1697daf095f5393acb83d5be1cd95d07ea2c71b2' => 
    array (
      0 => 'templates\\administration.tpl',
      1 => 1401620818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30221538b01d8cb5a36-38795388',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_538b01d8d43e9',
  'variables' => 
  array (
    'modules' => 0,
    'module' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538b01d8d43e9')) {function content_538b01d8d43e9($_smarty_tpl) {?><?php echo adminTitle('Администрирование');?>

<a href="?page=administration&action=del" class="button"><img src="img/icons/del.png" alt=""/> Удалить неотмеченные</a>
<form action="?page=administration" method="post" class="formly" enctype="multipart/form-data">
<ul class="checkboxes">
<?php  $_smarty_tpl->tpl_vars["module"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["module"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['modules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["module"]->key => $_smarty_tpl->tpl_vars["module"]->value){
$_smarty_tpl->tpl_vars["module"]->_loop = true;
?>
    <li><input id="m<?php echo $_smarty_tpl->tpl_vars['module']->value['id'];?>
" class="checkboxesli" type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['module']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['module']->value['value']==1){?>checked="checked"<?php }?> /><label for="m<?php echo $_smarty_tpl->tpl_vars['module']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['module']->value['name'];?>
</label></li>
<?php } ?>
</ul>
</form><?php }} ?>