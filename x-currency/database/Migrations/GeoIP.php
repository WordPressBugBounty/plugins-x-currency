<?php

namespace XCurrency\Database\Migrations;

defined( 'ABSPATH' ) || exit;

use XCurrency\App\Models\Currency;
use XCurrency\WpMVC\Contracts\Migration;

class GeoIP implements Migration {
    public function more_than_version() {
        return '1.6.7';
    }

    public function execute(): bool {
        global $wpdb;

        $column_exists = $wpdb->get_results( $wpdb->prepare( "SHOW COLUMNS FROM {$wpdb->prefix}x_currency LIKE %s", $wpdb->esc_like( 'geo_ip_status' ) ) );

        if ( ! empty( $column_exists ) ) {
            return true;
        }

        $wpdb->query( "ALTER TABLE {$wpdb->prefix}x_currency ADD geo_ip_status TINYINT(1) DEFAULT 0 AFTER disable_payment_gateways;" );

        Currency::query()->where( 'disable_countries', '!=', 'a:0:{}' )->update(
            [
                'geo_ip_status' => 1
            ]
        );

        return true;
    }
}