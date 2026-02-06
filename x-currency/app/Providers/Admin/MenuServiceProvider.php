<?php

namespace XCurrency\App\Providers\Admin;

defined( 'ABSPATH' ) || exit;

use XCurrency\WpMVC\Contracts\Provider;
use XCurrency\WpMVC\View\View;

class MenuServiceProvider implements Provider {
    const PRO_URL = 'https://crafium.com/x-currency?utm_source=plugin&utm_medium=x-currency_plugin&utm_campaign=early_bird_sale';

    public function boot() {
        add_action( 'admin_menu', [ $this, 'action_admin_menu' ] );
        add_action( 'admin_head', [ $this, 'action_admin_head' ] );
        add_filter( 'plugin_action_links_x-currency/x-currency.php', [$this, 'plugin_action_links'] );
    }

    /**
     * Fires in head section for all admin pages.
     */
    public function action_admin_head() : void {
        ?>
        <style>
            #toplevel_page_x-currency .wp-menu-image::before {
                content: "\e900";
                font-family: 'x-currency' !important;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }

            #toplevel_page_x-currency li:has(.x-currency-our-plugins-menu-item) a{
                color: #2ca617 !important;
                font-weight: 700 !important;
            }
            #toplevel_page_x-currency .current:has(.x-currency-our-plugins-menu-item) a{
                color: #2bc311 !important;
            }

            #toplevel_page_x-currency li:has(.x-currency-pro-menu-item) a{
                color: #ffffff !important;
                background: #10AC84 !important;
            }
        </style>
        <?php
    }

    /**
     * Fires before the administration menu loads in the admin.
     */
    public function action_admin_menu() : void {
        $page_url = admin_url( 'admin.php?page=x-currency' );
        add_menu_page( esc_html__( 'X-Currency', 'x-currency' ), esc_html__( 'X-Currency', 'x-currency' ), 'manage_options', 'x-currency', function () { }, '', '58.7' );
        add_submenu_page( 'x-currency', esc_html__( 'Overview', 'x-currency' ), esc_html__( 'Overview', 'x-currency' ), 'manage_options', 'x-currency', [$this, 'content'] );
        add_submenu_page( 'x-currency', esc_html__( 'Currencies', 'x-currency' ), esc_html__( 'Currencies', 'x-currency' ), 'manage_options', esc_url( $page_url . '#/currencies' ) );
        add_submenu_page( 'x-currency', esc_html__( 'Switchers', 'x-currency' ), esc_html__( 'Switchers', 'x-currency' ), 'manage_options', esc_url( $page_url . '#/switchers' ) );
        add_submenu_page( 'x-currency', esc_html__( 'Global Settings', 'x-currency' ), esc_html__( 'Global Settings', 'x-currency' ), 'manage_options', esc_url( $page_url . '#/settings' ) );
        add_submenu_page( 'x-currency', esc_html__( 'Our Plugins', 'x-currency' ), "<span class='x-currency-our-plugins-menu-item'>" . esc_html__( 'Our Plugins', 'x-currency' ) . "</span>", 'manage_options', $page_url . '#/our-plugins' );

        if ( ! function_exists( 'x_currency_pro' ) ) {
            add_submenu_page( 'x-currency', esc_html__( 'Upgrade to Pro', 'x-currency' ), "<span class='x-currency-pro-menu-item'>" . esc_html__( 'Upgrade to Pro', 'x-currency' ) . "</span>", 'manage_options', self::PRO_URL );
        }
    }

    public function plugin_action_links( $links ) {
        $custom_links = [
            '<a href="' . esc_url( admin_url( 'admin.php?page=x-currency' ) . '#/currencies' ) . '" title="' . esc_attr__( 'Settings', 'x-currency' ) . '">' . esc_html__( 'Currencies', 'x-currency' ) . '</a>'
        ];

        foreach ( $custom_links as $link ) {
            array_unshift( $links, $link );
        }

        return $links;
    }

    public function content() {
        View::render( 'admin-screen' );
    }
}
