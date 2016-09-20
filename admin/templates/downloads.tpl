{'Менеджер файлов'|adminTitle}
<form enctype="multipart/form-data" action="?page=downloads"  method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
    Добавить файл: <input name="userfile" type="file" />
    <input type="submit" value="Отправить" /><br />
</form>
<p>{$do}...</p>

{if !empty($files)}
    <a href="javascript:history.go(-1)" class="button_new">Назад</a>
    <table class="datatable display">
        <thead>
        <tr>
            <th>№</th>
            <th><b>Название</b></th>
            <th><b>URL</b></th>
            <th><b>Действия</b></th>
        </tr>
        </thead>
        <tbody>
        {assign var="n" value=0}
        {foreach from=$files item="file" name="i"}
            {$n = $n + 1}
            {if $file == '.' || $file == '..'}{$n = $n - 1}{continue}{/if}
            <tr class="odd gradeA">
                <td style="width: 60px;">{$n}</td>
                <td>{$file}</td>
                <td><a href="../downloads/{$file}">{$url}/downloads/{$file}</a></td>
                <td style="width: 70px;">
                    <a href="?page=downloads&action=del&name={$file}" onclick="return confirmDelete();">
						<span class="icon_cont icon_cont_del" title="Удалить запись">
						</span>
                    </a>
                </td>
            </tr>
        {/foreach}
        </tbody>
    </table>
{else}
    {'На данный момент разделов нет'|error}
    <a href="javascript:history.go(-1)" class="button_new">Назад</a>
    <a href="?page=menu&action=add&id={$id}" class="button_new">Добавить раздел</a>
{/if}