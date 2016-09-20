<?php

/**
 * Class for working with database
 * 
 * The class allows you to work with database MySQL.
 * 
 * @package UPcms\DataBase
 * @author UP Studio <info@up-studio.net>
 * @date 18/09/2015
 */
class Db
{
    /**
     * Cennection
     */
    public static function connect()
    {
        $connection = @mysql_connect(__DB_HOST, __DB_USER, __DB_PASS) or die("DB error connecting");
        mysql_select_db(__DB_NAME, $connection);
        mysql_query("SET NAMES utf8");
    }

    /**
     * Prepare variable
     * 
     * @param string $var - variable
     * @return string
     */
    public static function prepare($var)
    {
        return mysql_real_escape_string($var);
    }

    /**
     * Prepare variable with HTML
     * 
     * @param string $var - variable
     * @return string
     */
    public static function prepareHtml($var)
    {
        $var = self::prepare($var);
        $var = htmlspecialchars($var, ENT_QUOTES);
        return $var;
    }

    /**
     * Returns the ID of the last Insert
     * 
     * @return integer
     */
    public static function returnId()
    {
        return mysql_insert_id();
    }

    /**
     * Execute query
     * 
     * @param string $sql - query
     * @return boolean
     */
    public static function exec($sql)
    {
        $data = (mysql_query($sql)) ? true : false;
        return $data;
    }

    /**
     * Execute query and return array
     * 
     * @param string $sql - query
     * @return array
     */
    public static function doArray($sql)
    {
        $data = mysql_query($sql);
        $count = mysql_num_rows($data);
        $array = array();
        if ($count > 0)
        {
            for ($i = 0; $i < $count; $i++)
            {
                $array[] = mysql_fetch_assoc($data);
            }
        }
        return $array;
    }

    /**
     * Execute query and return array with one element
     * 
     * @param string $sql - query
     * @return array
     */
    public static function doOne($sql)
    {
        $data = mysql_query($sql);
        $array = array();
        if (mysql_num_rows($data) > 0)
        {
            $array = mysql_fetch_assoc($data);
        }
        return $array;
    }

    /**
     * Execute query and return array of objects
     * 
     * @param string $sql - query
     * @return array
     */
    public static function doObjects($sql)
    {
        $data = mysql_query($sql);
        $count = mysql_num_rows($data);
        $array = array();
        if ($count > 0)
        {
            for ($i = 0; $i < $count; $i++)
            {
                $array[] = mysql_fetch_object($data);
            }
        }
        return $array;
    }
    
    /**
     * Execute query and return array from one field
     * 
     * @param string $sql - query
     * @param string $field - field name
     * @return array
     */
    public static function doOneField($sql, $field)
    {
        $data = mysql_query($sql);
        $count = mysql_num_rows($data);
        $array = array();
        if ($count > 0)
        {
            for ($i = 0; $i < $count; $i++)
            {
                $item = mysql_fetch_array($data);
                $array[$i] = $item[$field];
            }
        }
        return $array;
    }

    /**
     * Execute query and return number of lines
     * 
     * @param string $sql - query
     * @return integer
     */
    public static function numRows($sql)
    {
        $data = mysql_query($sql);
        return mysql_num_rows($data);
    }

    /**
     * Set locale to ru_RU
     * 
     * @return void
     */
    public static function setRu()
    {
        mysql_query("SET lc_time_names = 'ru_RU'");
    }
}