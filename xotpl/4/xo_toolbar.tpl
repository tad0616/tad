<div id="tad_adm_toolbar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 visible-md visible-lg">
                <div class="tad_toolbar_head">
                    <{$modname}>
                </div>
            </div>
            <div class="col-sm-10 text-right">
                <{foreach item=op from=$mod_options}>
                    <a class="tooltip" href="<{$op.link}>" title="<{$op.title}>">
                        <img src='<{$op.icon}>' alt="<{$op.title}>" class="tad_toolbar_icon">
                    </a>
                <{/foreach}>

                <{if $moddir!='system' && $mod_options}>
                    <a class="tooltip" href="<{$xoops_url}>/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=<{$modid}>" title="<{$smarty.const._OXYGEN_SITEPREF}>">
                        <img src="<{$theme_icons}>/prefs.png" alt="<{$smarty.const._OXYGEN_SITEPREF}>" class="tad_toolbar_icon">
                    </a>
                <{/if}>
                <a class="tooltip" href="<{xoAppUrl modules/system/help.php}>" title="<{$smarty.const._AM_SYSTEM_HELP}>">
                    <img src='<{"$theme_icons/help.png"}>' class="tad_toolbar_icon">
                </a>
            </div>
        </div>
    </div>
</div>