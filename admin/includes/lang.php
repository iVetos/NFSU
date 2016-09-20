<?php
$lang = (isset($_GET['l'])) ? Db::prepare($_GET['l']) : 'en';
$_SESSION['lang'] = $lang;

switch($lang){
    case 'en':
        $_SESSION['walert'] = 'Language has been changed';
        break;
        
    case 'ua':
        $_SESSION['walert'] = 'Мова успішно змінена';
        break;
        
    case 'ru':
        $_SESSION['walert'] = 'Язык успешно изменён';
        break;
}

redirect('../admin/');
?>