<?php

/**
 * Заказы
 * 
 * @package UPcms\Catalog\Orders
 * @author UP Studio <info@up-studio.net>
 * @date 24/07/2015
 */

if (!defined('__CONST_INCLUDES')) exit('Access denied');

Up::checkPerm($page);

include_once (__DIR_CLASSES . 'class.order.php');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';
$id = (isset($_GET['id'])) ? Db::prepare($_GET['id']) : 0;

switch ($action)
{
    case 'show':
        $smarty->assign('orders', Order::show());
        break;
    
    case 'see':
        $smarty->assign('order', Order::see($id));
        break;

    case 'del':
        Order::setStatus($id, 2);
        Log::write(100, __file__, 'Заказ перенесён в оброботанные (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
        $_SESSION['walert'] = 'Заказ перенесён в обработанные';
        redirect('?page=orders');
        break;
        
    case 'delete':
        Order::setStatus($id, 3);
        Log::write(100, __file__, 'Заказ удалён (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
        $_SESSION['walert'] = 'Заказ удалён';
        redirect('?page=orders');
        break;

    case 'not':
        Order::setStatus($id, 1);
        Log::write(100, __file__, 'Заказ перенесён в необработанные (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
        $_SESSION['walert'] = 'Заказ перенесён в необработанные';
        redirect('?page=orders');
        break;
}
$smarty->assign('action', $action);
$smarty->display('header.tpl');
$smarty->display('orders.tpl');

?>