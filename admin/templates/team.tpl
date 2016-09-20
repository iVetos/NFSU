{* Показать все *}
{if $action == 'show'}
    {$page_name|adminTitle}
    {if !empty($some)}
    <a href="?page={$page_addr}&action=add&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>Добавить запись</a>
    <table class="dt_pages display">
		<thead>
			<tr>
				<th>ID</th>
				<th><b>Имя</b></th>
                <th><b>Должность</b></th>
				<th><b>Действия</b></th>
			</tr>
		</thead>
		<tbody>
            {foreach from=$some item=item}
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;">{$item.id}</td>
				<td>{$item.name}</td>
                <td>{$item.post}</td>
				<td style="width: 80px; text-align: center;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page={$page_addr}&action=edit&id={$item.id}">
                                	<span class="icon_cont icon_cont_edit" title="Редактировать запись">
                                	</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Удаление записи', 'Вы подтверждаете удаление записи?', '?page={$page_addr}&action=del&id={$item.id}');">
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
        {'Членов команды пока нет'|error}
        <a href="?page={$page_addr}&action=add&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>Добавить запись</a>
    {/if}
{/if}

{* Добавление *}
{if $action == 'add'}
    {'<a href="?page=team">Наша команда</a> / Добавление записи'|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <form action="?page={$page_addr}&action=add&id={$id}" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Имя:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="Введите имя" maxlength="128" size="32" require="true" label="имя" />
                </td>
            </tr>
            <tr>
                <td>
                    Должность:
                </td>
                <td>
                    <input type="text" name="post" placeholder="Введите должность" maxlength="128" size="32" />
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
                    Вконтакте:
                </td>
                <td>
                    <input type="text" name="post" placeholder="Введите ссылку на вконтакте" maxlength="128" size="32" />
                </td>
            </tr>
            <tr>
                <td>
                    Facebook:
                </td>
                <td>
                    <input type="text" name="post" placeholder="Введите ссылку на facebook" maxlength="128" size="32" />
                </td>
            </tr>
            <tr>
                <td>
                    Сайт:
                </td>
                <td>
                    <input type="text" name="post" placeholder="Введите адрес сайта" maxlength="128" size="32" />
                </td>
            </tr>
            <tr>
                <td>
                    Краткое описание:
                </td>
                <td>
                    <textarea name="text_s" rows="20" cols="60" class="ckeditor" placeholder="Введите текст записи"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Описание:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor" placeholder="Введите текст записи"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Введите метатег title"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Введите метатег description"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Введите метатег keywords"></textarea>
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

{* Редактирование записи *}
{if $action == 'edit'}
    {'<a href="?page=team">Наша команда</a> / Редактирование записи'|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <form action="?page={$page_addr}&action=edit&id={$id}" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Имя:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="Введите имя" value="{$some.name|stripslashes}" maxlength="128" size="32" require="true" label="имя" />
                </td>
            </tr>
            <tr>
                <td>
                    Должность:
                </td>
                <td>
                    <input type="text" name="post" placeholder="Введите должность" maxlength="128" size="32" value="{$some.post|stripslashes}" />
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
                    Вконтакте:
                </td>
                <td>
                    <input type="text" name="post" placeholder="Введите ссылку на вконтакте" maxlength="128" size="32" value="{$some.post|stripslashes}" />
                </td>
            </tr>
            <tr>
                <td>
                    Facebook:
                </td>
                <td>
                    <input type="text" name="post" placeholder="Введите ссылку на facebook" maxlength="128" size="32" value="{$some.post|stripslashes}" />
                </td>
            </tr>
            <tr>
                <td>
                    Сайт:
                </td>
                <td>
                    <input type="text" name="post" placeholder="Введите адрес сайта" maxlength="128" size="32" value="{$some.post|stripslashes}" />
                </td>
            </tr>
            <tr>
                <td>
                    Краткое описание:
                </td>
                <td>
                    <textarea name="text_s" rows="20" cols="60" class="ckeditor" placeholder="Введите текст записи">{$some.text_s}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Описание:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor" placeholder="Введите текст записи">{$some.text}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Введите метатег title">{$some.title}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Введите метатег description">{$some.description}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Введите метатег keywords">{$some.keywords}</textarea>
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