<?php
namespace WP_STARTER_THEME\Inc\Customizer;
use WP_STARTER_THEME\Inc\Traits\Singleton;
class Mobile_Logo {
    use Singleton;
    public function __construct() {
        add_action('customize_register', array($this, 'register_customizer_settings'));
    }

    public function register_customizer_settings($wp_customize) {

        $wp_customize->add_setting('mobile_logo', array(
            'default'   => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control(new \WP_Customize_Image_Control($wp_customize, 'mobile_logo_control', array(
            'label'    => __('Upload Mobile Logo', 'your-theme-textdomain'),
            'section'  => 'title_tagline',
            'settings' => 'mobile_logo',
            'priority' => 9,
        )));
    }
}

