<?php

namespace XCurrency\App\Http\Controllers;

defined( 'ABSPATH' ) || exit;

use WP_REST_Request;
use XCurrency\App\DTO\SwitcherDTO;
use XCurrency\App\Http\Controllers\Controller;
use XCurrency\App\Repositories\SwitcherRepository;
use XCurrency\WpMVC\RequestValidator\Validator;
use XCurrency\WpMVC\Routing\Response;

class SwitcherController extends Controller {
    public SwitcherRepository $switcher_repository;

    public function __construct( SwitcherRepository $switcher_repository ) {
        $this->switcher_repository = $switcher_repository;
    }

    public function switcher_list() {
        return Response::send(
            [
                'message' => esc_html__( 'Switcher List Retrieved Successfully!', 'x-currency' ),
                'data'    => $this->switcher_repository->switcher_list_data( $this->switcher_repository->get() ),
                'status'  => 'success'
            ]
        );
    }

    public function pages() {
        $pages = [
            ['value' => 'all', 'label' => 'All Page'],
            ['value' => 'home', 'label' => 'Home'],
            ['value' => 'wc_archive', 'label' => 'WooCommerce Archive'],
            ['value' => 'wc_single', 'label' => 'WooCommerce Single'],
            ['value' => 'post_single', 'label' => 'Post Single'],
        ];
        foreach ( get_pages() as $page ) {
            array_push( $pages, ['value' => $page->ID, 'label' => $page->post_title] );
        }

        return Response::send( ['data' => $pages] );
    }

    public function organizer( WP_REST_Request $wp_rest_request ) {
        $ids  = $wp_rest_request->get_param( 'keys' );
        $type = $wp_rest_request->get_param( 'type' );
        $this->switcher_repository->organizer( $ids, $type );

        return Response::send(
            [
                'message' => esc_html__( 'Switcher organized successfully!', 'x-currency' ),
                'status'  => 'success'
            ] 
        );
    }

    public function create( WP_REST_Request $request, Validator $validator ) {
        $validator->validate(
            [
                'name'     => 'required|string|max:200',
                'active'   => 'required|boolean',
                'template' => 'required|string',
                'type'     => 'required|string|accepted:general,sticky'
            ]
        );

        $type         = $request->get_param( 'type' );
        $template     = $request->get_param( 'template' );
        $content_path = x_currency_dir( "app/PremadeSwitchers/{$type}/{$template}/content.txt" );

        $dto = new SwitcherDTO;
        $dto->set_title( $request->get_param( 'name' ) );
        $dto->set_active_status( $request->get_param( 'active' ) );
        $dto->set_content( file_get_contents( $content_path ) );
        $dto->set_type( 'general' === $type ? "shortcode" : $type );

        do_action( 'x_currency_before_create_switcher', $dto, $request );

        $switcher_id = $this->switcher_repository->create( $dto );
        
        return Response::send(
            [
                'message' => esc_html__( 'Switcher Created Successfully!', 'x-currency' ),
                'data'    => [
                    'switcher_id' => $switcher_id
                ],
                'status'  => 'success'
            ] 
        );
    }

    public function update( WP_REST_Request $wp_rest_request, Validator $validator ) {
        $validator->validate(
            [
                'id'      => 'required|integer',
                'name'    => 'required|string|max:200',
                'active'  => 'required|boolean',
                // 'custom_css'    => 'string',
                // 'customizer_id' => 'required|string',
                // 'template'      => 'required|json',
                // 'type'          => 'required|string',
                'content' => 'required|string',
            ]
        );

        if ( $validator->is_fail() ) {
            return Response::send(
                [
                    'messages' => $validator->errors
                ], 422
            );
        }

        $dto = new SwitcherDTO;
        $dto->set_id( $wp_rest_request->get_param( 'id' ) );
        $dto->set_title( $wp_rest_request->get_param( 'name' ) );
        $dto->set_active_status( $wp_rest_request->get_param( 'active' ) );
        $dto->set_content( $wp_rest_request->get_param( 'content' ) );
        // $dto->set_custom_css( (string) $wp_rest_request->get_param( 'custom_css' ) );
        // $dto->set_customizer_id( $wp_rest_request->get_param( 'customizer_id' ) );
        // $dto->set_template( $wp_rest_request->get_param( 'template' ) );
        // $dto->set_type( $wp_rest_request->get_param( 'type' ) );
        // $dto->set_package( $wp_rest_request->get_param( 'package' ) );

        $switcher_id = $this->switcher_repository->update( $dto );

        return Response::send(
            [
                'message' => esc_html__( 'Switcher Updated Successfully!', 'x-currency' ),
                'data'    => [
                    'id'         => $switcher_id,
                    'short_code' => "[" . x_currency_config()->get( 'app.switcher_post_type' ) . " id=" . $switcher_id . "]"
                ],
                'status'  => 'success'
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

        $this->switcher_repository->update_status( intval( $wp_rest_request->get_param( 'id' ) ), $wp_rest_request->get_param( 'active' ) );
    
        return Response::send(
            [
                'message' => esc_html__( 'Switcher status updated successfully!', 'x-currency' )
            ]
        );
    }

    public function delete( WP_REST_Request $wp_rest_request, Validator $validator ) {
        $validator->validate(
            [
                'id' => 'required|numeric'
            ]
        );

        wp_delete_post( intval( $wp_rest_request->get_param( 'id' ) ) );
    
        return Response::send(
            [
                'message' => esc_html__( 'Switcher delete successfully!', 'x-currency' )
            ]
        );
    }
}