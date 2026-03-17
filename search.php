<?php
/**
 * The template for displaying search results pages
 *
 * @package EGovt
 */

get_header();
?>

<!-- Page Banner -->
<section class="page-banner">
    <div class="page-banner-overlay"></div>
    <div class="container">
        <h1><?php printf(esc_html__('Search Results for: %s', 'egovt'), get_search_query()); ?></h1>
        <nav class="breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'egovt'); ?></a>
            <i class="fas fa-chevron-right"></i>
            <span><?php _e('Search', 'egovt'); ?></span>
        </nav>
    </div>
</section>

<!-- Search Results -->
<section class="search-results">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="news-grid">
                <?php
                while (have_posts()) :
                    the_post();
                    ?>
                    <article <?php post_class('news-card'); ?>>
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
                                <span><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
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

        <?php else : ?>
            <div class="no-results">
                <div class="no-results-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h2><?php _e('No Results Found', 'egovt'); ?></h2>
                <p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'egovt'); ?></p>
                <div class="search-form-wrapper">
                    <?php get_search_form(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
