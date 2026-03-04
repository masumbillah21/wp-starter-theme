<?php 

namespace WP_STARTER_THEME\Inc\Widgets;
use \WP_Widget;

class Post_Filters extends WP_Widget{
    public function __construct() {
        parent::__construct(
            'wp_filter_widget',
            __('Post Filter Widget', 'vsg'),
            array('description' => __('Filter posts by category, author, and tag.', 'vsg'))
        );
    }

    // Form method to display widget options in admin panel
    public function form($instance) {
        // Retrieve existing values
        $selected_filters = !empty($instance['filters']) ? $instance['filters'] : array('category', 'author', 'tag'); // Default: all filters
        $title = !empty($instance['title']) ? $instance['title'] : __('Filter Posts', 'vsg'); // Default title

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'vsg'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('filters'); ?>"><?php _e('Select filters to show:', 'vsg'); ?></label><br>
            <input type="checkbox" name="<?php echo $this->get_field_name('filters[]'); ?>" value="category" <?php echo in_array('category', $selected_filters) ? 'checked' : ''; ?> /> <?php _e('Category', 'vsg'); ?><br>
            <input type="checkbox" name="<?php echo $this->get_field_name('filters[]'); ?>" value="author" <?php echo in_array('author', $selected_filters) ? 'checked' : ''; ?> /> <?php _e('Author', 'vsg'); ?><br>
            <input type="checkbox" name="<?php echo $this->get_field_name('filters[]'); ?>" value="tag" <?php echo in_array('tag', $selected_filters) ? 'checked' : ''; ?> /> <?php _e('Tag', 'vsg'); ?><br>
        </p>
        <?php
    }

    // Update widget settings
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        if (!empty($new_instance['filters'])) {
            $instance['filters'] = $new_instance['filters'];
        }
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : __('Filter Posts', 'vsg');
        return $instance;
    }


    public function widget($args, $instance) {
        echo $args['before_widget'];
    
        $title = !empty($instance['title']) ? $instance['title'] : __('Filter Posts', 'vsg');
        echo $args['before_title'] . esc_html($title) . $args['after_title'];
    
        $selected_filters = !empty($instance['filters']) ? $instance['filters'] : array('category', 'author', 'tag'); // Default: all filters
    
        $selected_category = isset($_GET['filter_categories']) ? $_GET['filter_categories'] : '';
        $selected_author = isset($_GET['filter_authors']) ? $_GET['filter_authors'] : '';
        $selected_tag = isset($_GET['filter_tags']) ? $_GET['filter_tags'] : '';
    
        ?>
        <form method="GET" action="<?php echo esc_url(home_url('/')); ?>">
            <?php if (in_array('category', $selected_filters)) : ?>
                <div class="filter-item-title"><?php _e('Topics:', 'vsg'); ?></div>
                <input type="radio" id="category_all" name="filter_categories" value="" <?php echo empty($selected_category) ? 'checked' : ''; ?>>
                <label for="category_all"> <?php _e('All Topics', 'vsg'); ?></label><br>
                <?php
                $categories = get_categories();
                foreach ($categories as $category) {
                    $checked = ($category->term_id == $selected_category) ? 'checked' : '';
                    echo '
                    <input type="radio" id="category_' . $category->term_id . '" name="filter_categories" value="' . $category->term_id . '" ' . $checked . '>
                    <label for="category_' . $category->term_id . '"> ' . esc_html($category->name) . '</label><br>';
                }
                ?>
            <?php endif; ?>
    
            <?php if (in_array('author', $selected_filters)) : ?>
                <div class="filter-item-title"><?php _e('Authors:', 'vsg'); ?></div>
                <input type="radio" id="author_all" name="filter_authors" value="" <?php echo empty($selected_author) ? 'checked' : ''; ?>>
                <label for="author_all"> <?php _e('All Authors', 'vsg'); ?></label><br>
                <?php
                $authors = get_users(array('who' => 'authors'));
                foreach ($authors as $author) {
                    $checked = ($author->ID == $selected_author) ? 'checked' : '';
                    echo '
                    <input type="radio" id="author_' . $author->ID . '" name="filter_authors" value="' . $author->ID . '" ' . $checked . '>
                    <label for="author_' . $author->ID . '">' . esc_html($author->display_name) . '</label><br>';
                }
                ?>
            <?php endif; ?>
    
            <?php if (in_array('tag', $selected_filters)) : ?>
                <div class="filter-item-title"><?php _e('Tags:', 'vsg'); ?></div>
                <input type="radio" id="tag_all" name="filter_tags" value="" <?php echo empty($selected_tag) ? 'checked' : ''; ?>>
                <label for="tag_all"> <?php _e('All Tags', 'vsg'); ?></label><br>
                <?php
                $tags = get_tags();
                foreach ($tags as $tag) {
                    $checked = ($tag->term_id == $selected_tag) ? 'checked' : '';
                    echo '
                    <input type="radio" id="tag_' . $tag->term_id . '" name="filter_tags" value="' . $tag->term_id . '" ' . $checked . '>
                    <label for="tag_' . $tag->term_id . '">' . esc_html($tag->name) . '</label><br>';
                }
                ?>
            <?php endif; ?>
    
            <button type="submit" class="btn btn-solid"><?php _e('Filter', 'vsg'); ?></button>
        </form>
        <?php
        echo $args['after_widget'];
    }

    
    
    
}