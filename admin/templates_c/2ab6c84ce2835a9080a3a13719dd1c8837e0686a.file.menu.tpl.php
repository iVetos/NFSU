<?php /* Smarty version Smarty 3.1.4, created on 2016-04-24 17:10:23
         compiled from "templates\menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22610523863dc93c9a1-26699055%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ab6c84ce2835a9080a3a13719dd1c8837e0686a' => 
    array (
      0 => 'templates\\menu.tpl',
      1 => 1461507020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22610523863dc93c9a1-26699055',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_523863dca97d8',
  'variables' => 
  array (
    'action' => 0,
    'lang_text' => 0,
    'menu' => 0,
    'id' => 0,
    'id_cat' => 0,
    'page' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_523863dca97d8')) {function content_523863dca97d8($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='show'){?>
    <?php echo adminTitle($_smarty_tpl->tpl_vars['lang_text']->value['mod_menu']);?>

    <?php if (!empty($_smarty_tpl->tpl_vars['menu']->value)){?>
    <?php if (isset($_smarty_tpl->tpl_vars['id']->value)&&$_smarty_tpl->tpl_vars['id']->value!=0){?>
        <a href="?page=menu&id=<?php echo $_smarty_tpl->tpl_vars['id_cat']->value;?>
" class="button"><img src="img/icons/back.png" alt=""/> <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['back'];?>
</a>
    <?php }?>
    <a href="?page=menu&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['menu_add_but'];?>
</a>
    <a href="?page=menu&action=sort&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/sort.png" alt=""/><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['menu_order'];?>
</a>
    <table class="dt-menu display">
		<thead>
			<tr>
				<th>ID</th>
				<th><b><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['name'];?>
</b></th>
                <th><b><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['link'];?>
</b></th>
                <th><b><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['order'];?>
</b></th>
				<th><b><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['actions'];?>
</b></th>
			</tr>
		</thead>
		<tbody>
            <?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['page']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value){
$_smarty_tpl->tpl_vars['page']->_loop = true;
?>
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['page']->value['name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['page']->value['link'];?>
</td>
                <td style="width: 90px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['page']->value['sort'];?>
</td>
				<td style="width: 120px;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=menu&action=show&id=<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
">
            						<span class="icon_cont icon_cont_more" title="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['sub'];?>
">
            						</span>
            					</a>
                            </td>
                            <td>
                                <a href="?page=menu&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
">
                                	<span class="icon_cont icon_cont_edit" title="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['edit'];?>
">
                                	</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['menu_delete'];?>
', '<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['menu_delete_message'];?>
', '?page=menu&action=del&id=<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
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
        <?php echo error($_smarty_tpl->tpl_vars['lang_text']->value['menu_empty']);?>

        <?php if (isset($_smarty_tpl->tpl_vars['id']->value)&&$_smarty_tpl->tpl_vars['id']->value!=0){?>
        <a href="?page=menu&id=<?php echo $_smarty_tpl->tpl_vars['id_cat']->value;?>
" class="button"><img src="img/icons/back.png" alt=""/> <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['back'];?>
</a>
        <?php }?>
        <a href="?page=menu&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['menu_add'];?>
</a>
    <?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='add'){?>
    <?php echo adminTitle((((('<a href="?page=menu">').($_smarty_tpl->tpl_vars['lang_text']->value['mod_menu'])).('</a> / ')).($_smarty_tpl->tpl_vars['lang_text']->value['menu_add'])).(''));?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['back'];?>
</a>
    <form action="?page=menu&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly">
        <table>
            <tr>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['name'];?>
:
                </td>
                <td>
                    <input type="text" name="name" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['enter'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['menu_name'];?>
" maxlength="128" size="32" require="true" label="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['menu_name'];?>
" />
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['link'];?>
:
                </td>
                <td>
                    <input type="text" name="link" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['enter'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['menu_link'];?>
" maxlength="256" size="32" require="true" label="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['menu_link'];?>
" />
                    <a href="javascript: void(0);" title="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['link_help'];?>
" class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
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
    <?php echo adminTitle((((('<a href="?page=menu">').($_smarty_tpl->tpl_vars['lang_text']->value['mod_menu'])).('</a> / ')).($_smarty_tpl->tpl_vars['lang_text']->value['menu_edit'])).(''));?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['back'];?>
</a>
    <form action="?page=menu&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly">
        <table>
            <tr>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['name'];?>
:
                </td>
                <td>
                    <input type="text" name="name" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['enter'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['menu_name'];?>
" maxlength="128" size="32" require="true" label="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['menu_name'];?>
" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['menu']->value['name']);?>
" />
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['link'];?>
:
                </td>
                <td>
                    <input type="text" name="link" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['enter'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['menu_link'];?>
" maxlength="256" size="32" require="true" label="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['menu_link'];?>
" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['menu']->value['link']);?>
" />
                    <a href="javascript: void(0);" title="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['link_help'];?>
" class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
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
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='sort'){?>
<?php echo adminTitle((((('<a href="?page=menu">').($_smarty_tpl->tpl_vars['lang_text']->value['mod_menu'])).('</a> / ')).($_smarty_tpl->tpl_vars['lang_text']->value['menu_order'])).(''));?>

<span id="page_id" class="none"><?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</span>
<a href="?page=menu&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/back.png" alt=""/> <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['back'];?>
</a>
<ul id="sortable">
    <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["menu"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value){
$_smarty_tpl->tpl_vars["item"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["menu"]['iteration']++;
?>
    <li id="id-<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><span><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['menu']['iteration'];?>
</span> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</li>
    <?php } ?>
</ul>
<?php }?><?php }} ?>