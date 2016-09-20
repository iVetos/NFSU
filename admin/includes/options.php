<?php

/**
 * Options
 * 
 * @package UPcms\Options
 * @author UP Studio <info@up-studio.net>
 * @date 02/09/2015
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

Up::checkPerm($page);
$smarty->display('header.tpl');
$smarty->display('options.tpl');
?>