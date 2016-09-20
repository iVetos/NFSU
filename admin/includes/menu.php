<?php

/**
 * Menu editor
 * 
 * @package UPcms\Menu
 * @author UP Studio <info@up-studio.net>
 * @date 5/10/2015
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');
    
Up::checkPerm('pages');

include_once (__DIR_CLASSES . 'class.menu.php');
$menu = new Menu();
$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';
$id = (isset($_GET['id'])) ? Db::prepare($_GET['id']) : 0;

switch ($action)
{
    // All items
    case 'show':
        $smarty->assign('title', $lang['mod_menu']);
        $menu = Menu::show($id);
        $id_cat = ($id != 0) ? Menu::returnParentId($id) : 0;
        $smarty->assign('id_cat', $id_cat);
        $smarty->assign('menu', $menu);
        break;

    // Add item
    case 'add':
        $smarty->assign('title', $lang['menu_add'] . ' - ' . $lang['mod_menu']);
        if (isset($_POST['name']))
        {
            // Prepare vars
            $name = Db::prepareHtml($_POST['name']);
            $link = Db::prepareHtml($_POST['link']);

            if (Menu::add($id, $name, $link))
            {
                // Write "ok" to log file and alert message
                Log::write(100, __file__, $lang['menu_add'] . ' [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = $lang['menu_alert_add'];
            }
            else
            {
                // Write "error" to log file and alert message
                Log::write(101, __file__, $lang['menu_add'] . ' - ' . $lang['error'] . ' [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = $lang['error'];
            }
            redirect('../admin/?page=menu&action=show&id=' . $id . '');
        }
        break;

    // Edit item
    case 'edit':
        $smarty->assign('title', $lang['menu_edit'] . ' - ' . $lang['mod_menu']);
        if (isset($_POST['name']))
        {
            $name = Db::prepareHtml($_POST['name']);
            $link = Db::prepareHtml($_POST['link']);

            if (Menu::edit($id, $name, $link))
            {
                // Write "ok" to log file and alert message
                Log::write(100, __file__, $lang['menu_edit'] . ' - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = $lang['menu_alert_edit'];
            }
            else
            {
                // Write "error" to log file and alert message
                Log::write(101, __file__, $lang['menu_edit'] . ' - ' . $lang['error'] . ' [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = $lang['error'];
            }
            $id_cat = Menu::returnParentId($id);
            redirect('../admin/?page=menu&action=show&id=' . $id_cat . '');
        }
        else
        {
            $menu = Menu::returnOne($id);
            if (!empty($menu))
            {
                $smarty->assign('menu', $menu);
            }
            else
            {
                redirect('../admin/?page=menu');
            }
        }
        break;

    // Delete item
    case 'del':
        $id_cat = Menu::returnParentId($id);
        if (Menu::del($id))
        {
            // Write "ok" to log file and alert message
            Log::write(100, __file__, $lang['menu_delete'] . ' - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = $lang['menu_alert_del'];
        }
        else
        {
            // Write "error" to log file and alert message
            Log::write(101, __file__, $lang['menu_delete'] . ' - ' . $lang['error'] . ' [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = $lang['error'];
        }
        redirect('../admin/?page=menu&action=show&id=' . $id_cat . '');
        break;

    // Sorting order
    case 'sort':
        if (isset($_GET['data']))
        {
            $data = explode(',', str_replace('id-', '', Db::prepare($_GET['data'])));
            for ($i = 0; $i < count($data); $i++)
            {
                $sql = "UPDATE `menu` SET `sort` = " . ($i + 1) . " WHERE `id` = " . $data[$i];
                if (Db::exec($sql))
                {
                    // Write "ok" to log file and alert message
                    Log::write(100, __file__, $lang['menu_order'] . ' [' . $_SESSION['adm_user_name'] . ']');
                }
                else
                {
                    // Write "error" to log file and alert message
                    Log::write(101, __file__, $lang['menu_delete'] . ' - ' . $lang['error'] . ' [' . $_SESSION['adm_user_name'] . ']');
                }
            }
        }
        else
        {
            $menu = Menu::show($id);
            if (empty($menu))
            {
                redirect('../admin/?page=menu&action=show&id=' . $id . '');
            }
            $smarty->assign('menu', $menu);
        }
        break;
}

$smarty->assign('id', $id);
$smarty->assign('action', $action);
$smarty->display('header.tpl');
$smarty->display('menu.tpl');