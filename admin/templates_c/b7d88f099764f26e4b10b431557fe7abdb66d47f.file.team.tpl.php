<?php /* Smarty version Smarty 3.1.4, created on 2016-09-08 20:25:28
         compiled from "templates\team.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201165726ef98efb829-93738962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7d88f099764f26e4b10b431557fe7abdb66d47f' => 
    array (
      0 => 'templates\\team.tpl',
      1 => 1473355527,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201165726ef98efb829-93738962',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5726ef99237e1',
  'variables' => 
  array (
    'action' => 0,
    'page_name' => 0,
    'some' => 0,
    'page_addr' => 0,
    'id' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5726ef99237e1')) {function content_5726ef99237e1($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='show'){?>
    <?php echo adminTitle($_smarty_tpl->tpl_vars['page_name']->value);?>

    <?php if (!empty($_smarty_tpl->tpl_vars['some']->value)){?>
    <a href="?page=<?php echo $_smarty_tpl->tpl_vars['page_addr']->value;?>
&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/>Добавить запись</a>
    <table class="dt_pages display">
		<thead>
			<tr>
				<th>ID</th>
				<th><b>Имя</b></th>
                <th><b>Должность</b></th>
				<th><b>Действия</b></th>
			</tr>
		</thead>
		<tbody>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['some']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['post'];?>
</td>
				<td style="width: 80px; text-align: center;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=<?php echo $_smarty_tpl->tpl_vars['page_addr']->value;?>
&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                	<span class="icon_cont icon_cont_edit" title="Редактировать запись">
                                	</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Удаление записи', 'Вы подтверждаете удаление записи?', '?page=<?php echo $_smarty_tpl->tpl_vars['page_addr']->value;?>
&action=del&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');">
            						<span class="icon_cont icon_cont_del" title="Удалить запись">
            						</span>
            					</a>
                            </td>
                        </tr>
                    </table>
				</td>
			</tr>
            <?php } ?>
		</tbody>
	</table>
    <?php }else{ ?>
        <?php echo error('Членов команды пока нет');?>

        <a href="?page=<?php echo $_smarty_tpl->tpl_vars['page_addr']->value;?>
&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/>Добавить запись</a>
    <?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='add'){?>
    <?php echo adminTitle('<a href="?page=team">Наша команда</a> / Добавление записи');?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <form action="?page=<?php echo $_smarty_tpl->tpl_vars['page_addr']->value;?>
&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Имя:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="Введите имя" maxlength="128" size="32" require="true" label="имя" />
                </td>
            </tr>
            <tr>
                <td>
                    Должность:
                </td>
                <td>
                    <input type="text" name="post" placeholder="Введите должность" maxlength="128" size="32" />
                </td>
            </tr>
            <tr>
                <td>
                    Изображение:
                </td>
                <td>
                    <input type="file" name="img" />&nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    Вконтакте:
                </td>
                <td>
                    <input type="text" name="post" placeholder="Введите ссылку на вконтакте" maxlength="128" size="32" />
                </td>
            </tr>
            <tr>
                <td>
                    Facebook:
                </td>
                <td>
                    <input type="text" name="post" placeholder="Введите ссылку на facebook" maxlength="128" size="32" />
                </td>
            </tr>
            <tr>
                <td>
                    Сайт:
                </td>
                <td>
                    <input type="text" name="post" placeholder="Введите адрес сайта" maxlength="128" size="32" />
                </td>
            </tr>
            <tr>
                <td>
                    Краткое описание:
                </td>
                <td>
                    <textarea name="text_s" rows="20" cols="60" class="ckeditor" placeholder="Введите текст записи"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Описание:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor" placeholder="Введите текст записи"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Введите метатег title"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Введите метатег description"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Введите метатег keywords"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <input type="submit" value="Добавить" class="button" />
                </td>
            </tr>
        </table>	
	</form>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='edit'){?>
    <?php echo adminTitle('<a href="?page=team">Наша команда</a> / Редактирование записи');?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <form action="?page=<?php echo $_smarty_tpl->tpl_vars['page_addr']->value;?>
&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Имя:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="Введите имя" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['some']->value['name']);?>
" maxlength="128" size="32" require="true" label="имя" />
                </td>
            </tr>
            <tr>
                <td>
                    Должность:
                </td>
                <td>
                    <input type="text" name="post" placeholder="Введите должность" maxlength="128" size="32" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['some']->value['post']);?>
" />
                </td>
            </tr>
            <tr>
                <td>
                    Изображение:
                </td>
                <td>
                    <input type="file" name="img" />&nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    Вконтакте:
                </td>
                <td>
                    <input type="text" name="post" placeholder="Введите ссылку на вконтакте" maxlength="128" size="32" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['some']->value['post']);?>
" />
                </td>
            </tr>
            <tr>
                <td>
                    Facebook:
                </td>
                <td>
                    <input type="text" name="post" placeholder="Введите ссылку на facebook" maxlength="128" size="32" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['some']->value['post']);?>
" />
                </td>
            </tr>
            <tr>
                <td>
                    Сайт:
                </td>
                <td>
                    <input type="text" name="post" placeholder="Введите адрес сайта" maxlength="128" size="32" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['some']->value['post']);?>
" />
                </td>
            </tr>
            <tr>
                <td>
                    Краткое описание:
                </td>
                <td>
                    <textarea name="text_s" rows="20" cols="60" class="ckeditor" placeholder="Введите текст записи"><?php echo $_smarty_tpl->tpl_vars['some']->value['text_s'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Описание:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor" placeholder="Введите текст записи"><?php echo $_smarty_tpl->tpl_vars['some']->value['text'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Введите метатег title"><?php echo $_smarty_tpl->tpl_vars['some']->value['title'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Введите метатег description"><?php echo $_smarty_tpl->tpl_vars['some']->value['description'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Введите метатег keywords"><?php echo $_smarty_tpl->tpl_vars['some']->value['keywords'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <input type="submit" value="Изменить" class="button" />
                </td>
            </tr>
        </table>	
	</form>
<?php }?><?php }} ?>