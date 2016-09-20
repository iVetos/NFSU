<?php

/**
 * Новости
 * 
 * @package UPcms\News
 * @author UP Studio <info@up-studio.net>
 * @date 2016-05-02
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');
    
Up::checkPerm($page);

include_once (__DIR_CLASSES . 'class.news.php');
include_once (__DIR_CLASSES . 'class.tags.php');
include_once (__DIR_CLASSES . 'class.image.php');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';
$id = (isset($_GET['id'])) ? Db::prepare($_GET['id']) : 0;

switch ($action)
{
    // Отобразить все новости
    case 'show':
        $smarty->assign('news', News::show());
        break;
    
    // Добавить новость
    case 'add':
        if (isset($_POST['name']))
        {
            $name = Db::prepareHtml($_POST['name']);
            $text = Db::prepare($_POST['text']);
            $text_s = Db::prepare($_POST['text_s']);
            $date = Db::prepare($_POST['date']);
            $addr = Db::prepare($_POST['addr']);
            $tags = (__CONST_NEWS_TAGS) ? Db::prepareHtml($_POST['tags']) . ',' : '';
            $title = Db::prepareHtml($_POST['title']);
            $description = Db::prepareHtml($_POST['description']);
            $keywords = Db::prepareHtml($_POST['keywords']);
            $img = '';
            
            // Установлена ли обложка
            if(__CONST_NEWS_COVER)
            {
                if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['img']['name']))
                {
                    $img = Image::imageAdd('img', __CONST_NEWS_DIR);
                    Image::imageResize($img['full'], 'admin/' . __CONST_NEWS_DIR, __CONST_NEWS_COVER_WIDTH, __CONST_NEWS_COVER_HEIGHT, $img['name'], 0);
                    $img = $img['name_full'];
                }
            }
            
            // Добавляем новость
            if (News::add($_SESSION['adm_user_id'], $name, $text_s, $text, $tags, $date, $addr, $img, $title, $description, $keywords))
            {
                $id = Db::returnId();
                
                // Установлены ли теги
                if (__CONST_NEWS_TAGS) 
                {
                    Tags::add($tags); // Добавляем теги в БД
                }
                Log::write(100, __file__, 'Добавление новости - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Новость успешно добавлена.';
            }
            else
            {
                Log::write(101, __file__, 'Ошибка при добавлении новости [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Произошла ошибка при добавлении новости.';
            }
            redirect('../admin/?page=news&action=show&id=' . $id . '');
        }
        else
        {
            $smarty->assign('tags', Tags::show());
        }
        break;
    
    // Редактирование новости
    case 'edit':
        if (isset($_POST['name']))
        {
            $name = Db::prepareHtml($_POST['name']);
            $text = Db::prepare($_POST['text']);
            $text_s = Db::prepare($_POST['text_s']);
            $date = Db::prepare($_POST['date']);
            $addr = Db::prepare($_POST['addr']);
            $tags = (__CONST_NEWS_TAGS) ? Db::prepareHtml($_POST['tags']) . ',' : '';
            $title = Db::prepareHtml($_POST['title']);
            $description = Db::prepareHtml($_POST['description']);
            $keywords = Db::prepareHtml($_POST['keywords']);
            
            // Установлена ли обложка
            if(__CONST_NEWS_COVER)
            {
                if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['img']['name']))
                {
                    // Удаление старой обложки
                    $cover = News::returnCover($id);
                    if(!empty($cover))
                    {
                       Image::imageDel(__CONST_NEWS_DIR . $cover); 
                    }
    
                    $img = Image::imageAdd('img', __CONST_NEWS_DIR);
                    Image::imageResize($img['full'], 'admin/' . __CONST_NEWS_DIR, __CONST_NEWS_COVER_WIDTH, __CONST_NEWS_COVER_HEIGHT, $img['name'], 0);
                    $img = $img['name_full'];
                }
                else
                {
                    $img = News::returnCover($id);
                }
            }
            else
            {
                $img = News::returnCover($id);
            }
            
            // Редактируем новость
            if (News::edit($id, $name, $text_s, $text, $tags, $date, $addr, $img, $title, $description, $keywords))
            {
                // Установлены ли теги
                if (__CONST_NEWS_TAGS)
                {
                    Tags::add($tags);
                }
                Log::write(100, __file__, 'Редактирование новости - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Новость успешно отредактирована.';
            }
            else
            {
                Log::write(101, __file__, 'Ошибка при редактировании новости [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Произошла ошибка при редактировании новости.';
            }
            redirect('../admin/?page=news&action=show');
        }
        else
        {
            // Подготавливаем данные для редактирования
            $news = News::returnOne($id);
            if (!empty($news))
            {
                $news['tags'] = substr($news['tags'], 0, strlen($news['tags']) - 1);
                $smarty->assign('news', $news);
                $smarty->assign('curTags', Tags::doTags($news['tags']));
                $smarty->assign('tags', Tags::show());
            }
            else
            {
                redirect('../admin/?page=news');
            }
        }
        break;
    
    // Удаление новости
    case 'del':
        $cover = News::returnCover($id);
        if (News::del($id))
        {
            // Удаление обложки
            if(!empty($cover))
            {
               Image::imageDel(__CONST_NEWS_DIR . $cover); 
            }
            Log::write(100, __file__, 'Удаление новости - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Новость успешно удалена.';
        }
        else
        {
            Log::write(101, __file__, 'Ошибка при удалении новости - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Произошла ошибка при удалении новости.';
        }
        redirect('../admin/?page=news&action=show');
        break;
}
$smarty->assign('id', $id);
$smarty->assign('action', $action);
$smarty->display('header.tpl');
$smarty->display('news.tpl');