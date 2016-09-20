<?php /* Smarty version Smarty 3.1.4, created on 2014-09-22 23:54:47
         compiled from "templates\test.tpl" */ ?>
<?php /*%%SmartyHeaderCode:501754207e6e84fd15-18316519%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fb2c3fe24618efeb731f58f64fe299feac5dec7' => 
    array (
      0 => 'templates\\test.tpl',
      1 => 1411419285,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '501754207e6e84fd15-18316519',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_54207e6e89b62',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54207e6e89b62')) {function content_54207e6e89b62($_smarty_tpl) {?><?php echo adminTitle('Тест');?>

<br />
<span onclick="return confirmDelete2('Удаление статьи', 'Вы подтверждаете удаление статьи?', '?page=logs');">Кнопка</span><?php }} ?>