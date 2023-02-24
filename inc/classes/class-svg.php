<?php
/**
 * Theme SVG.
 *
 * @since 1.0.1
 *
 * @package Peacock
 */

namespace PEACOCK_THEME\Inc;

use PEACOCK_THEME\Inc\Traits\Singleton;

class Svg
{
    use Singleton;

    protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

    protected function setup_hooks(){

        /**
         * Actions
         * 
         * @since 1.0.1
         */
        add_filter( 'upload_mimes', [$this, 'add_svg_to_upload_mimes'], 10, 1 );

    }

    /**
     * Register SVG.
     * 
     * @since 1.0.1
     */
    function add_svg_to_upload_mimes( $upload_mimes ) {
        $upload_mimes['svg'] = 'image/svg+xml';
        $upload_mimes['svgz'] = 'image/svg+xml';
        return $upload_mimes;
    }

}