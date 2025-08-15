<?php

namespace XCurrency\App\Providers\Compatibility;

defined( 'ABSPATH' ) || exit;

use XCurrency\WpMVC\Contracts\Provider;

class YithAddon implements Provider {
    /**
     * Initialize YITH addon compatibility hooks and filters
     */
    public function boot() {
        if ( ! function_exists( 'yith_wapo_init' ) ) { 
            return;
        }

        add_filter( 'wapo_print_option_price', [$this, 'handle_addon_price_display'] );
        add_filter( 'yith_wapo_get_addon_price', [$this, 'modify_addon_price'], 10, 5 );
        add_filter( 'yith_wapo_get_addon_sale_price', [$this, 'modify_addon_sale_price'], 10, 5 );
        add_filter( 'yith_wapo_convert_price', [$this, 'modify_addon_price'], 10, 5 );
        add_filter( 'yith_wapo_total_item_price', [$this, 'revert_addon_price'] );
        add_action( 'woocommerce_before_calculate_totals', [$this, 'recalculate_cart_totals'] );
    }

    /**
     * Handle addon price display
     */
    public function handle_addon_price_display( $price ) {
        return x_currency_exchange( $price );
    }

    /**
     * Modify addon price based on conditions
     */
    public function modify_addon_price( $price, $allow_modification = false, $price_method = 'free', $price_type = 'fixed' ) {
        // Skip conversion for free items or when modification is not allowed
        if ( 'free' === $price_method && ! $allow_modification ) {
            return $price;
        }
        
        // Skip conversion for percentage-based pricing when modification is not allowed
        if ( 'percentage' === $price_type && ! $allow_modification ) {
            return $price;
        }

        return x_currency_exchange( $price );
    }

    /**
     * Modify addon sale price based on conditions
     */
    public function modify_addon_sale_price( $price, $allow_modification = false, $price_method = 'free', $price_type = 'fixed' ) {
        if ( empty( $price ) ) {
            return $price;
        }
        
        // Skip conversion for free items or when modification is not allowed
        if ( 'free' === $price_method && ! $allow_modification ) {
            return $price;
        }
        
        // Skip conversion for percentage-based pricing when modification is not allowed
        if ( 'percentage' === $price_type && ! $allow_modification ) {
            return $price;
        }
        
        return x_currency_exchange( $price );
    }

    /**
     * Revert addon price to original currency
     */
    public function revert_addon_price( $price ) {
        if ( empty( $price ) ) {
            return $price;
        }

        return x_currency_exchange_revert( $price );
    }

    /**
     * Recalculate cart totals with addon prices
     */
    public function recalculate_cart_totals() {
        $cart_contents = WC()->cart->get_cart_contents();

        foreach ( $cart_contents as $key => $content ) {
            if ( ! isset( $content['yith_wapo_options'] ) || ! is_array( $content['yith_wapo_options'] ) || ! count( $content['yith_wapo_options'] ) ) {
                continue;
            }
            
            foreach ( $content['yith_wapo_options'] as $sub_key => $option ) {
                if ( isset( $option['price_original'] ) && $option['price_original'] ) {
                    $cart_contents[ $key ]['yith_wapo_options'][ $sub_key ]['price'] = x_currency_exchange( $option['price_original'] );
                }
            }
        }

        WC()->cart->set_cart_contents( $cart_contents );
    }
} 