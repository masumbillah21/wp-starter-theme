<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package  WP Starter Theme
 */

if ( ! function_exists( 'wp_starter_theme_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function wp_starter_theme_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'vsg' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'wp_starter_theme_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function wp_starter_theme_posted_by() {
		$avatar = get_avatar( get_the_author_meta( 'ID' ), 32 ); // Adjust the size as needed
	
		$byline = sprintf(
			esc_html_x( '%s', 'post author', 'vsg' ),
			'<span class="autor-meta-card">' . $avatar . ' By <a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
	
		echo '<span class="byline">' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
	
endif;

if (!function_exists('wp_starter_theme_post_categories')):
	function wp_starter_theme_post_categories() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ' ', 'vsg' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( '%1$s', 'vsg' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}
	}
endif;

if (!function_exists('wp_starter_theme_post_tags')):
	function wp_starter_theme_entry_tags() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'vsg' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'vsg' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}
	}
endif;

if ( ! function_exists( 'wp_starter_theme_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function wp_starter_theme_entry_footer() {
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'vsg' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'vsg' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'wp_starter_theme_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function wp_starter_theme_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail('full'); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

if(! function_exists('wp_starter_theme_related_posts')):

	function wp_starter_theme_related_posts($posts_per_page = 3) {
		$post_id = get_the_ID();
		$categories = wp_get_post_categories($post_id);
	
		if ($categories) {
			$args = array(
				'category__in'   => $categories,
				'post__not_in'   => array($post_id), // Exclude current post
				'posts_per_page' => $posts_per_page, // Number of related posts
				'orderby'        => 'rand' // Randomize the posts
			);
	
			$related_posts = new WP_Query($args);
	
			if ($related_posts->have_posts()) { ?>
				<div class="container">
					<div class="row">
						<h3 class="heading text-center">Related Articles</h3>
						<?php while ($related_posts->have_posts()) {
							$related_posts->the_post(); ?>
							<div class="col-lg-4 mb-4">
								<?php get_template_part('template-parts/content'); ?>
							</div>
						<?php } ?>
					</div>
				</div>
			<?php }
			wp_reset_postdata();
		}
	}
endif;

if(! function_exists('wp_starter_theme_sticky_post')):
	function wp_starter_theme_sticky_post() {
		$sticky = get_option('sticky_posts');

		if (!empty($sticky)) {
			$args = array(
				'posts_per_page' => 3,
				'post__in'       => $sticky,
				'orderby'        => 'date',
				'order'          => 'DESC',
			);
			
			$query = new WP_Query($args);
			
			if ($query->have_posts()): ?>
			<?php $carousel_id = wp_rand(); ?>
				<section id="feature-carousel-<?php echo $carousel_id; ?>" class="container feature-carousel p-4 owl-carousel">
					<?php while($query->have_posts()):
						$query->the_post(); ?>
							<div class="feature-post-grid">
								<div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
									<div class="col-lg-7">
										<div class="post-grid-content">
											<?php
												$categories = get_the_category();
												if (!empty($categories)) {
													$category_link = get_category_link($categories[0]->term_id);
													echo '<span class="post-grid-category-item"><a href="' . esc_url($category_link) . '">' . esc_html($categories[0]->name) . '</a></span>';
												}
											?>
											<h2 class="sticky-post-title mt-2"><a href="<?php the_permalink(); ?>" class="text-dark text-decoration-none"><?php the_title(); ?></a></h2>
											<p class="sticky-post-text"> <?php the_excerpt(); ?> </p>
											<a href="<?php the_permalink(); ?>" class="btn btn-solid">
												Read Article &rarr;
											</a>
										</div>
									</div>
									<div class="col-lg-5">
										<div class="feature-carousel-img" 
											style=" <?php if (has_post_thumbnail()) : ?> background-image:url(<?php the_post_thumbnail_url('large'); ?>); <?php endif; ?>">
										</div>
									</div>
								</div>
							</div>
					<?php endwhile; ?>
				</section>

				<script>
					jQuery(document).ready(function(){
						jQuery('#feature-carousel-<?php echo $carousel_id; ?>').owlCarousel({
							loop: true,
							items: 1,
							nav: true,
							autoplay: true,
							autoplayTimeout: 5000,
							autoplaySpeed: 3000,
							autoplayHoverPause: true,
							navText: ["<i class='fa-solid fa-chevron-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"],
						})
					})
				</script>

				<?php wp_reset_postdata();
			endif;
		} 
	}

endif;

if(! function_exists('wp_starter_theme_reading_time')):

	function reading_time() {
		$content = get_post_field( 'post_content', get_the_ID() );
		$word_count = str_word_count( strip_tags( $content ) );
		$readingtime = ceil($word_count / 200);
		
		$timer = " MIN READ";
		
		$totalreadingtime = $readingtime . $timer;
		
		return $totalreadingtime;
	}

endif;


