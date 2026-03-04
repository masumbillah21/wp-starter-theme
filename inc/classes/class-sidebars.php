<?php
/**
 * Theme Sidebars.
 *
 * @package  WP Starter Theme
 */

namespace WP_STARTER_THEME\Inc;

use WP_STARTER_THEME\Inc\Traits\Singleton;

/**
 * Class Assets
 */
class Sidebars {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {
		$this->setup_hooks();
	}

	/**
	 * To register action/filter.
	 *
	 * @return void
	 */
	protected function setup_hooks() {

		/**
		 * Actions
		 */
		add_action( 'widgets_init', [ $this, 'register_sidebars' ] );

	}
    /**
     * Register widget area.
     *
     * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
     */
    function register_sidebars() {
        register_sidebar(
            array(
                'name'          => esc_html__( 'Sidebar', 'vsg' ),
                'id'            => 'sidebar-1',
                'description'   => esc_html__( 'Add widgets here.', 'vsg' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__( 'Footer 1', 'vsg' ),
                'id'            => 'footer-1',
                'description'   => esc_html__( 'Add widgets here.', 'vsg' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
        register_sidebar(
            array(
                'name'          => esc_html__( 'Footer 2', 'vsg' ),
                'id'            => 'footer-2',
                'description'   => esc_html__( 'Add widgets here.', 'vsg' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__( 'Fooder 3', 'vsg' ),
                'id'            => 'footer-3',
                'description'   => esc_html__( 'Add widgets here.', 'vsg' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
        register_sidebar(
            array(
                'name'          => esc_html__( 'Fooder 4', 'vsg' ),
                'id'            => 'footer-4',
                'description'   => esc_html__( 'Add widgets here.', 'vsg' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
    }


}