<?php

/**
 * Константы
 * @package UPcms\Constants
 * @author UP Studio <info@up-studio.net>
 * @date 12.08.2014
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

// Версия
define('__VERSION', '2.3');

// База данных
define('__DB_HOST', 'localhost');
define('__DB_USER', 'root');
define('__DB_PASS', '');
define('__DB_NAME', 'nfsu');

// Язык
define('__DEF_LANG', 'ru');

// Папки
define('__DIR_CLASSES', 'classes/');
define('__DIR_INCLUDES', 'includes/');
define('__DIR_LANG', 'lang/');
define('__DIR_LOGS', 'logs/');

// Метатеги
define('__SITE_TITLE', 'UPcms | Система управления сайтом');
define('__SITE_DESCRIPTION', 'UPcms - Система управления сайтом');
define('__SITE_KEYWORDS', 'UPcms, UP Studio, Система управления сайтом');

// Информация
define('__SITE_NAME', 'UPcms');              // Название проекта
define('__SITE_COMPANY', 'UP Studio');       // Название компании
define('__SITE_ADDR', 'cms.up-studio.net');  // Адрес для справки
define('__ORDER_MAIL', 'cms@up-studio.net'); // Почта для справки

// Модули
define('__MOD_EDIT', 1);        // Редактор меню и страниц
define('__MOD_ARTICLES', 1);    // Статьи
define('__MOD_NEWS', 1);        // Новости
define('__MOD_USERS', 1);       // Редактирование пользователей и их прав
define('__MOD_SLIDER', 1);      // Слайдер
define('__MOD_GALLERY', 0);     // Галерея
define('__MOD_OPTIONS', 0);     // Настройки
define('__MOD_ADMIN', 0);       // Администрирование

/**
 * Переменные
 */
// Все изображения
define('__CONST_IMG_WIDTH', 768);
define('__CONST_IMG_HEIGHT', 768);
define('__CONST_IMG_SMALL_WIDTH', 240);
define('__CONST_IMG_SMALL_HEIGHT', 190);

// Галерея
define('__CONST_GALLERY_DIR', 'admin/img/gallery/'); // Путь папке галереи
define('__CONST_GALLERY_IMG_WIDTH', 240);            // Ширина миниатюры
define('__CONST_GALLERY_IMG_HEIGHT', 190);           // Высота миниатюры
define('__CONST_GALLERY_COVER_WIDTH', 500);          // Ширина обложки
define('__CONST_GALLERY_COVER_HEIGHT', 400);         // Высота обложки

// Новости
define('__CONST_NEWS_DIR', 'img/news/');  // Папка для изображений
define('__CONST_NEWS_COVER', 1);          // Обложка
define('__CONST_NEWS_TAGS', 0);           // Теги
define('__CONST_NEWS_COVER_WIDTH', 350);  // Ширина обложки
define('__CONST_NEWS_COVER_HEIGHT', 350); // Высота обложки

// Статьи
define('__CONST_ARTICLES_DIR', 'img/articles/'); // Папка для изображений
define('__CONST_ARTICLES_COVER', 1);             // Обложка
define('__CONST_ARTICLES_TAGS', 0);              // Теги
define('__CONST_ARTICLES_COVER_WIDTH', 550);     // Ширина обложки
define('__CONST_ARTICLES_COVER_HEIGHT', 550);    // Высота обложки

// Слайдер
define('__CONST_SLIDER_DIR', 'img/sliders/');
define('__CONST_SLIDER_WIDTH', 1920);
define('__CONST_SLIDER_HEIGHT', 580);