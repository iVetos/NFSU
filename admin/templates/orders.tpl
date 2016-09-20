{if $action eq 'see'}
{'<a href="?page=orders">Заказы</a> / Просмотр заказа'|adminTitle}
<a href="?page=orders" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
{if !empty($order)}
{if $order.id_status eq 1}
<a href="?page=orders&action=del&id={$order.id}" class="button"><img src="img/icons/ok.png" alt=""/>Перенести в обработанные</a><br />
{else}
<a href="?page=orders&action=not&id={$order.id}" class="button"><img src="img/icons/help.png" alt=""/>Перенести в ожидающие</a><br />
{/if}
<strong>Имя:</strong> {$order.user_name} <br />
<strong>Телефон:</strong> {$order.phone} <br />
<strong>Город:</strong> {$order.city} <br />
<strong>Email:</strong> {$order.email} <br />
<strong>Дата заказа:</strong> {$order.date|date_format:'%d.%m.%Y&nbsp;&nbsp;&nbsp;%H:%M'} <br />
<strong>Доставка:</strong> {if strlen($order.text) > 0}<br />{$order.text}{else}Адрес не указан{/if} <br />
<strong>Сумма:</strong> {$order.sum} грн. <br />
<strong>Промокод:</strong> {if strlen($order.promo) > 0}{$order.promo}{else}Не указан{/if}<br /><br />
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
        {foreach from=$order.products item=product name = "products"}
		<tr class="odd gradeA">
			<td style="width: 30px;">{$smarty.foreach.products.iteration}</td>
			<td>{$product.name} (<a href="../product/{$product.id}" target="_blank">посмотреть на сайте</a>)</td>
            <td style="width: 80px; text-align: center;">{$product.count}</td>
            <td style="width: 80px; text-align: center; padding: 25px;">{$product.price} грн.</td>  
		</tr>
        {/foreach}
	</tbody>
</table>
{/if}
{else}
{'Заказы'|adminTitle}
{if !empty($orders)}
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
        {foreach from=$orders item=order}
		<tr class="odd gradeA">
			<td style="width: 30px;">{$order.id}</td>
			<td>{$order.user_name}</td>
            <td>{$order.phone}</td>
            <td style="width: 120px; text-align: center;">{$order.date|date_format:'%d.%m.%Y&nbsp;&nbsp;&nbsp;%H:%M'}</td>
            <td style="width: 200px; text-align: center;">{if $order.id_status eq 1}Ожидает подтверждения{else}Обработан{/if}</td>
            <td style="width: 120px; text-align: center;">{$order.sum} грн.</td>
			<td style="width: 120px;">
                <table class="events">
                    <tr>
                        <td>
                            <a href="?page=orders&action=see&id={$order.id}">
                            	<span class="icon_cont icon_cont_see" title="Подробнее">
                            	</span>
                            </a>
                        </td>
                        {if $order.id_status eq 1}
                        <td>
                            <a href="javascript:void(0);" onclick="confirmDelete('Заказ выполнен', 'Вы подтверждаете выполнение заказа?', '?page=orders&action=del&id={$order.id}');">
        						<span class="icon_cont icon_cont_new" title="Заказ выполнен">
        						</span>
        					</a>
                        </td>
                        {else}
                        <td>
                            <a href="javascript:void(0);" onclick="confirmDelete('Заказ ещё не выполнен', 'Вы подтверждаете перенос заказа в необработанные?', '?page=orders&action=not&id={$order.id}');">
        						<span class="icon_cont icon_cont_old" title="Заказ не выполнен">
        						</span>
        					</a>
                        </td>
                        {/if}
                        <td>
                            <a href="javascript:void(0);" onclick="confirmDelete('Удаление заказа', 'Вы подтверждаете удаление заказа?', '?page=orders&action=delete&id={$order.id}');">
        						<span class="icon_cont icon_cont_del" title="Удалить заказ">
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
{'Заказов пока нет'|error}
{/if}
{/if}