<?php /* Smarty version Smarty 3.1.4, created on 2013-09-18 01:13:06
         compiled from "templates\downloads.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73825238d3f2cd8777-56858857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e694a99b60c832e5cfd05f16d5e63233f3ffacb' => 
    array (
      0 => 'templates\\downloads.tpl',
      1 => 1365762250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73825238d3f2cd8777-56858857',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'do' => 0,
    'files' => 0,
    'n' => 0,
    'file' => 0,
    'url' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5238d3f2f1c5b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5238d3f2f1c5b')) {function content_5238d3f2f1c5b($_smarty_tpl) {?><?php echo adminTitle('Менеджер файлов');?>

<form enctype="multipart/form-data" action="?page=downloads"  method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
    Добавить файл: <input name="userfile" type="file" />
    <input type="submit" value="Отправить" /><br />
</form>
<p><?php echo $_smarty_tpl->tpl_vars['do']->value;?>
...</p>

<?php if (!empty($_smarty_tpl->tpl_vars['files']->value)){?>
    <a href="javascript:history.go(-1)" class="button_new">Назад</a>
    <table class="datatable display">
        <thead>
        <tr>
            <th>№</th>
            <th><b>Название</b></th>
            <th><b>URL</b></th>
            <th><b>Действия</b></th>
        </tr>
        </thead>
        <tbody>
        <?php $_smarty_tpl->tpl_vars["n"] = new Smarty_variable(0, null, 0);?>
        <?php  $_smarty_tpl->tpl_vars["file"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["file"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["file"]->key => $_smarty_tpl->tpl_vars["file"]->value){
$_smarty_tpl->tpl_vars["file"]->_loop = true;
?>
            <?php $_smarty_tpl->tpl_vars['n'] = new Smarty_variable($_smarty_tpl->tpl_vars['n']->value+1, null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['file']->value=='.'||$_smarty_tpl->tpl_vars['file']->value=='..'){?><?php $_smarty_tpl->tpl_vars['n'] = new Smarty_variable($_smarty_tpl->tpl_vars['n']->value-1, null, 0);?><?php continue 1?><?php }?>
            <tr class="odd gradeA">
                <td style="width: 60px;"><?php echo $_smarty_tpl->tpl_vars['n']->value;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['file']->value;?>
</td>
                <td><a href="../downloads/<?php echo $_smarty_tpl->tpl_vars['file']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/downloads/<?php echo $_smarty_tpl->tpl_vars['file']->value;?>
</a></td>
                <td style="width: 70px;">
                    <a href="?page=downloads&action=del&name=<?php echo $_smarty_tpl->tpl_vars['file']->value;?>
" onclick="return confirmDelete();">
						<span class="icon_cont icon_cont_del" title="Удалить запись">
						</span>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php }else{ ?>
    <?php echo error('На данный момент разделов нет');?>

    <a href="javascript:history.go(-1)" class="button_new">Назад</a>
    <a href="?page=menu&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button_new">Добавить раздел</a>
<?php }?><?php }} ?>