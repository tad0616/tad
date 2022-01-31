<div class="page-header">
    <h3><{$smarty.const._OXYGEN_CONFIG_CHECK}></h3>
</div>
<{if $theme_fromfile!=1 or !$theme_in_allowed or $auth_method=='tn'}>
    <div class="alert alert-danger">
        <ul>
            <{if $theme_fromfile!=1}>
                <li><a href="<{$theme_url}>/tools.php?op=auto_templates"><{$smarty.const._OXYGEN_AUTO_TEMPLATES}></a></li>
            <{/if}>

            <{if !$theme_in_allowed}>
                <li><a href="<{$theme_url}>/tools.php?op=theme_in_allowed"><{$smarty.const._OXYGEN_AUTO_THEME_ALLOWED}></a></li>
            <{/if}>

            <{if $auth_method=='tn'}>
                <li><a href="<{$theme_url}>/tools.php?op=auth_method_xoops"><{$smarty.const._OXYGEN_TN_AUTH_METHOD}></a></li>
            <{/if}>

            <{if !$tad_adm_gperm_id}>
                <li><a href="<{$theme_url}>/tools.php?op=tad_adm_power&tad_adm_mid=<{$tad_adm_mid}>"><{$smarty.const._OXYGEN_TN_TAD_ADM_FIX}></a></li>
            <{/if}>

            <{if $sql_mode|strpos:'STRICT_TRANS_TABLES' || $sql_mode|strpos:'NO_ZERO_IN_DATE' || $sql_mode|strpos:'NO_ZERO_DATE' || $sql_mode|strpos:'ERROR_FOR_DIVISION_BY_ZERO' || $sql_mode|strpos:'ONLY_FULL_GROUP_BY'}>
                <li><a href="<{$theme_url}>/tools.php?op=sql_mode"><{$smarty.const._OXYGEN_STRICT_TRANS_TABLES}></a></li>
            <{/if}>
        </ul>
    </div>
<{else}>
    <div class="alert alert-success">
        <{$smarty.const._OXYGEN_ALL_CONFIG_OK}>
    </div>
<{/if}>
