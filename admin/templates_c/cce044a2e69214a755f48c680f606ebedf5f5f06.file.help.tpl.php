<?php /* Smarty version Smarty 3.1.4, created on 2014-10-14 17:42:39
         compiled from "templates\help.tpl" */ ?>
<?php /*%%SmartyHeaderCode:739532ad4256c0a74-72153197%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cce044a2e69214a755f48c680f606ebedf5f5f06' => 
    array (
      0 => 'templates\\help.tpl',
      1 => 1413297750,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '739532ad4256c0a74-72153197',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_532ad42573977',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532ad42573977')) {function content_532ad42573977($_smarty_tpl) {?><?php echo adminTitle('Справка');?>

Содержание:
<ul class="help_contents">
    <li>
        <a href="?page=help&cat=common">Общие сведения и настройки</a>
        <ul>
            <li>
                <a href="?page=help&cat=common#editor">Текстовый редактор</a>
                <ul>
                    <li><a href="?page=help&cat=common#editor-info">Общий вид</a></li>
                    <li><a href="?page=help&cat=common#editor-links">Вставка ссылок в текст</a></li>
                    <li><a href="?page=help&cat=common#editor-images">Вставка изображений в текст</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="?page=help&cat=pages">Редактор страниц</a>
        <ul>
            <li>
                <a href="#actions">Действия</a>
                <ul>
                    <li><a href="?page=help&cat=pages#actions-add">Добавление страниц</a></li>
                    <li><a href="?page=help&cat=pages#actions-add-sub">Добавление подстраниц</a></li>
                    <li><a href="?page=help&cat=pages#actions-edit">Редактирование страниц</a></li>
                    <li><a href="?page=help&cat=pages#actions-del">Удаление страниц</a></li>
                </ul>
            </li>
            <li>
                <a href="#fields">Поля</a>
                <ul>
                    <li><a href="?page=help&cat=pages#fields-name">Название</a></li>
                    <li><a href="?page=help&cat=pages#fields-text">Текст</a></li>
                    <li><a href="?page=help&cat=pages#fields-addr">Адрес</a></li>
                    <li><a href="?page=help&cat=pages#fields-title">Title</a></li>
                    <li><a href="?page=help&cat=pages#fields-description">Description</a></li>
                    <li><a href="?page=help&cat=pages#fields-keywords">Keywords</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="?page=help&cat=menu">Редактор меню</a>
        <ul>
            <li>
                <a href="?page=help&cat=menu#common">Общие сведения</a>
                <ul>
                    <li>
                        <a href="?page=help&cat=menu#common-fields">Поля</a>
                        <ul>
                            <li><a href="?page=help&cat=menu#common-fields-name">Название</a></li>
                            <li><a href="?page=help&cat=menu#common-fields-text">Ссылка</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#actions">Действия</a>
                <ul>
                    <li><a href="?page=help&cat=menu#actions-add">Добавление пунктов</a></li>
                    <li><a href="?page=help&cat=menu#actions-add-sub">Добавление подменю</a></li>
                    <li><a href="?page=help&cat=menu#actions-edit">Редактирование пунктов</a></li>
                    <li><a href="?page=help&cat=menu#actions-del">Удаление пунктов</a></li>
                    <li><a href="?page=help&cat=menu#actions-sort">Порядок сортировки</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li>Статьи</li>
    <li>Новости</li>
    <li>Каталог товаров</li>
    <li>Слайдер на главной</li>
    <li>Галерея</li>
    <li>Менеджер файлов</li>
    <li>Рассылка</li>
</ul><?php }} ?>