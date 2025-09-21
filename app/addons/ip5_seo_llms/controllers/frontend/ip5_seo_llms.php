<?php
use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if ($mode == 'view') {
    $storefront_id = $storefront = Tygh::$app['storefront'];
    $llms_data = db_get_field("SELECT data FROM ?:ip5_llms_data WHERE storefront_id = ?i", $storefront_id);

    header('Content-Type: text/plain; charset=utf-8');
    echo $llms_data;
    http_response_code(200);
    exit;
}
