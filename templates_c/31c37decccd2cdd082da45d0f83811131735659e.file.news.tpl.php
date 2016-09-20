<?php /* Smarty version Smarty 3.1.4, created on 2016-09-08 19:31:38
         compiled from "templates\news.tpl" */ ?>
<?php /*%%SmartyHeaderCode:943557d18faf869477-07056419%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31c37decccd2cdd082da45d0f83811131735659e' => 
    array (
      0 => 'templates\\news.tpl',
      1 => 1473352297,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '943557d18faf869477-07056419',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_57d18faf959b9',
  'variables' => 
  array (
    'addr' => 0,
    'oneArticle' => 0,
    'content' => 0,
    'news' => 0,
    'article' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57d18faf959b9')) {function content_57d18faf959b9($_smarty_tpl) {?><div class="container content">
    <div id="addr">
        <?php echo $_smarty_tpl->tpl_vars['addr']->value;?>

    </div>
    <?php if (!$_smarty_tpl->tpl_vars['oneArticle']->value){?>
    <h1><?php echo $_smarty_tpl->tpl_vars['content']->value['name'];?>
</h1>
    <div id="news" class="container">
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
    <?php }else{ ?>
    <div class="one-article">
        <h1><?php echo $_smarty_tpl->tpl_vars['article']->value['name'];?>
</h1>
        <img src="/admin/img/news/<?php echo $_smarty_tpl->tpl_vars['article']->value['cover'];?>
" alt="">
        <?php echo $_smarty_tpl->tpl_vars['article']->value['text'];?>

    </div>
    <?php }?>
</div><?php }} ?>