<?php /* Smarty version Smarty 3.1.4, created on 2016-08-17 21:27:45
         compiled from "templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16025233985f353515-91381698%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20a5b87bf1d249a8e4b5bdf6dc560aa9c65c681a' => 
    array (
      0 => 'templates\\header.tpl',
      1 => 1471458463,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16025233985f353515-91381698',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5233985f3e943',
  'variables' => 
  array (
    'title' => 0,
    'lang' => 0,
    'adm_user_name' => 0,
    'lang_text' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5233985f3e943')) {function content_5233985f3e943($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <meta name="Author" content="UP Studio" />
    <link rel="icon" href="img/design/favicon.png"/>
    <link rel="stylesheet" type="text/css" href="css/upcms.css" />
    <script type="text/javascript">curLang = '<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
';</script>
    <script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.3.custom.css"  />
    <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <?php if ($_smarty_tpl->tpl_vars['lang']->value!='en'){?><script type="text/javascript" src="js/ui.datepicker-<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
.js"></script><?php }?>
    <link rel="stylesheet" type="text/css" href="css/formly.css"  />
    <script type="text/javascript" src="js/formly.js"></script>
    <link rel="stylesheet" type="text/css" href="css/data_table.css" />
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/dt.scripts.js"></script>
    <script type="text/javascript" src="libs/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="css/uploadify.css" />
    <script type="text/javascript" src="js/jquery.uploadify.js"></script>
    <link rel="stylesheet" type="text/css" href="css/upInputFile.css" />
    <script type="text/javascript" src="js/upInputFile.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
    <script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDl1UIgGQ6d_ubNRalPZqn4WA503_C3_eo&callback=initMap"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
</head>
<body>
<div id="wrapper">
    <?php if (isset($_SESSION['walert'])&&strlen($_SESSION['walert'])>0){?><div id="walert" class="ns-show"><img src="img/icons/walert.png" alt="" /><?php echo $_SESSION['walert'];?>
</div><?php }?>
    <div id="header">
        <div id="logo">
            <a href="/admin"><img src="img/design/upcms_logo_sm.png" alt="upcms logo" /></a>
        </div>
        <div id="user_block">
            <a href="?page=profile"><img src="img/icons/user.png" alt="" class="icon_sm" /> <?php echo $_smarty_tpl->tpl_vars['adm_user_name']->value;?>
</a>
            &nbsp;|&nbsp;
            <a href="?page=exit"><img src="img/icons/logout.png" alt="" class="icon_sm" /> <?php echo $_smarty_tpl->tpl_vars['lang_text']->value['mod_exit'];?>
</a>
        </div>
        <div class="clear"></div>
    </div>
    <div id="middle">
        <div id="container">
            <div id="content" class="lifted2"><?php }} ?>