<?php

namespace XCurrency\Database\Migrations;

defined( 'ABSPATH' ) || exit;

use XCurrency\WpMVC\Contracts\Migration;

class Rounding implements Migration {
    public function more_than_version() {
        return '1.4.6';
    }

    public function execute(): bool {
        global $wpdb;

        $column_exists = $wpdb->get_results( "SHOW COLUMNS FROM {$wpdb->prefix}x_currency LIKE 'rounding'" );

        if ( ! empty( $column_exists ) ) {
            return true;
        }

        $wpdb->query( "ALTER TABLE {$wpdb->prefix}x_currency ADD rounding VARCHAR(50) DEFAULT 'disabled' AFTER max_decimal;" );

        return true;
    }
}