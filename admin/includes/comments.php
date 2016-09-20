<?php
/**
 * Comments
 *
 * @package UPcms\Comments
 * @author UP Studio <info@up-studio.net>
 * @date 29/10/2015
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

Up::checkPerm($page);

$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';
$id = (isset($_GET['id'])) ? Db::prepare($_GET['id']) : 0;

switch ($action) {
    // Отобразить все статьи
    case 'show':
        $smarty->assign('title', 'Комментарии');
        $sql = "SELECT `comments`.`email` AS `email`, `comments`.`actual` AS `actual`, `comments`.`id` AS `id`, `users`.`name` AS `name`, `comments`.`name` AS `user_name`, `users`.`id` AS `id_user`, `products`.`name` AS `product_name`, `products`.`id` AS `id_product`, `comments`.`text` AS `text`, `comments`.`date` AS `date`
            FROM `products`, `comments`, `users` WHERE `users`.`id` = `comments`.`id_user` AND `products`.`id` = `comments`.`id_product`";

        $comments = Db::doArray($sql);
        $smarty->assign('comments', $comments);
        break;

    case 'del':
        $sql = "DELETE FROM `comments` WHERE `id` = $id";
        if (Db::exec($sql))
        {
            Log::write(100, __file__, 'Удаление комментария - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Комментарий удалён.';
        }
        else
        {
            Log::write(101, __file__, 'Ошибка при удалении комментария - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Произошла ошибка при удалении комментария.';
        }
        redirect('../admin/?page=comments');
        break;
}

$smarty->assign('action', $action);
$smarty->display('header.tpl');
$smarty->display('comments.tpl');