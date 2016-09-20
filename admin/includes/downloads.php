<?php
/**
 * File manager
 * @author UP Studio
 * @date 12.02.2013
 * @lastmodify 20.09.2013
 */

if(!defined('__CONST_INCLUDES')) exit('Access denied');

Up::checkPerm($page);

$uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/downloads/';
$action = isset($_GET['action']) ? $_GET['action'] : "";
if (isset($_POST['MAX_FILE_SIZE'])){
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    $uploadfile_name = basename($_FILES['userfile']['name']);
    $i = 1;
    while ( file_exists($uploadfile) ) {
        $uploadfile_name = '(' . $i . ')' . basename($_FILES['userfile']['name']);
        $uploadfile = $uploaddir . $uploadfile_name;
        $i++;
    }
    move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
    $do = 'Файл успешно добавлен';
} else {
    $do = 'Выберите файл для загрузки';
}

if (!empty($action)) {
    switch ($action) {
        case 'del':
            $file_del = trim($_GET['name']);
            $delfile = $uploaddir . $file_del;
            unlink($delfile);
            $do = 'Файл успешно удален';
            break;

        default:
            break;
    }
}

$files = scandir($uploaddir, 1);
$url = 'http://' . __SITE_ADDR;
$smarty->assign('do', $do);
$smarty->assign('url', $url);
$smarty->assign('files', $files);
$smarty->display('downloads.tpl');
?>
