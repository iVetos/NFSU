<?php /* Smarty version Smarty 3.1.4, created on 2016-05-02 18:01:34
         compiled from "templates\news.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9248523863e0d9a8f7-33066093%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31c37decccd2cdd082da45d0f83811131735659e' => 
    array (
      0 => 'templates\\news.tpl',
      1 => 1462201290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9248523863e0d9a8f7-33066093',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_523863e1019df',
  'variables' => 
  array (
    'action' => 0,
    'news' => 0,
    'article' => 0,
    'tags' => 0,
    'tag' => 0,
    'id' => 0,
    'curTags' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_523863e1019df')) {function content_523863e1019df($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='show'){?>
    <?php echo adminTitle('Новости');?>

    <?php if (!empty($_smarty_tpl->tpl_vars['news']->value)){?>
    <a href="?page=news&action=add" class="button"><img src="img/icons/plus.png" alt=""/>Добавить новость</a>
    <table class="dt_three display">
		<thead>
			<tr>
				<th>ID</th>
				<th><b>Название</b></th>
				<th><b>Действия</b></th>
			</tr>
		</thead>
		<tbody>
            <?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value){
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['article']->value['name'];?>
</td>
                <td style="width: 80px; text-align: center;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=news&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">
                                	<span class="icon_cont icon_cont_edit" title="Редактировать запись">
                                	</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Удаление новости', 'Вы подтверждаете удаление новости?', '?page=news&action=del&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
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
        <?php echo error('Новости ещё не добавлены');?>

        <a href="?page=news&action=add" class="button"><img src="img/icons/plus.png" alt=""/>Добавить новость</a>
    <?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='add'){?>
    <?php echo adminTitle('<a href="?page=news">Новости</a> / Добавление новости');?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <form action="?page=news&action=add" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="Введите название новости" maxlength="128" size="32" require="true" label="название новости" />
                </td>
            </tr>
            <tr>
                <td>
                    Адрес:
                </td>
                <td>
                    <input id="addr2" type="hidden" name="addr2" value="" />
                    /news/<input id="addr" type="text" name="addr" placeholder="Введите адрес страницы" maxlength="128" size="26" />
                    <input id="addr_table" type="hidden" name="table" value="news" />
                    <a href="javascript: void(0);" title="Этот адрес будет отображаться после адреса сайта. Например, http://up-studio.net/ваше_название." class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
                    <span id="addr_text"></span>
                </td>
            </tr>
            <?php if (@__CONST_NEWS_COVER){?>
            <tr>
                <td>
                    Обложка:
                </td>
                <td>
                    <input type="file" name="img" />&nbsp;
                </td>
            </tr>
            <?php }?>
            <tr>
                <td>
                    Дата:
                </td>
                <td>
                    <input type="text" name="date" placeholder="Введите дату" maxlength="128" size="32" class="datepicker" value="<?php echo date('Y-m-d');?>
" />
                </td>
            </tr>
            <?php if (@__CONST_NEWS_TAGS){?>
            <tr>
                <td>
                    Теги:
                </td>
                <td style="padding-bottom: 10px;">
                    <input id="tags_field" type="text" placeholder="Введите теги через пробел" maxlength="128" size="32"/>
                    <input id="tags" type="hidden" name="tags"/>
                    <span id="tags_add" class="button3"><img src="img/icons/plus.png" alt=""/> Добавить</span><br />
                    <div id="tags_cur"></div>
                    <div class="clear"></div>
                    <?php if (!empty($_smarty_tpl->tpl_vars['tags']->value)){?>
                    <span id="tags_but">Доступные теги</span>
                    <div id="tags_all">
                        <?php  $_smarty_tpl->tpl_vars["tag"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["tag"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["tag"]->key => $_smarty_tpl->tpl_vars["tag"]->value){
$_smarty_tpl->tpl_vars["tag"]->_loop = true;
?><span><?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
</span> <?php } ?>
                    </div>
                    <div class="clear"></div>
                    <?php }?>
                    <div id="tags_del"></div>
                </td>
            </tr>
            <?php }?>
            <tr>
                <td>
                    Краткое описание:
                </td>
                <td>
                    <textarea name="text_s" rows="15" cols="60" class="ckeditor"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Полное описание:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor"></textarea>
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
    <?php echo adminTitle('<a href="?page=news">Новости</a> / Редактирование новости');?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <form action="?page=news&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="Введите название новости" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['news']->value['name']);?>
" maxlength="128" size="32" require="true" label="название новости" />
                </td>
            </tr>
            <tr>
                <td>
                    Адрес:
                </td>
                <td>
                    <input id="addr2" type="hidden" name="addr2" value="<?php echo $_smarty_tpl->tpl_vars['news']->value['link'];?>
" />
                    /news/<input id="addr" type="text" name="addr" placeholder="Введите адрес страницы" maxlength="128" size="26" value="<?php echo $_smarty_tpl->tpl_vars['news']->value['link'];?>
" />
                    <input id="addr_table" type="hidden" name="table" value="news" />
                    <a href="javascript: void(0);" title="Этот адрес будет отображаться после адреса сайта. Например, http://up-studio.net/ваше_название." class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
                    <span id="addr_text"></span>
                </td>
            </tr>
            <?php if (@__CONST_NEWS_COVER){?>
            <tr>
                <td>
                    Обложка:
                </td>
                <td>
                    <input type="file" name="img" />&nbsp;
                </td>
            </tr>
            <?php }?>
            <tr>
                <td>
                    Дата:
                </td>
                <td>
                    <input type="text" name="date" placeholder="Введите дату" maxlength="128" size="32" class="datepicker" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['news']->value['date']);?>
" />
                </td>
            </tr>
            <?php if (@__CONST_NEWS_TAGS){?>
            <tr>
                <td>
                    Теги:
                </td>
                <td style="padding-bottom: 10px;">
                    <input id="tags_field" type="text" placeholder="Введите теги через пробел" maxlength="128" size="32"/>
                    <input id="tags" type="hidden" name="tags" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['news']->value['tags']);?>
"/>
                    <span id="tags_add" class="button3"><img src="img/icons/plus.png" alt=""/></span><br />
                    <div id="tags_cur">
                    <?php if (!empty($_smarty_tpl->tpl_vars['curTags']->value)){?>
                        <?php  $_smarty_tpl->tpl_vars["tag"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["tag"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['curTags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["tag"]->key => $_smarty_tpl->tpl_vars["tag"]->value){
$_smarty_tpl->tpl_vars["tag"]->_loop = true;
?><span><img src="/admin/img/icons/dels.png" alt="" /><?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
</span> <?php } ?>
                    <?php }?>
                    </div>
                    <div class="clear"></div>
                    <?php if (!empty($_smarty_tpl->tpl_vars['tags']->value)){?>
                    <span id="tags_but">Доступные теги</span>
                    <div id="tags_all">
                        <?php  $_smarty_tpl->tpl_vars["tag"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["tag"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["tag"]->key => $_smarty_tpl->tpl_vars["tag"]->value){
$_smarty_tpl->tpl_vars["tag"]->_loop = true;
?><span><?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
</span> <?php } ?>
                    </div>
                    <div class="clear"></div>
                    <?php }?>
                    <div id="tags_del"></div>
                </td>
            </tr>
            <?php }?>
            <tr>
                <td>
                    Краткое описание:
                </td>
                <td>
                    <textarea name="text_s" rows="15" cols="60" class="ckeditor"><?php echo stripslashes($_smarty_tpl->tpl_vars['news']->value['text_s']);?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Текст:
                </td>
                <td>
                    <textarea name="text" rows="20" class="ckeditor" cols="60"><?php echo stripslashes($_smarty_tpl->tpl_vars['news']->value['text']);?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Введите метатег title"><?php echo stripslashes($_smarty_tpl->tpl_vars['news']->value['title']);?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Введите метатег description"><?php echo stripslashes($_smarty_tpl->tpl_vars['news']->value['description']);?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Введите метатег keywords"><?php echo stripslashes($_smarty_tpl->tpl_vars['news']->value['keywords']);?>
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