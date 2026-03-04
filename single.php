<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package  WP Starter Theme
 */

get_header();
?>

	<main id="primary" class="site-main single-post">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', get_post_type() );

							// If comments are open or we have at least one comment, load up the comment template.
							// if ( comments_open() || get_comments_number() ) :
							// 	comments_template();
							// endif;

						endwhile;
					?>
				</div>
			</div>
		</div>

		<?php wp_starter_theme_related_posts(); ?>
		

	</main><!-- #main -->

<?php
get_footer();
