<?php
/**
 * Мультизагрузка
 * 
 * Мультизагрузка изображений. Позволяет загружать одновременно несколько файлов.
 * 
 * @package UPcms\Gallery\Uploadify
 * @author UP Studio <info@up-studio.net>
 * @date 2016-05-02
 */

if (!empty($_FILES) && isset($_POST['id_cat']))
{
    $id = $_POST['id_cat'];
    define('__CONST_INCLUDES', true);

    include_once ('../configs/const.inc.php');
    include_once ('../includes/functions.inc.php');
    include_once ('../classes/class.db.php');
    include_once ('../classes/class.image.php');
    include_once ('../classes/class.gallery.php');
    include_once ('../classes/class.log.php');
    Db::connect();

    $img = Image::imageAdd('Filedata', $_SERVER['DOCUMENT_ROOT'] . '/' . __CONST_GALLERY_DIR);
    Image::imageResize($img['full'], __CONST_GALLERY_DIR, __CONST_GALLERY_IMG_WIDTH, __CONST_GALLERY_IMG_HEIGHT, $img['name'] . '_small', 1);
    if (Gallery::addImg($id, $img['name_full']))
    {
        Log::write(100, __file__, 'Добавление фото в галерею');
    }
    else
    {
        Log::write(101, __file__, 'Ошибка при добавлении фото в галарею');
    }
}

?>