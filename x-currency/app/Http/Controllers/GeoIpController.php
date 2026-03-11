<?php

namespace XCurrency\App\Http\Controllers;

defined( 'ABSPATH' ) || exit;

use XCurrency\App\Repositories\CurrencyRepository;
use XCurrency\WpMVC\Routing\Response;
use XCurrency\App\Http\Controllers\Controller;
use WP_REST_Request;

class GeoIpController extends Controller {
    public CurrencyRepository $currency_repository;

    public function __construct( CurrencyRepository $currency_repository ) {
        $this->currency_repository = $currency_repository;
    }

    public function save_currency_geo_location( WP_REST_Request $wp_rest_request ) {
        $this->currency_repository->update_geo( $wp_rest_request->get_params() );

        return Response::send(
            [
                'message' => esc_html__( 'Currency geo location updated successfully!', 'x-currency' ),
                'status'  => 'success'
            ] 
        );
    }
}