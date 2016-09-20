<?php

/**
 * Page editor
 * 
 * @package UPcms\Pages
 * @author UP Studio <info@up-studio.net>
 * @date 18/09/2015
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

Up::checkPerm($page);

include_once (__DIR_CLASSES . 'class.page.php');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';
$id = (isset($_GET['id'])) ? Db::prepare($_GET['id']) : 0;

switch ($action) {
    case 'show':
        $smarty->assign('title', $lang['mod_pages']);
        $pages = Page::show($id);
        $id_cat = ($id != 0) ? Page::returnParentId($id) : 0;
        $smarty->assign('id_cat', $id_cat);
        $smarty->assign('pages', $pages);
        break;

    case 'add':
        $smarty->assign('title', $lang['pages_add'] . ' - ' . $lang['mod_pages']);
        if (isset($_POST['name'])) {
            // Prepare vars
            $name = Db::prepare($_POST['name']);
            $text = Db::prepare($_POST['text']);
            $link = Db::prepareHtml($_POST['link']);
            $link = replaceSpaces($link);
            $title = Db::prepare($_POST['title']);
            $description = Db::prepare($_POST['description']);
            $keywords = Db::prepare($_POST['keywords']);

            if (Page::add($id, $name, $text, $link, $title, $description, $keywords)) {
                $id_page = Db::returnId();
                // Write "ok" to log file and alert message
                Log::write(100, __file__, $lang['pages_add'] . ' - (id:' . $id_page . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = $lang['pages_alert_add'];
            } else {
                // Write "error" to log file and alert message
                Log::write(101, __file__, $lang['pages_add'] . ' - ' . $lang['error'] . ' [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = $lang['error'];
            }

            redirect('../admin/?page=pages&action=show&id=' . $id . '');
        }
        break;

    case 'edit':
        if (isset($_POST['name'])) {
            // Prepare vars
            $name = Db::prepare($_POST['name']);
            $text = Db::prepare($_POST['text']);
            $link = Db::prepare($_POST['link']);
            $link = replaceSpaces($link);
            $title = Db::prepare($_POST['title']);
            $description = Db::prepare($_POST['description']);
            $keywords = Db::prepare($_POST['keywords']);

            if (Page::edit($id, $name, $text, $link, $title, $description, $keywords)) {
                // Write "ok" to log file and alert message
                Log::write(100, __file__, $lang['pages_edit'] . ' - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = $lang['pages_alert_edit'];
            } else {
                // Write "error" to log file and alert message
                Log::write(101, __file__, $lang['pages_edit'] . ' - ' . $lang['error'] . ' [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = $lang['error'];
            }
            $id_cat = Page::returnParentId($id);
            redirect('../admin/?page=pages&action=show&id=' . $id_cat . '');
        } else {
            $pages = Page::returnPage($id);
            if (!empty($pages)) {
                $smarty->assign('page', $pages);
            } else {
                redirect('../admin/?page=pages');
            }
        }
        break;

    case 'del':
        $id_cat = Page::returnParentId($id);
        if (Page::del(($id))) {
            // Write "ok" to log file and alert message
            Log::write(100, __file__, $lang['pages_delete'] . ' - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = $lang['pages_alert_del'];
        } else {
            // Write "error" to log file and alert message
            Log::write(101, __file__, $lang['pages_delete'] . ' - ' . $lang['error'] . ' [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = $lang['error'];
        }
        redirect('../admin/?page=pages&action=show&id=' . $id_cat . '');
        break;
}

$smarty->assign('id', $id);
$smarty->assign('action', $action);
$smarty->display('header.tpl');
$smarty->display('pages.tpl');