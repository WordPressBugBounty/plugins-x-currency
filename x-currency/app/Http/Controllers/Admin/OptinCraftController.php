<?php

namespace XCurrency\App\Http\Controllers\Admin;

defined( "ABSPATH" ) || exit;

use XCurrency\App\Http\Controllers\Controller;
use XCurrency\WpMVC\Routing\Response;
use XCurrency\WpMVC\RequestValidator\Validator;
use WP_REST_Request;

class OptinCraftController extends Controller {
    public function setup( Validator $validator, WP_REST_Request $request ): array {
        // Include ALL necessary WordPress admin files
        if ( ! function_exists( 'get_plugin_data' ) ) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
        
        if ( ! function_exists( 'plugins_api' ) ) {
            require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
        }
        
        if ( ! function_exists( 'request_filesystem_credentials' ) ) {
            require_once ABSPATH . 'wp-admin/includes/file.php';
        }
        
        if ( ! class_exists( 'WP_Upgrader' ) ) {
            require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
        }
        
        if ( ! class_exists( 'Plugin_Upgrader' ) ) {
            require_once ABSPATH . 'wp-admin/includes/class-plugin-upgrader.php';
        }
        
        if ( ! class_exists( 'WP_Ajax_Upgrader_Skin' ) ) {
            require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader-skin.php';
            require_once ABSPATH . 'wp-admin/includes/class-wp-ajax-upgrader-skin.php';
        }

        $plugin_slug = 'optincraft';
        $plugin_dir  = 'optincraft';
        $plugin_file = $plugin_dir . '/optincraft.php';

        // Check if plugin is already installed and active
        if ( is_plugin_active( $plugin_file ) ) {
            return Response::send( 
                [ 
                    'success' => true,
                    'message' => 'Plugin is already installed and activated',
                    'data'    => [
                        'plugin'         => $plugin_slug,
                        'activated'      => true,
                        'already_active' => true
                    ]
                ] 
            );
        }

        // Check if plugin is already installed
        if ( ! file_exists( WP_PLUGIN_DIR . '/' . $plugin_file ) ) {
            // Fetch plugin information from WordPress plugin repository
            $api = plugins_api(
                'plugin_information',
                [
                    'slug'   => $plugin_slug,
                    'fields' => [
                        'sections' => false,
                    ],
                ]
            );

            if ( is_wp_error( $api ) ) {
                return Response::send( 
                    [ 
                        'success' => false,
                        'error'   => $api->get_error_message() 
                    ], 
                    500 
                );
            }

            // Initialize the WP filesystem
            WP_Filesystem();
            
            // Install the plugin
            $upgrader = new \Plugin_Upgrader(
                new \WP_Ajax_Upgrader_Skin(
                    [
                        'nonce'  => 'install-plugin_' . $plugin_slug,
                        'url'    => '',
                        'plugin' => $plugin_slug,
                        'type'   => 'web',
                    ] 
                ) 
            );
            
            $install_result = $upgrader->install( $api->download_link );

            if ( is_wp_error( $install_result ) ) {
                return Response::send( 
                    [ 
                        'success' => false,
                        'error'   => $install_result->get_error_message() 
                    ], 
                    500 
                );
            }
        }

        // Activate the plugin
        $activate_result = activate_plugin( $plugin_file );

        if ( is_wp_error( $activate_result ) ) {
            return Response::send( 
                [ 
                    'success' => false,
                    'error'   => $activate_result->get_error_message() 
                ], 
                500 
            );
        }

        // Insert necessary data
        $this->insert_data();

        delete_option( 'optincraft_activation_redirect' );

        return Response::send( 
            [ 
                'success' => true,
                'message' => 'Plugin installed and activated successfully',
                'data'    => [
                    'plugin'         => $plugin_slug,
                    'activated'      => true,
                    'already_active' => false
                ]
            ] 
        );
    }

    protected function insert_data() {
        $switcher_file = __DIR__ . '/OptinCraft/switcher.txt';
        $content       = file_get_contents( $switcher_file );
        $post_id       = wp_insert_post(
            [
                'post_title'   => 'X-Currency OptinCraft Switcher',
                'post_content' => $content,
                'post_status'  => 'publish',
                'post_type'    => 'x-currency-switcher',
            ]
        );

        add_post_meta( $post_id, 'type', 'shortcode' );
        add_post_meta( $post_id, 'block_switcher', 1 );

        $popup_file    = __DIR__ . '/OptinCraft/popup.txt';
        $popup_content = file_get_contents( $popup_file );

        $popup_content = str_replace( '[x-currency-switcher id=63]', '[x-currency-switcher id=' . $post_id . ']', $popup_content );

        $dto = ( new \OptinCraft\App\DTO\Campaign\DTO )
            ->set_title( 'X-Currency Welcome Popup' )
            ->set_content( json_decode( $popup_content, true ) )
            ->set_type( 'popup' )
            ->set_open_event( 'on_load' )
            ->set_geolocation_action( 'show' )
            ->set_status( 1 );

        $repository = new \OptinCraft\App\Repositories\CampaignRepository();
        $repository->create( $dto );
    }
}