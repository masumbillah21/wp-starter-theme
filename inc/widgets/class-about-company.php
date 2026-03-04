<?php
namespace WP_STARTER_THEME\Inc\Widgets;
use \WP_Widget;

class About_Company extends WP_Widget {

    function __construct() {
        parent::__construct(
            'about_company',  // Base ID
            'About Company',  // Name
            array( 'description' => 'A widget to display company info with images and social media links.' )  // Args
        );
    }
    public function form( $instance ) {
        $title = isset($instance['title']) ? $instance['title'] : '';
        $image_1 = isset($instance['image_1']) ? $instance['image_1'] : '';
        $image_2 = isset($instance['image_2']) ? $instance['image_2'] : '';
        $text = isset($instance['text']) ? $instance['text'] : '';
        $facebook = isset($instance['facebook']) ? $instance['facebook'] : '';
        $twitter = isset($instance['twitter']) ? $instance['twitter'] : '';
        $linkedin = isset($instance['linkedin']) ? $instance['linkedin'] : '';
        $instagram = isset($instance['instagram']) ? $instance['instagram'] : '';
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('image_1'); ?>">Image 1:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('image_1'); ?>" name="<?php echo $this->get_field_name('image_1'); ?>" type="text" value="<?php echo esc_attr($image_1); ?>" />
            <button class="upload_image_button">Upload Image</button>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('image_2'); ?>">Image 2:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('image_2'); ?>" name="<?php echo $this->get_field_name('image_2'); ?>" type="text" value="<?php echo esc_attr($image_2); ?>" />
            <button class="upload_image_button">Upload Image</button>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>">Text:</label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" rows="4"><?php echo esc_textarea($text); ?></textarea>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>">Facebook URL:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>">Twitter URL:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('linkedin'); ?>">LinkedIn URL:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('instagram'); ?>">Instagram URL:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo esc_attr($instagram); ?>" />
        </p>

        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['image_1'] = esc_url_raw( $new_instance['image_1'] );
        $instance['image_2'] = esc_url_raw( $new_instance['image_2'] );
        $instance['text'] = sanitize_textarea_field( $new_instance['text'] );
        $instance['facebook'] = esc_url_raw( $new_instance['facebook'] );
        $instance['twitter'] = esc_url_raw( $new_instance['twitter'] );
        $instance['linkedin'] = esc_url_raw( $new_instance['linkedin'] );
        $instance['instagram'] = esc_url_raw( $new_instance['instagram'] );

        return $instance;
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        
        $title = isset($instance['title']) ? $instance['title'] : '';
        $image_1 = isset($instance['image_1']) ? $instance['image_1'] : '';
        $image_2 = isset($instance['image_2']) ? $instance['image_2'] : '';
        $text = isset($instance['text']) ? $instance['text'] : '';
        $facebook = isset($instance['facebook']) ? $instance['facebook'] : '';
        $twitter = isset($instance['twitter']) ? $instance['twitter'] : '';
        $linkedin = isset($instance['linkedin']) ? $instance['linkedin'] : '';
        $instagram = isset($instance['instagram']) ? $instance['instagram'] : '';

        if ( ! empty( $title ) ) {
            echo '<h3>' . $title . '</h3>';
        }
        
        echo '<div class="about-widget-logo-area">';
            if ( ! empty( $image_1 ) ) {
                echo '<img src="' . esc_url( $image_1 ) . '" alt="Company Image 1">';
            }
            
            if ( ! empty( $image_2 ) ) {
                echo '<img src="' . esc_url( $image_2 ) . '" alt="Company Image 2">';
            }
        echo '</div>';

        if ( ! empty( $text ) ) {
            echo '<p>' . esc_html( $text ) . '</p>';
        }

        echo '<div class="about-widget-social-area">';
            if ( ! empty( $facebook ) ) {
                echo '<a href="' . esc_url( $facebook ) . '" target="_blank"><i class="fa fa-brands fa-square-facebook"></i></a>';
            }
            if ( ! empty( $twitter ) ) {
                echo '<a href="' . esc_url( $twitter ) . '" target="_blank"><i class="fa-brands fa-square-twitter"></i></a>';
            }
            if ( ! empty( $linkedin ) ) {
                echo '<a href="' . esc_url( $linkedin ) . '" target="_blank"><i class="fa-brands fa-linkedin"></i></a>';
            }
            if ( ! empty( $instagram ) ) {
                echo '<a href="' . esc_url( $instagram ) . '" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>';
            }
        echo '</div>';

        echo $args['after_widget'];
    }
}
