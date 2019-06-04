<?php
/*
You may not change or alter any portion of this comment or credits
of supporting developers from this source code or any supporting source code
which is considered copyrighted (c) material of the original comment or credit authors.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

xoops_load('gui', 'system');
use XoopsModules\Tadtools\Utility;

class TadGui extends XoopsSystemGui
{
    public function __construct()
    {

    }

    public function header()
    {
        parent::header();

        global $xoopsConfig, $xoopsUser, $xoopsModule, $xoTheme, $xoopsTpl, $xoopsDB;
        $tpl = &$this->template;

        //檢查舊樣板
        $theme_name = $xoopsConfig['theme_set'];
        $clean_templates = false;
        $dir = XOOPS_ROOT_PATH . "/themes/{$theme_name}/modules/";
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if (substr($file, 0, 1) == '.' or $file == 'system' or $file == 'pm' or $file == 'profile') {
                        continue;
                    }
                    if (is_dir($dir . $file)) {
                        $clean_templates = true;
                    } else {
                        continue;
                    }
                }
                closedir($dh);
            }
        }

        $tpl->assign('clean_templates', $clean_templates);
        $tpl->assign('debug', $xoopsConfig['debug_mode']);
        $tpl->assign('theme_fromfile', $xoopsConfig['theme_fromfile']);

        $tpl->assign('theme_set', $xoopsConfig['theme_set']);
        $tpl->assign('theme_in_allowed', in_array($xoopsConfig['theme_set'], $xoopsConfig['theme_set_allowed']));

        $sql = "select conf_value from " . $xoopsDB->prefix("config") . " where conf_name='auth_method'";
        $result = $xoopsDB->queryF($sql) or web_error($sql);
        list($auth_method) = $xoopsDB->fetchRow($result);
        $tpl->assign('auth_method', $auth_method);

        $sql = "select mid from " . $xoopsDB->prefix("modules") . " where dirname='tad_adm'";
        $result = $xoopsDB->queryF($sql) or web_error($sql);
        list($tad_adm_mid) = $xoopsDB->fetchRow($result);
        $tpl->assign('tad_adm_mid', $tad_adm_mid);
        $sql = "select gperm_id from " . $xoopsDB->prefix("group_permission") . " where gperm_itemid='$tad_adm_mid' and gperm_groupid='3' and gperm_modid='1' and gperm_name='module_read'";
        $result = $xoopsDB->queryF($sql) or web_error($sql);
        list($tad_adm_gperm_id) = $xoopsDB->fetchRow($result);
        $tpl->assign('tad_adm_gperm_id', $tad_adm_gperm_id);

        $dirname = XOOPS_VAR_PATH . "/caches/smarty_compile/";
        if (glob($dirname . "*.php") != false) {
            $filecount = count(glob($dirname . "*.php"));
            $tpl->assign('filecount', $filecount);
        }

        $clean_mode = 0;
        if (isset($_REQUEST['tad_adm_tpl']) and $_REQUEST['tad_adm_tpl'] == "clean") {
            $clean_mode = 1;
        }
        $tpl->assign('clean_mode', $clean_mode);

        $xoTheme->addScript('browse.php?Frameworks/jquery/jquery.js');

        $xoTheme->addScript(XOOPS_ADMINTHEME_URL . '/tad/js/styleswitch.js');
        $xoTheme->addScript(XOOPS_ADMINTHEME_URL . '/tad/js/formenu.js');
        // $xoTheme->addScript(XOOPS_ADMINTHEME_URL . '/tad/js/tooltip.js');
        if ($_SESSION['bootstrap'] == '4') {
            $xoTheme->addScript(XOOPS_URL . '/modules/tadtools/bootstrap4/js/popper.min.js');
            $xoTheme->addScript(XOOPS_URL . '/modules/tadtools/bootstrap4/js/bootstrap.js');
        } else {
            $_SESSION['bootstrap'] = '3';
            $xoTheme->addScript(XOOPS_URL . '/modules/tadtools/bootstrap3/js/bootstrap.js');
        }
        $xoTheme->addScript(XOOPS_URL . '/modules/tadtools/smartmenus/jquery.smartmenus.min.js');
        $xoTheme->addScript(XOOPS_URL . '/modules/tadtools/smartmenus/sm-responsive.js');

        $xoTheme->addStylesheet(XOOPS_ADMINTHEME_URL . '/tad/css/style.css');
        $xoTheme->addStylesheet(XOOPS_URL . '/modules/tadtools/smartmenus/css/sm-core-css.css');
        $xoTheme->addStylesheet(XOOPS_ADMINTHEME_URL . '/tad/css/sm-blue/sm-blue.css');
        $xoTheme->addStylesheet(XOOPS_URL . '/modules/tadtools/smartmenus/css/sm-responsive.css');

        $tpl->assign('lang_cp', _CPHOME);
        //start system overview
        //$tpl->assign('lang_xoops_version', XOOPS_VERSION);
        $tpl->assign('lang_php_vesion', PHP_VERSION);

        $sql = "select version()";
        $result = $xoopsDB->queryF($sql);
        list($ver) = $xoopsDB->fetchRow($result);
        $tpl->assign('lang_mysql_version', $ver);

        $tpl->assign('lang_server_api', PHP_SAPI);
        $tpl->assign('lang_os_name', PHP_OS);
        $tpl->assign('post_max_size', ini_get('post_max_size'));
        $tpl->assign('max_input_time', ini_get('max_input_time'));
        $tpl->assign('output_buffering', ini_get('output_buffering'));
        $tpl->assign('max_execution_time', ini_get('max_execution_time'));
        $tpl->assign('memory_limit', ini_get('memory_limit'));
        $tpl->assign('file_uploads', ini_get('file_uploads') ? 'On' : 'Off');
        $tpl->assign('upload_max_filesize', ini_get('upload_max_filesize'));
        $tpl->assign('xoops_sitename', $xoopsConfig['sitename']);
        $tpl->assign('server_ip', $_SERVER['SERVER_ADDR']);

        // ADD MENU *****************************************

        //Add  CONTROL PANEL  Menu  items
        $menu = array();
        $menu[0]['link'] = XOOPS_URL;
        $menu[0]['title'] = _YOURHOME;
        $menu[0]['absolute'] = 1;
        $menu[1]['link'] = XOOPS_URL . '/admin.php?xoopsorgnews=1';
        $menu[1]['title'] = _OXYGEN_NEWS;
        $menu[1]['absolute'] = 1;
        $menu[1]['icon'] = XOOPS_ADMINTHEME_URL . '/tad/images/xoops.png';
        $menu[2]['link'] = XOOPS_URL . '/user.php?op=logout';
        $menu[2]['title'] = _LOGOUT;
        $menu[2]['absolute'] = 1;
        $menu[2]['icon'] = XOOPS_ADMINTHEME_URL . '/tad/images/logout.png';
        $tpl->append('navitems', array('link' => XOOPS_URL . '/admin.php', 'text' => _CPHOME, 'menu' => $menu));

        //add SYSTEM  Menu items
        include __DIR__ . '/menu.php';
        if (empty($xoopsModule) || 'system' === $xoopsModule->getVar('dirname', 'n')) {
            $modpath = XOOPS_URL . '/admin.php';
            $modname = _OXYGEN_SYSOPTIONS;
            $modid = 1;
            $moddir = 'system';

            $mod_options = $adminmenu;
            foreach (array_keys($mod_options) as $item) {
                $mod_options[$item]['link'] = empty($mod_options[$item]['absolute']) ? XOOPS_URL . '/modules/' . $moddir . '/' . $mod_options[$item]['link'] : $mod_options[$item]['link'];
                // echo "<div>{$mod_options[$item]['icon']}</div>";
                $mod_options[$item]['icon'] = empty($mod_options[$item]['icon']) ? '' : XOOPS_ADMINTHEME_URL . '/tad/' . $mod_options[$item]['icon'];
                unset($mod_options[$item]['icon_small']);
            }
        } else {
            $moddir = $xoopsModule->getVar('dirname', 'n');
            $modpath = XOOPS_URL . '/modules/' . $moddir;
            $modname = $xoopsModule->getVar('name');
            $modid = $xoopsModule->getVar('mid');

            $mod_options = $xoopsModule->getAdminMenu();
            foreach (array_keys($mod_options) as $item) {
                $mod_options[$item]['link'] = empty($mod_options[$item]['absolute']) ? XOOPS_URL . "/modules/{$moddir}/" . $mod_options[$item]['link'] : $mod_options[$item]['link'];

                //mb for direct URL access to icons in modules Admin
                $mod_options[$item]['icon'] = empty($mod_options[$item]['icon']) ? '' : (filter_var($mod_options[$item]['icon'], FILTER_VALIDATE_URL) ? $mod_options[$item]['icon'] : (XOOPS_URL . "/modules/{$moddir}/" . $mod_options[$item]['icon']));
            }
        }

        $tpl->assign('mod_options', $mod_options);
        $tpl->assign('modpath', $modpath);
        $tpl->assign('modname', $modname);
        $tpl->assign('modid', $modid);
        $tpl->assign('moddir', $moddir);

        // add MODULES  Menu items
        $module_handler = xoops_getHandler('module');
        $criteria = new CriteriaCompo();
        $criteria->add(new Criteria('hasadmin', 1));
        $criteria->add(new Criteria('isactive', 1));
        $criteria->setSort('mid');
        $mods = $module_handler->getObjects($criteria);

        $menu = array();
        $moduleperm_handler = xoops_getHandler('groupperm');
        foreach ($mods as $mod) {
            $rtn = array();
            $modOptions = array(); //add for sub menus
            $sadmin = $moduleperm_handler->checkRight('module_admin', $mod->getVar('mid'), $xoopsUser->getGroups());
            if ($sadmin) {
                $info = $mod->getInfo();
                if (!empty($info['adminindex'])) {
                    $rtn['link'] = XOOPS_URL . '/modules/' . $mod->getVar('dirname', 'n') . '/' . $info['adminindex'];
                } else {
                    $rtn['link'] = XOOPS_URL . '/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=' . $mod->getVar('mid');
                }
                $rtn['title'] = htmlspecialchars($mod->name(), ENT_QUOTES);
                $rtn['absolute'] = 1;
                $rtn['url'] = XOOPS_URL . '/modules/' . $mod->getVar('dirname', 'n') . '/'; //add for sub menus
                $modOptions = $mod->getAdminMenu(); //add for sub menus
                $rtn['options'] = $modOptions; //add for sub menus

                if (isset($info['icon']) && $info['icon'] !== '') {
                    $rtn['icon'] = XOOPS_URL . '/modules/' . $mod->getVar('dirname', 'n') . '/' . $info['icon'];
                }
                $menu[] = $rtn;
            }
        }
        $tpl->append('navitems', array(
            'link' => XOOPS_URL . '/modules/system/admin.php?fct=modulesadmin',
            'text' => _AM_SYSTEM_MODULES,
            'dir' => $mod->getVar('dirname', 'n'),
            'menu' => $menu));

        // add preferences menu
        $menu = array();

        $OPT = array();
        $OPT[] = array(
            'link' => 'admin.php?fct=preferences&amp;op=show&amp;confcat_id=1',
            'title' => _OXYGEN_GENERAL,
            'absolute' => 1,
            'icon' => XOOPS_ADMINTHEME_URL . '/tad/icons/prefs_small.png');
        $OPT[] = array(
            'link' => 'admin.php?fct=preferences&amp;op=show&amp;confcat_id=2',
            'title' => _OXYGEN_USERSETTINGS,
            'absolute' => 1,
            'icon' => XOOPS_ADMINTHEME_URL . '/tad/icons/prefs_small.png');
        $OPT[] = array(
            'link' => 'admin.php?fct=preferences&amp;op=show&amp;confcat_id=3',
            'title' => _OXYGEN_METAFOOTER,
            'absolute' => 1,
            'icon' => XOOPS_ADMINTHEME_URL . '/tad/icons/prefs_small.png');
        $OPT[] = array(
            'link' => 'admin.php?fct=preferences&amp;op=show&amp;confcat_id=4',
            'title' => _OXYGEN_CENSOR,
            'absolute' => 1,
            'icon' => XOOPS_ADMINTHEME_URL . '/tad/icons/prefs_small.png');
        $OPT[] = array(
            'link' => 'admin.php?fct=preferences&amp;op=show&amp;confcat_id=5',
            'title' => _OXYGEN_SEARCH,
            'absolute' => 1,
            'icon' => XOOPS_ADMINTHEME_URL . '/tad/icons/prefs_small.png');
        $OPT[] = array(
            'link' => 'admin.php?fct=preferences&amp;op=show&amp;confcat_id=6',
            'title' => _OXYGEN_MAILER,
            'absolute' => 1,
            'icon' => XOOPS_ADMINTHEME_URL . '/tad/icons/prefs_small.png');
        $OPT[] = array(
            'link' => 'admin.php?fct=preferences&amp;op=show&amp;confcat_id=7',
            'title' => _OXYGEN_AUTHENTICATION,
            'absolute' => 1,
            'icon' => XOOPS_ADMINTHEME_URL . '/tad/icons/prefs_small.png');
        $OPT[] = array(
            'link' => 'admin.php?fct=preferences&amp;op=showmod&amp;mod=1',
            'title' => _OXYGEN_MODULESETTINGS,
            'absolute' => 1,
            'icon' => XOOPS_ADMINTHEME_URL . '/tad/icons/prefs_small.png');

        $menu[] = array(
            'link' => XOOPS_URL . '/modules/system/admin.php?fct=preferences',
            'title' => _OXYGEN_SYSOPTIONS,
            'absolute' => 1,
            'url' => XOOPS_URL . '/modules/system/',
            'options' => $OPT);

        foreach ($mods as $mod) {
            $rtn = array();
            $sadmin = $moduleperm_handler->checkRight('module_admin', $mod->getVar('mid'), $xoopsUser->getGroups());
            if ($sadmin && ($mod->getVar('hasnotification') || is_array($mod->getInfo('config')) || is_array($mod->getInfo('comments')))) {
                $rtn['link'] = XOOPS_URL . '/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=' . $mod->getVar('mid');
                $rtn['title'] = htmlspecialchars($mod->name(), ENT_QUOTES);
                $rtn['absolute'] = 1;
                $rtn['icon'] = XOOPS_ADMINTHEME_URL . '/gui/oxygen/icons/prefs_small.png';
                $menu[] = $rtn;
            }
        }
        $tpl->append('navitems', array(
            'link' => XOOPS_URL . '/modules/system/admin.php?fct=preferences',
            'text' => _OXYGEN_SITEPREF,
            'dir' => $mod->getVar('dirname', 'n'),
            'menu' => $menu));

        //add OPTIONS/Links Menu Items
        $menu = array();
        $menu[] = array(
            'link' => 'http://xoops.org',
            'title' => _OXYGEN_XOOPSPROJECT,
            'absolute' => 1);
        $menu[] = array(
            'link' => 'http://xoops.org',
            'title' => _OXYGEN_WEBSITE,
            'absolute' => 1,
            'icon' => XOOPS_ADMINTHEME_URL . '/tad/images/xoops.png');
        $menu[] = array(
            'link' => 'http://www.xoops.org/modules/repository/',
            'title' => _OXYGEN_XOOPSMODULES,
            'absolute' => 1,
            'icon' => XOOPS_ADMINTHEME_URL . '/tad/images/xoops.png');
        $menu[] = array(
            'link' => 'http://www.xoops.org/modules/extgallery/',
            'title' => _OXYGEN_XOOPSTHEMES,
            'absolute' => 1,
            'icon' => XOOPS_ADMINTHEME_URL . '/tad/images/tweb.png');

        $tpl->append('navitems', array('link' => XOOPS_URL . '/admin.php', 'text' => _OXYGEN_INTERESTSITES, 'menu' => $menu));

        //add OPTIONS/links for local support
        if (file_exists($file = XOOPS_ADMINTHEME_PATH . '/tad/language/' . $xoopsConfig['language'] . '/localsupport.php')) {
            $links = include XOOPS_ADMINTHEME_PATH . '/tad/language/' . $xoopsConfig['language'] . '/localsupport.php';
            if (count($links) > 0) {
                $tpl->append('navitems', array('link' => XOOPS_URL . '/admin.php', 'text' => _OXYGEN_LOCALSUPPORT, 'menu' => $links));
            }
        }

        if (is_object($xoopsModule) || !empty($_GET['xoopsorgnews'])) {
            if (is_object($xoopsModule) && file_exists($file = XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/' . $xoopsModule->getInfo('adminmenu'))) {
                include $file;
            }

            return null;
        }

        foreach ($mods as $mod) {
            $sadmin = $moduleperm_handler->checkRight('module_admin', $mod->getVar('mid'), $xoopsUser->getGroups());
            if ($sadmin) {
                $rtn = array();
                $info = $mod->getInfo();
                if (!empty($info['adminindex'])) {
                    $rtn['link'] = XOOPS_URL . '/modules/' . $mod->getVar('dirname', 'n') . '/' . $info['adminindex'];
                } else {
                    $rtn['link'] = XOOPS_URL . '/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=' . $mod->getVar('mid');
                }
                $rtn['title'] = htmlspecialchars($mod->getVar('name'), ENT_QUOTES);
                $rtn['description'] = $mod->getInfo('description');
                $rtn['absolute'] = 1;
                if (isset($info['icon_big'])) {
                    $rtn['icon'] = XOOPS_URL . '/modules/' . $mod->getVar('dirname', 'n') . '/' . $info['icon_big'];
                } elseif (isset($info['image'])) {
                    $rtn['icon'] = XOOPS_URL . '/modules/' . $mod->getVar('dirname', 'n') . '/' . $info['image'];
                }

                $tpl->append('modules', $rtn);
            }
        }
    }
}

$ver = Utility::get_version('xoops');
if ($ver >= 20509) {
    class XoopsGuiTad extends TadGui
    {

        public static function validate()
        {
            if ($_SESSION['bootstrap'] == '4') {
                xoops_load('XoopsFormRendererBootstrap4');
                XoopsFormRenderer::getInstance()->set(new XoopsFormRendererBootstrap4());
            } else {
                $_SESSION['bootstrap'] = '3';
                xoops_load('XoopsFormRendererBootstrap3');
                XoopsFormRenderer::getInstance()->set(new XoopsFormRendererBootstrap3());
            }
            return true;
        }
    }
} else {
    class XoopsGuiTad extends TadGui
    {
        public static function validate()
        {
            return true;
        }
    }
}
