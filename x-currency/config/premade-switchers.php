<?php

defined( 'ABSPATH' ) || exit;

$general_switchers = [
    [
        "label"       => "Template 1",
        "value"       => "template-1",
        "is_pro"      => false,
        "preview_url" => x_currency_url( 'app/PremadeSwitchers/general/template-1/preview.webp' )
    ],
    [
        "label"       => "Template 2",
        "value"       => "template-2",
        "is_pro"      => false,
        "preview_url" => x_currency_url( 'app/PremadeSwitchers/general/template-2/preview.webp' )
    ],
    [
        "label"       => "Template 3",
        "value"       => "template-3",
        "is_pro"      => false,
        "preview_url" => x_currency_url( 'app/PremadeSwitchers/general/template-3/preview.webp' )
    ]
];

$sticky_switchers = [
    [
        "label"       => "Template 1",
        "value"       => "template-1",
        "is_pro"      => false,
        "preview_url" => x_currency_url( 'app/PremadeSwitchers/sticky/template-1/preview.webp' )
    ],
];


return [
    'general_switchers' => $general_switchers,
    'sticky_switchers'  => $sticky_switchers
];