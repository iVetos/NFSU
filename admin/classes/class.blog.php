<?php

/**
 * Class for work with blog
 *
 * @package UPcms\Blog
 * @author UP Studio <info@up-studio.net>
 * @date 8/10/2015
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

class Blog
{

    /**
     * All articles
     *
     * @return array
     */
    public static function show()
    {
        $sql = "SELECT * FROM `articles` ORDER BY `id`";
        $articles = (Db::numRows($sql) < 1) ? array() : Db::doArray($sql);
        return $articles;
    }

    /**
     * Add article
     *
     * @param integer $id_admin - admin ID
     * @param string $name
     * @param string $text_s - short text
     * @param string $text - full test
     * @param string $tags
     * @param date $date
     * @param string $link - URL
     * @param string $img - cover
     * @param string $title
     * @param string $description
     * @param string $keywords
     * @return boolean
     */
    public static function add($id_admin, $name, $text_s, $text, $tags, $date, $link,  $img, $title, $description, $keywords)
    {
        $sql = "INSERT INTO `articles` SET 
                        `id_admin` = '$id_admin',
                        `name` = '$name',
                        `addr` = '$addr',
                        `text` = '$text',
                        `text_s` = '$text_s',
                        `tags` = '$tags',
                        `date` = '$date',
                        `cover` = '$img',
                        `title` = '$title',
                        `description` = '$description',
                        `keywords` = '$keywords'";
        return Db::exec($sql);
    }

    /**
     * Редактирование
     *
     * @param integer $id - ИД статьи
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
        $sql = "UPDATE `articles` SET
                        `name` = '$name',
                        `addr` = '$addr',
                        `text` = '$text',
                        `text_s` = '$text_s',
                        `tags` = '$tags',
                        `date` = '$date',
                        `cover` = '$img',
                        `title` = '$title',
                        `description` = '$description',
                        `keywords` = '$keywords'
                    WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Удаление статьи
     *
     * @param integer $id - ИД статьи
     * @return boolean
     */
    public static function del($id)
    {
        $sql = "DELETE FROM `articles` WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Одна статья
     *
     * @param integer $id - ИД статьи
     * @return array
     */
    public static function returnOne($id)
    {
        $sql = "SELECT * FROM `articles` WHERE `id` = $id";
        $articles = (Db::numRows($sql) < 1) ? array() : Db::doOne($sql);
        return $articles;
    }

    /**
     * Возращает имя обложки
     *
     * @param integer $id - ИД статьи
     * @return string
     */
    public static function returnCover($id)
    {
        $sql = "SELECT `cover` FROM `articles` WHERE `id` = {$id}";

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