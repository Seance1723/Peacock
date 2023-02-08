<?php
/**
 * Bootstraps the Theme.
 *
 * @package Peacock
 * @since 1.0.1
 */

namespace PEACOCK_THEME\Inc;

use PEACOCK_THEME\Inc\Traits\Singleton;

class PEACOCK_THEME {

    use Singleton;

    protected function __construct(){

        /**
         * Class.
         */
        Assets::get_instance();
		Menus::get_instance();

        $this->setup_hooks();
    }

    protected function setup_hooks(){
        /**
         * Theme Setup
         */
        add_action( 'after_setup_theme', [$this, 'peacock_setup'] );
    }

    /**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Peacock 1.0.0
	 *
	 * @return void
	 */

	public function peacock_setup() {


		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		* Let WordPress manage the document title.
		* This theme does not use a hard-coded <title> tag in the document head,
		* WordPress will provide it for us.
		*/
		add_theme_support( 'title-tag' );

		/**
		 * 
		 * Supports Custom Background
		 * 
		 */
		add_theme_support( 'custom-background', [
			'default-color' => '#fff',
			'default-image' => '',
		]);


		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/*
		* Add support for core custom logo.
		*
		* @link https://codex.wordpress.org/Theme_Logo
		*/
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );

		// Remove feed icon link from legacy RSS widget.
		add_filter( 'rss_widget_feed_link', '__return_false' );

		// Add Support for Breadcrumbs in theme.
		//require get_template_directory() . '/inc/breadcrumbs-functions.php';

	}	  

}