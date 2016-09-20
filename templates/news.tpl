<div class="container content">
    <div id="addr">
        {$addr}
    </div>
    {if !$oneArticle}
    <h1>{$content.name}</h1>
    <div id="news" class="container">
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
    {else}
    <div class="one-article">
        <h1>{$article.name}</h1>
        <img src="/admin/img/news/{$article.cover}" alt="">
        {$article.text}
    </div>
    {/if}
</div>