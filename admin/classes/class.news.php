<?php

/**
 * Класс для работы с новостями
 * 
 * @package UPcms\News
 * @author UP Studio <info@up-studio.net>
 * @date 08.04.2014
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

class News
{

    /**
     * Все новости
     * 
     * @return array
     */
    public static function show()
    {
        $sql = "SELECT * FROM `news` ORDER BY `id`";
        $news = (Db::numRows($sql) < 1) ? array() : Db::doArray($sql);
        return $news;
    }

    /**
     * Добавление
     * 
     * @param integer $id_admin - ИД администратора
     * @param string $name - название
     * @param string $text_s - краткое описание
     * @param string $text - полное описание
     * @param string $tags - теги
     * @param date $date
     * @param string $addr - адрес новости
     * @param string $img - обложка
     * @param string $title - метатег Title
     * @param string $description - метатег Description
     * @param string $keywords - метатег Keywords
     * @return boolean
     */
    public static function add($id_admin, $name, $text_s, $text, $tags, $date, $addr, $img, $title, $description, $keywords)
    {
        $sql = "INSERT INTO `news` SET 
                        `id_admin` = '$id_admin',
                        `name` = '$name',
                        `text` = '$text',
                        `text_s` = '$text_s',
                        `tags` = '$tags',
                        `date` = '$date',
                        `link` = '$addr',
                        `cover` = '$img',
                        `title` = '$title',
                        `description` = '$description',
                        `keywords` = '$keywords'";
        return Db::exec($sql);
    }

    /**
     * Редактирование
     * 
     * @param integer $id - ИД новости
     * @param string $name - название
     * @param string $text_s - краткое описание
     * @param string $text - полное описание
     * @param string $tags - теги
     * @param date $date
     * @param string $addr - адрес новости
     * @param string $img - обложка
     * @param string $title - метатег Title
     * @param string $description - метатег Description
     * @param string $keywords - метатег Keywords
     * @return boolean
     */
    public static function edit($id, $name, $text_s, $text, $tags, $date, $addr, $img, $title, $description, $keywords)
    {
        $sql = "UPDATE `news` SET
                        `name` = '$name',
                        `text` = '$text',
                        `text_s` = '$text_s',
                        `tags` = '$tags',
                        `date` = '$date',
                        `link` = '$addr',
                        `cover` = '$img',
                        `title` = '$title',
                        `description` = '$description',
                        `keywords` = '$keywords'
                    WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Удаление новости
     * 
     * @param integer $id - ИД новости
     * @return boolean
     */
    public static function del($id)
    {
        $sql = "DELETE FROM `news` WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Одна новость
     * 
     * @param integer $id - ИД новости
     * @return array
     */
    public static function returnOne($id)
    {
        $sql = "SELECT * FROM `news` WHERE `id` = $id";
        $news = (Db::numRows($sql) < 1) ? array() : Db::doOne($sql);
        return $news;
    }
    
    /**
     * Возращает имя обложки
     * 
     * @param integer $id - ИД новости
     * @return string
     */
    public static function returnCover($id)
    {
        $sql = "SELECT `cover` FROM `news` WHERE `id` = {$id}";

        if (Db::numRows($sql) < 1)
        {
            $name = false;
        }
        else
        {
            $result = Db::doOne($sql);
            $name = $result['cover'];
        }

        return $name;
    }
}

?>