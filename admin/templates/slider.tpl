{if $action eq 'show'}
{'Слайдер на главной'|adminTitle}
    {if !empty($sliders)}
        <a href="?page=slider&action=add" class="button"><img src="img/icons/plus.png" alt=""/>Добавить слайд</a>
        <ul class="sliders">
        {foreach from=$sliders item="slider" name="i"}
            <li id="id-{$slider.id}" class="slide">
                <img src="../admin/img/sliders/small_{$slider.name}" alt="" />
                <a href="?page=slider&action=edit&id={$slider.id}" rel="group" class="butt2"><img src="img/icons/edit.png" alt=""/>Изменить</a>
                <a href="javascript:void(0);" onclick="confirmDelete('Удаление слайда', 'Вы подтверждаете удаление слайда?', '?page=slider&action=del&id={$slider.id}');" class="butt"><img src="img/icons/del.png" alt=""/>Удалить</a>
            </li>
        {/foreach}
        </ul>
        <div class="clear"></div>
        {*}
        <table class="gallery">
            {foreach from=$sliders item="slider" name="sliders"}
                {if $smarty.foreach.sliders.iteration == 1}<tr>{/if}
                {if ($smarty.foreach.sliders.iteration % 3) == 1}<tr>{/if}
                <td style=" background-image: url('../admin/img/sliders/{$slider.name}.jpg'); background-size: cover; background-position: center center; position: relative;">
                    <span>
                    <a href="?page=slider&action=del&id={$slider.id}">
                    <b>Удалить</b>
                    </a>
                    </span>
                    <span class="edit_img">
                    <a href="?page=slider&action=edit&id={$slider.id}">
                    <b>Изменить</b>
                    </a>
                    </span>
                    <span class="img_link">
                    <b>{$slider.link}</b>
                    </span>
                </td>
                {if ($smarty.foreach.sliders.iteration % 3) == 0}</tr>{/if}
            {/foreach}
        </table>
        {*}
    {else}
        {"На данный момент слайдов нет"|error}
        <a href="?page=slider&action=add" class="button">Добавить слайд</a>
    {/if}
{else if $action eq 'add'}
{'<a href="?page=slider">Слайдер на главной</a> / Добавление нового слайда'|adminTitle}
<a href="?page=slider" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
<form enctype="multipart/form-data" action="?page=slider&action=add"  method="post" class="formly">
    <table>
        <tr>
            <td>
                Ссылка:
            </td>
            <td>
                <input type="text" name="link" placeholder="Введите ссылку" maxlength="128" size="32" require="true" label="ссылку" />
                <a href="javascript: void(0);" title="Полный (http://up-studio.net/contacts/) или относительный (../contacts/) путь" class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
            </td>
        </tr>
        <tr>
            <td>
                Слайд:
            </td>
            <td>
                <input name="img" type="file" />&nbsp;
            </td>
        </tr>
        <tr>
            <td>
                
            </td>
            <td>
                <input type="submit" value="Добавить" />
            </td>
        </tr>
    </table>
    
</form>
{else if $action eq 'edit'}
{'<a href="?page=slider">Слайдер на главной</a> / Редактирование слайда'|adminTitle}
<a href="?page=slider" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
<form enctype="multipart/form-data" action="?page=slider&action=edit&id={$id}"  method="post" class="formly">
    <table>
        <tr>
            <td>
                Ссылка:
            </td>
            <td>
                <input type="text" name="link" placeholder="Введите ссылку" maxlength="128" size="60" require="true" label="ссылку" value="{$slider.link}" />
                <a href="javascript: void(0);" title="Полный (http://up-studio.net/contacts/) или относительный (../contacts/) путь" class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
            </td>
        </tr>
        <tr>
            <td>
                Слайд:
            </td>
            <td>
                <input name="img" type="file" />&nbsp;
            </td>
        </tr>
        <tr>
            <td>
                
            </td>
            <td>
                <input type="submit" value="Изменить" />
            </td>
        </tr>
    </table>
    
</form>
{/if}