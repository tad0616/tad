<!DOCTYPE html>
<html lang="<{$xoops_langcode|default:''}>">
    <head>
        <{assign var="bootstrap" value=$smarty.session.bootstrap|default:$session.bootstrap}>
        <{include file="$theme_tpl/`$bootstrap`/xo_metas.tpl"}>
        <{include file="$theme_tpl/`$bootstrap`/xo_scripts.tpl"}>
        <script>
            $(document).ready(function(){
                $('.hide').removeClass('hide').css('display','none');
            });
        </script>
    </head>
    <body id="<{$xoops_dirname|default:''}>" class="<{$xoops_langcode|default:''}>">
    <{if $clean_mode==1}>
        <{include file="$theme_tpl/`$bootstrap`/xo_page.tpl" }>
    <{else}>
        <!-- 頁首 -->
        <{include file="$theme_tpl/`$bootstrap`/xo_head.tpl"}>
        <!-- 上方選單 -->
        <{include file="$theme_tpl/`$bootstrap`/xo_globalnav.tpl"}>
        <!-- 圖示工具列 -->
        <{include file="$theme_tpl/`$bootstrap`/xo_toolbar.tpl"}>
        <{include file="$theme_tpl/`$bootstrap`/xo_page.tpl" }>
        <{include file="$theme_tpl/`$bootstrap`/xo_footer.tpl"}>
    <{/if}>

    </body>
</html>