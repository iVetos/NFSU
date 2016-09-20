<?php
$id = Db::prepare($url['id']);

if($id){
    $sql = "SELECT * FROM `pages` WHERE `link` = 'branches'";
    $content = Db::doOne($sql);

    $sql = "SELECT * FROM `map` WHERE `id` = " . $id;
    $object = Db::doOne($sql);

    $smarty->assign('title', $object['title']);
    $smarty->assign('description', $object['description']);
    $smarty->assign('keywords', $object['keywords']);


    $addr = '<a href="/">Главная</a> / <a href="/branches">' . $content['name'] . '</a> / ' . $object['name'];
    $smarty->assign('addr', $addr);

    $smarty->assign('object', $object);
    $smarty->assign('oneObject', true);
}
else {
    $sql = "SELECT * FROM `pages` WHERE `link` = 'branches'";
    $content = Db::doOne($sql);
    $smarty->assign('title', $content['title']);
    $smarty->assign('description', $content['description']);
    $smarty->assign('keywords', $content['keywords']);

    $addr = '<a href="/">Главная</a> / ' . $content['name'];
    $smarty->assign('addr', $addr);

    $smarty->assign('content', $content);

    $sql = "SELECT * FROM `map`";
    $smarty->assign('objects', Db::doArray($sql));

    $smarty->assign('oneObject', false);
}

$smarty->display('header.tpl');
$smarty->display('branches.tpl');