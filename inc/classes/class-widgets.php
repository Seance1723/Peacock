<?php
/**
 * Theme Widgets.
 *
 * @since 1.0.1
 *
 * @package Peacock
 */

namespace PEACOCK_THEME\Inc;

use PEACOCK_THEME\Inc\Traits\Singleton;

class Widgets
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
        add_action( 'admin_init', [$this, 'restore_classic_widgets_settings'] );
        add_action( 'widgets_init', [$this, 'peacock_widgets_init'] );

    }

    /**
     * Register widget area.
     *
     * @since 1.0.1
     *
     * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
     *
     * @return void
     */
    public function peacock_widgets_init() {

        register_sidebar(
            array(
                'name'          => esc_html__( 'Footer 1', 'peacock' ),
                'id'            => 'footer-1',
                'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'peacock' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h5 class="widget-title">',
                'after_title'   => '</h5>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__( 'Footer 2', 'peacock' ),
                'id'            => 'footer-2',
                'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'peacock' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h5 class="widget-title">',
                'after_title'   => '</h5>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__( 'Footer 3', 'peacock' ),
                'id'            => 'footer-3',
                'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'peacock' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h5 class="widget-title">',
                'after_title'   => '</h5>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__( 'Footer 4', 'peacock' ),
                'id'            => 'footer-4',
                'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'peacock' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h5 class="widget-title">',
                'after_title'   => '</h5>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__( 'Footer Contact', 'peacock' ),
                'id'            => 'footer-contact',
                'description'   => esc_html__( 'Add widgets here to appear in your footer contact section.', 'peacock' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h5 class="widget-title">',
                'after_title'   => '</h5>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__( 'Left Sidebar', 'peacock' ),
                'id'            => 'left-sidebar',
                'description'   => esc_html__( 'Add widgets here to appear in your left side of post page.', 'peacock' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__( 'Right Sidebar', 'peacock' ),
                'id'            => 'right-sidebar',
                'description'   => esc_html__( 'Add widgets here to appear in your right side of post page.', 'peacock' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );

    }

    function restore_classic_widgets_settings() {
        remove_theme_support( 'widgets-block-editor' );
    }
    
    

}