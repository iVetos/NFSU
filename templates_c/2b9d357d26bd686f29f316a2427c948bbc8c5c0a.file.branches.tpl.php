<?php /* Smarty version Smarty 3.1.4, created on 2016-09-08 20:04:15
         compiled from "templates\branches.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2315357d1513e66b768-53812763%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b9d357d26bd686f29f316a2427c948bbc8c5c0a' => 
    array (
      0 => 'templates\\branches.tpl',
      1 => 1473354254,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2315357d1513e66b768-53812763',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_57d1513e6a653',
  'variables' => 
  array (
    'addr' => 0,
    'oneObject' => 0,
    'content' => 0,
    'objects' => 0,
    'object' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57d1513e6a653')) {function content_57d1513e6a653($_smarty_tpl) {?><div class="container content">
    <div id="addr">
        <?php echo $_smarty_tpl->tpl_vars['addr']->value;?>

    </div>
    <?php if (!$_smarty_tpl->tpl_vars['oneObject']->value){?>
    <h1><?php echo $_smarty_tpl->tpl_vars['content']->value['name'];?>
</h1>
    <script>
        // Google map
        function initMap() {
            var mapDiv = document.getElementById('map');
            var marker;
            var infowindow;
            var map = new google.maps.Map(mapDiv, {
                zoom: 8,
                center: new google.maps.LatLng(49.85215166776999, 36.38946533203125)
            });

            <?php if (!empty($_smarty_tpl->tpl_vars['objects']->value)){?>
            <?php  $_smarty_tpl->tpl_vars["object"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["object"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['objects']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["objects"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["object"]->key => $_smarty_tpl->tpl_vars["object"]->value){
$_smarty_tpl->tpl_vars["object"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["objects"]['iteration']++;
?>
            

            marker<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['objects']['iteration'];?>
 = new google.maps.Marker({
                position: new google.maps.LatLng(<?php echo $_smarty_tpl->tpl_vars['object']->value['map'];?>
),
                map: map,
                draggable: false,
                animation: google.maps.Animation.DROP,
                title: '<?php echo $_smarty_tpl->tpl_vars['object']->value['name'];?>
',
                icon: '/admin/img/icons/map.png'
            });

            marker<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['objects']['iteration'];?>
.addListener('click', function() {
                infowindow = new google.maps.InfoWindow({
                    content: '<div class="map-object">' + $('#object<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['objects']['iteration'];?>
').html() + '</div>'
                });
                infowindow.open(map, marker<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['objects']['iteration'];?>
);
            });
            
            <?php } ?>
            <?php }?>

        }
    </script>
    <div id="map"></div>
    <?php  $_smarty_tpl->tpl_vars["object"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["object"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['objects']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["objects"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["object"]->key => $_smarty_tpl->tpl_vars["object"]->value){
$_smarty_tpl->tpl_vars["object"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["objects"]['iteration']++;
?>
        <div id="object<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['objects']['iteration'];?>
" class="none">
            <h1><?php echo $_smarty_tpl->tpl_vars['object']->value['name'];?>
</h1>
            <img src="/admin/img/map/<?php echo $_smarty_tpl->tpl_vars['object']->value['img'];?>
" alt="">
            <?php echo $_smarty_tpl->tpl_vars['object']->value['text_s'];?>

            <a href="/branches/<?php echo $_smarty_tpl->tpl_vars['object']->value['id'];?>
">Подробнее</a>
        </div>
    <?php } ?>
    <?php }else{ ?>
    <script>
        // Google map
        function initMap() {
            var mapDiv = document.getElementById('map2');
            var marker;
            var map = new google.maps.Map(mapDiv, {
                zoom: 11,
                center: new google.maps.LatLng(<?php echo $_smarty_tpl->tpl_vars['object']->value['map'];?>
)
            });

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(<?php echo $_smarty_tpl->tpl_vars['object']->value['map'];?>
),
                map: map,
                draggable: false,
                animation: google.maps.Animation.DROP,
                title: '<?php echo $_smarty_tpl->tpl_vars['object']->value['name'];?>
',
                icon: '/admin/img/icons/map.png'
            });
        }
    </script>
    <div class="one-object">
        <h1><?php echo $_smarty_tpl->tpl_vars['object']->value['name'];?>
</h1>
        <img src="/admin/img/map/<?php echo $_smarty_tpl->tpl_vars['object']->value['img'];?>
" alt="">
        <?php echo $_smarty_tpl->tpl_vars['object']->value['text'];?>

    </div>
    <div class="clearfix"></div>
    <div id="map2"></div>
    <?php }?>
</div><?php }} ?>