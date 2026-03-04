<?php
/**
 * Base class for  WP Starter Theme.
 *
 * @package  WP Starter Theme
 */

namespace WP_STARTER_THEME\Inc;

use WP_STARTER_THEME\Inc\Customizer\Init_Customizer;
use WP_STARTER_THEME\Inc\Traits\Singleton;
use WP_STARTER_THEME\Inc\Widgets\Widget_Init;


class Init {
	use Singleton;

	protected function __construct() {

		// Load class.
		Assets::get_instance();
		Menus::get_instance();
        Sidebars::get_instance();
       

		$this->setup_hooks();

        Template_Functions::get_instance();

        
        Widget_Init::get_instance();

        Disable_Widget::get_instance();

        Comment_Form::get_instance();

        Search_Form::get_instance();

        Init_Customizer::get_instance();

	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );

        add_action( 'after_setup_theme', [ $this, 'content_width'], 0 );

	}

	/**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    public function setup_theme() {
        /*
            * Make theme available for translation.
            * Translations can be filed in the /languages/ directory.
            * If you're building a theme based on  WP Starter Theme, use a find and replace
            * to change 'vsg' to the name of your theme in all the template files.
            */
        load_theme_textdomain( 'vsg', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
            * Let WordPress manage the document title.
            * By adding theme support, we declare that this theme does not use a
            * hard-coded <title> tag in the document head, and expect WordPress to
            * provide it for us.
            */
        add_theme_support( 'title-tag' );

        /*
            * Enable support for Post Thumbnails on posts and pages.
            *
            * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
            */
        add_theme_support( 'post-thumbnails' );

        /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */

        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );

        add_theme_support( 'woocommerce' );
    }

    /**
     * Set the content width in pixels, based on the theme's design and stylesheet.
     *
     * Priority 0 to make it available to lower priority callbacks.
     *
     * @global int $content_width
     */
    function content_width() {
        $GLOBALS['content_width'] = apply_filters( 'wp_starter_theme_content_width', 640 );
    }

}