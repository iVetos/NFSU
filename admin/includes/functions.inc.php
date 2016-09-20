<?php

/**
 * Functions
 * 
 * @package UPcms\Functions
 * @author UP Studio <info@up-studio.net>
 * @date 18/09/2015
 */

// Forbid external load
if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

/**
 * Proper spelling of numbers
 * 
 * @param integer $num – number
 * @param array $text – array of values for 1, 2 and 5
 * @return string
 */
function numEnd($num, $text = array('товар', 'товара', 'товаров'))
{
    $cases = array(2, 0, 1, 1, 1, 2);
    return $num . " " . $text[($num % 100 > 4 && $num % 100 < 20) ? 2 : $cases[min($num % 10, 5)]];
}

/**
 * The right end for prices
 * 
 * @param float $price – price
 * @example xx -> xx.00
 * @example xx.x -> xx.x0
 * @example x.xxx -> xx.xx
 * @return string
 */
function toPrice($price)
{
    if (substr_count($price, '.')) {
        $len = strlen(strstr($price, '.'));
        if ($len > 3) {
            $price = substr($price, 0, ((-1) * $len + 3));
        } else {
            if ($len == 2) {
                $price .= '0';
            }
        }
        $len = 3;
    } else {
        $len = 0;
    }
    if ((strlen($price) - $len) > 3) {
        $len = (strlen($price) - $len) - 1;
        $end = (($len + 1) % 3) ? (((($len + 1) % 3) == 1) ? 2 : 1) : 0;
        for ($i = 0; $i < (int)($len / 3); $i++) {
            $price = substr($price, 0, 3 * ($i + 1) + $i * 6 - $end) . '&nbsp;' . substr($price, (3 * ($i + 1) + $i * 6 - $end));
        }
    }
    if (!substr_count($price, '.')) {
        $price .= '.00';
    }
    return $price;
}

/**
 * If necessary, you can use instead of nl2br
 * 
 * @param string $text
 * @return string
 */
function nl2p($text)
{
    $text = '<p>' . str_replace('<br />', '</p><p>', nl2br($text)) . '</p>';
    return $text;
}

/**
 * Function translation of the text from the Cyrillic to the transcript
 * 
 * @param string $string
 * @param boolean $gost - writing rules according to GOST
 * @return string
 */
function encodeString($string, $gost = false)
{
    if($gost) {
        $replace = array("А"=>"A","а"=>"a","Б"=>"B","б"=>"b","В"=>"V","в"=>"v","Г"=>"G","г"=>"g","Д"=>"D","д"=>"d",
                "Е"=>"E","е"=>"e","Ё"=>"E","ё"=>"e","Ж"=>"Zh","ж"=>"zh","З"=>"Z","з"=>"z","И"=>"I","и"=>"i",
                "Й"=>"I","й"=>"i","К"=>"K","к"=>"k","Л"=>"L","л"=>"l","М"=>"M","м"=>"m","Н"=>"N","н"=>"n","О"=>"O","о"=>"o",
                "П"=>"P","п"=>"p","Р"=>"R","р"=>"r","С"=>"S","с"=>"s","Т"=>"T","т"=>"t","У"=>"U","у"=>"u","Ф"=>"F","ф"=>"f",
                "Х"=>"Kh","х"=>"kh","Ц"=>"Tc","ц"=>"tc","Ч"=>"Ch","ч"=>"ch","Ш"=>"Sh","ш"=>"sh","Щ"=>"Shch","щ"=>"shch",
                "Ы"=>"Y","ы"=>"y","Э"=>"E","э"=>"e","Ю"=>"Iu","ю"=>"iu","Я"=>"Ia","я"=>"ia","ъ"=>"","ь"=>"","ї" => "i",
                "Ї" => "Yi","є" => "ie","Є" => "Ye");
    } else {
        $arStrES = array("ае","уе","ое","ые","ие","эе","яе","юе","ёе","ее","ье","ъе","ый","ий");
        $arStrOS = array("аё","уё","оё","ыё","иё","эё","яё","юё","ёё","её","ьё","ъё","ый","ий");        
        $arStrRS = array("а$","у$","о$","ы$","и$","э$","я$","ю$","ё$","е$","ь$","ъ$","@","@");
                    
        $replace = array("А"=>"A","а"=>"a","Б"=>"B","б"=>"b","В"=>"V","в"=>"v","Г"=>"G","г"=>"g","Д"=>"D","д"=>"d",
                "Е"=>"Ye","е"=>"e","Ё"=>"Ye","ё"=>"e","Ж"=>"Zh","ж"=>"zh","З"=>"Z","з"=>"z","И"=>"I","и"=>"i",
                "Й"=>"Y","й"=>"y","К"=>"K","к"=>"k","Л"=>"L","л"=>"l","М"=>"M","м"=>"m","Н"=>"N","н"=>"n",
                "О"=>"O","о"=>"o","П"=>"P","п"=>"p","Р"=>"R","р"=>"r","С"=>"S","с"=>"s","Т"=>"T","т"=>"t",
                "У"=>"U","у"=>"u","Ф"=>"F","ф"=>"f","Х"=>"Kh","х"=>"kh","Ц"=>"Ts","ц"=>"ts","Ч"=>"Ch","ч"=>"ch",
                "Ш"=>"Sh","ш"=>"sh","Щ"=>"Shch","щ"=>"shch","Ъ"=>"","ъ"=>"","Ы"=>"Y","ы"=>"y","Ь"=>"","ь"=>"",
                "Э"=>"E","э"=>"e","Ю"=>"Yu","ю"=>"yu","Я"=>"Ya","я"=>"ya","@"=>"y","$"=>"ye","ї" => "i",
                "Ї" => "Yi","є" => "ie","Є" => "Ye");
                
        $string = str_replace($arStrES, $arStrRS, $string);
        $string = str_replace($arStrOS, $arStrRS, $string);
    }

    return iconv("UTF-8", "UTF-8//IGNORE", strtr($string, $replace));
}

/**
 * Replacement comma to point
 * 
 * @param str $str - string with comma
 * @return str
 */
function strip_comma($str)
{
    return str_replace(',', '.', $str);
}

/**
 * Replacing spaces to underscore symbol (_)
 * 
 * @param string $str - string
 * @return string
 */
function replaceSpaces($str)
{
    return str_replace(' ', '_', $str);
}

/**
 * Remove all the characters from the string
 * 
 * @param string $str - строка
 * @return string
 */
function stripSym($str)
{
    $symbs = array("!", "@", '"', "$", ";", ":", "'", "`", "^", "%", "&", "?", "*", "(", ")", "{", "}", "[", "]", '\\', "|", "/", ",", ".", "+", "~", "<", ">", "#", "№", "=");
    return str_replace($symbs, "", $str);
}

/**
 * Dump
 * 
 * @param mixed $data
 * @return void
 */
function dump($data)
{
    if (is_array($data)) {
        print '<pre class="dump">';
        print_r($data);
        print '</pre>';
    } else {
        print '<pre class="dump">';
        var_dump($data);
        print '</pre>';
    }
}

/**
 * Redirect
 * 
 * @param string $url
 * @return void
 */
function redirect($url)
{
    if (!headers_sent()) {
        // If headers are not yet sent, then we try to redirect at php
        header("Location: " . $url);
        exit;
    } else {
        // If headers are sent, then do a redirect at javascript
        // If javascript is disabled, do redirects at html
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . $url . '";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
        echo '</noscript>';
        exit;
    }
}

/**
 * Truncate without violating the integrity of words
 * 
 * @param string $string - string
 * @param integer $maxlen - string length
 * @return string
 */
function cutString($string, $maxlen)
{
    $len = (mb_strlen($string) > $maxlen) ? mb_strripos(mb_substr($string, 0, $maxlen), ' ') : $maxlen;
    $cutStr = mb_substr($string, 0, $len);
    return (mb_strlen($string) > $maxlen) ? '' . $cutStr . '...' : '' . $cutStr . '';
}

/**
 * Title at admin panel
 */
function adminTitle($title)
{
    echo '<h1>' . $title . '</h1>
    <div class="divider"></div>';
}

/**
 * Alert at admin panel
 */
function alert($text)
{
    echo '
	<div class="alert"> 
        <img src="img/icons/alert.png" alt="" />
        <strong>' . $text . '</strong>
	</div>';
}

/**
 * Error at admin panel
 */
function error($text)
{
    echo '
	<div class="error"> 
        <img src="img/icons/alert.png" alt="" />
        <strong>' . $text . '</strong>
	</div>';
}