<?php

/**
 * The inner class
 * 
 * @package UPcms\Up
 * @author UP Studio <info@up-studio.net>
 * @date 18/09/2015
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

class Up
{

    /**
     * Return user rights
     * 
     * @param integer $id - ID type of user
     * @return array
     */
    public static function getPerm()
    {
        $sql = "SELECT * FROM `levels` WHERE `id` = " . $_SESSION['adm_user_lvl'];
        $perm = (Db::numRows($sql) < 1) ? array() : Db::doOne($sql);
        return $perm;
    }

    /**
     * Check permission for this section
     * 
     * @param string $page - page address
     * @return boolean
     */
    public static function checkPerm($page)
    {
        $sql = "SELECT `$page` FROM `levels` WHERE `id` = " . $_SESSION['adm_user_lvl'];
        if (Db::numRows($sql) < 1) {
            $perm = false;
        } else {
            $perm = Db::doOne($sql);
            $perm = $perm[$page];
        }
        if (!$perm)
            exit($perm['perm']);
    }
}
