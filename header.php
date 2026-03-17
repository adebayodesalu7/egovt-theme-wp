<?php
/**
 * The header for our theme
 *
 * @package EGovt
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Header -->
<header class="header">
    <div class="container">
        <?php
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
        ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo" rel="home">
            <?php if (has_custom_logo() && $logo) : ?>
                <img src="<?php echo esc_url($logo[0]); ?>" alt="<?php bloginfo('name'); ?>">
            <?php else : ?>
                <div class="logo-icon">
                    <i class="fas fa-landmark"></i>
                </div>
                <span class="logo-text"><?php bloginfo('name'); ?></span>
            <?php endif; ?>
        </a>
        
        <button class="menu-toggle" id="menuToggle" aria-label="<?php esc_attr_e('Toggle Menu', 'egovt'); ?>">
            <i class="fas fa-bars"></i>
        </button>
        
        <nav class="main-nav" id="mainNav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'menu_class'     => '',
                'container'      => false,
                'fallback_cb'    => false,
            ));
            ?>
        </nav>
    </div>
</header>
