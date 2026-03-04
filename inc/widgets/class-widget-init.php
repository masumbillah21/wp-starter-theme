<?php
/**
 * Enqueue theme widgets
 *
 * @package  WP Starter Theme
 */

namespace WP_STARTER_THEME\Inc\Widgets;

use WP_STARTER_THEME\Inc\Traits\Singleton;

class Widget_Init {
	use Singleton;

	protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		add_action('widgets_init', [$this, 'register_wp_widgets']);
		
		add_action('pre_get_posts', [$this, 'filter_posts_by_selected_filters']);
	}

    public function register_wp_widgets() {

		register_widget('WP_STARTER_THEME\Inc\Widgets\Post_Filters');
		register_widget('WP_STARTER_THEME\Inc\Widgets\About_Company');
    }

	
	public function filter_posts_by_selected_filters($query) {
		if (!is_admin() && $query->is_main_query()) {

			if (isset($_GET['filter_categories']) || isset($_GET['filter_authors']) || isset($_GET['filter_tags'])) {

				$tax_query = array('relation' => 'AND'); 
	
				// Filter by category
				if (!empty($_GET['filter_categories'])) {
					$tax_query[] = array(
						'taxonomy' => 'category',
						'field' => 'id',
						'terms' => $_GET['filter_categories'],
						'operator' => 'IN',
					);
				}
	

				if (!empty($_GET['filter_authors'])) {
					$query->set('author__in', $_GET['filter_authors']);
				}
	

				if (!empty($_GET['filter_tags'])) {
					$tax_query[] = array(
						'taxonomy' => 'post_tag',
						'field' => 'id',
						'terms' => $_GET['filter_tags'],
						'operator' => 'IN',
					);
				}

				if (!empty($tax_query) && count($tax_query) > 1) {
					$query->set('tax_query', $tax_query);
				}
			}
		}
	}
}