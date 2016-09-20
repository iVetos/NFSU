<?php
require_once('configs/const.inc.php');
require_once('class.db.php');
$db = new Db();

/**
 * Служебный класс
 * 
 * @package UPcms
 * @author UP Studio <info@up-studio.net>
 * @date 19.02.2014
 */
class Up
{
    /**
     * Обрабатывает URL и создаёт массив с тремя элементами: page, action и id
     * 
     * @example http://up-studio.net/{$page}/{$action}/{$id} - все три переменные заданы
     * @example http://up-studio.net/{$page}/{$id} - только две переменные заданы
     * @return array
     */
    public static function url()
    {
        $fullUrl = explode('/', $_SERVER['REQUEST_URI']);
        $url = array(
            'page' => null,
            'action' => null,
            'id' => null,
            'pageAddress' => null);
        if (count($fullUrl) > 1)
        {
            if (isset($fullUrl[1]) && strlen($fullUrl[1]) > 0)
            {
                $url['page'] = urldecode($fullUrl[1]);
                $url['pageAddress'] = '../' . urldecode($url['page']);
            }
            // with action
            if (count($fullUrl) > 3 && strlen($fullUrl[3]) > 0)
            {
                $url['action'] = (isset($fullUrl[2]) && strlen($fullUrl[2]) > 0) ? urldecode($fullUrl[2]) : null;
                $url['id'] = (isset($fullUrl[3]) && strlen($fullUrl[3]) > 0) ? urldecode($fullUrl[3]) : null;
            }
            // only id
            else
            {
                $url['action'] = null;
                $url['id'] = (isset($fullUrl[2]) && strlen($fullUrl[2]) > 0) ? urldecode($fullUrl[2]) : null;
            }
        }
        return $url;
    }
    
    /**
     * Создаёт меню в виде массива
     * 
     * @return array
     */
    public static function menu()
    {
        $menu = array();
        $sql = "SELECT * FROM `menu` WHERE `id_parent` = 0 ORDER BY `sort`";
        $k = Db::numRows($sql);
        if($k > 0)
        {
            $menu = Db::doArray($sql);
            // Подменю
            for($i = 0; $i < $k; $i++) {
                $sql = "SELECT * FROM `menu` WHERE `id_parent` = ".$menu[$i]['id']." ORDER BY `sort`";
                $sub_pages = Db::doArray($sql);
                $menu[$i]['sub'] = $sub_pages;
                if($sub_pages != false) {
                    $menu[$i]['sub_count'] = count($sub_pages);
                } else {
                    $menu[$i]['sub_count'] = 0;
                }
            }
        }
        return $menu;
    }
    
    public static function langTable($lang)
    {
        switch($lang)
        {
            case 'ru':
            $lang = '';
            break;
            
            case 'ua':
            $lang = '_ua';
            break;
            
            case 'en':
            $lang = '_en';
            break;
        }
        return $lang;
    }
}