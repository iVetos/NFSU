<?php /* Smarty version Smarty 3.1.4, created on 2014-03-28 20:39:22
         compiled from "templates\logs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:282845335c1505bfd90-47875539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1a6756f251693bc19ec79190ddb6f687d7479dc' => 
    array (
      0 => 'templates\\logs.tpl',
      1 => 1396031960,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '282845335c1505bfd90-47875539',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5335c150611c6',
  'variables' => 
  array (
    'date' => 0,
    'logs' => 0,
    'log' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5335c150611c6')) {function content_5335c150611c6($_smarty_tpl) {?><?php echo adminTitle("Логи за ".($_smarty_tpl->tpl_vars['date']->value));?>

<?php if (!empty($_smarty_tpl->tpl_vars['logs']->value)){?>
<ul class="help_contents">
    <?php  $_smarty_tpl->tpl_vars["log"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["log"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['logs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["log"]->key => $_smarty_tpl->tpl_vars["log"]->value){
$_smarty_tpl->tpl_vars["log"]->_loop = true;
?>
    <li><?php echo $_smarty_tpl->tpl_vars['log']->value;?>
</li>
    <?php } ?>
</ul>
<?php }else{ ?>
<?php echo error('Логи по заданной дате пусты');?>

<?php }?><?php }} ?>