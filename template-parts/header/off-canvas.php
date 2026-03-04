<?php 

$mobile_show_login_button = get_theme_mod('show_login_button') ?? false;
$mobile_login_url = get_theme_mod('login_url') ?? '#';

?>

<div class="offcanvas offcanvas-start text-white" id="mobileMenu">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column gap-3">
        <?php wp_nav_menu(array(
            'theme_location' => 'vsg-mobile',
            'container' => false,
            'menu_class' => 'd-flex flex-column gap-3 list-unstyled',
            'fallback_cb' => false,
            'depth' => 1,
            'link_before' => '<span class="text-white text-decoration-none">',
            'link_after' => '</span>'
        )); ?>
        <?php if($mobile_show_login_button): ?>
            <div class="mt-3 border-top pt-3">
                <a href="<?php echo esc_url(wp_registration_url()); ?>" class="btn btn-outline-light">Create Your Account</a>
                <a href="<?php echo esc_url($mobile_login_url); ?>" class="btn btn-primary ms-2">Log in</a>
            </div>
        <?php endif; ?>
    </div>
</div>