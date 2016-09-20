{* Показать все новости *}
{if $action == 'show'}
    {'Новости'|adminTitle}
    {if !empty($news)}
    <a href="?page=news&action=add" class="button"><img src="img/icons/plus.png" alt=""/>Добавить новость</a>
    <table class="dt_three display">
		<thead>
			<tr>
				<th>ID</th>
				<th><b>Название</b></th>
				<th><b>Действия</b></th>
			</tr>
		</thead>
		<tbody>
            {foreach from=$news item=article}
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;">{$article.id}</td>
				<td>{$article.name}</td>
                <td style="width: 80px; text-align: center;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=news&action=edit&id={$article.id}">
                                	<span class="icon_cont icon_cont_edit" title="Редактировать запись">
                                	</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Удаление новости', 'Вы подтверждаете удаление новости?', '?page=news&action=del&id={$article.id}');">
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
        {'Новости ещё не добавлены'|error}
        <a href="?page=news&action=add" class="button"><img src="img/icons/plus.png" alt=""/>Добавить новость</a>
    {/if}
{/if}

{* Добавление новости *}
{if $action == 'add'}
    {'<a href="?page=news">Новости</a> / Добавление новости'|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <form action="?page=news&action=add" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="Введите название новости" maxlength="128" size="32" require="true" label="название новости" />
                </td>
            </tr>
            <tr>
                <td>
                    Адрес:
                </td>
                <td>
                    <input id="addr2" type="hidden" name="addr2" value="" />
                    /news/<input id="addr" type="text" name="addr" placeholder="Введите адрес страницы" maxlength="128" size="26" />
                    <input id="addr_table" type="hidden" name="table" value="news" />
                    <a href="javascript: void(0);" title="Этот адрес будет отображаться после адреса сайта. Например, http://up-studio.net/ваше_название." class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
                    <span id="addr_text"></span>
                </td>
            </tr>
            {if $smarty.const.__CONST_NEWS_COVER}
            <tr>
                <td>
                    Обложка:
                </td>
                <td>
                    <input type="file" name="img" />&nbsp;
                </td>
            </tr>
            {/if}
            <tr>
                <td>
                    Дата:
                </td>
                <td>
                    <input type="text" name="date" placeholder="Введите дату" maxlength="128" size="32" class="datepicker" value="{'Y-m-d'|date}" />
                </td>
            </tr>
            {if $smarty.const.__CONST_NEWS_TAGS}
            <tr>
                <td>
                    Теги:
                </td>
                <td style="padding-bottom: 10px;">
                    <input id="tags_field" type="text" placeholder="Введите теги через пробел" maxlength="128" size="32"/>
                    <input id="tags" type="hidden" name="tags"/>
                    <span id="tags_add" class="button3"><img src="img/icons/plus.png" alt=""/> Добавить</span><br />
                    <div id="tags_cur"></div>
                    <div class="clear"></div>
                    {if !empty($tags)}
                    <span id="tags_but">Доступные теги</span>
                    <div id="tags_all">
                        {foreach from=$tags item="tag"}<span>{$tag}</span> {/foreach}
                    </div>
                    <div class="clear"></div>
                    {/if}
                    <div id="tags_del"></div>
                </td>
            </tr>
            {/if}
            <tr>
                <td>
                    Краткое описание:
                </td>
                <td>
                    <textarea name="text_s" rows="15" cols="60" class="ckeditor"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Полное описание:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Введите метатег title"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Введите метатег description"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Введите метатег keywords"></textarea>
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

{* Редактирование новости *}
{if $action == 'edit'}
    {'<a href="?page=news">Новости</a> / Редактирование новости'|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <form action="?page=news&action=edit&id={$id}" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="Введите название новости" value="{$news.name|stripslashes}" maxlength="128" size="32" require="true" label="название новости" />
                </td>
            </tr>
            <tr>
                <td>
                    Адрес:
                </td>
                <td>
                    <input id="addr2" type="hidden" name="addr2" value="{$news.link}" />
                    /news/<input id="addr" type="text" name="addr" placeholder="Введите адрес страницы" maxlength="128" size="26" value="{$news.link}" />
                    <input id="addr_table" type="hidden" name="table" value="news" />
                    <a href="javascript: void(0);" title="Этот адрес будет отображаться после адреса сайта. Например, http://up-studio.net/ваше_название." class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
                    <span id="addr_text"></span>
                </td>
            </tr>
            {if $smarty.const.__CONST_NEWS_COVER}
            <tr>
                <td>
                    Обложка:
                </td>
                <td>
                    <input type="file" name="img" />&nbsp;
                </td>
            </tr>
            {/if}
            <tr>
                <td>
                    Дата:
                </td>
                <td>
                    <input type="text" name="date" placeholder="Введите дату" maxlength="128" size="32" class="datepicker" value="{$news.date|stripslashes}" />
                </td>
            </tr>
            {if $smarty.const.__CONST_NEWS_TAGS}
            <tr>
                <td>
                    Теги:
                </td>
                <td style="padding-bottom: 10px;">
                    <input id="tags_field" type="text" placeholder="Введите теги через пробел" maxlength="128" size="32"/>
                    <input id="tags" type="hidden" name="tags" value="{$news.tags|stripslashes}"/>
                    <span id="tags_add" class="button3"><img src="img/icons/plus.png" alt=""/></span><br />
                    <div id="tags_cur">
                    {if !empty($curTags)}
                        {foreach from=$curTags item="tag"}<span><img src="/admin/img/icons/dels.png" alt="" />{$tag}</span> {/foreach}
                    {/if}
                    </div>
                    <div class="clear"></div>
                    {if !empty($tags)}
                    <span id="tags_but">Доступные теги</span>
                    <div id="tags_all">
                        {foreach from=$tags item="tag"}<span>{$tag}</span> {/foreach}
                    </div>
                    <div class="clear"></div>
                    {/if}
                    <div id="tags_del"></div>
                </td>
            </tr>
            {/if}
            <tr>
                <td>
                    Краткое описание:
                </td>
                <td>
                    <textarea name="text_s" rows="15" cols="60" class="ckeditor">{$news.text_s|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Текст:
                </td>
                <td>
                    <textarea name="text" rows="20" class="ckeditor" cols="60">{$news.text|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Введите метатег title">{$news.title|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Введите метатег description">{$news.description|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Введите метатег keywords">{$news.keywords|stripslashes}</textarea>
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