{* Показать все тм *}
{if $action == 'show'}
    {'<a href="?page=catalog">Каталог товаров</a> / Торговые марки'|adminTitle}
    {if !empty($tms)}
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
            {foreach from=$tms item=tm}
			<tr class="odd gradeA">
				<td style="width: 60px;">{$tm.id}</td>
				<td>{$tm.name}</td>
				<td style="width: 120px;">
					<a href="?page=tms&action=edit&id={$tm.id}">
						<span class="icon_cont icon_cont_edit" title="Редактировать запись">
						</span>
					</a>
					<a href="?page=tms&action=del&id={$tm.id}" onclick="return confirmDelete();">
						<span class="icon_cont icon_cont_del" title="Удалить запись">
						</span>
					</a>
				</td>
			</tr>
            {/foreach}
		</tbody>
	</table>
    {else}
        {'На данный момент торговых марок нет'|error}
        <a href="javascript:history.go(-1)" class="button">Назад</a>
        <a href="?page=tms&action=add" class="button">Добавить</a>
    {/if}
{/if}

{* Добавление тм *}
{if $action == 'add'}
    {'Добавление торговой марки'|adminTitle}
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
{/if}

{* Редактирование тм *}
{if $action == 'edit'}
    {'Редактирование торговой марки'|adminTitle}
    <a href="javascript:history.go(-1)" class="button">Назад</a>
    <form action="?page=tms&action=edit&id={$id}" method="post" class="formly">
        <table>
            <tr>
                <td>
                    Заголовок:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название торговой марки" maxlength="128" size="80" require="true" label="название торговой марки" value="{$tms.name|stripslashes}" />
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