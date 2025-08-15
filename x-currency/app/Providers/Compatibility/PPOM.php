<?php

namespace XCurrency\App\Providers\Compatibility;

defined( "ABSPATH" ) || exit;

use XCurrency\WpMVC\Contracts\Provider;

class PPOM implements Provider {
    public function boot() {
        if ( ! function_exists( 'PPOM' ) ) {
            return;
        }

        add_filter( 'ppom_option_price', [ $this, 'option_price' ] );
        add_filter( 'ppom_meta_fields', [ $this, 'meta_fields' ] );
        add_filter( 'ppom_price_option_meta', [ $this, 'price_option_meta' ], 10, 4 );
        add_filter( 'ppom_cart_fixed_fee', [ $this, 'cart_fixed_fee' ] );
        add_filter( 'ppom_cart_line_total', [ $this, 'cart_line_total' ] );
    }

    public function option_price( $option_price ) {
        return x_currency_exchange( $option_price );
    }

    public function meta_fields( $meta_fields ) {
        foreach ( $meta_fields as $key => $meta_field ) {
            if ( empty( $meta_field['price'] ) ) {
                continue;
            }
            $meta_fields[ $key ]['price'] = x_currency_exchange( $meta_field['price'] );
        }
        return $meta_fields;
    }

    public function price_option_meta( $option_meta, $field_meta, $field_price, $option ) {
        $price                      = $option['price'];
        $option_meta['price']       = $price;
        $field_title                = isset( $field_meta['title'] ) ? stripslashes( $field_meta['title'] ) : '';
        $option_meta['label_price'] = $field_title . " - " . wc_price( $price );
        return $option_meta;
    }

    public function cart_fixed_fee( $fee_price ) {
        return x_currency_exchange( $fee_price );
    }

    public function cart_line_total( $total_price ) {
        return x_currency_exchange_revert( $total_price );
    }
}