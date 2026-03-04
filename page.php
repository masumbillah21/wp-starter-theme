<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package  WP Starter Theme
 */

get_header();
$elementor_page = (bool) get_post_meta( get_the_ID(), '_elementor_edit_mode', true );
?>

	<?php if(! is_front_page() && !$elementor_page): ?>
		<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="vsg-breadcrumb">
                        <?php if (function_exists('bcn_display'))
                            bcn_display(); 
                        ?>
                    </div>
                </div>
            </div>
        </div>
	<?php endif; ?>

	<main id="primary" class="site-main">

		<div class="<?php if (! $elementor_page ): ?>container<?php endif; ?>">
			<div class="row">
				<div class="col-lg-12">
				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>
			</div>

	</main><!-- #main -->

<?php
get_footer();
