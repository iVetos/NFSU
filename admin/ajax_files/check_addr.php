<?php

/**
 * Check page's address
 * 
 * @package UPcms\Ajax
 * @author UP Studio <info@up-studio.net>
 * @date 5/10/2015
 */

session_start();

// Security
define('__CONST_INCLUDES', true);

// Include configs
require_once ('../configs/const.inc.php');
require_once ('../includes/functions.inc.php');
require_once ('../classes/class.db.php');
Db::connect();

// Languange
if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = __DEF_LANG;
}
require_once('../' . __DIR_LANG . $_SESSION['lang'] . '.inc.php');

$addr = replaceSpaces(Db::prepareHtml($_POST['addr']));
$table = replaceSpaces(Db::prepareHtml($_POST['table']));

if (!empty($addr)) {
    $sql = "SELECT * FROM `$table` WHERE `link` = '$addr'";
    if (Db::numRows($sql) > 0) {
        echo '<span class="red">' . $lang['link_used'] . '</span>';
    } else {
        echo '<span class="green">' . $lang['link_free'] . '</span>';
    }
} else {
    echo '';
}
