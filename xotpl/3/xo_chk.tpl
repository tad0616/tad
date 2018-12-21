<div class="page-header">
    <h3><{$smarty.const._OXYGEN_CONFIG_CHECK}></h3>
</div>
<{if $theme_fromfile!=1}>
    <div class="alert alert-danger">
        <ul>
            <{if $theme_fromfile!=1}>
            <li><a href="<{$theme_url}>/tools.php?op=auto_templates"><{$smarty.const._OXYGEN_AUTO_TEMPLATES}></a></li>    
            <{/if}>
        </ul>
    </div>
<{else}>    
    <div class="alert alert-success">
        <{$smarty.const._OXYGEN_ALL_CONFIG_OK}>
    </div>
<{/if}>