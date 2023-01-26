<?php
/**
 * CT Functions and definitions
 *
 * @link https://codetrait.com/Peacock
 *
 * @package Peacock
 * @subpackage pck-peacock
 * @since Peacock 1.0.0
 */

 /**
 * Enqueue scripts and styles.
 *
 * @since Peacock 1.0.0
 *
 * @return void
 */
function peacock_scripts() {
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	wp_register_style( 'peacock-theme-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_register_script('bootstrap-js', get_template_directory_uri() . '/assets/vendor/bootstrap/bootstrap.bundle.js', ['jquery'], false, true);

    wp_enqueue_style('peacock-theme-style');
    wp_enqueue_script('bootstrap-js');
}
add_action( 'wp_enqueue_scripts', 'peacock_scripts' );