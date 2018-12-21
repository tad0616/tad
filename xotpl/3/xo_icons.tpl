<div class="page-header">
    <h3><{$lang_cp}></h3>
</div>
<{foreach item=op from=$mod_options}>
    <div class="tad_adm_icon">
        <a href="<{$op.link}>" title="<{$op.desc}>">
            <img src='<{$op.icon|default:"$theme_icons/icon_options.png"}>' alt="<{$op.desc}>">
        </a>
        <div>
            <a href="<{$op.link}>" title="<{$op.desc}>" class="tad_icon_text"><{$op.title}></a>
        </div>
    </div>
<{/foreach}>

    <div class="tad_adm_icon">
        <a href="<{xoAppUrl modules/system/admin.php}>" title="<{$smarty.const._AM_SYSTEM_CONFIG}>">
            <img src='<{"$theme_icons/configuration.png"}>'>
        </a>
        <div>
            <a href="<{xoAppUrl modules/system/admin.php}>" title="<{$smarty.const._AM_SYSTEM_CONFIG}>" class="tad_icon_text"><{$smarty.const._AM_SYSTEM_CONFIG}></a>
        </div>

    </div>

    <div class="tad_adm_icon">
        <a href="<{xoAppUrl modules/system/help.php}>" title="<{$smarty.const._AM_SYSTEM_HELP}>">
            <img src='<{"$theme_icons/help.png"}>'>
        </a>
        <div>
            <a href="<{xoAppUrl modules/system/help.php}>" title="<{$smarty.const._AM_SYSTEM_HELP}>" class="tad_icon_text"><{$smarty.const._AM_SYSTEM_HELP}></a>
        </div>
    </div>
<div style="clear: both;"></div>


