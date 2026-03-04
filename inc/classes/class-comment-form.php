<?php

namespace WP_STARTER_THEME\Inc;

use WP_STARTER_THEME\Inc\Traits\Singleton;

class Comment_Form
{
    use Singleton;

    public function __construct() {
        $this->load_hooks();
    }

    private function load_hooks()
    {
        add_filter('comment_form_defaults', [$this, 'comment_form']);
        
        add_filter( 'comment_form_fields', [$this, 'move_comment_field_to_bottom'] );
    }

    public function comment_form($defaults)
    {
        $defaults['fields'] = [
            'author' => '<div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="author" class="form-label">Name</label>
                                <input type="text" name="author" id="author" class="form-control" required>
                            </div>',
            'email' => '<div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div></div>',
            'url' => '<div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="url" class="form-label">Website</label>
                            <input type="url" name="url" id="url" class="form-control">
                        </div>
                      </div>',
        ];

        $defaults['comment_field'] = '<div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="comment" class="form-label">Comment</label>
                                            <textarea name="comment" id="comment" class="form-control" rows="5" required></textarea>
                                        </div>
                                     </div>';

        $defaults['submit_button'] = '<button type="submit" class="btn btn-solid mt-3">Post Comment</button>';

        return $defaults;
    }

    public function move_comment_field_to_bottom( $fields ) {
        $comment_field = $fields['comment'];
        unset( $fields['comment'] );
        $fields['comment'] = $comment_field;
        return $fields;
    }
         
}
