<?php
/**
 * Theme Assets.
 *
 * @since 1.0.1
 *
 * @package Peacock
 */

namespace PEACOCK_THEME\Inc;

use PEACOCK_THEME\Inc\Traits\Singleton;

class Assets
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
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);

    }

    /**
     * Enqueue scripts and styles.
     *
     * @since Peacock 1.0.1
     *
     * @return void
     */
    public function register_styles(){
        wp_register_style( 'peacock-theme-style', PEACOCK_DIR_URI . '/style.css', array(), wp_get_theme()->get( 'Version' ) );

        wp_enqueue_style('peacock-theme-style');
    }

    public function register_scripts(){
        wp_register_script('bootstrap-js', PEACOCK_DIR_URI . '/assets/vendor/bootstrap/bootstrap.bundle.js', ['jquery'], false, true);

        wp_enqueue_script('bootstrap-js');
    }



}