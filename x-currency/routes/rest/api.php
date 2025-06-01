<?php

use XCurrency\App\Http\Controllers\CurrencyController;
use XCurrency\App\Http\Controllers\GeoIpController;
use XCurrency\App\Http\Controllers\NoticeController;
use XCurrency\App\Http\Controllers\RateController;
use XCurrency\App\Http\Controllers\SettingController;
use XCurrency\App\Http\Controllers\SwitcherController;
use XCurrency\WpMVC\Routing\Route;

Route::get( 'user/currencies', [\XCurrency\App\Http\Controllers\User\CurrencyController::class, 'index'] );

Route::group(
    'admin', function() {
        Route::group(
            'currencies', function() {
                Route::get( 'pre-made-list', [CurrencyController::class, 'demo_currencies'] );
                Route::post( 'sort', [CurrencyController::class, 'sort'] );
                Route::get( '/', [CurrencyController::class, 'index'] );
                Route::post( '/', [CurrencyController::class, 'create'] );
                Route::delete( '{id}', [CurrencyController::class, 'delete'] );
                Route::patch( '{id}', [CurrencyController::class, 'update'] );
                Route::get( '{id}', [CurrencyController::class, 'show'] );
                Route::patch( '{id}/status', [CurrencyController::class, 'update_status'] );
            }
        );

        Route::group(
            'switchers', function() {
                Route::get( '/', [SwitcherController::class, 'switcher_list'] );
                Route::patch( '{id}', [SwitcherController::class, 'update'] );
                Route::patch( '{id}/status', [SwitcherController::class, 'update_status'] );
                Route::post( '/', [SwitcherController::class, 'create'] );
                Route::delete( '{id}', [SwitcherController::class, 'delete'] );
            }
        );

        Route::post( 'currency_organizer', [CurrencyController::class, 'organizer'] );
        Route::get( 'currency_input_fields', [CurrencyController::class, 'input_fields'] );
        Route::get( 'attachment/{id}', [CurrencyController ::class, 'attachment'] );
        Route::get( 'payment-gateways', [CurrencyController ::class, 'payment_gateways'] );
        Route::get( 'geo_input_fields', [GeoIpController::class, 'input_fields'] );
        Route::post( 'save_currency_geo_locations', [GeoIpController::class, 'save_currency_geo_location'] );
        Route::post( 'exchange_all', [RateController::class, 'exchange_all'] );
        Route::post( 'exchange/{id}', [RateController::class, 'exchange_single'] );
        Route::get( 'setting_inputs', [SettingController::class, 'setting_inputs'] );
        Route::get( 'settings', [SettingController::class, 'get_settings'] );
        Route::post( 'settings', [SettingController::class, 'save_settings'] );
        Route::get( 'pages', [SwitcherController::class, 'pages'] );
        Route::post( 'switcher_organizer', [SwitcherController::class, 'organizer'] );
        Route::post( 'create_switcher', [SwitcherController::class, 'create'] );
        Route::post( 'update_switcher', [SwitcherController::class, 'update'] );
        Route::get( 'notice_maybe_latter', [NoticeController::class, 'maybe_latter'] );
    }, ['admin']
);