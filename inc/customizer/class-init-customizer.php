<?php 

namespace WP_STARTER_THEME\Inc\Customizer;

use WP_STARTER_THEME\Inc\Traits\Singleton;

class Init_Customizer{
    use Singleton;
    public function __construct() {
        Mobile_Logo::get_instance();
        Header::get_instance();
    }

}