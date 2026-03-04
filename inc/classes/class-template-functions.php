<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package  WP Starter Theme
 */

 namespace WP_STARTER_THEME\Inc;
use WP_STARTER_THEME\Inc\Traits\Singleton;

 class Template_Functions{

	 use Singleton;

	 protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_filter( 'body_class', [$this, 'body_classes'] );
		
		add_action( 'wp_head', [$this, 'pingback_header'] );

		add_filter('excerpt_length', [$this, 'excerpt_length']);

		add_filter('excerpt_more', [$this, 'excerpt_more']);
	}


	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	public function body_classes( $classes ) {
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Adds a class of no-sidebar when there is no sidebar present.
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'no-sidebar';
		}

		return $classes;
	}
	

	/**
	 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
	 */
	public function pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}

	public function excerpt_length($length) {
		return 20;
	}

	public function excerpt_more($more) {
		return '...'; 
	}
	

 }