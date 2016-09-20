<?php /* Smarty version Smarty 3.1.4, created on 2014-12-09 11:18:06
         compiled from "templates\admins.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1591454857f81082e06-78679635%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2d902bf5b5296d4053d99b982e7269f6ccb8a43' => 
    array (
      0 => 'templates\\admins.tpl',
      1 => 1418116623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1591454857f81082e06-78679635',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_54857f81178d9',
  'variables' => 
  array (
    'action' => 0,
    'admins' => 0,
    'admin' => 0,
    'types' => 0,
    'type' => 0,
    'id' => 0,
    'modules' => 0,
    'module' => 0,
    'mod' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54857f81178d9')) {function content_54857f81178d9($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='show'){?>
    <?php echo adminTitle('Пользователи');?>

    <?php if (!empty($_smarty_tpl->tpl_vars['admins']->value)){?>
    <a href="?page=admins&action=add" class="button"><img src="img/icons/plus.png" alt=""/>Добавить пользователя</a>
    <a href="?page=admins&action=types" class="button"><img src="img/icons/tm.png" alt=""/>Типы пользователей</a>
    <a href="?page=help&cat=admins" class="button"><img src="img/icons/help.png" alt=""/>Справка по разделу</a>
    <table class="dt_admins display">
		<thead>
			<tr>
				<th>#</th>
				<th><b>Имя</b></th>
                <th><b>Тип</b></th>
                <th><b>Последний вход</b></th>
				<th><b>Действия</b></th>
			</tr>
		</thead>
		<tbody>
            <?php  $_smarty_tpl->tpl_vars["admin"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["admin"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['admins']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["admins"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["admin"]->key => $_smarty_tpl->tpl_vars["admin"]->value){
$_smarty_tpl->tpl_vars["admin"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["admins"]['iteration']++;
?>
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;"><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['admins']['iteration'];?>
</td>
				<td style="width: 360px;"><?php echo $_smarty_tpl->tpl_vars['admin']->value['name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['admin']->value['level'];?>
</td>
                <td><?php if ($_smarty_tpl->tpl_vars['admin']->value['last_date']=='0000-00-00 00:00:00'){?>Ещё не заходил<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['admin']->value['last_date'];?>
<?php }?></td>
                <td style="width: 80px; text-align: center;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=admins&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['admin']->value['id'];?>
">
                                	<span class="icon_cont icon_cont_edit" title="Редактировать запись">
                                	</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Удаление пользователя', 'Вы подтверждаете удаление пользователя?', '?page=admins&action=del&id=<?php echo $_smarty_tpl->tpl_vars['admin']->value['id'];?>
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
        <?php echo error('Нет других пользователей');?>

        <a href="?page=admins&action=add" class="button"><img src="img/icons/plus.png" alt=""/>Добавить пользователя</a>
        <a href="?page=admins&action=types" class="button"><img src="img/icons/tm.png" alt=""/>Типы пользователей</a>
        <a href="?page=help&cat=admins" class="button"><img src="img/icons/help.png" alt=""/>Справка по разделу</a>
    <?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='add'){?>
    <?php echo adminTitle('<a href="?page=admins">Пользователи</a> / Добавление пользователя');?>

    <a href="page=admins" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <a href="?page=help&cat=admins#actions-add" class="button"><img src="img/icons/help.png" alt=""/>Справка</a>
    <form action="?page=admins&action=add" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Имя:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите имя пользователя" maxlength="128" size="32" require="true" label="имя пользователя" />
                </td>
            </tr>
            <tr>
                <td>
                    Тип:
                </td>
                <td>
                    <select size="1" name="level">
                        <?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value){
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['type']->value['name'];?>
</option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Логин:
                </td>
                <td>
                    <input type="text" name="login" placeholder="Введите логин" maxlength="64" size="32" require="true" label="логин" />
                </td>
            </tr>
            <tr>
                <td>
                    Пароль:
                </td>
                <td>
                    <input type="text" name="pass" placeholder="Введите пароль" maxlength="64" size="32" require="true" label="пароль" />
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
    <?php echo adminTitle('<a href="?page=admins">Пользователи</a> / Редактирование пользователя');?>

    <a href="page=admins" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <a href="?page=help&cat=admins#actions-edit" class="button"><img src="img/icons/help.png" alt=""/>Справка</a>
    <form action="?page=admins&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Имя:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите имя пользователя" maxlength="128" size="32" require="true" label="имя пользователя" value="<?php echo $_smarty_tpl->tpl_vars['admin']->value['name'];?>
" />
                </td>
            </tr>
            <tr>
                <td>
                    Тип:
                </td>
                <td>
                    <select size="1" name="level">
                        <?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value){
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['type']->value['id']==$_smarty_tpl->tpl_vars['admin']->value['id_level']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['type']->value['name'];?>
</option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Логин:
                </td>
                <td>
                    <input type="text" name="login" placeholder="Введите логин" maxlength="64" size="32" require="true" label="логин" value="<?php echo $_smarty_tpl->tpl_vars['admin']->value['login'];?>
" />
                </td>
            </tr>
            <tr>
                <td>
                    Пароль:
                </td>
                <td>
                    <input type="text" name="pass" placeholder="Введите пароль" maxlength="64" size="32" require="true" label="пароль" value="<?php echo $_smarty_tpl->tpl_vars['admin']->value['pass'];?>
" />
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
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='types'){?>
    <?php echo adminTitle('<a href="?page=admins">Пользователи</a> / Типы пользователей');?>

    <?php if (!empty($_smarty_tpl->tpl_vars['types']->value)){?>
    <a href="?page=admins&action=add_type" class="button"><img src="img/icons/plus.png" alt=""/>Добавить тип пользователя</a>
    <a href="?page=help&cat=admins#types" class="button"><img src="img/icons/help.png" alt=""/>Справка по разделу</a>
    <table class="dt_three display">
		<thead>
			<tr>
				<th>#</th>
				<th><b>Название</b></th>
				<th><b>Действия</b></th>
			</tr>
		</thead>
		<tbody>
            <?php  $_smarty_tpl->tpl_vars["type"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["type"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["types"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["type"]->key => $_smarty_tpl->tpl_vars["type"]->value){
$_smarty_tpl->tpl_vars["type"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["types"]['iteration']++;
?>
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;"><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['types']['iteration'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['type']->value['name'];?>
</td>
                <td style="width: 80px; text-align: center;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=admins&action=edit_type&id=<?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
">
                                	<span class="icon_cont icon_cont_edit" title="Редактировать запись">
                                	</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Удаление типа пользователей', 'Если Вы удалите тип пользователя, то удалятся и пользователи <br/> данного типа. Это действие невозможно будет отменить. <br/><br/> Вы подтверждаете удаление типа пользователей?', '?page=admins&action=del_type&id=<?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
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
        <?php echo error('Нет других пользователей');?>

        <a href="?page=admins&action=add" class="button"><img src="img/icons/plus.png" alt=""/>Добавить пользователя</a>
        <a href="?page=admins&action=types" class="button"><img src="img/icons/tm.png" alt=""/>Типы пользователей</a>
        <a href="?page=help&cat=admins" class="button"><img src="img/icons/help.png" alt=""/>Справка по разделу</a>
    <?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='add_type'){?>
    <?php echo adminTitle('<a href="?page=admins">Пользователи</a> / <a href="?page=admins&action=types">Типы пользователей</a> / Добавление типа пользователей');?>

    <a href="page=admins" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <a href="?page=help&cat=admins#actions-add-type" class="button"><img src="img/icons/help.png" alt=""/>Справка</a>
    <form action="?page=admins&action=add_type" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название типа" maxlength="128" size="32" require="true" label="название" />
                </td>
            </tr>
            <tr>
                <td>
                    Права:
                </td>
                <td>
                    <ul class="checkboxes">
                    <?php  $_smarty_tpl->tpl_vars["module"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["module"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['modules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["module"]->key => $_smarty_tpl->tpl_vars["module"]->value){
$_smarty_tpl->tpl_vars["module"]->_loop = true;
?>
                        <li><input id="m<?php echo $_smarty_tpl->tpl_vars['module']->value['id'];?>
" class="checkboxesli" type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['module']->value['link'];?>
" value="1" /><label for="m<?php echo $_smarty_tpl->tpl_vars['module']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['module']->value['name'];?>
</label></li>
                    <?php } ?>
                    </ul>
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
<?php if ($_smarty_tpl->tpl_vars['action']->value=='edit_type'){?>
    <?php echo adminTitle('<a href="?page=admins">Пользователи</a> / <a href="?page=admins&action=types">Типы пользователей</a> / Редактирование типа пользователей');?>

    <a href="page=admins" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <a href="?page=help&cat=admins#actions-add-type" class="button"><img src="img/icons/help.png" alt=""/>Справка</a>
    <form action="?page=admins&action=edit_type&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название типа" maxlength="128" size="32" require="true" label="название" value="<?php echo $_smarty_tpl->tpl_vars['type']->value['name'];?>
" />
                </td>
            </tr>
            <tr>
                <td>
                    Права:
                </td>
                <td>
                    <ul class="checkboxes">
                    <?php  $_smarty_tpl->tpl_vars["module"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["module"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['modules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["module"]->key => $_smarty_tpl->tpl_vars["module"]->value){
$_smarty_tpl->tpl_vars["module"]->_loop = true;
?>
                        <?php $_smarty_tpl->tpl_vars["mod"] = new Smarty_variable($_smarty_tpl->tpl_vars['module']->value['link'], null, 0);?>
                        <li><input id="m<?php echo $_smarty_tpl->tpl_vars['module']->value['id'];?>
" class="checkboxesli" type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['module']->value['link'];?>
" <?php if ($_smarty_tpl->tpl_vars['type']->value[$_smarty_tpl->tpl_vars['mod']->value]==1){?>checked="checked"<?php }?> /><label for="m<?php echo $_smarty_tpl->tpl_vars['module']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['module']->value['name'];?>
</label></li>
                    <?php } ?>
                    </ul>
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