<?php
get_header();
?>

<main id="primary" class="site-main">
    <?php wp_starter_theme_sticky_post(); ?>
    <div class="container">
        <div class="row page-title">
            <div class="col-md-12 text-center">
                <?php
                if (is_front_page()):
                    echo '<h1 class="vsg-page-title">Latest Articles</h1>';
                else:
                    the_title('<h1 class="vsg-page-title">', '</h1>');
                endif;
                ?>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-3">
                <?php get_sidebar(); ?>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9">
                <?php if (have_posts()): ?>
                    <div class="row">
                        <?php
                        while (have_posts()) : the_post(); ?>
                            <div class="col-lg-4 mb-4">
                                <?php get_template_part('template-parts/content'); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        <?php
                        echo paginate_links(array(
                            'total'        => $wp_query->max_num_pages,
                            'current'      => max(1, get_query_var('paged')),
                            'prev_text'    => '&laquo;',
                            'next_text'    => '&raquo;',
                            'type'         => 'list',
                        ));
                        ?>
                    </div>

                <?php else:
                    get_template_part('template-parts/content', 'none');
                endif;
                ?>
            </div>
        </div>
    </div>
</main><!-- #main -->

<?php
get_footer();
?>
