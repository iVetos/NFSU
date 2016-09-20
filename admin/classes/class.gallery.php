<?php

/**
 * Класс для работы с галереей
 * 
 * @package UPcms\Gallery
 * @author UP Studio <info@up-studio.net>
 * @date 04.04.2014
 */
 
if (!defined('__CONST_INCLUDES'))
    exit('Access denied');
    
class Gallery
{

    public function __construct()
    {

    }

    /**
     * Отображение всех разделов галереи
     * @param integer $id - ID категории
     * @return array
     */
    public static function show($id = 0)
    {
        if ($id === 0)
        {
            $sql = "SELECT * FROM `gallery`";
            $result = (Db::numRows($sql) < 1) ? array() : Db::doArray($sql);
        }
        else
        {
            $sql = "SELECT * FROM `gallery` WHERE `id` = {$id}";
            $result = (Db::numRows($sql) < 1) ? array() : Db::doOne($sql);
        }
        return $result;
    }


    /**
     * Добавления раздела галереи
     * 
     * @param string $name - название раздела
     * @param string $text - описание
     * @param date $date - дата галереи
     * @param string $img - обложка
     * @return boolean
     */
    public static function add($name, $text, $date, $img)
    {
        $sql = "INSERT INTO `gallery` 
                       SET `name` = '$name',
                       `text` = '$text',
                       `img` = '$img',
                       `date` = '$date',
                       `kol_photo` = 0";

        return Db::exec($sql);
    }

    /**
     * Редактирование раздела галереи
     * 
     * @param integer $id - ИД раздела
     * @param string $name - название раздела
     * @param date $date - дата галереи
     * @param string $img - обложка
     * @return boolean
     */
    public static function edit($id, $name, $text, $date, $img)
    {
        if ($img != null)
        {
            $sql = "UPDATE `gallery`
                       SET `name` = '$name',
                           `text` = '$text',
                           `img` = '$img',
                           `date` = '$date'
                       WHERE `id` = {$id}";
        }
        else
        {
            $sql = "UPDATE `gallery`
                       SET `name` = '$name',
                           `text` = '$text',
                           `date` = '$date'
                       WHERE `id` = {$id}";
        }

        return Db::exec($sql);
    }

    /**
     * Удаление раздела
     * 
     * @param integer $id - ИД раздела
     * @return boolean
     */
    public static function del($id)
    {
        $sql = "DELETE FROM `gallery` WHERE `id` = {$id}";
        return Db::exec($sql);
    }
    
    /**
     * Возращает имя обложки
     * 
     * @param integer $id - ИД раздела
     * @return string
     */
    public static function returnCover($id)
    {
        $sql = "SELECT `img` FROM `gallery` WHERE `id` = {$id}";

        if (Db::numRows($sql) < 1)
        {
            $name = false;
        }
        else
        {
            $result = Db::doOne($sql);
            $name = $result['img'];
        }

        return $name;
    }

    /**
     * Возращает имя категории
     * 
     * @param integer $id - ИД раздела
     * @return string
     */
    public static function returnNameCat($id)
    {
        $sql = "SELECT `name` FROM `gallery` WHERE `id` = {$id}";

        if (Db::numRows($sql) < 1)
        {
            $name_cat = false;
        }
        else
        {
            $result = Db::doOne($sql);
            $name_cat = $result['name'];
        }

        return $name_cat;
    }

    /**
     * Возращает имя картинки
     * 
     * @param integer $id - ИД картинки
     * @return string
     */
    public static function returnNameImg($id)
    {
        $sql = "SELECT `name` FROM `gallery_photo` WHERE `id` = {$id}";
        
        if (Db::numRows($sql) < 1)
        {
            $name_img = false;
        }
        else
        {
            $result = Db::doOne($sql);
            $name_img = $result['name'];
        }

        return $name_img;
    }

    /**
     * Возращает картинки выбранного раздела
     * 
     * @param integer $id - ИД раздела
     * @return array
     */
    public static function more($id)
    {
        $sql = "SELECT * FROM `gallery_photo` WHERE `id_cat` = {$id} ORDER BY `sort`, `id`";
        $result = (Db::numRows($sql) < 1) ? array() : Db::doArray($sql);
        return $result;
    }

    /**
     * Добавляет загруженную картинку в БД
     * 
     * @param integer $id - ИД раздела
     * @param string $name - имя файла картинки
     * @return boolean
     */
    public static function addImg($id, $name)
    {
        $sql = "INSERT INTO `gallery_photo` SET 
                        `id_cat` = {$id},
                        `name` = '$name',
                        `datetime` = NOW()";
        Db::exec($sql);
        
        $sql = "UPDATE `gallery` SET `kol_photo` = `kol_photo`+1 WHERE `id` = {$id}";
        return Db::exec($sql);
    }

    /**
     * Удаляет картинку из БД
     * 
     * @param integer $id - ИД картинки
     * @param integer $id_cat - ИД категории
     * @return boolean
     */
    public static function delImg($id, $id_cat)
    {
        $sql = "DELETE FROM `gallery_photo` WHERE `id` = {$id}";
        Db::exec($sql);
        
        $sql = "UPDATE `gallery` SET `kol_photo` = `kol_photo`-1 WHERE `id` = {$id_cat}";
        return Db::exec($sql);
    }
}

?>