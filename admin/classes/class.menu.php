<?php

/**
 * Class for working with menu editor
 * 
 * @package UPcms\Menu
 * @author UP Studio <info@up-studio.net>
 * @date 5/10/2015
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

class Menu
{

    /**
     * All items
     * 
     * @param integer $id - parent ID
     * @return array
     */
    public static function show($id)
    {
        $sql = "SELECT * FROM `menu` WHERE `id_parent` = $id ORDER BY `sort`, `id`";
        $menu = (Db::numRows($sql) < 1) ? array() : Db::doArray($sql);
        return $menu;
    }

    /**
     * Adding
     * 
     * @param integer $id - parent ID
     * @param string $name
     * @param string $link
     * @return boolean
     */
    public static function add($id, $name, $link)
    {
        $sql = "INSERT INTO `menu` SET 
                       `id_parent` = $id,
                       `name` = '$name',
                       `link` = '$link'";
        return Db::exec($sql);
    }

    /**
     * Editing
     * 
     * @param integer $id - item ID
     * @param string $name
     * @param string $link
     * @return boolean
     */
    public function edit($id, $name, $link)
    {
        $sql = "UPDATE `menu` 
                       SET `name` = '$name',
                           `link` = '$link'
                       WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Deleting
     * 
     * @param integer $id - item ID
     * @return boolean
     */
    public static function del($id)
    {
        $sql = "DELETE FROM `menu` WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Return one item
     * 
     * @param integer $id - item ID
     * @return array
     */
    public static function returnOne($id)
    {
        $sql = "SELECT * FROM `menu` WHERE `id` = $id";
        $item = (Db::numRows($sql) < 1) ? array() : Db::doOne($sql);
        return $item;
    }

    /**
     * Return parent ID
     * 
     * @param integer $id - ИД раздела
     * @return integer
     */
    public static function returnParentId($id)
    {
        $sql = "SELECT `id_parent` FROM `menu` WHERE `id` = $id";
        
        if (Db::numRows($sql) < 1)
        {
            $id_parent = 0;
        }
        else
        {
            $result = Db::doOne($sql);
            $id_parent = $result['id_parent'];
        }

        return $id_parent;
    }
}