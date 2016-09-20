<?php
$id = Db::prepare($url['id']);

if($id){
    $sql = "SELECT * FROM `pages` WHERE `link` = 'news'";
    $content = Db::doOne($sql);

    $sql = "SELECT * FROM `news` WHERE `id` = " . $id;
    $article = Db::doOne($sql);

    $smarty->assign('title', $article['title']);
    $smarty->assign('description', $article['description']);
    $smarty->assign('keywords', $article['keywords']);


    $addr = '<a href="/">Главная</a> / <a href="/news">' . $content['name'] . '</a> / ' . $article['name'];
    $smarty->assign('addr', $addr);

    $smarty->assign('article', $article);
    $smarty->assign('oneArticle', true);
}
else {
    $sql = "SELECT * FROM `pages` WHERE `link` = 'news'";
    $content = Db::doOne($sql);
    $smarty->assign('title', $content['title']);
    $smarty->assign('description', $content['description']);
    $smarty->assign('keywords', $content['keywords']);

    $addr = '<a href="/">Главная</a> / ' . $content['name'];
    $smarty->assign('addr', $addr);

    $smarty->assign('content', $content);

    $sql = "SELECT * FROM `news` ORDER BY `id` DESC";
    $smarty->assign('news', Db::doArray($sql));

    $smarty->assign('oneArticle', false);
}

$smarty->display('header.tpl');
$smarty->display('news.tpl');