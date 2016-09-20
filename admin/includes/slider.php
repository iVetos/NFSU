<?php

/**
 * Слайдер на главной
 * 
 * @package UPcms\Slider
 * @author UP Studio <info@up-studio.net>
 * @date 12.10.2014
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');
    
Up::checkPerm($page);

include_once (__DIR_CLASSES . 'class.image.php');
include_once (__DIR_CLASSES . 'class.slider.php');
$action = isset($_GET['action']) ? $_GET['action'] : 'show';
$id = (isset($_GET['id'])) ? Db::prepare($_GET['id']) : 0;

if (!empty($action))
{
    switch ($action)
    {
        case 'show':
            $smarty->assign('sliders', Slider::show());
            break;

        case 'add':
            if (isset($_POST['link']))
            {
                $link = Db::prepare($_POST['link']);
                
                // Загружаем изображение
                if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['img']['name']))
                {
                    $img = Image::imageAdd('img', __CONST_SLIDER_DIR);
                    Image::imageResize($img['full'], 'admin/' . __CONST_SLIDER_DIR, __CONST_IMG_SMALL_WIDTH, __CONST_IMG_SMALL_HEIGHT, 'small_' . $img['name'], 1);
                    Image::imageResize($img['full'], 'admin/' . __CONST_SLIDER_DIR, __CONST_SLIDER_WIDTH, __CONST_SLIDER_HEIGHT, $img['name'], 0);
                    $img = $img['name_full'];
                }
                
                if(Slider::add($img, $link))
                {
                    $id = Db::returnId();
                    Log::write(100, __file__, 'Добавление слайда - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                    $_SESSION['walert'] = 'Слайд успешно добавлен.';
                }
                else
                {
                    Log::write(101, __file__, 'Ошибка при добавлении слайда [' . $_SESSION['adm_user_name'] . ']');
                    $_SESSION['walert'] = 'Ошибка при добавлении слайда.';
                }
                redirect('?page=slider');
            }
            break;

        case 'edit':
            if (isset($_POST['link']))
            {
                $link = Db::prepare($_POST['link']);
                if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['img']['name']))
                {
                    // Удаление старого изображения
                    $slide = Slider::returnImg($id);
                    if(!empty($slide))
                    {
                       Image::imageDel(__CONST_SLIDER_DIR . $slide);
                       Image::imageDel(__CONST_SLIDER_DIR . 'small_' . $slide);
                    }
    
                    $img = Image::imageAdd('img', __CONST_SLIDER_DIR);
                    Image::imageResize($img['full'], 'admin/' . __CONST_SLIDER_DIR, __CONST_IMG_SMALL_WIDTH, __CONST_IMG_SMALL_HEIGHT, 'small_' . $img['name'], 1);
                    Image::imageResize($img['full'], 'admin/' . __CONST_SLIDER_DIR, __CONST_SLIDER_WIDTH, __CONST_SLIDER_HEIGHT, $img['name'], 0);
                    $img = $img['name_full'];
                }
                else
                {
                    $img = Slider::returnImg($id);
                }
                
                if(Slider::edit($id, $img, $link))
                {
                    $id = Db::returnId();
                    Log::write(100, __file__, 'Изменение слайда - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                    $_SESSION['walert'] = 'Слайд успешно изменён.';
                }
                else
                {
                    Log::write(101, __file__, 'Ошибка при изменении слайда - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                    $_SESSION['walert'] = 'Ошибка при изменении слайда.';
                }
                redirect('?page=slider');
            }
            else
            {
                $sql = "SELECT `name`, `link` FROM `sliders` WHERE `id` = $id";
                $slider = Db::doOne($sql);
                if ($slider)
                {
                    $smarty->assign('id', $id);
                    $smarty->assign('slider', $slider);
                }
                else
                {
                    redirect('?page=slider');
                }
            }
            break;

        case 'del':
            $slide = Slider::returnImg($id);
            if (Slider::del($id))
            {
                // Удаление изображения слайда
                if(!empty($slide))
                {
                   Image::imageDel(__CONST_SLIDER_DIR . $slide);
                   Image::imageDel(__CONST_SLIDER_DIR . 'small_' . $slide);
                }
                Log::write(100, __file__, 'Удаление слайда - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Слайд успешно удалён.';
            }
            else
            {
                Log::write(101, __file__, 'Ошибка при удалении слайда - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Произошла ошибка при удалении слайда.';
            }
            redirect('?page=slider');
            break;
    }
}

$smarty->assign('action', $action);
$smarty->display('header.tpl');
$smarty->display('slider.tpl');

?>