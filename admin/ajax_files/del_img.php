<?php

/**
 * Delete image from product
 * 
 * @package UPcms\Ajax
 * @author UP Studio <info@up-studio.net>
 * @date 7/05/2015
 */

// Security
define('__CONST_INCLUDES', true);

// Include configs
require_once ('../configs/const.inc.php');
require_once ('../includes/functions.inc.php');
require_once ('../classes/class.db.php');
Db::connect();

$id = Db::prepare($_POST['id']);
$name = Db::prepare($_POST['img']);
$num = Db::prepare($_POST['num']);

if (strlen($_POST['img']) > 0) {
    unlink('../' . __CONST_PRODUCTS_DIR . $name);
    unlink('../' . __CONST_PRODUCTS_DIR . 'small_' . $name);

    $sql = "UPDATE `products` SET `$num` = '' WHERE `id` = $id";
    Db::exec($sql);
}

switch ($num) {
    case 'img_1':
        $msg = 'Первое изображение удалено';
        break;

    case 'img_2':
        $msg = 'Второе изображение удалено';
        break;

    case 'img_3':
        $msg = 'Третье изображение удалено';
        break;

    case 'img_4':
        $msg = 'Четвёртое изображение удалено';
        break;
}

echo $msg;
?>