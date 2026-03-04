<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package  WP Starter Theme
 */

?>
	<footer id="site-footer" class="text-white rounded-bottom-3 rounded-top-3 mt-5 p-lg-5 p-2">
		<div class="container-fluid px-lg-5">
			<div class="footer-top row">
				<div class="col-lg-3 col-md-6 footer-column">
					<?php if (is_active_sidebar('footer-1')) : ?>
						<?php dynamic_sidebar('footer-1'); ?>
					<?php endif; ?>
				</div>
				
				<div class="col-lg-2 offset-lg-1 col-md-6 footer-column">
					<?php if (is_active_sidebar('footer-2')) : ?>
						<?php dynamic_sidebar('footer-2'); ?>
					<?php endif; ?>
				</div>
				
				<div class="col-lg-2 col-md-6 footer-column">
					<?php if (is_active_sidebar('footer-3')) : ?>
						<?php dynamic_sidebar('footer-3'); ?>
					<?php endif; ?>
				</div>
				
				<div class="col-lg-4 col-md-6 footer-column">
					<?php if (is_active_sidebar('footer-4')) : ?>
						<?php dynamic_sidebar('footer-4'); ?>
					<?php endif; ?>
				</div>
			</div>

			<div class="footer-bottom border-top pt-5">
				<p class="text-center">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
			</div>
		</div>
	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
