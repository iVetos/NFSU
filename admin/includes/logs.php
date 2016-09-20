<?php
/**
 * Логи
 * 
 * @package UPcms\Pages
 * @author UP Studio <info@up-studio.net>
 * @date 24.03.2014
 */
 
if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

$date = (isset($_GET['date'])) ? $_GET['date'] : date('Y-m-d');
$logs = Log::show($date);
$smarty->assign('date', $date);
$smarty->assign('logs', $logs);
$smarty->display('header.tpl');
$smarty->display('logs.tpl');