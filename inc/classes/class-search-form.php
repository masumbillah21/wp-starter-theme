<?php 

namespace WP_STARTER_THEME\Inc;

use WP_STARTER_THEME\Inc\Traits\Singleton;

class Search_Form{
    use Singleton;

    public function __construct() {  
        $this->load_hooks();
    }

    private function load_hooks(){
        add_filter('get_search_form', [$this, 'search_form']);
    }

    public function search_form($form){
        $form = '
        <form role="search" method="get" class="search-form d-flex align-item-center justify-content-center" action="' . esc_url(home_url('/')) . '">
            <input type="search" class="form-control me-2" placeholder="Search..." value="' . get_search_query() . '" name="s" />
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-search"></i> Search
            </button>
        </form>';
    
        return $form;
    }
}