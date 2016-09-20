<?php

/**
 * Галерея
 * 
 * @package UPcms\Pages
 * @author UP Studio <info@up-studio.net>
 * @date 24.03.2014
 * @todo Удаление обложки
 * @todo Использование миниатюр
 * @todo Редактирование порядка
 */

if (!defined('__CONST_INCLUDES')) exit('Access denied');

Up::checkPerm($page);

include_once (__DIR_CLASSES . 'class.image.php');
include_once (__DIR_CLASSES . 'class.gallery.php');

$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';
$id = (isset($_GET['id'])) ? Db::prepare($_GET['id']) : 0;

switch ($action)
{
    case 'show':
        $smarty->assign('gallery', Gallery::show());
        break;

    case 'add':
        if (isset($_POST['name']) && isset($_POST['text']))
        {
            $name = Db::prepare($_POST['name']);
            $text = Db::prepare($_POST['text']);
            $date = Db::prepare($_POST['date']);
            $img = null;
            if (isset($_FILES) && !empty($_FILES))
            {
                $img = Image::imageAdd('cover', 'img/gallery/');
                Image::imageResize($img['full'], 'admin/img/gallery/', __CONST_GALLERY_COVER_WIDTH, __CONST_GALLERY_COVER_HEIGHT, $img['name'], 1);
                $img = $img['name_full'];
            }

            if (Gallery::add($name, $text, $date, $img))
            {
                Log::write(100, __file__, 'Добавление галереи [' . $_SESSION['adm_user_name'] . ']');
            }
            else
            {
                Log::write(101, __file__, 'Ошибка при добавлении галереи [' . $_SESSION['adm_user_name'] . ']');
            }
            redirect('../admin/?page=gallery&action=show');
        }
        break;

    case 'more':
        
        $smarty->assign('name_cat', Gallery::returnNameCat($id)); // Название галереи
        $images = Gallery::more($id);
        $gallery = array();
        for($i = 0; $i < count($images); $i++)
        {
            $gallery['photos'][$i]['id'] = $images[$i]['id'];
            $gallery['photos'][$i]['name'] = $images[$i]['name'];
            $img_name = explode('.', $images[$i]['name']);
            $gallery['photos'][$i]['small'] = $img_name[0] . '_small.' . $img_name[1];
        }
        $smarty->assign('gallery', $gallery);
        break;

    case 'edit':
        if (isset($_POST['name']) && isset($_POST['text']))
        {
            $name = Db::prepare($_POST['name']);
            $text = Db::prepare($_POST['text']);
            $date = Db::prepare($_POST['date']);
            $img = null;
            if (isset($_FILES) && !empty($_FILES))
            {
                // Удаление старой обложки
                $cover = Gallery::returnCover($id);
                Image::imageDel('img/gallery/'.$cover);
                
                $img = Image::imageAdd('cover', 'img/gallery/');
                Image::imageResize($img['full'], 'admin/img/gallery/', __CONST_GALLERY_COVER_WIDTH, __CONST_GALLERY_COVER_HEIGHT, $img['name'], 1);
                $img = $img['name_full'];
            }

            if (Gallery::edit($id, $name, $text, $date, $img))
            {
                Log::write(100, __file__, 'Редактирование галереи [' . $_SESSION['adm_user_name'] . ']');
            }
            else
            {
                Log::write(101, __file__, 'Ошибка при редактировании галереи [' . $_SESSION['adm_user_name'] . ']');
            }
            redirect('../admin/?page=gallery&action=show');
        }
        else
        {
            $smarty->assign('gallery', Gallery::show($id));
        }
        break;
    
    case 'del':
        if (Gallery::del($id))
        {
            Log::write(100, __file__, 'Удаление галереи [' . $_SESSION['adm_user_name'] . ']');
        }
        else
        {
            Log::write(101, __file__, 'Ошибка при удалении галереи [' . $_SESSION['adm_user_name'] . ']');
        }
        redirect('../admin/?page=gallery&action=show');
        break;
        
    case 'sort':
        if(isset($_GET['data'])){
            $data = explode(',', str_replace('id-', '', Db::prepare($_GET['data'])));
            for($i = 0; $i < count($data); $i++){
                $sql = "UPDATE `gallery_photo` SET `sort` = " . ($i + 1) . " WHERE `id` = ".$data[$i];
                if (Db::exec($sql))
                {
                    Log::write(100, __file__, 'Сортировка фото в галерее [' . $_SESSION['adm_user_name'] . ']');
                }
                else
                {
                    Log::write(101, __file__, 'Ошибка при сортировке фото в галарее [' . $_SESSION['adm_user_name'] . ']');
                }
            }
        }
        break;

    case 'addimg':
        $smarty->assign('name_cat', Gallery::returnNameCat($id));
        break;

    case 'delimg':
        $idimg = Db::prepare($_GET['idimg']);
        $name_img = Gallery::returnNameImg($idimg);
        if (Gallery::delImg($idimg, $id))
        {
            Log::write(100, __file__, 'Удаление фото в галерее [' . $_SESSION['adm_user_name'] . ']');
        }
        else
        {
            Log::write(101, __file__, 'Ошибка при удалении фото в галарее [' . $_SESSION['adm_user_name'] . ']');
        }
        unlink("img/gallery/{$name_img}");
        redirect('../admin/?page=gallery&action=more&id=' . $id);
        break;
}
$smarty->assign('id', $id);
$smarty->assign('action', $action);
$smarty->display('header.tpl');
$smarty->display('gallery.tpl');

?>