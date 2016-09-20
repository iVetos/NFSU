<?php
/*
    $callback = $_GET['CKEditorFuncNum'];
    $dir = $_SERVER['DOCUMENT_ROOT'].'/admin/img/upload/';
    $full_path = $dir.$_FILES['upload']['name'];
    $http_path = '/img/upload/'.$_FILES['upload']['name'];
    $error = '';
    if(move_uploaded_file($_FILES['upload']['tmp_name'], $full_path) ) {
    } else {
        $error = $full_path;
        $http_path = '';
    }
    echo "<script type=\"text/javascript\">window.parent.CKEDITOR.tools.callFunction(".$callback.
    ",\"".$http_path."\", \"".$error."\" );</script>";
*/

    $callback = $_GET['CKEditorFuncNum'];
    $file_name = $_FILES['upload']['name'];
    $file_name_tmp = $_FILES['upload']['tmp_name'];
    $file_new_name = $_SERVER['DOCUMENT_ROOT'].'/admin/img/upload/';

    $full_path = $file_new_name.$file_name;
    $http_path = '../admin/img/upload/'.$file_name;
    $error = '';

    if( move_uploaded_file($file_name_tmp, $full_path) ) {

    } else {

     $error = 'Some error occured please try again later';

     $http_path = '';

    }

    echo "<script type=\"text/javascript\">window.parent.CKEDITOR.tools.callFunction(".$callback.",  \"".$http_path."\", \"".$error."\" );</script>";
?>