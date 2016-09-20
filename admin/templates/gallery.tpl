{* Показать все разделы *}
{if $action == 'show'}
    {'Галерея'|adminTitle}
    {if !empty($gallery)}
    <a href="?page=gallery&action=add&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>Добавить галерею</a>
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
            {foreach from=$gallery item=cat}
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;">{$cat.id}</td>
				<td>{$cat.name}</td>
                <td style="width: 120px; text-align: center;">{$cat.kol_photo}</td>
                <td style="width: 120px; text-align: center;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=gallery&action=more&id={$cat.id}">
            						<span class="icon_cont icon_cont_see" title="Подробнее">
            						</span>
            					</a>
                            </td>
                            <td>
                                <a href="?page=gallery&action=edit&id={$cat.id}">
                                	<span class="icon_cont icon_cont_edit" title="Редактировать запись">
                                	</span>
                                </a>
                            </td>
                            <td>
                                <a href="?page=gallery&action=del&id={$cat.id}">
            						<span class="icon_cont icon_cont_del" title="Удалить запись">
            						</span>
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
        {'Галереи ещё не добавлены'|error}
        <a href="?page=gallery&action=add&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>Добавить галерею</a>
    {/if}
{/if}

{* Добавление раздела *}
{if $action == 'add'}
    {'<a href="?page=gallery">Галерея</a> / Добавление галереи'|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <form action="?page=gallery&action=add&id={$id}" method="post" class="formly" enctype="multipart/form-data">
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
{/if}

{* Редактирование разделы *}
{if $action == 'edit'}
    {'Редактирование фотоотчёта'|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <form action="?page=gallery&action=edit&id={$id}" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название" maxlength="128" size="32" require="true" label="название" value="{$gallery.name|stripslashes}" />
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
                    <input type="text" name="date" placeholder="Введите дату" maxlength="128" size="32" class="datepicker" value="{$gallery.date}" />
                </td>
            </tr>
            <tr>
                <td>
                    Описание:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor" placeholder="Введите описание">{$gallery.text|stripslashes}</textarea>
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

{* Показ картинок раздела *}
{if $action == 'more'}
    {"<a href='?page=gallery'>Галерея</a> / {$name_cat}"|adminTitle}
    <a href="?page=gallery" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <a href="?page=gallery&action=addimg&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>Добавить фото</a>
    <div class="clear"></div>
    {if !empty($gallery)}
        <ul class="gallery">
        {foreach from=$gallery.photos item="img" name="i"}
            <li id="id-{$img.id}" class="elem">
                <img src="../admin/img/gallery/{$img.small}" alt="" />
                <a class="fancybox butt2" rel="group" href="../admin/img/gallery/{$img.name}"><img src="img/icons/more.png" alt=""/>Просмотр</a>
                <a href="?page=gallery&action=delimg&id={$id}&idimg={$img.id}" class="butt"><img src="img/icons/del.png" alt=""/>Удалить</a>
            </li>
        {/foreach}
        </ul>
        <div class="clear"></div>
        {'Изменения сохранены'|alert}
    {else}
        {"Фото ещё не добавлены"|error}
    {/if}
{/if}

{* Добавление картинки *}
{if $action == 'addimg'}
    {"<a href='?page=gallery'>Галерея</a> / Добавление фотографий в {$name_cat}"|adminTitle}
    <form>
        <div id="queue"></div>
        <input id="id_cat_upl" name="id_cat_upl" type="hidden" value="{$id}" />
        <table>
            <tr>
                <td style="vertical-align: top;">
                    <a href="?page=gallery&action=more&id={$id}" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
                </td>
                <td style="vertical-align: top;">
                    <input id="file_upload" name="file_upload" type="file" multiple="true" />
                </td>
            </tr>
        </table>
   	</form>
{/if}
