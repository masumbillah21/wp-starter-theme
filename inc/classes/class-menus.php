<?php
/**
 * Register Menus
 *
 * @package  WP Starter Theme
 */

namespace WP_STARTER_THEME\Inc;

use WP_STARTER_THEME\Inc\Traits\Singleton;

class Menus {

	use Singleton;

	protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'init', [ $this, 'register_menus' ] );
	}

	public function register_menus() {
		// This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'vsg-primary' => esc_html__( 'Primary', 'vsg' ),

                'vsg-mobile' => esc_html__( 'Mobile', 'vsg' ),
            )
        );
	}
}