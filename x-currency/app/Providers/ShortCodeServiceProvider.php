<?php

namespace XCurrency\App\Providers;

use XCurrency\WpMVC\Contracts\Provider;
use XCurrency\WpMVC\View\View;

class ShortCodeServiceProvider implements Provider {
    public function boot() {
        add_shortcode( 'x-currency-switcher', [$this, 'view'] );
    }

    /**
     * @param $attr
     */
    public function view( $attr ) {
        if ( isset( $attr['id'] ) ) {
            return self::render( intval( $attr['id'] ) );
        }
    }

    public static function render( $template_id ) {
        $template = get_post_meta( $template_id, 'template', true );

        if ( empty( $template ) || get_post_meta( $template_id, 'block_switcher', true ) ) {
            return View::get( 'block-switcher', compact( 'template_id' ) );
        } else {
            return View::get( 'switcher', compact( 'template_id', 'template' ) ); // Old switcher, using before 2.0.0
        }
    }
}