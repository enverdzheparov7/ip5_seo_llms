<?php

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

/**
 * Хук before_dispatch
 */
function fn_ip5_seo_llms_before_dispatch(&$controller, &$mode, &$action, &$dispatch_extra, &$area)
{
    $uri = $_SERVER['REQUEST_URI'];

    // Если пользователь запрашивает llms.txt
    if (preg_match('/\/llms\.txt$/', $uri)) {
        $_REQUEST['dispatch'] = 'ip5_seo_llms.view';
        $controller = 'ip5_seo_llms';
        $mode = 'view';
    }
}
