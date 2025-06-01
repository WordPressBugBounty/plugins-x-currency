<?php

use XCurrency\WpMVC\Enqueue\Enqueue;

Enqueue::style( 'x-currency-icon', 'font/style' );

if ( 'toplevel_page_x-currency' !== $hook_suffix ) {
    return;
}

add_filter( 'should_load_block_editor_scripts_and_styles', "__return_true" );

wp_enqueue_registered_block_scripts_and_styles();

Enqueue::style( 'x-currency-shortcode', 'build/css/shortcode' );
Enqueue::script( 'x-currency-old-switcher', 'build/js/x-currency-old-switcher', [], true );
Enqueue::script( 'x-currency-admin', 'build/js/admin-main-script.js', ['lodash', 'jquery'] );

$countries    = new WC_Countries;
$country_list = [];

foreach ( $countries->get_countries() as $key => $country ) {
    $country_list[] = ['value' => $key, 'label' => $country];
}

wp_localize_script(
    'x-currency-admin', 'x_currency', [
        'base_currency_id'  => x_currency_base_id(),
        'premade_templates' => x_currency_config()->get( 'premade-switchers' ),
        'version'           => x_currency_version(),
        'apiUrl'            => get_rest_url( null, '' ),
        'url'               => x_currency_url( '/' ),
        'prefix'            => x_currency_config()->get( 'app.post_type' ),
        'nonce'             => wp_create_nonce( 'wp_rest' ),
        'base_currency'     => x_currency_base_id(),
        'asset_url'         => x_currency_url( 'assets' ),
        'preview'           => x_currency_url( 'resources/views/customizer/preview.html' ),
        'countries'         => $country_list,
        'countries_code'    => x_currency_countries_code()
    ] 
);

wp_enqueue_editor();
wp_enqueue_media();

Enqueue::style( 'x-currency-admin', 'build/css/admin-main-style', ['wp-components', 'wp-edit-blocks', 'wp-block-editor'] );

//Old switcher
global $x_currency_custom_inline_styles;

if ( ! empty( $x_currency_custom_inline_styles ) && is_array( $x_currency_custom_inline_styles ) ) {
    foreach ( $x_currency_custom_inline_styles as $handle => $style ) {
        wp_add_inline_style( $handle, $style );
    }
}