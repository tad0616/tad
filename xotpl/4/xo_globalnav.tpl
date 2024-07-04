<!-- SmartMenus jQuery init -->
<script type="text/javascript">
    // SmartMenus init
    $(function() {
        $('#main-menu').smartmenus();
    });
</script>

<nav class="main-nav" role="navigation">
    <!-- Mobile menu toggle button (hamburger/x icon) -->
    <input id="main-menu-state" type="checkbox">
    <label class="main-menu-btn" for="main-menu-state">
        <span class="main-menu-btn-icon"></span> Toggle main menu visibility
    </label>

    <!-- Sample menu definition -->
    <ul id="main-menu" class="sm sm-blue">
        <{foreach item=item from=$navitems}>
            <li>
                <{if $item.menu}>
                    <a href="<{$item.link}>" title="<{$item.text}>"><{$item.text}></a>
                    <ul>
                        <{foreach item=sub from=$item.menu}>
                            <li>
                            <{if $sub.options != 0}>
                                <a href="<{$sub.link}>" title="<{$sub.title}>"><{$sub.title}></a>
                                <ul>
                                <{foreach item=option from=$sub.options}>
                                    <li><a href="<{$sub.url}><{$option.link}>"><{$option.title}></a></li>
                                <{/foreach}>
                                </ul>
                            <{else}>
                                <a href="<{$sub.link}>" title="<{$sub.title}>"><{$sub.title}></a>
                            <{/if}>
                            </li>
                        <{/foreach}>
                    </ul>
                <{else}>
                    <a href="<{$item.link}>"><{$item.text}></a>
                <{/if}>
            </li>
        <{/foreach}>
    </ul>
</nav>
