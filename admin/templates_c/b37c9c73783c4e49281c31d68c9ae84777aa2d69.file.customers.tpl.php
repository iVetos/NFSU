<?php /* Smarty version Smarty 3.1.4, created on 2016-02-24 18:21:18
         compiled from "templates\customers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9557554b4b65e3e497-86876599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b37c9c73783c4e49281c31d68c9ae84777aa2d69' => 
    array (
      0 => 'templates\\customers.tpl',
      1 => 1456318265,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9557554b4b65e3e497-86876599',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_554b4b6609fd1',
  'variables' => 
  array (
    'action' => 0,
    'customers' => 0,
    'lang_text' => 0,
    'customer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_554b4b6609fd1')) {function content_554b4b6609fd1($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'libs/plugins\modifier.date_format.php';
?><?php if ($_smarty_tpl->tpl_vars['action']->value=='show'){?>
    <?php echo adminTitle('Покупатели');?>

    <?php if (!empty($_smarty_tpl->tpl_vars['customers']->value)){?>
    <a href="?page=help&cat=customers" class="button"><img src="img/icons/help.png" alt=""/>Справка по разделу</a>
    <table class="dt_users display">
    	<thead>
    		<tr>
    			<th>ID</th>
    			<th><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['name'];?>
</th>
                <th><b>Телефон</b></th>
                <th><b>Город</b></th>
                <th><b>Email</b></th>
                <th><b>Заходил</b></th>
                <th><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['actions'];?>
</th>
    		</tr>
    	</thead>
    	<tbody>
            <?php  $_smarty_tpl->tpl_vars['customer'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customer']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['customers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customer']->key => $_smarty_tpl->tpl_vars['customer']->value){
$_smarty_tpl->tpl_vars['customer']->_loop = true;
?>
    		<tr class="odd gradeA">
    			<td style="width: 40px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['customer']->value['id'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['customer']->value['name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['customer']->value['phone'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['customer']->value['city'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['customer']->value['email'];?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['customer']->value['last_date'],'%d.%m.%Y&nbsp;&nbsp;&nbsp;%H:%M');?>
</td>
                <td style="width: 80px; text-align: center;">
                    <table class="events">
                    <tr>
                        <td>
                            <a href="?page=customers&action=see&id=<?php echo $_smarty_tpl->tpl_vars['customer']->value['id'];?>
">
            					<span class="icon_cont icon_cont_see" title="Подробнее">
            					</span>
            				</a>
                        </td>
                        <td>
                            <a href="javascript:void(0);" onclick="confirmDelete('Удаление клиента', 'Вы подтверждаете удаление клиента?', '?page=customers&action=del&id=<?php echo $_smarty_tpl->tpl_vars['customer']->value['id'];?>
');">
        						<span class="icon_cont icon_cont_del" title="Удалить">
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
        <?php echo error('Зарегистрированных пользователей нет');?>

    <?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=='see'){?>
    <?php echo adminTitle('<a href="?page=customers">Покупатели</a> / Просмотр профиля');?>

    <a href="?page=customers" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <table>
        <tr>
            <td>
                <strong>Имя:</strong>
            </td>
            <td class="padding10">
                <?php echo $_smarty_tpl->tpl_vars['customer']->value['name'];?>

            </td>
        </tr>
        <tr>
            <td>
                <strong>Телефон:</strong>
            </td>
            <td class="padding10">
                <?php echo $_smarty_tpl->tpl_vars['customer']->value['phone'];?>

            </td>
        </tr>
        <tr>
            <td>
                <strong>Email:</strong>
            </td>
            <td class="padding10">
                <?php echo $_smarty_tpl->tpl_vars['customer']->value['email'];?>

            </td>
        </tr>
        <tr>
            <td>
                <strong>Город:</strong>
            </td>
            <td class="padding10">
                <?php echo $_smarty_tpl->tpl_vars['customer']->value['city'];?>

            </td>
        </tr>
        <tr>
            <td>
                <strong>Дата регистрации:</strong>&nbsp;
            </td>
            <td class="padding10">
                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['customer']->value['date'],'%d.%m.%Y&nbsp;&nbsp;&nbsp;%H:%M');?>

            </td>
        </tr>
        <tr>
            <td>
                <strong>Последний визит:</strong>
            </td>
            <td class="padding10">
                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['customer']->value['last_date'],'%d.%m.%Y&nbsp;&nbsp;&nbsp;%H:%M');?>

            </td>
        </tr>
    </table>
<?php }?><?php }} ?>