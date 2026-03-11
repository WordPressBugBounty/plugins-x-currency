<?php

namespace XCurrency\Database\Migrations;

defined( 'ABSPATH' ) || exit;

use XCurrency\WpMVC\Contracts\Migration;

class SubtractAmount implements Migration {
    public function more_than_version() {
        return '2.2.0';
    }

    public function execute(): bool {
        global $wpdb;

        $column_exists = $wpdb->get_results( $wpdb->prepare( "SHOW COLUMNS FROM {$wpdb->prefix}x_currency LIKE %s", $wpdb->esc_like( 'subtract_amount' ) ) );

        if ( ! empty( $column_exists ) ) {
            return true;
        }

        $wpdb->query( "ALTER TABLE {$wpdb->prefix}x_currency ADD subtract_amount FLOAT(24) DEFAULT 0 AFTER rounding;" );

        return true;
    }
}