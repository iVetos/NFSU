<?php /* Smarty version Smarty 3.1.4, created on 2016-09-08 20:26:46
         compiled from "templates\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21668534d102f3604e5-23071003%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6aae8c641d21506c83b2eef3095b796e7ec90482' => 
    array (
      0 => 'templates\\main.tpl',
      1 => 1473355605,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21668534d102f3604e5-23071003',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_534d102f36250',
  'variables' => 
  array (
    'sportsman' => 0,
    'sliders' => 0,
    'slider' => 0,
    'content' => 0,
    'news' => 0,
    'article' => 0,
    'trainers' => 0,
    'trainer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_534d102f36250')) {function content_534d102f36250($_smarty_tpl) {?><div class="ms-layers-template">
    <!-- masterslider -->
    <div class="master-slider ms-skin-default" id="masterslider">
        <div id="sportsman" class="hidden-sm hidden-xs">
            <div id="sportsman-image">
                <img src="/img/sportsmans/<?php echo $_smarty_tpl->tpl_vars['sportsman']->value['id'];?>
.png" alt=""/>
            </div>
            <div id="sportsman-text">
                <h1><?php echo $_smarty_tpl->tpl_vars['sportsman']->value['name'];?>
</h1>
                <p>
                    <?php echo $_smarty_tpl->tpl_vars['sportsman']->value['text'];?>

                </p>
            </div>
        </div>
        <?php  $_smarty_tpl->tpl_vars["slider"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["slider"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sliders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["slider"]->key => $_smarty_tpl->tpl_vars["slider"]->value){
$_smarty_tpl->tpl_vars["slider"]->_loop = true;
?>
            <div class="ms-slide slide-<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['slider']['iteration'];?>
" style="z-index: 11">
                <img src="/masterslider/style/blank.gif" data-src="/admin/img/sliders/<?php echo $_smarty_tpl->tpl_vars['slider']->value['name'];?>
" alt=""/>
            </div>
        <?php } ?>
    </div>
    <!-- end of masterslider -->
</div>



<div id="about">
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php echo $_smarty_tpl->tpl_vars['content']->value['text'];?>

        </div>
    </div>
</div>

<div id="news" class="container">
    <h2>Последние новости</h2>
    <?php  $_smarty_tpl->tpl_vars["article"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["article"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["article"]->key => $_smarty_tpl->tpl_vars["article"]->value){
$_smarty_tpl->tpl_vars["article"]->_loop = true;
?>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="thumbnail">
                <a href="/news/<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="news-title"><img src="/admin/img/news/<?php echo $_smarty_tpl->tpl_vars['article']->value['cover'];?>
" alt="" class="img-responsive"></a>
                <div class="caption">
                    <a href="/news/<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="news-title"><?php echo $_smarty_tpl->tpl_vars['article']->value['name'];?>
</a>
                    <?php echo $_smarty_tpl->tpl_vars['article']->value['text_s'];?>

                    <a href="/news/<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="btn article-btn pull-right">Подробнее <span class="glyphicon glyphicon-share-alt"></span></a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<div id="trainers">
    <div class="container">
        <h3>Тренерский состав</h3>
        <div class="ms-staff-carousel">
            <!-- masterslider -->
            <div class="master-slider" id="masterslider2">
                <?php  $_smarty_tpl->tpl_vars["trainer"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["trainer"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['trainers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["trainer"]->key => $_smarty_tpl->tpl_vars["trainer"]->value){
$_smarty_tpl->tpl_vars["trainer"]->_loop = true;
?>
                    <div class="ms-slide">
                        <img src="/masterslider/style/blank.gif" data-src="/admin/img/team/<?php echo $_smarty_tpl->tpl_vars['trainer']->value['img'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['trainer']->value['name'];?>
"/>
                        <div class="ms-info">
                            <h3><?php echo $_smarty_tpl->tpl_vars['trainer']->value['name'];?>
</h3>
                            <h4>Старший тренер клуба</h4>
                            <p class="email">Образование: высшее</p>
                            <p>Тренер высшей категории <br> Мастер Спорта Украины по самбо</p>
                            <ul class="ms-socials">
                                <li class="ms-ico-fb"><a href="#">facebook</a></li>
                                <li class="ms-ico-tw"><a href="#">twitter</a></li>
                                <li class="ms-ico-gp"><a href="#">google+</a></li>
                                <li class="ms-ico-yt"><a href="#">youtube</a></li>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- end of masterslider -->
            <div class="ms-staff-info" id="staff-info"> </div>
        </div>
    </div>
</div>

<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d640.9815225862424!2d36.3628215!3d50.0127405!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x412709c71e38270b%3A0x690719a548907aa4!2sSvitla+St%2C+15%2C+Kharkiv%2C+Kharkiv+Oblast!5e0!3m2!1sen!2sua!4v1462131401042" height="450" frameborder="0" style="width: 100%; border:0" allowfullscreen></iframe>
<?php }} ?>