<?php
use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($mode == 'update') {
        $storefront_id = $storefront = Tygh::$app['storefront'];
        $content = isset($_REQUEST['llms_data']['content']) ? $_REQUEST['llms_data']['content'] : '';

        $exists = db_get_field("SELECT llms_id FROM ?:ip5_llms_data WHERE storefront_id = ?i", $storefront_id);

        if ($exists) {
            db_query("UPDATE ?:ip5_llms_data SET data = ?s WHERE storefront_id = ?i", $content, $storefront_id);
        } else {
            db_query("INSERT INTO ?:ip5_llms_data (storefront_id, data) VALUES (?i, ?s)", $storefront_id, $content);
        }
    }

    return [CONTROLLER_STATUS_OK, 'ip5_seo_llms.manage'];
}

if ($mode == 'manage') {
    $storefront_id = $storefront = Tygh::$app['storefront'];
    $llms_data = db_get_field("SELECT data FROM ?:ip5_llms_data WHERE storefront_id = ?i", $storefront_id);

    Tygh::$app['view']->assign([
        'llms' => $llms_data,
        'ftp_access' => []
    ]);
} 