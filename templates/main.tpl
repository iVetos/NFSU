<div class="ms-layers-template">
    <!-- masterslider -->
    <div class="master-slider ms-skin-default" id="masterslider">
        <div id="sportsman" class="hidden-sm hidden-xs">
            <div id="sportsman-image">
                <img src="/img/sportsmans/{$sportsman.id}.png" alt=""/>
            </div>
            <div id="sportsman-text">
                <h1>{$sportsman.name}</h1>
                <p>
                    {$sportsman.text}
                </p>
            </div>
        </div>
        {foreach from=$sliders item="slider" name="sliders"}
            <div class="ms-slide slide-{$smarty.foreach.slider.iteration}" style="z-index: 11">
                <img src="/masterslider/style/blank.gif" data-src="/admin/img/sliders/{$slider.name}" alt=""/>
            </div>
        {/foreach}
    </div>
    <!-- end of masterslider -->
</div>



<div id="about">
    <div class="container">
        {*<h1>О нас</h1>*}
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            {$content.text}
        </div>
    </div>
</div>

<div id="news" class="container">
    <h2>Последние новости</h2>
    {foreach from=$news item="article" name="news"}
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="thumbnail">
                <a href="/news/{$article.id}" class="news-title"><img src="/admin/img/news/{$article.cover}" alt="" class="img-responsive"></a>
                <div class="caption">
                    <a href="/news/{$article.id}" class="news-title">{$article.name}</a>
                    {$article.text_s}
                    <a href="/news/{$article.id}" class="btn article-btn pull-right">Подробнее <span class="glyphicon glyphicon-share-alt"></span></a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    {/foreach}
</div>

<div id="trainers">
    <div class="container">
        <h3>Тренерский состав</h3>
        <div class="ms-staff-carousel">
            <!-- masterslider -->
            <div class="master-slider" id="masterslider2">
                {foreach from=$trainers item="trainer"}
                    <div class="ms-slide">
                        <img src="/masterslider/style/blank.gif" data-src="/admin/img/team/{$trainer.img}" alt="{$trainer.name}"/>
                        <div class="ms-info">
                            <h3>{$trainer.name}</h3>
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
                {/foreach}
            </div>
            <!-- end of masterslider -->
            <div class="ms-staff-info" id="staff-info"> </div>
        </div>
    </div>
</div>

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