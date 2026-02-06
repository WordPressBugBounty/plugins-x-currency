<?php

defined( 'ABSPATH' ) || exit;

use XCurrency\App\Repositories\CurrencyRepository;
use XCurrency\App\Repositories\SettingRepository;
use XCurrency\WpMVC\App;
use XCurrency\App\Providers\ProVersionUpdateServiceProvider;

/**
 * Plugin Name:       X-Currency
 * Description:       Currency Switcher for WooCommerce custom currency, exchange rates, currency by country, pay in selected currency
 * Version:           2.3.1
 * Requires at least: 6.5
 * Requires PHP:      8.1
 * Tested up to:      6.9
 * Author:            Crafium
 * Author URI:        https://crafium.com/
 * License:           GPL v3 or later
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       x-currency
 * Domain Path:       /languages
 * Requires Plugins:  woocommerce
 */

require_once __DIR__ . '/vendor/vendor-src/autoload.php';
require_once __DIR__ . '/app/Helpers/helper.php';

final class XCurrency {
    public static XCurrency $instance;

    public static function instance() {
        if ( empty( static::$instance ) ) {
            static::$instance = new self();
        }
        return static::$instance;
    }

    public function boot() {
        $application = App::instance();

        $application->boot( __FILE__, __DIR__ );

        x_currency_singleton( ProVersionUpdateServiceProvider::class )->boot();

        register_activation_hook(
            __FILE__, function() {
                ( new XCurrency\Database\Migrations\Currency( x_currency_singleton( SettingRepository::class ), x_currency_singleton( CurrencyRepository::class ) ) )->execute();
            } 
        );

        $client = new \XCurrency\Appsero\Client( '5b5a97ed-213e-4a32-baef-a62e9ec0c2f5', 'X-Currency', __FILE__ );
        $client->insights()->init();

        /**
         * Fires once activated plugins have loaded.
         *
         */
        add_action(
            'plugins_loaded', function () use ( $application ): void {

                $stop = apply_filters( 'stop_load_x_currency', false );

                if ( $stop ) {
                    add_filter( 'stop_load_x_currency_pro', '__return_true' );
                    return;
                }

                do_action( 'before_load_x_currency' );

                $application->load();

                do_action( 'after_load_x_currency' );
            }, 11
        );

        add_action( 'plugins_loaded', [ $this, 'stop_load_pro' ], 5 );
    }
    
    public function stop_load_pro() : void {
        add_filter(
            'stop_load_x_currency_pro', function() {
                if ( function_exists( 'x_currency_pro_config' ) ) {
                    $current_version = x_currency_pro_config()->get( 'app.version' );
                } else {
                    $plugin_data     = get_plugin_data( ABSPATH . DIRECTORY_SEPARATOR . PLUGINDIR . DIRECTORY_SEPARATOR . 'x-currency-pro/x-currency-pro.php' );
                    $current_version = $plugin_data['Version'];
                }

                $required_pro_version = '2.3.0';

                if ( -1 === version_compare( $current_version, $required_pro_version ) ) {
                    return true;
                }
                return false;
            }
        );
    }
}

XCurrency::instance()->boot();