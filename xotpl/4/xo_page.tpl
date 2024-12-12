<div class="container-fluid">
    <div class="row">
        <{assign var="bootstrap" value=$smarty.session.bootstrap|default:$session.bootstrap}>
        <{if $modules|default:false}>
            <div class="col-md-8 col-lg-9">
                <{include file="$theme_tpl/`$bootstrap`/xo_icons.tpl"}>
                <{include file="$theme_tpl/`$bootstrap`/xo_modules.tpl"}>
            </div>
            <div class="col-md-4 col-lg-3">
                <{include file="$theme_tpl/`$bootstrap`/xo_accordion.tpl"}>
                <{include file="$theme_tpl/`$bootstrap`/xo_chk.tpl"}>
            </div>
        <{elseif $xoops_contents}>
            <div class="col-sm-12">
                <{*Display Admin menu*}>
                <{if $xo_system_menu|default:false}><{$xo_system_menu|default:''}><{/if}>
                <{$xoops_contents|default:''}>
            </div>
        <{/if}>
    </div>
</div>
