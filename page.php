<?php
/**
 * The template for displaying all pages
 *
 * @package EGovt
 */

get_header();
?>

<!-- Page Banner -->
<section class="page-banner">
    <div class="page-banner-overlay"></div>
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <nav class="breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'egovt'); ?></a>
            <i class="fas fa-chevron-right"></i>
            <span><?php the_title(); ?></span>
        </nav>
    </div>
</section>

<!-- Page Content -->
<section class="page-content">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="page-featured-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'egovt'),
                    'after'  => '</div>',
                ));
                ?>
            </article>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>
        <?php endwhile; ?>
    </div>
</section>

<?php
get_footer();
