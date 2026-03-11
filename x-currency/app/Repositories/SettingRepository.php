<?php

namespace XCurrency\App\Repositories;

defined( 'ABSPATH' ) || exit;

use XCurrency\WpMVC\Helpers\Helpers;
use XCurrency\App\Models\Currency;

class SettingRepository {
    protected $default_settings = [
        "prices_without_cents"       => true,
        "no_get_data_in_link"        => false,
        "user_welcome_currency_type" => "auto",

        "approximate_currency_type"  => "auto",
        "approximate_currency_code"  => "",
        "approximate_product_price"  => true,
        "approximate_cart_price"     => true,

        "specific_shipping_amount"   => false,
        "specific_coupon_amount"     => false,
        "specific_product_price"     => false,

        "default_rate_provider"      => "",

        'geo_ip'                     => [],
    ];

    public function get() {
        $data = get_option( x_currency_config()->get( 'app.settings_option_key' ) );

        if ( false !== $data ) {
            $data = maybe_unserialize( $data );
        } else {
            $data = [];
        }

        return Helpers::array_merge_deep( $this->default_settings, $data );
    }

    public function db_settings() {
        return $this->get();
    }

    public function save_settings( array $settings ) {
        unset( $settings['action'] );

        $old_settings_data = $this->get();
        $old_base_currency = isset( $old_settings_data['base_currency'] ) ? $old_settings_data['base_currency'] : 0;

        if ( isset( $settings['currency_rate_auto_update'] ) && true == $settings['currency_rate_auto_update'] ) {
            $transient_time = $this->calculate_transient_time( $settings['rate_auto_update_time_type'], $settings['rate_auto_update_time'] );
            set_transient( 'x-currency-currency-update', $transient_time, $transient_time );
        }

        if ( isset( $settings['base_currency'] ) && $old_base_currency != $settings['base_currency'] ) {

            $currency = Currency::query()->where( 'id', $settings['base_currency'] )->first();

            if ( $currency ) {
                update_option( 'woocommerce_currency', $currency->code );
                update_option( x_currency_config()->get( 'app.base_currency_option_key' ), $settings['base_currency'] );

                $get_rates = get_option( x_currency_config()->get( 'app.currency_rates_option_key' ), [] );

                if ( ! is_array( $get_rates ) ) {
                    $get_rates = maybe_unserialize( $get_rates );
                }

                $currency_rate_repository = x_currency_singleton( CurrencyRateRepository::class );
                $rates                    = $currency_rate_repository->exchange_base_currency( $currency->code, $get_rates );

                $currency_rate_repository->exchange_all_currency( $rates['rates'], false );
            }
        }

        return update_option( x_currency_config()->get( 'app.settings_option_key' ), $settings );
    }

    public function update_settings( array $settings ) {
        update_option( x_currency_config()->get( 'app.settings_option_key' ), maybe_serialize( $settings ) );
    }

    public function calculate_transient_time( $type, $time ) {
        switch ( $type ) {
            case 'hour':
                $formula = 3600;
                break;
            case 'minute':
                $formula = 60;
                break;
            default:
                $formula = 1;
        }

        return $time * $formula;
    }
}