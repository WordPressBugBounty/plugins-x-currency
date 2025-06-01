<?php

namespace XCurrency\App\Providers;

use XCurrency\App\Repositories\CurrencyRepository;
use XCurrency\App\Repositories\SwitcherRepository;
use XCurrency\WpMVC\Contracts\Provider;
use XCurrency\WpMVC\View\View;

class SideStickyServiceProvider implements Provider {
    public function boot() {
        add_action( 'wp_enqueue_scripts', [ $this, 'action_wp_enqueue_scripts' ], 9 );
    }

    /**
     * Fires when scripts and styles are enqueued.
     *
     */
    public function action_wp_enqueue_scripts() : void {
        $current_page_id     = apply_filters( 'x_currency_current_page_id', 'all' );
        $switcher_repository = x_currency_singleton( SwitcherRepository::class );
        $switcher_list       = $switcher_repository->get_side_sticky();

        $content = '';

        if ( is_array( $switcher_list ) ) {
            /**
             * @var CurrencyRepository $currency_repository
             */
            $currency_repository = x_currency_singleton( CurrencyRepository::class );
            $currencies          = $currency_repository->get_geo();

            foreach ( $switcher_list as $switcher ) {
                if ( $switcher['page'] == 'all' || $switcher['page'] == $current_page_id ) {
                    $template = get_post_meta( $switcher['id'], 'template', true );
                    if ( empty( $template ) ) {
                        $content .= View::get(
                            'block-switcher', [
                                'template_id' => $switcher['id']
                            ]
                        );
                    } else {
                        // Old switcher, using before 2.0.0
                        $content .= View::get(
                            'sticky-switcher', [
                                'template_id' => $switcher['id'],
                                'template'    => $template,
                                'currencies'  => $currencies
                            ] 
                        );
                    }
                }
            }
        }

        if ( ! empty( $content ) ) {
            wp_enqueue_script_module( 'x-currency/blocks-frontend' );
        }

        add_action(
            'wp_head', function() use( $content ) {
                x_currency_render( $content );
            }
        );
    }
}