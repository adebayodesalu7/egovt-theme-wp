<?php
/**
 * The template for displaying archive pages
 *
 * @package EGovt
 */

get_header();

$post_type = get_post_type();
$post_type_obj = get_post_type_object($post_type);
$archive_title = $post_type_obj ? $post_type_obj->label : post_type_archive_title('', false);
?>

<!-- Page Banner -->
<section class="page-banner">
    <div class="page-banner-overlay"></div>
    <div class="container">
        <h1><?php echo esc_html($archive_title); ?></h1>
        <nav class="breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'egovt'); ?></a>
            <i class="fas fa-chevron-right"></i>
            <span><?php echo esc_html($archive_title); ?></span>
        </nav>
    </div>
</section>

<!-- Archive Content -->
<section class="archive-content">
    <div class="container">
        <?php if ($post_type === 'event') : ?>
            <!-- Events Archive -->
            <div class="events-grid">
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        $event_date = get_post_meta(get_the_ID(), '_event_date', true);
                        $event_time = get_post_meta(get_the_ID(), '_event_time', true);
                        $event_location = get_post_meta(get_the_ID(), '_event_location', true);
                        $event_type = get_post_meta(get_the_ID(), '_event_type', true);
                        ?>
                        <div class="event-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="event-image">
                                    <?php the_post_thumbnail('egovt-event'); ?>
                                    <?php if ($event_date) : ?>
                                        <div class="event-date">
                                            <span class="day"><?php echo esc_html(date('d', strtotime($event_date))); ?></span>
                                            <span class="month"><?php echo esc_html(date('M Y', strtotime($event_date))); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <div class="event-content">
                                <?php if ($event_type) : ?>
                                    <span class="event-type"><?php echo esc_html($event_type); ?></span>
                                <?php endif; ?>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="event-meta">
                                    <?php if ($event_time) : ?>
                                        <span><i class="far fa-clock"></i> <?php echo esc_html($event_time); ?></span>
                                    <?php endif; ?>
                                    <?php if ($event_location) : ?>
                                        <span><i class="fas fa-map-marker-alt"></i> <?php echo esc_html($event_location); ?></span>
                                    <?php endif; ?>
                                </div>
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>" class="btn btn-outline-sm"><?php _e('More Details', 'egovt'); ?></a>
                            </div>
                        </div>
                        <?php
                    endwhile;
                else :
                    ?>
                    <p><?php _e('No events found.', 'egovt'); ?></p>
                    <?php
                endif;
                ?>
            </div>

        <?php elseif ($post_type === 'council_member') : ?>
            <!-- Council Members Archive -->
            <div class="council-grid">
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        $council_title = get_post_meta(get_the_ID(), '_council_title', true);
                        $council_email = get_post_meta(get_the_ID(), '_council_email', true);
                        $council_phone = get_post_meta(get_the_ID(), '_council_phone', true);
                        ?>
                        <div class="council-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="council-image">
                                    <?php the_post_thumbnail('egovt-council'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="council-info">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <?php if ($council_title) : ?>
                                    <span class="council-title"><?php echo esc_html($council_title); ?></span>
                                <?php endif; ?>
                                <div class="council-contact">
                                    <?php if ($council_email) : ?>
                                        <span><i class="far fa-envelope"></i> <?php echo esc_html($council_email); ?></span>
                                    <?php endif; ?>
                                    <?php if ($council_phone) : ?>
                                        <span><i class="fas fa-phone"></i> <?php echo esc_html($council_phone); ?></span>
                                    <?php endif; ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="btn btn-outline-sm"><?php _e('View Profile', 'egovt'); ?></a>
                            </div>
                        </div>
                        <?php
                    endwhile;
                else :
                    ?>
                    <p><?php _e('No council members found.', 'egovt'); ?></p>
                    <?php
                endif;
                ?>
            </div>

        <?php elseif ($post_type === 'document') : ?>
            <!-- Documents Archive -->
            <div class="documents-list">
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        ?>
                        <div class="document-item">
                            <div class="doc-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="doc-info">
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <span><?php echo get_the_date(); ?></span>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="doc-download"><i class="fas fa-download"></i></a>
                        </div>
                        <?php
                    endwhile;
                else :
                    ?>
                    <p><?php _e('No documents found.', 'egovt'); ?></p>
                    <?php
                endif;
                ?>
            </div>

        <?php else : ?>
            <!-- Default Archive -->
            <div class="news-grid">
                <?php
                if (have_posts()) :
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
        <?php endif; ?>

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
