<?php /* Smarty version Smarty 3.1.4, created on 2014-12-09 13:09:57
         compiled from "templates\users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9305238b77f9679c2-90974986%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e3e5ba5f255a61cee70738076f36df5be1f0023' => 
    array (
      0 => 'templates\\users.tpl',
      1 => 1418123396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9305238b77f9679c2-90974986',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5238b77fb7131',
  'variables' => 
  array (
    'action' => 0,
    'users' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5238b77fb7131')) {function content_5238b77fb7131($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'libs/plugins\modifier.date_format.php';
?><?php if ($_smarty_tpl->tpl_vars['action']->value=='show'){?>
    <?php echo adminTitle('Покупатели');?>

    <?php if (!empty($_smarty_tpl->tpl_vars['users']->value)){?>
    <a href="?page=help&cat=users" class="button"><img src="img/icons/help.png" alt=""/>Справка по разделу</a>
    <table class="dt_users display">
    	<thead>
    		<tr>
    			<th>ID</th>
    			<th><b>Имя</b></th>
                <th><b>Телефон</b></th>
                <th><b>Город</b></th>
                <th><b>Email</b></th>
                <th><b>Заходил</b></th>
                <th><b></b></th>
    		</tr>
    	</thead>
    	<tbody>
            <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
    		<tr class="odd gradeA">
    			<td style="width: 40px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['user']->value['phone'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['user']->value['city'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['last_date'],'%d.%m.%Y&nbsp;&nbsp;&nbsp;%H:%M');?>
</td>
                <td style="width: 40px; text-align: center;">
                    <a href="?page=users&action=see&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
    					<span class="icon_cont icon_cont_see" title="Подробнее">
    					</span>
    				</a>
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
    <?php echo adminTitle('<a href="?page=users">Покупатели</a> / Просмотр профиля');?>

    <a href="page=users" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <table>
        <tr>
            <td>
                <strong>Имя:</strong>
            </td>
            <td class="padding10">
                <?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>

            </td>
        </tr>
        <tr>
            <td>
                <strong>Телефон:</strong>
            </td>
            <td class="padding10">
                <?php echo $_smarty_tpl->tpl_vars['user']->value['phone'];?>

            </td>
        </tr>
        <tr>
            <td>
                <strong>Email:</strong>
            </td>
            <td class="padding10">
                <?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>

            </td>
        </tr>
        <tr>
            <td>
                <strong>Город:</strong>
            </td>
            <td class="padding10">
                <?php echo $_smarty_tpl->tpl_vars['user']->value['city'];?>

            </td>
        </tr>
        <tr>
            <td>
                <strong>Дата регистрации:</strong>&nbsp;
            </td>
            <td class="padding10">
                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['date'],'%d.%m.%Y&nbsp;&nbsp;&nbsp;%H:%M');?>

            </td>
        </tr>
        <tr>
            <td>
                <strong>Последний визит:</strong>
            </td>
            <td class="padding10">
                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['last_date'],'%d.%m.%Y&nbsp;&nbsp;&nbsp;%H:%M');?>

            </td>
        </tr>
    </table>
<?php }?><?php }} ?>