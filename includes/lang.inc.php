<?php

/**
 * Мультиязычность
 * 
 * В файле создаются массивы с нужными фразами для каждого языка
 * 
 * @package UPcms\Lang
 * @author UP Studio <info@up-studio.net>
 * @date 19.02.2014
 */

$lang = array();
switch ($_SESSION['lang'])
{
    case 'ru':
        $lang['menu'] = 'Меню';
        $lang['main'] = 'Главная';
        $lang['developer'] = 'Дизайн и разработка';
        $lang['but_more'] = 'Подробнее';
        $lang['nothing'] = 'Извините, но пока ничего нет';
        break;

    case 'en':
        $lang['menu'] = 'Menu';
        $lang['main'] = 'Main';
        $lang['developer'] = 'Design and developing';
        $lang['but_more'] = 'More';
        $lang['nothing'] = 'Sorry, but there is nothing';
        break;
}
$smarty->assign('lang_text', $lang);