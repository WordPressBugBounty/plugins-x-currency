<?php

namespace XCurrency\App\Providers;

defined( 'ABSPATH' ) || exit;

use XCurrency\WpMVC\Contracts\Provider;

class ProVersionUpdateServiceProvider implements Provider {
    public function boot() {
        if ( function_exists( 'x_currency_pro_config' ) ) {
            add_action( 'init', [$this, 'plugin_updater'] );
        }
    }

    public function plugin_updater() {
        // To support auto-updates, this needs to run during the wp_version_check cron job for privileged users.
        $doing_cron = defined( 'DOING_CRON' ) && DOING_CRON;

        if ( $doing_cron ) {
            return;
        }

        $version = x_currency_pro_version();

        // if pro version is greater than 2.3.0, return
        if ( version_compare( $version, '2.3.0', '>=' ) ) {
            return;
        }

        new \XCurrencyPro\App\EDDSLPluginUpdater(
            'https://crafium.com',
            WP_PLUGIN_DIR . '/x-currency-pro/x-currency-pro.php',
            [
                'version' => x_currency_pro_version(),
                'license' => get_option( 'x_currency_pro_license_key', '' ),
                'item_id' => 1716,
                'author'  => 'Crafium',
                'beta'    => false,
            ]
        );
    }
}