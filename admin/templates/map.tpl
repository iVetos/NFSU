{* Показать все *}
{if $action == 'show'}
    {$page_name|adminTitle}
    {if !empty($some)}
        <a href="?page={$page_addr}&action=add&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>Добавить запись</a>
        <table class="dt_pages display">
            <thead>
            <tr>
                <th>ID</th>
                <th><b>Название</b></th>
                <th><b>Действия</b></th>
            </tr>
            </thead>
            <tbody>
            {foreach from=$some item=item}
                <tr class="odd gradeA">
                    <td style="width: 40px; text-align: center;">{$item.id}</td>
                    <td>{$item.name}</td>
                    <td style="width: 80px; text-align: center;">
                        <table class="events">
                            <tr>
                                <td>
                                    <a href="?page={$page_addr}&action=edit&id={$item.id}">
                                	<span class="icon_cont icon_cont_edit" title="Редактировать запись">
                                	</span>
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" onclick="confirmDelete('Удаление записи', 'Вы подтверждаете удаление записи?', '?page={$page_addr}&action=del&id={$item.id}');">
            						<span class="icon_cont icon_cont_del" title="Удалить запись">
            						</span>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    {else}
        {'Отделений пока нет'|error}
        <a href="?page={$page_addr}&action=add&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>Добавить запись</a>
    {/if}
{/if}

{* Добавление *}
{if $action == 'add'}
    {'<a href="?page=map">Отделения самбо</a> / Добавление записи'|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    {* AIzaSyDl1UIgGQ6d_ubNRalPZqn4WA503_C3_eo *}
    <script type="text/javascript" src="js/map.add.js"></script>
    <form action="?page={$page_addr}&action=add&id={$id}" method="post" class="formly" enctype="multipart/form-data">
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
{/if}

{* Редактирование записи *}
{if $action == 'edit'}
    {'<a href="?page=team">Наша команда</a> / Редактирование записи'|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Назад</a>
    <script>{literal}
        // Google map
        function initMap() {
            var mapDiv = document.getElementById('map');
            var marker;
            var map = new google.maps.Map(mapDiv, {
                zoom: 12,
                center: new google.maps.LatLng({/literal}{if !empty($some.map)}{$some.map}{else}49.99140828271529, 36.2303352355957{/if}{literal})
            });

            {/literal}{if !empty($some.map)}{literal}
            marker = new google.maps.Marker({
                position: new google.maps.LatLng({/literal}{$some.map}{literal}),
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                title: '',
                icon: '/admin/img/icons/map.png'
            });
            {/literal}{/if}{literal}

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
        }{/literal}
    </script>
    <form action="?page={$page_addr}&action=edit&id={$id}" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="Введите название" value="{$some.name|stripslashes}" maxlength="128" size="32" require="true" label="имя" />
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
                    <textarea name="text_s" rows="20" cols="60" class="ckeditor" placeholder="Введите текст записи">{$some.text_s}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Описание:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor" placeholder="Введите текст записи">{$some.text}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Введите метатег title">{$some.title}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Введите метатег description">{$some.description}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Введите метатег keywords">{$some.keywords}</textarea>
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
{/if}