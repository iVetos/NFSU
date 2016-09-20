<?php
$sql = "SELECT * FROM `pages` WHERE `link` = ''";
$content = Db::doOne($sql);
$smarty->assign('title', $content['title']);
$smarty->assign('description', $content['description']);
$smarty->assign('keywords', $content['keywords']);

$smarty->assign('content', $content);

$sql = "SELECT * FROM `team` ORDER BY `id`";
$smarty->assign('trainers', Db::doArray($sql));

$sql = "SELECT * FROM `sliders` ORDER BY `id`";
$smarty->assign('sliders', Db::doArray($sql));

$sql = "SELECT * FROM `news` ORDER BY `date` DESC LIMIT 3";
$smarty->assign('news', Db::doArray($sql));

$sql = "SELECT * FROM `sportsmans` ORDER BY RAND() LIMIT 1";
$smarty->assign('sportsman', Db::doOne($sql));

$smarty->display('header.tpl');
$smarty->display('main.tpl');