<?php
/**
 * Customers
 * 
 * @package UPcms\Shop
 * @author UP Studio <info@up-studio.net>
 * @date 24/02/2016
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

Up::checkPerm($page);

include_once (__DIR_CLASSES . 'class.customers.php');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';
$id = (isset($_GET['id'])) ? Db::prepare($_GET['id']) : 0;

switch ($action) {
    case 'show':
        $smarty->assign('customers', Customers::show());
        break;

    case 'see':
        $id = Db::prepare($_GET['id']);
        $smarty->assign('customer', Customers::showOne($id));
        break;

    case 'del':
        if(Customers::del($id))
        {
            Log::write(100, __file__, 'Удаление пользователя (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Пользователь удалён';
        }
        else
        {
            Log::write(101, __file__, 'Ошибка при удалении пользователя (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Error';
        }

        redirect('?page=customers');
}

$smarty->assign('action', $action);
$smarty->display('header.tpl');
$smarty->display('customers.tpl');
