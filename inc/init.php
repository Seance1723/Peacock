<?php
/**
 * Theme init.
 *
 * @since 1.0.1
 *
 * @package Peacock
 */


if ( ! defined( 'PEACOCK_DIR_PATH' ) ) {
	define( 'PEACOCK_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'PEACOCK_DIR_URI' ) ) {
	define( 'PEACOCK_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

require_once PEACOCK_DIR_PATH . '/inc/helpers/autoloader.php';

function peacock_get_theme_instance() {
	\PEACOCK_THEME\Inc\PEACOCK_THEME::get_instance();
}
peacock_get_theme_instance();

//require_once PEACOCK_DIR_PATH . '/inc/admin/admin-options.php';