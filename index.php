<?php

session_start();
error_reporting(E_ALL); // Отображение всех ошибок

require_once ('configs/const.inc.php');           // Константы
require_once (__DIR_INCLUDES . 'smarty.inc.php'); // Smarty
require_once (__DIR_INCLUDES . 'main.inc.php');   // Классы и функции

/** URL */
$url = Up::url();
$smarty->assign('url', $url);

/** menu */
$smarty->assign('menu', Up::menu());

/** Include page */
require_once (__DIR_INCLUDES . 'page.inc.php');