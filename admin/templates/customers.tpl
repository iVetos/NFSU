{if $action eq 'show'}
    {'Покупатели'|adminTitle}
    {if !empty($customers)}
    <a href="?page=help&cat=customers" class="button"><img src="img/icons/help.png" alt=""/>Справка по разделу</a>
    <table class="dt_users display">
    	<thead>
    		<tr>
    			<th>ID</th>
    			<th>{$lang_text.name}</th>
                <th><b>Телефон</b></th>
                <th><b>Город</b></th>
                <th><b>Email</b></th>
                <th><b>Заходил</b></th>
                <th>{$lang_text.actions}</th>
    		</tr>
    	</thead>
    	<tbody>
            {foreach from=$customers item=customer}
    		<tr class="odd gradeA">
    			<td style="width: 40px; text-align: center;">{$customer.id}</td>
    			<td>{$customer.name}</td>
                <td>{$customer.phone}</td>
                <td>{$customer.city}</td>
                <td>{$customer.email}</td>
                <td>{$customer.last_date|date_format:'%d.%m.%Y&nbsp;&nbsp;&nbsp;%H:%M'}</td>
                <td style="width: 80px; text-align: center;">
                    <table class="events">
                    <tr>
                        <td>
                            <a href="?page=customers&action=see&id={$customer.id}">
            					<span class="icon_cont icon_cont_see" title="Подробнее">
            					</span>
            				</a>
                        </td>
                        <td>
                            <a href="javascript:void(0);" onclick="confirmDelete('Удаление клиента', 'Вы подтверждаете удаление клиента?', '?page=customers&action=del&id={$customer.id}');">
        						<span class="icon_cont icon_cont_del" title="Удалить">
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
        {'Зарегистрированных пользователей нет'|error}
    {/if}
{/if}

{if $action eq 'see'}
    {'<a href="?page=customers">Покупатели</a> / Просмотр профиля'|adminTitle}
    <a href="?page=customers" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <table>
        <tr>
            <td>
                <strong>Имя:</strong>
            </td>
            <td class="padding10">
                {$customer.name}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Телефон:</strong>
            </td>
            <td class="padding10">
                {$customer.phone}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Email:</strong>
            </td>
            <td class="padding10">
                {$customer.email}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Город:</strong>
            </td>
            <td class="padding10">
                {$customer.city}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Дата регистрации:</strong>&nbsp;
            </td>
            <td class="padding10">
                {$customer.date|date_format:'%d.%m.%Y&nbsp;&nbsp;&nbsp;%H:%M'}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Последний визит:</strong>
            </td>
            <td class="padding10">
                {$customer.last_date|date_format:'%d.%m.%Y&nbsp;&nbsp;&nbsp;%H:%M'}
            </td>
        </tr>
    </table>
{/if}