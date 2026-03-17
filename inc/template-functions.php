<?php
/**
 * Custom template functions for this theme
 *
 * @package EGovt
 */

/**
 * Adds custom classes to the array of body classes.
 */
function egovt_body_classes($classes) {
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'egovt_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function egovt_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'egovt_pingback_header');

/**
 * Get event meta data
 */
function egovt_get_event_meta($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    return array(
        'date'     => get_post_meta($post_id, '_event_date', true),
        'time'     => get_post_meta($post_id, '_event_time', true),
        'location' => get_post_meta($post_id, '_event_location', true),
        'type'     => get_post_meta($post_meta($post_id, '_event_type', true),
    );
}

/**
 * Get council member meta data
 */
function egovt_get_council_meta($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    return array(
        'title'    => get_post_meta($post_id, '_council_title', true),
        'district' => get_post_meta($post_id, '_council_district', true),
        'email'    => get_post_meta($post_id, '_council_email', true),
        'phone'    => get_post_meta($post_id, '_council_phone', true),
    );
}

/**
 * Display event date box
 */
function egovt_event_date_box($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $event_date = get_post_meta($post_id, '_event_date', true);
    
    if (!$event_date) {
        return;
    }

    $day = date('d', strtotime($event_date));
    $month = date('M Y', strtotime($event_date));
    ?>
    <div class="event-date">
        <span class="day"><?php echo esc_html($day); ?></span>
        <span class="month"><?php echo esc_html($month); ?></span>
    </div>
    <?php
}

/**
 * Display council member contact info
 */
function egovt_council_contact($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $email = get_post_meta($post_id, '_council_email', true);
    $phone = get_post_meta($post_id, '_council_phone', true);
    ?>
    <div class="council-contact">
        <?php if ($email) : ?>
            <span><i class="far fa-envelope"></i> <?php echo esc_html($email); ?></span>
        <?php endif; ?>
        <?php if ($phone) : ?>
            <span><i class="fas fa-phone"></i> <?php echo esc_html($phone); ?></span>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Display breadcrumbs
 */
function egovt_breadcrumbs() {
    if (is_front_page()) {
        return;
    }
    ?>
    <nav class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'egovt'); ?></a>
        <i class="fas fa-chevron-right"></i>
        <?php if (is_single()) : ?>
            <?php if (get_post_type() !== 'post') : ?>
                <a href="<?php echo esc_url(get_post_type_archive_link(get_post_type())); ?>">
                    <?php echo esc_html(get_post_type_object(get_post_type())->label); ?>
                </a>
                <i class="fas fa-chevron-right"></i>
            <?php else : ?>
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">
                    <?php _e('Blog', 'egovt'); ?>
                </a>
                <i class="fas fa-chevron-right"></i>
            <?php endif; ?>
            <span><?php the_title(); ?></span>
        <?php elseif (is_page()) : ?>
            <span><?php the_title(); ?></span>
        <?php elseif (is_archive()) : ?>
            <span><?php the_archive_title(); ?></span>
        <?php elseif (is_search()) : ?>
            <span><?php printf(esc_html__('Search Results for: %s', 'egovt'), get_search_query()); ?></span>
        <?php elseif (is_404()) : ?>
            <span><?php _e('404 Not Found', 'egovt'); ?></span>
        <?php endif; ?>
    </nav>
    <?php
}

/**
 * Display page banner
 */
function egovt_page_banner($title = '') {
    if (!$title) {
        if (is_single() || is_page()) {
            $title = get_the_title();
        } elseif (is_archive()) {
            $title = get_the_archive_title();
        } elseif (is_search()) {
            $title = sprintf(esc_html__('Search Results for: %s', 'egovt'), get_search_query());
        } elseif (is_404()) {
            $title = __('404 Not Found', 'egovt');
        } else {
            $title = get_bloginfo('name');
        }
    }
    ?>
    <section class="page-banner">
        <div class="page-banner-overlay"></div>
        <div class="container">
            <h1><?php echo esc_html($title); ?></h1>
            <?php egovt_breadcrumbs(); ?>
        </div>
    </section>
    <?php
}

/**
 * Handle newsletter form submission
 */
function egovt_handle_newsletter() {
    if (!isset($_POST['egovt_newsletter_nonce']) || !wp_verify_nonce($_POST['egovt_newsletter_nonce'], 'egovt_newsletter_nonce')) {
        wp_die(esc_html__('Security check failed', 'egovt'));
    }

    $email = sanitize_email($_POST['email']);

    if (!is_email($email)) {
        wp_die(esc_html__('Please enter a valid email address', 'egovt'));
    }

    // Here you would typically save to a database or send to an email service
    // For now, we'll just redirect with a success message
    wp_redirect(add_query_arg('newsletter', 'success', wp_get_referer()));
    exit;
}
add_action('admin_post_egovt_newsletter', 'egovt_handle_newsletter');
add_action('admin_post_nopriv_egovt_newsletter', 'egovt_handle_newsletter');

/**
 * Display newsletter success message
 */
function egovt_newsletter_notice() {
    if (isset($_GET['newsletter']) && $_GET['newsletter'] === 'success') {
        ?>
        <div class="newsletter-success" style="background: #4CAF50; color: white; padding: 15px; text-align: center; margin-bottom: 20px;">
            <?php _e('Thank you for subscribing to our newsletter!', 'egovt'); ?>
        </div>
        <?php
    }
}
add_action('wp_footer', 'egovt_newsletter_notice');
