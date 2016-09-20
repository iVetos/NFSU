<?php

/**
 * Выход
 * 
 * @package UPcms\Enter
 * @author UP Studio <info@up-studio.net>
 * @date 28.03.2014
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

Log::write(100, __file__, 'Завершение сеанса [' . $_SESSION['adm_user_name'] . ']');

unset($_SESSION['adm_user_name']);
unset($_SESSION['adm_user_id']);
unset($_SESSION['adm_user_lvl']);
session_destroy();

redirect('../');

?>