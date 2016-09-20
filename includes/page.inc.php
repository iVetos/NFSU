<?php

/**
 * Подключение нужного файла
 * 
 * Проверяем существует ли .php файл. Если да, то подключаем его, а в нём .tpl
 * Если нет, то проверяем есть ли такой файл с разрешением .tpl и подключаем его.
 * Если и его нет, то делаем запрос к БД и ищем страницу с заданным адресом.
 * Если запрос ничего не вернул, то подключаем страницу с ошибкой 404.tpl
 * 
 * @package UPcms\Page
 * @author UP Studio <info@up-studio.net>
 * @date 21.04.2014
 */

$page = ($url['page'] != null) ? Db::prepareHtml($url['page']) : 'main';
if (file_exists(__DIR_INCLUDES . $page . '.php'))
{
    include (__DIR_INCLUDES . $page . '.php');
}
elseif (file_exists($smarty->template_dir[0] . $page . '.tpl'))
{
    $smarty->display('header.tpl');
    $smarty->display($page . '.tpl');
}
else
{
    $sql = "SELECT * FROM `pages` WHERE `link` = '$page'";
    if (Db::numRows($sql) > 0)
    {
        $content = Db::doOne($sql);
        $smarty->assign('title', $content['title']);
        $smarty->assign('description', $content['description']);
        $smarty->assign('keywords', $content['keywords']);
        
        $addr = '<a href="/">Главная</a> / ' . $content['name'];
        $smarty->assign('addr', $addr);
        
        $smarty->assign('content', $content);
        $smarty->display('header.tpl');
        $smarty->display('content.tpl');
    }
    else
    {
        $smarty->display('header.tpl');
        $smarty->display('404.tpl');
    }
}
$smarty->display('footer.tpl');
