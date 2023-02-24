<?php
/**
 * Theme Admin.
 *
 * @since 1.0.1
 *
 * @package Peacock
 */

namespace PEACOCK_THEME\Inc;

use PEACOCK_THEME\Inc\Traits\Singleton;

class Admin
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
        add_action( 'admin_menu', [$this, 'add_options_page'] );
        add_action( 'admin_init', [$this, 'init'] );

    }

    /**
     * Add the theme options page.
     */
    public function add_options_page() {
        add_menu_page(
            'Theme Options', // page title
            'Theme Options', // menu title
            'manage_options', // capability
            'my-theme-options', // menu slug
            array( $this, 'render_options_page' ), // callback function
            'dashicons-superhero' // icon URL
        );
    }

    /**
     * Initialize the theme options page.
     */
    public function init() {
        $this->register_settings();
        add_action('admin_enqueue_scripts', [$this, 'enqueue_styles']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_scripts']);
    }

    public function register_settings() {
        register_setting('my_theme_options', 'my_theme_options_favicon', array($this, 'sanitize_favicon_field'));
        register_setting('my_theme_options', 'my_theme_options_logo', array($this, 'sanitize_logo_field'));
    
        add_settings_section(
            'my_theme_options_general',
            'General Options',
            array($this, 'options_section'),
            'my_theme_options'
        );
    
        add_settings_field(
            'my_theme_options_favicon',
            'Favicon',
            array($this, 'favicon_field'),
            'my_theme_options',
            'my_theme_options_general'
        );
    
        add_settings_field(
            'my_theme_options_logo',
            'Logo',
            array($this, 'logo_field'),
            'my_theme_options',
            'my_theme_options_general'
        );
    }
    
    /**
     * Sanitize the favicon field input.
     *
     * @param string $input The user input to sanitize.
     * @return string The sanitized input.
     */
    public function sanitize_favicon_field($input) {
        // Sanitize the user input as needed
        $output = sanitize_text_field($input);
        
        return $output;
    }

    /**
     * Sanitize the logo field input.
     *
     * @param string $input The user input to sanitize.
     * @return string The sanitized input.
     */
    public function sanitize_logo_field($input) {
        // Sanitize the user input as needed
        $output = sanitize_text_field($input);
        
        return $output;
    }
    
    function enqueue_styles( $hook ) {
        global $pagenow;
        // Enqueue styles only for the Theme Options page and its submenus.
        if ( $pagenow == 'admin.php' && isset( $_GET['page'] ) && $_GET['page'] == 'my-theme-options' ) {
            wp_enqueue_style( 'my-theme-options-style', get_template_directory_uri() . '/assets/css/admin.css' );
        }
    }
    
    function enqueue_scripts( $hook ) {
        global $pagenow;
        // Enqueue scripts only for the Theme Options page and its submenus.
        if ( $pagenow == 'admin.php' && isset( $_GET['page'] ) && $_GET['page'] == 'my-theme-options' ) {
            wp_enqueue_script( 'my-script', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.js', array( 'jquery' ), '1.0', true );
        }
    }

    /**
     * Dashboard Callback
     * 
     * @since 1.0.1
     */
    public function render_options_page() {
        // This is where you can add the HTML and PHP for your main Theme Options page.
        include_once( get_template_directory() . '/inc/admin/theme-dash.php' );
    }

}