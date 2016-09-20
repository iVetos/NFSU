<?php

/**
 * Class for working with logs
 * 
 * @package UPcms\Logs
 * @author UP Studio <info@up-studio.net>
 * @date 18/09/2015
 */

class Log
{
    /**
     * Create empty file
     * 
     * @param string $name - file name
     * @return boolean
     */
    public static function create($name)
    {
        $result = (fopen($_SERVER['DOCUMENT_ROOT'] . '/admin/' . __DIR_LOGS . $name . '.txt', 'w')) ? true : false;
        return $result;
    }
    
    /**
     * Add string to existing file
     * 
     * @param integer $code - error code
     * @example 100 - ok, 101 - error, 102 - access denied, 103 - file not found
     * @param string $file - file name
     * @param string $str - string
     * @return boolean
     */
    public static function write($code, $file, $str)
    {
        $name = date('Y-m-d');
        if(!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/' . __DIR_LOGS . $name . '.txt'))
        {
            self::create($name);
        }
        $str = '[' . $code . '] - ' . $str . ' - ' . $_SERVER['REMOTE_ADDR'] . ' - [' . date('d/M/Y H:i:s P') . '] ' . $file . ' - '.$_SERVER['HTTP_USER_AGENT'] . chr(0x0a);
        $fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/admin/' . __DIR_LOGS . $name . '.txt', 'a+');
        $result = (fwrite($fp, $str)) ? true : false;
        fclose($fp);
        return $result;
    }
    
    /**
     * Show log
     * 
     * @param string $name - file name
     * @return array
     */
    public static function show($name)
    {
        $logs = (file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/' . __DIR_LOGS . $name . '.txt')) ? file($_SERVER['DOCUMENT_ROOT'] . '/admin/' . __DIR_LOGS . $name . '.txt') : array();
        return $logs;
    }
}