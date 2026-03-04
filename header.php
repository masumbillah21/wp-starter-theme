<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package  WP Starter Theme
 */
$mobile_logo = get_theme_mod('mobile_logo');
$partner_logo = get_theme_mod('header_image');
$partner_logo_mobile = get_theme_mod('header_image_mobile');

$partner_url = get_theme_mod('partner_url') ?? '#';
$show_login_button = get_theme_mod('show_login_button') ?? false;
$login_url = get_theme_mod('login_url') ?? '#';
$login_text = get_theme_mod('login_text') ?? 'Login';

$show_signup_button = get_theme_mod('show_signup_button') ?? false;
$signup_url = get_theme_mod('signup_url') ?? '#';
$signup_text = get_theme_mod('signup_text') ?? 'Signup';

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<header id="site-header" class="position-relative text-white rounded-top-3 px-lg-2">
			<div class="container-fluid border-bottom py-3 px-lg-3 d-flex justify-content-between align-items-center">
				<div class="d-flex align-items-center gap-3">
					<a href="<?php echo esc_url(home_url('/')); ?>" class="d-block">
						<?php if(has_custom_logo()): ?>
							<img src="<?php echo get_custom_logo_url(); ?>" alt="<?php bloginfo('name'); ?>" style="max-width: 374px;" class="d-none d-xl-block img-fluid site-logo">
						<?php endif; ?>
						<?php if($mobile_logo): ?>
							<img src="<?php echo $mobile_logo; ?>" alt="<?php bloginfo('name'); ?>" style="max-width: 50px;" class="d-xl-none img-fluid site-logo-mobile">
						<?php endif; ?>
					</a>
					<div class="bg-light" style="width: 2px; height: 100%;"></div>
					<a href="<?php echo esc_url($partner_url); ?>" class="d-block">
						<?php if($partner_logo): ?>
							<img src="<?php echo $partner_logo; ?>" alt="MS Logo" style="max-width: 200px;" class="d-none d-xl-block img-fluid partner-logo">
						<?php endif; ?>
						<?php if($partner_logo_mobile): ?>
							<img src="<?php echo $partner_logo_mobile; ?>" alt="MS Logo" style="max-width: 50px;" class="d-xl-none img-fluid partner-logo-mobile">
						<?php endif; ?>
					</a>
				</div>

				<nav class="d-none d-xl-flex gap-4">
					<?php wp_nav_menu(array(
						'theme_location' => 'vsg-primary',
						'container' => false,
						'menu_class' => 'd-flex gap-4 list-unstyled',
						'fallback_cb' => false,
						'depth' => 1,
						'link_before' => '<span class="text-white text-decoration-none">',
						'link_after' => '</span>'
					)); ?>
				</nav>
				<div class="header-button d-none d-xl-flex gap-1">
					<?php if($show_signup_button): ?>
						<div class="d-none d-lg-block">
							<a href="<?php echo esc_url($signup_url); ?>" class="btn btn-default text-white"><?php echo esc_html($signup_text); ?></a>
						</div>
					<?php endif; ?>
					<?php if($show_login_button): ?>
						<div class="d-none d-lg-block">
							<a href="<?php echo esc_url($login_url); ?>" class="btn btn-primary"><?php echo esc_html($login_text); ?></a>
						</div>
					<?php endif; ?>
				</div>

				<button class="navbar-toggler d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
					<span class="navbar-toggler-icon-bar"></span>
					<span class="navbar-toggler-icon-bar"></span>
					<span class="navbar-toggler-icon-bar"></span>
				</button>
			</div>

			<!-- Mobile Menu -->
			<?php get_template_part( 'template-parts/header/off-canvas' ); ?>
		</header>

		<?php
		// Function to get custom logo URL
		function get_custom_logo_url()
		{
			$custom_logo_id = get_theme_mod('custom_logo');
			$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
			return $logo ? $logo[0] : '';
		}
		?>
		<!-- #masthead -->