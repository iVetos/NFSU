<?php /* Smarty version Smarty 3.1.4, created on 2016-09-08 20:41:23
         compiled from "templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5943534d102e97b5d0-06718230%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20a5b87bf1d249a8e4b5bdf6dc560aa9c65c681a' => 
    array (
      0 => 'templates\\header.tpl',
      1 => 1473356480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5943534d102e97b5d0-06718230',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_534d102f26ac3',
  'variables' => 
  array (
    'title' => 0,
    'description' => 0,
    'keywords' => 0,
    'menu' => 0,
    'item' => 0,
    'url' => 0,
    'sub' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_534d102f26ac3')) {function content_534d102f26ac3($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['title']->value);?>
</title>
    <meta name="description" content="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['description']->value);?>
" />
    <?php if (strlen($_smarty_tpl->tpl_vars['keywords']->value)>0){?><meta name="keywords" content="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['keywords']->value);?>
" /><?php }?>
    <meta name="author" content="UP Studio" />
    <link rel="icon" href="/img/favicon.jpg"/>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]-->

    <link href="/masterslider/style/masterslider.css" rel="stylesheet" type="text/css">
    <link href="/masterslider/skins/default/style.css" rel="stylesheet" type="text/css">
    <link href="/masterslider/style/ms-staff-style.css" rel="stylesheet" type="text/css">
    <link href="/masterslider/style/ms-layers-style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                <span class="sr-only">Open menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand hidden-sm hidden-xs"><img src="/img/logo.png" alt=""></a>
            <a href="/" id="navbar-brand-text" class="navbar-brand visible-xs">Харкiвська обласна федерацiя<br> самбо НФСУ</a>
            <a href="/" id="navbar-brand-text2" class="navbar-brand hidden-md hidden-sm hidden-xs">Харкiвська обласна федерацiя<br> самбо НФСУ</a>
            <a href="/" id="navbar-brand-text" class="navbar-brand visible-sm"><img src="/img/logo2.png" alt=""></a>
        </div>
        <div class="collapse navbar-collapse pull-right" id="menu">
            <ul class="nav navbar-nav">
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['sub_count']<1){?>
                        <?php if ($_smarty_tpl->tpl_vars['url']->value['page']==$_smarty_tpl->tpl_vars['item']->value['link']||($_smarty_tpl->tpl_vars['item']->value['link']=="../"&&$_smarty_tpl->tpl_vars['url']->value['pageAddress']==null)){?>
                                <li><a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
" class="active"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></li>
                        <?php }else{ ?>
                            <li><a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></li>
                        <?php }?>
                    <?php }else{ ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
 <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <?php  $_smarty_tpl->tpl_vars["sub"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["sub"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["sub"]->key => $_smarty_tpl->tpl_vars["sub"]->value){
$_smarty_tpl->tpl_vars["sub"]->_loop = true;
?>
                                    <li><a href="/<?php echo $_smarty_tpl->tpl_vars['sub']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['sub']->value['name'];?>
</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php }?>
                <?php } ?>

            </ul>
        </div>
    </div>
</div><?php }} ?>