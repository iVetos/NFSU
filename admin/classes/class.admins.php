<?php

/**
 * Класс для работы с пользователями администраторской панели
 * 
 * @package UPcms\Admins
 * @author UP Studio <info@up-studio.net>
 * @date 08.12.2014
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

class Admin
{

    /**
     * Все типы пользователей
     * 
     * @return array
     */
    public static function show()
    {
        $sql = "SELECT `admins`.`id` AS `id`, `admins`.`name` AS `name`, `last_date`, `levels`.`name` AS `level` FROM `admins`, `levels` WHERE `admins`.`id_level` = `levels`.`id` AND `admins`.`id` != " . $_SESSION['adm_user_id'] . " ORDER BY `admins`.`name`";
        $admins = (Db::numRows($sql) < 1) ? array() : Db::doArray($sql);
        return $admins;
    }
    
    /**
     * Добавление пользователя
     * 
     * @param string $name - имя
     * @param integer $level - тип
     * @param string $login - логин
     * @param string $pass - пароль
     * @param integer $who - кто добавил
     * @return boolen 
     */
    public static function add($name, $level, $login, $pass, $who)
    {
        $sql = "INSERT INTO `admins` SET 
                        `name` = '$name',
                        `id_level` = '$level',
                        `id_parent` = '$who',
                        `login` = '$login',
                        `pass` = '$pass',
                        `date` = NOW()";
        return Db::exec($sql);
    }
    
    /**
     * Редактирование пользователя
     * 
     * @param integer $id - ИД пользователя
     * @param string $name - имя
     * @param integer $level - тип
     * @param string $login - логин
     * @param string $pass - пароль
     * @return boolen 
     */
    public static function edit($id, $name, $level, $login, $pass)
    {
        $sql = "UPDATE `admins` SET 
                        `name` = '$name',
                        `id_level` = '$level',
                        `login` = '$login',
                        `pass` = '$pass'
                    WHERE `id` = $id";
        return Db::exec($sql);
    }
    
    /**
     * Удаление пользователя
     * 
     * @param integer $id - ИД пользователя
     * @return boolean
     */
    public static function del($id)
    {
        $sql = "DELETE FROM `admins` WHERE `id` = $id";
        return Db::exec($sql);
    }
    
    /**
     * Один пользователь
     * 
     * @param ineger $id - ИД пользователя
     * @return array
     */
    public static function returnOne($id)
    {
        $sql = "SELECT `admins`.`id` AS `id`, `admins`.`name` AS `name`, `id_level`, `login`, `pass`, `last_date`, `levels`.`name` AS `level` FROM `admins`, `levels` WHERE `admins`.`id_level` = `levels`.`id` AND `admins`.`id` = $id";
        $admin = (Db::numRows($sql) < 1) ? array() : Db::doOne($sql);
        return $admin;
    }
    
    /**
     * Все типы пользователей
     * 
     * @return array
     */
    public static function showTypes()
    {
        $sql = "SELECT * FROM `levels` ORDER BY `id`";
        $types = (Db::numRows($sql) < 1) ? array() : Db::doArray($sql);
        return $types;
    }
    
    /**
     * Добавление типа пользователей
     * 
     * @param string $name - название
     * @param integer $params - доступные модули
     * @return boolean
     */
    public static function addType($name, $pages, $articles, $news, $catalog, $orders, $users, $admins, $slider, $gallery, $options)
    {
        $sql = "INSERT INTO `levels` SET 
                        `name` = '$name',
                        `pages` = $pages,
                        `articles` = $articles,
                        `news` = $news,
                        `catalog` = $catalog,
                        `orders` = $orders,
                        `users` = $users,
                        `admins` = $admins,
                        `slider` = $slider,
                        `gallery` = $gallery,
                        `options` = $options";
        return Db::exec($sql);
    }
    
    /**
     * Редактирования типа пользователей
     * 
     * @param string $name - название
     * @param integer $params - доступные модули
     * @return boolean
     */
    public static function editType($id, $name, $pages, $articles, $news, $catalog, $orders, $users, $admins, $slider, $gallery, $options)
    {
        $sql = "UPDATE `levels` SET 
                        `name` = '$name',
                        `pages` = $pages,
                        `articles` = $articles,
                        `news` = $news,
                        `catalog` = $catalog,
                        `orders` = $orders,
                        `users` = $users,
                        `admins` = $admins,
                        `slider` = $slider,
                        `gallery` = $gallery,
                        `options` = $options
                    WHERE `id` = $id";
        return Db::exec($sql);
    }
    
    /**
     * Удаление типа пользователей
     * 
     * @param integer $id - ИД типа пользователей
     * @return boolean
     */
    public static function delType($id)
    {
        $sql = "DELETE FROM `levels` WHERE `id` = $id";
        return Db::exec($sql);
    }
    
    /**
     * Модули
     * 
     * @return array
     */
    public static function returnModules()
    {
        $sql = "SELECT * FROM `modules` WHERE `value` = 1";
        $modules = Db::doArray($sql);
        return $modules;
    }
    
    /**
     * Пользователи данного типа
     * 
     * @param integer $id - ИД типа пользователей
     * @return array
     */
    public static function returnAdmins($id)
    {
        $sql = "SELECT * FROM `admins` WHERE `id_level` = $id";
        $admins = Db::doArray($sql);
        return $admins;
    }
    
    /**
     * Один тип
     * 
     * @param ineger $id - ИД типа пользователей
     * @return array
     */
    public static function returnType($id)
    {
        $sql = "SELECT * FROM `levels` WHERE `id` = $id";
        $type = (Db::numRows($sql) < 1) ? array() : Db::doOne($sql);
        return $type;
    }
}

?>