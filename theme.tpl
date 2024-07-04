<!DOCTYPE html>
<html lang="<{$xoops_langcode}>">
    <head>
        <{config_load file="$xoops_rootpath/uploads/bootstrap.conf"}>
        <{include file="$theme_tpl/`$smarty.session.bootstrap`/xo_metas.tpl"}>
        <{include file="$theme_tpl/`$smarty.session.bootstrap`/xo_scripts.tpl"}>
        <script>
            $(document).ready(function(){
                $('.hide').removeClass('hide').css('display','none');
            });
        </script>
    </head>
    <body id="<{$xoops_dirname}>" class="<{$xoops_langcode}>">
    <{if $clean_mode==1}>
        <{include file="$theme_tpl/`$smarty.session.bootstrap`/xo_page.tpl" }>
    <{else}>
        <!-- 頁首 -->
        <{include file="$theme_tpl/`$smarty.session.bootstrap`/xo_head.tpl"}>
        <!-- 上方選單 -->
        <{include file="$theme_tpl/`$smarty.session.bootstrap`/xo_globalnav.tpl"}>
        <!-- 圖示工具列 -->
        <{include file="$theme_tpl/`$smarty.session.bootstrap`/xo_toolbar.tpl"}>
        <{include file="$theme_tpl/`$smarty.session.bootstrap`/xo_page.tpl" }>
        <{include file="$theme_tpl/`$smarty.session.bootstrap`/xo_footer.tpl"}>
    <{/if}>

    </body>
</html>