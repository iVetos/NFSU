<div class="container content">
    <div id="addr">
        {$addr}
    </div>
    {if !$oneObject}
    <h1>{$content.name}</h1>
    <script>{literal}
        // Google map
        function initMap() {
            var mapDiv = document.getElementById('map');
            var marker;
            var infowindow;
            var map = new google.maps.Map(mapDiv, {
                zoom: 8,
                center: new google.maps.LatLng(49.85215166776999, 36.38946533203125)
            });

            {/literal}{if !empty($objects)}
            {foreach from=$objects item="object" name="objects"}
            {literal}

            marker{/literal}{$smarty.foreach.objects.iteration}{literal} = new google.maps.Marker({
                position: new google.maps.LatLng({/literal}{$object.map}{literal}),
                map: map,
                draggable: false,
                animation: google.maps.Animation.DROP,
                title: '{/literal}{$object.name}{literal}',
                icon: '/admin/img/icons/map.png'
            });

            marker{/literal}{$smarty.foreach.objects.iteration}{literal}.addListener('click', function() {
                infowindow = new google.maps.InfoWindow({
                    content: '<div class="map-object">' + $('#object{/literal}{$smarty.foreach.objects.iteration}{literal}').html() + '</div>'
                });
                infowindow.open(map, marker{/literal}{$smarty.foreach.objects.iteration}{literal});
            });
            {/literal}
            {/foreach}
            {/if}{literal}

        }{/literal}
    </script>
    <div id="map"></div>
    {foreach from=$objects item="object" name="objects"}
        <div id="object{$smarty.foreach.objects.iteration}" class="none">
            <h1>{$object.name}</h1>
            <img src="/admin/img/map/{$object.img}" alt="">
            {$object.text_s}
            <a href="/branches/{$object.id}">Подробнее</a>
        </div>
    {/foreach}
    {else}
    <script>{literal}
        // Google map
        function initMap() {
            var mapDiv = document.getElementById('map2');
            var marker;
            var map = new google.maps.Map(mapDiv, {
                zoom: 11,
                center: new google.maps.LatLng({/literal}{$object.map}{literal})
            });

            marker = new google.maps.Marker({
                position: new google.maps.LatLng({/literal}{$object.map}{literal}),
                map: map,
                draggable: false,
                animation: google.maps.Animation.DROP,
                title: '{/literal}{$object.name}{literal}',
                icon: '/admin/img/icons/map.png'
            });
        }{/literal}
    </script>
    <div class="one-object">
        <h1>{$object.name}</h1>
        <img src="/admin/img/map/{$object.img}" alt="">
        {$object.text}
    </div>
    <div class="clearfix"></div>
    <div id="map2"></div>
    {/if}
</div>