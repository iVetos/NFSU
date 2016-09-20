<?php
/**
 * Класс для работы со слайдером на главной
 * 
 * @package UPcms\Slider
 * @author UP Studio <info@up-studio.net>
 * @date 12.10.2014
 */

class Slider {
    
    /**
     * Все слайды
     * 
     * @return array
     */
    public static function show() {
        $sql = "SELECT * FROM `sliders` ORDER BY `id`";
        $sliders = (Db::numRows($sql) < 1) ?  array() : Db::doArray($sql);
        return $sliders;
    }
    
    /**
     * Добавление
     * 
     * @param string $img - название слайда
     * @param string $link - ссылка
     * @return boolean
     */
    public static function add($img, $link) {       
        $sql = "INSERT INTO `sliders` SET `name` = '$img', `link` = '$link'";
        return Db::exec($sql);
    }
    
    /**
     * Редактирование
     * 
     * @param integer $id - ИД сладйа
     * @param string $img - название слайда
     * @param string $link - ссылка
     * @return boolean
     */
    public static function edit($id, $img, $link) {
        $sql = "UPDATE `sliders` SET `name` = '$img', `link` = '$link' WHERE `id` = $id";
        return Db::exec($sql);
    }
    
    /**
     * Удаление
     * 
     * @param integer $id - ИД слайда
     * @return boolean
     */
    public static function del($id) {
        $sql = "DELETE FROM `sliders` WHERE `id` = $id";
        return Db::exec($sql);
    }
    
    /**
     * Один слайд
     * 
     * @param integer $id - ИД слайда
     * @return array
     */
    public function returnOne($id) {
        $sql = "SELECT `name`, `link` FROM `sliders` WHERE `id` = $id";
        $slide = (Db::numRows($sql) < 1) ? array() : Db::doOne($sql);
        return $slide;
    }
    
    /**
     * Возращает имя слайда
     * 
     * @param integer $id - ИД слайда
     * @return string
     */
    public static function returnImg($id)
    {
        $sql = "SELECT `name` FROM `sliders` WHERE `id` = {$id}";

        if (Db::numRows($sql) < 1)
        {
            $name = '';
        }
        else
        {
            $result = Db::doOne($sql);
            $name = $result['name'];
        }

        return $name;
    }
}
?>