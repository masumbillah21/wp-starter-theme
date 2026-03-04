<?php
/**
 * Enqueue theme assets
 *
 * @package  WP Starter Theme
 */

namespace WP_STARTER_THEME\Inc;

use WP_STARTER_THEME\Inc\Traits\Singleton;

class Assets {
	use Singleton;

	protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );

		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );

		add_action('admin_enqueue_scripts', [$this, 'register_admin_styles']);

		add_action('admin_enqueue_scripts', [$this, 'register_admin_scripts']);

	}

	public function register_styles() {
		// Register styles.

		wp_register_style( 'vsg-owl-carousel', wp_starter_theme_THEME_URI . '/assets/css/owl.carousel.min.css', array(), _S_VERSION );
		
		wp_register_style( 'vsg-owl-carousel-theme', wp_starter_theme_THEME_URI . '/assets/css/owl.theme.default.min.css', array(), _S_VERSION );
		
		wp_register_style( 'vsg-bootstrap', wp_starter_theme_THEME_URI . '/assets/css/bootstrap.min.css', array(), _S_VERSION );
		
        wp_register_style( 'vsg-default', wp_starter_theme_THEME_URI . '/assets/css/default.css', array(), _S_VERSION);
		
		wp_register_style( 'vsg-style', get_stylesheet_uri(), array(), _S_VERSION);
        
		// Enqueue Styles.

		wp_enqueue_style( 'vsg-owl-carousel' );

		wp_enqueue_style( 'vsg-owl-carousel-theme' );

		wp_enqueue_style( 'vsg-bootstrap' );

		wp_enqueue_style( 'vsg-default' );

		wp_enqueue_style( 'vsg-style' );

	}

	public function register_scripts() {
		// Register scripts.
        wp_register_script( 'vsg-navigation', wp_starter_theme_THEME_URI . '/assets/js/navigation.js', array(), _S_VERSION, true );
        
		wp_register_script( 'vsg-owl-carousel', wp_starter_theme_THEME_URI . '/assets/js/owl.carousel.min.js', ['jquery'], _S_VERSION, true );
		
		wp_register_script( 'vsg-bootstrap', wp_starter_theme_THEME_URI . '/assets/js/bootstrap.min.js', ['jquery'], _S_VERSION, true );


		wp_register_script('vsg', wp_starter_theme_THEME_URI. '/assets/js/main.js', ['jquery'], _S_VERSION, true);

		wp_localize_script('vsg', 'wp_starter_theme_ajax', array(
			'ajax_url' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('vsg-nonce'),
		));
		
		// Enqueue Scripts.
		wp_enqueue_script( 'vsg-navigation' );

		wp_enqueue_script( 'vsg-owl-carousel' );

		wp_enqueue_script( 'vsg-bootstrap' );

		wp_enqueue_script( 'owl-js' );

		wp_enqueue_script( 'carousel' );

		wp_enqueue_script( 'location' );

		wp_enqueue_script( 'vsg' );


        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
		
	}

	public function register_admin_styles(){

	}

	public function register_admin_scripts(){
		wp_register_script('vsg-media', wp_starter_theme_THEME_URI. '/assets/js/media.js', ['jquery', 'media'], _S_VERSION, true);

		wp_enqueue_script( 'vsg-media' );
	}

}