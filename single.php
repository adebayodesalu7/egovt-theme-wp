<?php
/**
 * The template for displaying all single posts
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
            <?php
            $post_type = get_post_type();
            if ($post_type === 'post') {
                ?><a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"><?php _e('Blog', 'egovt'); ?></a><?php
            } else {
                ?><a href="<?php echo esc_url(get_post_type_archive_link($post_type)); ?>"><?php echo esc_html(get_post_type_object($post_type)->label); ?></a><?php
            }
            ?>
            <i class="fas fa-chevron-right"></i>
            <span><?php the_title(); ?></span>
        </nav>
    </div>
</section>

<!-- Single Content -->
<section class="single-content">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-article'); ?>>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="single-featured-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="single-meta">
                    <span class="single-date"><i class="far fa-calendar"></i> <?php echo get_the_date(); ?></span>
                    <span class="single-author"><i class="far fa-user"></i> <?php the_author(); ?></span>
                    <span class="single-categories"><i class="far fa-folder"></i> <?php the_category(', '); ?></span>
                </div>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'egovt'),
                    'after'  => '</div>',
                ));
                ?>

                <div class="single-tags">
                    <?php the_tags('<span class="tags-label">' . __('Tags:', 'egovt') . '</span> ', ', '); ?>
                </div>

                <!-- Post Navigation -->
                <nav class="post-navigation">
                    <div class="nav-links">
                        <div class="nav-previous">
                            <?php previous_post_link('%link', '<i class="fas fa-chevron-left"></i> %title'); ?>
                        </div>
                        <div class="nav-next">
                            <?php next_post_link('%link', '%title <i class="fas fa-chevron-right"></i>'); ?>
                        </div>
                    </div>
                </nav>
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
