<?php

/**
 * Подключение и настройка Smarty
 * 
 * @package UPcms\Functions
 * @author UP Studio <info@up-studio.net>
 * @date 19.02.2014
 */

require_once (__DIR_LIBS . 'Smarty.class.php');
$smarty = new Smarty();

// Dirs
$smarty->template_dir = 'templates/';
$smarty->compile_dir = 'templates_c/';
$smarty->config_dir = 'configs/';
$smarty->cache_dir = 'cache/';

// Variables
$smarty->assign('title', __SITE_TITLE);
$smarty->assign('description', __SITE_DESCRIPTION);
$smarty->assign('keywords', __SITE_KEYWORDS);