{* All items *}
{if $action == 'show'}
    {$lang_text.mod_menu|adminTitle}
    {if !empty($menu)}
    {if isset($id) && $id neq 0}
        <a href="?page=menu&id={$id_cat}" class="button"><img src="img/icons/back.png" alt=""/> {$lang_text.back}</a>
    {/if}
    <a href="?page=menu&action=add&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>{$lang_text.menu_add_but}</a>
    <a href="?page=menu&action=sort&id={$id}" class="button"><img src="img/icons/sort.png" alt=""/>{$lang_text.menu_order}</a>
    <table class="dt-menu display">
		<thead>
			<tr>
				<th>ID</th>
				<th><b>{$lang_text.name}</b></th>
                <th><b>{$lang_text.link}</b></th>
                <th><b>{$lang_text.order}</b></th>
				<th><b>{$lang_text.actions}</b></th>
			</tr>
		</thead>
		<tbody>
            {foreach from=$menu item=page}
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;">{$page.id}</td>
				<td>{$page.name}</td>
                <td>{$page.link}</td>
                <td style="width: 90px; text-align: center;">{$page.sort}</td>
				<td style="width: 120px;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=menu&action=show&id={$page.id}">
            						<span class="icon_cont icon_cont_more" title="{$lang_text.sub}">
            						</span>
            					</a>
                            </td>
                            <td>
                                <a href="?page=menu&action=edit&id={$page.id}">
                                	<span class="icon_cont icon_cont_edit" title="{$lang_text.edit}">
                                	</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('{$lang_text.menu_delete}', '{$lang_text.menu_delete_message}', '?page=menu&action=del&id={$page.id}');">
            						<span class="icon_cont icon_cont_del" title="{$lang_text.delete}">
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
        {$lang_text.menu_empty|error}
        {if isset($id) && $id neq 0}
        <a href="?page=menu&id={$id_cat}" class="button"><img src="img/icons/back.png" alt=""/> {$lang_text.back}</a>
        {/if}
        <a href="?page=menu&action=add&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>{$lang_text.menu_add}</a>
    {/if}
{/if}

{* Add *}
{if $action == 'add'}
    {'<a href="?page=menu">'|cat:$lang_text.mod_menu|cat:'</a> / '|cat:$lang_text.menu_add|cat:''|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> {$lang_text.back}</a>
    <form action="?page=menu&action=add&id={$id}" method="post" class="formly">
        <table>
            <tr>
                <td>
                    {$lang_text.name}:
                </td>
                <td>
                    <input type="text" name="name" placeholder="{$lang_text.enter} {$lang_text.menu_name}" maxlength="128" size="32" require="true" label="{$lang_text.menu_name}" />
                </td>
            </tr>
            <tr>
                <td>
                    {$lang_text.link}:
                </td>
                <td>
                    <input type="text" name="link" placeholder="{$lang_text.enter} {$lang_text.menu_link}" maxlength="256" size="32" require="true" label="{$lang_text.menu_link}" />
                    <a href="javascript: void(0);" title="{$lang_text.link_help}" class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <input type="submit" value="{$lang_text.add}" class="button" />
                </td>
            </tr>
        </table>	
	</form>
{/if}

{* Edit *}
{if $action == 'edit'}
    {'<a href="?page=menu">'|cat:$lang_text.mod_menu|cat:'</a> / '|cat:$lang_text.menu_edit|cat:''|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> {$lang_text.back}</a>
    <form action="?page=menu&action=edit&id={$id}" method="post" class="formly">
        <table>
            <tr>
                <td>
                    {$lang_text.name}:
                </td>
                <td>
                    <input type="text" name="name" placeholder="{$lang_text.enter} {$lang_text.menu_name}" maxlength="128" size="32" require="true" label="{$lang_text.menu_name}" value="{$menu.name|stripslashes}" />
                </td>
            </tr>
            <tr>
                <td>
                    {$lang_text.link}:
                </td>
                <td>
                    <input type="text" name="link" placeholder="{$lang_text.enter} {$lang_text.menu_link}" maxlength="256" size="32" require="true" label="{$lang_text.menu_link}" value="{$menu.link|stripslashes}" />
                    <a href="javascript: void(0);" title="{$lang_text.link_help}" class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <input type="submit" value="{$lang_text.edit}" class="button" />
                </td>
            </tr>
        </table>	
	</form>
{/if}

{* Sorting order *}
{if $action == 'sort'}
{'<a href="?page=menu">'|cat:$lang_text.mod_menu|cat:'</a> / '|cat:$lang_text.menu_order|cat:''|adminTitle}
<span id="page_id" class="none">{$id}</span>
<a href="?page=menu&id={$id}" class="button"><img src="img/icons/back.png" alt=""/> {$lang_text.back}</a>
<ul id="sortable">
    {foreach from=$menu item="item" name="menu"}
    <li id="id-{$item.id}"><span>{$smarty.foreach.menu.iteration}</span> {$item.name}</li>
    {/foreach}
</ul>
{/if}