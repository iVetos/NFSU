<?php
/**
 * Product catalog
 * @author UP Studio
 * @date 10.08.2013
 * @lastmodify 20.09.2013
 */

if(!defined('__CONST_INCLUDES')) exit('Access denied');

Up::checkPerm($page);

$smarty->display('statistics.tpl');
?>