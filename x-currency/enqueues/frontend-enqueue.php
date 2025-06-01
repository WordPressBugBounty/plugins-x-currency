<?php

defined( 'ABSPATH' ) || exit;

use XCurrency\WpMVC\Enqueue\Enqueue;

// Old switcher
global $x_currency_custom_inline_styles;

if ( ! empty( $x_currency_custom_inline_styles ) && is_array( $x_currency_custom_inline_styles ) ) {
    foreach ( $x_currency_custom_inline_styles as $handle => $style ) {
        wp_add_inline_style( $handle, $style );
    }
}

Enqueue::script( 'x-currency-old-switcher', 'build/js/x-currency-old-switcher' );
Enqueue::style( 'x-currency-shortcode', 'build/css/shortcode' );

$block_frontend_asset = include x_currency_dir( 'assets/build/js/blocks-frontend.asset.php' );
wp_register_script_module( 'x-currency/blocks-frontend', x_currency_url( 'assets/build/js/blocks-frontend.js' ), $block_frontend_asset['dependencies'], $block_frontend_asset['version'] );
