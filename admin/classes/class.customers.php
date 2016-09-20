<?php

/**
 * Customers
 * 
 * @package UPcms\Shop
 * @author UP Studio <info@up-studio.net>
 * @date 7/05/2015
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

class Customers
{

    /**
     * Show all
     * 
     * @return array
     */
    public static function show()
    {
        $sql = "SELECT * FROM `customers` ORDER BY `id` DESC";
        $customers = (Db::numRows($sql) < 1) ? array() : Db::doArray($sql);
        return $customers;
    }
    
    /**
     * Show customer
     * 
     * @param integer $id - Customers's ID
     * @return array
     */
    public static function showOne($id)
    {
        $sql = "SELECT * FROM `customers` WHERE `id` = $id";
        $customer = (Db::numRows($sql) < 1) ? array() : Db::doOne($sql);
        return $customer;
    }

    /**
     * Delete customer
     *
     * @param integer $id - Customers's ID
     * @return bool
     */
    public static function del($id){
        $sql = "DELETE FROM `customers` WHERE `id` = $id";
        return Db::exec($sql);
    }
}