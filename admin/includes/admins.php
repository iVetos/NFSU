<?php
/**
 * Редактирование пользователей и их прав
 * 
 * @package UPcms\Admins
 * @author UP Studio <info@up-studio.net>
 * @date 08.12.2014
 */
 
if (!defined('__CONST_INCLUDES'))
    exit('Access denied');
    
Up::checkPerm($page);

include_once (__DIR_CLASSES . 'class.admins.php');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';
$id = (isset($_GET['id'])) ? Db::prepare($_GET['id']) : 0;

switch ($action)
{
    // Отобразить всех пользователей
    case 'show':
        $smarty->assign('admins', Admin::show());
        break;
        
    // Добавление пользователя
    case 'add':
        if (isset($_POST['name']))
        {
            $name = Db::prepareHtml($_POST['name']);
            $level = Db::prepare($_POST['level']);
            $login = Db::prepare($_POST['login']);
            $pass = Db::prepare($_POST['pass']);
            
            // Добавляем пользователя в БД
            if (Admin::add($name, $level, $login, $pass, $_SESSION['adm_user_id']))
            {
                $id = Db::returnId();
                
                Log::write(100, __file__, 'Добавление пользователя - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Пользователь успешно добавлен.';
            }
            else
            {
                Log::write(101, __file__, 'Ошибка при добавлении пользователя [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Произошла ошибка при добавлении пользователя.';
            }
            redirect('../admin/?page=admins');
        }
        else
        {
            $smarty->assign('types', Admin::showTypes());
        }
        break;
            
    // Редактирование пользователя
    case 'edit':
        if (isset($_POST['name']))
        {
            $name = Db::prepareHtml($_POST['name']);
            $level = Db::prepare($_POST['level']);
            $login = Db::prepare($_POST['login']);
            $pass = Db::prepare($_POST['pass']);
            
            // Добавляем пользователя в БД
            if (Admin::edit($id, $name, $level, $login, $pass))
            {
                $id = Db::returnId();
                
                Log::write(100, __file__, 'Редактирование пользователя - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Информация успешно изменена.';
            }
            else
            {
                Log::write(101, __file__, 'Ошибка при редактировании пользователя - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Произошла ошибка при редактировании пользователя.';
            }
            redirect('../admin/?page=admins');
        }
        else
        {
            $smarty->assign('admin', Admin::returnOne($id));
            $smarty->assign('types', Admin::showTypes());
        }
        break;
         
    // Удаление пользователя   
    case 'del':
        if (Admin::del($id))
        {
            Log::write(100, __file__, 'Удаление пользователя - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Пользователь удалён.';
        }
        else
        {
            Log::write(101, __file__, 'Ошибка при удалении пользователя - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Произошла ошибка при удалении пользователя.';
        }
        redirect('../admin/?page=admins');
        break;
    
/** Типы пользователей */        
    // Отобразить всe типы пользователей
    case 'types':
        $smarty->assign('types', Admin::showTypes());
        break;
        
    // Добавление типа пользователей
    case 'add_type':
        if (isset($_POST['name']))
        {
            $name = Db::prepareHtml($_POST['name']);
            $pages = (isset($_POST['pages'])) ? 1 : 0;
            $articles = (isset($_POST['articles'])) ? 1 : 0;
            $news = (isset($_POST['news'])) ? 1 : 0;
            $catalog = (isset($_POST['catalog'])) ? 1 : 0;
            $orders = (isset($_POST['orders'])) ? 1 : 0;
            $users = (isset($_POST['users'])) ? 1 : 0;
            $admins = (isset($_POST['admins'])) ? 1 : 0;
            $slider = (isset($_POST['slider'])) ? 1 : 0;
            $gallery = (isset($_POST['gallery'])) ? 1 : 0;
            $options = (isset($_POST['options'])) ? 1 : 0;
            
            // Добавляем тип пользователей в БД
            if (Admin::addType($name, $pages, $articles, $news, $catalog, $orders, $users, $admins, $slider, $gallery, $options))
            {
                $id = Db::returnId();
                
                Log::write(100, __file__, 'Добавление типа пользователей - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Тип пользователей успешно добавлен.';
            }
            else
            {
                Log::write(101, __file__, 'Ошибка при добавлении типа пользователей [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Произошла ошибка при добавлении типа пользователей.';
            }
            redirect('../admin/?page=admins&action=types');
        }
        else
        {
            $smarty->assign('modules', Admin::returnModules());
        }
        break;
        
    // Редактирование типа пользователей
    case 'edit_type':
        if (isset($_POST['name']))
        {
            $name = Db::prepareHtml($_POST['name']);
            $pages = (isset($_POST['pages'])) ? 1 : 0;
            $articles = (isset($_POST['articles'])) ? 1 : 0;
            $news = (isset($_POST['news'])) ? 1 : 0;
            $catalog = (isset($_POST['catalog'])) ? 1 : 0;
            $orders = (isset($_POST['orders'])) ? 1 : 0;
            $users = (isset($_POST['users'])) ? 1 : 0;
            $admins = (isset($_POST['admins'])) ? 1 : 0;
            $slider = (isset($_POST['slider'])) ? 1 : 0;
            $gallery = (isset($_POST['gallery'])) ? 1 : 0;
            $options = (isset($_POST['options'])) ? 1 : 0;
            
            // Добавляем тип пользователей в БД
            if (Admin::editType($id, $name, $pages, $articles, $news, $catalog, $orders, $users, $admins, $slider, $gallery, $options))
            {
                $id = Db::returnId();
                
                Log::write(100, __file__, 'Редактирование типа пользователей - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Тип пользователей успешно изменён.';
            }
            else
            {
                Log::write(101, __file__, 'Ошибка при изменении типа пользователей [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Произошла ошибка при изменении типа пользователей.';
            }
            redirect('../admin/?page=admins&action=types');
        }
        else
        {
            $smarty->assign('type', Admin::returnType($id));
            $smarty->assign('modules', Admin::returnModules());
        }
        break;
        
    // Удаление типа пользователей   
    case 'del_type':
        if (Admin::delType($id))
        {
            // Удаляем всех пользователей данного типа
            $admins = Admin::returnAdmins($id);
            foreach($admins as $admin){
                if (Admin::del($admin['id']))
                {
                    Log::write(100, __file__, 'Удаление пользователя - (id:' . $admin['id'] . ') [' . $_SESSION['adm_user_name'] . ']');
                }
                else
                {
                    Log::write(101, __file__, 'Ошибка при удалении пользователя - (id:' . $admin['id'] . ') [' . $_SESSION['adm_user_name'] . ']');
                }
            }
            
            Log::write(100, __file__, 'Удаление типа пользователей - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Тип пользователей удалён.';
        }
        else
        {
            Log::write(101, __file__, 'Ошибка при удалении типа пользователей - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Произошла ошибка при удалении типа пользователей.';
        }
        redirect('../admin/?page=admins&action=types');
    break;
    
}

$smarty->assign('id', $id);
$smarty->assign('action', $action);
$smarty->display('header.tpl');
$smarty->display('admins.tpl');
?>