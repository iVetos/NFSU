<?php

/**
 * Наша команда
 * 
 * @package UPcms\Team
 * @author UP Studio <info@up-studio.net>
 * @date 2016-05-02
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');
    
Up::checkPerm($page);

include_once (__DIR_CLASSES . 'class.team.php');
include_once (__DIR_CLASSES . 'class.image.php');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';
$id = (isset($_GET['id'])) ? Db::prepare($_GET['id']) : 0;

// Vars
define('__CONST_SOME_NAME', 'Наша команда');
define('__CONST_SOME_TABLE', 'team');
define('__CONST_SOME_DIR', 'img/team/');
define('__CONST_SOME_IMG_WIDTH', 400);
define('__CONST_SOME_IMG_HEIGHT', 400);

$smarty->assign('page_name', __CONST_SOME_NAME);
$smarty->assign('page_addr', __CONST_SOME_TABLE);

switch ($action)
{
    // Отобразить все записи
    case 'show':
        $smarty->assign('some', Team::show(__CONST_SOME_TABLE));
        break;
    
    // Добавление
    case 'add':
        if (isset($_POST['name']))
        {
            $name = Db::prepare($_POST['name']);
            $post = Db::prepare($_POST['post']);
            $text_s = Db::prepare($_POST['text_s']);
            $text = Db::prepare($_POST['text']);
            $title = Db::prepare($_POST['title']);
            $description = Db::prepare($_POST['description']);
            $keywords = Db::prepare($_POST['keywords']);
            $img = '';

            if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['img']['name']))
            {
                $img = Image::imageAdd('img', __CONST_SOME_DIR);
                Image::imageResize($img['full'], 'admin/' . __CONST_SOME_DIR, __CONST_SOME_IMG_WIDTH, __CONST_SOME_IMG_HEIGHT, $img['name'], 1);
                $img = $img['name_full'];
            }
            
            // Добавляем запись в БД
            if (Team::add(__CONST_SOME_TABLE, $name, $post, $text_s, $text, $img, $title, $description, $keywords))
            {
                $id = Db::returnId();
                
                Log::write(100, __file__, __CONST_SOME_NAME . ' - Добавление - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Запись успешно добавлена.';
            }
            else
            {
                Log::write(101, __file__, __CONST_SOME_NAME . ' - Ошибка при добавлении [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Произошла ошибка при добавлении записи.';
            }
            redirect('../admin/?page=' . __CONST_SOME_TABLE . '&action=show&id=' . $id . '');
        }
        break;
    
    // Редактирование
    case 'edit':
        if (isset($_POST['name']))
        {
            $name = Db::prepare($_POST['name']);
            $post = Db::prepare($_POST['post']);
            $text_s = Db::prepare($_POST['text_s']);
            $text = Db::prepare($_POST['text']);
            $title = Db::prepare($_POST['title']);
            $description = Db::prepare($_POST['description']);
            $keywords = Db::prepare($_POST['keywords']);
            
            if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['img']['name']))
            {
                // Удаление старого изображения
                $cover = Team::returnCover($id, __CONST_SOME_TABLE);
                if(!empty($cover))
                {
                   Image::imageDel(__CONST_SOME_DIR . $cover);
                }

                $img = Image::imageAdd('img', __CONST_SOME_DIR);
                Image::imageResize($img['full'], 'admin/' . __CONST_SOME_DIR, __CONST_SOME_IMG_WIDTH, __CONST_SOME_IMG_HEIGHT, $img['name'], 1);
                $img = $img['name_full'];
            }
            else
            {
                $img = Team::returnCover($id, __CONST_SOME_TABLE);
            }
            
            // Изменяем запись в БД
            if (Team::edit($id, __CONST_SOME_TABLE, $name, $post, $text_s, $text, $img, $title, $description, $keywords))
            {
                Log::write(100, __file__, __CONST_SOME_NAME . ' - Редактирование - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Запись успешно отредактирована.';
            }
            else
            {
                Log::write(101, __file__, __CONST_SOME_NAME . ' - Ошибка при редактировании [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Произошла ошибка при редактировании записи.';
            }
            redirect('../admin/?page=' . __CONST_SOME_TABLE . '&action=show');
        }
        else
        {
            // Подготавливаем данные для редактирования
            $some = Team::returnOne($id, __CONST_SOME_TABLE);
            if (!empty($some))
            {
                $smarty->assign('some', $some);
            }
            else
            {
                redirect('../admin/?page=' . __CONST_SOME_TABLE);
            }
        }
        break;
    
    // Удаление записи
    case 'del':
        $cover = Team::returnCover($id, __CONST_SOME_TABLE);
        if (Team::del($id, __CONST_SOME_TABLE))
        {
            // Удаление изображения
            if(!empty($cover))
            {
               Image::imageDel(__CONST_SOME_DIR . $cover); 
            }
            Log::write(100, __file__, __CONST_SOME_NAME . ' - Удаление - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Запись успешно удалена.';
        }
        else
        {
            Log::write(101, __file__, __CONST_SOME_NAME . ' - Ошибка при удалении - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Произошла ошибка при удалении записи.';
        }
        redirect('../admin/?page=' . __CONST_SOME_TABLE . '&action=show');
        break;
}
$smarty->assign('id', $id);
$smarty->assign('action', $action);
$smarty->display('header.tpl');
$smarty->display('team.tpl');