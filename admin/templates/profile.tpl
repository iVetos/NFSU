{'Мой профиль'|adminTitle}
{if !empty($error)}
{$error.pass|error}
{/if}
{if !empty($user)}
<form action="?page=profile" method="post" class="formly">
<table>
    <tr>
        <td class="padding10">
            Имя профиля:
        </td>
        <td class="padding10">
            {$user.name}
        </td>
    </tr>
    <tr>
        <td class="padding10">
            Уровень доступа:
        </td>
        <td class="padding10">
            {$user.level}
        </td>
    </tr>
    <tr>
        <td class="padding10">
            Последний вход:
        </td>
        <td class="padding10">
            {$user.last_date|date_format:'%d.%m.%Y&nbsp;&nbsp;&nbsp;%H:%M'}
        </td>
    </tr>
    <tr>
        <td class="padding10">
            Текущий пароль:
        </td>
        <td>
            <input type="password" name="old_pass" require="require" label="текущий пароль" size="32" maxlength="64" />
        </td>
    </tr>
    <tr>
        <td class="padding10">
            Новый пароль:
        </td>
        <td>
            <input type="password" name="pass" require="require" label="новый пароль" size="32" maxlength="64" />
        </td>
    </tr>
    <tr>
        <td class="padding10">
            Подтверждение пароля:
        </td>
        <td>
            <input type="password" name="pass2" match="pass" label="Повтор нового пароля" size="32" maxlength="64" />
        </td>
    </tr>
    <tr>
        <td>
            
        </td>
        <td>
            <input type="submit" value="Сохранить" />
        </td>
    </tr>
</table>
</form>
{else}
{'Произошла ошибка. Обратитесь к разработчику cms@up-studio.net'|error}
{/if}