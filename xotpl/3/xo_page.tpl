<div class="container-fluid">
    <div class="row">
        <{if $modules}>
            <div class="col-md-8 col-lg-9">
                <{include file="$theme_tpl/`$smarty.session.bootstrap`/xo_icons.tpl"}>
                <{include file="$theme_tpl/`$smarty.session.bootstrap`/xo_modules.tpl"}>
            </div>
            <div class="col-md-4 col-lg-3">
                <{include file="$theme_tpl/`$smarty.session.bootstrap`/xo_accordion.tpl"}>
                <{include file="$theme_tpl/`$smarty.session.bootstrap`/xo_chk.tpl"}>
            </div>
        <{elseif $xoops_contents}>
            <div class="col-sm-12">
                <{*Display Admin menu*}>
                <{if $xo_system_menu}><{$xo_system_menu}><{/if}>
                <{$xoops_contents}>
            </div>
        <{/if}>
    </div>
</div>
