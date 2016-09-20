{'Отложенный товар'|adminTitle}
{if !empty($asides)}
<a href="javascript:history.go(-1)" class="button">Назад</a>
<table class="datatable display">
	<thead>
		<tr>
			<th>ID</th>
			<th><b>Пользователь</b></th>
            <th><b>Товар</b></th>
            <th><b>Телефон</b></th>
            <th><b>Город</b></th>
            <th><b>Email</b></th>
            <th><b>Дата</b></th>
		</tr>
	</thead>
	<tbody>
        {foreach from=$asides item=aside}
		<tr class="odd gradeA">
			<td style="width: 60px; padding: 20px;">{$aside.id}</td>
			<td>{if $aside.id_user neq 0}<a href="?page=users&action=see&id={$aside.id_user}">{$aside.name}</a>{else}{$aside.name}{/if}</td>
            <td><a href="../product/{$aside.id_product}" target="_blank">Ссылка</a></td>
            <td>{$aside.phone}</td>
            <td>{$aside.city}</td>
            <td>{$aside.email}</td>
            <td>{$aside.date_to}</td>
		</tr>
        {/foreach}
	</tbody>
</table>
{else}
    {'На данный момент отложенных товаров нет'|error}
    <a href="javascript:history.go(-1)" class="button">Назад</a>
{/if}