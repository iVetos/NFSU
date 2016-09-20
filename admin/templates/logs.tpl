{"Логи за {$date}"|adminTitle}
{if !empty($logs)}
<ul class="help_contents">
    {foreach from=$logs item="log"}
    <li>{$log}</li>
    {/foreach}
</ul>
{else}
{'Логи по заданной дате пусты'|error}
{/if}