<?php

/**
 * Check user permissions and build main menu 
 * 
 * @package UPcms\Menu
 * @author UP Studio <info@up-studio.net>
 * @date 7/05/2015
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

$menu_titles = array();  // Names
$menu_links = array();   // Links
$menu_classes = array(); // Icon style

$perm = Up::getPerm();

// Page and menu editors
if (__MOD_EDIT && $perm['pages'])
{
    $menu_titles[] = $lang['mod_pages'];
    $menu_titles[] = $lang['mod_menu'];
    $menu_links[] = 'pages';
    $menu_links[] = 'menu';
    $menu_classes[] = 'pages';
    $menu_classes[] = 'menu';
}
/*
// Articles
if (__MOD_ARTICLES && $perm['blog'])
{
    $menu_titles[] = $lang['mod_blog'];
    $menu_links[] = 'blog';
    $menu_classes[] = 'articles';
}*/

// News
if (__MOD_NEWS && $perm['news'])
{
    $menu_titles[] = $lang['mod_news'];
    $menu_links[] = 'news';
    $menu_classes[] = 'articles';
}

// Slider
if (__MOD_SLIDER && $perm['slider'])
{
    $menu_titles[] = $lang['mod_slider'];
    $menu_links[] = 'slider';
    $menu_classes[] = 'slider';
}

// Trainers
$menu_titles[] = 'Наша команда';
$menu_links[] = 'team';
$menu_classes[] = 'admins';

// Trainers
$menu_titles[] = 'Отделения самбо';
$menu_links[] = 'map';
$menu_classes[] = 'users';

// Галерея
if (__MOD_GALLERY && $perm['gallery'])
{
    $menu_titles[] = $lang['mod_gallery'];
    $menu_links[] = 'gallery';
    $menu_classes[] = 'img';
}

// Admins.
/*
if (__MOD_USERS && $perm['admins'])
{
    $menu_titles[] = $lang['mod_admins'];
    $menu_links[] = 'admins';
    $menu_classes[] = 'admins';
}*/

// My profile
$menu_titles[] = $lang['mod_profile'];
$menu_links[] = 'profile';
$menu_classes[] = 'profile';

// Link to site
$menu_titles[] = $lang['mod_to_site'];
$menu_links[] = 'to_site';
$menu_classes[] = 'home';

// Exit
$menu_titles[] = $lang['mod_exit'];
$menu_links[] = 'exit';
$menu_classes[] = 'exit';

// Creating menu
$menu = array();
for ($i = 0; $i < count($menu_titles); $i++)
{
    $menu[$i]['title'] = $menu_titles[$i];
    $menu[$i]['link']  = $menu_links[$i];
    $menu[$i]['class'] = $menu_classes[$i];
}

$smarty->assign('menus', $menu);
