<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package EGovt
 */

get_header();
?>

<!-- Page Banner -->
<section class="page-banner">
    <div class="page-banner-overlay"></div>
    <div class="container">
        <h1><?php _e('404', 'egovt'); ?></h1>
        <nav class="breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'egovt'); ?></a>
            <i class="fas fa-chevron-right"></i>
            <span><?php _e('404 Not Found', 'egovt'); ?></span>
        </nav>
    </div>
</section>

<!-- 404 Content -->
<section class="error-404 not-found">
    <div class="container">
        <div class="error-content">
            <div class="error-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h2><?php _e('Oops! Page Not Found', 'egovt'); ?></h2>
            <p><?php _e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'egovt'); ?></p>
            
            <div class="error-actions">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                    <i class="fas fa-home"></i> <?php _e('Go to Homepage', 'egovt'); ?>
                </a>
            </div>

            <div class="error-search">
                <h3><?php _e('Search for what you need:', 'egovt'); ?></h3>
                <?php get_search_form(); ?>
            </div>

            <div class="error-links">
                <h3><?php _e('Or try these links:', 'egovt'); ?></h3>
                <ul>
                    <li><a href="<?php echo esc_url(get_post_type_archive_link('event')); ?>"><i class="fas fa-calendar-alt"></i> <?php _e('Events', 'egovt'); ?></a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"><i class="fas fa-newspaper"></i> <?php _e('News', 'egovt'); ?></a></li>
                    <li><a href="<?php echo esc_url(get_post_type_archive_link('council_member')); ?>"><i class="fas fa-users"></i> <?php _e('City Council', 'egovt'); ?></a></li>
                    <li><a href="<?php echo esc_url(get_post_type_archive_link('document')); ?>"><i class="fas fa-file-alt"></i> <?php _e('Documents', 'egovt'); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
