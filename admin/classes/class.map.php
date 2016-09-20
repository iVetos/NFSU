<?php

/**
 * Класс для добавления данных
 *
 * @package UPcms\AddSome
 * @author UP Studio <info@up-studio.net>
 * @date 30/08/2016
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

class Map
{

    /**
     * Все записи
     *
     * @param string $table - название таблицы
     * @return array
     */
    public static function show($table)
    {
        $sql = "SELECT * FROM `$table` ORDER BY `id`";
        $some = (Db::numRows($sql) < 1) ? array() : Db::doArray($sql);
        return $some;
    }

    /**
     * Добавление
     *
     * @param string $table - название таблицы
     * @param string $name - название
     * @param string $map - должность
     * @param string $text_s - краткое описание
     * @param string $text - полное описание
     * @param string $img - название изображения
     * @param string $title - метатег Title
     * @param string $description - метатег Description
     * @param string $keywords - метатег Keywords
     * @return boolean
     */
    public static function add($table, $name, $map, $text_s, $text, $img, $title, $description, $keywords)
    {
        $sql = "INSERT INTO `$table` SET 
                        `name` = '$name',
                        `map` = '$map',
                        `text_s` = '$text_s',
                        `text` = '$text',
                        `img` = '$img',
                        `title` = '$title',
                        `description` = '$description',
                        `keywords` = '$keywords'";
        return Db::exec($sql);
    }

    /**
     * Редактирование
     *
     * @param integer $id - ИД записи
     * @param string $table - название таблицы
     * @param string $name - название
     * @param string $map - должность
     * @param string $text_s - краткое описание
     * @param string $text - полное описание
     * @param string $img - название изображения
     * @param string $title - метатег Title
     * @param string $description - метатег Description
     * @param string $keywords - метатег Keywords
     * @return boolean
     */
    public static function edit($id, $table, $name, $map, $text_s, $text, $img, $title, $description, $keywords)
    {
        $sql = "UPDATE `$table` SET
                        `name` = '$name',
                        `map` = '$map',
                        `text_s` = '$text_s',
                        `text` = '$text',
                        `img` = '$img',
                        `title` = '$title',
                        `description` = '$description'
                    WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Удаление записи
     *
     * @param integer $id - ИД записи
     * @param string $table - название таблицы
     * @return boolean
     */
    public static function del($id, $table)
    {
        $sql = "DELETE FROM `$table` WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Одна запись
     *
     * @param integer $id - ИД записи
     * @param string $table - название таблицы
     * @return array
     */
    public static function returnOne($id, $table)
    {
        $sql = "SELECT * FROM `$table` WHERE `id` = $id";
        $some = (Db::numRows($sql) < 1) ? array() : Db::doOne($sql);
        return $some;
    }

    /**
     * Возращает имя изображения
     *
     * @param integer $id - ИД записи
     * @param string $table - название таблицы
     * @return string
     */
    public static function returnCover($id, $table)
    {
        $sql = "SELECT `img` FROM `$table` WHERE `id` = {$id}";

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
}

?>