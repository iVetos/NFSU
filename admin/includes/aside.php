<?php
/**
 * Aside product
 * @author UP Studio
 * @date 12.09.2013
 * @lastmodify 20.09.2013
 */

if(!defined('__CONST_INCLUDES')) exit('Access denied');

Up::checkPerm($page);

$sql = "SELECT * FROM `aside` ORDER BY `date` DESC";
$asides = $db->doArray($sql);

$smarty->assign('asides', $asides);
$smarty->display('aside.tpl');
?>