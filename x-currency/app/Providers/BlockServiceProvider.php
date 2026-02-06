<?php

namespace XCurrency\App\Providers;

defined( 'ABSPATH' ) || exit;

use XCurrency\WpMVC\Contracts\Provider;

class BlockServiceProvider implements Provider {
    public function boot() {
        add_action( 'init', [ $this, 'action_init' ] );
        add_action( 'x_currency_before_send_rest_response', [$this, 'cleanup_cache'] );
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

    public function cleanup_cache( \WP_REST_Request $request ) {
        if ( in_array( $request->get_method(), ['POST', 'PUT', 'PATCH', 'DELETE'] ) ) {
            $this->clear_all_caches_after_db_operation();
        }
    }

    protected function clear_all_caches_after_db_operation() {
        // Clear WordPress object cache
        wp_cache_flush();

        // W3 Total Cache
        if ( function_exists( 'w3tc_flush_all' ) ) {
            w3tc_flush_all();
        }
        
        // WP Super Cache
        if ( function_exists( 'wp_cache_clear_cache' ) ) {
            wp_cache_clear_cache();
        }
        
        // WP Rocket
        if ( function_exists( 'rocket_clean_domain' ) ) {
            rocket_clean_domain();
        }

        // LiteSpeed Cache
        if ( class_exists( '\LiteSpeed\Purge' ) ) {
            \LiteSpeed\Purge::purge_all();
        }
    }
}