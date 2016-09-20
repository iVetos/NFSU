<?php

/**
 * Класс для работы с тегами
 * 
 * @package UPcms\Tags
 * @author UP Studio <info@up-studio.net>
 * @date 12.04.2014
 */

class Tags
{
    /**
     * Все теги
     * 
     * @return array
     */
    public static function show()
    {
        $sql = "SELECT * FROM `tags` ORDER BY `name`";
        return (Db::numRows($sql) < 1) ? array() : Db::doOneField($sql, 'name');
    }
    
    /**
     * Добавление новых тегов
     * 
     * @param string $tags - теги ля добавления
     * @return void
     */
    public static function add($tags)
    {
        // находим только новые теги
        $new_tags = array_diff(explode(',', $tags), self::show());
        foreach($new_tags as $tag)
        {
            if(strlen(trim($tag)) > 0)
            {
                $sql = "INSERT INTO `tags` SET `name` = '$tag'";
                Db::exec($sql);
            }
        }
    }
    
    /**
     * Преобразовывает строку с тегами в массив
     * 
     * @param string $tags
     * @return array
     */
    public static function doTags($tags)
    {
        if(strlen(trim($tags)) > 0)
        {
            return explode(',', $tags);
        }
        else
        {
            return array();
        }
    }
}
?>