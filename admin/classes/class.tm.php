<?php
/**
 * Класс для работы с торговыми марками
 * 
 * @package UPcms\Catalog\Tm
 * @author UP Studio <info@up-studio.net>
 * @date 29.08.2014
 */

class Tm {
    
    /**
     * Отображение всех тм
     * 
     * @return array
     */
    public static function show() {
        $sql = "SELECT * FROM `tms` ORDER BY `id`";
        $tms = (Db::numRows($sql) < 1) ?  array() : Db::doArray($sql);
        return $tms;
    }
    
    /**
     * Добавление тм
     * 
     * @param string $name - название ТМ
     * @return boolean
     */
    public static function add($name) {       
        $sql = "INSERT INTO `tms` SET `name` = '$name'";    
        return Db::exec($sql);
    }
    
    /**
     * Редактирование тм
     * 
     * @param integer $id - ИД тм
     * @return boolean
     */
    public static function edit($id, $name) {
        $sql = "UPDATE `tms` SET `name` = '$name' WHERE `id` = $id";
        return Db::exec($sql);
    }
    
    /**
     * Удаление тм
     * 
     * @param integer $id - ИД тм
     * @return boolean
     */
    public static function del($id) {
        $sql = "DELETE FROM `tms` WHERE `id` = $id";
        return Db::exec($sql);
    }
    
    /**
     * Одна тм
     * 
     * @param integer $id - ИД тм
     * @return array
     */
    public static function returnOne($id) {
        $sql = "SELECT * FROM `tms` WHERE `id` = $id";
        $item = (Db::numRows($sql) < 1) ? array() : Db::doOne($sql);
        return $item;
    }
}
?>