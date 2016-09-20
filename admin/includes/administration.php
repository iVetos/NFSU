<?php
Up::checkPerm($page);

$sql = "SELECT * FROM `vars` WHERE `type` = 1";
$modules = Db::doArray($sql);

foreach($modules as $module)
{
    // define($module['var'], $module['value']);
}

$smarty->assign('modules', $modules);
$smarty->display('administration.tpl');

?>