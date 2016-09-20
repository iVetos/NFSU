<?php /* Smarty version Smarty 3.1.4, created on 2016-09-01 19:06:17
         compiled from "templates\map.tpl" */ ?>
<?php /*%%SmartyHeaderCode:923657b4993468b1f3-37773637%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a941cf2dec67de8d6e8cdbcc5ed7f1554bcebb6' => 
    array (
      0 => 'templates\\map.tpl',
      1 => 1472745975,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '923657b4993468b1f3-37773637',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_57b499348b1bf',
  'variables' => 
  array (
    'action' => 0,
    'page_name' => 0,
    'some' => 0,
    'page_addr' => 0,
    'id' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b499348b1bf')) {function content_57b499348b1bf($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='show'){?>
    <?php echo adminTitle($_smarty_tpl->tpl_vars['page_name']->value);?>

    <?php if (!empty($_smarty_tpl->tpl_vars['some']->value)){?>
        <a href="?page=<?php echo $_smarty_tpl->tpl_vars['page_addr']->value;?>
&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/>Добавить запись</a>
        <table class="dt_pages display">
            <thead>
            <tr>
                <th>ID</th>
                <th><b>Название</b></th>
                <th><b>Действия</b></th>
            </tr>
            </thead>
            <tbody>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['some']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <tr class="odd gradeA">
                    <td style="width: 40px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
                    <td style="width: 80px; text-align: center;">
                        <table class="events">
                            <tr>
                                <td>
                                    <a href="?page=<?php echo $_smarty_tpl->tpl_vars['page_addr']->value;?>
&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                	<span class="icon_cont icon_cont_edit" title="Редактировать запись">
                                	</span>
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" onclick="confirmDelete('Удаление записи', 'Вы подтверждаете удаление записи?', '?page=<?php echo $_smarty_tpl->tpl_vars['page_addr']->value;?>
&action=del&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');">
            						<span class="icon_cont icon_cont_del" title="Удалить запись">
            						</span>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php }else{ ?>
        <?php echo error('Отделений пока нет');?>

        <a href="?page=<?php echo $_smarty_tpl->tpl_vars['page_addr']->value;?>
&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/>Добавить запись</a>
    <?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='add'){?>
    <?php echo adminTitle('<a href="?page=map">Отделения самбо</a> / Добавление записи');?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <script type="text/javascript" src="js/map.add.js"></script>
    <form action="?page=<?php echo $_smarty_tpl->tpl_vars['page_addr']->value;?>
&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название" maxlength="128" size="32" require="true" label="имя" />
                </td>
            </tr>
            <tr>
                <td>
                    Место на карте:
                </td>
                <td>
                    <input id="map-coords" type="hidden" name="map" placeholder="Нажмите на место на карте" maxlength="128" size="32"/>
                    <div id="map"></div>
                </td>
            </tr>
            <tr>
                <td>
                    Изображение:
                </td>
                <td>
                    <input type="file" name="img" />&nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    Краткое описание:
                </td>
                <td>
                    <textarea name="text_s" rows="20" cols="60" class="ckeditor" placeholder="Введите текст записи"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Описание:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor" placeholder="Введите текст записи"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Введите метатег title"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Введите метатег description"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Введите метатег keywords"></textarea>
                </td>
            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <input type="submit" value="Добавить" class="button" />
                </td>
            </tr>
        </table>
    </form>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='edit'){?>
    <?php echo adminTitle('<a href="?page=team">Наша команда</a> / Редактирование записи');?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <script>
        // Google map
        function initMap() {
            var mapDiv = document.getElementById('map');
            var marker;
            var map = new google.maps.Map(mapDiv, {
                zoom: 12,
                center: new google.maps.LatLng(<?php if (!empty($_smarty_tpl->tpl_vars['some']->value['map'])){?><?php echo $_smarty_tpl->tpl_vars['some']->value['map'];?>
<?php }else{ ?>49.99140828271529, 36.2303352355957<?php }?>)
            });

            <?php if (!empty($_smarty_tpl->tpl_vars['some']->value['map'])){?>
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(<?php echo $_smarty_tpl->tpl_vars['some']->value['map'];?>
),
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                title: '',
                icon: '/admin/img/icons/map.png'
            });
            <?php }?>

            // We add a DOM event here to show an alert if the DIV containing the
            // map is clicked.
            /*google.maps.event.addDomListener(mapDiv, 'click', function() {

             alert('Map was clicked!');
             });*/

            google.maps.event.addListener(map, "click", function(event) {
                var lat = event.latLng.lat();
                var lng = event.latLng.lng();

                var coords = lat + ', ' + lng;
                $('#map-coords').val(coords);

                if(typeof marker != 'undefined'){
                    marker.setMap(null);
                }

                var myLatLng = {lat: lat, lng: lng};
                marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                    title: '',
                    icon: '/admin/img/icons/map.png'
                });

                google.maps.event.addListener(marker, 'dragend', function(){
                    lat = marker.getPosition().lat();
                    lng = marker.getPosition().lng();
                    $('#map-coords').val(lat + ', ' + lng);
                });
            });
        }
    </script>
    <form action="?page=<?php echo $_smarty_tpl->tpl_vars['page_addr']->value;?>
&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="Введите название" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['some']->value['name']);?>
" maxlength="128" size="32" require="true" label="имя" />
                </td>
            </tr>
            <tr>
                <td>
                    Место на карте:
                </td>
                <td>
                    <input id="map-coords" type="hidden" name="map" placeholder="Нажмите на место на карте" maxlength="128" size="32"/>
                    <div id="map"></div>
                </td>
            </tr>
            <tr>
                <td>
                    Изображение:
                </td>
                <td>
                    <input type="file" name="img" />&nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    Краткое описание:
                </td>
                <td>
                    <textarea name="text_s" rows="20" cols="60" class="ckeditor" placeholder="Введите текст записи"><?php echo $_smarty_tpl->tpl_vars['some']->value['text_s'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Описание:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor" placeholder="Введите текст записи"><?php echo $_smarty_tpl->tpl_vars['some']->value['text'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Введите метатег title"><?php echo $_smarty_tpl->tpl_vars['some']->value['title'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Введите метатег description"><?php echo $_smarty_tpl->tpl_vars['some']->value['description'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Введите метатег keywords"><?php echo $_smarty_tpl->tpl_vars['some']->value['keywords'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <input type="submit" value="Изменить" class="button" />
                </td>
            </tr>
        </table>
    </form>
<?php }?><?php }} ?>