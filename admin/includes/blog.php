<?php

/**
 * Blog
 * 
 * @package UPcms\Blog
 * @author UP Studio <info@up-studio.net>
 * @date 8/10/2015
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');
    
Up::checkPerm($page);

include_once (__DIR_CLASSES . 'class.blog.php');
include_once (__DIR_CLASSES . 'class.tags.php');
include_once (__DIR_CLASSES . 'class.image.php');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';
$id = (isset($_GET['id'])) ? Db::prepare($_GET['id']) : 0;

switch ($action)
{
    // All articles
    case 'show':
        $smarty->assign('title', $lang['mod_blog']);
        $smarty->assign('articles', Blog::show());
        break;
    
    // Add article
    case 'add':
        $smarty->assign('title', $lang['blog_add'] . ' - ' . $lang['mod_blog']);
        if (isset($_POST['name']))
        {
            $name = Db::prepareHtml($_POST['name']);
            $text = Db::prepare($_POST['text']);
            $text_s = Db::prepare($_POST['text_s']);
            $date = Db::prepare($_POST['date']);
            $link = Db::prepare($_POST['link']);
            $tags = (__CONST_BLOG_TAGS) ? Db::prepareHtml($_POST['tags']) . ',' : '';
            $title = Db::prepareHtml($_POST['title']);
            $description = Db::prepareHtml($_POST['description']);
            $keywords = Db::prepareHtml($_POST['keywords']);
            $img = '';
            
            // Check cover
            if(__CONST_BLOG_COVER)
            {
                if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['img']['name']))
                {
                    $img = Image::imageAdd('img', __CONST_BLOG_DIR);
                    Image::imageResize($img['full'], 'admin/' . __CONST_BLOG_DIR, __CONST_BLOG_COVER_WIDTH, __CONST_BLOG_COVER_HEIGHT, $img['name'], 1);
                    $img = $img['name_full'];
                }
            }
            
            // Add article to DB
            if (Blog::add($_SESSION['adm_user_id'], $name, $text_s, $text, $tags, $date, $link, $img, $title, $description, $keywords))
            {
                $id = Db::returnId();
                
                // Check tags
                if (__CONST_BLOG_TAGS)
                {
                    Tags::add($tags); // Add tags to DB
                }

                // Write "ok" to log file and alert message
                Log::write(100, __file__, 'Добавление статьи - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Статья успешно добавлена.';
            }
            else
            {
                // Write "error" to log file and alert message
                Log::write(101, __file__, 'Ошибка при добавлении статьи [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Произошла ошибка при добавлении статьи.';
            }
            redirect('../admin/?page=blog&action=show&id=' . $id . '');
        }
        else
        {
            $smarty->assign('tags', Tags::show());
        }
        break;
    
    // Edit article
    case 'edit':
        if (isset($_POST['name']))
        {
            $name = Db::prepareHtml($_POST['name']);
            $text = Db::prepare($_POST['text']);
            $text_s = Db::prepare($_POST['text_s']);
            $date = Db::prepare($_POST['date']);
            $addr = Db::prepare($_POST['addr']);
            $tags = (__CONST_BLOG_TAGS) ? Db::prepareHtml($_POST['tags']) . ',' : '';
            $title = Db::prepareHtml($_POST['title']);
            $description = Db::prepareHtml($_POST['description']);
            $keywords = Db::prepareHtml($_POST['keywords']);
            
            // Check cover
            if(__CONST_BLOG_COVER)
            {
                if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['img']['name']))
                {
                    // Deleting prev cover
                    $cover = Blog::returnCover($id);
                    if(!empty($cover))
                    {
                       Image::imageDel(__CONST_BLOG_DIR . $cover);
                    }

                    // Add new cover
                    $img = Image::imageAdd('img', __CONST_BLOG_DIR);
                    Image::imageResize($img['full'], 'admin/' . __CONST_BLOG_DIR, __CONST_BLOG_COVER_WIDTH, __CONST_BLOG_COVER_HEIGHT, $img['name'], 1);
                    $img = $img['name_full'];
                }
                else
                {
                    $img = Blog::returnCover($id);
                }
            }
            else
            {
                $img = Blog::returnCover($id);
            }
            
            // Editing article
            if (Blog::edit($id, $name, $text_s, $text, $tags, $date, $addr, $img, $title, $description, $keywords))
            {
                // Check tags
                if (__CONST_BLOG_TAGS)
                {
                    Tags::add($tags);
                }

                // Write "ok" to log file and alert message
                Log::write(100, __file__, 'Редактирование статьи - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Статья успешно отредактирована.';
            }
            else
            {
                // Write "error" to log file and alert message
                Log::write(101, __file__, 'Ошибка при редактировании статьи [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Произошла ошибка при редактировании статьи.';
            }
            redirect('../admin/?page=blog&action=show');
        }
        else
        {
            // Prepare data for edit
            $articles = Blog::returnOne($id);
            if (!empty($articles))
            {
                $articles['tags'] = substr($articles['tags'], 0, strlen($articles['tags']) - 1);
                $smarty->assign('articles', $articles);
                $smarty->assign('curTags', Tags::doTags($articles['tags']));
                $smarty->assign('tags', Tags::show());
            }
            else
            {
                redirect('../admin/?page=articles');
            }
        }
        break;
    
    // Delete article
    case 'del':
        $cover = Blog::returnCover($id);
        if (Blog::del($id))
        {
            // Delete cover
            if(!empty($cover))
            {
               Image::imageDel(__CONST_BLOG_DIR . $cover);
            }

            // Write "ok" to log file and alert message
            Log::write(100, __file__, 'Удаление статьи - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Статья успешно удалена.';
        }
        else
        {
            // Write "error" to log file and alert message
            Log::write(101, __file__, 'Ошибка при удалении статьи - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Произошла ошибка при удалении статьи.';
        }
        redirect('../admin/?page=blog&action=show');
        break;
}
$smarty->assign('id', $id);
$smarty->assign('action', $action);
$smarty->display('header.tpl');
$smarty->display('blog.tpl');