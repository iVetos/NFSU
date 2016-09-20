<?php /* Smarty version Smarty 3.1.4, created on 2016-02-24 14:53:46
         compiled from "templates\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2344052339860d2fd62-37074747%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab7755c9dae14f847e3cac29631cc2ab39d09ffd' => 
    array (
      0 => 'templates\\footer.tpl',
      1 => 1456314750,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2344052339860d2fd62-37074747',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52339860df8ef',
  'variables' => 
  array (
    'menus' => 0,
    'page' => 0,
    'menu' => 0,
    'newOrders' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52339860df8ef')) {function content_52339860df8ef($_smarty_tpl) {?>            </div>
        </div>
        <div class="sidebar lifted" id="sideLeft">
            <ul id="menu">
                <?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value){
$_smarty_tpl->tpl_vars['menu']->_loop = true;
?>
                <li>
                <?php if (isset($_smarty_tpl->tpl_vars['page']->value)){?>
                <?php if ($_smarty_tpl->tpl_vars['menu']->value['link']==$_smarty_tpl->tpl_vars['page']->value){?>
                    <?php if ($_smarty_tpl->tpl_vars['menu']->value['link']=='orders'){?>
                        <a href="?page=<?php echo $_smarty_tpl->tpl_vars['menu']->value['link'];?>
" class="active_link"><span class="icon icon_<?php echo $_smarty_tpl->tpl_vars['menu']->value['class'];?>
_active"></span><?php echo $_smarty_tpl->tpl_vars['menu']->value['title'];?>
 <?php echo $_smarty_tpl->tpl_vars['newOrders']->value;?>
</a>
                    <?php }else{ ?>
                        <a href="?page=<?php echo $_smarty_tpl->tpl_vars['menu']->value['link'];?>
" class="active_link"><span class="icon icon_<?php echo $_smarty_tpl->tpl_vars['menu']->value['class'];?>
_active"></span><?php echo $_smarty_tpl->tpl_vars['menu']->value['title'];?>
</a>
                    <?php }?>
                <?php }else{ ?>
                    <?php if ($_smarty_tpl->tpl_vars['menu']->value['link']=='orders'){?>
                        <a href="?page=<?php echo $_smarty_tpl->tpl_vars['menu']->value['link'];?>
"><span class="icon icon_<?php echo $_smarty_tpl->tpl_vars['menu']->value['class'];?>
"></span><?php echo $_smarty_tpl->tpl_vars['menu']->value['title'];?>
 <?php echo $_smarty_tpl->tpl_vars['newOrders']->value;?>
</a>
                    <?php }elseif($_smarty_tpl->tpl_vars['menu']->value['link']=='to_site'){?>
                        <a href="../"><span class="icon icon_<?php echo $_smarty_tpl->tpl_vars['menu']->value['class'];?>
"></span><?php echo $_smarty_tpl->tpl_vars['menu']->value['title'];?>
</a>
                    <?php }else{ ?>
                        <a href="?page=<?php echo $_smarty_tpl->tpl_vars['menu']->value['link'];?>
"><span class="icon icon_<?php echo $_smarty_tpl->tpl_vars['menu']->value['class'];?>
"></span><?php echo $_smarty_tpl->tpl_vars['menu']->value['title'];?>
</a>
                    <?php }?>
                <?php }?>
    			
                <?php }?>
                </li>
                <?php } ?>
    		</ul>
        </div>
    </div>
    <div id="footer">
        &copy; <a href="http://up-studio.com.au" target="_blank">UPcms</a> 2010-<?php echo date('Y');?>

    </div>
</div>
<div class="overlay"></div>
<div class="window"></div>
</body>
</html><?php }} ?>