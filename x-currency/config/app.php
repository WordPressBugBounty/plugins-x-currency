<?php

defined( 'ABSPATH' ) || exit;

use XCurrency\App\Providers\BlockServiceProvider;
use XCurrency\App\Providers\Admin\GlobalServiceProvider;
use XCurrency\App\Providers\Admin\MenuServiceProvider;
use XCurrency\App\Providers\SettingServiceProvider;
use XCurrency\App\Providers\WoocommerceServiceProvider;
use XCurrency\App\Providers\CompatibilityServiceProvider;
use XCurrency\App\Providers\ScheduleServiceProvider;
use XCurrency\App\Providers\LocalizationServiceProvider;
use XCurrency\App\Providers\ShortCodeServiceProvider;
use XCurrency\App\Providers\SideStickyServiceProvider;
use XCurrency\App\Http\Middleware\EnsureIsUserAdmin;
use XCurrency\Database\Migrations\Currency;
use XCurrency\Database\Migrations\Rounding;
use XCurrency\Database\Migrations\GeoIP;
use XCurrency\WpMVC\Helpers\Helpers;

return [
    'version'                   => Helpers::get_plugin_version( 'x-currency' ),

    'rest_api'                  => [
        'namespace' => 'x-currency',
        'versions'  => []
    ],

    'ajax_api'                  => [
        'namespace' => 'x-currency',
        'versions'  => []
    ],

    'providers'                 => [
        LocalizationServiceProvider::class,
        SettingServiceProvider::class,
        ScheduleServiceProvider::class,
        ShortCodeServiceProvider::class,
        SideStickyServiceProvider::class,
        WoocommerceServiceProvider::class,
        CompatibilityServiceProvider::class,
        BlockServiceProvider::class
    ],

    'admin_providers'           => [
        GlobalServiceProvider::class,
        MenuServiceProvider::class
    ],

    'middleware'                => [
        'admin' => EnsureIsUserAdmin::class
    ],

    'post_type'                 => 'x-currency',
    'switcher_post_type'        => 'x-currency-switcher',
    'sort_ids_option_key'       => 'x-currency-currency-sort-ids',
    'base_currency_option_key'  => 'x-base-currency',
    'currency_rates_option_key' => 'x-currency-rates',
    'settings_option_key'       => 'x-currency-settings',
    'migration_db_option_key'   => 'x-currency-migrations',
    'migrations'                => [
        'currency' => Currency::class,
        'rounding' => Rounding::class,
        'geo_ip'   => GeoIP::class
    ],
    'rest_response_action_hook' => 'x_currency_before_send_rest_response',
    'rest_response_filter_hook' => 'x_currency_rest_response'
];