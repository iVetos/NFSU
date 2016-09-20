{* Показать всех пользователей *}
{if $action == 'show'}
    {'Пользователи'|adminTitle}
    {if !empty($admins)}
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
            {foreach from=$admins item="admin" name="admins"}
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;">{$smarty.foreach.admins.iteration}</td>
				<td style="width: 360px;">{$admin.name}</td>
                <td>{$admin.level}</td>
                <td>{if $admin.last_date eq '0000-00-00 00:00:00'}Ещё не заходил{else}{$admin.last_date}{/if}</td>
                <td style="width: 80px; text-align: center;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=admins&action=edit&id={$admin.id}">
                                	<span class="icon_cont icon_cont_edit" title="Редактировать запись">
                                	</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Удаление пользователя', 'Вы подтверждаете удаление пользователя?', '?page=admins&action=del&id={$admin.id}');">
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
        {'Нет других пользователей'|error}
        <a href="?page=admins&action=add" class="button"><img src="img/icons/plus.png" alt=""/>Добавить пользователя</a>
        <a href="?page=admins&action=types" class="button"><img src="img/icons/tm.png" alt=""/>Типы пользователей</a>
        <a href="?page=help&cat=admins" class="button"><img src="img/icons/help.png" alt=""/>Справка по разделу</a>
    {/if}
{/if}

{* Добавление пользователя *}
{if $action == 'add'}
    {'<a href="?page=admins">Пользователи</a> / Добавление пользователя'|adminTitle}
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
                        {foreach from=$types item=type}
                            <option value="{$type.id}">{$type.name}</option>
                        {/foreach}
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
{/if}

{* Редактирование пользователя *}
{if $action == 'edit'}
    {'<a href="?page=admins">Пользователи</a> / Редактирование пользователя'|adminTitle}
    <a href="page=admins" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <a href="?page=help&cat=admins#actions-edit" class="button"><img src="img/icons/help.png" alt=""/>Справка</a>
    <form action="?page=admins&action=edit&id={$id}" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Имя:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите имя пользователя" maxlength="128" size="32" require="true" label="имя пользователя" value="{$admin.name}" />
                </td>
            </tr>
            <tr>
                <td>
                    Тип:
                </td>
                <td>
                    <select size="1" name="level">
                        {foreach from=$types item=type}
                            <option value="{$type.id}" {if $type.id eq $admin.id_level}selected="selected"{/if}>{$type.name}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Логин:
                </td>
                <td>
                    <input type="text" name="login" placeholder="Введите логин" maxlength="64" size="32" require="true" label="логин" value="{$admin.login}" />
                </td>
            </tr>
            <tr>
                <td>
                    Пароль:
                </td>
                <td>
                    <input type="text" name="pass" placeholder="Введите пароль" maxlength="64" size="32" require="true" label="пароль" value="{$admin.pass}" />
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

{* --------------------------------------------------- Типы пользователей ---------------------------------------------- *}
{* Показать все типы *}
{if $action == 'types'}
    {'<a href="?page=admins">Пользователи</a> / Типы пользователей'|adminTitle}
    {if !empty($types)}
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
            {foreach from=$types item="type" name="types"}
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;">{$smarty.foreach.types.iteration}</td>
				<td>{$type.name}</td>
                <td style="width: 80px; text-align: center;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=admins&action=edit_type&id={$type.id}">
                                	<span class="icon_cont icon_cont_edit" title="Редактировать запись">
                                	</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Удаление типа пользователей', 'Если Вы удалите тип пользователя, то удалятся и пользователи <br/> данного типа. Это действие невозможно будет отменить. <br/><br/> Вы подтверждаете удаление типа пользователей?', '?page=admins&action=del_type&id={$type.id}');">
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
        {'Нет других пользователей'|error}
        <a href="?page=admins&action=add" class="button"><img src="img/icons/plus.png" alt=""/>Добавить пользователя</a>
        <a href="?page=admins&action=types" class="button"><img src="img/icons/tm.png" alt=""/>Типы пользователей</a>
        <a href="?page=help&cat=admins" class="button"><img src="img/icons/help.png" alt=""/>Справка по разделу</a>
    {/if}
{/if}

{* Добавление типа пользователей *}
{if $action == 'add_type'}
    {'<a href="?page=admins">Пользователи</a> / <a href="?page=admins&action=types">Типы пользователей</a> / Добавление типа пользователей'|adminTitle}
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
                    {foreach from=$modules item="module"}
                        <li><input id="m{$module.id}" class="checkboxesli" type="checkbox" name="{$module.link}" value="1" /><label for="m{$module.id}">{$module.name}</label></li>
                    {/foreach}
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
{/if}

{* Редактирование типа пользователей *}
{if $action == 'edit_type'}
    {'<a href="?page=admins">Пользователи</a> / <a href="?page=admins&action=types">Типы пользователей</a> / Редактирование типа пользователей'|adminTitle}
    <a href="page=admins" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <a href="?page=help&cat=admins#actions-add-type" class="button"><img src="img/icons/help.png" alt=""/>Справка</a>
    <form action="?page=admins&action=edit_type&id={$id}" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название типа" maxlength="128" size="32" require="true" label="название" value="{$type.name}" />
                </td>
            </tr>
            <tr>
                <td>
                    Права:
                </td>
                <td>
                    <ul class="checkboxes">
                    {foreach from=$modules item="module"}
                        {assign var="mod" value=$module.link}
                        <li><input id="m{$module.id}" class="checkboxesli" type="checkbox" name="{$module.link}" {if $type.$mod eq 1}checked="checked"{/if} /><label for="m{$module.id}">{$module.name}</label></li>
                    {/foreach}
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
{/if}