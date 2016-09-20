{'Администрирование'|adminTitle}
<a href="?page=administration&action=del" class="button"><img src="img/icons/del.png" alt=""/> Удалить неотмеченные</a>
<form action="?page=administration" method="post" class="formly" enctype="multipart/form-data">
<ul class="checkboxes">
{foreach from=$modules item="module"}
    <li><input id="m{$module.id}" class="checkboxesli" type="checkbox" name="{$module.id}" {if $module.value eq 1}checked="checked"{/if} /><label for="m{$module.id}">{$module.name}</label></li>
{/foreach}
</ul>
</form>