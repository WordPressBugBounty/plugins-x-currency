<?php

namespace XCurrency\App\Http\Controllers;

defined( 'ABSPATH' ) || exit;

use Exception;
use WC_Payment_Gateways;
use WP_REST_Request;
use XCurrency\App\Http\Controllers\Controller;
use XCurrency\App\Repositories\CurrencyRateRepository;
use XCurrency\App\Repositories\CurrencyRepository;
use XCurrency\WpMVC\RequestValidator\Validator;
use XCurrency\WpMVC\Routing\Response;

class CurrencyController extends Controller {
    public CurrencyRepository $currency_repository;

    public CurrencyRateRepository $currency_rate_repository;

    public function __construct( CurrencyRepository $currency_repository, CurrencyRateRepository $currency_rate_repository ) {
        $this->currency_repository      = $currency_repository;
        $this->currency_rate_repository = $currency_rate_repository;
    }

    public function index() {
        return Response::send(
            [
                'data'   => $this->currency_repository->get_all(),
                'status' => 'success'
            ]
        );
    }

    public function create( WP_REST_Request $wp_rest_request ) {
        try {
            $currency_id = $this->currency_repository->create( $wp_rest_request->get_params() );
            return Response::send(
                [
                    'message' => esc_html__( 'Currency created successfully!', 'x-currency' ),
                    'data'    => ['currency_id' => $currency_id],
                    'status'  => 'success'
                ]
            );
        } catch ( Exception $exception ) {
            return Response::send(
                [
                    'message' => $exception->getMessage(),
                    'status'  => 'failed'
                ]
            );
        }
    }

    public function update( WP_REST_Request $wp_rest_request ) {
        $this->currency_repository->update( $wp_rest_request->get_params() );
        return Response::send(
            [
                'message' => esc_html__( 'Currency updated successfully!', 'x-currency' ),
                'status'  => 'success'
            ]
        );
    }

    public function delete( WP_REST_Request $wp_rest_request, Validator $validator ) {
        $validator->validate(
            [
                'id' => 'required|numeric'
            ]
        );

        $this->currency_repository->delete_by_id( intval( $wp_rest_request->get_param( 'id' ) ) );
    
        return Response::send(
            [
                'message' => esc_html__( 'Currency delete successfully!', 'x-currency' )
            ]
        );
    }

    public function update_status( WP_REST_Request $wp_rest_request, Validator $validator ) {
        $validator->validate(
            [
                'id'     => 'required|numeric',
                'active' => 'required|boolean'
            ]
        );

        $this->currency_repository->update_status( intval( $wp_rest_request->get_param( 'id' ) ), $wp_rest_request->get_param( 'active' ) );
    
        return Response::send(
            [
                'message' => esc_html__( 'Currency status updated successfully!', 'x-currency' )
            ]
        );
    }

    public function show( WP_REST_Request $wp_rest_request, Validator $validator ) {
        $validator->validate(
            [
                'id' => 'required|numeric'
            ]
        );

        $currency = $this->currency_repository->get_by_id( intval( $wp_rest_request->get_param( 'id' ) ) );

        if ( ! $currency ) {
            throw new Exception( "Currency not found" );
        }

        $currency->disable_payment_gateways = maybe_unserialize( $currency->disable_payment_gateways );
    
        return Response::send(
            [
                'currency' => $currency
            ]
        );
    }

    public function sort( WP_REST_Request $wp_rest_request, Validator $validator ) {
        $validator->validate(
            [
                'ids' => 'required|array'
            ]
        );

        $this->currency_repository->update_sort_ids( $wp_rest_request->get_param( 'ids' ) );

        return Response::send(
            [
                'message' => esc_html__( 'Currency sorted successfully!', 'x-currency' )
            ]
        );
    }

    public function organizer( WP_REST_Request $wp_rest_request ) {
        try {
            $data = $wp_rest_request->get_params();
            $this->currency_repository->query( $data['keys'], $data['type'] );
            return Response::send(
                [
                    'message' => esc_html__( 'Currency organized successfully!', 'x-currency' ),
                    'status'  => 'success'
                ]
            );
        } catch ( Exception $e ) {
            return Response::send(
                [
                    'message' => esc_html__( 'Something is wrong', 'x-currency' ),
                    'status'  => 'failed'
                ]
            );
        }
    }

    public function demo_currencies() {
        $rates = get_option( x_currency_config()->get( 'app.currency_rates_option_key' ) );

        if ( empty( $rates ) ) {
            $base_currency_code = x_currency_base_code();
            $rates              = $this->currency_rate_repository->exchange_base_currency( $base_currency_code, x_currency_get_json_file_content( x_currency_dir( 'sample-data/rates.json' ) ) );
        } else {
            $rates = maybe_unserialize( $rates );
        }
        
        $symbols = x_currency_symbols();
        $data    = [];
        foreach ( get_woocommerce_currencies() as $code => $name ) {
            $data[] = [
                'name'               => $name,
                'code'               => $code,
                'symbol'             => isset( $symbols[$code] ) ? $symbols[$code] : '',
                'rate'               => isset( $rates['rates'][$code] ) ? $rates['rates'][$code] : '',
                'rate_type'          => 'auto',
                'extra_fee'          => '0', // must be string
                'extra_fee_type'     => 'fixed',
                'thousand_separator' => ',',
                'decimal_separator'  => '.',
                'max_decimal'        => 2,
                'symbol_position'    => 'left'
            ];
        }

        return Response::send(
            [
                'data' => $data
            ]
        );
    }

    public function attachment( WP_REST_Request $wp_rest_request ) {
        $attachment = wp_get_attachment_image_src( sanitize_key( $wp_rest_request->get_param( 'id' ) ) );

        if ( ! empty( $attachment[0] ) ) {
            $attachment_url = $attachment[0];
        } else {
            $attachment_url = x_currency_url( 'media/common/dummy-flag.jpg' );
        }

        return Response::send(
            [
                'attachment_url' => $attachment_url,
                'status'         => 'success'
            ] 
        );
    }

    public function payment_gateways() {
        $payment_gateways    = [];
        $wc_payment_gateways = WC_Payment_Gateways::instance();

        foreach ( $wc_payment_gateways->get_available_payment_gateways() as $key => $value ) {
            $payment_gateways[] = ['value' => $key, 'label' => $value->title];
        }

        return Response::send(
            [
                'data' => $payment_gateways
            ] 
        );
    }
}