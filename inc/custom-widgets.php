<?php
/**
 * Custom Widgets for EGovt Theme
 *
 * @package EGovt
 */

/**
 * Recent Events Widget
 */
class EGovt_Recent_Events_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'egovt_recent_events',
            __('EGovt: Recent Events', 'egovt'),
            array(
                'description' => __('Display recent events', 'egovt'),
            )
        );
    }

    public function widget($args, $instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Recent Events', 'egovt');
        $number = !empty($instance['number']) ? absint($instance['number']) : 3;

        echo $args['before_widget'];
        echo $args['before_title'] . esc_html($title) . $args['after_title'];

        $events = new WP_Query(array(
            'post_type'      => 'event',
            'posts_per_page' => $number,
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
            echo '<ul class="widget-events-list">';
            while ($events->have_posts()) :
                $events->the_post();
                $event_date = get_post_meta(get_the_ID(), '_event_date', true);
                ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('thumbnail'); ?>
                        <?php endif; ?>
                        <div class="event-info">
                            <h4><?php the_title(); ?></h4>
                            <?php if ($event_date) : ?>
                                <span class="event-date"><i class="far fa-calendar"></i> <?php echo esc_html(date_i18n(get_option('date_format'), strtotime($event_date))); ?></span>
                            <?php endif; ?>
                        </div>
                    </a>
                </li>
                <?php
            endwhile;
            echo '</ul>';
            wp_reset_postdata();
        else :
            echo '<p>' . esc_html__('No upcoming events.', 'egovt') . '</p>';
        endif;

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $number = !empty($instance['number']) ? absint($instance['number']) : 3;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'egovt'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of events:', 'egovt'); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" size="3">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['number'] = (!empty($new_instance['number'])) ? absint($new_instance['number']) : 3;
        return $instance;
    }
}

/**
 * Recent Documents Widget
 */
class EGovt_Recent_Documents_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'egovt_recent_documents',
            __('EGovt: Recent Documents', 'egovt'),
            array(
                'description' => __('Display recent documents', 'egovt'),
            )
        );
    }

    public function widget($args, $instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Recent Documents', 'egovt');
        $number = !empty($instance['number']) ? absint($instance['number']) : 5;

        echo $args['before_widget'];
        echo $args['before_title'] . esc_html($title) . $args['after_title'];

        $documents = new WP_Query(array(
            'post_type'      => 'document',
            'posts_per_page' => $number,
        ));

        if ($documents->have_posts()) :
            echo '<ul class="widget-documents-list">';
            while ($documents->have_posts()) :
                $documents->the_post();
                ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <i class="fas fa-file-alt"></i>
                        <span><?php the_title(); ?></span>
                    </a>
                </li>
                <?php
            endwhile;
            echo '</ul>';
            wp_reset_postdata();
        else :
            echo '<p>' . esc_html__('No documents found.', 'egovt') . '</p>';
        endif;

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $number = !empty($instance['number']) ? absint($instance['number']) : 5;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'egovt'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of documents:', 'egovt'); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" size="3">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['number'] = (!empty($new_instance['number'])) ? absint($new_instance['number']) : 5;
        return $instance;
    }
}

/**
 * Council Members Widget
 */
class EGovt_Council_Members_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'egovt_council_members',
            __('EGovt: Council Members', 'egovt'),
            array(
                'description' => __('Display council members', 'egovt'),
            )
        );
    }

    public function widget($args, $instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Council Members', 'egovt');
        $number = !empty($instance['number']) ? absint($instance['number']) : 4;

        echo $args['before_widget'];
        echo $args['before_title'] . esc_html($title) . $args['after_title'];

        $members = new WP_Query(array(
            'post_type'      => 'council_member',
            'posts_per_page' => $number,
        ));

        if ($members->have_posts()) :
            echo '<div class="widget-council-grid">';
            while ($members->have_posts()) :
                $members->the_post();
                $council_title = get_post_meta(get_the_ID(), '_council_title', true);
                ?>
                <div class="widget-council-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('thumbnail'); ?>
                        <?php endif; ?>
                        <div class="council-info">
                            <h4><?php the_title(); ?></h4>
                            <?php if ($council_title) : ?>
                                <span><?php echo esc_html($council_title); ?></span>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
                <?php
            endwhile;
            echo '</div>';
            wp_reset_postdata();
        else :
            echo '<p>' . esc_html__('No council members found.', 'egovt') . '</p>';
        endif;

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $number = !empty($instance['number']) ? absint($instance['number']) : 4;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'egovt'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of members:', 'egovt'); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" size="3">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['number'] = (!empty($new_instance['number'])) ? absint($new_instance['number']) : 4;
        return $instance;
    }
}

/**
 * Register Widgets
 */
function egovt_register_widgets() {
    register_widget('EGovt_Recent_Events_Widget');
    register_widget('EGovt_Recent_Documents_Widget');
    register_widget('EGovt_Council_Members_Widget');
}
add_action('widgets_init', 'egovt_register_widgets');
