<?php

defined('BOOTSTRAP') or die('Access denied');

/** @var array $schema */
$schema['central']['website']['items']['seo']['subitems']['ip5_seo_llms'] = [
    'attrs'    => [
        'class' => 'is-addon'
    ],
    'href'     => 'ip5_seo_llms.manage',
    'position' => 510,
    'alt'      => 'ip5_seo_llms',
    'name'     => [
        'template' => __('ip5_seo_llms.menu'),
    ],
];

return $schema;
