<?php

/**
 * Авторизация
 * 
 * @package UPcms\Enter
 * @author UP Studio <info@up-studio.net>
 * @date 28.03.2014
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');
// Если форма отправлена
if (isset($_POST['name']) && isset($_POST['password']))
{
    $login = Db::prepare($_POST['name']);
    $pass = Db::prepare($_POST['password']);
    $sql = "SELECT `id`, `name`, `id_level` FROM `admins` WHERE ((`login` = '$login') AND (`pass` = '$pass'))";
    if (Db::numRows($sql) > 0)
    {
        $user = Db::doOne($sql);
        // If all good
        $_SESSION['adm_user_id'] = $user['id'];
        $_SESSION['adm_user_name'] = $user['name'];
        $_SESSION['adm_user_lvl'] = $user['id_level'];

        // Update last date and last IP
        $ip = $_SERVER['REMOTE_ADDR'];
        $sql = "UPDATE `admins` SET `last_date` = NOW(), `last_ip` = '$ip' WHERE `id` = " . $user['id'];
        Db::exec($sql);
        Log::write(100, __file__, 'Успешный вход [' . $_SESSION['adm_user_name'] . ']');
    }
    else
    {
        $smarty->assign('error', 'Логин или пароль введены неверно');
        Log::write(101, __file__, 'Логин или пароль введены неверно [' . $_POST['name'] . ' & ' . $_POST['password'] . ']');
    }
}
if (isset($_SESSION['adm_user_name']))
{
    redirect('../admin');
}
else
{
    $smarty->display('enter.tpl');
}

?>