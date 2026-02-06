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

        $currency = $wpdb->get_results( "select * from {$wpdb->prefix}x_currency limit 1" );

        if ( ! empty( $currency[0]->subtract_amount ) ) {
            return true;
        }

        $wpdb->query( "ALTER TABLE {$wpdb->prefix}x_currency ADD subtract_amount FLOAT(24) DEFAULT 0 AFTER rounding;" );

        return true;
    }
}