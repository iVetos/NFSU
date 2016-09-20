            </div>
        </div>
        {* Menu *}
        <div class="sidebar lifted" id="sideLeft">
            {*}<div id="tape"></div>{*}
            <ul id="menu">
                {foreach from=$menus item=menu}
                <li>
                {if isset($page)}
                {if $menu.link == $page}
                    {if $menu.link == 'orders'}
                        <a href="?page={$menu.link}" class="active_link"><span class="icon icon_{$menu.class}_active"></span>{$menu.title} {$newOrders}</a>
                    {else}
                        <a href="?page={$menu.link}" class="active_link"><span class="icon icon_{$menu.class}_active"></span>{$menu.title}</a>
                    {/if}
                {else}
                    {if $menu.link == 'orders'}
                        <a href="?page={$menu.link}"><span class="icon icon_{$menu.class}"></span>{$menu.title} {$newOrders}</a>
                    {else if $menu.link == 'to_site'}
                        <a href="../"><span class="icon icon_{$menu.class}"></span>{$menu.title}</a>
                    {else}
                        <a href="?page={$menu.link}"><span class="icon icon_{$menu.class}"></span>{$menu.title}</a>
                    {/if}
                {/if}
    			
                {/if}
                </li>
                {/foreach}
    		</ul>
        </div>
    </div>
    <div id="footer">
        &copy; <a href="http://up-studio.com.au" target="_blank">UPcms</a> 2010-{'Y'|date}
    </div>
</div>
<div class="overlay"></div>
<div class="window"></div>
</body>
</html>