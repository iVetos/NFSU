<?php

/**
 * CMS UPcms
 * 
 * @author UP Studio <info@up-studio.net>
 * @date 2016-05-02
 */

session_start();
error_reporting(E_ALL); // Show all errors
/**
 * Smarty
 */
define('SMARTY_DIR', 'libs/');
require_once (SMARTY_DIR . 'Smarty.class.php');
$smarty = new Smarty();

// Smarty's dirs
$smarty->template_dir = 'templates/';
$smarty->compile_dir = 'templates_c/';
$smarty->config_dir = 'configs/';
$smarty->cache_dir = 'cache/';

// Security
define('__CONST_INCLUDES', true);

/**
 * Settings
 */
// Include constants and set default metatags
require_once ('configs/const.inc.php');
$smarty->assign('title', __SITE_TITLE);
$smarty->assign('description', __SITE_DESCRIPTION);
$smarty->assign('keywords', __SITE_KEYWORDS);

// Include functions and classes
require_once (__DIR_INCLUDES . 'functions.inc.php');
require_once (__DIR_CLASSES . 'class.db.php');
include_once (__DIR_CLASSES . 'class.log.php');
include_once (__DIR_CLASSES . 'class.up.php');
Db::connect();

// Languange
if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = __DEF_LANG;
}
$smarty->assign('lang', $_SESSION['lang']);
require_once(__DIR_LANG . $_SESSION['lang'] . '.inc.php');
$smarty->assign('lang_text', $lang);

// Build left menu (only if authorized)
if (isset($_SESSION['adm_user_name']))
    require_once ('configs/menu.php');

/**
 * Other
 */
// Does user enter?
if (!isset($_SESSION['adm_user_name'])) {
    require_once (__DIR_INCLUDES . 'enter.php');
} else {
    $smarty->assign('adm_user_name', $_SESSION['adm_user_name']);

    $page = (isset($_GET['page'])) ? $_GET['page'] : 'main';
    $smarty->assign('page', $page);

    // If exist $page.php including it file
    // Else if exist $page.tpl including it
    // Else include main.php
    if (file_exists(__DIR_INCLUDES . $page . '.php')) {
        require_once (__DIR_INCLUDES . $page . '.php');
    } elseif (file_exists($smarty->template_dir[0] . $page . '.tpl')) {
        $smarty->display('header.tpl');
        $smarty->display($page . '.tpl');
    } else {
        $smarty->display('header.tpl');
        require_once (__DIR_INCLUDES . 'main.php');
    }
    $smarty->display('footer.tpl');
}
$_SESSION['walert'] = '';
