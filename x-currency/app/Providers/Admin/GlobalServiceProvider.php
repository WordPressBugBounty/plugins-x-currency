<?php

namespace XCurrency\App\Providers\Admin;

use XCurrency\App\Repositories\CurrencyRepository;
use XCurrency\WpMVC\Contracts\Provider;
use XCurrency\WpMVC\View\View;

class GlobalServiceProvider implements Provider {
    public CurrencyRepository $currency_repository;

    public function __construct( CurrencyRepository $currency_repository ) {
        $this->currency_repository = $currency_repository;
    }

    public function boot() {
        add_action( 'admin_notices', [ $this, 'action_admin_notices' ] );
        add_filter( 'woocommerce_general_settings', [$this, 'woocommerce_general_settings'] );
    }

    public function action_admin_notices() : void {
        if ( ! function_exists( 'x_currency_pro' ) && ! get_transient( 'x-currency-fb-g-notice' ) ) {
            View::render( 'pro-notice' );
        }
    }

    /**
     * @param $data
     * @return mixed
     */
    public function woocommerce_general_settings( $data ) {
        $general_remove_inputs = [
            'woocommerce_currency',
            'woocommerce_price_num_decimals',
            'woocommerce_currency_pos',
            'woocommerce_price_thousand_sep',
            'woocommerce_price_decimal_sep'
        ];

        foreach ( $data as $key => $value ) {
            if ( ! isset( $value['id'] ) ) {
                continue;
            }

            if ( in_array( $value['id'], $general_remove_inputs ) ) {
                unset( $data[$key] );
                continue;
            }

            if ( $value['id'] == 'pricing_options' ) {
                $x_currency_logo    = '<h3 class="cursor-text" style="margin: 0px;color: var(--wp-admin-theme-color);"><i class="xc-icon-logo" style="margin-right: 10px;"></i>X-Currency</h3>';
                $data[$key]['desc'] = $x_currency_logo . esc_html__( 'X-Currency plugin is activated. Please go to ', 'x-currency' ) . '<a href="' . admin_url( 'admin.php?page=x-currency' ) . '#/global-settings' . '">' . esc_html__( 'X-Currency setting page', 'x-currency' ) . '</a>' . esc_html__( ' to change default currency.', 'x-currency' );
            }
        }

        return $data;
    }
}