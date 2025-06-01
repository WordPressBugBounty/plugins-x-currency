<?php

defined( 'ABSPATH' ) || exit;

$query = new \WP_Query(
    [
        'p'           => $template_id,
        'post_type'   => x_currency_config()->get( 'app.switcher_post_type' ),
        'post_status' => 'publish'
    ] 
);

$post = $query->post;

/**
 * Return empty if switcher is not exists.
 */
if ( empty( $post ) ) {
    return;
}

wp_enqueue_script_module( 'x-currency/blocks-frontend' );


//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
$content = do_blocks( $post->post_content );

// Fetch the repository and selected currency once
$currency_repository = x_currency_singleton( \XCurrency\App\Repositories\CurrencyRepository::class );
$currencies          = $currency_repository->get_geo();
$selected_currency   = x_currency_selected();

// Process selected currency HTML
$selected_pattern = '/SELECTED_CURRENCY_START(.*?)SELECTED_CURRENCY_END/s';
preg_match( $selected_pattern, $content, $selected_matches );

if ( ! empty( $selected_matches ) ) {
    $selected_currency_html = x_currency_replace_currency_placeholders( $selected_matches[1], $selected_currency );
    $content                = preg_replace( '/' . preg_quote( $selected_matches[0], '/' ) . '/', $selected_currency_html, $content, 1 );
}

// Process currency items HTML
$pattern = '/CURRENCY_ITEM_START(.*?)CURRENCY_ITEM_END/s';
preg_match( $pattern, $content, $matches );

if ( ! empty( $matches ) ) {
    $currency_items = '';
    foreach ( $currencies as $currency ) {
        $currency_html = x_currency_replace_currency_placeholders( $matches[1], $currency );
        // Set active class for selected currency
        $currency_html   = str_replace(
            'ACTIVATED_CURRENCY_ITEM_CLASS', 
            ( $currency->code === $selected_currency->code ? 'active' : '' ), $currency_html
        );
        $currency_items .= $currency_html;
    }
    $content = preg_replace( '/' . preg_quote( $matches[0], '/' ) . '/', $currency_items, $content, 1 );
}

//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
echo str_replace( 'SWITCHER_ID', $post->ID, $content );