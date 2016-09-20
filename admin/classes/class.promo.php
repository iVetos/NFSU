<?php
/**
 * ????? ??? ?????? ? ???????????
 *
 * @package UPcms\Catalog\Promo
 * @author UP Studio <info@up-studio.net>
 * @date 23/01/2016
 */

class Promo {

    /**
     * All
     *
     * @return array
     */
    public static function show() {
        $sql = "SELECT * FROM `promo` ORDER BY `id`";
        $promos = (Db::numRows($sql) < 1) ?  array() : Db::doArray($sql);
        return $promos;
    }

    /**
     * Adding
     *
     * @param string $name
     * @param string $value
     * @param string $discount
     * @param string $date
     * @return boolean
     */
    public static function add($name, $value, $discount, $date) {
        $sql = "INSERT INTO `promo` SET `name` = '$name', `value` = '$value', `discount` = $discount, `date` = '$date'";
        return Db::exec($sql);
    }

    /**
     * Editing
     *
     * @param integer $id
     * @param string $value
     * @param string $discount
     * @param string $date
     * @return boolean
     */
    public static function edit($id, $name, $value, $discount, $date) {
        $sql = "UPDATE `promo` SET `name` = '$name', `value` = '$value', `discount` = $discount, `date` = '$date' WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Deleting
     *
     * @param integer $id
     * @return boolean
     */
    public static function del($id) {
        $sql = "DELETE FROM `promo` WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Return one
     *
     * @param integer $id
     * @return array
     */
    public static function returnOne($id) {
        $sql = "SELECT * FROM `promo` WHERE `id` = $id";
        $item = (Db::numRows($sql) < 1) ? array() : Db::doOne($sql);
        return $item;
    }
}
?>