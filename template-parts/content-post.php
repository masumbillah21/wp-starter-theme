<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package  WP Starter Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row post-title rounded-bottom-3 px-lg-5">
		<div class="col-lg-6 px-lg-5">
			<div class="vsg-breadcrumb">
				<?php if (function_exists('bcn_display'))
					bcn_display(); 
				?>
			</div>
			<header class="entry-header">
				<?php
					the_title( '<h1 class="vsg-blog-title">', '</h1>' );
					if ( 'post' === get_post_type() ) :
					?>
					<div class="vsg-entry-meta">
						<div class="vsg-post-meta-data">
							<?php wp_starter_theme_posted_on(); ?>
						</div>

					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->
		</div>
		<div class="col-lg-6 px-lg-5">
			<?php wp_starter_theme_post_thumbnail(); ?>
		</div>
	</div>

	<div class="container">
		<div class="row px-5">
			<div class="col-auto px-5 pt-3 pb-5">
				<?php wp_starter_theme_posted_by(); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 mt-lg-5">
				<div class="entry-content px-lg-5 mx-lg-5">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
			
				<footer class="entry-footer">
					<?php wp_starter_theme_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</div>
		</div>
	</div>
</article>

<?php
