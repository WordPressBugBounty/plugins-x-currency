<?php

defined( 'ABSPATH' ) || exit;

use XCurrency\App\Repositories\CurrencyRepository;
use XCurrency\App\Repositories\SettingRepository;
use XCurrency\WpMVC\App;
use XCurrency\App\Providers\ProVersionUpdateServiceProvider;

/**
 * Plugin Name:       X-Currency
 * Description:       Currency Switcher for WooCommerce custom currency, exchange rates, currency by country, pay in selected currency
 * Version:           2.0.5
 * Requires at least: 6.5
 * Requires PHP:      7.4
 * Tested up to:      6.8
 * Author:            DoatKolom
 * Author URI:        https://doatkolom.com/
 * License:           GPL v3 or later
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       x-currency
 * Domain Path:       /languages
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

        if ( ! $this->is_compatible() ) {
            add_action( 'admin_notices', [$this, 'admin_notice_missing_main_plugin'] );
            return;
        }

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

        add_action(
            'init', function() : void {
                load_plugin_textdomain( "x-currency", false, __DIR__ . DIRECTORY_SEPARATOR . "languages" );
            } 
        );
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

                $required_pro_version = '2.0.0';

                if ( -1 === version_compare( $current_version, $required_pro_version ) ) {
                    add_action( 'admin_notices', [ $this, 'action_admin_notices' ] );
                    return true;
                }
                return false;
            }
        );
    }

    public function action_admin_notices() {
        ?>
        <?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="notice notice-error" style="padding: 20px; font-size: 15px; line-height: 1.6;">
    <p style="margin-bottom: 10px;">
        <strong style="font-size: 16px;">⚠️ X-Currency Pro Update Required</strong>
    </p>
    <p style="margin-bottom: 10px;">
        Your current version of <strong>X-Currency Pro</strong> is not compatible with the installed <strong>X-Currency Free</strong> plugin.<br>
        Please update X-Currency Pro to ensure compatibility.
    </p>
    <p style="margin-bottom: 10px;">
        Automatic updates from your dashboard will be available <strong>after version 2.0.0</strong>.
    </p>
    <p style="margin-bottom: 0;">
        <a href="https://facebook.com/groups/doatkolom" target="_blank" class="button button-primary">
            Get X-Currency Pro from Facebook Group
        </a>
    </p>
</div>

        <?php
    }

    public function admin_notice_missing_main_plugin() {
        $btn = [];
        if ( file_exists( WP_PLUGIN_DIR . '/woocommerce/woocommerce.php' ) ) {
            $btn['label'] = esc_html__( 'Activate WooCommerce', 'x-currency' );
            $btn['url']   = wp_nonce_url( 'plugins.php?action=activate&plugin=woocommerce/woocommerce.php&plugin_status=all&paged=1', 'activate-plugin_woocommerce/woocommerce.php' );
        } else {
            $btn['label'] = esc_html__( 'Install WooCommerce', 'x-currency' );
            $btn['url']   = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=woocommerce' ), 'install-plugin_woocommerce' );
        }
        ?>
        <div class="notice notice-error is-dismissible" style="padding-bottom: 10px;">
            <p><?php esc_html_e( 'X-Currency requires the WooCommerce plugin, which is not currently running.', 'x-currency' )?></p>
            <a href="<?php echo esc_url( $btn['url'] ) ?>" class="button-primary"><?php echo esc_html( $btn['label'] )?></a>
        </div>
        <?php
    }

    public function is_compatible() {
        $plugin_path = trailingslashit( WP_PLUGIN_DIR ) . 'woocommerce/woocommerce.php';
        if ( in_array( $plugin_path, wp_get_active_and_valid_plugins() ) ) {
            return true;
        }
        return false;
    }
}

XCurrency::instance()->boot();