<?php
/**
 *  WP Starter Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package  WP Starter Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.4' );
}

if ( ! defined( 'wp_starter_theme_THEME_URI' ) ) {
	define( 'wp_starter_theme_THEME_URI', untrailingslashit( get_template_directory_uri() ));
}

if ( ! defined( 'wp_starter_theme_THEME_PATH' ) ) {
	define( 'wp_starter_theme_THEME_PATH', untrailingslashit( get_template_directory() ));
}

/**
 * Custom template tags for this theme.
 */
require wp_starter_theme_THEME_PATH . '/inc/helpers/template-tags.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require wp_starter_theme_THEME_PATH . '/inc/jetpack.php';
}

require_once wp_starter_theme_THEME_PATH . '/inc/helpers/autoloader.php';
require_once wp_starter_theme_THEME_PATH . '/inc/helpers/template-tags.php';

function wp_starter_theme_get_theme_instance() {
	\WP_STARTER_THEME\Inc\Init::get_instance();
}

wp_starter_theme_get_theme_instance();
