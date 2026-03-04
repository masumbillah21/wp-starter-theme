<?php 

namespace WP_STARTER_THEME\Inc;

use WP_STARTER_THEME\Inc\Traits\Singleton;

class Disable_Widget{
    use Singleton;

    public function __construct() {
        $this->load_hooks();
    }

    private function load_hooks(){
        add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
        add_filter( 'use_widgets_block_editor', '__return_false' );
    }
}