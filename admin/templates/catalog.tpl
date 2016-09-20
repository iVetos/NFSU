{* Show all *}
{if $action == 'show'}
    {$lang_text.catalog_show|adminTitle}
    {if !empty($categories)}
    <a href="?page=catalog&action=addCat&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/> {$lang_text.catalog_add_category}</a>
    <a href="?page=catalog&action=sort&id={$id}" class="button"><img src="img/icons/sort.png" alt=""/>{$lang_text.catalog_order}</a>
    <a href="?page=catalog&action=tms" class="button"><img src="img/icons/tm.png" alt=""/> {$lang_text.catalog_tm}</a>
    <a href="?page=catalog&action=promo" class="button"><img src="img/icons/promo.png" alt=""/> {$lang_text.catalog_promo}</a>
    <table class="dt-three display">
		<thead>
			<tr>
				<th>#</th>
				<th>{$lang_text.name}</th>
				<th>{$lang_text.actions}</th>
			</tr>
		</thead>
		<tbody>
            {foreach from=$categories item=category}
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;">{$category.sort}</td>
				<td>{$category.name}</td>
				<td style="width: 160px;">
                    <table class="events">
                        <tr>
                            <td class="visible">
                                {if $category.actual eq 1}
                                <span class="none vid">{$category.id}</span><span class="none vvalue">0</span><span class="none vtable">categories</span>
                                <a href="javascript:void(0);">
            						<span class="icon_cont icon_cont_visible" title="{$lang_text.hide}"></span>
            					</a>
                                {else}
                                <span class="none vid">{$category.id}</span><span class="none vvalue">1</span><span class="none vtable">categories</span>
                                <a href="javascript:void(0);">
            						<span class="icon_cont icon_cont_invisible" title="{$lang_text.show}"></span>
            					</a>
                                {/if}
                            </td>
                            <td>
                                <a href="?page=catalog&action=show&id={$category.id}">
            						<span class="icon_cont icon_cont_more" title="{$lang_text.more}"></span>
            					</a>
                            </td>
                            <td>
                                <a href="?page=catalog&action=editCat&id={$category.id}">
                                	<span class="icon_cont icon_cont_edit" title="{$lang_text.edit}"></span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Deleting of the category', 'If you will delete the category, then it will delete items in this<br/>  category. This action cannot be undone. <br/><br/> Do you accept deleting of the category?', '?page=catalog&action=delCat&id={$category.id}');">
            						<span class="icon_cont icon_cont_del" title="{$lang_text.delete}"></span>
            					</a>
                            </td>
                        </tr>
                    </table>
				</td>
			</tr>
            {/foreach}
		</tbody>
	</table>
    {elseif !empty($products)}
        <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> {$lang_text.back}</a>
        <a href="?page=catalog&action=addProduct&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>{$lang_text.catalog_add_product}</a>
        <a href="?page=catalog&action=tms" class="button"><img src="img/icons/tm.png" alt=""/> {$lang_text.catalog_tm}</a>
        <a href="?page=catalog&action=promo" class="button"><img src="img/icons/promo.png" alt=""/> {$lang_text.catalog_promo}</a>
        <table class="datatable display">
		<thead>
			<tr>
				<th>ID</th>
                <th>Image</th>
                <th>Название</th>
                {if $smarty.const.__MOD_SHOP_PRICE}<th><b>Цена</b></th>{/if}
				<th>Действия</th>
			</tr>
		</thead>
		<tbody>
            {foreach from=$products item=product}
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;">{$product.id}</td>
                <td style="width: 110px; text-align: center;">
                    {if strlen($product.img_1) > 2}
                        <a class="fancybox" rel="Canvas" href="img/products/{$product.img_1}"><img src="img/products/adm_{$product.img_1}" class="img" alt=""></a>
                    {else}
                        <img src="img/design/noimg.jpg" class="img" alt="">
                    {/if}
                </td>
				<td>{$product.name}</td>
                {if $smarty.const.__MOD_SHOP_PRICE}<td style="width: 100px; text-align: center;">{$product.price}</td>{/if}
				<td style="width: 80px;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=catalog&action=editProduct&id={$product.id}">
                                	<span class="icon_cont icon_cont_edit" title="Редактировать"></span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Удаление товара', 'Вы подтверждаете удаление товара?', '?page=catalog&action=delProduct&id={$product.id}');">
            						<span class="icon_cont icon_cont_del" title="Удалить"></span>
            					</a>
                            </td>
                        </tr>
                    </table>
				</td>
			</tr>
            {/foreach}
		</tbody>
	</table>
    {else}
        {'Разделов или товаров пока нет'|error}
        <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> {$lang_text.back}</a>
        <a href="?page=catalog&action=tms" class="button"><img src="img/icons/tm.png" alt=""/> Торговые марки</a>
        <a href="?page=catalog&action=addCat&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>Добавить раздел</a>
        <a href="?page=catalog&action=addProduct&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>Добавить товар</a>
    {/if}
{/if}

{* Добавление раздела *}
{if $action == 'addCat'}
    {'<a href="?page=catalog">Каталог товаров</a> / Добавление раздела'|adminTitle}
    <a href="?page=catalog&action=show&id={$id}" class="button"><img src="img/icons/back.png" alt=""/> {$lang_text.back}</a>
    {*}<a href="?page=help&cat=catalog#actions-add-cat" class="button"><img src="img/icons/help.png" alt=""/>Справка</a>{*}
    <form action="?page=catalog&action=addCat&id={$id}" method="post" class="formly" enctype="multipart/form-data">
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
            {if $smarty.const.__MOD_SHOP_PARAMS}
            <tr>
                <td>
                    Параметр 1:
                </td>
                <td>
                    <input type="text" name="param1" size="24" placeholder="Название параметра 1" {if !isset($mainCat)}value="{if !empty($params.param1_name)}{$params.param1_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param1_type_1" name="param1_type" value="1" {if empty($params)}checked="checked" {/if}{if !isset($mainCat)}{if $params.param1_type eq 1}checked="checked"{/if}{/if}/><label for="param1_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param1_type_2" name="param1_type" value="2" {if !isset($mainCat)}{if $params.param1_type eq 2}checked="checked"{/if}{/if}/><label for="param1_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param1_type_3" name="param1_type" value="3" {if !isset($mainCat)}{if $params.param1_type eq 3}checked="checked"{/if}{/if}/><label for="param1_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param1_step" size="4" maxlength="10" placeholder="Шаг" {if !isset($mainCat)}value="{if !empty($params.param1_step)}{$params.param1_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 2:
                </td>
                <td>
                    <input type="text" name="param2" size="24" placeholder="Название параметра 2" {if !isset($mainCat)}value="{if !empty($params.param2_name)}{$params.param2_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param2_type_1" name="param2_type" value="1" {if empty($params)}checked="checked" {/if}{if !isset($mainCat)}{if $params.param2_type eq 1}checked="checked"{/if}{/if}/><label for="param2_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param2_type_2" name="param2_type" value="2" {if !isset($mainCat)}{if $params.param2_type eq 2}checked="checked"{/if}{/if}/><label for="param2_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param2_type_3" name="param2_type" value="3" {if !isset($mainCat)}{if $params.param2_type eq 3}checked="checked"{/if}{/if}/><label for="param2_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param2_step" size="4" maxlength="10" placeholder="Шаг" {if !isset($mainCat)}value="{if !empty($params.param2_step)}{$params.param2_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 3:
                </td>
                <td>
                    <input type="text" name="param3" size="24" placeholder="Название параметра 3" {if !isset($mainCat)}value="{if !empty($params.param3_name)}{$params.param3_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param3_type_1" name="param3_type" value="1" {if empty($params)}checked="checked" {/if}{if !isset($mainCat)}{if $params.param3_type eq 1}checked="checked"{/if}{/if}/><label for="param3_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param3_type_2" name="param3_type" value="2" {if !isset($mainCat)}{if $params.param3_type eq 2}checked="checked"{/if}{/if}/><label for="param3_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param3_type_3" name="param3_type" value="3" {if !isset($mainCat)}{if $params.param3_type eq 3}checked="checked"{/if}{/if}/><label for="param3_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param3_step" size="4" maxlength="10" placeholder="Шаг" {if !isset($mainCat)}value="{if !empty($params.param3_step)}{$params.param3_step}{/if}"{/if}/>
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 4:
                </td>
                <td>
                    <input type="text" name="param4" size="24" placeholder="Название параметра 4" {if !isset($mainCat)}value="{if !empty($params.param4_name)}{$params.param4_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param4_type_1" name="param4_type" value="1" {if empty($params)}checked="checked" {/if}{if !isset($mainCat)}{if $params.param4_type eq 1}checked="checked"{/if}{/if}/><label for="param4_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param4_type_2" name="param4_type" value="2" {if !isset($mainCat)}{if $params.param4_type eq 2}checked="checked"{/if}{/if}/><label for="param4_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param4_type_3" name="param4_type" value="3" {if !isset($mainCat)}{if $params.param4_type eq 3}checked="checked"{/if}{/if}/><label for="param4_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param4_step" size="4" maxlength="10" placeholder="Шаг" {if !isset($mainCat)}value="{if !empty($params.param4_step)}{$params.param4_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 5:
                </td>
                <td>
                    <input type="text" name="param5" size="24" placeholder="Название параметра 5" {if !isset($mainCat)}value="{if !empty($params.param5_name)}{$params.param5_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param5_type_1" name="param5_type" value="1" {if empty($params)}checked="checked" {/if}{if !isset($mainCat)}{if $params.param5_type eq 1}checked="checked"{/if}{/if}/><label for="param5_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param5_type_2" name="param5_type" value="2" {if !isset($mainCat)}{if $params.param5_type eq 2}checked="checked"{/if}{/if}/><label for="param5_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param5_type_3" name="param5_type" value="3" {if !isset($mainCat)}{if $params.param5_type eq 3}checked="checked"{/if}{/if}/><label for="param5_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param5_step" size="4" maxlength="10" placeholder="Шаг" {if !isset($mainCat)}value="{if !empty($params.param5_step)}{$params.param5_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 6:
                </td>
                <td>
                    <input type="text" name="param6" size="24" placeholder="Название параметра 6" {if !isset($mainCat)}value="{if !empty($params.param6_name)}{$params.param6_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param6_type_1" name="param6_type" value="1" {if empty($params)}checked="checked" {/if}{if !isset($mainCat)}{if $params.param6_type eq 1}checked="checked"{/if}{/if}/><label for="param6_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param6_type_2" name="param6_type" value="2" {if !isset($mainCat)}{if $params.param6_type eq 2}checked="checked"{/if}{/if}/><label for="param6_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param6_type_3" name="param6_type" value="3" {if !isset($mainCat)}{if $params.param6_type eq 3}checked="checked"{/if}{/if}/><label for="param6_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param6_step" size="4" maxlength="10" placeholder="Шаг" {if !isset($mainCat)}value="{if !empty($params.param6_step)}{$params.param6_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 7:
                </td>
                <td>
                    <input type="text" name="param7" size="24" placeholder="Название параметра 7" {if !isset($mainCat)}value="{if !empty($params.param7_name)}{$params.param7_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param7_type_1" name="param7_type" value="1" {if empty($params)}checked="checked" {/if}{if !isset($mainCat)}{if $params.param7_type eq 1}checked="checked"{/if}{/if}/><label for="param7_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param7_type_2" name="param7_type" value="2" {if !isset($mainCat)}{if $params.param7_type eq 2}checked="checked"{/if}{/if}/><label for="param7_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param7_type_3" name="param7_type" value="3" {if !isset($mainCat)}{if $params.param7_type eq 3}checked="checked"{/if}{/if}/><label for="param7_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param7_step" size="4" maxlength="10" placeholder="Шаг" {if !isset($mainCat)}value="{if !empty($params.param7_step)}{$params.param7_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 8:
                </td>
                <td>
                    <input type="text" name="param8" size="24" placeholder="Название параметра 8" {if !isset($mainCat)}value="{if !empty($params.param8_name)}{$params.param8_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param8_type_1" name="param8_type" value="1" {if empty($params)}checked="checked" {/if}{if !isset($mainCat)}{if $params.param8_type eq 1}checked="checked"{/if}{/if}/><label for="param8_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param8_type_2" name="param8_type" value="2" {if !isset($mainCat)}{if $params.param8_type eq 2}checked="checked"{/if}{/if}/><label for="param8_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param8_type_3" name="param8_type" value="3" {if !isset($mainCat)}{if $params.param8_type eq 3}checked="checked"{/if}{/if}/><label for="param8_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param8_step" size="4" maxlength="10" placeholder="Шаг" {if !isset($mainCat)}value="{if !empty($params.param8_step)}{$params.param8_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 9:
                </td>
                <td>
                    <input type="text" name="param9" size="24" placeholder="Название параметра 9" {if !isset($mainCat)}value="{if !empty($params.param9_name)}{$params.param9_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param9_type_1" name="param9_type" value="1" {if empty($params)}checked="checked" {/if}{if !isset($mainCat)}{if $params.param9_type eq 1}checked="checked"{/if}{/if}/><label for="param9_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param9_type_2" name="param9_type" value="2" {if !isset($mainCat)}{if $params.param9_type eq 2}checked="checked"{/if}{/if}/><label for="param9_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param9_type_3" name="param9_type" value="3" {if !isset($mainCat)}{if $params.param9_type eq 3}checked="checked"{/if}{/if}/><label for="param9_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param9_step" size="4" maxlength="10" placeholder="Шаг" {if !isset($mainCat)}value="{if !empty($params.param9_step)}{$params.param9_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 10:
                </td>
                <td>
                    <input type="text" name="param10" size="24" placeholder="Название параметра 10" {if !isset($mainCat)}value="{if !empty($params.param10_name)}{$params.param10_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param10_type_1" name="param10_type" value="1" {if empty($params)}checked="checked" {/if}{if !isset($mainCat)}{if $params.param10_type eq 1}checked="checked"{/if}{/if}/><label for="param10_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param10_type_2" name="param10_type" value="2" {if !isset($mainCat)}{if $params.param10_type eq 2}checked="checked"{/if}{/if}/><label for="param10_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param10_type_3" name="param10_type" value="3" {if !isset($mainCat)}{if $params.param10_type eq 3}checked="checked"{/if}{/if}/><label for="param10_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param10_step" size="4" maxlength="10" placeholder="Шаг" {if !isset($mainCat)}value="{if !empty($params.param10_step)}{$params.param10_step}{/if}"{/if} />
                </td>
            </tr>
            {/if}
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
{/if}

{* Редактирование раздела *}
{if $action == 'editCat'}
    {'<a href="?page=catalog">Каталог товаров</a> / Редактирование раздела'|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    {*}<a href="?page=help&cat=catalog#actions-edit-cat" class="button"><img src="img/icons/help.png" alt=""/>Справка</a>{*}
    <form action="?page=catalog&action=editCat&id={$id}" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Заголовок:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название раздела" value="{$category.name|stripslashes}" maxlength="128" size="32" require="true" label="заголовок раздела" />
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
                    <textarea name="text" rows="20" class="ckeditor" cols="60">{$category.text|stripslashes}</textarea>
                </td>
            </tr>
            {if $smarty.const.__MOD_SHOP_PARAMS}
            <tr>
                <td>
                    Параметр 1:
                </td>
                <td>
                    <input type="text" name="param1" size="24" placeholder="Название параметра 1" {if !empty($params)}value="{if !empty($params.param1_name)}{$params.param1_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param1_type_1" name="param1_type" value="1" {if empty($params)}checked="checked"{/if}{if !empty($params)}{if $params.param1_type eq 1}checked="checked"{/if}{/if}/><label for="param1_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param1_type_2" name="param1_type" value="2" {if !empty($params)}{if $params.param1_type eq 2}checked="checked"{/if}{/if}/><label for="param1_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param1_type_3" name="param1_type" value="3" {if !empty($params)}{if $params.param1_type eq 3}checked="checked"{/if}{/if}/><label for="param1_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param1_step" size="5" maxlength="10" placeholder="Шаг" {if !empty($params)}value="{if !empty($params.param1_step)}{$params.param1_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 2:
                </td>
                <td>
                    <input type="text" name="param2" size="24" placeholder="Название параметра 2" {if !empty($params)}value="{if !empty($params.param2_name)}{$params.param2_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param2_type_1" name="param2_type" value="1" {if empty($params)}checked="checked"{/if}{if !empty($params)}{if $params.param2_type eq 1}checked="checked"{/if}{/if}/><label for="param2_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param2_type_2" name="param2_type" value="2" {if !empty($params)}{if $params.param2_type eq 2}checked="checked"{/if}{/if}/><label for="param2_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param2_type_3" name="param2_type" value="3" {if !empty($params)}{if $params.param2_type eq 3}checked="checked"{/if}{/if}/><label for="param2_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param2_step" size="5" maxlength="10" placeholder="Шаг" {if !empty($params)}value="{if !empty($params.param2_step)}{$params.param2_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 3:
                </td>
                <td>
                    <input type="text" name="param3" size="24" placeholder="Название параметра 3" {if !empty($params)}value="{if !empty($params.param3_name)}{$params.param3_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param3_type_1" name="param3_type" value="1" {if empty($params)}checked="checked"{/if}{if !empty($params)}{if $params.param3_type eq 1}checked="checked"{/if}{/if}/><label for="param3_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param3_type_2" name="param3_type" value="2" {if !empty($params)}{if $params.param3_type eq 2}checked="checked"{/if}{/if}/><label for="param3_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param3_type_3" name="param3_type" value="3" {if !empty($params)}{if $params.param3_type eq 3}checked="checked"{/if}{/if}/><label for="param3_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param3_step" size="5" maxlength="10" placeholder="Шаг" {if !empty($params)}value="{if !empty($params.param3_step)}{$params.param3_step}{/if}"{/if}/>
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 4:
                </td>
                <td>
                    <input type="text" name="param4" size="24" placeholder="Название параметра 4" {if !empty($params)}value="{if !empty($params.param4_name)}{$params.param4_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param4_type_1" name="param4_type" value="1" {if empty($params)}checked="checked"{/if}{if !empty($params)}{if $params.param4_type eq 1}checked="checked"{/if}{/if}/><label for="param4_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param4_type_2" name="param4_type" value="2" {if !empty($params)}{if $params.param4_type eq 2}checked="checked"{/if}{/if}/><label for="param4_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param4_type_3" name="param4_type" value="3" {if !empty($params)}{if $params.param4_type eq 3}checked="checked"{/if}{/if}/><label for="param4_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param4_step" size="5" maxlength="10" placeholder="Шаг" {if !empty($params)}value="{if !empty($params.param4_step)}{$params.param4_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 5:
                </td>
                <td>
                    <input type="text" name="param5" size="24" placeholder="Название параметра 5" {if !empty($params)}value="{if !empty($params.param5_name)}{$params.param5_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param5_type_1" name="param5_type" value="1" {if empty($params)}checked="checked"{/if}{if !empty($params)}{if $params.param5_type eq 1}checked="checked"{/if}{/if}/><label for="param5_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param5_type_2" name="param5_type" value="2" {if !empty($params)}{if $params.param5_type eq 2}checked="checked"{/if}{/if}/><label for="param5_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param5_type_3" name="param5_type" value="3" {if !empty($params)}{if $params.param5_type eq 3}checked="checked"{/if}{/if}/><label for="param5_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param5_step" size="5" maxlength="10" placeholder="Шаг" {if !empty($params)}value="{if !empty($params.param5_step)}{$params.param5_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 6:
                </td>
                <td>
                    <input type="text" name="param6" size="24" placeholder="Название параметра 6" {if !empty($params)}value="{if !empty($params.param6_name)}{$params.param6_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param6_type_1" name="param6_type" value="1" {if empty($params)}checked="checked"{/if}{if !empty($params)}{if $params.param6_type eq 1}checked="checked"{/if}{/if}/><label for="param6_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param6_type_2" name="param6_type" value="2" {if !empty($params)}{if $params.param6_type eq 2}checked="checked"{/if}{/if}/><label for="param6_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param6_type_3" name="param6_type" value="3" {if !empty($params)}{if $params.param6_type eq 3}checked="checked"{/if}{/if}/><label for="param6_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param6_step" size="5" maxlength="10" placeholder="Шаг" {if !empty($params)}value="{if !empty($params.param6_step)}{$params.param6_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 7:
                </td>
                <td>
                    <input type="text" name="param7" size="24" placeholder="Название параметра 7" {if !empty($params)}value="{if !empty($params.param7_name)}{$params.param7_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param7_type_1" name="param7_type" value="1" {if empty($params)}checked="checked"{/if}{if !empty($params)}{if $params.param7_type eq 1}checked="checked"{/if}{/if}/><label for="param7_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param7_type_2" name="param7_type" value="2" {if !empty($params)}{if $params.param7_type eq 2}checked="checked"{/if}{/if}/><label for="param7_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param7_type_3" name="param7_type" value="3" {if !empty($params)}{if $params.param7_type eq 3}checked="checked"{/if}{/if}/><label for="param7_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param7_step" size="5" maxlength="10" placeholder="Шаг" {if !empty($params)}value="{if !empty($params.param7_step)}{$params.param7_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 8:
                </td>
                <td>
                    <input type="text" name="param8" size="24" placeholder="Название параметра 8" {if !empty($params)}value="{if !empty($params.param8_name)}{$params.param8_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param8_type_1" name="param8_type" value="1" {if empty($params)}checked="checked"{/if}{if !empty($params)}{if $params.param8_type eq 1}checked="checked"{/if}{/if}/><label for="param8_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param8_type_2" name="param8_type" value="2" {if !empty($params)}{if $params.param8_type eq 2}checked="checked"{/if}{/if}/><label for="param8_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param8_type_3" name="param8_type" value="3" {if !empty($params)}{if $params.param8_type eq 3}checked="checked"{/if}{/if}/><label for="param8_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param8_step" size="5" maxlength="10" placeholder="Шаг" {if !empty($params)}value="{if !empty($params.param8_step)}{$params.param8_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 9:
                </td>
                <td>
                    <input type="text" name="param9" size="24" placeholder="Название параметра 9" {if !empty($params)}value="{if !empty($params.param9_name)}{$params.param9_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param9_type_1" name="param9_type" value="1" {if empty($params)}checked="checked"{/if}{if !empty($params)}{if $params.param9_type eq 1}checked="checked"{/if}{/if}/><label for="param9_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param9_type_2" name="param9_type" value="2" {if !empty($params)}{if $params.param9_type eq 2}checked="checked"{/if}{/if}/><label for="param9_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param9_type_3" name="param9_type" value="3" {if !empty($params)}{if $params.param9_type eq 3}checked="checked"{/if}{/if}/><label for="param9_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param9_step" size="5" maxlength="10" placeholder="Шаг" {if !empty($params)}value="{if !empty($params.param9_step)}{$params.param9_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Параметр 10:
                </td>
                <td>
                    <input type="text" name="param10" size="24" placeholder="Название параметра 10" {if !empty($params)}value="{if !empty($params.param10_name)}{$params.param10_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param10_type_1" name="param10_type" value="1" {if empty($params)}checked="checked"{/if}{if !empty($params)}{if $params.param10_type eq 1}checked="checked"{/if}{/if}/><label for="param10_type_1"> Текстовый</label>&nbsp;
                        <input type="radio" id="param10_type_2" name="param10_type" value="2" {if !empty($params)}{if $params.param10_type eq 2}checked="checked"{/if}{/if}/><label for="param10_type_2"> Числовой</label>&nbsp;
                        <input type="radio" id="param10_type_3" name="param10_type" value="3" {if !empty($params)}{if $params.param10_type eq 3}checked="checked"{/if}{/if}/><label for="param10_type_3"> С запятой</label>
                    </span>
                    <input type="text" name="param10_step" size="5" maxlength="10" placeholder="Шаг" {if !empty($params)}value="{if !empty($params.param10_step)}{$params.param10_step}{/if}"{/if} />
                </td>
            </tr>
            {/if}
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Введите метатег Title">{$category.title|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Введите метатег Description">{$category.description|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Введите метатег Keywords">{$category.keywords|stripslashes}</textarea>
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
{/if}

{* Порядок сортировки *}
{if $action == 'sort'}
{'<a href="?page=catalog">Каталог товаров</a> / Порядок сортировки'|adminTitle}
<span id="page_id" class="none">{$id}</span>
<a href="?page=catalog&id={$id}" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
<a href="?page=help&cat=catalog#actions-sort" class="button"><img src="img/icons/help.png" alt=""/>Справка</a>
<ul id="sortable_cat">
    {foreach from=$categories item="item" name="categories"}
    <li id="id-{$item.id}"><span>{$smarty.foreach.categories.iteration}</span> {$item.name}</li>
    {/foreach}
</ul>
{'Порядок сортировки сохранён'|alert}
{/if}

{* --------------------------------------------------------- Торговые марки ------------------------------------------------------------- *}
{* Показать все тм *}
{if $action == 'tms'}
    {'<a href="?page=catalog">Каталог товаров</a> / Торговые марки'|adminTitle}
    {if !empty($tms)}
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
            {foreach from=$tms item=tm}
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;">{$tm.id}</td>
				<td>{$tm.name}</td>
				<td style="width: 80px;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=catalog&action=editTm&id={$tm.id}">
                                	<span class="icon_cont icon_cont_edit" title="Редактировать"></span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Удаление торговой марки', 'Вы подтверждаете удаление торговой марки?', '?page=catalog&action=delTm&id={$tm.id}');">
            						<span class="icon_cont icon_cont_del" title="Удалить"></span>
            					</a>
                            </td>
                        </tr>
                    </table>
				</td>
			</tr>
            {/foreach}
		</tbody>
	</table>
    {else}
        {'На данный момент торговых марок нет'|error}
        <a href="?page=catalog" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
        <a href="?page=catalog&action=addTm" class="button"><img src="img/icons/plus.png" alt=""/>Добавить</a>
        <a href="?page=help&cat=tms" class="button"><img src="img/icons/help.png" alt=""/>Справка по разделу</a>
    {/if}
{/if}

{* Добавление тм *}
{if $action == 'addTm'}
    {'<a href="?page=catalog">Каталог товаров</a> / <a href="?page=catalog&actioan=tms">Торговые марки</a> / Добавление торговой марки'|adminTitle}
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
{/if}

{* Редактирование тм *}
{if $action == 'editTm'}
    {'<a href="?page=catalog">Каталог товаров</a> / <a href="?page=catalog&actioan=tms">Торговые марки</a> / Редактирование торговой марки'|adminTitle}
    <a href="?page=catalog&actioan=tms" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <a href="?page=help&cat=tms" class="button"><img src="img/icons/help.png" alt=""/>Справка по разделу</a>
    <form action="?page=catalog&action=editTm&id={$id}" method="post" class="formly">
        <table>
            <tr>
                <td>
                    Заголовок:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название" maxlength="128" size="32" require="true" label="название торговой марки" value="{$tms.name|stripslashes}" />
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
{/if}


{* --------------------------------------------------------- Товары --------------------------------------------------------------------- *}

{* Добавление товара *}
{if $action == 'addProduct'}
    {'<a href="?page=catalog">Каталог товаров</a> / Добавление товара'|adminTitle}
    <a href="?page=catalog&action=show&id={$id}" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
{*}<a href="?page=help&cat=tms" class="button"><img src="img/icons/help.png" alt=""/>Справка по разделу</a>{*}
<form action="?page=catalog&action=addProduct&id={$id}" method="post" class="formly" enctype="multipart/form-data">
    <table>
        {if $smarty.const.__CONST_SHOP_ARTICLE}
        <tr>
            <td>
                Артикул:
            </td>
            <td>
                <input type="text" name="article" placeholder="Введите артикул товара" maxlength="128" size="32" />
            </td>
        </tr>
        {/if}
        <tr>
            <td>
                Название:
            </td>
            <td>
                <input type="text" name="name" placeholder="Введите название товара" maxlength="128" size="32" require="true" label="название товара" />
            </td>
        </tr>
        {if $smarty.const.__CONST_SHOP_PROVIDER}
        <tr>
            <td>
                Поставщик:
            </td>
            <td>
                <input type="text" name="provider" placeholder="Введите поставщика" maxlength="128" size="32" />
            </td>
        </tr>
        {/if}
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
        {if $smarty.const.__MOD_SHOP_TM}
        <tr>
            <td>
                Торговая марка:
            </td>
            <td>
                <select size="1" name="tm">
                    {foreach from=$tm item='mark'}
                        <option value="{$mark.id}">{$mark.name}</option>
                    {/foreach}
                </select>
            </td>
        </tr>
        {/if}
        <tr>
            <td>
                Описание:
            </td>
            <td>
                <textarea name="text" rows="20" cols="60" class="ckeditor"></textarea>
            </td>
        </tr>
        {if $smarty.const.__MOD_SHOP_PRICE}
        <tr>
            <td>
                Цена:
            </td>
            <td>
                <input type="text" name="price" maxlength="15" size="6" require="true" label="цену товара" />
            </td>
        </tr>
        {/if}
        {if $smarty.const.__MOD_SHOP_PPRICE}
        <tr>
            <td>
                Цена закупки:
            </td>
            <td>
                <input type="text" name="pprice" maxlength="15" size="6"/>
            </td>
        </tr>
        {/if}
        {if $smarty.const.__MOD_SHOP_OLD_PRICE}
        <tr>
            <td>
                Старая цена:
            </td>
            <td>
                <input type="text" name="old_price" maxlength="15" size="6"/>
            </td>
        </tr>
        {/if}
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
        {if $smarty.const.__MOD_SHOP_PARAMS}
    {for $foo=1 to 10}
        {assign var="param" value='param'|cat:$foo}
        {assign var="param_name" value='param'|cat:$foo|cat:'_name'}
        {assign var="param_type" value='param'|cat:$foo|cat:'_type'}
        {assign var="param_step" value='param'|cat:$foo|cat:'_step'}
        {if !empty($params.$param_name)}
        <tr>
            <td>
                {$params.$param_name}:
            </td>
            <td>
                <input type="text" name="{$param}" placeholder="Введите значение" size="24"/>
                {if $params.$param_type eq 1}Текстовый{/if}
                {if $params.$param_type eq 2}Числовой с шагом {if !empty($params.$param_step)}{$params.$param_step}{else}1{/if}{/if}
                {if $params.$param_type eq 3}С запятой с шагом {if !empty($params.$param_step)}{$params.$param_step}{else}1{/if}{/if}
            </td>
        </tr>
        {/if}
    {/for}
        {/if}
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
{/if}

{* Редактирование товара *}
{if $action == 'editProduct'}
    {'<a href="?page=catalog">Каталог товаров</a> / Редактирование товара'|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    {*}<a href="?page=help&cat=tms" class="button"><img src="img/icons/help.png" alt=""/>Справка по разделу</a>{*}
    <form action="?page=catalog&action=editProduct&id={$id}" method="post" class="formly" enctype="multipart/form-data">
        <input type="hidden" name="product_id" value="{$id}" id="product_id" />
        <table>
            {if $smarty.const.__CONST_SHOP_ARTICLE}
            <tr>
                <td>
                    Артикул:
                </td>
                <td>
                    <input type="text" name="article" placeholder="Введите артикул товара" maxlength="128" size="32" value="{$product.article|stripslashes}" />
                </td>
            </tr>
            {/if}
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название товара" value="{$product.name|stripslashes}" maxlength="128" size="32" require="true" label="название товара" />
                </td>
            </tr>
            {if $smarty.const.__CONST_SHOP_PROVIDER}
            <tr>
                <td>
                    Поставщик:
                </td>
                <td>
                    <input type="text" name="provider" placeholder="Введите поставщика" maxlength="128" size="32" value="{$product.provider}" />
                </td>
            </tr>
            {/if}
            <tr>
                <td>
                    Изображение 1:
                </td>
                <td>
                    <input type="file" name="img_1" />&nbsp;
                    {if strlen($product.img_1) > 2}
                    <div class="cat_del_img">
                        <span class="cat_del_img_name none">{$product.img_1}</span>
                        <span class="cat_del_img_num none">img_1</span>
                        <a class="fancybox help" rel="group" href="../admin/img/products/{$product.img_1}">Просмотр</a>
                        <span class="cat_del_img_but help">Удалить</span>
                    </div>
                    {/if}
                </td>
            </tr>
            <tr>
                <td>
                    Изображение 2:
                </td>
                <td>
                    <input type="file" name="img_2" />&nbsp;
                    {if strlen($product.img_2) > 2}
                    <div class="cat_del_img">
                        <span class="cat_del_img_name none">{$product.img_2}</span>
                        <span class="cat_del_img_num none">img_2</span>
                        <a class="fancybox help" rel="group" href="../admin/img/products/{$product.img_2}">Просмотр</a>
                        <span class="cat_del_img_but help">Удалить</span>
                    </div>
                    {/if}
                </td>
            </tr>
            <tr>
                <td>
                    Изображение 3:
                </td>
                <td>
                    <input type="file" name="img_3" />&nbsp;
                    {if strlen($product.img_3) > 2}
                    <div class="cat_del_img">
                        <span class="cat_del_img_name none">{$product.img_3}</span>
                        <span class="cat_del_img_num none">img_3</span>
                        <a class="fancybox help" rel="group" href="../admin/img/products/{$product.img_3}">Просмотр</a>
                        <span class="cat_del_img_but help">Удалить</span>
                    </div>
                    {/if}
                </td>
            </tr>
            <tr>
                <td>
                    Изображение 4:
                </td>
                <td>
                    <input type="file" name="img_4" />&nbsp;
                    {if strlen($product.img_4) > 2}
                    <div class="cat_del_img">
                        <span class="cat_del_img_name none">{$product.img_4}</span>
                        <span class="cat_del_img_num none">img_4</span>
                        <a class="fancybox help" rel="group" href="../admin/img/products/{$product.img_4}">Просмотр</a>
                        <span class="cat_del_img_but help">Удалить</span>
                    </div>
                    {/if}
                </td>
            </tr>
            {if $smarty.const.__MOD_SHOP_TM}
            <tr>
                <td>
                    Торговая марка:
                </td>
                <td>
                    <select size="1" name="tm">
                        {foreach from=$tm item='mark'}
                            <option value="{$mark.id}" {if $mark.id eq $product.id_tm}selected="selected"{/if}>{$mark.name}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            {/if}
            <tr>
                <td>
                    Описание:
                </td>
                <td>
                    <textarea name="text" rows="20" class="ckeditor" cols="60">{$product.text|stripslashes}</textarea>
                </td>
            </tr>
            {if $smarty.const.__MOD_SHOP_PRICE}
            <tr>
                <td>
                    Цена:
                </td>
                <td>
                    <input type="text" name="price" maxlength="15" size="6" require="true" label="цену товара" value="{$product.price}" />
                </td>
            </tr>
            {/if}
            {if $smarty.const.__MOD_SHOP_PPRICE}
            <tr>
                <td>
                    Цена закупки:
                </td>
                <td>
                    <input type="text" name="pprice" maxlength="15" size="6" value="{$product.pprice}" />
                </td>
            </tr>
            {/if}
            {if $smarty.const.__MOD_SHOP_OLD_PRICE}
            <tr>
                <td>
                    Старая цена:
                </td>
                <td>
                    <input type="text" name="old_price" maxlength="15" size="6" value="{$product.old_price}" />
                </td>
            </tr>
            {/if}
            <tr>
                <td>
                    Дополнительно:&nbsp;
                </td>
                <td>
                    <div id="cb">
                        <input type="checkbox" name="new" value="1" id="cb_new" {if $product.new eq 1}checked="checked"{/if}/><label for="cb_new">Новинка</label>&nbsp;
                        <input type="checkbox" name="top" value="1" id="cb_top" {if $product.top eq 1}checked="checked"{/if}/><label for="cb_top">Топ продаж</label>&nbsp;
                        <input type="checkbox" name="none" value="1" id="cb_none" {if $product.none eq 1}checked="checked"{/if}/><label for="cb_none">Нет в наличии</label>
                    </div>
                </td>
            </tr>
            {if $smarty.const.__MOD_SHOP_PARAMS}
        {for $foo=1 to 10}
            {assign var="param" value='param'|cat:$foo}
            {assign var="param_name" value='param'|cat:$foo|cat:'_name'}
            {assign var="param_type" value='param'|cat:$foo|cat:'_type'}
            {assign var="param_step" value='param'|cat:$foo|cat:'_step'}
            {if !empty($params.$param_name)}
            <tr>
                <td>
                    {$params.$param_name}:
                </td>
                <td>
                    <input type="text" name="{$param}" placeholder="Введите значение" size="24" value="{$product.$param}"/>
                    {if $params.$param_type eq 1}Текстовый{/if}
                    {if $params.$param_type eq 2}Числовой с шагом {if !empty($params.$param_step)}{$params.$param_step}{else}1{/if}{/if}
                    {if $params.$param_type eq 3}С запятой с шагом {if !empty($params.$param_step)}{$params.$param_step}{else}1{/if}{/if}
                </td>
            </tr>
            {/if}
        {/for}
            {/if}
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Введите метатег Title">{$product.title}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Введите метатег Description">{$product.description}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Введите метатег Keywords">{$product.keywords}</textarea>
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
{/if}

{* --------------------------------------------------------- Промокоды ------------------------------------------------------------- *}
{* Показать все *}
{if $action == 'promo'}
    {'<a href="?page=catalog">Каталог товаров</a> / Промокоды'|adminTitle}
    {if !empty($promos)}
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
            {foreach from=$promos item=promo}
                <tr class="odd gradeA">
                    <td style="width: 40px; text-align: center;">{$promo.id}</td>
                    <td>{$promo.name}</td>
                    <td style="width: 40px; text-align: center;">{$promo.discount * 100}%</td>
                    <td class="center">{$promo.value}</td>
                    <td class="center">{$promo.date}</td>
                    <td style="width: 80px;">
                        <table class="events">
                            <tr>
                                <td>
                                    <a href="?page=catalog&action=editPromo&id={$promo.id}">
                                        <span class="icon_cont icon_cont_edit" title="Редактировать"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" onclick="confirmDelete('Удаление промокода', 'Вы подтверждаете удаление промокода?', '?page=catalog&action=delPromo&id={$promo.id}');">
                                        <span class="icon_cont icon_cont_del" title="Удалить"></span>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    {else}
        {'На данный момент промокодов нет'|error}
        <a href="?page=catalog" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
        <a href="?page=catalog&action=addPromo" class="button"><img src="img/icons/plus.png" alt=""/>Добавить</a>
    {/if}
{/if}

{* Добавление *}
{if $action == 'addPromo'}
    {'<a href="?page=catalog">Каталог товаров</a> / <a href="?page=catalog&action=promo">Промокоды</a> / Добавление промокода'|adminTitle}
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
{/if}

{* Редактирование *}
{if $action == 'editPromo'}
    {'<a href="?page=catalog">Каталог товаров</a> / <a href="?page=catalog&action=promo">Промокоды</a> / Редактирование промокода'|adminTitle}
    <a href="?page=catalog&action=promo" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <form action="?page=catalog&action=editPromo&id={$id}" method="post" class="formly">
        <table>
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название" maxlength="128" size="32" require="true" label="название промокода" value="{$promo.name|stripslashes}" />
                </td>
            </tr>
            <tr>
                <td>
                    Код:
                </td>
                <td>
                    <input type="text" name="value" placeholder="Введите код" maxlength="128" size="32" require="true" label="код" value="{$promo.value|stripslashes}" />
                </td>
            </tr>
            <tr>
                <td>
                    Скидка:
                </td>
                <td>
                    <input type="text" name="discount" placeholder="Введите скидку" maxlength="128" size="32" require="true" label="скидку" value="{$promo.discount|stripslashes}" />
                </td>
            </tr>
            <tr>
                <td>
                    Дата окончания:
                </td>
                <td>
                    <input type="text" name="date" class="datepicker" placeholder="Введите дату" maxlength="128" size="32" require="true" label="дату окончания" value="{$promo.date|stripslashes}" />
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
{/if}