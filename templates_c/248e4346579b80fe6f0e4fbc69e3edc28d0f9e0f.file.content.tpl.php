<?php /* Smarty version Smarty 3.1.4, created on 2016-05-02 11:30:21
         compiled from "templates\content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2981157270fbb87d270-06419894%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '248e4346579b80fe6f0e4fbc69e3edc28d0f9e0f' => 
    array (
      0 => 'templates\\content.tpl',
      1 => 1462177784,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2981157270fbb87d270-06419894',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_57270fbb8b9e1',
  'variables' => 
  array (
    'addr' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57270fbb8b9e1')) {function content_57270fbb8b9e1($_smarty_tpl) {?><div class="container content">
    <div id="addr">
        <?php echo $_smarty_tpl->tpl_vars['addr']->value;?>

    </div>
    <h1><?php echo $_smarty_tpl->tpl_vars['content']->value['name'];?>
</h1>
    <?php echo stripslashes($_smarty_tpl->tpl_vars['content']->value['text']);?>

</div><?php }} ?>