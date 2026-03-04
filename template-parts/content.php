<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package  WP Starter Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-grid h-100'); ?>>
    <?php if (has_post_thumbnail()): ?>
        <div style="background-image:url(<?php the_post_thumbnail_url('medium'); ?>)" class="card-img-top" alt="<?php the_title(); ?>"></div>
    <?php endif; ?>

	<!-- Category Badge -->
	<div class="post-grid-category">
        <?php
        $categories = get_the_category();
        if (!empty($categories)) {
            $category_link = get_category_link($categories[0]->term_id);
            echo '<span class="post-grid-category-item"><a href="' . esc_url($category_link) . '">' . esc_html($categories[0]->name) . '</a></span>';
        }
        ?>
    </div>


    <div class="post-grid-content d-flex flex-column">
        <!-- Post Title -->
        <h5 class="card-title">
            <a href="<?php the_permalink(); ?>" class="text-dark text-decoration-none">
                <?php the_title(); ?>
            </a>
        </h5>

        <div class="post-grid-min-read">
            <?php echo '<i class="fa-regular fa-clock"></i> '. reading_time(); ?>
        </div>

        <!-- Author Info -->
        <div class="d-flex align-items-center mt-auto">
            <div class="author-img"><?php echo get_avatar(get_the_author_meta('ID'), 40); ?></div>
            <span class="ms-2 author-title"><?php the_author(); ?></span>
        </div>
    </div>

    <!-- Card Footer -->
    <div class="post-grid-footer bg-white border-0 text-center">
        <a href="<?php the_permalink(); ?>" class="primary-btn">
            Read the Article &rarr;
        </a>
    </div>
</article>

