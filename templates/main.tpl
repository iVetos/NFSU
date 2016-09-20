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

<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d640.9815225862424!2d36.3628215!3d50.0127405!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x412709c71e38270b%3A0x690719a548907aa4!2sSvitla+St%2C+15%2C+Kharkiv%2C+Kharkiv+Oblast!5e0!3m2!1sen!2sua!4v1462131401042" height="450" frameborder="0" style="width: 100%; border:0" allowfullscreen></iframe>
