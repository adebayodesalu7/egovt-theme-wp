<?php
/**
 * The main template file
 *
 * @package EGovt
 */

get_header();
?>

<!-- Page Banner -->
<section class="page-banner">
    <div class="page-banner-overlay"></div>
    <div class="container">
        <h1><?php single_post_title(); ?></h1>
        <nav class="breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'egovt'); ?></a>
            <i class="fas fa-chevron-right"></i>
            <span><?php _e('Blog', 'egovt'); ?></span>
        </nav>
    </div>
</section>

<!-- News Section -->
<section class="news">
    <div class="container">
        <div class="news-grid">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('news-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="news-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('egovt-news'); ?>
                                </a>
                                <span class="news-date"><?php echo get_the_date(); ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="news-content">
                            <div class="news-meta">
                                <span><?php the_category(', '); ?></span>
                                <span><i class="far fa-comment"></i> <?php comments_number(__('Comment off', 'egovt'), __('1 Comment', 'egovt'), __('% Comments', 'egovt')); ?></span>
                            </div>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="read-more">
                                <?php _e('Continue Reading', 'egovt'); ?> <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                    <?php
                endwhile;
            else :
                ?>
                <p><?php _e('No posts found.', 'egovt'); ?></p>
                <?php
            endif;
            ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php
            echo paginate_links(array(
                'prev_text' => '<i class="fas fa-chevron-left"></i>',
                'next_text' => '<i class="fas fa-chevron-right"></i>',
            ));
            ?>
        </div>
    </div>
</section>

<?php
get_footer();
