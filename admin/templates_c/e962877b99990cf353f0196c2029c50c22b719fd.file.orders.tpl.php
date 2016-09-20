<?php /* Smarty version Smarty 3.1.4, created on 2016-02-24 15:01:12
         compiled from "templates\orders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20924523b1bdb75d5e0-64227143%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e962877b99990cf353f0196c2029c50c22b719fd' => 
    array (
      0 => 'templates\\orders.tpl',
      1 => 1453719900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20924523b1bdb75d5e0-64227143',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_523b1bdb92d13',
  'variables' => 
  array (
    'action' => 0,
    'order' => 0,
    'product' => 0,
    'orders' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_523b1bdb92d13')) {function content_523b1bdb92d13($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'libs/plugins\modifier.date_format.php';
?><?php if ($_smarty_tpl->tpl_vars['action']->value=='see'){?>
<?php echo adminTitle('<a href="?page=orders">Заказы</a> / Просмотр заказа');?>

<a href="?page=orders" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
<?php if (!empty($_smarty_tpl->tpl_vars['order']->value)){?>
<?php if ($_smarty_tpl->tpl_vars['order']->value['id_status']==1){?>
<a href="?page=orders&action=del&id=<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" class="button"><img src="img/icons/ok.png" alt=""/>Перенести в обработанные</a><br />
<?php }else{ ?>
<a href="?page=orders&action=not&id=<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" class="button"><img src="img/icons/help.png" alt=""/>Перенести в ожидающие</a><br />
<?php }?>
<strong>Имя:</strong> <?php echo $_smarty_tpl->tpl_vars['order']->value['user_name'];?>
 <br />
<strong>Телефон:</strong> <?php echo $_smarty_tpl->tpl_vars['order']->value['phone'];?>
 <br />
<strong>Город:</strong> <?php echo $_smarty_tpl->tpl_vars['order']->value['city'];?>
 <br />
<strong>Email:</strong> <?php echo $_smarty_tpl->tpl_vars['order']->value['email'];?>
 <br />
<strong>Дата заказа:</strong> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value['date'],'%d.%m.%Y&nbsp;&nbsp;&nbsp;%H:%M');?>
 <br />
<strong>Доставка:</strong> <?php if (strlen($_smarty_tpl->tpl_vars['order']->value['text'])>0){?><br /><?php echo $_smarty_tpl->tpl_vars['order']->value['text'];?>
<?php }else{ ?>Адрес не указан<?php }?> <br />
<strong>Сумма:</strong> <?php echo $_smarty_tpl->tpl_vars['order']->value['sum'];?>
 грн. <br />
<strong>Промокод:</strong> <?php if (strlen($_smarty_tpl->tpl_vars['order']->value['promo'])>0){?><?php echo $_smarty_tpl->tpl_vars['order']->value['promo'];?>
<?php }else{ ?>Не указан<?php }?><br /><br />
<table class="datatable display">
	<thead>
		<tr>
			<th>ID</th>
			<th><b>Название</b></th>
			<th><b>Количество</b></th>
            <th><b>Цена</b></th>
		</tr>
	</thead>
	<tbody>
        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["products"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["products"]['iteration']++;
?>
		<tr class="odd gradeA">
			<td style="width: 30px;"><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
 (<a href="../product/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" target="_blank">посмотреть на сайте</a>)</td>
            <td style="width: 80px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['product']->value['count'];?>
</td>
            <td style="width: 80px; text-align: center; padding: 25px;"><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
 грн.</td>  
		</tr>
        <?php } ?>
	</tbody>
</table>
<?php }?>
<?php }else{ ?>
<?php echo adminTitle('Заказы');?>

<?php if (!empty($_smarty_tpl->tpl_vars['orders']->value)){?>
<table class="datatable display">
	<thead>
		<tr>
			<th>ID</th>
			<th><b>Имя</b></th>
			<th><b>Телефон</b></th>
            <th><b>Дата</b></th>
            <th><b>Статус</b></th>
            <th><b>Сумма</b></th>
            <th><b>Действия</b></th>
		</tr>
	</thead>
	<tbody>
        <?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value){
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
		<tr class="odd gradeA">
			<td style="width: 30px;"><?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['order']->value['user_name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['order']->value['phone'];?>
</td>
            <td style="width: 120px; text-align: center;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value['date'],'%d.%m.%Y&nbsp;&nbsp;&nbsp;%H:%M');?>
</td>
            <td style="width: 200px; text-align: center;"><?php if ($_smarty_tpl->tpl_vars['order']->value['id_status']==1){?>Ожидает подтверждения<?php }else{ ?>Обработан<?php }?></td>
            <td style="width: 120px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['order']->value['sum'];?>
 грн.</td>
			<td style="width: 120px;">
                <table class="events">
                    <tr>
                        <td>
                            <a href="?page=orders&action=see&id=<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
">
                            	<span class="icon_cont icon_cont_see" title="Подробнее">
                            	</span>
                            </a>
                        </td>
                        <?php if ($_smarty_tpl->tpl_vars['order']->value['id_status']==1){?>
                        <td>
                            <a href="javascript:void(0);" onclick="confirmDelete('Заказ выполнен', 'Вы подтверждаете выполнение заказа?', '?page=orders&action=del&id=<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
');">
        						<span class="icon_cont icon_cont_new" title="Заказ выполнен">
        						</span>
        					</a>
                        </td>
                        <?php }else{ ?>
                        <td>
                            <a href="javascript:void(0);" onclick="confirmDelete('Заказ ещё не выполнен', 'Вы подтверждаете перенос заказа в необработанные?', '?page=orders&action=not&id=<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
');">
        						<span class="icon_cont icon_cont_old" title="Заказ не выполнен">
        						</span>
        					</a>
                        </td>
                        <?php }?>
                        <td>
                            <a href="javascript:void(0);" onclick="confirmDelete('Удаление заказа', 'Вы подтверждаете удаление заказа?', '?page=orders&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
');">
        						<span class="icon_cont icon_cont_del" title="Удалить заказ">
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
<?php echo error('Заказов пока нет');?>

<?php }?>
<?php }?><?php }} ?>