<?php
/**
 * Template Name: Elementor Full Width
 * Description: A template optimized for Elementor page builder
 *
 * @package EGovt
 */

get_header();
?>



<div class="elementor-content-wrapper">
    <?php
    while (have_posts()) : the_post();
        the_content(); // Essential for Elementor
    endwhile;
    ?>
</div>



<?php
get_footer();