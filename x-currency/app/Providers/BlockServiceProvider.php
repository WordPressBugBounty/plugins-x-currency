<?php

namespace XCurrency\App\Providers;

defined( 'ABSPATH' ) || exit;

use XCurrency\WpMVC\Contracts\Provider;

class BlockServiceProvider implements Provider {
    public function boot() {
        add_action( 'init', [ $this, 'action_init' ] );
    }

    /**
     * Fires after WordPress has finished loading but before any headers are sent.
     */
    public function action_init() : void {
        //phpcs:ignore WordPress.Security.NonceVerification.Recommended
        if ( is_admin() && ( ! isset( $_GET['page'] ) || 'x-currency' !== $_GET['page'] ) ) {
            return;
        }

        foreach ( x_currency_config()->get( 'blocks' ) as $block_name => $block_data ) {
            $name = ltrim( $block_name, 'x-currency' );
            register_block_type( $block_data['dir'] . $name );
        }
    }
}