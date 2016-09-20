<?php /* Smarty version Smarty 3.1.4, created on 2016-02-24 19:28:47
         compiled from "templates\pages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17629523863d9df13d4-13826319%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4966008db247159c5793f305bdbc3a662460a4a1' => 
    array (
      0 => 'templates\\pages.tpl',
      1 => 1456331314,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17629523863d9df13d4-13826319',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_523863da0b0b6',
  'variables' => 
  array (
    'action' => 0,
    'lang_text' => 0,
    'pages' => 0,
    'id' => 0,
    'id_cat' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_523863da0b0b6')) {function content_523863da0b0b6($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='show'){?>
    <?php echo adminTitle($_smarty_tpl->tpl_vars['lang_text']->value['mod_pages']);?>

    <?php if (!empty($_smarty_tpl->tpl_vars['pages']->value)){?>
    <?php if (isset($_smarty_tpl->tpl_vars['id']->value)&&$_smarty_tpl->tpl_vars['id']->value!=0){?>
        <a href="?page=pages&id=<?php echo $_smarty_tpl->tpl_vars['id_cat']->value;?>
" class="button"><img src="img/icons/back.png" alt=""/> <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['back'];?>
</a>
    <?php }?>
    <a href="?page=pages&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['pages_add_but'];?>
</a>
    <table class="dt-pages display">
		<thead>
			<tr>
				<th>ID</th>
				<th><b><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['name'];?>
</b></th>
                <th><b><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['link'];?>
</b></th>
				<th><b><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['actions'];?>
</b></th>
			</tr>
		</thead>
		<tbody>
            <?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['page']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value){
$_smarty_tpl->tpl_vars['page']->_loop = true;
?>
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['page']->value['name'];?>
</td>
                <td>
                <?php if (strlen($_smarty_tpl->tpl_vars['page']->value['link'])>0){?>
                    ../<?php echo $_smarty_tpl->tpl_vars['page']->value['link'];?>

                <?php }else{ ?>
                    ../page/<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>

                <?php }?>
                </td>
				<td style="width: 120px; text-align: center;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=pages&action=show&id=<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
">
            						<span class="icon_cont icon_cont_more" title="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['sub'];?>
">
            						</span>
            					</a>
                            </td>
                            <td>
                                <a href="?page=pages&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
">
                                	<span class="icon_cont icon_cont_edit" title="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['edit'];?>
">
                                	</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['pages_delete'];?>
', '<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['pages_delete_message'];?>
', '?page=pages&action=del&id=<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
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
        <?php echo error($_smarty_tpl->tpl_vars['lang_text']->value['pages_empty']);?>

        <?php if (isset($_smarty_tpl->tpl_vars['id']->value)&&$_smarty_tpl->tpl_vars['id']->value!=0){?>
        <a href="?page=pages&id=<?php echo $_smarty_tpl->tpl_vars['id_cat']->value;?>
" class="button"><img src="img/icons/back.png" alt=""/> <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['back'];?>
</a>
        <?php }?>
        <a href="?page=pages&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['pages_add_but'];?>
</a>
    <?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='add'){?>
    <?php echo adminTitle((((('<a href="?page=pages">').($_smarty_tpl->tpl_vars['lang_text']->value['mod_pages'])).('</a> / ')).($_smarty_tpl->tpl_vars['lang_text']->value['pages_add'])).(''));?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['back'];?>
</a>
    <form action="?page=pages&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly">
        <table>
            <tr>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['name'];?>
:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['enter'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['pages_name'];?>
" maxlength="128" size="32" require="true" label="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['pages_name'];?>
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
                    /<input id="addr" type="text" name="link" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['enter'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['pages_link'];?>
" maxlength="128" size="31" />
                    <input id="addr_table" type="hidden" name="table" value="pages" />
                    <a href="javascript: void(0);" title="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['link_help'];?>
" class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
                    <span id="addr_text"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['text'];?>
:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['enter'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['text'];?>
"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['enter'];?>
 title"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['enter'];?>
 description"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['enter'];?>
 keywords"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['add'];?>
" class="button" />
                </td>
            </tr>
        </table>	
	</form>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='edit'){?>
    <?php echo adminTitle((((('<a href="?page=pages">').($_smarty_tpl->tpl_vars['lang_text']->value['mod_pages'])).('</a> / ')).($_smarty_tpl->tpl_vars['lang_text']->value['pages_edit'])).(''));?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['back'];?>
</a>
    <form action="?page=pages&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly">
        <table>
            <tr>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['name'];?>
:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['enter'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['pages_name'];?>
" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['page']->value['name']);?>
" maxlength="128" size="32" require="true" label="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['pages_name'];?>
" />
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['link'];?>
:
                </td>
                <td>
                    <input id="addr2" type="hidden" name="addr2" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['addr'];?>
" />
                    /<input id="addr" type="text" name="link" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['enter'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['pages_link'];?>
" maxlength="128" size="31" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['link'];?>
" />
                    <input id="addr_table" type="hidden" name="table" value="pages" />
                    <a href="javascript: void(0);" title="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['link_help'];?>
" class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
                    <span id="addr_text"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['text'];?>
:
                </td>
                <td>
                    <textarea name="text" rows="20" class="ckeditor" cols="60"><?php echo stripslashes($_smarty_tpl->tpl_vars['page']->value['text']);?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['enter'];?>
 title"><?php echo stripslashes($_smarty_tpl->tpl_vars['page']->value['title']);?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['enter'];?>
 description"><?php echo stripslashes($_smarty_tpl->tpl_vars['page']->value['description']);?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['enter'];?>
 keywords"><?php echo stripslashes($_smarty_tpl->tpl_vars['page']->value['keywords']);?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['edit'];?>
" class="button" />
                </td>
            </tr>
        </table>	
	</form>
<?php }?><?php }} ?>