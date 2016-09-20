{* All pages *}
{if $action == 'show'}
    {$lang_text.mod_pages|adminTitle}
    {if !empty($pages)}
    {if isset($id) && $id neq 0}
        <a href="?page=pages&id={$id_cat}" class="button"><img src="img/icons/back.png" alt=""/> {$lang_text.back}</a>
    {/if}
    <a href="?page=pages&action=add&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>{$lang_text.pages_add_but}</a>
    <table class="dt-pages display">
		<thead>
			<tr>
				<th>ID</th>
				<th><b>{$lang_text.name}</b></th>
                <th><b>{$lang_text.link}</b></th>
				<th><b>{$lang_text.actions}</b></th>
			</tr>
		</thead>
		<tbody>
            {foreach from=$pages item=page}
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;">{$page.id}</td>
				<td>{$page.name}</td>
                <td>
                {if strlen($page.link) > 0}
                    ../{$page.link}
                {else}
                    ../page/{$page.id}
                {/if}
                </td>
				<td style="width: 120px; text-align: center;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=pages&action=show&id={$page.id}">
            						<span class="icon_cont icon_cont_more" title="{$lang_text.sub}">
            						</span>
            					</a>
                            </td>
                            <td>
                                <a href="?page=pages&action=edit&id={$page.id}">
                                	<span class="icon_cont icon_cont_edit" title="{$lang_text.edit}">
                                	</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('{$lang_text.pages_delete}', '{$lang_text.pages_delete_message}', '?page=pages&action=del&id={$page.id}');">
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
        {$lang_text.pages_empty|error}
        {if isset($id) && $id neq 0}
        <a href="?page=pages&id={$id_cat}" class="button"><img src="img/icons/back.png" alt=""/> {$lang_text.back}</a>
        {/if}
        <a href="?page=pages&action=add&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>{$lang_text.pages_add_but}</a>
    {/if}
{/if}

{* Add page *}
{if $action == 'add'}
    {'<a href="?page=pages">'|cat:$lang_text.mod_pages|cat:'</a> / '|cat:$lang_text.pages_add|cat:''|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> {$lang_text.back}</a>
    <form action="?page=pages&action=add&id={$id}" method="post" class="formly">
        <table>
            <tr>
                <td>
                    {$lang_text.name}:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="{$lang_text.enter} {$lang_text.pages_name}" maxlength="128" size="32" require="true" label="{$lang_text.pages_name}" />
                </td>
            </tr>
            <tr>
                <td>
                    {$lang_text.link}:
                </td>
                <td>
                    <input id="addr2" type="hidden" name="addr2" value="" />
                    /<input id="addr" type="text" name="link" placeholder="{$lang_text.enter} {$lang_text.pages_link}" maxlength="128" size="31" />
                    <input id="addr_table" type="hidden" name="table" value="pages" />
                    <a href="javascript: void(0);" title="{$lang_text.link_help}" class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
                    <span id="addr_text"></span>
                </td>
            </tr>
            <tr>
                <td>
                    {$lang_text.text}:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor" placeholder="{$lang_text.enter} {$lang_text.text}"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="{$lang_text.enter} title"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="{$lang_text.enter} description"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="{$lang_text.enter} keywords"></textarea>
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

{* Edit page *}
{if $action == 'edit'}
    {'<a href="?page=pages">'|cat:$lang_text.mod_pages|cat:'</a> / '|cat:$lang_text.pages_edit|cat:''|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> {$lang_text.back}</a>
    <form action="?page=pages&action=edit&id={$id}" method="post" class="formly">
        <table>
            <tr>
                <td>
                    {$lang_text.name}:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="{$lang_text.enter} {$lang_text.pages_name}" value="{$page.name|stripslashes}" maxlength="128" size="32" require="true" label="{$lang_text.pages_name}" />
                </td>
            </tr>
            <tr>
                <td>
                    {$lang_text.link}:
                </td>
                <td>
                    <input id="addr2" type="hidden" name="addr2" value="{$page.addr}" />
                    /<input id="addr" type="text" name="link" placeholder="{$lang_text.enter} {$lang_text.pages_link}" maxlength="128" size="31" value="{$page.link}" />
                    <input id="addr_table" type="hidden" name="table" value="pages" />
                    <a href="javascript: void(0);" title="{$lang_text.link_help}" class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
                    <span id="addr_text"></span>
                </td>
            </tr>
            <tr>
                <td>
                    {$lang_text.text}:
                </td>
                <td>
                    <textarea name="text" rows="20" class="ckeditor" cols="60">{$page.text|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="{$lang_text.enter} title">{$page.title|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="{$lang_text.enter} description">{$page.description|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="{$lang_text.enter} keywords">{$page.keywords|stripslashes}</textarea>
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