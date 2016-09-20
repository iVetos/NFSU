<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{$title|strip_tags}</title>
    <meta name="description" content="{$description|strip_tags}" />
    {if strlen($keywords) > 0}<meta name="keywords" content="{$keywords|strip_tags}" />{/if}
    <meta name="author" content="UP Studio" />
    <link rel="icon" href="/img/favicon.jpg"/>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]-->

    <link href="/masterslider/style/masterslider.css" rel="stylesheet" type="text/css">
    <link href="/masterslider/skins/default/style.css" rel="stylesheet" type="text/css">
    <link href="/masterslider/style/ms-staff-style.css" rel="stylesheet" type="text/css">
    <link href="/masterslider/style/ms-layers-style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                <span class="sr-only">Open menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand hidden-sm hidden-xs"><img src="/img/logo.png" alt=""></a>
            <a href="/" id="navbar-brand-text" class="navbar-brand visible-xs">{*<img src="/img/logo2.png" alt="">*}Харкiвська обласна федерацiя<br> самбо НФСУ</a>
            <a href="/" id="navbar-brand-text2" class="navbar-brand hidden-md hidden-sm hidden-xs">Харкiвська обласна федерацiя<br> самбо НФСУ</a>
            <a href="/" id="navbar-brand-text" class="navbar-brand visible-sm"><img src="/img/logo2.png" alt=""></a>
        </div>
        <div class="collapse navbar-collapse pull-right" id="menu">
            <ul class="nav navbar-nav">
                {foreach from=$menu item=item name="menu"}
                    {if $item.sub_count < 1}
                        {if $url.page == $item.link || ($item.link == "../" && $url.pageAddress == NULL)}
                            {*{if $item.sub > 0}
                                <li class="dropdown">
                                <a href="#" class="active dropdown-toggle" data-toggle="dropdown">{$item.name} <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    {foreach from=$menu_cats item="cat"}
                                        <li><a href="/gallery/{$cat.id}">{$cat.name}</a></li>
                                    {/foreach}
                                </ul>
                            </li>
                            {else}*}
                                <li><a href="/{$item.link}" class="active">{$item.name}</a></li>
                            {*{/if}*}
                        {else}
                            <li><a href="/{$item.link}">{$item.name}</a></li>
                        {/if}
                    {else}
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{$item.name} <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                {foreach from=$item.sub item="sub"}
                                    <li><a href="/{$sub.link}">{$sub.name}</a></li>
                                {/foreach}
                            </ul>
                        </li>
                    {/if}
                {/foreach}

            </ul>
        </div>
    </div>
</div>