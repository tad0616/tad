<div class="page-header">
  <h3><{$smarty.const._OXYGEN_INSTALLEDMODULES}></h3>
</div>
<{foreach item=mod from=$modules}>
    <div class="tad_mod_icon">
        <a href="<{$mod.link}>" title="<{$mod.title}>">
            <img src='<{$mod.icon|default:"$theme_img/modules.png"}>' alt="<{$mod.title}>">
        </a>
        <div>
            <a href="<{$mod.link}>" title="<{$mod.title}>" class="tad_icon_text"><{$mod.title}></a>
        </div>
    </div>
<{/foreach}>
<div style="clear: both;"></div>
