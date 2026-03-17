<?php
/**
 * The template for displaying the front page
 *
 * @package EGovt
 */

get_header();

// Get hero settings
$hero_title = get_theme_mod('egovt_hero_title', __('Welcome to the Local Government Portal', 'egovt'));
$hero_subtitle = get_theme_mod('egovt_hero_subtitle', __('The Most Exciting guide to living, working, visiting and investing business.', 'egovt'));
$hero_bg = get_theme_mod('egovt_hero_bg', '');
?>

<!-- Hero Slider -->
<section class="hero" id="home">
    <div class="hero-slider">
        <div class="slide active" <?php echo $hero_bg ? 'style="background-image: url(\'' . esc_url($hero_bg) . '\');"' : 'style="background-image: url(\'https://images.unsplash.com/photo-1541872703-74c5e44368f9?w=1920\');"'; ?>>
            <div class="slide-overlay"></div>
            <div class="slide-content">
                <h1><?php echo esc_html($hero_title); ?></h1>
                <p><?php echo esc_html($hero_subtitle); ?></p>
                <a href="#services" class="btn btn-primary"><?php _e('Discover More', 'egovt'); ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services" id="services">
    <div class="container">
        <div class="services-card">
            <div class="service-item">
                <div class="service-icon">
                    <i class="fas fa-landmark"></i>
                </div>
                <h3><?php _e('Your Government', 'egovt'); ?></h3>
            </div>
            <div class="service-item">
                <div class="service-icon">
                    <i class="fas fa-briefcase"></i>
                </div>
                <h3><?php _e('Jobs and Unemployment', 'egovt'); ?></h3>
            </div>
            <div class="service-item">
                <div class="service-icon">
                    <i class="fas fa-industry"></i>
                </div>
                <h3><?php _e('Business and Industry', 'egovt'); ?></h3>
            </div>
            <div class="service-item">
                <div class="service-icon">
                    <i class="fas fa-bus"></i>
                </div>
                <h3><?php _e('Roads and Transport', 'egovt'); ?></h3>
            </div>
            <div class="service-item">
                <div class="service-icon">
                    <i class="fas fa-tree"></i>
                </div>
                <h3><?php _e('Culture and Recreation', 'egovt'); ?></h3>
            </div>
            <div class="service-item">
                <div class="service-icon">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <h3><?php _e('Justice, Safety and the law', 'egovt'); ?></h3>
            </div>
        </div>
    </div>
</section>

<!-- CTA Banner -->
<section class="cta-banner">
    <div class="container">
        <p><?php _e('The official guide to living, working, visiting and investing in the Texas', 'egovt'); ?></p>
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn btn-outline"><?php _e('Let\'s explore more', 'egovt'); ?></a>
    </div>
</section>

<!-- Explore Section -->
<section class="explore">
    <div class="container">
        <div class="explore-content">
            <h2><?php _e('Let\'s explore local services, programs & initiatives.', 'egovt'); ?></h2>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn btn-dark"><?php _e('Explore Services', 'egovt'); ?></a>
        </div>
    </div>
</section>

<!-- Image Cards Section -->
<section class="image-cards">
    <div class="container">
        <div class="cards-grid">
            <div class="image-card">
                <img src="https://images.unsplash.com/photo-1564399580075-5dfe19c205f3?w=600" alt="<?php esc_attr_e('Service Departments', 'egovt'); ?>">
                <div class="card-overlay">
                    <h3><?php _e('Service Departments', 'egovt'); ?></h3>
                </div>
            </div>
            <div class="image-card">
                <img src="https://images.unsplash.com/photo-1523906834658-6e24ef2386f9?w=600" alt="<?php esc_attr_e('City Visitors Guide', 'egovt'); ?>">
                <div class="card-overlay">
                    <h3><?php _e('City Visitors Guide', 'egovt'); ?></h3>
                </div>
            </div>
            <div class="image-card">
                <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=600" alt="<?php esc_attr_e('Administrations', 'egovt'); ?>">
                <div class="card-overlay">
                    <h3><?php _e('Administrations', 'egovt'); ?></h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mayor Section -->
<section class="mayor-section">
    <div class="container">
        <div class="mayor-content">
            <h2><?php _e('Meet Ideological leader for youth generation', 'egovt'); ?></h2>
            <p><?php _e('Mayor Carnee Simmons is committed to solving problems for town people across the state under her leadership.', 'egovt'); ?></p>
            <p><?php _e('Expanding access to affordable healthcare, improving skills, respecting working families as the City\'s 45th mayor, Mayor Carnee was won to serve a sixth term on October 7, 2018.', 'egovt'); ?></p>
            <blockquote>
                "<?php _e('Stand at the top of a cliff and jump off and build your wings on the way down.', 'egovt'); ?>"
                <cite>- <?php _e('Carnee Simmons, Mayor', 'egovt'); ?></cite>
            </blockquote>
            <div class="video-intro">
                <a href="#" class="play-btn">
                    <i class="fas fa-play"></i>
                </a>
                <div class="video-text">
                    <span><?php _e('Video Intro', 'egovt'); ?></span>
                    <span><?php _e('About Our Municipal', 'egovt'); ?></span>
                </div>
            </div>
        </div>
        <div class="mayor-image">
            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=500" alt="<?php esc_attr_e('Mayor Carnee Simmons', 'egovt'); ?>">
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="statistics">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number" data-target="62">0</div>
                <div class="stat-suffix">K</div>
                <p><?php _e('Total People lived in our city', 'egovt'); ?></p>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-map-signs"></i>
                </div>
                <div class="stat-number" data-target="2">0</div>
                <div class="stat-suffix">.0K</div>
                <p><?php _e('Square kilometres region covers', 'egovt'); ?></p>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <div class="stat-number" data-target="5">0</div>
                <div class="stat-suffix">%</div>
                <p><?php _e('Private & domestic garden land', 'egovt'); ?></p>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="stat-number" data-target="3">0</div>
                <div class="stat-suffix">th</div>
                <p><?php _e('Average Costs of Home Ownership', 'egovt'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Events Section -->
<section class="events" id="events">
    <div class="container">
        <div class="section-header">
            <h2><?php _e('Upcoming Events', 'egovt'); ?></h2>
            <a href="<?php echo esc_url(get_post_type_archive_link('event')); ?>" class="view-all">
                <?php _e('See All Events', 'egovt'); ?> <i class="fas fa-chevron-right"></i>
            </a>
        </div>
        <div class="events-grid">
            <?php
            $events = new WP_Query(array(
                'post_type'      => 'event',
                'posts_per_page' => 2,
                'meta_key'       => '_event_date',
                'orderby'        => 'meta_value',
                'order'          => 'ASC',
                'meta_query'     => array(
                    array(
                        'key'     => '_event_date',
                        'value'   => date('Y-m-d'),
                        'compare' => '>=',
                        'type'    => 'DATE',
                    ),
                ),
            ));

            if ($events->have_posts()) :
                while ($events->have_posts()) :
                    $events->the_post();
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
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline-sm"><?php _e('More Details', 'egovt'); ?></a>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p><?php _e('No upcoming events.', 'egovt'); ?></p>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Documents Section -->
<section class="documents">
    <div class="container">
        <h2><?php _e('City Documents', 'egovt'); ?></h2>
        <div class="documents-list">
            <?php
            $documents = new WP_Query(array(
                'post_type'      => 'document',
                'posts_per_page' => 4,
            ));

            if ($documents->have_posts()) :
                while ($documents->have_posts()) :
                    $documents->the_post();
                    ?>
                    <div class="document-item">
                        <div class="doc-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="doc-info">
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <span><?php echo get_the_date(); ?></span>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        <a href="<?php echo esc_url(get_post_type_archive_link('document')); ?>" class="view-all">
            <?php _e('More Documents', 'egovt'); ?> <i class="fas fa-chevron-right"></i>
        </a>
    </div>
</section>

<!-- News Section -->
<section class="news" id="news">
    <div class="container">
        <div class="section-header">
            <h2><?php _e('News and Publications', 'egovt'); ?></h2>
            <p><?php _e('The news about recent activities for needed peoples.', 'egovt'); ?></p>
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-outline"><?php _e('More News', 'egovt'); ?></a>
        </div>
        <div class="news-grid">
            <?php
            $news = new WP_Query(array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
            ));

            if ($news->have_posts()) :
                while ($news->have_posts()) :
                    $news->the_post();
                    ?>
                    <article class="news-card">
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
                            <a href="<?php the_permalink(); ?>" class="read-more">
                                <?php _e('Continue Reading', 'egovt'); ?> <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Online Services Section -->
<section class="online-services">
    <div class="container">
        <h2><?php _e('Explore Online Services & Resource', 'egovt'); ?></h2>
        <p><?php _e('City government providing a wide range of online services to people who need help.', 'egovt'); ?></p>
        <div class="services-lists">
            <ul class="services-list white">
                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Parking Permission', 'egovt'); ?></a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('File a tax Return', 'egovt'); ?></a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Order Birth certificate', 'egovt'); ?></a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Get Building Permission', 'egovt'); ?></a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Apply for Driving License', 'egovt'); ?></a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Report Pollution', 'egovt'); ?></a></li>
            </ul>
            <ul class="services-list orange">
                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Public Service Identity', 'egovt'); ?></a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Apply for a City Job', 'egovt'); ?></a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Professional Licenses', 'egovt'); ?></a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('National Planning Framework', 'egovt'); ?></a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Apply for Business License', 'egovt'); ?></a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Online Court Services', 'egovt'); ?></a></li>
            </ul>
        </div>
    </div>
</section>

<!-- City Council Section -->
<section class="city-council" id="council">
    <div class="container">
        <h2><?php _e('Meet City Council', 'egovt'); ?></h2>
        <p><?php _e('The city council have the real super powers as administraion to lead country.', 'egovt'); ?></p>
        <div class="council-grid">
            <?php
            $council_members = new WP_Query(array(
                'post_type'      => 'council_member',
                'posts_per_page' => 4,
            ));

            if ($council_members->have_posts()) :
                while ($council_members->have_posts()) :
                    $council_members->the_post();
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
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Default council members
                ?>
                <div class="council-card">
                    <div class="council-image">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400" alt="<?php esc_attr_e('Council Member', 'egovt'); ?>">
                    </div>
                    <div class="council-info">
                        <h3>Wenalbooze</h3>
                        <span class="council-title"><?php _e('Councilor, District 3', 'egovt'); ?></span>
                        <div class="council-contact">
                            <span><i class="far fa-envelope"></i> district3@citygov.com</span>
                            <span><i class="fas fa-phone"></i> (+91)800238798</span>
                        </div>
                    </div>
                </div>
                <div class="council-card">
                    <div class="council-image">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400" alt="<?php esc_attr_e('Council Member', 'egovt'); ?>">
                    </div>
                    <div class="council-info">
                        <h3>Kanaov Marla</h3>
                        <span class="council-title"><?php _e('Councilor, District 2', 'egovt'); ?></span>
                        <div class="council-contact">
                            <span><i class="far fa-envelope"></i> district2@citygov.com</span>
                            <span><i class="fas fa-phone"></i> (+91)8002354565</span>
                        </div>
                    </div>
                </div>
                <div class="council-card">
                    <div class="council-image">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400" alt="<?php esc_attr_e('Council Member', 'egovt'); ?>">
                    </div>
                    <div class="council-info">
                        <h3>Dinaval Jall</h3>
                        <span class="council-title"><?php _e('Councilor, District 1', 'egovt'); ?></span>
                        <div class="council-contact">
                            <span><i class="far fa-envelope"></i> district1@citygov.com</span>
                            <span><i class="fas fa-phone"></i> (+91)8002352321</span>
                        </div>
                    </div>
                </div>
                <div class="council-card">
                    <div class="council-image">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400" alt="<?php esc_attr_e('Council Member', 'egovt'); ?>">
                    </div>
                    <div class="council-info">
                        <h3>Cevin Peter</h3>
                        <span class="council-title"><?php _e('City Council President', 'egovt'); ?></span>
                        <div class="council-contact">
                            <span><i class="far fa-envelope"></i> president@citygov.com</span>
                            <span><i class="fas fa-phone"></i> (+91)8002359595</span>
                        </div>
                    </div>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Partners Section -->
<section class="partners">
    <div class="container">
        <div class="partners-grid">
            <div class="partner-logo">stylus</div>
            <div class="partner-logo"><i class="fas fa-tree"></i> Brook.</div>
            <div class="partner-logo"><i class="fas fa-bolt"></i> IT'S ALIVE!</div>
            <div class="partner-logo">Nowhere Famous</div>
        </div>
    </div>
</section>

<?php
get_footer();
