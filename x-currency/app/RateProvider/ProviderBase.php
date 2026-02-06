<?php

namespace XCurrency\App\RateProvider;

defined( 'ABSPATH' ) || exit;

abstract class ProviderBase {
    abstract public function get_url();

    /**
     * @param $base_currency
     */
    abstract public function get_rates( $api_token );
}
