<?php

/**
 * Функции
 * 
 * @package UPcms\Functions
 * @author UP Studio <info@up-studio.net>
 * @date 19.02.2014
 */


/**
 * Функция для правильного написания окончаний числительных
 * 
 * @param integer $num – число товаров или ещё чего-нибудь
 * @param array $text  – массив написания для 1, 2 и 5
 * @return string
 */
function numEnd($num, $text = array('товар', 'товара', 'товаров'))
{
    $cases = array(2, 0, 1, 1, 1, 2);
    return $num . " " . $text[($num % 100 > 4 && $num % 100 < 20) ? 2 : $cases[min($num % 10, 5)]];
}

/**
 * Функция для правильного написания окончаний чисел цен
 * 
 * @param integer $price – цена
 * @example xx     -> xx.00
 * @example xx.x   -> xx.x0
 * @example xx.xxx -> xx.xx
 */
function toPrice($price)
{
    if (substr_count($price, '.'))
    {
        $len = strlen(strstr($price, '.'));
        if ($len > 3)
        {
            $price = substr($price, 0, ((-1) * $len + 3));
        }
        elseif ($len == 2)
        {
            $price .= '0';
        }
        $len = 3;
    }
    else
    {
        $len = 0;
    }
    if ((strlen($price) - $len) > 3)
    {
        $len = (strlen($price) - $len) - 1;
        $ost = (($len + 1) % 3) ? (((($len + 1) % 3) == 1) ? 2 : 1) : 0;
        for ($i = 0; $i < (int)($len / 3); $i++)
        {
            $price = substr($price, 0, 3 * ($i + 1) + $i * 6 - $ost) . '&nbsp;' . substr($price, (3 * ($i + 1) + $i * 6 - $ost));
        }
    }
    if (!substr_count($price, '.'))
    {
        $price .= '.00';
    }
    return $price;
}

/**
 * Функция заменяет запятую на точку
 * 
 * @param string $str - string with comma
 * @return string
 */
function strip_comma($str)
{
    return str_replace(',', '.', $str);
}

/**
 * Дамп данных
 * 
 * @param mixed $data - данные
 * @return void
 */
function dump($data)
{
    // If the given variable is an array, print using the print_r function.
    if (is_array($data))
    {
        print '<pre class="dump">';
        print_r($data);
        print '</pre>';
    }
    else
    {
        print '<pre class="dump">';
        var_dump($data);
        print '</pre>';
    }
}

/**
 * Перенаправление
 * 
 * @param string $url - адрес страницы, на которую нужно перенаправить
 * @return void
 */
function redirect($url)
{
    if (!headers_sent())
    {
        // Если заголовки еще не отправлены...
        // пробуем редирект на php
        header("Location: " . $url);
        exit;
    }
    else
    {
        // Если заголовки отправлены...
        // делаем редирект на javascript ...
        // если javascript отключен, делаем редирект на html.
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
 * Функция обрезает строку не нарушая целостности слов
 * 
 * @param string $string - исходная строка
 * @param integer $maxlen - количество символов, которые нужно оставить
 * @return string
 */
function cutString($string, $maxlen)
{
    $len = (mb_strlen($string) > $maxlen) ? mb_strripos(mb_substr($string, 0, $maxlen), ' ') : $maxlen;
    $cutStr = mb_substr($string, 0, $len);
    return (mb_strlen($string) > $maxlen) ? '' . $cutStr . '...' : '' . $cutStr . '';
}

/**
 * Функция обрамляет данные в div с классом error
 * 
 * @param mixed $data - данные
 * @return string
 */
function error($data)
{
    echo '<div class="error">' . $data . '</div>';
}

/**
 * Функция обрамляет данные в div с классом alert
 * 
 * @param mixed $data - данные
 * @return string
 */
function alert($data)
{
    echo '<div class="alert">' . $data . '</div>';
}