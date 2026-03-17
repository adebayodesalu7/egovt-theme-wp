<?php
/**
 * EGovt Theme Functions
 *
 * @package EGovt
 */

// Theme version
if (!defined('EGOVT_VERSION')) {
    define('EGOVT_VERSION', '1.0.0');
}

/**
 * Theme Setup
 */
function egovt_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable post thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 9999);

    // Add custom image sizes
    add_image_size('egovt-event', 600, 400, true);
    add_image_size('egovt-news', 600, 350, true);
    add_image_size('egovt-council', 400, 500, true);
    add_image_size('egovt-highlight', 800, 600, true);

    // HTML5 support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    ));

    // Responsive embeds
    add_theme_support('responsive-embeds');

    // Block editor styles
    add_theme_support('editor-styles');
    add_editor_style('css/editor-style.css');

    // Wide alignment
    add_theme_support('align-wide');

    // Custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'egovt'),
        'footer'  => __('Footer Menu', 'egovt'),
    ));
}
add_action('after_setup_theme', 'egovt_setup');

/**
 * Enqueue scripts and styles
 */
function egovt_scripts() {
    // Theme stylesheet
    wp_enqueue_style('egovt-style', get_stylesheet_uri(), array(), EGOVT_VERSION);
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');

    // Theme JavaScript
    wp_enqueue_script('egovt-script', get_template_directory_uri() . '/js/theme.js', array('jquery'), EGOVT_VERSION, true);

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    // Pass AJAX URL to JavaScript
    wp_localize_script('egovt-script', 'egovt_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('egovt_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'egovt_scripts');

/**
 * Register widget areas
 */
function egovt_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'egovt'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'egovt'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 1', 'egovt'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in footer column 1.', 'egovt'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 2', 'egovt'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in footer column 2.', 'egovt'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 3', 'egovt'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in footer column 3.', 'egovt'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'egovt_widgets_init');

/**
 * Custom excerpt length
 */
function egovt_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'egovt_excerpt_length');

/**
 * Custom excerpt more
 */
function egovt_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'egovt_excerpt_more');

/**
 * Add custom classes to navigation menu items
 */
function egovt_nav_menu_css_class($classes, $item) {
    if (in_array('current-menu-item', $classes) || in_array('current_page_item', $classes)) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'egovt_nav_menu_css_class', 10, 2);

/**
 * Custom post type: Events
 */
function egovt_register_event_post_type() {
    $labels = array(
        'name'                  => _x('Events', 'Post type general name', 'egovt'),
        'singular_name'         => _x('Event', 'Post type singular name', 'egovt'),
        'menu_name'             => _x('Events', 'Admin Menu text', 'egovt'),
        'name_admin_bar'        => _x('Event', 'Add New on Toolbar', 'egovt'),
        'add_new'               => __('Add New', 'egovt'),
        'add_new_item'          => __('Add New Event', 'egovt'),
        'new_item'              => __('New Event', 'egovt'),
        'edit_item'             => __('Edit Event', 'egovt'),
        'view_item'             => __('View Event', 'egovt'),
        'all_items'             => __('All Events', 'egovt'),
        'search_items'          => __('Search Events', 'egovt'),
        'not_found'             => __('No events found.', 'egovt'),
        'not_found_in_trash'    => __('No events found in Trash.', 'egovt'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'events'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-calendar-alt',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'       => true,
    );

    register_post_type('event', $args);

    // Register Event Type taxonomy
    $taxonomy_labels = array(
        'name'          => _x('Event Types', 'taxonomy general name', 'egovt'),
        'singular_name' => _x('Event Type', 'taxonomy singular name', 'egovt'),
    );

    $taxonomy_args = array(
        'labels'        => $taxonomy_labels,
        'hierarchical'  => true,
        'public'        => true,
        'rewrite'       => array('slug' => 'event-type'),
        'show_in_rest'  => true,
    );

    register_taxonomy('event_type', array('event'), $taxonomy_args);
}
add_action('init', 'egovt_register_event_post_type');

/**
 * Custom post type: Council Members
 */
function egovt_register_council_post_type() {
    $labels = array(
        'name'                  => _x('Council Members', 'Post type general name', 'egovt'),
        'singular_name'         => _x('Council Member', 'Post type singular name', 'egovt'),
        'menu_name'             => _x('Council', 'Admin Menu text', 'egovt'),
        'name_admin_bar'        => _x('Council Member', 'Add New on Toolbar', 'egovt'),
        'add_new'               => __('Add New', 'egovt'),
        'add_new_item'          => __('Add New Council Member', 'egovt'),
        'new_item'              => __('New Council Member', 'egovt'),
        'edit_item'             => __('Edit Council Member', 'egovt'),
        'view_item'             => __('View Council Member', 'egovt'),
        'all_items'             => __('All Council Members', 'egovt'),
        'search_items'          => __('Search Council Members', 'egovt'),
        'not_found'             => __('No council members found.', 'egovt'),
        'not_found_in_trash'    => __('No council members found in Trash.', 'egovt'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'council'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest'       => true,
    );

    register_post_type('council_member', $args);
}
add_action('init', 'egovt_register_council_post_type');

/**
 * Custom post type: Documents
 */
function egovt_register_document_post_type() {
    $labels = array(
        'name'                  => _x('Documents', 'Post type general name', 'egovt'),
        'singular_name'         => _x('Document', 'Post type singular name', 'egovt'),
        'menu_name'             => _x('Documents', 'Admin Menu text', 'egovt'),
        'name_admin_bar'        => _x('Document', 'Add New on Toolbar', 'egovt'),
        'add_new'               => __('Add New', 'egovt'),
        'add_new_item'          => __('Add New Document', 'egovt'),
        'new_item'              => __('New Document', 'egovt'),
        'edit_item'             => __('Edit Document', 'egovt'),
        'view_item'             => __('View Document', 'egovt'),
        'all_items'             => __('All Documents', 'egovt'),
        'search_items'          => __('Search Documents', 'egovt'),
        'not_found'             => __('No documents found.', 'egovt'),
        'not_found_in_trash'    => __('No documents found in Trash.', 'egovt'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'documents'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-media-document',
        'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest'       => true,
    );

    register_post_type('document', $args);

    // Register Document Category taxonomy
    $taxonomy_labels = array(
        'name'          => _x('Document Categories', 'taxonomy general name', 'egovt'),
        'singular_name' => _x('Document Category', 'taxonomy singular name', 'egovt'),
    );

    $taxonomy_args = array(
        'labels'        => $taxonomy_labels,
        'hierarchical'  => true,
        'public'        => true,
        'rewrite'       => array('slug' => 'document-category'),
        'show_in_rest'  => true,
    );

    register_taxonomy('document_category', array('document'), $taxonomy_args);
}
add_action('init', 'egovt_register_document_post_type');

/**
 * Add meta boxes for custom post types
 */
function egovt_add_meta_boxes() {
    // Event meta box
    add_meta_box(
        'event_details',
        __('Event Details', 'egovt'),
        'egovt_event_meta_box_callback',
        'event',
        'normal',
        'high'
    );

    // Council member meta box
    add_meta_box(
        'council_details',
        __('Council Member Details', 'egovt'),
        'egovt_council_meta_box_callback',
        'council_member',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'egovt_add_meta_boxes');

/**
 * Event meta box callback
 */
function egovt_event_meta_box_callback($post) {
    wp_nonce_field('egovt_save_event_meta', 'egovt_event_meta_nonce');
    
    $event_date = get_post_meta($post->ID, '_event_date', true);
    $event_time = get_post_meta($post->ID, '_event_time', true);
    $event_location = get_post_meta($post->ID, '_event_location', true);
    $event_type = get_post_meta($post->ID, '_event_type', true);
    ?>
    <p>
        <label for="event_date"><?php _e('Event Date:', 'egovt'); ?></label><br>
        <input type="date" id="event_date" name="event_date" value="<?php echo esc_attr($event_date); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="event_time"><?php _e('Event Time:', 'egovt'); ?></label><br>
        <input type="text" id="event_time" name="event_time" value="<?php echo esc_attr($event_time); ?>" placeholder="e.g., 10:00 AM - 2:00 PM" style="width: 100%;">
    </p>
    <p>
        <label for="event_location"><?php _e('Location:', 'egovt'); ?></label><br>
        <input type="text" id="event_location" name="event_location" value="<?php echo esc_attr($event_location); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="event_type"><?php _e('Event Type:', 'egovt'); ?></label><br>
        <input type="text" id="event_type" name="event_type" value="<?php echo esc_attr($event_type); ?>" placeholder="e.g., Conference, Workshop" style="width: 100%;">
    </p>
    <?php
}

/**
 * Council member meta box callback
 */
function egovt_council_meta_box_callback($post) {
    wp_nonce_field('egovt_save_council_meta', 'egovt_council_meta_nonce');
    
    $council_title = get_post_meta($post->ID, '_council_title', true);
    $council_district = get_post_meta($post->ID, '_council_district', true);
    $council_email = get_post_meta($post->ID, '_council_email', true);
    $council_phone = get_post_meta($post->ID, '_council_phone', true);
    ?>
    <p>
        <label for="council_title"><?php _e('Title:', 'egovt'); ?></label><br>
        <input type="text" id="council_title" name="council_title" value="<?php echo esc_attr($council_title); ?>" placeholder="e.g., Councilor, District 3" style="width: 100%;">
    </p>
    <p>
        <label for="council_district"><?php _e('District:', 'egovt'); ?></label><br>
        <input type="text" id="council_district" name="council_district" value="<?php echo esc_attr($council_district); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="council_email"><?php _e('Email:', 'egovt'); ?></label><br>
        <input type="email" id="council_email" name="council_email" value="<?php echo esc_attr($council_email); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="council_phone"><?php _e('Phone:', 'egovt'); ?></label><br>
        <input type="text" id="council_phone" name="council_phone" value="<?php echo esc_attr($council_phone); ?>" style="width: 100%;">
    </p>
    <?php
}

/**
 * Save meta box data
 */
function egovt_save_meta_boxes($post_id) {
    // Save event meta
    if (isset($_POST['egovt_event_meta_nonce']) && wp_verify_nonce($_POST['egovt_event_meta_nonce'], 'egovt_save_event_meta')) {
        $fields = array('event_date', 'event_time', 'event_location', 'event_type');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
            }
        }
    }

    // Save council meta
    if (isset($_POST['egovt_council_meta_nonce']) && wp_verify_nonce($_POST['egovt_council_meta_nonce'], 'egovt_save_council_meta')) {
        $fields = array('council_title', 'council_district', 'council_email', 'council_phone');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
            }
        }
    }
}
add_action('save_post', 'egovt_save_meta_boxes');

/**
 * Custom template tags
 */

// Get event date formatted
function egovt_get_event_date($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    $event_date = get_post_meta($post_id, '_event_date', true);
    if ($event_date) {
        return date_i18n(get_option('date_format'), strtotime($event_date));
    }
    return '';
}

// Get event day
function egovt_get_event_day($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    $event_date = get_post_meta($post_id, '_event_date', true);
    if ($event_date) {
        return date('d', strtotime($event_date));
    }
    return '';
}

// Get event month
function egovt_get_event_month($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    $event_date = get_post_meta($post_id, '_event_date', true);
    if ($event_date) {
        return date('M', strtotime($event_date));
    }
    return '';
}

/**
 * Customizer settings
 */
function egovt_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('egovt_hero', array(
        'title'    => __('Hero Section', 'egovt'),
        'priority' => 30,
    ));

    // Hero Title
    $wp_customize->add_setting('egovt_hero_title', array(
        'default'           => __('Welcome to the Local Government Portal', 'egovt'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('egovt_hero_title', array(
        'label'   => __('Hero Title', 'egovt'),
        'section' => 'egovt_hero',
        'type'    => 'text',
    ));

    // Hero Subtitle
    $wp_customize->add_setting('egovt_hero_subtitle', array(
        'default'           => __('The Most Exciting guide to living, working, visiting and investing business.', 'egovt'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('egovt_hero_subtitle', array(
        'label'   => __('Hero Subtitle', 'egovt'),
        'section' => 'egovt_hero',
        'type'    => 'textarea',
    ));

    // Hero Background Image
    $wp_customize->add_setting('egovt_hero_bg', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'egovt_hero_bg', array(
        'label'    => __('Hero Background Image', 'egovt'),
        'section'  => 'egovt_hero',
        'settings' => 'egovt_hero_bg',
    )));

    // Contact Info Section
    $wp_customize->add_section('egovt_contact', array(
        'title'    => __('Contact Information', 'egovt'),
        'priority' => 40,
    ));

    // Address
    $wp_customize->add_setting('egovt_address', array(
        'default'           => '95 FF3, App Street Avenue, NSW 96209, Canada',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('egovt_address', array(
        'label'   => __('Address', 'egovt'),
        'section' => 'egovt_contact',
        'type'    => 'textarea',
    ));

    // Phone
    $wp_customize->add_setting('egovt_phone', array(
        'default'           => '1800 123 4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('egovt_phone', array(
        'label'   => __('Phone', 'egovt'),
        'section' => 'egovt_contact',
        'type'    => 'text',
    ));

    // Email
    $wp_customize->add_setting('egovt_email', array(
        'default'           => 'demo@example.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('egovt_email', array(
        'label'   => __('Email', 'egovt'),
        'section' => 'egovt_contact',
        'type'    => 'email',
    ));

    // Office Hours
    $wp_customize->add_setting('egovt_hours', array(
        'default'           => 'Mon - Fri: 8:00 am - 6:00 pm',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('egovt_hours', array(
        'label'   => __('Office Hours', 'egovt'),
        'section' => 'egovt_contact',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'egovt_customize_register');

/**
 * Load template functions
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Load custom widgets
 */
require get_template_directory() . '/inc/custom-widgets.php';
