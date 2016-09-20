<?php /* Smarty version Smarty 3.1.4, created on 2014-08-29 21:43:15
         compiled from "templates\tm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25843523863eacef911-04983576%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab648e0f298b7ae057303a52176a59b3a79a6a22' => 
    array (
      0 => 'templates\\tm.tpl',
      1 => 1409337793,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25843523863eacef911-04983576',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_523863eae0d9b',
  'variables' => 
  array (
    'action' => 0,
    'tms' => 0,
    'tm' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_523863eae0d9b')) {function content_523863eae0d9b($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='show'){?>
    <?php echo adminTitle('<a href="?page=catalog">Каталог товаров</a> / Торговые марки');?>

    <?php if (!empty($_smarty_tpl->tpl_vars['tms']->value)){?>
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/plus.png" alt=""/> Назад</a>
    <a href="?page=tms&action=add" class="button"><img src="img/icons/plus.png" alt=""/>Добавить</a>
    <a href="?page=help&cat=tms" class="button"><img src="img/icons/help.png" alt=""/>Справка по разделу</a>
    <table class="datatable display">
		<thead>
			<tr>
				<th>ID</th>
				<th><b>Название</b></th>
				<th><b>Действия</b></th>
			</tr>
		</thead>
		<tbody>
            <?php  $_smarty_tpl->tpl_vars['tm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tm']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tms']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tm']->key => $_smarty_tpl->tpl_vars['tm']->value){
$_smarty_tpl->tpl_vars['tm']->_loop = true;
?>
			<tr class="odd gradeA">
				<td style="width: 60px;"><?php echo $_smarty_tpl->tpl_vars['tm']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['tm']->value['name'];?>
</td>
				<td style="width: 120px;">
					<a href="?page=tms&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['tm']->value['id'];?>
">
						<span class="icon_cont icon_cont_edit" title="Редактировать запись">
						</span>
					</a>
					<a href="?page=tms&action=del&id=<?php echo $_smarty_tpl->tpl_vars['tm']->value['id'];?>
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
        <?php echo error('На данный момент торговых марок нет');?>

        <a href="javascript:history.go(-1)" class="button">Назад</a>
        <a href="?page=tms&action=add" class="button">Добавить</a>
    <?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='add'){?>
    <?php echo adminTitle('Добавление торговой марки');?>

    <a href="javascript:history.go(-1)" class="button">Назад</a>
    <form action="?page=tms&action=add" method="post" class="formly">
        <table>
            <tr>
                <td>
                    Заголовок:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название торговой марки" maxlength="128" size="80" require="true" label="название торговой марки" />
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
    <?php echo adminTitle('Редактирование торговой марки');?>

    <a href="javascript:history.go(-1)" class="button">Назад</a>
    <form action="?page=tms&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly">
        <table>
            <tr>
                <td>
                    Заголовок:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название торговой марки" maxlength="128" size="80" require="true" label="название торговой марки" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['tms']->value['name']);?>
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
<?php }?><?php }} ?>