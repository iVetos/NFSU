{if $action eq 'show'}
    {'Комментарии'|adminTitle}
    {if !empty($comments)}
        <table class="display">
            <thead>
            <tr>
                <th>#</th>
                <th><b>Комментарий</b></th>
                <th><b>Товар</b></th>
                <th><b>Пользователь</b></th>
                <th><b>Email</b></th>
                <th><b>Действия</b></th>
            </tr>
            </thead>
            <tbody>
            {foreach from=$comments item="comment" name="comments"}
                <tr class="odd gradeA">
                    <td style="width: 40px; text-align: center;">{$smarty.foreach.comments.iteration}</td>
                    <td>{$comment.text}</td>
                    <td style="width: 150px; text-align: center;"><a href="/product/{$comment.id_product}" target="_blank">{$comment.product_name}</a></td>
                    <td style="width: 80px; text-align: center;">{if $comment.id_user eq 0}{$comment.user_name}{else}<a href="?page=users&action=see&id={$comment.id_user}" target="_blank">{$comment.name}</a>{/if}</td>
                    <td style="width: 150px; text-align: center;">{$comment.email}</td>
                    <td style="width: 80px; text-align: center;">
                        <table class="events">
                            <tr>
                                <td class="visible">
                                    {if $comment.actual eq 1}
                                        <span class="none vid">{$comment.id}</span><span class="none vvalue">0</span><span class="none vtable">comments</span>
                                        <a href="javascript:void(0);">
                                            <span class="icon_cont icon_cont_visible" title="Скрыть"></span>
                                        </a>
                                    {else}
                                        <span class="none vid">{$comment.id}</span><span class="none vvalue">1</span><span class="none vtable">comments</span>
                                        <a href="javascript:void(0);">
                                            <span class="icon_cont icon_cont_invisible" title="Показать"></span>
                                        </a>
                                    {/if}
                                </td>
                                <td>
                                    <a href="javascript:void(0);" onclick="confirmDelete('Удаление комментария', 'Вы подтверждаете удаление комментария?', '?page=comments&action=del&id={$comment.id}');">
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
        {'Статьи ещё не добавлены'|error}
        <a href="?page=articles&action=add" class="button"><img src="img/icons/plus.png" alt=""/>Добавить статью</a>
        <a href="?page=articles&action=cats" class="button"><img src="img/icons/tm.png" alt=""/>Разделы</a>
    {/if}
{/if}