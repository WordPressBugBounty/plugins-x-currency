<?php

namespace XCurrency\App\Http\Controllers;

defined( 'ABSPATH' ) || exit;

use Exception;
use WP_REST_Request;
use XCurrency\App\Http\Controllers\Controller;
use XCurrency\App\Models\Currency;
use XCurrency\App\Repositories\CurrencyRateRepository;
use XCurrency\App\Repositories\CurrencyRepository;
use XCurrency\WpMVC\RequestValidator\Validator;
use XCurrency\WpMVC\Routing\Response;

class RateController extends Controller {
    public CurrencyRateRepository $currency_rate_repository;

    public CurrencyRepository $currency_repository;

    public function __construct( CurrencyRateRepository $currency_rate_repository, CurrencyRepository $currency_repository ) {
        $this->currency_rate_repository = $currency_rate_repository;
        $this->currency_repository      = $currency_repository;
    }

    public function exchange_single( WP_REST_Request $wp_rest_request, Validator $validator ) {
        $validator->validate(
            [
                'id' => 'required|numeric'
            ]
        );

        $currency_id = $wp_rest_request->get_param( 'id' );

        $currency = Currency::query()->where( 'id', $currency_id )->first();

        if ( ! $currency ) {
            throw new Exception( esc_html__( "Currency not found", 'x-currency' ) );
        }

        $this->currency_rate_repository->exchange( $currency_id, $currency->code );

        return Response::send(
            [
                'status'  => 'success',
                'data'    => $this->currency_repository->get_all(),
                'message' => esc_html__( 'Currency rate updated successfully!', 'x-currency' )
            ]
        );
    }

    public function exchange_all() {
        $this->currency_rate_repository->exchange();

        return Response::send(
            [
                'status'  => 'success',
                'data'    => $this->currency_repository->get_all(),
                'message' => esc_html__( 'Currency rates updated successfully!', 'x-currency' )
            ]
        );
    }
}