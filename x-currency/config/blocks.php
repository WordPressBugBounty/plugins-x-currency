<?php

defined( 'ABSPATH' ) || exit;

$blocks_dir = x_currency_dir( "assets/blocks" );

return apply_filters(
    'x_currency_gutenberg_blocks', [
        'x-currency/currency-switcher' => [
            'dir' => $blocks_dir
        ],
    ]
);