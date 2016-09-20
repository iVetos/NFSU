<?php
/**
 * Основные классы и функции
 * 
 * @package UPcms\Main
 * @author UP Studio <info@up-studio.net>
 * @date 21.04.2014
 */

require_once (__DIR_CLASSES . 'class.db.php'); // Работа с БД
Db::connect();
require_once (__DIR_CLASSES . 'class.up.php'); // Служебный класс
require_once (__DIR_INCLUDES . 'functions.inc.php'); // Functions