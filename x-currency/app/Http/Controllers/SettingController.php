<?php

namespace XCurrency\App\Http\Controllers;

defined( 'ABSPATH' ) || exit;

use WP_REST_Request;
use XCurrency\App\Http\Controllers\Controller;
use XCurrency\App\Models\Currency;
use XCurrency\App\Repositories\CurrencyRepository;
use XCurrency\App\Repositories\SettingRepository;
use XCurrency\WpMVC\RequestValidator\Validator;
use XCurrency\WpMVC\Routing\Response;

class SettingController extends Controller {
    public SettingRepository $setting_repository;

    public function __construct( SettingRepository $setting_repository ) {
        $this->setting_repository = $setting_repository;
    }

    public function get_settings() {
        /**
         * @var CurrencyRepository $currency_repository
         */
        $currency_repository = x_currency_singleton( CurrencyRepository::class );

        $geo_ip = [];

        foreach ( $currency_repository->get_db_currencies() as $currency ) {
            $geo_ip[$currency->id] = [
                'status'          => (bool) $currency->geo_ip_status,
                'action'          => $currency->geo_countries_status,
                'countries'       => maybe_unserialize( $currency->disable_countries ),
                'welcome_country' => $currency->welcome_country
            ];
        }

        $settings           = $this->setting_repository->get();
        $settings['geo_ip'] = $geo_ip;
    
        return Response::send(
            [
                "settings" => $settings
            ]
        );
    }

    public function setting_inputs() {
        return Response::send(
            [
                'message' => esc_html__( 'Settings Input Retrieved Successfully!', 'x-currency' ),
                'data'    => $this->setting_repository->input_fields_with_value(),
                'status'  => 'success'
            ]
        );
    }

    public function save_settings( Validator $validator, WP_REST_Request $request ) {
        $validator->validate(
            [
                'settings' => 'required|array'
            ]
        );

        $settings = $request->get_param( 'settings' );

        foreach ( $settings['geo_ip'] as $currency_id => $data ) {
            Currency::query()->where( 'id', $currency_id )->update(
                [
                    'geo_ip_status'        => $data['status'],
                    'geo_countries_status' => $data['action'],
                    'disable_countries'    => maybe_serialize( $data['countries'] ),
                    'welcome_country'      => $data['welcome_country'],
                ]
            );
        }

        unset( $settings['geo_ip'] );

        $this->setting_repository->save_settings( $request->get_param( 'settings' ) );

        return Response::send(
            [
                "message" => esc_html__( "Settings was updated successfully", 'x-currency' )
            ]
        );
    }
}