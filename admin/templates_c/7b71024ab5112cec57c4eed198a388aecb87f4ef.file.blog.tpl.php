<?php /* Smarty version Smarty 3.1.4, created on 2015-10-08 20:32:14
         compiled from "templates\blog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2738856168a8299ecc5-03665014%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b71024ab5112cec57c4eed198a388aecb87f4ef' => 
    array (
      0 => 'templates\\blog.tpl',
      1 => 1444325449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2738856168a8299ecc5-03665014',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_56168a82bba1b',
  'variables' => 
  array (
    'action' => 0,
    'lang_text' => 0,
    'articles' => 0,
    'article' => 0,
    'tags' => 0,
    'tag' => 0,
    'id' => 0,
    'curTags' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56168a82bba1b')) {function content_56168a82bba1b($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='show'){?>
    <?php echo adminTitle($_smarty_tpl->tpl_vars['lang_text']->value['mod_blog']);?>

    <?php if (!empty($_smarty_tpl->tpl_vars['articles']->value)){?>
    <a href="?page=blog&action=add" class="button"><img src="img/icons/plus.png" alt=""/><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['blog_add_but'];?>
</a>
    <table class="dt_three display">
		<thead>
			<tr>
				<th>ID</th>
				<th><b><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['name'];?>
</b></th>
				<th><b><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['actions'];?>
</b></th>
			</tr>
		</thead>
		<tbody>
            <?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                                <a href="?page=articles&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">
                                	<span class="icon_cont icon_cont_edit" title="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['edit'];?>
">
                                	</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['blog_delete'];?>
', '<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['blog_delete_message'];?>
', '?page=articles&action=del&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
');">
            						<span class="icon_cont icon_cont_del" title="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['delete'];?>
">
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
        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['blog_empty'];?>
<?php $_tmp1=ob_get_clean();?><?php echo error($_tmp1);?>

        <a href="?page=blog&action=add" class="button"><img src="img/icons/plus.png" alt=""/><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['blog_add_but'];?>
</a>
    <?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='add'){?>
    <?php echo adminTitle((((('<a href="?page=blog">').($_smarty_tpl->tpl_vars['lang_text']->value['mod_blog'])).('</a> / ')).($_smarty_tpl->tpl_vars['lang_text']->value['blog_add'])).(''));?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['back'];?>
</a>
    <form action="?page=articles&action=add" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['name'];?>
:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['enter'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['blog_name'];?>
" maxlength="128" size="32" require="true" label="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['blog_name'];?>
" />
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['link'];?>
:
                </td>
                <td>
                    <input id="addr2" type="hidden" name="addr2" value="" />
                    /articles/<input id="addr" type="text" name="link" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['enter'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['blog_link'];?>
" maxlength="128" size="24" />
                    <input id="addr_table" type="hidden" name="table" value="articles" />
                    <a href="javascript: void(0);" title="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['link_help'];?>
" class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
                    <span id="addr_text"></span>
                </td>
            </tr>
            <?php if (@__CONST_ARTICLES_COVER){?>
            <tr>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['cover'];?>
:
                </td>
                <td>
                    <input type="file" name="img" />&nbsp;
                </td>
            </tr>
            <?php }?>
            <tr>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['date'];?>

                </td>
                <td>
                    <input type="text" name="date" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['enter'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['date_add'];?>
" maxlength="128" size="32" class="datepicker" value="<?php echo date('Y-m-d');?>
" />
                </td>
            </tr>
            <?php if (@__CONST_ARTICLES_TAGS){?>
            <tr>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['tags'];?>
:
                </td>
                <td style="padding-bottom: 10px;">
                    <input id="tags_field" type="text" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['tags_add'];?>
" maxlength="128" size="32"/>
                    <input id="tags" type="hidden" name="tags"/>
                    <span id="tags_add" class="button3"><img src="img/icons/plus.png" alt=""/></span><br />
                    <div id="tags_cur"></div>
                    <div class="clear"></div>
                    <?php if (!empty($_smarty_tpl->tpl_vars['tags']->value)){?>
                    <span id="tags_but"><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['tags_avaible'];?>
</span>
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
    <?php echo adminTitle('<a href="?page=articles">Статьи</a> / Редактирование статьи');?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <a href="?page=help&cat=articles#actions-edit" class="button"><img src="img/icons/help.png" alt=""/>Справка</a>
    <form action="?page=articles&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="Введите название статьи" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['articles']->value['name']);?>
" maxlength="128" size="32" require="true" label="название статьи" />
                </td>
            </tr>
            <tr>
                <td>
                    Адрес:
                </td>
                <td>
                    <input id="addr2" type="hidden" name="addr2" value="<?php echo $_smarty_tpl->tpl_vars['articles']->value['addr'];?>
" />
                    /articles/<input id="addr" type="text" name="addr" placeholder="Введите адрес страницы" maxlength="128" size="24" value="<?php echo $_smarty_tpl->tpl_vars['articles']->value['addr'];?>
" />
                    <input id="addr_table" type="hidden" name="table" value="articles" />
                    <a href="javascript: void(0);" title="Этот адрес будет отображаться после адреса сайта. Например, http://up-studio.net/ваше_название." class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
                    <span id="addr_text"></span>
                </td>
            </tr>
            <?php if (@__CONST_ARTICLES_COVER){?>
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
                    <input type="text" name="date" placeholder="Введите дату" maxlength="128" size="32" class="datepicker" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['articles']->value['date']);?>
" />
                </td>
            </tr>
            <?php if (@__CONST_ARTICLES_TAGS){?>
            <tr>
                <td>
                    Теги:
                </td>
                <td style="padding-bottom: 10px;">
                    <input id="tags_field" type="text" placeholder="Введите теги через пробел" maxlength="128" size="32"/>
                    <input id="tags" type="hidden" name="tags" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['articles']->value['tags']);?>
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
                    <textarea name="text_s" rows="15" cols="60" class="ckeditor"><?php echo stripslashes($_smarty_tpl->tpl_vars['articles']->value['text_s']);?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Текст:
                </td>
                <td>
                    <textarea name="text" rows="20" class="ckeditor" cols="60"><?php echo stripslashes($_smarty_tpl->tpl_vars['articles']->value['text']);?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Введите метатег title"><?php echo stripslashes($_smarty_tpl->tpl_vars['articles']->value['title']);?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Введите метатег description"><?php echo stripslashes($_smarty_tpl->tpl_vars['articles']->value['description']);?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Введите метатег keywords"><?php echo stripslashes($_smarty_tpl->tpl_vars['articles']->value['keywords']);?>
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