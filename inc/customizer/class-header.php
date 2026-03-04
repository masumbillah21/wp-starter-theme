<?php
namespace WP_STARTER_THEME\Inc\Customizer;

use WP_STARTER_THEME\Inc\Traits\Singleton;
use \WP_Customize_Image_Control;
class Header{
    use Singleton;
    public function __construct() {
        add_action('customize_register', array($this, 'register_customizer_settings'));
    }

    public function register_customizer_settings($wp_customize) {
        // Add Section
        $wp_customize->add_section('header_options_section', array(
            'title'    => __('Header Options', 'vsg'),
            'priority' => 30,
        ));

        // Add Image Upload Setting
        $wp_customize->add_setting('header_image', array(
            'default'   => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_image_control', array(
            'label'    => __('Upload Header Image', 'vsg'),
            'section'  => 'header_options_section',
            'settings' => 'header_image',
        )));

        // Add Image Upload Setting
        $wp_customize->add_setting('header_image_mobile', array(
            'default'   => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_image_mobile_control', array(
            'label'    => __('Upload Header Image Mobile', 'vsg'),
            'section'  => 'header_options_section',
            'settings' => 'header_image_mobile',
        )));

        $wp_customize->add_setting('partner_url', array(
            'default'   => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control('partner_url_control', array(
            'label'    => __('Partner URL', 'vsg'),
            'section'  => 'header_options_section',
            'settings' => 'partner_url',
            'type'     => 'url',
        ));

        // Add Checkbox Setting for "Show Signup"
        $wp_customize->add_setting('show_signup_button', array(
            'default'   => false,
            'transport' => 'refresh',
            'sanitize_callback' => array($this, 'sanitize_checkbox'),
        ));

        $wp_customize->add_control('show_signup_button_control', array(
            'label'    => __('Show Signup Button', 'vsg'),
            'section'  => 'header_options_section',
            'settings' => 'show_signup_button',
            'type'     => 'checkbox',
        ));

        // Add URL Input Setting
        $wp_customize->add_setting('signup_url', array(
            'default'   => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control('signup_url_control', array(
            'label'    => __('Signup URL', 'vsg'),
            'section'  => 'header_options_section',
            'settings' => 'signup_url',
            'type'     => 'url',
        ));

        // Add URL Input Setting
        $wp_customize->add_setting('signup_text', array(
            'default'   => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control('signup_text_control', array(
            'label'    => __('Signup Text', 'vsg'),
            'section'  => 'header_options_section',
            'settings' => 'signup_text',
            'type'     => 'text',
        ));

        // Add Checkbox Setting for "Show Login"
        $wp_customize->add_setting('show_login_button', array(
            'default'   => false,
            'transport' => 'refresh',
            'sanitize_callback' => array($this, 'sanitize_checkbox'),
        ));

        $wp_customize->add_control('show_login_button_control', array(
            'label'    => __('Show Login Button', 'vsg'),
            'section'  => 'header_options_section',
            'settings' => 'show_login_button',
            'type'     => 'checkbox',
        ));

        // Add URL Input Setting
        $wp_customize->add_setting('login_url', array(
            'default'   => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control('login_url_control', array(
            'label'    => __('Login URL', 'vsg'),
            'section'  => 'header_options_section',
            'settings' => 'login_url',
            'type'     => 'url',
        ));

        // Add URL Input Setting
        $wp_customize->add_setting('login_text', array(
            'default'   => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control('login_text_control', array(
            'label'    => __('Login Text', 'vsg'),
            'section'  => 'header_options_section',
            'settings' => 'login_text',
            'type'     => 'text',
        ));

        
    }

    // Sanitize Checkbox Input
    public function sanitize_checkbox($checked) {
        return (isset($checked) && $checked == true) ? true : false;
    }
}

