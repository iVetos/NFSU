<?php
/**
 * Help
 * @package UPcms\Pages
 * @author UP Studio <info@up-studio.net>
 * @date 20.03.2014
 */

if(!defined('__CONST_INCLUDES')) exit('Access denied');
if(isset($_GET['cat']) && file_exists($smarty->template_dir[0] . 'help/' . $_GET['cat'] . '.tpl'))
{
    $smarty->display('help/' . $_GET['cat'] . '.tpl');
}
else
{
    $smarty->display('help.tpl');
}
?>