<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package  WP Starter Theme
 */

?>

<section class="no-results not-found">
	<header class="page-header text-center page-title rounded-3">
		<h1><?php esc_html_e( 'Nothing Found', 'vsg' ); ?></h1>
	</header><!-- .page-header -->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-content">
					<?php
					if ( is_home() && current_user_can( 'publish_posts' ) ) :

						printf(
							'<p>' . wp_kses(
								/* translators: 1: link to WP admin new post page. */
								__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'vsg' ),
								array(
									'a' => array(
										'href' => array(),
									),
								)
							) . '</p>',
							esc_url( admin_url( 'post-new.php' ) )
						);

					elseif ( is_search() ) :
						?>

						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vsg' ); ?></p>
						<?php
						get_search_form();

					else :
						?>

						<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'vsg' ); ?></p>
						<?php
						get_search_form();

					endif;
					?>
				</div><!-- .page-content -->
			</div>
		</div>
	</div>
	
</section><!-- .no-results -->
