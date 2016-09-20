<?php

/**
 * Торговые марки
 * 
 * @package UPcms\Catalog
 * @author UP Studio <info@up-studio.net>
 * @date 29.08.2014
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');
    
Up::checkPerm($page);

include_once (__DIR_CLASSES . 'class.tm.php');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';
$id = (isset($_GET['id'])) ? Db::prepare($_GET['id']) : 0;

switch ($action)
{
    case 'show':
        $smarty->assign('tms', Tm::show($id));
        break;

    case 'add':
        if (isset($_POST['name']))
        {
            $name = Db::prepare($_POST['name']);

            Tm::add($name);
            redirect('../admin/?page=tms&action=show');
        }
        break;

    case 'edit':
        if (isset($_POST['name']))
        {
            $name = Db::prepare($_POST['name']);

            Tm::edit($id, $name);
            redirect('../admin/?page=tms&action=show');
        }
        else
        {
            $tms = Tm::returnOne($id);
            if (!empty($tms))
            {
                $smarty->assign('tms', $tms);
            }
            else
            {
                redirect('../admin/?page=tms');
            }
        }
        break;

    case 'del':
        Tm::del($id);
        redirect('../admin/?page=tms&action=show');
        break;

    default:
        $tms = Tm::show($id);
        $action = 'show';
        $smarty->assign('tms', $tms);
}
$smarty->assign('id', $id);
$smarty->assign('action', $action);
$smarty->display('tm.tpl');

?>