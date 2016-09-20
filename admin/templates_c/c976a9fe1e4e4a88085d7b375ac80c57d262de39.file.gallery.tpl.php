<?php /* Smarty version Smarty 3.1.4, created on 2016-05-02 08:58:48
         compiled from "templates\gallery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13917523b1e6da854c1-23497573%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c976a9fe1e4e4a88085d7b375ac80c57d262de39' => 
    array (
      0 => 'templates\\gallery.tpl',
      1 => 1462168727,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13917523b1e6da854c1-23497573',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_523b1e6dce741',
  'variables' => 
  array (
    'action' => 0,
    'gallery' => 0,
    'id' => 0,
    'cat' => 0,
    'name_cat' => 0,
    'img' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_523b1e6dce741')) {function content_523b1e6dce741($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='show'){?>
    <?php echo adminTitle('Галерея');?>

    <?php if (!empty($_smarty_tpl->tpl_vars['gallery']->value)){?>
    <a href="?page=gallery&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/>Добавить галерею</a>
    <table class="dt_gallery display">
		<thead>
			<tr>
				<th>ID</th>
				<th><b>Название</b></th>
                <th><b>Кол-во фото</b></th>
				<th><b>Действия</b></th>
			</tr>
		</thead>
		<tbody>
            <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['gallery']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
</td>
                <td style="width: 120px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['cat']->value['kol_photo'];?>
</td>
                <td style="width: 120px; text-align: center;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=gallery&action=more&id=<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
">
            						<span class="icon_cont icon_cont_see" title="Подробнее">
            						</span>
            					</a>
                            </td>
                            <td>
                                <a href="?page=gallery&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
">
                                	<span class="icon_cont icon_cont_edit" title="Редактировать запись">
                                	</span>
                                </a>
                            </td>
                            <td>
                                <a href="?page=gallery&action=del&id=<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
">
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
        <?php echo error('Галереи ещё не добавлены');?>

        <a href="?page=gallery&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/>Добавить галерею</a>
    <?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='add'){?>
    <?php echo adminTitle('<a href="?page=gallery">Галерея</a> / Добавление галереи');?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <form action="?page=gallery&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название" maxlength="128" size="32" require="true" label="название галереи" />
                </td>
            </tr>
            <tr>
                <td>
                    Обложка:
                </td>
                <td>
                    <input type="file" name="cover" />&nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    Дата:
                </td>
                <td>
                    <input type="text" name="date" placeholder="Введите дату" maxlength="128" size="32" class="datepicker" />
                </td>
            </tr>
            <tr>
                <td>
                    Описание:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor" placeholder="Введите описание"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <input type="submit" value="Добавить" />
                </td>
            </tr>
        </table>	
	</form>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='edit'){?>
    <?php echo adminTitle('Редактирование фотоотчёта');?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <form action="?page=gallery&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название" maxlength="128" size="32" require="true" label="название" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['gallery']->value['name']);?>
" />
                </td>
            </tr>
            <tr>
                <td>
                    Обложка:
                </td>
                <td>
                    <input type="file" name="cover" />&nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    Дата:
                </td>
                <td>
                    <input type="text" name="date" placeholder="Введите дату" maxlength="128" size="32" class="datepicker" value="<?php echo $_smarty_tpl->tpl_vars['gallery']->value['date'];?>
" />
                </td>
            </tr>
            <tr>
                <td>
                    Описание:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor" placeholder="Введите описание"><?php echo stripslashes($_smarty_tpl->tpl_vars['gallery']->value['text']);?>
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
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='more'){?>
    <?php echo adminTitle("<a href='?page=gallery'>Галерея</a> / ".($_smarty_tpl->tpl_vars['name_cat']->value));?>

    <a href="?page=gallery" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <a href="?page=gallery&action=addimg&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/>Добавить фото</a>
    <div class="clear"></div>
    <?php if (!empty($_smarty_tpl->tpl_vars['gallery']->value)){?>
        <ul class="gallery">
        <?php  $_smarty_tpl->tpl_vars["img"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["img"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['gallery']->value['photos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["img"]->key => $_smarty_tpl->tpl_vars["img"]->value){
$_smarty_tpl->tpl_vars["img"]->_loop = true;
?>
            <li id="id-<?php echo $_smarty_tpl->tpl_vars['img']->value['id'];?>
" class="elem">
                <img src="../admin/img/gallery/<?php echo $_smarty_tpl->tpl_vars['img']->value['small'];?>
" alt="" />
                <a class="fancybox butt2" rel="group" href="../admin/img/gallery/<?php echo $_smarty_tpl->tpl_vars['img']->value['name'];?>
"><img src="img/icons/more.png" alt=""/>Просмотр</a>
                <a href="?page=gallery&action=delimg&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&idimg=<?php echo $_smarty_tpl->tpl_vars['img']->value['id'];?>
" class="butt"><img src="img/icons/del.png" alt=""/>Удалить</a>
            </li>
        <?php } ?>
        </ul>
        <div class="clear"></div>
        <?php echo alert('Изменения сохранены');?>

    <?php }else{ ?>
        <?php echo error("Фото ещё не добавлены");?>

    <?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='addimg'){?>
    <?php echo adminTitle("<a href='?page=gallery'>Галерея</a> / Добавление фотографий в ".($_smarty_tpl->tpl_vars['name_cat']->value));?>

    <form>
        <div id="queue"></div>
        <input id="id_cat_upl" name="id_cat_upl" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
        <table>
            <tr>
                <td style="vertical-align: top;">
                    <a href="?page=gallery&action=more&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
                </td>
                <td style="vertical-align: top;">
                    <input id="file_upload" name="file_upload" type="file" multiple="true" />
                </td>
            </tr>
        </table>
   	</form>
<?php }?>
<?php }} ?>