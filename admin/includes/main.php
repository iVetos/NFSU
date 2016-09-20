<?php
/**
 * Main page
 * 
 * @author UP Studio <info@up-studio.net>
 * @date 2015-03-28
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');
    
$smarty->display('header.tpl');
$smarty->display('main.tpl');
