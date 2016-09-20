<?php /* Smarty version Smarty 3.1.4, created on 2016-04-24 17:58:21
         compiled from "templates\catalog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:302915233985f413a12-49946209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2964be95a233d57da5022adee9d671ed4c7ac1c' => 
    array (
      0 => 'templates\\catalog.tpl',
      1 => 1461509893,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '302915233985f413a12-49946209',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52339860d0e3c',
  'variables' => 
  array (
    'action' => 0,
    'lang_text' => 0,
    'categories' => 0,
    'id' => 0,
    'category' => 0,
    'products' => 0,
    'product' => 0,
    'mainCat' => 0,
    'params' => 0,
    'item' => 0,
    'tms' => 0,
    'tm' => 0,
    'mark' => 0,
    'foo' => 0,
    'param_name' => 0,
    'param' => 0,
    'param_type' => 0,
    'param_step' => 0,
    'promos' => 0,
    'promo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52339860d0e3c')) {function content_52339860d0e3c($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='show'){?>
    <?php echo adminTitle($_smarty_tpl->tpl_vars['lang_text']->value['catalog_show']);?>

    <?php if (!empty($_smarty_tpl->tpl_vars['categories']->value)){?>
    <a href="?page=catalog&action=addCat&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/> <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['catalog_add_category'];?>
</a>
    <a href="?page=catalog&action=sort&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/sort.png" alt=""/><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['catalog_order'];?>
</a>
    <a href="?page=catalog&action=tms" class="button"><img src="img/icons/tm.png" alt=""/> <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['catalog_tm'];?>
</a>
    <a href="?page=catalog&action=promo" class="button"><img src="img/icons/promo.png" alt=""/> <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['catalog_promo'];?>
</a>
    <table class="dt-three display">
		<thead>
			<tr>
				<th>#</th>
				<th><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['name'];?>
</th>
				<th><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['actions'];?>
</th>
			</tr>
		</thead>
		<tbody>
            <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value){
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['category']->value['sort'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</td>
				<td style="width: 160px;">
                    <table class="events">
                        <tr>
                            <td class="visible">
                                <?php if ($_smarty_tpl->tpl_vars['category']->value['actual']==1){?>
                                <span class="none vid"><?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
</span><span class="none vvalue">0</span><span class="none vtable">categories</span>
                                <a href="javascript:void(0);">
            						<span class="icon_cont icon_cont_visible" title="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['hide'];?>
"></span>
            					</a>
                                <?php }else{ ?>
                                <span class="none vid"><?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
</span><span class="none vvalue">1</span><span class="none vtable">categories</span>
                                <a href="javascript:void(0);">
            						<span class="icon_cont icon_cont_invisible" title="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['show'];?>
"></span>
            					</a>
                                <?php }?>
                            </td>
                            <td>
                                <a href="?page=catalog&action=show&id=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
">
            						<span class="icon_cont icon_cont_more" title="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['more'];?>
"></span>
            					</a>
                            </td>
                            <td>
                                <a href="?page=catalog&action=editCat&id=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
">
                                	<span class="icon_cont icon_cont_edit" title="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['edit'];?>
"></span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Deleting of the category', 'If you will delete the category, then it will delete items in this<br/>  category. This action cannot be undone. <br/><br/> Do you accept deleting of the category?', '?page=catalog&action=delCat&id=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
');">
            						<span class="icon_cont icon_cont_del" title="<?php echo $_smarty_tpl->tpl_vars['lang_text']->value['delete'];?>
"></span>
            					</a>
                            </td>
                        </tr>
                    </table>
				</td>
			</tr>
            <?php } ?>
		</tbody>
	</table>
    <?php }elseif(!empty($_smarty_tpl->tpl_vars['products']->value)){?>
        <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['back'];?>
</a>
        <a href="?page=catalog&action=addProduct&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/><?php echo $_smarty_tpl->tpl_vars['lang_text']->value['catalog_add_product'];?>
</a>
        <a href="?page=catalog&action=tms" class="button"><img src="img/icons/tm.png" alt=""/> <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['catalog_tm'];?>
</a>
        <a href="?page=catalog&action=promo" class="button"><img src="img/icons/promo.png" alt=""/> <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['catalog_promo'];?>
</a>
        <table class="datatable display">
		<thead>
			<tr>
				<th>ID</th>
                <th>Image</th>
                <th>Название</th>
                <?php if (@__MOD_SHOP_PRICE){?><th><b>Цена</b></th><?php }?>
				<th>Действия</th>
			</tr>
		</thead>
		<tbody>
            <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
</td>
                <td style="width: 110px; text-align: center;">
                    <?php if (strlen($_smarty_tpl->tpl_vars['product']->value['img_1'])>2){?>
                        <a class="fancybox" rel="Canvas" href="img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['img_1'];?>
"><img src="img/products/adm_<?php echo $_smarty_tpl->tpl_vars['product']->value['img_1'];?>
" class="img" alt=""></a>
                    <?php }else{ ?>
                        <img src="img/design/noimg.jpg" class="img" alt="">
                    <?php }?>
                </td>
				<td><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</td>
                <?php if (@__MOD_SHOP_PRICE){?><td style="width: 100px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</td><?php }?>
				<td style="width: 80px;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=catalog&action=editProduct&id=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                                	<span class="icon_cont icon_cont_edit" title="Редактировать"></span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Удаление товара', 'Вы подтверждаете удаление товара?', '?page=catalog&action=delProduct&id=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
');">
            						<span class="icon_cont icon_cont_del" title="Удалить"></span>
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
        <?php echo error('Разделов или товаров пока нет');?>

        <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['back'];?>
</a>
        <a href="?page=catalog&action=tms" class="button"><img src="img/icons/tm.png" alt=""/> Торговые марки</a>
        <a href="?page=catalog&action=addCat&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/>Добавить раздел</a>
        <a href="?page=catalog&action=addProduct&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/>Добавить товар</a>
    <?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='addCat'){?>
    <?php echo adminTitle('<a href="?page=catalog">Каталог товаров</a> / Добавление раздела');?>

    <a href="?page=catalog&action=show&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/back.png" alt=""/> <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['back'];?>
</a>
    <form action="?page=catalog&action=addCat&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название раздела" maxlength="128" size="32" require="true" label="название раздела" />
                </td>
            </tr>
            <tr>
                <td>
                    Изображение:
                </td>
                <td>
                    <input type="file" name="img"/>&nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    Описание:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor"></textarea>
                </td>
            </tr>
            <?php if (@__MOD_SHOP_PARAMS){?>
            <tr>
                <td>
                    Параметр 1:
                </td>
                <td>
                    <input type="text" name="param1" size="24" placeholder="Название параметра 1" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param1_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param1_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param1_type_1" name="param1_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked" <?php }?><?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param1_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param1_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param1_type_2" name="param1_type" value="2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param1_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param1_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param1_type_3" name="param1_type" value="3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param1_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param1_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param1_step" size="4" maxlength="10" placeholder="Шаг" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param1_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param1_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 2:
                </td>
                <td>
                    <input type="text" name="param2" size="24" placeholder="Название параметра 2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param2_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param2_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param2_type_1" name="param2_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked" <?php }?><?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param2_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param2_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param2_type_2" name="param2_type" value="2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param2_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param2_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param2_type_3" name="param2_type" value="3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param2_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param2_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param2_step" size="4" maxlength="10" placeholder="Шаг" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param2_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param2_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 3:
                </td>
                <td>
                    <input type="text" name="param3" size="24" placeholder="Название параметра 3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param3_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param3_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param3_type_1" name="param3_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked" <?php }?><?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param3_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param3_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param3_type_2" name="param3_type" value="2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param3_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param3_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param3_type_3" name="param3_type" value="3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param3_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param3_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param3_step" size="4" maxlength="10" placeholder="Шаг" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param3_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param3_step'];?>
<?php }?>"<?php }?>/>
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 4:
                </td>
                <td>
                    <input type="text" name="param4" size="24" placeholder="Название параметра 4" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param4_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param4_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param4_type_1" name="param4_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked" <?php }?><?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param4_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param4_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param4_type_2" name="param4_type" value="2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param4_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param4_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param4_type_3" name="param4_type" value="3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param4_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param4_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param4_step" size="4" maxlength="10" placeholder="Шаг" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param4_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param4_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 5:
                </td>
                <td>
                    <input type="text" name="param5" size="24" placeholder="Название параметра 5" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param5_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param5_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param5_type_1" name="param5_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked" <?php }?><?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param5_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param5_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param5_type_2" name="param5_type" value="2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param5_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param5_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param5_type_3" name="param5_type" value="3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param5_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param5_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param5_step" size="4" maxlength="10" placeholder="Шаг" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param5_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param5_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 6:
                </td>
                <td>
                    <input type="text" name="param6" size="24" placeholder="Название параметра 6" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param6_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param6_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param6_type_1" name="param6_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked" <?php }?><?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param6_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param6_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param6_type_2" name="param6_type" value="2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param6_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param6_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param6_type_3" name="param6_type" value="3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param6_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param6_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param6_step" size="4" maxlength="10" placeholder="Шаг" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param6_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param6_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 7:
                </td>
                <td>
                    <input type="text" name="param7" size="24" placeholder="Название параметра 7" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param7_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param7_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param7_type_1" name="param7_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked" <?php }?><?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param7_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param7_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param7_type_2" name="param7_type" value="2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param7_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param7_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param7_type_3" name="param7_type" value="3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param7_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param7_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param7_step" size="4" maxlength="10" placeholder="Шаг" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param7_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param7_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 8:
                </td>
                <td>
                    <input type="text" name="param8" size="24" placeholder="Название параметра 8" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param8_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param8_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param8_type_1" name="param8_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked" <?php }?><?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param8_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param8_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param8_type_2" name="param8_type" value="2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param8_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param8_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param8_type_3" name="param8_type" value="3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param8_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param8_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param8_step" size="4" maxlength="10" placeholder="Шаг" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param8_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param8_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 9:
                </td>
                <td>
                    <input type="text" name="param9" size="24" placeholder="Название параметра 9" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param9_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param9_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param9_type_1" name="param9_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked" <?php }?><?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param9_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param9_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param9_type_2" name="param9_type" value="2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param9_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param9_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param9_type_3" name="param9_type" value="3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param9_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param9_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param9_step" size="4" maxlength="10" placeholder="Шаг" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param9_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param9_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 10:
                </td>
                <td>
                    <input type="text" name="param10" size="24" placeholder="Название параметра 10" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param10_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param10_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param10_type_1" name="param10_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked" <?php }?><?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param10_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param10_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param10_type_2" name="param10_type" value="2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param10_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param10_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param10_type_3" name="param10_type" value="3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param10_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param10_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param10_step" size="4" maxlength="10" placeholder="Шаг" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param10_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param10_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <?php }?>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Введите метатег Title"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Введите метатег Description"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Введите метатег Keywords"></textarea>
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
<?php if ($_smarty_tpl->tpl_vars['action']->value=='editCat'){?>
    <?php echo adminTitle('<a href="?page=catalog">Каталог товаров</a> / Редактирование раздела');?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <form action="?page=catalog&action=editCat&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Заголовок:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название раздела" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['category']->value['name']);?>
" maxlength="128" size="32" require="true" label="заголовок раздела" />
                </td>
            </tr>
            <tr>
                <td>
                    Изображение:
                </td>
                <td>
                    <input type="file" name="img" />&nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    Описание:
                </td>
                <td>
                    <textarea name="text" rows="20" class="ckeditor" cols="60"><?php echo stripslashes($_smarty_tpl->tpl_vars['category']->value['text']);?>
</textarea>
                </td>
            </tr>
            <?php if (@__MOD_SHOP_PARAMS){?>
            <tr>
                <td>
                    Параметр 1:
                </td>
                <td>
                    <input type="text" name="param1" size="24" placeholder="Название параметра 1" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param1_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param1_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param1_type_1" name="param1_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param1_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param1_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param1_type_2" name="param1_type" value="2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param1_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param1_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param1_type_3" name="param1_type" value="3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param1_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param1_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param1_step" size="5" maxlength="10" placeholder="Шаг" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param1_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param1_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 2:
                </td>
                <td>
                    <input type="text" name="param2" size="24" placeholder="Название параметра 2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param2_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param2_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param2_type_1" name="param2_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param2_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param2_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param2_type_2" name="param2_type" value="2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param2_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param2_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param2_type_3" name="param2_type" value="3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param2_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param2_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param2_step" size="5" maxlength="10" placeholder="Шаг" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param2_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param2_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 3:
                </td>
                <td>
                    <input type="text" name="param3" size="24" placeholder="Название параметра 3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param3_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param3_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param3_type_1" name="param3_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param3_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param3_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param3_type_2" name="param3_type" value="2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param3_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param3_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param3_type_3" name="param3_type" value="3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param3_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param3_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param3_step" size="5" maxlength="10" placeholder="Шаг" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param3_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param3_step'];?>
<?php }?>"<?php }?>/>
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 4:
                </td>
                <td>
                    <input type="text" name="param4" size="24" placeholder="Название параметра 4" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param4_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param4_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param4_type_1" name="param4_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param4_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param4_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param4_type_2" name="param4_type" value="2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param4_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param4_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param4_type_3" name="param4_type" value="3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param4_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param4_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param4_step" size="5" maxlength="10" placeholder="Шаг" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param4_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param4_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 5:
                </td>
                <td>
                    <input type="text" name="param5" size="24" placeholder="Название параметра 5" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param5_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param5_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param5_type_1" name="param5_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param5_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param5_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param5_type_2" name="param5_type" value="2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param5_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param5_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param5_type_3" name="param5_type" value="3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param5_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param5_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param5_step" size="5" maxlength="10" placeholder="Шаг" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param5_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param5_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 6:
                </td>
                <td>
                    <input type="text" name="param6" size="24" placeholder="Название параметра 6" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param6_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param6_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param6_type_1" name="param6_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param6_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param6_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param6_type_2" name="param6_type" value="2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param6_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param6_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param6_type_3" name="param6_type" value="3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param6_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param6_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param6_step" size="5" maxlength="10" placeholder="Шаг" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param6_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param6_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 7:
                </td>
                <td>
                    <input type="text" name="param7" size="24" placeholder="Название параметра 7" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param7_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param7_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param7_type_1" name="param7_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param7_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param7_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param7_type_2" name="param7_type" value="2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param7_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param7_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param7_type_3" name="param7_type" value="3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param7_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param7_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param7_step" size="5" maxlength="10" placeholder="Шаг" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param7_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param7_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 8:
                </td>
                <td>
                    <input type="text" name="param8" size="24" placeholder="Название параметра 8" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param8_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param8_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param8_type_1" name="param8_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param8_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param8_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param8_type_2" name="param8_type" value="2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param8_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param8_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param8_type_3" name="param8_type" value="3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param8_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param8_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param8_step" size="5" maxlength="10" placeholder="Шаг" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param8_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param8_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 9:
                </td>
                <td>
                    <input type="text" name="param9" size="24" placeholder="Название параметра 9" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param9_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param9_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param9_type_1" name="param9_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param9_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param9_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param9_type_2" name="param9_type" value="2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param9_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param9_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param9_type_3" name="param9_type" value="3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param9_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param9_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param9_step" size="5" maxlength="10" placeholder="Шаг" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param9_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param9_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 10:
                </td>
                <td>
                    <input type="text" name="param10" size="24" placeholder="Название параметра 10" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param10_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param10_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param10_type_1" name="param10_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param10_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param10_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param10_type_2" name="param10_type" value="2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param10_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param10_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param10_type_3" name="param10_type" value="3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param10_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param10_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param10_step" size="5" maxlength="10" placeholder="Шаг" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param10_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param10_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <?php }?>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Введите метатег Title"><?php echo stripslashes($_smarty_tpl->tpl_vars['category']->value['title']);?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Введите метатег Description"><?php echo stripslashes($_smarty_tpl->tpl_vars['category']->value['description']);?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Введите метатег Keywords"><?php echo stripslashes($_smarty_tpl->tpl_vars['category']->value['keywords']);?>
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
<?php if ($_smarty_tpl->tpl_vars['action']->value=='sort'){?>
<?php echo adminTitle('<a href="?page=catalog">Каталог товаров</a> / Порядок сортировки');?>

<span id="page_id" class="none"><?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</span>
<a href="?page=catalog&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
<a href="?page=help&cat=catalog#actions-sort" class="button"><img src="img/icons/help.png" alt=""/>Справка</a>
<ul id="sortable_cat">
    <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["categories"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value){
$_smarty_tpl->tpl_vars["item"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["categories"]['iteration']++;
?>
    <li id="id-<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><span><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['categories']['iteration'];?>
</span> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</li>
    <?php } ?>
</ul>
<?php echo alert('Порядок сортировки сохранён');?>

<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='tms'){?>
    <?php echo adminTitle('<a href="?page=catalog">Каталог товаров</a> / Торговые марки');?>

    <?php if (!empty($_smarty_tpl->tpl_vars['tms']->value)){?>
    <a href="?page=catalog" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <a href="?page=catalog&action=addTm" class="button"><img src="img/icons/plus.png" alt=""/>Добавить</a>
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
				<td style="width: 40px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['tm']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['tm']->value['name'];?>
</td>
				<td style="width: 80px;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=catalog&action=editTm&id=<?php echo $_smarty_tpl->tpl_vars['tm']->value['id'];?>
">
                                	<span class="icon_cont icon_cont_edit" title="Редактировать"></span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Удаление торговой марки', 'Вы подтверждаете удаление торговой марки?', '?page=catalog&action=delTm&id=<?php echo $_smarty_tpl->tpl_vars['tm']->value['id'];?>
');">
            						<span class="icon_cont icon_cont_del" title="Удалить"></span>
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
        <?php echo error('На данный момент торговых марок нет');?>

        <a href="?page=catalog" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
        <a href="?page=catalog&action=addTm" class="button"><img src="img/icons/plus.png" alt=""/>Добавить</a>
        <a href="?page=help&cat=tms" class="button"><img src="img/icons/help.png" alt=""/>Справка по разделу</a>
    <?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='addTm'){?>
    <?php echo adminTitle('<a href="?page=catalog">Каталог товаров</a> / <a href="?page=catalog&actioan=tms">Торговые марки</a> / Добавление торговой марки');?>

    <a href="?page=catalog&actioan=tms" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <a href="?page=help&cat=tms" class="button"><img src="img/icons/help.png" alt=""/>Справка по разделу</a>
    <form action="?page=catalog&action=addTm" method="post" class="formly">
        <table>
            <tr>
                <td>
                    Заголовок:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название" maxlength="128" size="32" require="true" label="название торговой марки" />
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
<?php if ($_smarty_tpl->tpl_vars['action']->value=='editTm'){?>
    <?php echo adminTitle('<a href="?page=catalog">Каталог товаров</a> / <a href="?page=catalog&actioan=tms">Торговые марки</a> / Редактирование торговой марки');?>

    <a href="?page=catalog&actioan=tms" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <a href="?page=help&cat=tms" class="button"><img src="img/icons/help.png" alt=""/>Справка по разделу</a>
    <form action="?page=catalog&action=editTm&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly">
        <table>
            <tr>
                <td>
                    Заголовок:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название" maxlength="128" size="32" require="true" label="название торговой марки" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['tms']->value['name']);?>
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
<?php if ($_smarty_tpl->tpl_vars['action']->value=='addProduct'){?>
    <?php echo adminTitle('<a href="?page=catalog">Каталог товаров</a> / Добавление товара');?>

    <a href="?page=catalog&action=show&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
<form action="?page=catalog&action=addProduct&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly" enctype="multipart/form-data">
    <table>
        <?php if (@__CONST_SHOP_ARTICLE){?>
        <tr>
            <td>
                Артикул:
            </td>
            <td>
                <input type="text" name="article" placeholder="Введите артикул товара" maxlength="128" size="32" />
            </td>
        </tr>
        <?php }?>
        <tr>
            <td>
                Название:
            </td>
            <td>
                <input type="text" name="name" placeholder="Введите название товара" maxlength="128" size="32" require="true" label="название товара" />
            </td>
        </tr>
        <?php if (@__CONST_SHOP_PROVIDER){?>
        <tr>
            <td>
                Поставщик:
            </td>
            <td>
                <input type="text" name="provider" placeholder="Введите поставщика" maxlength="128" size="32" />
            </td>
        </tr>
        <?php }?>
        <tr>
            <td>
                Изображение 1:
            </td>
            <td>
                <input type="file" name="img_1" />&nbsp;
            </td>
        </tr>
        <tr>
            <td>
                Изображение 2:
            </td>
            <td>
                <input type="file" name="img_2" />&nbsp;
            </td>
        </tr>
        <tr>
            <td>
                Изображение 3:
            </td>
            <td>
                <input type="file" name="img_3" />&nbsp;
            </td>
        </tr>
        <tr>
            <td>
                Изображение 4:
            </td>
            <td>
                <input type="file" name="img_4" />&nbsp;
            </td>
        </tr>
        <?php if (@__MOD_SHOP_TM){?>
        <tr>
            <td>
                Торговая марка:
            </td>
            <td>
                <select size="1" name="tm">
                    <?php  $_smarty_tpl->tpl_vars['mark'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mark']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tm']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mark']->key => $_smarty_tpl->tpl_vars['mark']->value){
$_smarty_tpl->tpl_vars['mark']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['mark']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['mark']->value['name'];?>
</option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <?php }?>
        <tr>
            <td>
                Описание:
            </td>
            <td>
                <textarea name="text" rows="20" cols="60" class="ckeditor"></textarea>
            </td>
        </tr>
        <?php if (@__MOD_SHOP_PRICE){?>
        <tr>
            <td>
                Цена:
            </td>
            <td>
                <input type="text" name="price" maxlength="15" size="6" require="true" label="цену товара" />
            </td>
        </tr>
        <?php }?>
        <?php if (@__MOD_SHOP_PPRICE){?>
        <tr>
            <td>
                Цена закупки:
            </td>
            <td>
                <input type="text" name="pprice" maxlength="15" size="6"/>
            </td>
        </tr>
        <?php }?>
        <?php if (@__MOD_SHOP_OLD_PRICE){?>
        <tr>
            <td>
                Старая цена:
            </td>
            <td>
                <input type="text" name="old_price" maxlength="15" size="6"/>
            </td>
        </tr>
        <?php }?>
        <tr>
            <td>
                Дополнительно:&nbsp;
            </td>
            <td>
                <div id="cb">
                    <input type="checkbox" name="new" value="1" id="cb_new" /><label for="cb_new">Новинка</label>&nbsp;
                    <input type="checkbox" name="top" value="1" id="cb_top" /><label for="cb_top">Топ продаж</label>&nbsp;
                    <input type="checkbox" name="none" value="1" id="cb_none" /><label for="cb_none">Нет в наличии</label>
                </div>
            </td>
        </tr>
        <?php if (@__MOD_SHOP_PARAMS){?>
    <?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int)ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? 10+1 - (1) : 1-(10)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0){
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++){
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
        <?php $_smarty_tpl->tpl_vars["param"] = new Smarty_variable(('param').($_smarty_tpl->tpl_vars['foo']->value), null, 0);?>
        <?php $_smarty_tpl->tpl_vars["param_name"] = new Smarty_variable((('param').($_smarty_tpl->tpl_vars['foo']->value)).('_name'), null, 0);?>
        <?php $_smarty_tpl->tpl_vars["param_type"] = new Smarty_variable((('param').($_smarty_tpl->tpl_vars['foo']->value)).('_type'), null, 0);?>
        <?php $_smarty_tpl->tpl_vars["param_step"] = new Smarty_variable((('param').($_smarty_tpl->tpl_vars['foo']->value)).('_step'), null, 0);?>
        <?php if (!empty($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_name']->value])){?>
        <tr>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_name']->value];?>
:
            </td>
            <td>
                <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['param']->value;?>
" placeholder="Введите значение" size="24"/>
                <?php if ($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_type']->value]==1){?>Текстовый<?php }?>
                <?php if ($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_type']->value]==2){?>Числовой с шагом <?php if (!empty($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_step']->value])){?><?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_step']->value];?>
<?php }else{ ?>1<?php }?><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_type']->value]==3){?>С запятой с шагом <?php if (!empty($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_step']->value])){?><?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_step']->value];?>
<?php }else{ ?>1<?php }?><?php }?>
            </td>
        </tr>
        <?php }?>
    <?php }} ?>
        <?php }?>
        <tr>
            <td>
                Title:
            </td>
            <td>
                <textarea name="title" rows="3" cols="60" placeholder="Введите метатег Title"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                Description:
            </td>
            <td>
                <textarea name="description" rows="10" cols="60" placeholder="Введите метатег Description"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                Keywords:
            </td>
            <td>
                <textarea name="keywords" rows="5" cols="60" placeholder="Введите метатег Keywords"></textarea>
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
<?php if ($_smarty_tpl->tpl_vars['action']->value=='editProduct'){?>
    <?php echo adminTitle('<a href="?page=catalog">Каталог товаров</a> / Редактирование товара');?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <form action="?page=catalog&action=editProduct&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly" enctype="multipart/form-data">
        <input type="hidden" name="product_id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" id="product_id" />
        <table>
            <?php if (@__CONST_SHOP_ARTICLE){?>
            <tr>
                <td>
                    Артикул:
                </td>
                <td>
                    <input type="text" name="article" placeholder="Введите артикул товара" maxlength="128" size="32" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value['article']);?>
" />
                </td>
            </tr>
            <?php }?>
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название товара" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value['name']);?>
" maxlength="128" size="32" require="true" label="название товара" />
                </td>
            </tr>
            <?php if (@__CONST_SHOP_PROVIDER){?>
            <tr>
                <td>
                    Поставщик:
                </td>
                <td>
                    <input type="text" name="provider" placeholder="Введите поставщика" maxlength="128" size="32" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['provider'];?>
" />
                </td>
            </tr>
            <?php }?>
            <tr>
                <td>
                    Изображение 1:
                </td>
                <td>
                    <input type="file" name="img_1" />&nbsp;
                    <?php if (strlen($_smarty_tpl->tpl_vars['product']->value['img_1'])>2){?>
                    <div class="cat_del_img">
                        <span class="cat_del_img_name none"><?php echo $_smarty_tpl->tpl_vars['product']->value['img_1'];?>
</span>
                        <span class="cat_del_img_num none">img_1</span>
                        <a class="fancybox help" rel="group" href="../admin/img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['img_1'];?>
">Просмотр</a>
                        <span class="cat_del_img_but help">Удалить</span>
                    </div>
                    <?php }?>
                </td>
            </tr>
            <tr>
                <td>
                    Изображение 2:
                </td>
                <td>
                    <input type="file" name="img_2" />&nbsp;
                    <?php if (strlen($_smarty_tpl->tpl_vars['product']->value['img_2'])>2){?>
                    <div class="cat_del_img">
                        <span class="cat_del_img_name none"><?php echo $_smarty_tpl->tpl_vars['product']->value['img_2'];?>
</span>
                        <span class="cat_del_img_num none">img_2</span>
                        <a class="fancybox help" rel="group" href="../admin/img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['img_2'];?>
">Просмотр</a>
                        <span class="cat_del_img_but help">Удалить</span>
                    </div>
                    <?php }?>
                </td>
            </tr>
            <tr>
                <td>
                    Изображение 3:
                </td>
                <td>
                    <input type="file" name="img_3" />&nbsp;
                    <?php if (strlen($_smarty_tpl->tpl_vars['product']->value['img_3'])>2){?>
                    <div class="cat_del_img">
                        <span class="cat_del_img_name none"><?php echo $_smarty_tpl->tpl_vars['product']->value['img_3'];?>
</span>
                        <span class="cat_del_img_num none">img_3</span>
                        <a class="fancybox help" rel="group" href="../admin/img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['img_3'];?>
">Просмотр</a>
                        <span class="cat_del_img_but help">Удалить</span>
                    </div>
                    <?php }?>
                </td>
            </tr>
            <tr>
                <td>
                    Изображение 4:
                </td>
                <td>
                    <input type="file" name="img_4" />&nbsp;
                    <?php if (strlen($_smarty_tpl->tpl_vars['product']->value['img_4'])>2){?>
                    <div class="cat_del_img">
                        <span class="cat_del_img_name none"><?php echo $_smarty_tpl->tpl_vars['product']->value['img_4'];?>
</span>
                        <span class="cat_del_img_num none">img_4</span>
                        <a class="fancybox help" rel="group" href="../admin/img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['img_4'];?>
">Просмотр</a>
                        <span class="cat_del_img_but help">Удалить</span>
                    </div>
                    <?php }?>
                </td>
            </tr>
            <?php if (@__MOD_SHOP_TM){?>
            <tr>
                <td>
                    Торговая марка:
                </td>
                <td>
                    <select size="1" name="tm">
                        <?php  $_smarty_tpl->tpl_vars['mark'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mark']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tm']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mark']->key => $_smarty_tpl->tpl_vars['mark']->value){
$_smarty_tpl->tpl_vars['mark']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['mark']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['mark']->value['id']==$_smarty_tpl->tpl_vars['product']->value['id_tm']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['mark']->value['name'];?>
</option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <?php }?>
            <tr>
                <td>
                    Описание:
                </td>
                <td>
                    <textarea name="text" rows="20" class="ckeditor" cols="60"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value['text']);?>
</textarea>
                </td>
            </tr>
            <?php if (@__MOD_SHOP_PRICE){?>
            <tr>
                <td>
                    Цена:
                </td>
                <td>
                    <input type="text" name="price" maxlength="15" size="6" require="true" label="цену товара" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
" />
                </td>
            </tr>
            <?php }?>
            <?php if (@__MOD_SHOP_PPRICE){?>
            <tr>
                <td>
                    Цена закупки:
                </td>
                <td>
                    <input type="text" name="pprice" maxlength="15" size="6" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['pprice'];?>
" />
                </td>
            </tr>
            <?php }?>
            <?php if (@__MOD_SHOP_OLD_PRICE){?>
            <tr>
                <td>
                    Старая цена:
                </td>
                <td>
                    <input type="text" name="old_price" maxlength="15" size="6" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['old_price'];?>
" />
                </td>
            </tr>
            <?php }?>
            <tr>
                <td>
                    Дополнительно:&nbsp;
                </td>
                <td>
                    <div id="cb">
                        <input type="checkbox" name="new" value="1" id="cb_new" <?php if ($_smarty_tpl->tpl_vars['product']->value['new']==1){?>checked="checked"<?php }?>/><label for="cb_new">Новинка</label>&nbsp;
                        <input type="checkbox" name="top" value="1" id="cb_top" <?php if ($_smarty_tpl->tpl_vars['product']->value['top']==1){?>checked="checked"<?php }?>/><label for="cb_top">Топ продаж</label>&nbsp;
                        <input type="checkbox" name="none" value="1" id="cb_none" <?php if ($_smarty_tpl->tpl_vars['product']->value['none']==1){?>checked="checked"<?php }?>/><label for="cb_none">Нет в наличии</label>
                    </div>
                </td>
            </tr>
            <?php if (@__MOD_SHOP_PARAMS){?>
        <?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int)ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? 10+1 - (1) : 1-(10)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0){
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++){
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
            <?php $_smarty_tpl->tpl_vars["param"] = new Smarty_variable(('param').($_smarty_tpl->tpl_vars['foo']->value), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["param_name"] = new Smarty_variable((('param').($_smarty_tpl->tpl_vars['foo']->value)).('_name'), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["param_type"] = new Smarty_variable((('param').($_smarty_tpl->tpl_vars['foo']->value)).('_type'), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["param_step"] = new Smarty_variable((('param').($_smarty_tpl->tpl_vars['foo']->value)).('_step'), null, 0);?>
            <?php if (!empty($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_name']->value])){?>
            <tr>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_name']->value];?>
:
                </td>
                <td>
                    <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['param']->value;?>
" placeholder="Введите значение" size="24" value="<?php echo $_smarty_tpl->tpl_vars['product']->value[$_smarty_tpl->tpl_vars['param']->value];?>
"/>
                    <?php if ($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_type']->value]==1){?>Текстовый<?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_type']->value]==2){?>Числовой с шагом <?php if (!empty($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_step']->value])){?><?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_step']->value];?>
<?php }else{ ?>1<?php }?><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_type']->value]==3){?>С запятой с шагом <?php if (!empty($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_step']->value])){?><?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_step']->value];?>
<?php }else{ ?>1<?php }?><?php }?>
                </td>
            </tr>
            <?php }?>
        <?php }} ?>
            <?php }?>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Введите метатег Title"><?php echo $_smarty_tpl->tpl_vars['product']->value['title'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Введите метатег Description"><?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Введите метатег Keywords"><?php echo $_smarty_tpl->tpl_vars['product']->value['keywords'];?>
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
<?php if ($_smarty_tpl->tpl_vars['action']->value=='promo'){?>
    <?php echo adminTitle('<a href="?page=catalog">Каталог товаров</a> / Промокоды');?>

    <?php if (!empty($_smarty_tpl->tpl_vars['promos']->value)){?>
        <a href="?page=catalog" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
        <a href="?page=catalog&action=addPromo" class="button"><img src="img/icons/plus.png" alt=""/>Добавить</a>
        <table class="datatable display">
            <thead>
            <tr>
                <th>ID</th>
                <th><b>Название</b></th>
                <th><b>Скидка</b></th>
                <th><b>Значение</b></th>
                <th><b>Действия</b></th>
                <th><b>Дата окончания</b></th>
            </tr>
            </thead>
            <tbody>
            <?php  $_smarty_tpl->tpl_vars['promo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['promo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['promos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['promo']->key => $_smarty_tpl->tpl_vars['promo']->value){
$_smarty_tpl->tpl_vars['promo']->_loop = true;
?>
                <tr class="odd gradeA">
                    <td style="width: 40px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['promo']->value['id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['promo']->value['name'];?>
</td>
                    <td style="width: 40px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['promo']->value['discount']*100;?>
%</td>
                    <td class="center"><?php echo $_smarty_tpl->tpl_vars['promo']->value['value'];?>
</td>
                    <td class="center"><?php echo $_smarty_tpl->tpl_vars['promo']->value['date'];?>
</td>
                    <td style="width: 80px;">
                        <table class="events">
                            <tr>
                                <td>
                                    <a href="?page=catalog&action=editPromo&id=<?php echo $_smarty_tpl->tpl_vars['promo']->value['id'];?>
">
                                        <span class="icon_cont icon_cont_edit" title="Редактировать"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" onclick="confirmDelete('Удаление промокода', 'Вы подтверждаете удаление промокода?', '?page=catalog&action=delPromo&id=<?php echo $_smarty_tpl->tpl_vars['promo']->value['id'];?>
');">
                                        <span class="icon_cont icon_cont_del" title="Удалить"></span>
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
        <?php echo error('На данный момент промокодов нет');?>

        <a href="?page=catalog" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
        <a href="?page=catalog&action=addPromo" class="button"><img src="img/icons/plus.png" alt=""/>Добавить</a>
    <?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='addPromo'){?>
    <?php echo adminTitle('<a href="?page=catalog">Каталог товаров</a> / <a href="?page=catalog&action=promo">Промокоды</a> / Добавление промокода');?>

    <a href="?page=catalog&action=promo" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <form action="?page=catalog&action=addPromo" method="post" class="formly">
        <table>
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название" maxlength="128" size="32" require="true" label="название промокода" />
                </td>
            </tr>
            <tr>
                <td>
                    Код:
                </td>
                <td>
                    <input type="text" name="value" placeholder="Введите код" maxlength="128" size="32" require="true" label="код" />
                </td>
            </tr>
            <tr>
                <td>
                    Скидка:
                </td>
                <td>
                    <input type="text" name="discount" placeholder="Введите скидку" maxlength="128" size="32" require="true" label="скидку" />
                </td>
            </tr>
            <tr>
                <td>
                    Дата окончания:
                </td>
                <td>
                    <input type="text" name="date" class="datepicker" placeholder="Введите дату" maxlength="128" size="32" require="true" label="дату окончания" />
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
<?php if ($_smarty_tpl->tpl_vars['action']->value=='editPromo'){?>
    <?php echo adminTitle('<a href="?page=catalog">Каталог товаров</a> / <a href="?page=catalog&action=promo">Промокоды</a> / Редактирование промокода');?>

    <a href="?page=catalog&action=promo" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <form action="?page=catalog&action=editPromo&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly">
        <table>
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название" maxlength="128" size="32" require="true" label="название промокода" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['promo']->value['name']);?>
" />
                </td>
            </tr>
            <tr>
                <td>
                    Код:
                </td>
                <td>
                    <input type="text" name="value" placeholder="Введите код" maxlength="128" size="32" require="true" label="код" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['promo']->value['value']);?>
" />
                </td>
            </tr>
            <tr>
                <td>
                    Скидка:
                </td>
                <td>
                    <input type="text" name="discount" placeholder="Введите скидку" maxlength="128" size="32" require="true" label="скидку" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['promo']->value['discount']);?>
" />
                </td>
            </tr>
            <tr>
                <td>
                    Дата окончания:
                </td>
                <td>
                    <input type="text" name="date" class="datepicker" placeholder="Введите дату" maxlength="128" size="32" require="true" label="дату окончания" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['promo']->value['date']);?>
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