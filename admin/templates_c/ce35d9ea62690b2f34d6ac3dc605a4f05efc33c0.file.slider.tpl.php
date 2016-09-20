<?php /* Smarty version Smarty 3.1.4, created on 2016-05-02 08:52:16
         compiled from "templates\slider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114185238a9b988c5a0-40794607%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce35d9ea62690b2f34d6ac3dc605a4f05efc33c0' => 
    array (
      0 => 'templates\\slider.tpl',
      1 => 1462168329,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114185238a9b988c5a0-40794607',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5238a9b999a74',
  'variables' => 
  array (
    'action' => 0,
    'sliders' => 0,
    'slider' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5238a9b999a74')) {function content_5238a9b999a74($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['action']->value=='show'){?>
<?php echo adminTitle('Слайдер на главной');?>

    <?php if (!empty($_smarty_tpl->tpl_vars['sliders']->value)){?>
        <a href="?page=slider&action=add" class="button"><img src="img/icons/plus.png" alt=""/>Добавить слайд</a>
        <ul class="sliders">
        <?php  $_smarty_tpl->tpl_vars["slider"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["slider"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sliders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["slider"]->key => $_smarty_tpl->tpl_vars["slider"]->value){
$_smarty_tpl->tpl_vars["slider"]->_loop = true;
?>
            <li id="id-<?php echo $_smarty_tpl->tpl_vars['slider']->value['id'];?>
" class="slide">
                <img src="../admin/img/sliders/small_<?php echo $_smarty_tpl->tpl_vars['slider']->value['name'];?>
" alt="" />
                <a href="?page=slider&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['slider']->value['id'];?>
" rel="group" class="butt2"><img src="img/icons/edit.png" alt=""/>Изменить</a>
                <a href="javascript:void(0);" onclick="confirmDelete('Удаление слайда', 'Вы подтверждаете удаление слайда?', '?page=slider&action=del&id=<?php echo $_smarty_tpl->tpl_vars['slider']->value['id'];?>
');" class="butt"><img src="img/icons/del.png" alt=""/>Удалить</a>
            </li>
        <?php } ?>
        </ul>
        <div class="clear"></div>
    <?php }else{ ?>
        <?php echo error("На данный момент слайдов нет");?>

        <a href="?page=slider&action=add" class="button">Добавить слайд</a>
    <?php }?>
<?php }elseif($_smarty_tpl->tpl_vars['action']->value=='add'){?>
<?php echo adminTitle('<a href="?page=slider">Слайдер на главной</a> / Добавление нового слайда');?>

<a href="?page=slider" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
<form enctype="multipart/form-data" action="?page=slider&action=add"  method="post" class="formly">
    <table>
        <tr>
            <td>
                Ссылка:
            </td>
            <td>
                <input type="text" name="link" placeholder="Введите ссылку" maxlength="128" size="32" require="true" label="ссылку" />
                <a href="javascript: void(0);" title="Полный (http://up-studio.net/contacts/) или относительный (../contacts/) путь" class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
            </td>
        </tr>
        <tr>
            <td>
                Слайд:
            </td>
            <td>
                <input name="img" type="file" />&nbsp;
            </td>
        </tr>
        <tr>
            <td>
                
            </td>
            <td>
                <input type="submit" value="Добавить" />
            </td>
        </tr>
    </table>
    
</form>
<?php }elseif($_smarty_tpl->tpl_vars['action']->value=='edit'){?>
<?php echo adminTitle('<a href="?page=slider">Слайдер на главной</a> / Редактирование слайда');?>

<a href="?page=slider" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
<form enctype="multipart/form-data" action="?page=slider&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"  method="post" class="formly">
    <table>
        <tr>
            <td>
                Ссылка:
            </td>
            <td>
                <input type="text" name="link" placeholder="Введите ссылку" maxlength="128" size="60" require="true" label="ссылку" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['link'];?>
" />
                <a href="javascript: void(0);" title="Полный (http://up-studio.net/contacts/) или относительный (../contacts/) путь" class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
            </td>
        </tr>
        <tr>
            <td>
                Слайд:
            </td>
            <td>
                <input name="img" type="file" />&nbsp;
            </td>
        </tr>
        <tr>
            <td>
                
            </td>
            <td>
                <input type="submit" value="Изменить" />
            </td>
        </tr>
    </table>
    
</form>
<?php }?><?php }} ?>